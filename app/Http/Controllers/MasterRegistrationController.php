<?php

namespace App\Http\Controllers;

use App\Http\Controllers\InformacionResidencialController;
use App\Http\Controllers\InformacionAcademicaController;
use App\Http\Controllers\HistorialCriminalController;
use App\Mail\SendEmail;
use App\Mail\VerificationCodeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MasterRegistrationController extends Controller
{
    /**
     * Handle the incoming request and save data in different tables.
     */
    public function store(Request $request)
    {
        $request['user_id'] = Auth::id();

        // Validate the incoming request data
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',

            // general info
            'nombre' => 'required|string|max:100',
            'apellido_paterno' => 'required|string|max:100',
            'apellido_materno' => 'required|string|max:100',
            'genero' => 'required|string|max:15',
            'curp' => 'required|string|max:18',
            'rfc' => 'required|string|max:13',
            'fecha_nacimiento' => 'required|date',
            'edad' => 'required|string|max:2',
            'lugar_nacimiento' => 'required|string|max:100',
            'dni' => 'required|string|max:15',

            // Validation for ResidentialInfo
            'nacionalidades' => 'nullable|string|max:254',
            'residencia_ultimo_anio' => 'required|boolean',
            'fuera_mexico_desde' => 'nullable|date',
            'fuera_mexico_hasta' => 'nullable|date',
            'paises' => 'nullable|string|max:254',
            'detalles_paises' => 'nullable|string|max:254',
            'certificado_residencial' => 'nullable|string|max:254',

            // Validation for AcademicInfo
            'titulo_derecho' => 'required|boolean',
            'nombre_escuela' => 'required|string|max:100',
            'id_profesional' => 'nullable|string|max:15',
            'anios_practica' => 'required|string|max:2',
            'anios_practica_area_legal' => 'required|string|max:2',
            'promedio_posicion' => 'nullable|string|max:100',

            // Validation for CriminalHistory
            'antecedentes_penales' => 'required|boolean',
            'detalles_antecedentes_penales' => 'nullable|string|max:254',
            'inhabilitacion' => 'required|boolean',
            'detalles_inhabilitacion' => 'nullable|string|max:254',
            'nombre_en_lista_negra' => 'required|boolean',
            'detalles_lista_negra' => 'nullable|string|max:254',
            'sentencia_final' => 'required|boolean',

            // Validation for PositionAspire
            'nombre_posiciones' => 'required|array',

            // sentence user
            'usuario_sentencia' => 'nullable|array',
        ]);

        // Start a database transaction
        DB::beginTransaction();
        try {
            // general info
            $generalInfo = new InformacionGeneralController();
            $generalInfo->store(new Request($validated));

            // Create a record in ResidentialInfo
            $residentialInfo = new InformacionResidencialController();
            $residentialInfo->store(new Request($validated));

            // Create a record in AcademicInfo
            $academicInfo = new InformacionAcademicaController();
            $academicInfo->store(new Request($validated));

            // Create a record in CriminalHistory
            $criminalHistory = new HistorialCriminalController();
            $criminalHistory->store(new Request($validated));

            // Create records in PositionAspire
            $positionAspire = new PosicionAspiranteController();
            foreach ($validated['nombre_posiciones'] as $positionName) {
                $positionAspire->store(new Request([
                    'user_id' => $validated['user_id'],
                    'nombre' => $positionName,
                ]));
            }

            // Create records in SentenceUser
            $sentenceUser = new SentenciaUsuarioController();
            if (isset($validated['usuario_sentencia'])) {
                foreach ($validated['usuario_sentencia'] as $sentence) {
                    $sentenceUser->store(new Request([
                        'user_id' => $validated['user_id'],
                        'sentencia' => $sentence,
                    ]));
                }
            }

            // Commit the transaction
            $user = User::find(Auth::id());
            $user->registro_completado = true;
            $user->save();
            DB::commit();
            $this->sendEmail(Auth::user()->email);
            Auth::logout();
            return view('result', ['message' => 'Data saved successfully in all tables']);
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();
            return response()->json(['error' => 'Failed to save data: ' . $e->getMessage()], 500);
        }
    }

    public function sendEmail($email)
    {
        $data = [
            'name' => 'John Doe',
            'mensaje' => 'This is a sample message sent from Laravel.'
        ];

        Mail::to($email)->send(new SendEmail($data));

        return 'Email sent successfully!';
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'email' => 'required|string|email|max:255',
            'email_confirmation' => 'required|string|email|max:255|same:email',
        ]);

        $codigoVerificacion = Str::upper(Str::random(6));
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            DB::beginTransaction();
            try {
                $user = User::create([
                    'nombre' => $request->nombre,
                    'apellido_paterno' => $request->apellido_paterno,
                    'apellido_materno' => $request->apellido_materno,
                    'telefono' => $request->telefono,
                    'email' => $request->email,
                    'password' => bcrypt(123456789),
                    'verification_code' => $codigoVerificacion,
                    'email_verified_at' => null,
                    'registro_completado' => false,
                ]);
                DB::commit();
                Mail::to($user->email)->send(new VerificationCodeMail($codigoVerificacion));
                return view('auth.verify-code')->with('email', $user->email);
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('register')->with('error', 'Error al registrar el usuario.');
            }
        } else {
            if ($user->email_verified_at == null) {
                $user->verification_code = $codigoVerificacion;
                $user->save();
                Mail::to($user->email)->send(new VerificationCodeMail($user->codigo_verificacion));
                return view('auth.verify-code')->with('email', $user->email);
            } else {
                return response()->json(['message' => 'El usuario ya está verificado.'], 400);
            }
        }
    }

    public function viewVerifyCode()
    {
        return view('auth.verify-code', ['email' => '']);
    }

    public function verifyCode(Request $request)
    {
        if ($request->email == null || $request->code == null) {
            return response()->json(['message' => 'No fue posible verificar el código.'], 400);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || $user->verification_code !== $request->code) {
            return response()->json(['message' => 'Código de verificación incorrecto.'], 400);
        }

        $user->email_verified_at = now();
        $user->verification_code = null;
        $user->save();

        Auth::login($user);

        return response()->json([
            'success' => true,
            'message' => 'Cuenta verificada con éxito.'], 200);
    }
}

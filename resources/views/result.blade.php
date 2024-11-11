<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <title>Wizard de Elegibilidad</title>

    <style>
        .center-screen {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 2rem;
            background-color: rgba(113, 0, 173, 0.9);
            border-radius: 15px;
            text-align: center;
            color: white;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .modal-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        .modal-text {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
        }

        .modal-button {
            font-size: 1.1rem;
        }
    </style>
</head>

<body>
    <div class="center-screen" style="border: white 2px solid">
        <i class="fas fa-exclamation-triangle modal-icon"></i>
        <p class="modal-text">Los resultados de tu formulario de elegibilidad fueron enviados al correo que registraste.
            <br><br>En caso de no recibir el correo, verifica tu correo de spam.</p>
            <a href="{{ route('register') }}" class="btn btn-outline-light fw-bold modal-button">CONTINUAR</a>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/wizard.js') }}"></script>
    <script src="{{ asset('assets/js/validate-form.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</body>

</html>

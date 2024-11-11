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
</head>

<body>
    <div class="container-fluid">
        <form id="wizard-form" class="row w-100" method="post" action="{{ route('wizard.save') }}">
            @csrf
            <input type="hidden" name="user_id" value="1">
            <div class="row w-80 wizard-content d-flex justify-content-center align-items-center">

                <div class="col-5 me-2 form-container" id="wizard-left-content" style="display: none">
                    <!-- Diapositiva 6: Formulario -->
                    <div class="form-section active" id="form-step-0">
                        <div class="form-area" id="content-00">
                            <h5 class="text-primary text-xs option-group fw-bold">Indica a qué cargo aspiras (selecciona
                                una
                                o más opciones)</h5>
                            <div class="option-group">
                                <img src="{{ asset('assets/img/suprema.png') }}" alt="SCJN" class="option-icon">
                                <div class="option-content">
                                    <p class="text-primary text-xs fw-bold">Suprema Corte de Justicia de la Nación
                                        (SCJN)
                                    </p>
                                    <hr>
                                    <div class="sub-options text-primary text-xs">
                                        <label>
                                            <input type="checkbox" name="position_names[]" value="minister"> Ministro (4
                                            cargos / 2025 – 2033)
                                        </label>
                                        <label>
                                            <input type="checkbox" name="position_names[]" value="ministera"> Ministra
                                            (5 cargos / 2025 – 2036)
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- Opción 2 -->
                            <div class="option-group">
                                <img src="{{ asset('assets/img/tribunal.png') }}" alt="CJF" class="option-icon">
                                <div class="option-content">
                                    <p class="text-primary text-xs fw-bold">
                                        Consejo de la Judicatura Federal (CJF) + Tribunal de Disciplina Judicial (TDJ)
                                    </p>
                                    <hr>
                                    <div class="sub-options text-primary text-xs">
                                        <label>
                                            <input type="checkbox" name="position_names[]" value="magistratura1">
                                            Magistratura (3 cargos / 2025 – 2030)
                                        </label>
                                        <label>
                                            <input type="checkbox" name="position_names[]" value="magistratura2">
                                            Magistratura (2 cargos / 2025 – 2033)
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="option-group">
                                <img src="{{ asset('assets/img/tribunal_electoral.png') }}" alt="CJF"
                                    class="option-icon">
                                <div class="option-content">
                                    <p class="text-primary text-xs fw-bold">
                                        Tribunal Electoral Del Poder Judicial de la Federación (TEPJF)
                                    </p>
                                    <hr>
                                    <div class="sub-options text-primary text-xs">
                                        <label>
                                            <input type="checkbox" name="position_names[]" value="magistratura1">
                                            Magistratura (2 cargos / 2025 – 2033)
                                        </label>
                                        <label>
                                            <input type="checkbox" name="position_names[]" value="magistratura2">
                                            Magistratura Sala Regional (15 cargos / 2025 – 2036)
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="option-group">
                                <img src="{{ asset('assets/img/magistrado.png') }}" alt="CJF" class="option-icon">
                                <div class="option-content">
                                    <p class="text-primary text-xs fw-bold">
                                        Personas Magistradas del Circuito y Juezas del Distrito
                                    </p>
                                    <hr>
                                    <div class="sub-options text-primary text-xs">
                                        <label>
                                            <input type="checkbox" name="position_names[]" value="magistratura1">
                                            Magistratura de Circuito (Aprox. 449 cargos / 2025 – 2034)
                                        </label>
                                        <label>
                                            <input type="checkbox" name="position_names[]" value="magistratura2">
                                            Juzgadoras de Distrito (Aprox. 215 cargos / 2025 – 2034)
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Diapositiva 7: Formulario -->
                    <div class="form-section active" id="form-step-1">
                        <div class="form-area text-primary text-xs">
                            <div class="col-md-12 row">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Nombre (s):</label>
                                    <input name="name" type="text" class="form-control" id="name" value="{{ Auth::user()->name }}"
                                        placeholder="">
                                </div>
                                <!-- Apellido paterno -->
                                <div class="mb-3 col-md-6">
                                    <label for="father_last_name" class="form-label">Apellido paterno:</label>
                                    <input name="father_last_name" type="text" class="form-control" value="{{ Auth::user()->apellido_paterno }}"
                                        id="father_last_name" placeholder="">
                                </div>
                            </div>

                            <div class="col-md-12 row">
                                <!-- Apellido materno -->
                                <div class="mb-3 col-md-6">
                                    <label for="mother_last_name" class="form-label">Apellido materno:</label>
                                    <input name="mother_last_name" type="text" class="form-control" value="{{ Auth::user()->apellido_materno }}"
                                        id="mother_last_name" placeholder="">
                                </div>
                                <!-- Género -->
                                <div class="mb-3 col-md-6">
                                    <label for="curp" class="form-label">CURP:</label>
                                    <input name="curp" type="text"  style="text-transform: uppercase;"
                                           class="form-control" id="curp" placeholder="" pattern="[A-Za-z0-9\s]*">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <!-- CURP -->
                                <div class="mb-3 col-md-6">
                                    <label for="genre" class="form-label">Género:</label>
                                    <input name="genre" type="text" readonly class="form-control"
                                           id="genre" placeholder="">
                                </div>

                                <!-- RFC -->
                                <div class="mb-3 col-md-6">
                                    <label for="rfc" class="form-label">RFC (con homoclave):</label>
                                    <input name="rfc"  style="text-transform:  uppercase;" type="text" class="form-control" id="rfc"
                                        placeholder="" pattern="[A-Za-z0-9\s]*">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class=" mb-3 col-md-4">
                                    <label for="birth_date" class="form-label">Fecha de nacimiento:</label>
                                    <div class="input-group">
                                        <input name="birth_date" type="date" readonly class="form-control"
                                            id="birth_date" placeholder="">
                                        <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                    </div>
                                </div>
                                <div class=" mb-3 col-md-4">
                                    <label for="age" class="form-label">Edad:</label>
                                    <input name="age" type="number" readonly class="form-control"
                                        id="age" placeholder="">
                                </div>
                                <div class=" mb-3 col-md-4">
                                    <label for="place_of_birth" class="form-label">Lugar de nacimiento:</label>
                                    <div class="input-group">
                                        <input name="place_of_birth" type="text" readonly class="form-control"
                                            id="place_of_birth" placeholder="">
                                        <span class="input-group-text"><i class="bi bi-arrow-down-circle"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label class="form-label">¿Cuenta con identificación oficial vigente? *</label>
                                    <div class="d-flex align-items-center mt-2">
                                        <div class="form-check me-4">
                                            <input class="form-check-input identificacion" type="radio"
                                                id="identificacionSi" name="dniInfo" value="si"
                                                onclick="show('identificacionOpciones')">
                                            <label class="form-check-label" for="identificacionSi">Sí</label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input identificacion" type="radio"
                                                id="identificacionNo" name="dniInfo" value="no"
                                                onclick="hide('identificacionOpciones')">
                                            <label class="form-check-label" for="identificacionNo">No</label>
                                        </div>
                                    </div>
                                    <input type="hidden" id="dniNull" name="dni" value="no">
                                    <div class="identificacion" id="identificacionOpciones" style="display:none;">
                                        <label class="form-label">Especifique</label>
                                        <div class="d-flex align-items-center">
                                            <div class="form-check me-4">
                                                <input class="form-check-input identificacion" type="checkbox"
                                                    id="ine" name="dni" value="ine">
                                                <label class="form-check-label" for="ine">INE</label>
                                            </div>
                                            <div class="form-check me-4">
                                                <input class="form-check-input identificacion" type="checkbox"
                                                    id="pasaporte" name="dni" value="pasaporte">
                                                <label class="form-check-label" for="pasaporte">Pasaporte</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Diapositiva 8: Formulario -->
                    <div class="form-section" id="form-step-2">
                        <div class="form-area text-primary text-xs">
                            <!-- Pregunta: ¿Cuenta con alguna nacionalidad adicional a la mexicana? -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label class="form-label">¿Cuenta con alguna nacionalidad adicional a la
                                        mexicana?</label>
                                    <div class="row align-items-start">
                                        <div class="col-md-12">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input nacionalidad " type="radio"
                                                    id="nacionalidadSi" name="nationalitiesInfo" value="si"
                                                    onclick="show('especificar')">
                                                <label class="form-check-label" for="nacionalidadSi">Sí</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input nacionalidad" type="radio"
                                                    id="nacionalidadNo" name="nationalitiesInfo" value="no"
                                                    onclick="hide('especificar')">
                                                <label class="form-check-label" for="nacionalidadNo">No</label>
                                            </div>
                                        </div>
                                        <input type="hidden" id="nationalitiesNull" name="nationalities"
                                            value="no">
                                        <div class="col-md-10 mt-0" id="especificar" style="display: none;">
                                            <div class="input-group">
                                                <label for="especificar" class="visually-hidden">Especifique:</label>
                                                <input type="text" class="form-control nacionalidad"
                                                    id="especificar" placeholder="Especifique" name="nationalities">
                                                <span class="input-group-text"><i
                                                        class="bi bi-arrow-down-circle"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pregunta: ¿Ha residido en México durante el año anterior...? -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label class="form-label">¿Ha residido en México durante el año anterior al 16 de
                                        octubre de 2024?</label>
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="resididoSi"
                                                    name="residence_last_year" value="1">
                                                <label class="form-check-label" for="resididoSi">Sí</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="resididoNo"
                                                    name="residence_last_year" value="0">
                                                <label class="form-check-label" for="resididoNo">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pregunta: ¿Permaneció fuera de México...? -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label class="form-label">¿Permaneció fuera de México por más de tres meses de
                                        forma
                                        consecutiva en el último año?</label>
                                    <div class="row align-items-start">
                                        <div class="col-md-12">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input fecha" type="radio" id="fechaSi"
                                                    value="si" name="dateInfo" onclick="show('fechas')">
                                                <label class="form-check-label" for="fechaSi">Sí</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input fecha" type="radio" id="fechaNo"
                                                    name="dateInfo" value="no" onclick="hide('fechas')">
                                                <label class="form-check-label" for="fechaNo">No</label>
                                            </div>
                                        </div>
                                        <input type="hidden" id="outside_of_mexico_fromNull"
                                            name="outside_of_mexico_from" value="null">
                                        <input type="hidden" id="outside_of_mexico_untilNull"
                                            name="outside_of_mexico_until" value="null">
                                        <div class="col-md-10 mt-0" id="fechas" style="display: none;">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="fechaDesde" class="form-label">Desde:</label>
                                                    <div class="input-group">
                                                        <input type="date" class="form-control fecha"
                                                            id="fechaDesde" name="outside_of_mexico_from">
                                                        <span class="input-group-text"><i
                                                                class="bi bi-calendar"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="fechaHasta" class="form-label">Hasta:</label>
                                                    <div class="input-group">
                                                        <input type="date" class="form-control fecha"
                                                            id="fechaHasta" name="outside_of_mexico_until">
                                                        <span class="input-group-text"><i
                                                                class="bi bi-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Campo País o Países -->
                                <div class="col-md-12 mb-3">
                                    <label for="pais" class="form-label">País o países:</label>
                                    <input type="text" class="form-control" id="pais" name="countries">
                                </div>

                                <!-- Campo Explique -->
                                <div class="col-md-12 mb-3">
                                    <label for="explique" class="form-label">Explique:</label>
                                    <textarea class="form-control" id="explique" rows="3" name="countries_details"></textarea>
                                </div>
                            </div>

                            <!-- Pregunta: ¿Cuenta con alguna constancia de residencia? -->
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label class="form-label">¿Cuenta con alguna constancia de residencia?</label>
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="constanciaSi"
                                                    name="residential_certificate" value="si">
                                                <label class="form-check-label" for="constanciaSi">Sí</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="constanciaNo"
                                                    name="residential_certificate" value="no">
                                                <label class="form-check-label" for="constanciaNo">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Diapositiva 9: Formulario -->
                    <div class="form-section" id="form-step-3">
                        <div class="form-area text-primary text-xs">
                            <!-- Pregunta: ¿Título profesional de Licenciado en Derecho? -->
                            <div class="row mb-3 align-items-center">
                                <div class="col-md-12">
                                    <label class="form-label">¿Título profesional de Licenciado en Derecho?</label>
                                    <div class="form-check">
                                        <input class="form-check-input titulo" type="radio" id="tituloSi"
                                            name="tittle_law" value="1" onclick="show('promedio')">
                                        <label class="form-check-label" for="tituloSi">Sí</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input titulo" type="radio" id="tituloNo"
                                            name="tittle_law" value="0" onclick="hide('promedio')">
                                        <label class="form-check-label" for="tituloNo">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center" style="display: none" id="promedio">
                                <div class="row mb-3 align-items-center">
                                    <div class="col-md-4">
                                        <label for="promedioGeneral" class="form-label">Promedio general:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input name="average" type="text" class="form-control titulo"
                                            id="promedioGeneral" placeholder="">
                                    </div>
                                </div>
                            </div>


                            <!-- Campo: Nombre de la Universidad -->
                            <div class="row mb-3 align-items-center">
                                <div class="col-md-4">
                                    <label for="universidad" class="form-label">Nombre de la Universidad:</label>
                                </div>
                                <div class="col-md-8">
                                    <input name="name_school" type="text" class="form-control" id="universidad"
                                        placeholder="">
                                </div>
                            </div>

                            <!-- Pregunta: ¿Cuenta con cédula profesional? -->
                            <div class="row mb-3 align-items-center">
                                <div class="col-md-4">
                                    <label class="form-label">¿Cuenta con cédula profesional?</label>
                                    <div class="form-check">
                                        <input class="form-check-input cedula" type="radio" id="cedulaSi"
                                            value="si" onclick="show('cedula')" name="professionalIDInfo">
                                        <label class="form-check-label" for="cedulaSi">Sí</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input cedula" type="radio" id="cedulaNo"
                                            name="professionalIDInfo" value="no" onclick="hide('cedula')">
                                        <label class="form-check-label" for="cedulaNo">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center" id="cedula" style="display: none">
                                <div class="row mb-3 align-items-center">
                                    <div class="col-md-4">
                                        <label for="numeroCedula" class="form-label">Número de cédula
                                            profesional:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="professionalID" class="form-control cedula"
                                            id="numeroCedula" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <!-- Campo: ¿Cuántos años de práctica profesional tiene? -->
                            <div class="row mb-3 align-items-center">
                                <div class="col-md-4">
                                    <label for="anosPractica" class="form-label">¿Cuántos años de práctica profesional
                                        tiene?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="years_practice" class="form-control" id="anosPractica">
                                        <option value="" disabled selected>Seleccione una opción</option>
                                        <option value="1">1 año</option>
                                        <option value="2">2 años</option>
                                        <option value="3">3 años</option>
                                        <option value="4">4 años</option>
                                        <option value="5">5 años</option>
                                        <option value="6">Más de 5 años</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Campo: ¿Cuántos años de práctica tiene en el área jurídica afín al cargo al que aspira? -->
                            <div class="row mb-3 align-items-center">
                                <div class="col-md-4">
                                    <label for="anosAreaJuridica" class="form-label">¿Cuántos años de práctica tiene
                                        en el
                                        área jurídica afín al cargo al que aspira?</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="years_practice_legal_area" class="form-control"
                                        id="anosAreaJuridica">
                                        <option value="" disabled selected>Seleccione una opción</option>
                                        <option value="1">1 año</option>
                                        <option value="2">2 años</option>
                                        <option value="3">3 años</option>
                                        <option value="4">4 años</option>
                                        <option value="5">5 años</option>
                                        <option value="6">Más de 5 años</option>
                                    </select>
                                </div>
                            </div>


                            <!-- Campo: ¿Cuál fue su promedio en las materias afines al cargo al que aspira? -->
                            <div class="row mb-3 align-items-center">
                                <div class="col-md-4">
                                    <label for="promedioMateriasAfines" class="form-label">¿Cuál fue su promedio en
                                        las
                                        materias afines al cargo al que aspira?</label>
                                </div>
                                <div class="col-md-8">
                                    <input name="average_position" type="text" class="form-control"
                                        id="promedioMateriasAfines" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Diapositiva 10: Formulario -->
                    <div class="form-section" id="form-step-4">
                        <div class="form-area text-primary text-xs">
                            <!-- Pregunta: ¿Ha sido condenado por algún delito? -->
                            <div class="row mb-3 align-items-center">
                                <div class="col-md-6">
                                    <label class="form-label">¿Ha sido condenado por algún delito?</label>
                                    <div class="form-check">
                                        <input class="form-check-input condenado" type="radio" id="condenadoSi"
                                            name="criminal_record" value="1" onclick="show('delito')">
                                        <label class="form-check-label" for="condenadoSi">Sí</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input condenado" type="radio" id="condenadoNo"
                                            name="criminal_record" value="0" onclick="hide('delito')">
                                        <label class="form-check-label" for="condenadoNo">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center" id="delito" style="display: none">
                                <div class="row mb-3 align-items-center">
                                    <div class="col-md-4">
                                        <label for="razonCondena" class="form-label">En caso de que su respuesta
                                            anterior
                                            sea
                                            afirmativa, explique la razón:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input name="criminal_record_details" type="text"
                                            class="form-control condenado" id="razonCondena" placeholder="">
                                    </div>
                                </div>
                            </div>


                            <!-- Pregunta: ¿Ha sido inhabilitado? -->
                            <div class="row mb-3 align-items-center">
                                <div class="col-md-6">
                                    <label class="form-label">¿Ha sido inhabilitado?</label>
                                    <div class="form-check">
                                        <input class="form-check-input inhabilitado" type="radio"
                                            id="inhabilitadoSi" name="has_been_disabled" value="1"
                                            onclick="show('inhabilitado')">
                                        <label class="form-check-label" for="inhabilitadoSi">Sí</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input inhabilitado" type="radio"
                                            id="inhabilitadoNo" name="has_been_disabled" value="0"
                                            onclick="hide('inhabilitado')">
                                        <label class="form-check-label" for="inhabilitadoNo">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center" id="inhabilitado" style="display: none">
                                <div class="row mb-3 align-items-center">
                                    <div class="col-md-4">
                                        <label for="razonInhabilitado" class="form-label">En caso de que su respuesta
                                            anterior
                                            sea afirmativa, explique la razón:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input name="has_been_disabled_details" type="text"
                                            class="form-control inhabilitado" id="razonInhabilitado" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <!-- Pregunta: ¿Su nombre ha sido publicado en alguna lista sancionatoria o restrictiva de derechos por autoridades mexicanas o extranjeras? -->
                            <div class="row mb-3 align-items-center">
                                <div class="col-md-6">
                                    <label class="form-label">¿Su nombre ha sido publicado en alguna lista
                                        sancionatoria o
                                        restrictiva de derechos por autoridades mexicanas o extranjeras?</label>
                                    <div class="form-check">
                                        <input class="form-check-input lista" type="radio" id="listaSi"
                                            name="name_in_blacklist" value="1" onclick="show('lista')">
                                        <label class="form-check-label" for="listaSi">Sí</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input lista" type="radio" id="listaNo"
                                            name="name_in_blacklist" value="0"onclick="hide('lista')">
                                        <label class="form-check-label" for="listaNo">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center" id="lista" style="display: none">
                                <div class="row mb-3 align-items-center">
                                    <div class="col-md-4">
                                        <label for="razonLista" class="form-label">En caso de que su respuesta
                                            anterior
                                            sea
                                            afirmativa, explique la razón:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input name="name_in_blacklist_details" type="text"
                                            class="form-control lista" id="razonLista" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-section" id="form-step-5">
                        <div class="form-area text-primary text-xs">
                            <!-- Pregunta: ¿Has sido sentenciada por algunos de los siguientes supuestos de violencia de género? -->
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <label class="text-primary text-xs fw-bold">¿Has sido sentenciado por algunos de
                                        los
                                        siguientes supuestos de violencia de género? (selecciona)</label>
                                    <div class="row mt-3">
                                        <!-- Opción 1 -->
                                        <div class="col-md-4 mb-2">
                                            <div class="card text-center position-relative"
                                                style="height: 110px; width: 100%; background-image: url('{{ asset('assets/img/integridad.png') }}'); background-size: cover; background-position: center;">
                                                <div class="overlay position-absolute w-100 h-100 imagen">
                                                </div>
                                                <div class="card-body text-white d-flex flex-column align-items-center justify-content-center p-1"
                                                    style="height: 100%; position: relative; z-index: 1;">
                                                    <p class="card-title text-center mb-1" style="font-size: 0.8rem;">
                                                        Delitos contra la vida y la integridad corporal</p>
                                                    <input class="form-check-input align-self-end" type="checkbox"
                                                        name="sentence_user[]" value="delitos_integridad_corporal"
                                                        style="position: absolute; bottom: 5px; right: 5px;">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Opción 2 -->
                                        <div class="col-md-4 mb-2">
                                            <div class="card text-center position-relative"
                                                style="height: 110px; width: 100%; background-image: url('{{ asset('assets/img/sexual.png') }}'); background-size: cover; background-position: center;">
                                                <div class="overlay position-absolute w-100 h-100 imagen">
                                                </div>
                                                <div class="card-body text-white d-flex flex-column align-items-center justify-content-center p-1"
                                                    style="height: 100%; position: relative; z-index: 1;">
                                                    <p class="card-title text-center mb-1" style="font-size: 0.8rem;">
                                                        Contra la libertad y seguridad sexual</p>
                                                    <input class="form-check-input align-self-end" type="checkbox"
                                                        name="sentence_user[]" value="seguridad_sexual"
                                                        style="position: absolute; bottom: 5px; right: 5px;">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Opción 3 -->
                                        <div class="col-md-4 mb-2">
                                            <div class="card text-center position-relative"
                                                style="height: 110px; width: 100%; background-image: url('{{ asset('assets/img/psicosexual.png') }}'); background-size: cover; background-position: center;">
                                                <div class="overlay position-absolute w-100 h-100 imagen">
                                                </div>
                                                <div class="card-body text-white d-flex flex-column align-items-center justify-content-center p-1"
                                                    style="height: 100%; position: relative; z-index: 1;">
                                                    <p class="card-title text-center mb-1" style="font-size: 0.8rem;">
                                                        Cuando afecte el normal desarrollo psicosocial</p>
                                                    <input class="form-check-input align-self-end" type="checkbox"
                                                        name="sentence_user[]" value="desarrollo_psicosocial"
                                                        style="position: absolute; bottom: 5px; right: 5px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <!-- Opción 4 -->
                                        <div class="col-md-4 mb-2">
                                            <div class="card text-center position-relative"
                                                style="height: 110px; width: 100%; background-image: url('{{ asset('assets/img/familiar.png') }}'); background-size: cover; background-position: center;">
                                                <div class="overlay position-absolute w-100 h-100 imagen">
                                                </div>
                                                <div class="card-body text-white d-flex flex-column align-items-center justify-content-center p-1"
                                                    style="height: 100%; position: relative; z-index: 1;">
                                                    <p class="card-title text-center mb-1" style="font-size: 0.8rem;">
                                                        Violencia familiar</p>
                                                    <input class="form-check-input align-self-end" type="checkbox"
                                                        name="sentence_user[]" value="violencia_familiar"
                                                        style="position: absolute; bottom: 5px; right: 5px;">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Opción 5 -->
                                        <div class="col-md-4 mb-2">
                                            <div class="card text-center position-relative"
                                                style="height: 110px; width: 100%; background-image: url('{{ asset('assets/img/domestica.png') }}'); background-size: cover; background-position: center;">
                                                <div class="overlay position-absolute w-100 h-100 imagen">
                                                </div>
                                                <div class="card-body text-white d-flex flex-column align-items-center justify-content-center p-1"
                                                    style="height: 100%; position: relative; z-index: 1;">
                                                    <p class="card-title text-center mb-1" style="font-size: 0.8rem;">
                                                        Violencia doméstica</p>
                                                    <input class="form-check-input align-self-end" type="checkbox"
                                                        name="sentence_user[]" value="violencia_domestica"
                                                        style="position: absolute; bottom: 5px; right: 5px;">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Opción 6 -->
                                        <div class="col-md-4 mb-2">
                                            <div class="card text-center position-relative"
                                                style="height: 110px; width: 100%; background-image: url('{{ asset('assets/img/intimidad.png') }}'); background-size: cover; background-position: center;">
                                                <div class="overlay position-absolute w-100 h-100 imagen">
                                                </div>
                                                <div class="card-body text-white d-flex flex-column align-items-center justify-content-center p-1"
                                                    style="height: 100%; position: relative; z-index: 1;">
                                                    <p class="card-title text-center mb-1" style="font-size: 0.8rem;">
                                                        Violación a la intimidad sexual</p>
                                                    <input class="form-check-input align-self-end" type="checkbox"
                                                        name="sentence_user[]" value="intimidad_sexual"
                                                        style="position: absolute; bottom: 5px; right: 5px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <!-- Opción 7 -->
                                        <div class="col-md-4 mb-2">
                                            <div class="card text-center position-relative"
                                                style="height: 110px; width: 100%; background-image: url('{{ asset('assets/img/politica.png') }}'); background-size: cover; background-position: center;">
                                                <div class="overlay position-absolute w-100 h-100 imagen">
                                                </div>
                                                <div class="card-body text-white d-flex flex-column align-items-center justify-content-center p-1"
                                                    style="height: 100%; position: relative; z-index: 1;">
                                                    <p class="card-title text-center mb-1" style="font-size: 0.8rem;">
                                                        Violencia política</p>
                                                    <input class="form-check-input align-self-end" type="checkbox"
                                                        name="sentence_user[]" value="violencia_politica"
                                                        style="position: absolute; bottom: 5px; right: 5px;">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Opción 8 -->
                                        <div class="col-md-4 mb-2">
                                            <div class="card text-center position-relative"
                                                style="height: 110px; width: 100%; background-image: url('{{ asset('assets/img/monetario.png') }}'); background-size: cover; background-position: center;">
                                                <div class="overlay position-absolute w-100 h-100 imagen">
                                                </div>
                                                <div class="card-body text-white d-flex flex-column align-items-center justify-content-center p-1"
                                                    style="height: 100%; position: relative; z-index: 1;">
                                                    <p class="card-title text-center mb-1" style="font-size: 0.8rem;">
                                                        Deudor alimentario moroso</p>
                                                    <input class="form-check-input align-self-end" type="checkbox"
                                                        name="sentence_user[]" value="deudor_alimentario"
                                                        style="position: absolute; bottom: 5px; right: 5px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pregunta: ¿Cuenta con sentencia firme en alguno de los supuestos anteriores? -->
                            <div class="row mb-3 align-items-center">
                                <div class="col-md-12">
                                    <label class="form-label">¿Cuenta con sentencia firme en alguno de los supuestos
                                        anteriores?</label>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="sentenciaSi"
                                                    name="final_sentence" value="1">
                                                <label class="form-check-label" for="sentenciaSi">Sí</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="sentenciaNo"
                                                    name="final_sentence" value="0">
                                                <label class="form-check-label" for="sentenciaNo">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-3 wizard-container ms-5" id="wizard-right-content" style="display: none">
                    <!-- Posición 3: Lista -->
                    <!-- Imagen del logo encima de la barra de progreso -->
                    <div class="logo-container">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Elegibles Logo" class="wizard-logo">
                    </div>

                    <p class="text-start text-xs">Completa el formulario de elegibilidad</p>
                    <!-- Barra de progreso -->
                    <!-- Barra de progreso -->
                    <div class="progress-bar">
                        <div class="progress"></div>
                    </div>
                    <p class="progress-text">0 de 6 formularios completados</p>
                    <ul class="wizard-steps">
                        <li>
                            <div class="step-circle" id="step-circle-0">1</div>
                            <div class="step-text">Información Cargos</div>
                        </li>
                        <li>
                            <div class="step-circle" id="step-circle-1">2</div>
                            <div class="step-text">Información General</div>
                        </li>
                        <li>
                            <div class="step-circle" id="step-circle-2">3</div>
                            <div class="step-text">Información Residencial</div>
                        </li>
                        <li>
                            <div class="step-circle" id="step-circle-3">4</div>
                            <div class="step-text">Información Académica</div>
                        </li>
                        <li>
                            <div class="step-circle" id="step-circle-4">5</div>
                            <div class="step-text">Antecedentes</div>
                        </li>
                        <li>
                            <div class="step-circle" id="step-circle-4">6</div>
                            <div class="step-text">Revisión 8 de 8</div>
                        </li>
                    </ul>
                    <div class="wizard-buttons">
                        <a id="previousButton" href="#" class="btn btn-secondary">Anterior</a>
                        <a id="nextButton" href="#" class="btn btn-pink">Siguiente</a>
                    </div>

                </div>

                {{--  Form global      --}}
                <div class="col-3 wizard-container ms-5" id="general-right"> <!-- Posición 3: Lista -->
                    <!-- Imagen del logo encima de la barra de progreso -->
                    <div class="logo-container">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Elegibles Logo" class="wizard-logo">
                    </div>
                    <div class="my-3">
                        <h4>Coméntanos a qué cargo aspiras</h4>

                        <h4 style="margin-bottom: 5%">-----------------</h4>
                        <h4>Recuerda que el llenado del formulario y el acceso a los resultados es</h4>
                        <h4 class="fw-bold">GRATUITO</h4>
                        <h4 style="margin-top: 5%">-----------------</h4>
                    </div>

                    <div class="wizard-buttons d-flex justify-content-center align-items-center">
                        <a id="star-wizard" class="btn btn-pink">Siguiente</a>
                    </div>
                </div>
                <div class="row col-md-12 justify-content-center align-items-center w-50" id="result-container"
                    style="display: none!important;">
                    <div class="text-center justify-content-center align-items-center">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Elegibles Logo" class="mt-0 wizard-logo">
                    </div>
                    <div class="row col-md-12 justify-content-center align-items-center w-100 card p-4"
                        style="width: 500px; border-radius: 20px;">
                        <div class="d-flex flex-wrap justify-content-center align-items-center mb-3 gap-3">
                            <div class="text-center position-relative" style="min-width: 100px;">
                                <div style="position: relative; display: inline-block;">
                                    <i class="fas fa-info-circle text-white"
                                        style="font-size: 1.8rem; background-color: #7100ad; padding: 10px; border-radius: 20%;"></i>
                                    <i class="fas fa-check-circle text-success position-absolute"
                                        style="font-size: 1rem; top: -10px; right: -10px;"></i>
                                </div>
                                <p class="mb-0 text-primary fw-bold mt-2 text-xs">GENERAL</p>
                            </div>
                            <div class="text-center position-relative" style="min-width: 100px;">
                                <div style="position: relative; display: inline-block;">
                                    <i class="fas fa-home text-white"
                                        style="font-size: 1.8rem; background-color: #7100ad; padding: 10px; border-radius: 20%;"></i>
                                    <i class="fas fa-check-circle text-success position-absolute"
                                        style="font-size: 1rem; top: -10px; right: -10px;"></i>
                                </div>
                                <p class="mb-0 text-primary fw-bold mt-2 text-xs">RESIDENCIAL</p>
                            </div>
                            <div class="text-center position-relative" style="min-width: 100px;">
                                <div style="position: relative; display: inline-block;">
                                    <i class="fas fa-graduation-cap text-white"
                                        style="font-size: 1.8rem; background-color: #7100ad; padding: 10px; border-radius: 20%;"></i>
                                    <i class="fas fa-check-circle text-success position-absolute"
                                        style="font-size: 1rem; top: -10px; right: -10px;"></i>
                                </div>
                                <p class="mb-0 text-primary fw-bold mt-2 text-xs">ACADÉMICA</p>
                            </div>
                            <div class="text-center position-relative" style="min-width: 100px;">
                                <div style="position: relative; display: inline-block;">
                                    <i class="fas fa-gavel text-white"
                                        style="font-size: 1.8rem; background-color: #7100ad; padding: 10px; border-radius: 20%;"></i>
                                    <i class="fas fa-check-circle text-success position-absolute"
                                        style="font-size: 1rem; top: -10px; right: -10px;"></i>
                                </div>
                                <p class="mb-0 text-primary fw-bold mt-2 text-xs">ANTECEDENTES</p>
                            </div>
                            <div class="text-center position-relative" style="min-width: 100px;">
                                <div style="position: relative; display: inline-block;">
                                    <i class="fas fa-user-shield text-white"
                                        style="font-size: 1.8rem; background-color: #7100ad; padding: 10px; border-radius: 20%;"></i>
                                    <i class="fas fa-check-circle text-success position-absolute"
                                        style="font-size: 1rem; top: -10px; right: -10px;"></i>
                                </div>
                                <p class="mb-0 text-primary fw-bold mt-2 text-xs">B. D. R.</p>
                            </div>
                        </div>
                        <h2 class="text-primary fw-bold mb-4 text-center">¡FELICIDADES!</h2>
                        <div class="py-4 px-5 rounded mb-4"
                            style="position: relative; overflow: hidden; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);">
                            <div
                                style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(135deg, #e967cb, #7100ad); z-index: 1;">
                            </div>
                            <img src="{{ asset('assets/img/fondo.png') }}" alt="Fondo"
                                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 0; width: 100%; height: 100%; object-fit: cover;">
                            <h4 class="text-white mb-0" style="position: relative; z-index: 2;">¡El resultado de tu
                                formulario de elegibilidad está listo!</h4>
                        </div>
                        <p class="text-secondary mb-4 text-center">Da clic en el siguiente botón para recibir tus
                            resultados por correo:</p>
                        <input type="submit" class="btn btn-pink px-4 py-2 fw-bold" value="ENVIAR RESULTADOS">
                    </div>
                </div>

            </div>
        </form>
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

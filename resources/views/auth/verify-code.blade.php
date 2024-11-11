<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Código</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #d138a5, #7031c4);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }
        .verification-container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 0.5rem;
            text-align: center;
            width: 100%;
            max-width: 400px;
        }
        .alert-icon {
            font-size: 4rem; /* Aumenta el tamaño del icono de alerta */
            margin-bottom: 1rem;
        }
        .code-input {
            border: none;
            border-bottom: 2px solid white;
            background: transparent;
            color: white;
            font-size: 2rem;
            width: 50px;
            text-align: center;
            margin: 0.5rem;
        }
        .code-input:focus {
            outline: none;
            border-bottom: 2px solid #ffb3ff;
        }
        .btn-continue {
            background-color: transparent;
            border: 2px solid white;
            color: white;
            padding: 0.5rem 2rem;
            margin-top: 1rem;
            transition: 0.3s;
        }
        .btn-continue:hover {
            background-color: white;
            color: #d138a5;
        }
        .floating-alert {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgb(154, 39, 158);
            padding: 3rem;
            border-radius: 0.5rem;
            color: white;
            font-size: 1.5rem;
            display: none;
            z-index: 1000;
            width: 220%;
            max-width: 800px;
            height: 50%;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="verification-container">
    <div class="alert-icon">
        ⚠
    </div>
    @php
        $parts = explode('@', $email);
        $localPart = $parts[0];
        $domainPart = $parts[1];

        // Mostrar las dos primeras letras y las dos últimas letras antes del "@" con puntos suspensivos en el medio
        $formattedEmail = substr($localPart, 0, 2) . '.......' . substr($localPart, -2) . '@' . $domainPart;
    @endphp

    <p>Se envió un código de verificación al correo:<br><strong>{{ $formattedEmail }}</strong></p>

    <p>Ingresa el código de confirmación:</p>
    <form id="verificationForm">
        @csrf
        <input type="hidden" name="code" value="">
        <input type="hidden" name="email" value="{{ $email }}">
        <div class="d-flex justify-content-center">
            <input type="text" required class="code-input" maxlength="1">
            <input type="text" required class="code-input" maxlength="1">
            <input type="text" required class="code-input" maxlength="1">
            <input type="text" required class="code-input" maxlength="1">
            <input type="text" required class="code-input" maxlength="1">
            <input type="text" required class="code-input" maxlength="1">
        </div>
        <button type="button" id="submitBtn" class="btn btn-continue mt-3">CONTINUAR</button>
    </form>
</div>
<div class="floating-alert" id="floatingAlert">
    <div class="alert-icon">
        ⚠
    </div>
    <p>¡Correo verificado!</p>
    <a href="{{route('formulario')}}" class="btn btn-continue mt-4 d-block">CONTINUAR</a>
</div>

<div class="floating-alert" id="floatingAlertError">
    <div class="alert-icon bg-red-500">
        ⚠
    </div>
    <p class="fs-1">¡ El correo no pudo ser verificado, por favor ingresa un correo válido !</p>
    <button id="btn-error" class="btn btn-continue mt-4 d-block">CONTINUAR</button>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const inputs = document.querySelectorAll('.code-input');
        const floatingAlert = document.getElementById('floatingAlert');
        const floatingAlertError = document.getElementById('floatingAlertError');
        const form = document.getElementById('verificationForm');
        const submitBtn = document.getElementById('submitBtn');

        inputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                if (e.target.value !== '' && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                } else if (e.target.value !== '' && index === inputs.length - 1) {
                    // showFloatingAlert();
                }
            });
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && e.target.value === '' && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });

        submitBtn.addEventListener('click', function () {
            const code = Array.from(inputs).map(input => input.value).join('');
            const email = '{{ $email }}';

            fetch('{{ route('save.code') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                },
                body: JSON.stringify({ code, email })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showFloatingAlert();
                    } else {
                        showFloatingAlertError();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Ocurrió un error al procesar la solicitud.');
                });
        });

        function showFloatingAlert() {
            floatingAlert.style.display = 'flex';
        }

        function showFloatingAlertError() {
            floatingAlertError.style.display = 'flex';
        }

        function hideFloatingAlertError() {
            floatingAlertError.style.display = 'none';
        }

        document.getElementById('btn-error').addEventListener('click', function () {
            hideFloatingAlertError();
        });


    });
</script>
</body>
</html>

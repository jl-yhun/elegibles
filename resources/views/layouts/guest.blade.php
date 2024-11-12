<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <style>
            body {
                font-family: Arial, sans-serif;
                color: #ffffff;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                background-color: #f3f4f6;
            }
            .custom-card {
                width: 90%;
                max-width: 75rem;
                padding: 2.5rem;
                border-radius: 1rem;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                background: linear-gradient(to bottom right, #FF4081, #9013FE);
            }
            .center-slot {
                padding: 3% !important;
                width: 100%;
                justify-content: center;
                align-items: center;
            }
        </style>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="custom-card">
            <div>
                <a href="">
                    <div class="logo-container">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Elegibles Logo" class="wizard-logo w-40">
                    </div>
                </a>
            </div>

            <div class="center-slot w-full sm:max-w-lg mt-6 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg p-3">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>

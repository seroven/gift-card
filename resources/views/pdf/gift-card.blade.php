<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pdf</title>
    <style>
        @font-face {
            font-family: 'Poppins';
            src: url('/fonts/poppins.ttf') format('truetype');
            /* Asegúrate de ajustar la ruta y el formato según tu configuración */
            font-weight: normal;
            font-style: normal;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            position: relative;
            width: 100%;
            height: 100vh;
            background-color: #f0f0f0;
        }

        .container-image,
        .container-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 100%;
            max-height: 100%;
        }
    </style>

</head>

<body>
    <div class="container">
        {{-- <img src="{{ public_path('img/penguin.png') }}"> --}}
        <div class="container-image">
            <img src="img/penguin.png">
        </div>
        <div class="container-text">
            <span> {{ $data['title'] }} </span>
        </div>
</body>

</html>

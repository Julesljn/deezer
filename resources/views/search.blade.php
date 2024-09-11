<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deezer</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#2E2F31]">
    <header class="flex flex-col items-center mt-5 ">
        <h1 class="font-title text-6xl relative inline-block">
            <span class="bg-gif bg-clip-text text-transparent">
                Deezer
            </span>
        </h1>
    </header>
    <main>
        
    </main>
    <style>
        .bg-gif {
            background-image: url('https://media.giphy.com/media/XaBEDZfxeWGPLYAlvV/giphy.gif');
            background-size: cover;
            background-position: center;
            background-clip: text;
            -webkit-background-clip: text;
        }

        .input::placeholder {
            color: #F3EEE7;
        }
    </style>
</body>

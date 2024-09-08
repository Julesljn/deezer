<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Deezer Games</title>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-[#2E2F31]">
        <header class="flex flex-col items-center mt-5 ">
            <h1 class="font-title text-6xl relative inline-block">
                <span class="bg-gif bg-clip-text text-transparent">
                    Deezer Games
                </span>
            </h1>
            <nav class="mt-10">
                <ul class="flex gap-72 text-xl">
                    <li>
                        <a href="">Recherche et Information</a>
                    </li>
                    <li>
                        <a href="">Quizz</a>
                    </li>
                </ul>
            </nav>
        </header>
    
        <style>
            .bg-gif {
                background-image: url('https://media.giphy.com/media/XaBEDZfxeWGPLYAlvV/giphy.gif');
                background-size: cover;
                background-position: center;
                background-clip: text;
                -webkit-background-clip: text;
            }
        </style>
    </body>
</html>

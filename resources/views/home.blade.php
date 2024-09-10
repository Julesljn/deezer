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
                Deezer
            </span>
        </h1>
    </header>
    <main>
        <div class="flex flex-col">
            <div>
                <h2 class="text-white text-2xl">Mes playlist</h2>
                <form class="flex flex-col" action="" method="POST">
                    <input class="w-52" type="text" placeholder="Nom de votre playlist">
                    <button type="submit" class="px-1 py-1 w-32 h-10 bg-green-500 text-white rounded hover:bg-green-600" type="submit">Créer</button>
                </form>
            </div>
            <div>
                <article class="flex flex-col items-center">
                    <h3 class="mb-3">Nom playlist</h3>
                    <img class="w-32 h-32" src="{{ asset('images/imageAttente.jpg') }}" alt="">
                    <form action="" method="POST">
                        @csrf
                        <button type="submit" class="mt-4 px-1 py-1 bg-red-500 text-white rounded hover:bg-red-600">Supprimer</button>
                    </form>
                </article>
            </div>
        </div>
    </main>
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

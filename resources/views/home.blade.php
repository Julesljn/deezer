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
    <main class="px-52 mt-12 flex justify-between">
        <div class="bg-[#F3EEE7] flex flex-col gap-10 w-[20vw] items-center rounded-lg py-4">
           <h2 class="text-2xl m-1">Mes playlists :</h2>
           <div class="w-[20vw] border-t-[1px] border-solid border-black"></div>

           <article class="flex flex-col items-center">
            <img class="w-32 h-32" src="{{ asset('images/imageAttente.jpg') }}" alt="">
            <h3 class="text-xl">Playlist</h3>
            <form action="" method="POST">
                @csrf
                <button type="submit" class="mt-1 px-1 py-1 bg-red-500 text-white rounded hover:bg-red-600">Supprimer</button>
            </form>
           </article>

           <article class="flex flex-col items-center">
            <img class="w-32 h-32" src="{{ asset('images/imageAttente.jpg') }}" alt="">
            <h3 class="text-xl">Playlist</h3>
            <form action="" method="POST">
                @csrf
                <button type="submit" class="mt-1 px-1 py-1 bg-red-500 text-white rounded hover:bg-red-600">Supprimer</button>
            </form>
           </article>

           <article class="flex flex-col items-center">
            <img class="w-32 h-32" src="{{ asset('images/imageAttente.jpg') }}" alt="">
            <h3 class="text-xl">Playlist</h3>
            <form action="" method="POST">
                @csrf
                <button type="submit" class="mt-1 p-1 bg-red-500 text-white rounded hover:bg-red-600">Supprimer</button>
            </form>
           </article>
        </div>
        <div>
            <a class="py-2 px-8 bg-blue-600 text-white rounded hover:bg-blue-700" href="/search">Rechercher un artiste</a>
        </div>
        <div class="bg-[#F3EEE7] flex flex-col gap-10 w-[20vw] items-center rounded-lg py-4">
            <h2 class="text-2xl m-1">Créer une playlist :</h2>
            <div class="w-[20vw] border-t-[1px] border-solid border-black"></div>
            <form class="flex flex-col items-center gap-10" action="" method="POST">
                <input class="w-[16vw] bg-[#2E2F31] text-[#F3EEE7] input rounded-md p-2" type="text" name="playlist_name" placeholder="Nom de la playlist" required>
                <input class="w-[16vw] bg-[#2E2F31] text-[#F3EEE7] input rounded-md p-2" type="file">
                @csrf
                <button type="submit" class="mt-1 py-2 px-8 bg-green-600 text-white rounded hover:bg-green-700">Créer</button>
            </form>
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
        .input::placeholder {
            color: #F3EEE7;
        }
    </style>
</body>

</html>

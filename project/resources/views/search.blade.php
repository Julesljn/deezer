<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deezer</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#2E2F31]">
    <header class="flex flex-col items-center mt-5">
        <h1 class="font-title text-6xl relative inline-block">
            <span class="bg-gif bg-clip-text text-transparent">
                <a href="/">Deezer</a>
            </span>
        </h1>
    </header>

    <main class="flex justify-center my-16">
        <div class="bg-[#F3EEE7] w-[90vw] h-[70vh] rounded-lg flex">
            <div class="flex flex-col w-[30vw] p-4">
                <form class="flex gap-3" action="{{ route('search.artist') }}" method="POST">
                    @csrf
                    <input class="w-[16vw] bg-[#2E2F31] text-[#F3EEE7] input rounded-md p-2" type="search" name="artist" placeholder="Rechercher le nom d'un artiste" required>
                    <button class="py-2 px-8 bg-blue-600 text-white rounded hover:bg-blue-700">Rechercher</button>
                </form>
                <select id="playlist-select" class="py-2 px-2 border rounded mt-4">
                    <option value="">Choisir une playlist</option>
                    @foreach ($playlists as $playlist)
                        <option value="{{ $playlist->id }}">{{ $playlist->name }}</option>
                    @endforeach
                </select>

                <div class="flex flex-col items-center gap-5 mt-10">
                    @if (isset($artistPicture) && isset($artistName))
                        <img class="w-48 h-48" src="{{ $artistPicture }}" alt="Photo de {{ $artistName }}">
                        <h2>{{ $artistName }}</h2>
                    @elseif(isset($error))
                        <p>{{ $error }}</p>
                    @else
                        <img class="w-48 h-48" src="{{ asset('images/replacement_image.png') }}" alt="Photo de remplacement">
                        <h2>Nom de l'artiste</h2>
                    @endif
                </div>
            </div>

            <div class="flex items-center">
                <ul class="h-[50vh] flex flex-wrap flex-col gap-10 mt-10">
                    @if (isset($topTracks) && count($topTracks) > 0)
                        @foreach ($topTracks as $track)
                            <li class="flex items-center gap-4">
                                <img class="w-16 h-16" src="{{ $track['album']['cover_medium'] }}" alt="Cover de {{ $track['title'] }}">
                                <h3 class="w-32">{{ $track['title'] }}</h3>
                                <form class="add-track-form" method="POST" action="{{ route('playlist.addTrack') }}">
                                    @csrf
                                    <input type="hidden" name="track_title" value="{{ $track['title'] }}">
                                    <input type="hidden" name="artist_name" value="{{ $track['artist']['name'] }}">
                                    <input type="hidden" name="deezer_id" value="{{ $track['id'] }}">
                                    <input type="hidden" name="playlist_id" class="playlist-id-input">
                                    <button class="mt-1 py-2 px-2 bg-green-600 text-white rounded hover:bg-green-700">Ajouter</button>
                                </form>
                            </li>
                        @endforeach
                    @else
                        <li>Aucune musique trouvée pour cet artiste.</li>
                    @endif
                </ul>
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

        .input::placeholder {
            color: #F3EEE7;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const playlistSelect = document.getElementById('playlist-select');
            
            const forms = document.querySelectorAll('.add-track-form');
            
            forms.forEach(form => {
                form.addEventListener('submit', function(event) {
                    const playlistInput = form.querySelector('.playlist-id-input');
                    
                    if (playlistSelect.value === "") {
                        event.preventDefault();
                        alert('Veuillez choisir une playlist avant d\'ajouter une musique.');
                    } else {
                        playlistInput.value = playlistSelect.value;
                    }
                });
            });
        });
    </script>
</body>

</html>

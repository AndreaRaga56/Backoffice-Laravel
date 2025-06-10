@extends('layouts.app')

@section('title', 'Aggiungi un nuovo Film')

@section('content')
    <main class="create">
        <div class="container">
            <h1 class="my-4 titolo">Aggiungi un nuovo Film</h1>

            <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="mb-3">
                    <label for="release_year" class="form-label">Anno di Uscita</label>
                    <input type="number" class="form-control" id="release_year" name="release_year" required>
                </div>

                <div class="mb-3">
                    <label for="director" class="form-label">Regista</label>
                    <input type="text" class="form-control" id="director" name="director" required>
                </div>

                <div class="mb-3">
                    <label for="genre" class="form-label">Genere</label>
                    <select class="form-select" id="genre" name="genre_id">
                        <option value="">Seleziona un genere</option>
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                </div>

                <div class="mb-3">
                    <label for="rating" class="form-label">Voto</label>
                    <input type="number" class="form-control" id="rating" name="rating" min="1" max="10"
                        step="0.1">
                </div>

                <div class="mb-3">
                    <label for="poster_url" class="form-label">Poster</label>
                    <input type="file" class="form-control" id="poster_url" name="poster_url" accept="image/*">
                </div>

                <div class="mb-3">
                    <label class="form-label">Piattaforme di Streaming</label>
                    <div>
                        @foreach ($streamingPlatforms as $platform)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="platform_{{ $platform->id }}"
                                    name="streamingPlatforms[]" value="{{ $platform->id }}">
                                <label class="form-check-label"
                                    for="platform_{{ $platform->id }}">{{ $platform->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-secondary">Aggiungi Film</button>
            </form>
            <div class="bottoni">
                <div>
                    <a href="{{ route('movies.index') }}" class="btn btn-secondary me-2">Torna alla lista</a>
                </div>
            </div>
        </div>

    </main>

@endsection

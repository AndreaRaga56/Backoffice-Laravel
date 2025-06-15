@extends('layouts.app')

@section('title', 'Modifica il film ' . $movie->title)

@section('content')
    {{-- @dd($movie->description); --}}
    <main class="edit">
        <div class="container">
            <h1 class="my-4 titolo">Modifica il film {{ $movie->title }}</h1>

            <form action="{{ route('movies.update', $movie) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $movie->title }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="release_year" class="form-label">Anno di Uscita</label>
                    <input type="number" class="form-control" id="release_year" name="release_year"
                        value="{{ $movie->release_year }}" required>
                </div>

                <div class="mb-3">
                    <label for="director" class="form-label">Regista</label>
                    <input type="text" class="form-control" id="director" name="director" value="{{ $movie->director }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="genre" class="form-label">Genere</label>
                    <select class="form-select" id="genre" name="genre_id">
                        <option value="">Seleziona un genere</option>
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}" {{ $movie->genre_id === $genre->id ? 'selected' : '' }}>
                                {{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="description" name="description" rows="4">{{ $movie->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="rating" class="form-label">Voto</label>
                    <input type="number" class="form-control" id="rating" name="rating" min="1" max="10"
                        step="0.1" value="{{ $movie->rating }}">
                </div>

                <div class="mb-3">
                    <label for="poster_url" class="form-label">Poster</label>
                    @if (!str_starts_with($movie->poster_url, 'http'))
                        <div class="mb-2 d-flex align-items-center">
                            <img src="{{ asset('storage/' . $movie->poster_url) }}" alt="Immagine progetto"
                                class="img-thumbnail me-3" style="max-width: 200px;">
                            <div class="d-flex flex-column flex-md-row gap-2">
                                <div class="d-flex flex-column gap-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="image_action" id="Mantieni"
                                            value="Mantieni" checked>
                                        <label class="form-check-label" for="mantieni">Mantieni</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="image_action" id="Elimina"
                                            value="Elimina">
                                        <label class="form-check-label" for="elimina">Elimina</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="image_action" id="Modifica"
                                            value="Modifica">
                                        <label class="form-check-label" for="modifica">Modifica</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <input type="file" class="form-control" id="poster_url" name="poster_url">
                </div>

                <div class="mb-3">
                    <label class="form-label">Piattaforme di streaming</label>
                    <div>
                        @foreach ($streamingPlatforms as $platform)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="platform_{{ $platform->id }}"
                                    name="streamingPlatforms[]" value="{{ $platform->id }}"
                                    {{ $movie->streamingPlatforms->contains($platform->id) ? 'checked' : '' }}>
                                <label class="form-check-label"
                                    for="platform_{{ $platform->id }}">{{ $platform->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-secondary">Modifica il film</button>
            </form>
            <div class="bottoni">
                <div>
                    <a href="{{ route('movies.show', $movie) }}" class="btn btn-secondary">Torna alla scheda del
                        film</a>
                </div>
            </div>
        </div>
    </main>
@endsection

@extends('layouts.app')

@section('title', $movie->title)

@section('content')
    <main>
        <div class="container d-flex justify-content-center flex-column align-items-center">
            <div class="my-card">
                <h1 class="mb-2">{{ $movie->title }}</h1>
                <div class="my-card-body">
                    <div class="col-12 col-sm-3">
                        <div class="poster">
                            @if (str_starts_with($movie->poster_url, 'http'))
                            <img src="{{ $movie->poster_url }}" @else <img
                                    src="{{ asset('storage/' . $movie->poster_url) }}" @endif
                                alt="Poster di {{ $movie->title }}" class="img-fluid">
                        </div>
                    </div>
                    <div class=" col-12 col-sm-9">
                        <div class="movie-details">
                            <p><strong>Anno: </strong>{{ $movie->release_year }}</p>
                            <p><strong>Regista: </strong>{{ $movie->director }}</p>


                            <p><strong>Genere: </strong>
                                @if ($movie->genre)
                                    {{ $movie->genre->name }}
                            </p>
                        @else
                            Non disponibile</p>
                            @endif


                            <p><strong>Descrizione: </strong>
                                @if ($movie->description)
                                    {{ $movie->description }}
                            </p>
                        @else
                            Descrizione non disponibile</p>
                            @endif


                            <p><strong>Voto:</strong>
                                @if ($movie->rating)
                                    {{ $movie->rating }}
                            </p>
                        @else
                            Voto non disponibile</p>
                            @endif


                            <p><strong>Piattaforme di streaming: </strong>
                                @if ($movie->streamingPlatforms->isNotEmpty())
                            </p>
                            <ul>
                                @foreach ($movie->streamingPlatforms as $platform)
                                    <li>{{ $platform->name }}</li>
                                @endforeach
                            </ul>
                        @else
                            Nessuna piattaforma disponibile</p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="bottoni">
                <div>
                    <a href="{{ route('movies.index') }}" class="btn btn-secondary me-2">Torna alla lista</a>
                </div>


                <div>
                    <a href="
                        {{-- {{ route('admin.movies.edit', $movie->id) }} --}}
                         "
                        class="btn btn-primary me-2">Modifica</a>

                    <form action="
                        {{-- {{ route('admin.movies.destroy', $movie->id) }} --}}
                         " method="POST"
                        class="d-inline" onsubmit="return confirm('Sei sicuro di voler eliminare questo film?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

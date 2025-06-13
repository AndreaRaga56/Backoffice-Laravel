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
                                @else
                                    Genere non disponibile
                                @endif
                            </p>

                            <p><strong>Voto:</strong>
                                @if ($movie->rating)
                                    {{ $movie->rating }}
                                @else
                                    Voto non disponibile
                                @endif
                            </p>

                            <p class="my-2"><strong>Descrizione: </strong>
                                @if ($movie->description)
                                    {{ $movie->description }}
                                @else
                                    Descrizione non disponibile
                                @endif
                            </p>

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

            <div class="bottoni mt-3 mb-1">
                <div>
                    <a href="{{ route('movies.edit', $movie) }}" class="btn btn-primary">Modifica</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">Elimina</button>
                </div>
                <div>
                    <a href="{{ route('movies.index') }}" class="btn btn-secondary ">Torna alla lista dei film</a>
                </div>
            </div>
        </div>
    </main>





    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Elimina il film</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare il film definitivamente?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route('movies.destroy', $movie) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina definitivamente</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

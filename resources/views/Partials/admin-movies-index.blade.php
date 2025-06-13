@extends('layouts.app')

@section('title', 'Tutti i film')

@section('content')
    <main>
        <div class="container d-flex justify-content-center flex-column align-items-center">
            <h1 class="my-4 titolo">Tutti i film</h1>

            <div class=" btn-index mb-2">
                <a href="{{ route('movies.create') }}" class="btn btn-secondary my-1">Aggiungi un nuovo film</a>
                <a href="{{ route('genres.index') }}" class="btn btn-secondary my-1">Gestisci
                    Generi</a>
                <a href="
           {{ route('streaming-platforms.index') }}
            " class="btn btn-secondary my-1">Gestisci
                    piattaforme</a>
            </div>

            <div class="my-table movie">
                <div class="row justify-content-center align-items-center">
                    <div class="th col-6 col-md-4 py-2">Titolo</div>
                    <div class="th col-2 col-md-1 py-2">Anno</div>
                    <div class="th col-4 py-2 regista">Regista</div>
                    <div class="th col-4 col-md-3 py-2"></div>
                </div>
                <hr />
                @foreach ($movies as $movie)
                    <div class="row justify-content-center align-items-center">
                        <div class="col-6 col-md-4 py-2">
                            {{ $movie->title }}
                        </div>
                        <div class="col-2 col-md-1 py-2">
                            {{ $movie->release_year }}
                        </div>
                        <div class="col-4 py-2 regista">
                            {{ $movie->director }}
                        </div>
                        <div class="col-4 col-md-3 py-2">
                            <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-primary">Visualizza</a>
                        </div>
                    </div>
                    @if (!$loop->last)
                        <hr />
                    @endif
                @endforeach
            </div>
        </div>
    </main>
@endsection

@extends('layouts.app')

@section('title', 'Tutti i Film')

@section('content')
    <main>
        <div class="container d-flex justify-content-center flex-column align-items-center">
            <h1 class="my-3 titolo">Tutti i Film</h1>

            <div class="mb-3">
                <a href="{{ route('movies.create') }}" class="btn btn-secondary m-1">Aggiungi un nuovo Film</a>
                <a href="
            {{-- {{ route('genres.index') }} --}}
            " class="btn btn-secondary m-1">Gestisci Generi</a>
                <a href="
            {{-- {{ route('streaming-platforms.index') }} --}}
            " class="btn btn-secondary m-1">Gestisci
                    Piattaforme</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Titolo</th>
                        <th>Anno</th>
                        <th>Regista</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movies as $movie)
                        <tr>
                            <td>{{ $movie->title }}</td>
                            <td>{{ $movie->release_year }}</td>
                            <td>{{ $movie->director }}</td>
                            <td class="d-flex justify-content-center action">
                                <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-primary">Visualizza</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </main>





@endsection

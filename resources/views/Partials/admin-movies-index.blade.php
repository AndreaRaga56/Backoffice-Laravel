@extends('layouts.app')

@section('title', 'Tutti i Film')

@section('content')
    {{-- @dd($movies[0]->title) --}}
    <div class="container d-flex justify-content-center flex-column align-items-center">
        <h1 class="my-3">Tutti i Film</h1>

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





    @endsection


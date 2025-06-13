@extends('layouts.app')

@section('title', 'CineWorld')

@section('content')
    <main>
        <div class="container ">
            <h1 class="my-3 text-center titolo"><strong>Benvenuto a CineWorld</strong>
                <br>
                <small class="sottotitolo">Il tuo cinema online</small>
            </h1>
            <div class="text-center my-4">
                <img src="{{ asset('/logo2.jpeg') }}" alt="CineWorld Logo" class="img-fluid logo2" style="max-width: 300px;">
            </div>
            <div class="my-3 text-center">
                <a href="{{ route('movies.index') }}" class="btn btn-danger btn-lg">
                    Vai alla lista dei film
                </a>
            </div>
        </div>
    </main>
@endsection

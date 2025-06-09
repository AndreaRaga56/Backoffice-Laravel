@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container ">
        <h2 class="fs-4 my-4">
            <strong>
                Dashboard
            </strong>
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Benvenuto</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Sei autenticato!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

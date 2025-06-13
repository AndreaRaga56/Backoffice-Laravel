@extends('layouts.app')

@section('title', 'Gestisci i Generi')

@section('content')
    <main class="genres">
        <div class="container d-flex justify-content-center flex-column align-items-center">
            <h1 class="my-4 titolo">Gestisci i Generi</h1>

            <div class=" btn-index mb-2">
                <a type="button" href="{{ route('movies.index') }}" class="btn btn-secondary my-1">Torna alla lista dei film</a>
                <a type="button" class="btn btn-primary my-1" data-bs-toggle="modal" data-bs-target="#addGenreModal">Aggiungi
                    nuovo</a>
            </div>

            <div class="my-table">
                <div class="row justify-content-center align-items-center">
                    <div class="th col-6 py-2">Nome</div>
                    <div class="th col-6 py-2">Azioni</div>
                </div>
                <hr />
                @foreach ($genres as $genre)
                    <div class="row justify-content-center align-items-center">
                        <div class="col-6 py-2">
                            {{ $genre->name }}
                        </div>
                        <div class="col-6 py-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editGenreModal{{ $genre->id }}">Modifica</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteGenreModal{{ $genre->id }}">Elimina</button>
                        </div>
                    </div>
                    @if (!$loop->last)
                        <hr />
                    @endif
                @endforeach
            </div>
        </div>
    </main>

    @foreach ($genres as $genre)
        <!-- Edit Modal -->
        <div class="modal fade" id="editGenreModal{{ $genre->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="editGenreModal{{ $genre->id }}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editGenreModal{{ $genre->id }}Label">Modifica il
                            nome del Genere</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('genres.update', $genre) }}" id="editGenreForm{{ $genre->id }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="genreName" class="form-label">Nome Genere</label>
                                <input type="text" class="form-control" id="genreName" name="name"
                                    value="{{ $genre->name }}" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                            <button type="submit" class="btn btn-primary">Salva Modifiche</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteGenreModal{{ $genre->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="deleteGenreModal{{ $genre->id }}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteGenreModal{{ $genre->id }}Label">Elimina
                            Genere</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Sei sicuro di voler eliminare <strong class="text-danger">{{ $genre->name }}</strong> definitivamente?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <form action="{{ route('genres.destroy', $genre) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina definitivamente</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Add Modal -->
    <div class="modal fade" id="addGenreModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="addGenreModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addGenreModalLabel">Aggiungi un Nuovo Genere</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('genres.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="genreName" class="form-label">Nome Genere</label>
                            <input type="text" class="form-control" id="genreName" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <button type="submit" class="btn btn-primary">Aggiungi Genere</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

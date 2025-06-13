@extends('layouts.app')

@section('title', 'Tutte le Piattaforme di Streaming')

@section('content')
<main class="genres">
        <div class="container d-flex justify-content-center flex-column align-items-center">
            <h1 class="my-4 titolo">Tutte le Piattaforme di Streaming</h1>

            <div class=" btn-index mb-2">
                <a type="button" href="{{ route('movies.index') }}" class="btn btn-secondary my-1">Torna ai Film</a>
                <a type="button" class="btn btn-primary my-1" data-bs-toggle="modal" data-bs-target="#addStreamingPlatformModal">Aggiungi
                    nuova</a>
            </div>

            <div class="my-table">
                <div class="row justify-content-center align-items-center">
                    <div class="th col-6 py-2">Nome</div>
                    <div class="th col-6 py-2">Azioni</div>
                </div>
                <hr />
                @foreach ($streamingPlatforms as $platform)
                    <div class="row justify-content-center align-items-center">
                        <div class="col-6 py-2">
                            {{ $platform->name }}
                        </div>
                        <div class="col-6 py-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editPlatformModal{{ $platform->id }}">Modifica</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deletePlatformModal{{ $platform->id }}">Elimina</button>
                        </div>
                    </div>
                    @if (!$loop->last)
                        <hr />
                    @endif
                @endforeach
            </div>
        </div>
    </main>

    @foreach ($streamingPlatforms as $platform)

        <!-- Edit Modal -->
        <div class="modal fade" id="editPlatformModal{{ $platform->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="editPlatformModal{{ $platform->id }}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editPlatformModal{{ $platform->id }}Label">Modifica il
                            nome della Piattaforma</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('streaming-platforms.update', $platform) }}" id="editPlatformForm{{ $platform->id }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="platformName" class="form-label">Nome Piattaforma</label>
                                <input type="text" class="form-control" id="platformName" name="name"
                                    value="{{ $platform->name }}" required>
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
        <div class="modal fade" id="deletePlatformModal{{ $platform->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="deletePlatformModal{{ $platform->id }}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deletePlatformModal{{ $platform->id }}Label">Elimina
                            Piattaforma</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Sei sicuro di voler eliminare <strong class="text-danger">{{ $platform->name }}</strong> definitivamente?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <form action="{{ route('streaming-platforms.destroy', $platform) }}" method="POST" class="d-inline">
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
    <div class="modal fade" id="addStreamingPlatformModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="addStreamingPlatformModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addStreamingPlatformModalLabel">Aggiungi una Nuova Piattaforma</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('streaming-platforms.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="platformName" class="form-label">Nome Piattaforma</label>
                            <input type="text" class="form-control" id="platformName" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <button type="submit" class="btn btn-primary">Aggiungi Piattaforma</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

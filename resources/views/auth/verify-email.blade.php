{{-- @extends('layouts.app')

@section('title', 'Verifica Email')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Verifica il tuo indirizzo email</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                Una nuova email di verifica è stata inviata al tuo indirizzo.
                            </div>
                        @endif

                        Prima di procedere, controlla la tua email per il link di verifica.
                        Se non hai ricevuto l'email,
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">clicca qui per richiederne un'altra</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

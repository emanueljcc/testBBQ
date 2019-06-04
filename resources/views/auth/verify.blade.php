@extends('layouts.appLogin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col m8">
            <div class="card">
                <div class="card-header">{{ __('Verificar tu Dirección E-Mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, por favor revise su correo electrónico para un enlace de verificación.') }}
                    {{ __('Si no ha recibido el correo electrónico.') }}, <a href="{{ route('verification.resend') }}">{{ __('haga clic aquí para solicitar otra') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

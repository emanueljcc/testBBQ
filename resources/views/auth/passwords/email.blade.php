@extends('layouts.appLogin')

@section('content')

<div class="mn-content valign-wrapper">
    <main class="mn-inner container ">
        <div class="valign">
            <div class="row">
                <div class="col s12 m6 l6 offset-l3 offset-m3">
                    <div class="card white darken-1">
                        <div class="card-content ">
                            <span class="card-title">{{ __('Resetear Contraseña') }}</span>
                            <div class="row">

                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <div class="input-field col s12"">

                                        <div class="col m6">
                                            <input id="email" type="email" class="validate form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            <label for="email">{{ __('E-Mail') }}</label>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col s12 right-align m-t-sm">
                                        <div class="col m6 s12 left">
                                            <a class="waves-effect waves-grey btn-flat" href="{{ route('login') }}">{{ __('Atras') }}</a>
                                        </div>
                                        <div class="col m6 s12 right">
                                            <button type="submit" class="waves-effect waves-light btn teal">
                                                {{ __('Enviar contraseña Restablecer enlace') }}
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@endsection

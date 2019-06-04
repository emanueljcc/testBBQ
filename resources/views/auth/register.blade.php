@extends('layouts.appLogin')

@section('content')

<div class="mn-content valign-wrapper">
    <main class="mn-inner container ">
        <div class="valign">
            <div class="row" style="margin-bottom: 0 !important;">
                <div class="col s12 m8 l7 offset-l2 offset-m2">
                    <div class="card white darken-1">
                        <div class="card-content" style="padding: 13px;">
                            <span class="card-title">{{ __('Registrate') }}</span>
                            <div class="row">
                                {{-- init form --}}
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="input-field col s12">

                                        <div class="col m6">
                                            <input id="name" type="text" class="validate form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            <label for="name">{{ __('Nombre') }}</label>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="input-field col s12">

                                        <div class="col m6">
                                            <input id="email" type="email" class="validate form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                            <label for="email">{{ __('E-Mail') }}</label>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="input-field col s12">

                                        <div class="col m6">
                                            <input id="password" type="password" class="validate form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                            <label for="password">{{ __('Contraseña') }}</label>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="input-field col s12">
                                        <div class="col m6">
                                            <input id="password-confirm" type="password" class="validate form-control" name="password_confirmation" required autocomplete="new-password">
                                            <label for="password-confirm">{{ __('Confirmar contraseña') }}</label>
                                        </div>
                                    </div>
                                    {{-- section button --}}
                                    <div class="col s12 right-align m-t-sm">
                                        <div class="col m6 left">
                                            <a class="waves-effect waves-grey btn-flat" href="{{ route('login') }}">{{ __('Atras') }}</a>
                                        </div>
                                        <div class="col m6 right">
                                            <button type="submit" class="waves-effect waves-light btn teal">
                                                {{ __('Registrar') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                {{-- close form --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection

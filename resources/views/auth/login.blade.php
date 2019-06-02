@extends('layouts.appLogin')

@section('content')

<div class="mn-content valign-wrapper">
    <main class="container">
        <div class="valign">
            <div class="row" style="margin-bottom: 0 !important;">
                <div class="col s12 m8 l7 offset-l2 offset-m2">
                    <div class="card white darken-1">
                        <div class="card-content" style="padding: 13px;">
                            <span class="card-title">{{ __('Login') }}</span>
                            <div class="row">
                                {{-- init form --}}
                                <form method="POST" class="col s12" action="{{ route('login') }}">
                                    @csrf

                                    <div class="input-field col s12">

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="validate" id="email" type="email" class="validate form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            <label for="email">{{ __('E-Mail') }}</label>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="input-field col s12">

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="validate form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            <label for="password">{{ __('Contraseña') }}</label>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="input-field col s12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Recuerdame') }}
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col s12 center" style="margin-top: 2em;">
                                        @if (Route::has('register'))
                                            <a class="waves-effect waves-grey btn-flat" href="{{ route('register') }}">{{ __('Registrate') }}</a>
                                        @endif
                                        <button type="submit" class="waves-effect waves-light btn teal">{{ __('Iniciar Sesión') }}</button>
                                    </div>

                                    @if (Route::has('password.request'))
                                        <center style="margin: 20em 0 0 0;">
                                            <a href="{{ route('password.request') }}">
                                                {{ __('¿Olvidaste tu contraseña?') }}
                                            </a>
                                        </center>
                                    @endif

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

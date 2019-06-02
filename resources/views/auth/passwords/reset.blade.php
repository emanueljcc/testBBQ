@extends('layouts.appLogin')

@section('content')

<div class="mn-content valign-wrapper">
    <main class="mn-inner container ">
        <div class="valign">
            <div class="row">
                <div class="col s12 m6 l6 offset-l3 offset-m3">
                    <div class="card white darken-1">
                        <div class="card-content ">
                            <span class="card-title">{{ __('Reset Password') }}</span>
                            <div class="row">
                                {{-- init form --}}
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf

                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="input-field col s12">
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="validate form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
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
                                            <input id="password" type="password" class="validate form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                            <label for="password">{{ __('Password') }}</label>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="input-field col s12">
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="validate form-control" name="password_confirmation" required autocomplete="new-password">
                                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                        </div>
                                    </div>

                                    <div class="col s12 right-align m-t-sm">
                                        <div class="col-md-6 col-sm-12 left">
                                            <a class="waves-effect waves-grey btn-flat" href="{{ route('login') }}">{{ __('Atras') }}</a>
                                        </div>
                                        <div class="col-md-6 col-sm-12 right">
                                            <button type="submit" class="waves-effect waves-light btn teal">
                                                {{ __('Reset Password') }}
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

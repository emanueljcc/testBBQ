@extends('layouts.app')

@section('content')

<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">BARBACOAS</div>
        </div>
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    Agregar nueva Barbacoa
                    <div class="right">
                        <a class="waves-effect waves btn-flat m-b-xs minorTop" href="{{ route('companies.index') }}"> Volver</a>
                    </div>
                </div>
            </div>
        </div>



        <div class="row no-m-t no-m-b">
            <div class="col s12 m12 l12">

                @include('alerts/alert')

                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Registrar Barbacoa</span>
                        <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <center>
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type="file" id="photo" name="photo">
                                            <label for="photo"></label>
                                        </div>
                                        <div class="avatar-preview">
                                        @php
                                            $imgUser = "img/picture.png";
                                        @endphp
                                        <div id="imagePreview" style="background-image: url({{ url($imgUser) }})"></div>
                                        </div>
                                    </div>
                                </center>

                                <div class="input-field col s12">
                                    <input id="model" type="text" class="validate form-control" name="model" required>
                                    <label for="model">{{ __('Modelo') }}</label>
                                </div>

                                <div class="input-field col s12">
                                    <input id="description" type="text" class="validate form-control" name="description" required>
                                    <label for="description">{{ __('Descripción') }}</label>
                                </div>

                                <div class="input-field col s12">
                                    <input id="zipCode" type="text" class="validate form-control" name="zipCode" required>
                                    <label for="zipCode">{{ __('ZIP Code') }}</label>
                                </div>

                                <div class="col s12 m12 text-center">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

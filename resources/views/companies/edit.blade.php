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
                    Editar Barbacoa
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
                        <span class="card-title">Editar Barbacoa</span>
                        <form action="{{ route('companies.update',$company->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <center>
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type="file" id="photo" name="photo">
                                            <label for="photo"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            @php
                                            if ($company->photo) {
                                                $imgUser = "img/".$company->photo;
                                            } else {
                                                $imgUser = "img/picture.png";
                                            }
                                            @endphp
                                            <div id="imagePreview" style="background-image: url({{ url($imgUser) }})"></div>
                                        </div>
                                    </div>
                                </center>

                                <div class="input-field col s12">
                                    <input id="model" type="text" class="validate form-control" name="model" value="{{ $company->model }}" required>
                                    <label for="model">{{ __('Modelo') }}</label>
                                </div>

                                <div class="input-field col s12">
                                    <input id="description" type="text" class="validate form-control" name="description" value="{{ $company->description }}" required>
                                    <label for="description">{{ __('Descripción') }}</label>
                                </div>

                                <div class="input-field col s12">
                                    <input id="zipCode" type="text" class="validate form-control" name="zipCode" value="{{ $company->zipCode }}" required>
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

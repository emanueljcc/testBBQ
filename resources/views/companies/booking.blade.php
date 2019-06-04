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
                    Alquilar Barbacoa
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
                        <span class="card-title">Alquilar Barbacoa</span>
                        <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="input-field col s4">
                                    {!!Form::select('user_id', $users, null, ['id'=>'user_id','placeholder' => 'Elija una opcion', 'class' => 'validate form-control','required'=>'required'])!!}
                                    <label for="user_id">{{ __('Usuario') }}</label>
                                </div>

                                <div class="input-field col s4">
                                    {!!Form::select('barbacoa_id', $companies, null, ['id'=>'barbacoa_id','placeholder' => 'Elija una opcion', 'class' => 'validate form-control','required'=>'required'])!!}
                                    <label for="barbacoa_id">{{ __('Barbacoa') }}</label>
                                </div>


                                <input type="text" name="datetimes" id="reportdatetime"/>



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

@section('js')

    <script>

        // range datetime picker

    </script>
@endsection

@endsection

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
                        <form action="{{ route('bookingStore') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="input-field col s4">
                                    {!!Form::select('user_id', $users, null, ['id'=>'user_id','placeholder' => 'Elija una opcion', 'class' => 'validate form-control','required'=>'required'])!!}
                                    <label for="user_id">{{ __('Usuario') }}</label>
                                </div>

                                <div class="input-field col s4">
                                    {!!Form::select('company_id', $companies, null, ['id'=>'company_id','placeholder' => 'Elija una opcion', 'class' => 'validate form-control','required'=>'required'])!!}
                                    <label for="company_id">{{ __('Barbacoa') }}</label>
                                </div>

                                <div class="input-field col s4">
                                    {!! Form::text('date',null,['class'=>'validate form-control','id'=>'date','required'=>'required']) !!}
                                    <label for="date">{{ __('Rango de fecha') }}</label>
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

@section('js')

<script>
    // range datetime picker
    $('#date').dateRangePicker(
        {
        startOfWeek: 'monday',
        separator : '~',
        format: 'DD-MM-YYYY HH:mm:ss',
        autoClose: false,
        language:'es',
        time: {
            enabled: true
        }
    })
</script>

@endsection

@endsection

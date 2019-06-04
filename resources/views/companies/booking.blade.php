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

                            <center><span>Solo se está mostrando las barbacoas que estan a 10 KM de la posicion actual de este dispositivo.</span></center>
                            <br><br>

                            <div class="row">

                                <div class="input-field col s4">
                                    {!!Form::select('user_id', $users, null, ['id'=>'user_id','placeholder' => 'Elija una opcion', 'class' => 'validate form-control','required'=>'required'])!!}
                                    <label for="user_id">{{ __('Usuario') }}</label>
                                </div>

                                <div class="input-field col s4">
                                    {{-- {!!Form::select('company_id', $companies, null, ['id'=>'company_id','placeholder' => 'Elija una opcion', 'class' => 'validate form-control','required'=>'required'])!!} --}}
                                    <select name="company_id" id="company_id" placeholder="Elija una opcion" class="validate form-control" required></select>
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
    });


    // obtener posiciones en KM
    getKM = function(lat1, lon1, lat2, lon2)
    {
        rad = function(x) {return x*Math.PI/180;}
        let R = 6378.137, //Radio de la tierra en km
            dLat = rad( lat2 - lat1 ),
            dLong = rad( lon2 - lon1 ),
            a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(rad(lat1)) * Math.cos(rad(lat2)) * Math.sin(dLong/2) * Math.sin(dLong/2),
            c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)),
            d = R * c;
        return d.toFixed(3); //Retorna tres decimales
    }


    // obtener la posicion del usuario dispositivo
    navigator.geolocation.getCurrentPosition(function(pos) {
        let lat = pos.coords.latitude,
            lon = pos.coords.longitude,
            A = JSON.parse('{!! json_encode($arrCoords) !!}'),
            B = [];



        for(let i in A){
            if(parseInt(getKM(lat, lon, A[i].lat, A[i].lon)) <= 10)
                B.push(A[i]);
        }

        console.log("array de BBQ disponibles ", B)
        //insertando las barbacoas dispobles en el rango de 10km al select
        for(let x in B){
            $('#company_id').append($('<option>',
                {
                    value: B[x].id,
                    text : B[x].model
                }
            ));
            $('#company_id').material_select();
        }

    })




</script>

@endsection

@endsection

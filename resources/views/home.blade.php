@extends('layouts.app')

@section('content')

<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Dashboard</div>
        </div>
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    Menu principal
                </div>
            </div>
        </div>

        <div class="row no-m-t no-m-b">

            {{-- table bookings --}}
            <div class="col s12 m6 l12">
                <div class="card">

                    @include('alerts/alert')
                    <br>

                    <div class="card-content">
                    <span class="card-title">Alquileres <span class="new badge blue" data-badge-caption="" style="border-radius: 50px;"><b>{{count($bookings)}}</b></span></span>
                        <table class="highlight">
                            <thead>
                                <tr>
                                    <th style="text-align:center;">Usuario</th>
                                    <th style="text-align:center;">Barbacoa</th>
                                    <th style="text-align:center;width:50%;">Fecha de alquiler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                    <tr>
                                        <td style="text-align:center;">{{$booking->name}}</td>
                                        <td style="text-align:center;">{{$booking->model}}</td>
                                        <td style="text-align:center;">{{date("d/m/Y H:mm", strtotime($booking->date_start))." - ".date("d/m/Y H:mm", strtotime($booking->date_end))}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- table bookings --}}

        </div>
    </div>
</main>

@endsection

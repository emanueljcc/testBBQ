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



            {{-- table users --}}
            <div class="col s12 m6 l6">
                <div class="card">
                    <div class="card-content">
                    <span class="card-title">Usuarios registrados <span class="new badge blue" data-badge-caption="" style="border-radius: 50px;">{{count($users)}}</span></span>
                        <table class="striped">
                            <thead>
                                <tr>
                                    <th style="text-align:center;">Nombre</th>
                                    <th style="text-align:center;">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td style="text-align:center;">{{$user->name}}</td>
                                        <td style="text-align:center;">{{$user->email}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- table users --}}


            {{-- table users --}}
            <div class="col s12 m6 l6">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Barbacoas registradas <span class="new badge red" data-badge-caption="" style="border-radius: 50px;">{{count($companies)}}</span></span>
                        <table class="striped">
                            <thead>
                                <tr>
                                    <th style="text-align:center;">Modelo</th>
                                    <th style="text-align:center;">Descripcion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($companies as $company)
                                <tr>
                                    <td style="text-align:center;">{{$company->model}}</td>
                                    <td style="text-align:center;">{{$company->description}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- table users --}}

        </div>
    </div>
</main>

@endsection

@extends('layouts.app')

@section('content')

    <main class="mn-inner">
        <div class="row">
            <div class="col s12">
                <div class="page-title">Barbacoas</div>
            </div>
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        Listado de Barbacoas
                        <div class="right">
                            <a class="waves-effect waves-green btn-flat m-b-xs minorTop" href="{{ route('companies.create') }}"> Crear nueva Barbacoa</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row no-m-t no-m-b">
                <div class="col s12 m12 l12">

                    @include('alerts/alert')

                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Barbacoas registradas</span>

                            <table id="example" class="display responsive-table datatable-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="text-align:center;">Foto</th>
                                        <th style="text-align:center;">Modelo</th>
                                        <th style="text-align:center;">Descripción</th>
                                        <th style="text-align:center;">ZIP Code</th>
                                        <th style="text-align:center;">Acción</th>
                                    </tr>
                                </thead>
                                {{-- <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Foto</th>
                                        <th>Modelo</th>
                                        <th>Descripción</th>
                                        <th>ZIP Code</th>
                                        <th>Acción</th>
                                    </tr>
                                </tfoot> --}}
                                <tbody>
                                    @foreach ($companies as $company)
                                        <tr>
                                            <td style="text-align:center;">{{ ++$i }}</td>
                                            <td style="text-align:center;">
                                                @if($company->photo)
                                                    <img class="circle responsive-img valign" width="50" src="img/{{ $company->photo }}" alt="foto">
                                                @else
                                                    <img class="circle responsive-img valign" width="50" src="img/img.png" alt="foto">
                                                @endif
                                            </td>
                                            <td style="text-align:center;">{{ $company->model }}</td>
                                            <td style="text-align:center;">{{ $company->description }}</td>
                                            <td style="text-align:center;">{{ $company->zipCode }}</td>
                                            <td style="text-align:center;">
                                                <form action="{{ route('companies.destroy',$company->id) }}" method="POST">

                                                    <a class="waves-effect waves-light" href="{{ route('companies.edit',$company->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    &nbsp;&nbsp;
                                                    <button class="btnIcon" type="submit">
                                                        <i class="fa fa-trash" style="color: red;" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


{{--

                            <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>

                                    </tbody>
                                </table>
 --}}




                            {{-- {!! $companies->links() !!} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

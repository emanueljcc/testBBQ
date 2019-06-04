<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use App\Booking;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;
use DB;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all()->sortByDesc('created_at');

        return view('companies.index',compact('companies'))
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'model' => 'required',
            'description' => 'required',
            'zipCode' => 'required',
            'direction' => 'required',
            'lat' => 'required',
            'lon' => 'required'
        ]);

        $companies = new Company;

        if($request->hasFile('photo')){

            // ruta de las imagenes guardadas
            $ruta = public_path().'/img/';
            // recogida del form
            $imagenOriginal = $request->file('photo');
            // crear instancia de imagen
            $imagen = Image::make($imagenOriginal);
            // generar un nombre aleatorio para la imagen
            $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
            $imagen->resize(300,300);
            // guardar imagen
            // save( [ruta], [calidad])
            $imagen->save($ruta . $temp_name, 100);
            $companies->photo = $temp_name;
        } else
            $companies->photo = null;

        $companies->model = $request->model;
        $companies->description = $request->description;
        $companies->zipCode = $request->zipCode;
        $companies->direction = $request->direction;
        $companies->lat = $request->lat;
        $companies->lon = $request->lon;
        $companies->save();

        return redirect()->route('companies.index')
                        ->with('success','Barbacoa creada exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'model' => 'required',
            'description' => 'required',
            'zipCode' => 'required',
            'direction' => 'required',
            'lat' => 'required',
            'lon' => 'required'
        ]);

        $companies = Company::findOrFail($company->id);

        // comprobar si el request viene con imagen
        if($request->hasFile('photo')){
            $ruta = public_path().'/img/';
            $imagenOriginal = $request->file('photo');
            $imagen = Image::make($imagenOriginal);
            $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
            $imagen->resize(300,300);
            $imagen->save($ruta . $temp_name, 100);
            $companies->photo = $temp_name;
        }


        $companies->model = $request->model;
        $companies->description = $request->description;
        $companies->zipCode = $request->zipCode;
        $companies->direction = $request->direction;
        $companies->lat = $request->lat;
        $companies->lon = $request->lon;
        $companies->update();

        return redirect()->route('companies.index')
                        ->with('success','Barbacoa actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')
                        ->with('success','Barbacoa eliminada exitosamente');
    }

    protected function random_string()
    {
        $key = '';
        $keys = array_merge( range('a','z'), range(0,9) );

        for($i=0; $i<10; $i++)
        {
            $key .= $keys[array_rand($keys)];
        }

        return $key;
    }


    public function bookingBBQ(){
        $users = User::pluck('name', 'id');
        $companies = Company::pluck('model', 'id');

        $arrCoords = [];
        $coords = Company::all();
        foreach ($coords as $key => $value) {
            $collection = collect([
                'id' => $value->id,
                'model' => $value->model,
                'lat' => $value->lat,
                'lon' => $value->lon
            ]);

            array_push($arrCoords, $collection);
        }
        return view('companies.booking', ['users'=>$users, 'companies'=>$companies, 'arrCoords'=>$arrCoords]);
    }


    public function bookingStore(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'company_id' => 'required',
            'date' => 'required'
        ]);

        //saparar fechas
        $dates = explode("~", $request->date);

        // buscar en BD si existe ya un registro
        $existsBooking = $this->returnExistsBBQ($request, $dates);

        if(count($existsBooking) === 0) {
            $companies = new Booking;
            $companies->user_id = $request->user_id;
            $companies->company_id = $request->company_id;
            $companies->date_start = Carbon::parse($dates[0]);
            $companies->date_end = Carbon::parse($dates[1]);
            $companies->save();

            return redirect()->route('home')
                            ->with('success','Barbacoa Alquilada exitosamente.');
        }
        else
            return redirect()->back()->withInput()->with('error', "No puede guardar porque ya el local fue alquilado en la fecha escogida.");
    }


    // funcion buscar en BD si existe ya un registro
    protected function returnExistsBBQ($request, $dates){
        $existsBooking = DB::table('bookings')
        ->where([
            ['user_id', '=', $request->user_id],
            ['company_id', '=', $request->company_id],
            ['date_start', '>=', Carbon::parse($dates[0])],
            ['date_end', '<=', Carbon::parse($dates[1])]
        ])
        ->whereBetween('date_start', [Carbon::parse($dates[0]), Carbon::parse($dates[1])])
        ->whereBetween('date_end', [Carbon::parse($dates[0]), Carbon::parse($dates[1])])
        ->pluck('id');

        return $existsBooking;
    }

}

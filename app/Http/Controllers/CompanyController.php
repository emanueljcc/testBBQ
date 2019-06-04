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
        $companies = Company::all();

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
            'zipCode' => 'required'
        ]);

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

        }else{
            $companies->photo = null;
        }


        $companies = new Company;
        $companies->model = $request->model;
        $companies->description = $request->description;
        $companies->zipCode = $request->zipCode;
        $companies->save();

        return redirect()->route('companies.index')
                        ->with('success','Barbacoa creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show',compact('company'));
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
            'zipCode' => 'required'
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
        return view('companies.booking', ['users'=>$users, 'companies'=>$companies]);
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

}

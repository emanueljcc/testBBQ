<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Image;

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
}

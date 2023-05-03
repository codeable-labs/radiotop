<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regiones = Region::orderBy('id','desc')->get();

        return view('backend.region.index',['regiones'=>$regiones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.region.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $region = new Region();

        $region->nombre = $request->nombre;

        if($request->file('icono')){
            $path = $request->icono->store('region');
            $region->icono  = $path;
        }

        $region->save();

        return redirect()->route('regiones.index')->with('info','Región creada');
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $region =  Region::find($id);

        return view('backend.region.edit',['region'=>$region]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $region =  Region::find($id);

        $region->nombre = $request->nombre;
        if($request->file('icono')){
            $path = $request->icono->store('region');
            $region->icono  = $path;
        }

        $region->save();

        return redirect()->route('regiones.index')->with('info','Región actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Region::find($request->id)->delete();
        return redirect()->route('regiones.index')->with('info','Región eliminado con éxito');
    }
}

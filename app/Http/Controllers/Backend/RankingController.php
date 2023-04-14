<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Register;
use Illuminate\Support\Facades\Storage;
use App\Models\Artist;
use App\Models\Region;
use App\Models\Gender;

class RankingController extends Controller
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
        $registros = Register::orderBy('id','desc')->get();

        return view('backend.ranking.index',['registros'=>$registros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artistas = Artist::orderBy('id','desc')->get();
        $regiones = Region::orderBy('id','desc')->get();
        $generos = Gender::orderBy('id','desc')->get();
        
        return view('backend.ranking.create',['artistas'=>$artistas,'regiones'=>$regiones,'generos'=>$generos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $registro = new Register();

        $registro->artist_id = $request->artista;
        $registro->region_id = $request->region;
        $registro->gender_id = $request->genero;

        if($request->file('archivo')){
            $path = $request->archivo->store('ranking');
            $registro->archivo  = $path;
       }

        
        $registro->save();

        return redirect()->route('ranking.index')->with('info','Registro creado');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = Register::find($id);

        $artistas = Artist::orderBy('id','desc')->get();
        $regiones = Region::orderBy('id','desc')->get();
        $generos = Gender::orderBy('id','desc')->get();
        
        return view('backend.ranking.edit',['ranking'=>$registro,'artistas'=>$artistas,'regiones'=>$regiones,'generos'=>$generos]);
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
        $registro =  Register::find($id);

        $registro->artist_id = $request->artista;
        $registro->region_id = $request->region;
        $registro->gender_id = $request->genero;
        if($request->file('archivo')){
            $path = $request->archivo->store('ranking');
            $registro->archivo  = $path;
       }
        $registro->save();

        return redirect()->route('ranking.index')->with('info','Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       
        Register::find($request->id)->delete();
        return redirect()->route('ranking.index')->with('info','Región eliminado con éxito');
    }
}

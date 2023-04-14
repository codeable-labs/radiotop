<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gender;

class GenderController extends Controller
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
        $generos = Gender::orderBy('id','desc')->get();

        return view('backend.genero.index',['generos'=>$generos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.genero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $genero = new Gender();

        $genero->nombre = $request->nombre;
        $genero->icono = $request->icono;

        $genero->save();

        return redirect()->route('generos.index')->with('info','Genero creado');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genero = Gender::find($id);
        return view('backend.genero.edit',['genero'=>$genero]);
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
        $genero = Gender::find($id);

        $genero->nombre = $request->nombre;
        $genero->icono = $request->icono;

        $genero->save();

        return redirect()->route('generos.index')->with('info','Genero actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Artist::find($request->id)->delete();
        return redirect()->route('artistas.index')->with('info','Artista eliminado con éxito');
    }
}

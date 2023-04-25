<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Block;
class BloqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bloques = Block::orderBy('id','desc')->get();

        return view('backend.bloque.index',['bloques'=>$bloques]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.bloque.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bloque = new  Block();
        $bloque->titulo = $request->titulo;
        $bloque->tipo_enlace = $request->tipo_enlace;
        $bloque->enlace = $request->enlace;
        $bloque->descripcion = $request->descripcion;

        $bloque->save();

       
        return redirect()->route('bloques.index')->with('info','Bloque creado');
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bloque = Block::find($id);
        return view('backend.bloque.edit',['bloque'=>$bloque]);
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
        $bloque =   Block::find($id);
        $bloque->titulo = $request->titulo;
        $bloque->tipo_enlace = $request->tipo_enlace;
        $bloque->enlace = $request->enlace;
        $bloque->descripcion = $request->descripcion;

        $bloque->save();

       
        return redirect()->route('bloques.index')->with('info','Bloque actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Block::find($request->id)->delete();
        return redirect()->route('notas.index')->with('info','bloque eliminado con éxito');
    }
}



				
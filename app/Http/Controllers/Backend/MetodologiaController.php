<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Methodology;

class MetodologiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultados = Methodology::orderBy('id','desc')->get();

        return view('backend.metodologia.index',['resultados'=>$resultados]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.metodologia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $metodo = new Methodology();
        $metodo->titulo = $request->titulo;
        $metodo->contenido = $request->contenido;
        $metodo->orden = $request->orden;

        $metodo->save();

        return redirect()->route('metodologias.index')->with('info','Item creada');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $metodo =  Methodology::find($id);

        return view('backend.metodologia.edit',['metodo'=>$metodo]);
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
        $metodo = Methodology::find($id);
        $metodo->titulo = $request->titulo;
        $metodo->contenido = $request->contenido;
        $metodo->orden = $request->orden;

        $metodo->save();

        return redirect()->route('metodologias.index')->with('info','Item actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Methodology::find($request->id)->delete();
        return redirect()->route('metodologias.index')->with('info','Item eliminado con éxito');
    }
}

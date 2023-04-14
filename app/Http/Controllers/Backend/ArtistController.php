<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artist;
class ArtistController extends Controller
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
        $artistas = Artist::orderBy('id','desc')->get();
        return view("backend.artista.index",['artistas'=>$artistas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.artista.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $artista = new Artist();

        $artista->nombre = $request->nombre;
        $artista->save();

        return redirect()->route('artistas.index')->with('info','Artista creado');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artista = Artist::find($id);

        return view('backend.artista.edit',['artista'=>$artista]);
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
        $artista =  Artist::find($id);

        $artista->nombre = $request->nombre;
        $artista->save();

        return redirect()->route('artistas.index')->with('info','Artista actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        Artist::find($request->id)->delete();
        return redirect()->route('artistas.index')->with('info','Artista eliminado con éxito');
    }
}

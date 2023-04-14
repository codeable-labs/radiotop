<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;

class PostController extends Controller
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
        $notas = Post::orderBy('id','desc')->get();

       
        return view('backend.notas.index',['notas'=>$notas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.notas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $nota = new Post();
        $nota->titulo = $request->titulo;
        $nota->descripcion = $request->descripcion;

        if($request->file('archivo')){
            $path = $request->archivo->store('notas');
            $nota->archivo  = $path;
        }
       if($request->file('imagen')){
            $path = $request->imagen->store('notas');
            $nota->imagen  = $path;
        }

       $nota->save();

       return redirect()->route('notas.index')->with('info','nota creada');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nota = Post::find($id);
        return view('backend.notas.edit',['nota'=>$nota]);
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
        
        $nota = Post::find($id);
        $nota->titulo = $request->titulo;
        $nota->descripcion = $request->descripcion;

        if($request->file('archivo')){
            $path = $request->archivo->store('notas');
            $nota->archivo  = $path;
        }
       if($request->file('imagen')){
            $path = $request->imagen->store('notas');
            $nota->imagen  = $path;
        }

       $nota->save();
        
        return redirect()->route('notas.index')->with('info','nota actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Post::find($request->id)->delete();
        return redirect()->route('notas.index')->with('info','Nota eliminado con éxito');
    }
}

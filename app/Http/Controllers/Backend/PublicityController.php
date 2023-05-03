<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publicity;
use App\Models\Place;
use Illuminate\Support\Facades\Storage;

class PublicityController extends Controller
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
    { $publicidades = Publicity::orderBy('id','desc')->get();
        return view('backend.publicidad.index',['publicidades'=>$publicidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lugares = Place::orderBy('id','desc')->get();

        return view('backend.publicidad.create',['lugares'=>$lugares]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $registro = new Publicity();

        $registro->place_id = $request->lugar;
        $registro->url = $request->url;

       
        if($request->file('imagen')){
            $path = $request->imagen->store('publicidad');
            $registro->imagen  = $path;
       }
        if($request->file('movil')){
            $path2 = $request->movil->store('publicidad');
            $registro->movil  = $path2;
        }


        $registro->save();

        return redirect()->route('publicidad.index')->with('info','publicidad creada');
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publicidad = Publicity::find($id);
        $lugares = Place::orderBy('id','desc')->get();
        return view('backend.publicidad.edit',['publicidad'=>$publicidad,'lugares'=>$lugares]);
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
        $registro =  Publicity::find($id);

        $registro->place_id = $request->lugar;
        $registro->url = $request->url;
       
        if($request->file('imagen')){
            $path = $request->imagen->store('publicidad');
            $registro->imagen  = $path;
        }

       if($request->file('movil')){
            $path2 = $request->movil->store('publicidad');
            $registro->movil  = $path2;
        }

        $registro->save();

        return redirect()->route('publicidad.index')->with('info','publicidad actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Publicity::find($request->id)->delete();
        return redirect()->route('publicidad.index')->with('info','Publicidad eliminado con éxito');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Register;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::orderBy('id','desc')->get();
        return view('backend.banner.index',['banners'=>$banners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rankings = Register::orderBy('id','desc')->get();

        return view('backend.banner.create',['rankings'=>$rankings]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $banner = new Banner();

        if($request->file('imagen')){
            $path = $request->imagen->store('banner');
            $banner->imagen  = $path;
        }
       

        $banner->titulo = $request->titulo;
        $banner->autor = $request->autor;
        $banner->cancion = $request->cancion;
        $banner->register_id = $request->ranking;
        $banner->save();


       return redirect()->route('banners.index')->with('info','Banner creado');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rankings = Register::orderBy('id','desc')->get();
        $banner = Banner::find($id);

        return view('backend.banner.edit',['rankings'=>$rankings,'banner'=>$banner]);
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
        $banner =  Banner::find($id);


        if($request->file('imagen')){
            $path = $request->imagen->store('banner');
            $banner->imagen  = $path;
        }

        $banner->titulo = $request->titulo;
        $banner->autor = $request->autor;
        $banner->cancion = $request->cancion;
        $banner->register_id = $request->ranking;
        $banner->save();


       return redirect()->route('banners.index')->with('info','Banner creado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Banner::find($request->id)->delete();
        return redirect()->route('banners.index')->with('info','Banner eliminado con éxito');
    }
}

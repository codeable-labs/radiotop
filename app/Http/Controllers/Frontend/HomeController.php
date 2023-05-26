<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Gender;
use App\Models\Region;
use App\Models\Register;
use App\Models\Publicity;
use App\Models\Post;
use App\Models\Contact;
use App\Models\Banner;
use App\Models\Methodology;
use App\Models\Block;

use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function index(){

        $isRankingResult=null;
        $artistas = Artist::orderBy('id','desc')->get();
        $generos = Gender::orderBy('id','desc')->get();
        $regiones = Region::orderBy('id','desc')->get();

        $publicidad1 = Publicity::where('place_id',1)->get();
        $publicidad2 = Publicity::where('place_id',2)->get();

        $banners = Banner::orderBy('id','asc')->get();
        $bloques = Block::all();

        return view('frontend.index',['bloques'=>$bloques,'banners'=>$banners,'artistas'=>$artistas,'generos'=>$generos,'regiones'=>$regiones,'publicidad1'=>$publicidad1,'publicidad2'=>$publicidad2]);

    }

    public function radioTop(){

        $bloques = Block::all();
        $publicidad3 = Publicity::where('place_id',3)->get();
        $publicidad4 = Publicity::where('place_id',4)->get();
       
        return view('frontend.radiotop',['bloques'=>$bloques,'publicidad3'=>$publicidad3,'publicidad4'=>$publicidad4]);
        
    }

    public function metodologia(){

        $metodos = Methodology::orderBy('orden','asc')->get();
        $bloques = Block::all();
        return view('frontend.metodologia',['metodos'=>$metodos,'bloques'=>$bloques]);
        
    }

    public function notasPrensa(){

        $notas = Post::orderBy('id','desc')->get();

        foreach($notas as $nota){
            $posts[] = [
                'dia'=> @strftime("%d", date (strtotime($nota->updated_at )) ),
                'mes'=>@strftime("%h", date (strtotime($nota->updated_at )) ),
                'titulo'=>$nota->titulo,
                'descripcion'=>$nota->descripcion,
                'imagen' => $nota->imagen,
                'archivo' => $nota->archivo
            ];
        }


        

     

        return view('frontend.notas',['notas'=>$posts]);
        
    }

    public function AnunciaNosotros(){

        
        return view('frontend.anuncia');
        
    }

   

    public function detalle($genero,$region,$artista){


        $publicidad3 = Publicity::where('place_id',3)->get();
        $publicidad4 = Publicity::where('place_id',4)->get();

        if($genero == "empty"){
            
            $regi = Region::where('nombre',strtolower($region))->first();
            $artist = Artist::where('nombre',strtolower($artista))->first();
            $ranking = Register::where('region_id',$regi->id)->where('artist_id',$artist->id)->first();
        
        }else{

            $regi = Region::where('nombre',strtolower($region))->first();
            $artist = Artist::where('nombre',strtolower($artista))->first();
            $gene = Gender::where('nombre',$genero)->first();
            $ranking = Register::where('region_id',$regi->id)->where('artist_id',$artist->id)->where('gender_id',$gene->id)->first();
        
        }

        return view('frontend.ranking',['ranking'=>$ranking,'publicidad3'=>$publicidad3,'publicidad4'=>$publicidad4]);

    }
    //apis
    public function getResult(Request $request){

        $gender_id = $request->gender_id;
        $artist_id = $request->artist_id;
        $region_id = $request->region_id;
        $datos = null;
        if($artist_id==1){
            $registro = Register::where('artist_id',$artist_id)->where('region_id',$region_id)->first();
            
        }else{
            $registro = Register::where('artist_id',$artist_id)->where('region_id',$region_id)->where('gender_id',$gender_id)->first();
        }

        if(isset($registro)){
            $datos = [
                "archivo" => @$registro->archivo,
                "title" => @$registro->artist->nombre."/".$registro->region->nombre,
                "genero"=>@$registro->gender->slug?$registro->gender->slug:'empty',
                "region"=>$registro->region->nombre,
                "artista"=>@$registro->artist->nombre,
                "icono_genero"=>@$registro->gender->icono,
                "icono_region"=>@$registro->region->icono,
                "fecha"=>@$registro->mes." ".$registro->year
            ];
        }

       return response()->json($datos);
    }

    public function contacto(Request $request){
      

        $contacto = new Contact();
        $contacto->nombres = $request->full_name;
        $contacto->email = $request->email;
        $contacto->empresa = $request->business_name;
        // $contacto->ruc = $request->ruc;
        // $contacto->sector = $request->sector;
        $contacto->departamento = $request->departamento;
        $contacto->provincia = $request->provincia;
        $contacto->distrito = $request->distrito;

        $contacto->save();

        return redirect()->route('home.anuncia')->with('info','registro realizado');


    }

    public function getPublicidad($pos){

        $galleries = null;
        $matriz = null;
            switch ($pos) {
                case '1':
                  $galleries = Publicity::inRandomOrder()->where('place_id',1)->get();
                break;

                case '2':
                    $galleries = Publicity::inRandomOrder()->where('place_id',2)->get();
                break;

                case '3':
                    $galleries = Publicity::inRandomOrder()->where('place_id',3)->get();
                break;

                case '4':
                    $galleries = Publicity::inRandomOrder()->where('place_id',4)->get();
                break;
                
              
            }
            if($galleries != null){
                foreach($galleries as $gal){
                    $matriz[] = ["id"=>$gal->id,"imagen"=>$gal->imagen,"url"=>$gal->url];
                }
            }

            return response()->json($matriz);
    }

    public function setImpresion(Request $request){
        $publicidad = Publicity::find($request->id);

        $conteo  = $publicidad->impresiones+1;

        $publicidad->impresiones = $conteo;
        $publicidad->save();

        return response()->json(['status'=>'sucess','code'=>'200']);
    }
}

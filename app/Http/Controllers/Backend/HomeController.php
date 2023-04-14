<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Register;
use App\Model\Contact;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $ranking = Register::orderBy('id','desc')->count();
        $contactos = Contact::orderBy('id','desc')->count();
        return view('backend.index',['ranking'=>$ranking, 'contactos'=>$contactos]);
    }
}

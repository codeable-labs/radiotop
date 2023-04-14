<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $contactos = Contact::orderBy('id','desc')->get();

        return view('backend.contacto.index',['contactos'=>$contactos]);
    }
}

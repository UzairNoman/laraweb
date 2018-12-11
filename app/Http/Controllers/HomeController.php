<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $path = storage_path() . "/app/data.json";
        if(file_exists($path)){
            $prods = json_decode(file_get_contents($path), true); 
            $prods = array_reverse($prods);
        }else{
            $prods = [];
        }
        
        return view('home')->with('prods',$prods);
    }
}

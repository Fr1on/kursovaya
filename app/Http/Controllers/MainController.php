<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        $data = product::all();
        return view('home', ['products' => $data]);;
    }
    public function about(){
        return view('about');
    }

}

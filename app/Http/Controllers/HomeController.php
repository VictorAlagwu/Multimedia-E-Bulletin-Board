<?php

namespace App\Http\Controllers;
use App\Bulletin;
use App\Userbulletin;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bulletins = Bulletin::latest();
        return view('home', [
            'bulletins'=>$bulletins->paginate(4)
        ]);
    }
}

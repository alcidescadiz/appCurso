<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $iduser= Auth::user()->id;
        $cursos = DB::table('cursos')->get();
        $hijos = DB::table('hijos')->where('id_user', $iduser)->Where('estatus','activo')->get();
        return view('home', ['hijos'=>$hijos->toArray(), 'cursos'=>$cursos->toArray()]);
    }
}

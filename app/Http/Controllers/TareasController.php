<?php

namespace App\Http\Controllers;

use App\Models\tareas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $iduser= Auth::user()->id;
        $tareas= DB::select("SELECT p.fecha, p.id_user, h.id, concat(h.nombres, h.apellidos) as alumno, c.materia, t.id, t.linkvideo, t.linkimg, t.objetivo, t.tarea, t.estatus
        FROM pagos p
        inner join hijos h on h.id=p.id_hijos
        inner join cursos c on c.id=p.id_cursos
        inner join tareas t on  t.id_cursos=p.id_cursos
        where p.id_user = '$iduser'
        and h.estatus='activo'
        order by alumno");
        $hijos = DB::table('hijos')->where('id_user', $iduser)->Where('estatus','activo')->get();
        return view('cursos/tareas', ['hijos' => $hijos->toArray(), 'tareas'=>$tareas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tareas  $tareas
     * @return \Illuminate\Http\Response
     */
    public function show($request)
    {
        $iduser= Auth::user()->id;
        $ida =$request;
        $tareas= DB::select("SELECT p.fecha, p.id_user, h.id, concat(h.nombres, h.apellidos) as alumno, c.materia, t.id, t.linkvideo, t.linkimg, t.objetivo, t.tarea, t.estatus
        FROM pagos p
        inner join hijos h on h.id=p.id_hijos
        inner join cursos c on c.id=p.id_cursos
        inner join tareas t on  t.id_cursos=p.id_cursos
        where p.id_user = '$iduser'
        and h.id = '$ida'
        and h.estatus='activo'
        order by alumno");
        
        $hijos = DB::table('hijos')->where('id_user', $iduser)->where('estatus', 'activo')->get();
        return view('cursos/lessons', ['tareas'=>$tareas, 'hijos'=>$hijos->toArray()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tareas  $tareas
     * @return \Illuminate\Http\Response
     */
    public function edit(tareas $tareas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tareas  $tareas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tareas $tareas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tareas  $tareas
     * @return \Illuminate\Http\Response
     */
    public function destroy(tareas $tareas)
    {
        //
    }
}

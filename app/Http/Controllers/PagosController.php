<?php

namespace App\Http\Controllers;

use App\Models\pagos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PagosController extends Controller
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
        $i=1;
        $iduser= Auth::user()->id;
        $hijos = DB::table('hijos')->where('id_user', $iduser)->Where('estatus','activo')->get();
        $cursos = DB::table('cursos')->get();
        $pagos= DB::select("select p.id_user, p.fecha, c.materia, concat(h.nombres, ' ', h.apellidos) as alumno, p.tipopago, p.costo, p.verificar 
        from pagos p
        inner join cursos c on c.id = p.id_cursos
        inner join hijos h on h.id = p.id_hijos
        where p.id_user= '$iduser'
        order by alumno");
        return view('pagos/payment', ['i'=>$i, 'hijos' => $hijos->toArray(), 'cursos' => $cursos->toArray(), 'pagos' => $pagos]);
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
        // validar que no haya cursos asignados al mismo alumno más de una vez
        $idhijos =$request->get('id_hijos');
        $idcursos =$request->get('id_cursos');
        $iduser= Auth::user()->id;
        $pagos = DB::table('pagos')
                ->where('id_user', $iduser)
                ->Where('id_hijos',$idhijos)
                ->Where('id_cursos',$idcursos)
                ->get();
        if (count($pagos)>=1) {
            return redirect('pagos');
        } else {
            pagos::create($request->all());
            return redirect('pagos');
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function show(pagos $pagos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function edit(pagos $pagos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pagos $pagos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pagos  $pagos
     * @return \Illuminate\Http\Response
     */
    public function destroy(pagos $pagos)
    {
        //
    }
}

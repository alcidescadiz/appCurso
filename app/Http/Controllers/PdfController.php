<?php

namespace App\Http\Controllers;

use App\Models\pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
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
        $pagos= DB::select("select p.id, p.id_user, p.fecha, c.materia, concat(h.nombres, ' ', h.apellidos) as alumno, p.tipopago, p.costo, p.verificar 
        from pagos p
        inner join cursos c on c.id = p.id_cursos
        inner join hijos h on h.id = p.id_hijos
        where p.id_user= '$iduser' and p.verificar='pendiente...'
        order by p.fecha");
        $hijos = DB::table('hijos')->where('id_user', $iduser)->Where('estatus','activo')->get();
        return view('pagos/invoice', ['i'=>$i, 'pagos' => $pagos, 'hijos'=>$hijos->toArray()]);
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
     * @param  \App\Models\pdf  $pdf
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pdf  $pdf
     * @return \Illuminate\Http\Response
     */
    public function edit(pdf $pdf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pdf  $pdf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pdf $pdf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pdf  $pdf
     * @return \Illuminate\Http\Response
     */
    public function destroy(pdf $pdf)
    {
        //
    }
}

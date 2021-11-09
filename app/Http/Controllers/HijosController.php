<?php

namespace App\Http\Controllers;

use App\Models\hijos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HijosController extends Controller
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
        
        return view('hijos/children', ['hijos' => $hijos->toArray(), 'i'=>$i]);
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
        hijos::create($request->all());
        return redirect('hijos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hijos  $hijos
     * @return \Illuminate\Http\Response
     */
    public function show(hijos $hijos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hijos  $hijos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $hijo=hijos::find($id);
            if(isset($hijo)){
                $nombres= $hijo->nombres;
                $fecha=$hijo->fechanacimiento;
                return view('hijos/editar',[
                    'hijo'=>$hijo, 
                    'nombres'=>$nombres,
                    'fecha'=>$fecha
            ]);
            }else{return redirect('hijos');}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hijos  $hijos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // gabriel modo
        /*$hijoData = request();
        hijos::where('id', '=', $id)->update($hijoData);
        
        $hijo = hijos::findOrFail($id);
        dd($hijo);
        return view('hijos.editar', compact('hijo'));*/

        /*$hijo=hijos::findOrFail($id);
        $hijo->id_user = $request->input('id_user');
        $hijo->nombres = $request->input('nombres');
        $hijo->apellidos = $request->input('apellidos');
        $hijo->edad = $request->input('edad');
        $hijo->fechanacimiento = $request->input('fechanacimiento');
        $hijo->save();*/

        DB::table('hijos')
            ->where('id', $id)
            ->update([
                'id_user' => $request->get('id_user'),
                'nombres' => $request->get('nombres'),
                'apellidos' => $request->get('apellidos'),
                'edad' => $request->get('edad'),
                'fechanacimiento' => $request->get('fechanacimiento'),
                
            ]);
        return redirect('hijos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hijos  $hijos
     * @return \Illuminate\Http\Response
     */
    public function destroy($request)
    {
        //DB::table('hijos')->delete($id);
        DB::table('hijos')
        ->where('id', $request)
        ->update([
            'estatus' => 'eliminado',
        ]);
        return redirect('hijos');
    }
}

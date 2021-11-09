<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cursos', [App\Http\Controllers\CursosController::class, 'index'])->name('curso');
Route::get('/tareas', [App\Http\Controllers\TareasController::class, 'index'])->name('tareas');
Route::get('/tareas/{id}', [App\Http\Controllers\TareasController::class, 'show']);

Route::get('/pagos', [App\Http\Controllers\PagosController::class, 'index'])->name('pagos');
Route::post('/pagos', [App\Http\Controllers\PagosController::class, 'store']);
Route::get('/pdf', [App\Http\Controllers\PdfController::class, 'index'])->name('pdf');

Route::get('/hijos', [App\Http\Controllers\HijosController::class, 'index'])->name('hijos');
Route::post('/hijos', [App\Http\Controllers\HijosController::class, 'store']);
Route::get('editarhijos/{id}', [App\Http\Controllers\HijosController::class, 'edit']);
Route::put('actualizar/{id}/edit',  [App\Http\Controllers\HijosController::class, 'update']);
Route::delete('hijos/{id}', [App\Http\Controllers\HijosController::class, 'destroy']);

Route::get("print/{id}", function ($id) {

    //$pagos = DB::table('pagos')->where('id', $id)->get();
    $iduser= Auth::user()->id;
    $pagos= DB::select("select p.id, p.id_user, p.fecha, c.materia, concat(h.nombres, ' ', h.apellidos) as alumno, p.tipopago, p.costo, p.verificar 
        from pagos p
        inner join cursos c on c.id = p.id_cursos
        inner join hijos h on h.id = p.id_hijos
        where p.id_user = '$iduser'
        and p.id = '$id'
        order by alumno");
    if (count($pagos)=== 0) {
        return redirect('pdf');
    }else{

        $dompdf = App::make("dompdf.wrapper");
        $dompdf->loadView("components/imprimir", [
        "pagos" => $pagos,
        ]);
        return $dompdf->stream();
    }
});
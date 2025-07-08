<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AprendizController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\ZipController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// GET ROUTES
Route::get('/', function () {
    return view('index');
})->name('indexAprendiz');

Route::get('/administrativos', function () {
    return view('loginAdministrativo');
})->name('loginAdministrador');

Route::get('/registroAprendices',[AprendizController::class, 'index'])->middleware('auth')->name('aprendices');

// Route::get('/registro', function () {
//     return view('registrar');
// })->name('registro');

Route::get('/administrativos/inicio', function () {
    return view('admin/inicioAdmin');
})->middleware('auth')->name('inicioAdmin');


Route::get('/fichas',[FichaController::class, 'index'])->middleware('auth')->name('homeAdmin');

Route::get('/logout',[UsuarioController::class, 'logout'])->name('logout');

Route::resource('aprendices', AprendizController::class)->only(['index', 'create', 'store', 'desacarga']);

Route::get('/descargarAprendiz/{id}/{numeroDocumento}/{ficha}', [ZipController::class, 'ZipFile']);

Route::get('/descargarFicha/{ficha}', [ZipController::class, 'ZipFolder']);


// POST ROUTES
Route::post('/inicio',[AprendizController::class, 'login'])->name('inicio');

// Route::post('/validar_registro',[UsuarioController::class, 'register'])->name('validar_registro');

Route::post('/iniciar_session',[UsuarioController::class, 'login'])->name('iniciar_session');

Route::post('/crearFicha',[FichaController::class, 'store'])->name('crearFicha');

Route::put('/fichas/{ficha}', [FichaController::class, 'update']);

Route::post('/archivo',[ArchivoController::class, 'storeArchivo'])->name('guardar');

Route::post('/inicio',[AprendizController::class, 'login'])->name('inicio');

Route::post('/crearAprendiz',[AprendizController::class, 'create'])->name('crearAprendiz');

Route::delete('/aprendiz/{id}', [AprendizController::class, 'destroy']);

Route::put('/aprendizEditar/{id}', [AprendizController::class, 'update']);
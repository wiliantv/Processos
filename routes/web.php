<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\ProcessoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', [Controller::class, 'show'])->middleware(['auth'])->name('dashboard');
Route::prefix('/pessoa')->group(function () {
    Route::get("/",  [PessoaController::class, 'index'])->middleware(['auth'])->name("pessoas");
    Route::get("/create",  function () {
        return view('paginas.cad_pessoa');
    })->middleware(['auth'])->name("pessoa_create");
    Route::post("/", [PessoaController::class, 'store'])->middleware(['auth'])->name("pessoa");
});
Route::prefix('/processo')->group(function () {
    Route::get("/",  [ProcessoController::class, 'index'])->middleware(['auth'])->name("processos");
    Route::get("/create", [ProcessoController::class, 'create'])->middleware(['auth'])->name("processo_create");
    Route::post("/", [ProcessoController::class, 'store'])->middleware(['auth'])->name("processo");
});
require __DIR__.'/auth.php';

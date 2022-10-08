<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\PrasoProcessoController;
use App\Http\Controllers\ProcessoController;
use App\Models\Pessoa;
use App\Models\PrasoProcesso;
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
// Route::prefix('/pessoa')->group(function () {
//     Route::get("/",  [PessoaController::class, 'index'])->middleware(['auth'])->name("pessoas");
//     Route::get("/create",  function () {
//         return view('paginas.cad_pessoa');
//     })->middleware(['auth'])->name("pessoa_create");
//     Route::post("/", [PessoaController::class, 'store'])->middleware(['auth'])->name("pessoa");
// });
// Route::prefix('/processo')->group(function () {
//     Route::get("/",  [ProcessoController::class, 'index'])->middleware(['auth'])->name("processos");
//     Route::get("/create", [ProcessoController::class, 'create'])->middleware(['auth'])->name("processo_create");
//     Route::post("/", [ProcessoController::class, 'store'])->middleware(['auth'])->name("processo");
//     Route::post("/drop", [ProcessoController::class, 'delete'])->middleware(['auth'])->name("delete_processo");
// });

Route::prefix('praso')->group(
    function () {
        // Route::get("/", [PrasoProcessoController::class, 'index'])->middleware(['auth'])->name("prasos");
        Route::post("/", [PrasoProcessoController::class, 'store'])->middleware(['auth'])->name("praso");
        // Route::delete("/{id}",[PrasoProcessoController::class, 'delete'])->middleware(["auth"])->name("delete_praso");
    }
);
require __DIR__ . '/auth.php';
/**
 * Rotas referentes a pessoa
 */
Route::prefix("pessoas")->middleware(['auth'])->group(function () {
    Route::get("/", [PessoaController::class, 'index'])->name("pessoas.index");
    Route::get("/create", [PessoaController::class, 'create'])->name("pessoas.create");
    Route::post("/", [PessoaController::class, 'store'])->name("pessoas.store");
    Route::get('/delete', [PessoaController::class, 'destroy'])->name("pessoas.destroy");
    // Route::get("/{id}", [PessoaController::class, 'show'])->name("pessoas.show");
    // Route::post("/{id}", [PessoaController::class, 'update'])->name("pessoas.update");
});

/**
 * Rotas referentes a processos
 */
Route::prefix("processos")->middleware(['auth'])->group(function () {
    Route::get("/", [ProcessoController::class, 'index'])->name("processos.index");
    Route::get("/create", [ProcessoController::class, 'create'])->name("processos.create");
    Route::post("/", [ProcessoController::class, 'store'])->name("processos.store");
    Route::get('/delete', [ProcessoController::class, 'destroy'])->name("processos.destroy");
    // Route::get("/{id}", [ProcessoController::class, 'show'])->name("processos.show");
    // Route::post("/update", [ProcessoController::class, 'update'])->name("processos.update");
});

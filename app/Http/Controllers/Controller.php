<?php

namespace App\Http\Controllers;

use App\Models\Processo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function show(){
        $processos = Processo::join("pessoas","processos.id_pessoa","pessoas.id")
        ->where("processos.id_usuario",Auth::user()->id)
        ->where("audiencia", ">", "now()")
        ->orderBy("audiencia")
        ->select('processos.*', 'pessoas.cpf', 'pessoas.nome')
        ->get();
        return view('dashboard', ["processos" => $processos]);
    }
}

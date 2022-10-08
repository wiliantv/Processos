<?php

namespace App\Http\Controllers;

use App\Models\PrasoProcesso;
use App\Models\Processo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function show(){
        $processos = Processo::join("pessoas","processos.id_pessoa","pessoas.id")
        ->leftJoin(
            DB::raw("(
                select Min(data_final) as data, `id_processo`
                from `praso_processos`
                where `id_usuario` = ".Auth::user()->id."
                group by `id_processo` order by MIN(data_final) desc) as a"),"a.id_processo" , "processos.id")
        ->where("processos.id_usuario",Auth::user()->id)
        ->where("audiencia", ">", DB::raw('now()')) //date("Y-m-d H:i:s"))
        ->orderBy(DB::raw("a.data IS NOT NULL"), "desc")
        ->orderBy("a.data", "asc")
        ->orderBy("audiencia", "asc")
        ->select('processos.*', 'pessoas.cpf', 'pessoas.nome', "a.data")
        ->get();

        return view('dashboard', ["processos" => $processos]);
    }
}

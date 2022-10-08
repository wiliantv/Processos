<?php

namespace App\Http\Controllers;

use App\Models\PrasoProcesso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrasoProcessoController extends Controller
{

    public function store(Request $request){
        $pessoa = new PrasoProcesso();
        $pessoa->tipo = $request->tipo;
        $pessoa->data_final = $request->data_final;
        $pessoa->situacao = $request->situacao;
        $pessoa->id_processo = $request->processo;
        $pessoa->id_usuario = Auth::user()->id;

        $pessoa->save();
        //$request->session()->put('auth.password_confirmed_at', time());

        return $pessoa;//redirect()->route('praso');

    }
}

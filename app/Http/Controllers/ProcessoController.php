<?php

namespace App\Http\Controllers;

use App\Models\pessoa;
use App\Models\Processo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProcessoController extends Controller
{

    public function index(){
        $pessoas = pessoa::where("id_usuario",Auth::user()->id)->orderBy("created_at")->get();
        return view('paginas.pessoas', ["pessoas" => $pessoas]);
    }

    public function create(){
        $pessoas = pessoa::where("id_usuario",Auth::user()->id)->orderBy("created_at")->get();
        return view('paginas.cad_processo', ["pessoas" => $pessoas]);
    }

    public function store(Request $request){
        // $request->validate([
        //     'nome' => ['required', 'string', 'min:5'],
        //     'cpf' => ['required', 'min:11'],
        // ]);
        // $cpf = str_replace($request->cpf, ".", "");
        // $cpf = str_replace($cpf, "-", "");
        // $usr = pessoa::where("cpf", $cpf )->get();
        // //dd(count($usr));
        // if(count($usr) >= 1){
        //     throw ValidationException::withMessages([
        //         'cpf' => "Já existe uma pessoa com este mesmo cpf",
        //     ]);
        // }
        // $pessoa = new pessoa();
        // $pessoa->cpf = $cpf;
        // $pessoa->nome = $request->nome;
        // $pessoa->endereco = $request->endereco;
        // $pessoa->telefone = $request->telefone;
        // $pessoa->rg = $request->rg;
        // $pessoa->estado_civil = $request->estado_civil;
        // $pessoa->profissao = $request->profissao;
        // $pessoa->id_usuario = Auth::user()->id;

        // $pessoa->save();
        // //$request->session()->put('auth.password_confirmed_at', time());

        // return redirect()->route('pessoas');

    }
}

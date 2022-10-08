<?php

namespace App\Models;

use App\Http\Requests\PessoaRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class Pessoa extends Model
{
    use HasFactory;

    static function getByUser($id)
    {
        return Pessoa::where("id_usuario", $id)->orderBy("nome", "asc")->get();
    }

    static function fromRequest(PessoaRequest $request)
    {
        $cpf = str_replace(".", "", $request->cpf);
        $cpf = str_replace("-", "", $cpf);
        $usr = Pessoa::where("id_usuario", Auth::user()->id)->where("cpf", $cpf)->get();
        if (count($usr) >= 1) {
            throw ValidationException::withMessages([
                'cpf' => "Já existe uma pessoa com este mesmo cpf",
            ]);
        }
        $pessoa = new Pessoa();
        $pessoa->cpf = $request->cpf;
        $pessoa->nome = $request->nome;
        $pessoa->endereco = $request->endereco;
        $pessoa->telefone = $request->telefone;
        $pessoa->rg = $request->rg;
        $pessoa->estado_civil = $request->estado_civil;
        $pessoa->profissao = $request->profissao;
        $pessoa->id_usuario = Auth::user()->id;
        return $pessoa;
    }

    /**
     * Delete Pessoa com o id
     */
    static function deleteFromID($id)
    {
        return Pessoa::where("id_usuario", Auth::user()->id)
        ->where("id",$id)
        ->orderBy("nome", "asc")
        ->delete();
    }
}

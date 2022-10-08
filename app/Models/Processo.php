<?php

namespace App\Models;

use App\Http\Requests\ProcessoRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class Processo extends Model
{
    use HasFactory;

    static function getByUser($id){
        return Processo::where("id_usuario", $id)
        ->get();
    }

    static function fromRequest(ProcessoRequest $request){
        $usr = Processo::where("numero", $request->numero)->where("id_usuario", Auth::user()->id)->get();
        //dd(count($usr));
        if (count($usr) >= 1) {
            throw ValidationException::withMessages([
                'numero' => "Já existe um processo com este mesmo numero",
            ]);
        }
        $processo = new Processo();
        $processo->numero = $request->numero;
        $processo->classe = $request->classe;
        $processo->andamento = $request->andamento;
        $processo->audiencia = $request->audiencia;
        $processo->valor = $request->valor;
        $processo->id_pessoa = $request->pessoa;
        $processo->id_usuario = Auth::user()->id;
        return $processo;
    }

    static function deleteByID($id){
        Processo::where("id_usuario", Auth::user()->id)
            ->where("id", $id)
            ->delete();
    }
}

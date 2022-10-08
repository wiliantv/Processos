<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PessoaRequest;
use Illuminate\Support\Facades\Auth;


class PessoaController extends Controller
{
    public function index()
    {
        return view("paginas.pessoas", ["pessoas" => Pessoa::getByUser(Auth::user()->id)]);
    }
    public function show()
    {
        //...
    }
    public function update()
    {
        //...
    }
    public function create()
    {
        return view("paginas.create.pessoa");
    }
    public function edit()
    {
        //...
    }
    public function store(PessoaRequest $request)
    {
        Pessoa::fromRequest($request)->save();
        return redirect()
            ->route('pessoas.index')
            ->with(["notify-succes" => "Usuario Criado"]);
    }
    public function destroy(Request $request)
    {
        Pessoa::deleteFromID($request->id);
        return redirect()
            ->back();
    }
}

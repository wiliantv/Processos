<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessoRequest;
use App\Models\Pessoa;
use App\Models\Processo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ProcessoController extends Controller
{

    public function index()
    {
        return view('paginas.processos', [
            "processos" => Processo::getByUser(Auth::user()->id)
        ]);
    }

    public function create()
    {
        return view('paginas.create.processo', ["pessoas" => Pessoa::getByUser(Auth::user()->id)]);
    }

    public function store(ProcessoRequest $request)
    {
        Processo::fromRequest($request)->save();
        return redirect()->route('processos.index');
    }

    public function destroy(Request $request)
    {
        Processo::deleteByID($request->id);
        return redirect()->back();
    }
}

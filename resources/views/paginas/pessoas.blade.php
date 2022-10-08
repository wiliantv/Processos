@extends('layouts.default')
@section('title', 'Lista Pessoas')
@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Pessoas</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Pessoas</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Pessoas
                </div>
                <div class="card-body">
                    @if ($pessoas)
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>CPF</th>
                                <th>Nome</th>
                                <th>Endereco</th>
                                <th>Telefone</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>CPF</th>
                                <th>Nome</th>
                                <th>Endereco</th>
                                <th>Telefone</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($pessoas as $pessoa)
                            <tr>
                                <td>{{ $pessoa->cpf }}</td>
                                <td>{{ $pessoa->nome }}</td>
                                <td>{{ $pessoa->endereco }}</td>
                                <td>{{ $pessoa->telefone }}</td>
                                <td>
                                    <a data-bs-toggle="modal" data-bs-target="#delete_pessoa" data-bs-id="{{ $pessoa->id }}"
                                        data-bs-name="{{ $pessoa->nome }}">
                                        <i class="fas fa-trash" style="color: red"></i>
                                    </a>
                                    {{-- <a href="{{ route("pessoas.destroy", $pessoa->id) }}"><i class="fas fa-trash" style="color: red"></i></a> --}}
                                </td>
                                {{-- <td style="text-align: center; padding-left: 10px" scope="row">
                                    <a href=""><i class="fas fa-pen-to-square"></i></a>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @include("components.modals.destroy.pessoas")
                    @else
                    <h3>Não existem pessoas cadastradas</h3>
                    @endif
                </div>
            </div>
        </div>
    </main>
</div>

@endsection

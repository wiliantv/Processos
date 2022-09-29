@extends("layouts.default")
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
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>CPF</th>
                                <th>Nome</th>
                                <th>Endereco</th>
                                <th>Telefone</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>CPF</th>
                                <th>Nome</th>
                                <th>Endereco</th>
                                <th>Telefone</th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($pessoas as $proc)
                            <tr>
                                <td>{{ $proc->cpf }}</td>
                                <td>{{ $proc->nome }}</td>
                                <td>{{ $proc->endereco }}</td>
                                <td>{{ $proc->telefone }}</td>
                                <td style="text-align: center; padding-left: 10px" scope="row">
                                    <a href=""><i class="fas fa-trash" style="color: red"></i></a>
                                    <a href=""><i class="fas fa-pen-to-square"></i></a>
                                </td>
                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection

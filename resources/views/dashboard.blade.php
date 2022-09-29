@extends("layouts.default")
@section('title', 'Dashboard ')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Processos</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Processos</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Processos
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nº Proc</th>
                                <th>Nome</th>
                                <th>Data Audiencia</th>
                                <th>Prasos</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nº Proc</th>
                                <th>Nome</th>
                                <th>Data Audiencia</th>
                                <th>Prasos</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @forelse ($processos as $proc)
                            <tr>
                                <td>{{ $proc->numero }}</td>
                                <td>{{ $proc->nome }}</td>
                                <td>{{ $proc->audiencia }}</td>
                                <td>
                                    <a href=""><i class="fas fa-trash"></i></a>

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

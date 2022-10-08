@extends("layouts.default")
@section('title', 'Lista Pessoas')
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
                    @if($processos)
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Classe</th>
                                <th>Andamento</th>
                                <th>Audiencia</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Numero</th>
                                <th>Classe</th>
                                <th>Andamento</th>
                                <th>Audiencia</th>
                                <th>Valor</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($processos as $processo)
                            <tr>
                                <td>{{ $processo->numero }}</td>
                                <td>{{ $processo->classe }}</td>
                                <td>{{ $processo->andamento }}</td>
                                <td>{{ $processo->audiencia }}</td>
                                <td>{{ $processo->valor }}</td>
                                @include("components.utils.processos_actions")
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @include("components.modals.create.prasos")
                    @include("components.modals.destroy.processos")

                    @else
                    <h3>Não existem processos cadastrados</h3>
                    @endif
                </div>
            </div>
        </div>
    </main>
</div>
@endsection

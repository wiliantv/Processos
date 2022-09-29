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

                    <form class="row g-3" method="POST" action="{{ route("processo") }}">
                        @csrf
                        <div class="col-12">
                          <label for="andamento" class="form-label">Pessoas</label>
                          <select id="picker" class="form-control selectpicker" data-live-search="true">
                            @foreach ($pessoas as $pessoa)
                                <option value="{{ $pessoa->id }}" data-tokens="{{ $pessoa->cpf }}">{{ $pessoa->nome }}</option>
                                @endforeach
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label for="numero" class="form-label">Numero</label>
                          <input type="number" class="form-control" id="numero" name="numero" value="{{ old('numero') }}" required>
                        </div>
                        <div class="col-md-6">
                          <label for="classe" class="form-label">Classe</label>
                          <input type="text" class="form-control" id="classe" name="classe" value="{{ old('classe') }}"  required>
                        </div>
                        <div class="col-md-6">
                          <label for="audiencia" class="form-label">Audiencia</label>
                          <input type="datetime-local" class="form-control" id="audiencia" name="audiencia" value="{{ old('audiencia') }}" required>
                        </div>
                        <div class="col-md-6">
                          <label for="valor" class="form-label">Valor</label>
                          <input type="number" class="form-control" id="valor" name="valor" value="{{ old('valor') }}" required>
                        </div>
                        <div class="col-12">
                          <label for="andamento" class="form-label">Andamento</label>
                          <input type="textarea" class="form-control" id="andamento" name="andamento" placeholder="Benedito dias 123" value="{{ old('andamento') }}">
                        </div>
                        <div class="col-12">
                          <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                      </form>

                </div>
            </div>
        </div>
    </main>
</div>

@endsection

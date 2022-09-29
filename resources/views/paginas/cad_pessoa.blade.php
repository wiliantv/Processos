@extends("layouts.default")
@section('title', 'Dashboard ')
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

                    <form class="row g-3" method="POST" action="{{ route("pessoa") }}">
                        @csrf
                        <div class="col-md-6">
                          <label for="nome" class="form-label">Nome</label>
                          <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome') }}" required>
                        </div>
                        <div class="col-md-6">
                          <label for="cpf" class="form-label">CPF</label>
                          <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="cpf" name="cpf" value="{{ old('cpf') }}"  required>
                        </div>
                        <div class="col-md-6">
                          <label for="rg" class="form-label">RG</label>
                          <input type="text" class="form-control @error('rg') is-invalid @enderror" id="rg" name="rg" value="{{ old('rg') }}">
                        </div>
                        <div class="col-md-6">
                          <label for="telefone" class="form-label">Telefone</label>
                          <input type="text" class="form-control @error('telefone') is-invalid @enderror" id="telefone" name="telefone" value="{{ old('telefone') }}" required>
                        </div>
                        <div class="col-md-6">
                          <label for="estado_civil" class="form-label">Estado Civil</label>
                          <input type="text" class="form-control @error('estado_civil') is-invalid @enderror" id="estado_civil" name="estado_civil" value="{{ old('estado_civil') }}">
                        </div>
                        <div class="col-md-6">
                          <label for="profissao" class="form-label">Profissao</label>
                          <input type="text" class="form-control @error('profissao') is-invalid @enderror" id="profissao" name="profissao" value="{{ old('profissao') }}">
                        </div>
                        <div class="col-12">
                          <label for="endereco" class="form-label">Endereço</label>
                          <input type="text" class="form-control @error('endereco') is-invalid @enderror" id="endereco" name="endereco" placeholder="Benedito dias 123" value="{{ old('endereco') }}">
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

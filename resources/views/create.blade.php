@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="card shadow p-4 col-md-6 mx-auto">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0"><i class="bi bi-plus-circle"></i> Novo Produto</h4>
        </div>
        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('produtos.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nome do Produto</label>
                    <input type="text" name="nome" class="form-control" placeholder="Digite o nome" value="{{ old('nome') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantidade</label>
                    <input type="number" name="quantidade" class="form-control" value="{{ old('quantidade', 0) }}" min="0" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Categoria</label>
                    <div class="d-flex gap-2 align-items-center">
                        <select name="categoria_id" class="form-select" required>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nome }}
                                </option>
                            @endforeach
                        </select>

                        
                        <a href="{{ route('categorias.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Nova Categoria
                        </a>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Salvar
                    </button>

                    
                    <a href="{{ route('produtos.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Voltar
                    </a>

                    
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                        <i class="bi bi-house"></i> Tela Inicial
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection

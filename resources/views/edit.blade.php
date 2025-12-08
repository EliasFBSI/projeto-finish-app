@extends('layouts.app')

@section('content')

<div class="card shadow p-4 col-md-6">

    <h4 class="mb-3"><i class="bi bi-pencil"></i> Editar Categoria</h4>

    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nome da Categoria</label>
            <input type="text" name="nome" class="form-control" value="{{ $categoria->nome }}" required>
        </div>

        <button class="btn btn-primary">
            <i class="bi bi-check-circle"></i> Atualizar
        </button>

        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">
            Voltar
        </a>
    </form>

</div>

@endsection

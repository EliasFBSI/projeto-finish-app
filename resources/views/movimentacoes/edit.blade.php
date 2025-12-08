<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Movimentação</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Editar Movimentação</h4>
            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-light btn-sm me-2">
                    🏠 Dashboard
                </a>
                <a href="{{ route('movimentacoes.index') }}" class="btn btn-light btn-sm">
                    🔙 Voltar
                </a>
            </div>
        </div>

        <div class="card-body">

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('movimentacoes.update', $movimentacao->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="produto_id" class="form-label">Produto</label>
                    <select name="produto_id" id="produto_id" class="form-select" required>
                        <option value="">Selecione</option>
                        @foreach($produtos as $produto)
                            <option value="{{ $produto->id }}" 
                                {{ $produto->id == $movimentacao->produto_id ? 'selected' : '' }}>
                                {{ $produto->nome }} (Estoque: {{ $produto->quantidade }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <select name="tipo" id="tipo" class="form-select" required>
                        <option value="entrada" {{ $movimentacao->tipo === 'entrada' ? 'selected' : '' }}>Entrada</option>
                        <option value="saida" {{ $movimentacao->tipo === 'saida' ? 'selected' : '' }}>Saída</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="quantidade" class="form-label">Quantidade</label>
                    <input type="number" name="quantidade" id="quantidade" class="form-control" min="1" 
                           value="{{ old('quantidade', $movimentacao->quantidade) }}" required>
                </div>

                <div class="mb-3">
                    <label for="data" class="form-label">Data</label>
                    <input type="date" name="data" id="data" class="form-control" 
                           value="{{ old('data', \Carbon\Carbon::parse($movimentacao->data)->format('Y-m-d')) }}" required>
                </div>

                <button type="submit" class="btn btn-success">Atualizar</button>
            </form>

        </div>
    </div>
</div>

</body>
</html>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Nova Movimentação</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning">Nova Movimentação</div>
        <div class="card-body">

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('movimentacoes.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Produto</label>
                    <select name="produto_id" class="form-select" required>
                        <option value="">Selecione</option>
                        @foreach($produtos as $produto)
                            <option value="{{ $produto->id }}">
                                {{ $produto->nome }} (Estoque: {{ $produto->quantidade }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Tipo</label>
                    <select name="tipo" class="form-select">
                        <option value="entrada">Entrada</option>
                        <option value="saida">Saída</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Quantidade</label>
                    <input type="number" name="quantidade" class="form-control" min="1" required>
                </div>

                <div class="mb-3">
                    <label>Data</label>
                    <input type="date" name="data" class="form-control" required>
                </div>

                <button class="btn btn-success">Salvar</button>
                <a href="{{ route('movimentacoes.index') }}" class="btn btn-secondary">Voltar</a>
            </form>

        </div>
    </div>
</div>

</body>
</html>

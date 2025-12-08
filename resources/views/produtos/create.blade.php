<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Novo Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-success text-white">Novo Produto</div>
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('produtos.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nome do Produto</label>
                    <input type="text" name="nome" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Categoria</label>
                    <div class="d-flex gap-2">
                        <select name="categoria_id" class="form-select" required>
                            <option value="">Selecione</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">
                                    {{ $categoria->nome }}
                                </option>
                            @endforeach
                        </select>

                        <a href="{{ route('categorias.create') }}" class="btn btn-outline-primary">
                            + Categoria
                        </a>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantidade</label>
                    <input type="number" name="quantidade" class="form-control" min="0" required>
                </div>

                <button class="btn btn-success">Salvar</button>
                <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Voltar</a>
            </form>

        </div>
    </div>
</div>

</body>
</html>

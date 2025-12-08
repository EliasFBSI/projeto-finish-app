<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Produtos</h4>
            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-light btn-sm me-2">
                    🏠 Dashboard
                </a>
                <a href="{{ route('produtos.create') }}" class="btn btn-light btn-sm">
                    + Novo Produto
                </a>
            </div>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Quantidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->nome }}</td>
                            <td>{{ $p->categoria ? $p->categoria->nome : '-' }}</td>
                            <td>{{ $p->quantidade }}</td>
                            <td>
                                <a href="{{ route('produtos.edit', $p->id) }}" class="btn btn-warning btn-sm">
                                    ✏️ Editar
                                </a>

                                <form action="{{ route('produtos.destroy', $p->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir?')">
                                        🗑 Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
</body>
</html>

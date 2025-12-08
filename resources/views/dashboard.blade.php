<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Sistema de Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <center><h3 class="mb-0">Sistema de Estoque - Dashboard</h3></center>
        </div>
        <div class="card-body text-center">
            <p>Escolha uma das opções abaixo:</p>
            
            <div class="d-grid gap-3 col-6 mx-auto">
                <a href="{{ route('categorias.index') }}" class="btn btn-success btn-lg">Gerenciar Categorias</a>
                <a href="{{ route('produtos.index') }}" class="btn btn-warning btn-lg text-white">Gerenciar Produtos</a>
                <a href="{{ route('movimentacoes.index') }}" class="btn btn-info btn-lg text-white">Realizar Movimentações</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>

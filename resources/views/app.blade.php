<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Controle de Estoque</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }

        .sidebar {
            background: linear-gradient(180deg, #212529, #000);
            min-height: 100vh;
        }

        .sidebar a {
            color: #fff;
            padding: 12px;
            display: block;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 5px;
        }

        .sidebar a:hover {
            background: #495057;
        }

        .card {
            border-radius: 15px;
        }

        .navbar {
            border-radius: 0 0 20px 20px;
        }
    </style>

</head>
<body>

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">
            <i class="bi bi-box-seam"></i> Controle de Estoque
        </span>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">

        
        <div class="col-md-2 sidebar p-3">
            <h5 class="text-white mb-4">Menu</h5>

            <a href="{{ route('categorias.index') }}">
                <i class="bi bi-tags"></i> Categorias
            </a>

            <a href="{{ route('produtos.index') }}">
                <i class="bi bi-box"></i> Produtos
            </a>

            <a href="{{ route('movimentacoes.index') }}">
                <i class="bi bi-arrow-repeat"></i> Movimentações
            </a>
        </div>

        
        <div class="col-md-10 p-4">
            @yield('content')
        </div>

    </div>
</div>

</body>
</html>

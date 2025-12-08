@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Movimentações</h4>
            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-light btn-sm me-2">
                    🏠 Dashboard
                </a>
                <a href="{{ route('movimentacoes.create') }}" class="btn btn-light btn-sm">
                    + Nova Movimentação
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
                        <th>Produto</th>
                        <th>Tipo</th>
                        <th>Quantidade</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($movimentacoes as $mov)
                        <tr>
                            <td>{{ $mov->produto->nome }}</td>
                            <td>{{ ucfirst($mov->tipo) }}</td>
                            <td>{{ $mov->quantidade }}</td>
                            <td>{{ \Carbon\Carbon::parse($mov->data)->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('movimentacoes.edit', $mov->id) }}" class="btn btn-warning btn-sm">
                                    ✏️ Editar
                                </a>
                                <form action="{{ route('movimentacoes.destroy', $mov->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir?')">
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

@endsection

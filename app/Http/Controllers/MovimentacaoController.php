<?php

namespace App\Http\Controllers;

use App\Models\Movimentacao;
use App\Models\Produto;
use Illuminate\Http\Request;

class MovimentacaoController extends Controller
{
    public function index()
    {
        $movimentacoes = Movimentacao::with('produto')
            ->orderBy('data', 'desc')
            ->get();

        return view('movimentacoes.index', compact('movimentacoes'));
    }

    public function create()
    {
        $produtos = Produto::orderBy('nome')->get();
        return view('movimentacoes.create', compact('produtos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'tipo'       => 'required|in:entrada,saida',
            'quantidade' => 'required|integer|min:1',
            'data'       => 'required|date'
        ]);

        $produto = Produto::findOrFail($request->produto_id);

        if ($request->tipo === 'saida' && $request->quantidade > $produto->quantidade) {
            return back()->with('error', 'Estoque insuficiente!');
        }

        if ($request->tipo === 'entrada') {
            $produto->quantidade += $request->quantidade;
        } else {
            $produto->quantidade -= $request->quantidade;
        }

        $produto->save();

        Movimentacao::create([
            'produto_id' => $request->produto_id,
            'tipo'       => $request->tipo,
            'quantidade' => $request->quantidade,
            'data'       => $request->data
        ]);

        return redirect()->route('movimentacoes.index')
            ->with('success', 'Movimentação registrada com sucesso!');
    }

    
    public function edit(Movimentacao $movimentacao)
    {
        $produtos = Produto::orderBy('nome')->get();
        return view('movimentacoes.edit', compact('movimentacao', 'produtos'));
    }

    
    public function update(Request $request, Movimentacao $movimentacao)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'tipo'       => 'required|in:entrada,saida',
            'quantidade' => 'required|integer|min:1',
            'data'       => 'required|date'
        ]);

        $produto = Produto::findOrFail($request->produto_id);

        
        if ($movimentacao->tipo === 'entrada') {
            $produto->quantidade -= $movimentacao->quantidade;
        } else {
            $produto->quantidade += $movimentacao->quantidade;
        }

        
        if ($request->tipo === 'saida' && $request->quantidade > $produto->quantidade) {
            return back()->with('error', 'Estoque insuficiente!');
        }

        if ($request->tipo === 'entrada') {
            $produto->quantidade += $request->quantidade;
        } else {
            $produto->quantidade -= $request->quantidade;
        }

        $produto->save();

        $movimentacao->update($request->all());

        return redirect()->route('movimentacoes.index')
            ->with('success', 'Movimentação atualizada com sucesso!');
    }

   
    public function destroy(Movimentacao $movimentacao)
    {
        $produto = Produto::findOrFail($movimentacao->produto_id);

       
        if ($movimentacao->tipo === 'entrada') {
            $produto->quantidade -= $movimentacao->quantidade;
        } else {
            $produto->quantidade += $movimentacao->quantidade;
        }

        $produto->save();
        $movimentacao->delete();

        return redirect()->route('movimentacoes.index')
            ->with('success', 'Movimentação excluída com sucesso!');
    }
}

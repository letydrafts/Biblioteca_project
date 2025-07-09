<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }


    public function create()
    {
        return view('categorias.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'codigo_classificacao' => 'required|integer',
        ]);

        Categoria::create($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso!');
    }


    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }


    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }


    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'codigo_classificacao' => 'required|integer',
        ]);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoria excluída com sucesso!');
    }
}

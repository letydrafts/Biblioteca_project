<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Editora;
use App\Models\Categoria;
use Illuminate\Http\Request;

class LivroController extends Controller
{

    public function index()
    {
        $livros = Livro::with(['editora', 'categoria'])->paginate(10);
        return view('livros.index', compact('livros'));
    }

    public function create()
    {
        $editoras = Editora::all();
        $categorias = Categoria::all();

        return view('livros.create', compact('editoras', 'categorias'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'isbn' => 'required|integer|unique:livros,isbn',
            'editora_id' => 'required|exists:editoras,id',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Livro::create($request->all());

        return redirect()->route('livros.index')->with('success', 'Livro criado com sucesso!');
    }


    public function show(Livro $livro)
    {
        $livro->load(['editora', 'categoria']);
        return view('livros.show', compact('livro'));
    }

    public function edit(Livro $livro)
    {
        $editoras = Editora::all();
        $categorias = Categoria::all();

        return view('livros.edit', compact('livro', 'editoras', 'categorias'));
    }


    public function update(Request $request, Livro $livro)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'isbn' => 'required|integer|unique:livros,isbn,' . $livro->id,
            'editora_id' => 'required|exists:editoras,id',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $livro->update($request->all());

        return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso!');
    }


    public function destroy(Livro $livro)
    {
        $livro->delete();
        return redirect()->route('livros.index')->with('success', 'Livro excluído com sucesso!');
    }
}


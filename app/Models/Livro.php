<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = 'livros';
    protected $fillable = ['titulo', 'isbn', 'páginas', 'sinopse', 'editora_id', 'categoria_id'];
}

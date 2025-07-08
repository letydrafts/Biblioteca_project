<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = 'livros';
    protected $fillable = ['titulo', 'isbn', 'páginas', 'sinopse', 'editora_id', 'categoria_id'];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function editora(){
        return $this->belongsTo(Editora::class);
    }

    public function exemplares(){
        return $this->hasMany(Exemplares::class);
    }

    public function autores(){
        return $this->belongsToMany(Autor::class);
    }
}

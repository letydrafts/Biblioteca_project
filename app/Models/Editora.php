<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Editora extends Model
{
    protected $table = 'editoras';
    protected $fillable = ['nome', 'cnpj', 'email', 'telefone', 'site'];

    public function livros(){
        return $this->hasMany(Livros::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $table = 'emprestimos';
    protected $fillable = ['data_empréstimo', 'data_devolução', 'status', 'user_id', 'exemplar_id'];

    public function livro(){
        return $this->belongsTo(Livros::class);
    }

    public function emprestimos(){
        return $this->hasMany(Emprestimos::class);
    }

    public function reservas(){
        return $this->hasMany(Reservas::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exemplar extends Model
{
    protected $table = 'exemplares';
    protected $fillable = ['codigo', 'status', 'livro_id'];

     public function livro(){
        return $this->belongsTo(Livro::class);
    }

    public function emprestimos(){
        return $this->hasMany(Emprestimo::class);
    }

    public function reservas(){
        return $this->hasMany(Reserva::class);
    }
}


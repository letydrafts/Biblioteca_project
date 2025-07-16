<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exemplar extends Model
{
    protected $table = 'exemplares';
    protected $fillable = ['codigo', 'livro_id'];

     public function livro(){
        return $this->belongsTo(Livro::class);
    }

    public function emprestimos(){
        return $this->hasMany(Emprestimo::class);
    }

    public function reservas(){
        return $this->hasMany(Reserva::class);
    }
    
    public function getStatusAttribute()
{
    $emprestimoAtivo = $this->emprestimos()->whereNull('data_devolucao')->first();

    return $emprestimoAtivo ? 'Indisponível' : 'Disponível';
}

}


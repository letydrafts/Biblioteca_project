<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $table = 'emprestimos';
    protected $fillable = ['data_empréstimo', 'data_devolução', 'status', 'user_id', 'exemplar_id'];


    protected $casts = [
        'data_empréstimo' => 'datetime',
        'data_devolucao' => 'datetime',
    ];


     public function user(){
        return $this->belongsTo(User::class);
    }

    public function exemplar(){
        return $this->belongsTo(Exemplar::class);
    }

    public function multa(){
        return $this->hasOne(Multa::class);
    }
}


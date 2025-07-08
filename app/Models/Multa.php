<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Multa extends Model
{
    protected $table = 'multas';
    protected $fillable = ['dias_multa', 'motivo', 'status', 'emprestimo_id', 'user_id'];

     public function user(){
        return $this->belongsTo(user::class);
    }

    public function emprestimo(){
        return $this->belongsTo(Emprestimo::class);
    }

}


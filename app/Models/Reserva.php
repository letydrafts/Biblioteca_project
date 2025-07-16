<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';
    protected $fillable = ['data_reserva', 'status', 'user_id', 'livro_id','exemplar_id'];

     public function user(){
        return $this->belongsTo(User::class);
    }

    public function exemplar(){
        return $this->belongsTo(Exemplar::class);
    }

      public function livro()
    {
        return $this->belongsTo(Livro::class);
    }
}

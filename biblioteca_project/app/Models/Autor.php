<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'autores';
    protected $fillable = ['nome', 'data_nascimento', 'biografia'];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function editora(){
        return $this->belongsTo(Editora::class);
    }

    public function exemplares(){
        return $this->hasMany(Exemplar::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exemplar extends Model
{
    protected $table = 'exemplares';
    protected $fillable = ['codigo', 'status', 'livro_id'];
}

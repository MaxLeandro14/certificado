<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
   protected $table = 'cursos';
   protected $fillable = ['name', 'empresa_id', 'carga', 'description'];
}

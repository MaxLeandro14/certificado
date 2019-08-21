<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlunoCurso extends Model
{
    protected $table = 'alunos_cursos';
    protected $fillable = ['aluno_id', 'curso_id'];

}

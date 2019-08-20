<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlunoEmpresa extends Model
{
    protected $table = 'alunos_empresas';
    protected $fillable = ['aluno_id', 'empresa_id'];
}

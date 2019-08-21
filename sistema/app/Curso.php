<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
   protected $table = 'cursos';
   protected $fillable = ['name', 'empresa_id', 'carga', 'description'];

   /*tabela cursos, pegando todos os alunos desse curso usando uma tabela pivo chamada 'alunos_cursos', o qual possui o id de ambas as tabelas a que faz relação.*/
   public function alunos()
   {
   		return $this->belongsToMany(Aluno::class, 'alunos_cursos');
   }
}

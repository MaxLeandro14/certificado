<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Aluno;
use App\AlunoEmpresa;

class CertificadoController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    function formCurso(){

    	$id_empresa = auth()->user()->empresa;
  		$cursos = Curso::where('empresa_id', $id_empresa)->orderBy('created_at', 'ASC')->get();
    	return view('painel.certificado.cadastro_curso',compact('cursos'));
    }
    function cadastroCurso(Request $req, Curso $curso){
        //validar os campos
        if(auth()->user()->empresa != 'MASTER01'){
        	$dados = $req->all();
        	$dados['empresa_id'] = auth()->user()->empresa;
            if($dados['name'] != ''){
                $form = $curso->create($dados);
           
                return redirect()->action('CertificadoController@formCurso')->with('msg', 'Cadastrado com Sucesso!');
            }
        }
        
        return redirect()->action('AdminController@formCurso')->with('msg', 'Não foi possível cadastrar, verifique os dados e tente novamente!');
    }

    function formAluno()
    {
        return view('painel.certificado.cadastro_aluno');
    }

    function cadastroAluno(Request $req, Aluno $aluno, AlunoEmpresa $alunoEmp)
    {
        if(auth()->user()->empresa != 'MASTER01'){
            //verificar se o aluno já está cadastrado, se sim, verificar se o mesmo está na relação empresa aluno (empresa do usuarios, pois o usuario pode está em varias empresas), não tiver, devo acrescentar
            $insert = $aluno->create($req->all());
        
            if($insert){
                $dados['aluno_id'] = $insert->id;
                $dados['empresa_id'] = auth()->user()->empresa;
                $alunoEmp->create($dados);
                
                return redirect()->action('CertificadoController@formAluno')->with('msg', 'Cadastrado com Sucesso!');
            }
        }
      
        
        return redirect()->action('CertificadoController@formAluno')->with('msg', 'Sem Atribuição para esse cadastro!');

    }

    function listaAlunoCurso()
    {
        $id_empresa = auth()->user()->empresa;
        $cursos = Curso::where('empresa_id', $id_empresa)->orderBy('created_at','ASC')->get();

        return view('painel.certificado.aluno_curso', compact('cursos'));
    }

    function formAlunoCurso($id, Curso $curs){

        $curso = $curs->where('id', $id)->first();
  
        if(auth()->user()->empresa == $curso->empresa_id){

            return view('painel.certificado.incluir_aluno_curso', compact('curso'));
        }

        return redirect()->action('CertificadoController@listaAlunoCurso')->with('msg', 'Sem Atribuição para esse cadastro!');
       
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;

class CertificadoController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    function formCurso(){

    	$id_empresa = auth()->user()->empresa;
  		$cursos = Curso::where('empresa_id', $id_empresa)->orderBy('name', 'desc')->get();
    	return view('painel.certificado.cadastro',compact('cursos'));
    }
    function cadastroCurso(Request $req){

    	$dados = $req->all();
    	$dados['empresa_id'] = auth()->user()->empresa;
        if($dados['name'] != ''){
            $form = Curso::create($dados);
            $req->session()->flash('msg_sucesso', 'Empresa Cadastrada!');
            return redirect()->action('CertificadoController@formCurso')->with('msg', 'Cadastrado com Sucesso!');
        }
        
        return redirect()->action('AdminController@formCurso')->with('msg', 'Não foi possível cadastrar, verifique os dados e tente novamente!');
    }
}

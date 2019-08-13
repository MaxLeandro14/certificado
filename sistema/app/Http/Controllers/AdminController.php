<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;



class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function formEmpresa()
    {
        return view('painel.empresas.cadastro');
    }
    public function cadastroEmpresa(Request $req)
    { 
        
        $dados = $req->all();
        $dados['ativo'] = 1;
        if($dados['name'] != ''){
            $form = Empresa::create($dados);
            $req->session()->flash('msg_sucesso', 'Empresa Cadastrada!');
            return redirect()->action('AdminController@formEmpresa')->with('msg', 'Cadastrado com Sucesso!');
        }
        
        return redirect()->action('AdminController@formEmpresa')->with('msg', 'Não foi possível cadastrar, verifique os dados e tente novamente!');
    }
   
}

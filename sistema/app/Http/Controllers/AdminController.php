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
    public function formEmpresa(Empresa $emp)
    {
        $empresas = $emp->all();
        return view('painel.empresas.cadastro', compact('empresas'));
    }
    public function cadastroEmpresa(Request $req, Empresa $empre)
    { 
        //verificar campos antes de salvar
        if(auth()->user()->empresa == 'MASTER01'){
            $dados = $req->all();
            $dados['ativo'] = 1;
            if($dados['name'] != 'MASTER01'){
                $form = $empre->create($dados);
                $req->session()->flash('msg_sucesso', 'Empresa Cadastrada!');
                return redirect()->action('AdminController@formEmpresa')->with('msg', 'Cadastrado com Sucesso!');
            }
        }
        
        return redirect()->action('AdminController@formEmpresa')->with('msg', 'Sem atribuição para esse cadastro, contate o administrador!');
    }
   
}

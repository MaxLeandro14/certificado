@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Cadastro de Empresas</h1>
@stop

@section('content')
@if(session('msg'))
    <div class="col-md-8">
    	<div class="alert alert-success">
        	<p>{{session('msg')}}</p>
    	</div>
    </div>
@endif
    	<div class="col-md-6">
    		 <br /> 
    		 <br /> 
			<form action="{{ route('admin.cadastro.empresa') }}" method="POST" >
				{{csrf_field()}}
				<div class="row">
					<div class="col-md-8">
						  <div class="form-group">
						    <label for="exampleInputEmail1">Nome da Empresa</label>
						    <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="name">
						  </div>
			   		</div>
				</div>
				<div class="row">
			 	 <div class="col-md-5">
					  <div class="form-group">
					    <label for="exampleInputPassword1">CNPJ (Opcional)</label>
					    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="cnpj">
					  </div>
				  </div>
			  </div>
			  <button type="submit" class="btn btn-primary">Cadastrar</button>
			</form>
    	</div>
    	<div class="col-md-6"></div>
@stop

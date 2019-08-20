@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Incluir aluno no curso <span style="color: blue;"> {{$curso->name}} </span></h1>
    <h4>Carga horária {{$curso->carga}} </h4>
    <h4>Cadastrado em {{$curso->created_at->format('d-m-Y H:i:s')}} </h4>
@stop

@section('content')
    @if(session('msg'))
    <div class="col-md-8">
    	<div class="alert alert-success">
        	<p>{{session('msg')}}</p>
    	</div>
    </div>
@endif
   <div class="row">
   		 	<div class="col-md-5">
    		 <br /> 
    		 <br /> 
			<form action="{{ route('admin.cadastro.aluno') }}" method="POST" >
				{{csrf_field()}}
				<div class="row">
					<div class="col-md-12">
						  <div class="form-group">
						    <label for="exampleInputEmail1">Nome do Aluno</label>
						    <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="name">
						  </div>
			   	</div>
				</div>
				<div class="row">
			 	 <div class="col-md-7">
					  <div class="form-group">
					    <label for="exampleInputPassword2">E-mail (Opcional)</label>
					    <input type="email" class="form-control" id="exampleInputPassword2" placeholder="" name="email">
					  </div>
				  </div>
			  </div>
	       <div class="row">
         <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputPassword3">CPF</label>
              <input required type="text" class="form-control" id="exampleInputPassword3" placeholder="" name="cpf">
            </div>
          </div>
        </div>
			  <button type="submit" class="btn btn-primary">Cadastrar</button>
			</form>
    	</div>
   </div>
@stop
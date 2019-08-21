@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Incluir Aluno no Curso <span style="color: blue;"> {{$curso->name}} </span></h1>
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
			<form action="{{ route('admin.cadastro.aluno.curso', [$curso->id]) }}" method="POST" >
				{{csrf_field()}}
	    <div class="row">
	         <div class="col-md-7">
	            <div class="form-group">
	              <label for="exampleInputPassword3">CPF</label>
	              <input required type="text" class="form-control" id="exampleInputPassword3" placeholder="" name="cpf">
	            </div>
	          </div>
        </div>
			  <button type="submit" class="btn btn-primary">Adicionar</button>
			</form>
    	</div>
   </div>
   <div class="row">
    <br /> 
    <br /> 
      <div class="col-md-12">
         @if(isset($alunos))
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Alunos desse curso</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tabela" class="table tabela table-bordered table-hover" pageLength="5" aaSorting="1 asc">
                <thead>
                <tr>
                  <th>Nome</th>
                  <th>CPF</th>
                </tr>
                </thead>
                <tbody>

                  @foreach($alunos as $aluno)
                  <tr>
                    <td>{{$aluno->name}}</td>
                    <td>{{$aluno->cpf}}</td>
                  </tr>
                @endforeach
           
                </tbody>
                <tfoot>
                <tr>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
      @endif
   </div>
@stop
@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Cadastro de Curso</h1>
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
			<form action="{{ route('admin.cadastro.curso') }}" method="POST" >
				{{csrf_field()}}
				<div class="row">
					<div class="col-md-12">
						  <div class="form-group">
						    <label for="exampleInputEmail1">Nome do curso</label>
						    <input required type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="name">
						  </div>
			   		</div>
				</div>
				<div class="row">
			 	 <div class="col-md-4">
					  <div class="form-group">
					    <label for="exampleInputPassword1">Carga Horária</label>
					    <input required type="text" class="form-control" id="exampleInputPassword1" placeholder="" name="carga">
					  </div>
				  </div>
			  </div>
			  	<div class="row">
			 	 <div class="col-md-12">
					  <div class="form-group">
					    <label for="exampleInputPassword1">Descrição/Observação (Opcional)</label>
					    <textarea id="exampleInputPassword1" class="form-control" rows="3" name="description"></textarea>
					  </div>
				  </div>
			  </div>
			  <button type="submit" class="btn btn-primary">Cadastrar</button>
			</form>
    	</div>
   </div>
   <div class="row">
   	<br /> 
   	<br /> 
   	 	<div class="col-md-9">
   	 		 @if(isset($cursos))
   	 				<div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de cursos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tabela" class="table tabela table-bordered table-striped" pageLength="5" aaSorting="1 asc">
                <thead>
                <tr>
                  <th>Nome</th>
                  <th>Carga Horária</th>
                </tr>
                </thead>
                <tbody>

              	  @foreach($cursos as $curso)
	                <tr>
	                  <td>{{$curso->name}}</td>
	                  <td>{{$curso->carga}}</td>
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
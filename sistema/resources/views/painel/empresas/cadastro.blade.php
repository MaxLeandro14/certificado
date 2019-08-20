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
	<div class="row">
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
    </div>	
   <div class="row">
    <br /> 
    <br /> 
      <div class="col-md-12">
         @if(isset($empresas))
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listagem das empresas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tabela" class="table tabela table-bordered table-hover" pageLength="5" aaSorting="1 asc">
                <thead>
                <tr>
                  <th>Empresa</th>
                  <th>CNPJ</th>
                  <th>Status</th>
                  <th>Data de cadastro</th>
                </tr>
                </thead>
                <tbody>

                  @foreach($empresas as $empresa)
                  <tr>
                    <td>{{$empresa->name}}</td>
                    <td>{{$empresa->cnpj}}</td>
                    <td>{{$empresa->ativo}}</td>
                    <td>{{$empresa->created_at->format('d-m-Y H:i:s')}}</td>
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

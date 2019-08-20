@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Adicionar Aluno ao Curso</h1>
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
    <br /> 
    <br /> 
      <div class="col-md-12">
         @if(isset($cursos))
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Escolha o curso para adicionar</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tabela" class="table tabela table-bordered table-hover" pageLength="5" aaSorting="1 asc">
                <thead>
                <tr>
                  <th>Curso</th>
                  <th>Carga horária</th>
                  <th>Data de cadastro</th>
                  <th>Click para Adicionar Aluno</th>
                </tr>
                </thead>
                <tbody>

                  @foreach($cursos as $curso)
                  <tr>
                    <td>{{$curso->name}}</td>
                    <td>{{$curso->carga}}</td>
                    <td>{{$curso->created_at->format('d-m-Y H:i:s')}}</td>
                    <td><a class="btn btn-default btn-lg" href="{{route('admin.cadastro.incluir.aluno', [$curso->id])}}"><i class="fas fa-arrow-circle-right"></i></a></td>
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
@extends('layouts.default')
@section('content')
	<div class="row">
    	<div class="col-lg-7 margin-tb">
           <!-- <div class="pull-left">
                <h2>Editar Disciplina</h2>
            </div>-->
            <a href="{{ route('alunos.index') }}" class="close remove-data-from-delete-form" data-dismiss="modal" aria-hidden="true">×</a>
            <div class="modal-header">   
                <h2 class="modal-title" id="custom-width-modalLabel1">Excluir Aluno</h2>
            <!--<div class="pull-right">-->             
                <!--<a class="btn btn-primary" href="{{ route('disciplinas.index') }}"> Voltar</a>-->
            </div>
    	</div>
    </div>
    <div class="col-xs-7 col-sm-7 col-md-7">
        <div class="form-group">
        	<h3>Deseja deletar este aluno?</h3> 
            <p></p>
            <strong>Nome:</strong>{!! $aluno->nome !!}
            <div class="pull-right">
	            <p>{!! Form::open(['method' => 'DELETE','route' => ['alunos.destroy', $aluno->id_aluno],'style'=>'display:inline']) !!}
				{!! Form::submit('Deletar', ['class' => 'btn btn-danger']) !!}
				{!! Form::close() !!}</p>
			</div>
        </div>
    </div>
@endsection

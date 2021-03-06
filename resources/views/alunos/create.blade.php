    @extends('layouts.default')
    @section('content')
        <br>
        <div class="row">
            <div class="col-lg-7 margin-tb">
               <!-- <div class="pull-left">
                    <h2>Editar Disciplina</h2>
                </div>-->
                <a href="{{ route('alunos.index') }}" class="close remove-data-from-delete-form" data-dismiss="modal" aria-hidden="true">×</a>
                <div class="modal-header">   
                    <h2 class="modal-title" id="custom-width-modalLabel3">Novo Aluno</h2>
                <!--<div class="pull-right">-->             
                    <!--<a class="btn btn-primary" href="{{ route('disciplinas.index') }}"> Voltar</a>-->
                </div>
            </div>
        </div>
       
        <script type="text/javascript">
            $(document).ready(function(){
                $("select[name='tab_cursos_id_curso']").ready(function(event){
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "<?php echo route('select-ajax') ?>",
                        method: 'POST',
                        async: true,
                        
                        success: function(data) {
                            //alert(data.options);
                            $("select[name='tab_cursos_id_curso']").html('');
                            $("select[name='tab_cursos_id_curso']").html(data.options);
                        }
                    });
                });
            });

            $(document).ready(function(){
                $("select[name='tab_disciplinas_id_disciplina']").focus(function(event){
                    var id = $("select[name='tab_cursos_id_curso']").val();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "select-ajax2/"+id,
                        method: 'POST',
                        async: true,
                    
                        success: function(data) {
                            //alert(data.options);
                            $("select[name='tab_disciplinas_id_disciplina']").html('');
                            $("select[name='tab_disciplinas_id_disciplina']").html(data.options);
                        }
                    });
                });
            });
           

        </script>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {!! Form::open(array('route' => 'alunos.store','method'=>'POST')) !!}
            <p>@include('alunos.form')</p>
        {!! Form::close() !!}
    @endsection
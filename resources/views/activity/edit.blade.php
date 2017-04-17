@extends('layouts.app')
@section('title','Actividad')
@section('content')
<?php 
error_reporting(0);
session_start();
$sesion =$_SESSION["loggedIn"];    
?>
	<div class="blue-block">
		<div class="page-title">
			<h3 class="pull-left"><i class="fa fa-building"></i> {{ $activity->sc_motivo }} <span style="letter-spacing:0px;">Editando...</span></h3> 	
			<div class="breads pull-right">
				<a href="dashboard.php">Inicio </a>/ Actividad / Editar
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div class="page-content page-posts" style="height:calc(100vh - 100px);">
		</div>
	</div>

	<!-- Modales !-->
	<div class="modal fade" id="editActiv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel"><b>Editando Actividad</b></h4>
	      </div>
		  {!! Form::open(['url'=>'activity/'.$activity->sc_id, 'method' => 'PATCH', 'id' => 'editAct']) !!}
	      	<div class="modal-body">
		        <input class="form-control" name="titulo" placeholder="Motivo" onblur="this.value=this.value.toUpperCase()" value="{{ $activity->sc_motivo }}"><br/>
		        <label style="">Observación</label><br/>
		        <textarea class="form-control" placeholder="" onblur="this.value=this.value.toUpperCase()" name="observacion">{{ $activity->sc_observacion }}</textarea><br/>
		        <label style="">Fecha</label><br/>
		        <input class="form-control" placeholder="" type="date" name="fecha" disabled="disabled" value="{{ $activity->sc_fecha }}">
		        <br/>
		        
		        
		      </div>
		      <div class="modal-footer">
		        <a class="btn btn-default" data-dismiss="modal" onclick="window.history.back();">Cerrar</a>
		        <button type="submit" class="btn saveBtn btn-primary">Guardar</button>
	      	</div>
	      {!! Form::close() !!}
	    </div>
	  </div>
	</div>
@endsection
@section("scripts")
<script>
	$(document).ready(function(){
		$("#editActiv").modal('show');
		$("#editAct").submit(function() {
		    $.ajax({
		           type: "POST",
		           url: '{{url("activity/".$activity->sc_id)}}',
		           data: $("#editAct").serialize(), // serializes the form's elements.
				   beforeSend: function(){
						$(".saveBtn").attr('disabled','disabled');
						swal({
						  title: "Procesando",
						  text: "Se está enviando tu formulario",
						  type: "success",
						});
				   },
		           success: function(data)
		           {
		           		window.history.back();
		           }
		    });
		    return false;
		});
	});
</script>
@endsection
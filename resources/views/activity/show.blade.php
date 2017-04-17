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
			@if(!$colegio)
			<h3 class="pull-left"><i class="fa fa-building"></i> Colegios <span style="letter-spacing:0px;">Colegios registrados</span></h3> 	
			@else
			<h3 class="pull-left"><i class="fa fa-building"></i> {{$colegio[0]->col_nombre}} <span style="letter-spacing:0px;">Información de colegio...</span></h3> 	
			@endif
			<div class="breads pull-right">
				<a href="dashboard.php">Inicio </a>/ Colegios
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div class="page-content page-posts">
			<div class="page-tabs">
				@if($colegio)
				<ul class="nav nav-tabs">
					<li>
						<a href="panel/institucion.php?type=info&amp;id=4368953&amp;tab=1">Información Básica</a>
					</li>
					<li>
						<a href="panel/institucion.php?type=info&amp;id=4368953&amp;tab=2&amp;view=1">Institución</a>
					</li>
					<li>
						<a href="panel/institucion.php?type=info&amp;id=4368953&amp;tab=3">Pagos</a>
					</li>
					<li>
						<a href="panel/institucion.php?type=info&amp;id=4368953&amp;tab=4">Notificar Captura</a>
					</li>
					<li class="active"><a>Actividad</a></li>
				</ul>
				@else
				<ul class="nav nav-tabs">
					<li><a href="panel/institucion.php?type=colegio">Colegios</a></li>
					<li><a href="panel/institucion.php?type=colegio">Nuevo Colegio</a></li>
					<li class="active"><a>Actividad</a></li>
				</ul>
				@endif
                @if($request->get('c'))
				<?php if($sesion['u_rango']==3||$sesion['u_rango']==8||$sesion['u_rango']==7){?>
					<p><a class="btn btn-primary pull-right" style="margin-top:-50px; margin-bottom:40px; margin-right:10px;" data-toggle="modal" data-target="#addActiv"><i class="fa fa-plus"></i> Agregar Actividad</a><a class="btn btn-default pull-right" style="margin-top:-50px; margin-bottom:40px; margin-right:10px;" href="/print?c={{$request->get('c')}}"><i class="fa fa-print"></i> Imprimir Tabla</a></p>
				<?php } ?>
				@else
				<?php if($sesion['u_rango']==3||$sesion['u_rango']==8||$sesion['u_rango']==7){?>
					<p><a class="btn btn-default pull-right" style="margin-top:-50px; margin-bottom:40px; margin-right:10px;" href="/print?c={{$request->get('c')}}"><i class="fa fa-print"></i> Imprimir Tabla</a></p>
				<?php } ?>
				@endif

				<div class="tab-content">
					<div class="tab-pane fade active in" id="posts" style="min-height:300px; margin-bottom:20px;">
						<div id="tabla1">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        	@if(!$request->get('c'))
                                            <th>Colegio</th>
                                            @endif
                                            <th>Fecha</th>
                                            <th>Motivo</th>
                                            <th>Observacion</th>
                                            <th>Usuario</th>
                                        	@if($request->get('c'))
                                            <th width="100px"></th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
										@foreach($activities as $activity)
                                        <tr>
                                        	@if(!$request->get('c'))
							            	<td>{{$activity->colegio->col_nombre}}</td>
                                            @endif
							            	<td>{{date('d/m/Y',strtotime($activity->sc_fecha))}}</td>
							            	<td><b>{{$activity->sc_motivo}}</b></td>
							            	<td><b>{{$activity->sc_observacion}}</b></td>
							            	<td>{{$activity->usuario->u_nombres}} {{$activity->usuario->u_apellidos}}</td>
                                        	@if($request->get('c'))
                                            <td>
                                            	<a 
                                            	class="btn btn-danger"
                                            	href="#"
                                            	id="removeItem"
                                            	data-id="{{$activity->sc_id}}"
                                            	>
                                            		<i class="fa fa-times"></i>
                                            	</a>
                                            	<a 
                                            	class="btn btn-success" 
                                            	href="/activity/{{$activity->sc_id}}/edit"
                                            	>
                                            		<i class="fa fa-edit"></i>
                                            	</a>
                                            </td>
                                            @endif
						                </tr>
										@endforeach
                                    </tbody>
                				</table>
              				</div>
            			</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{!! Form::open(['method' => 'DELETE', 'id' => 'delAct']) !!}
	{!! Form::close() !!}

	<!-- Modales !-->
	<div class="modal fade" id="addActiv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Nueva Actividad</h4>
	      </div>
		  {!! Form::open(['url'=>'activity', 'method' => 'POST', 'id' => 'newAct']) !!}
	      	<div class="modal-body">
	      		<input type="hidden" name="col" value="{{$request->get('c')}}">
	      		<input type="hidden" name="user" value="{{$sesion['u_id']}}">
		        <input class="form-control" name="titulo" placeholder="Motivo" onblur="this.value=this.value.toUpperCase()"><br/>
		        <label style="">Observación</label><br/>
		        <textarea class="form-control" placeholder="" onblur="this.value=this.value.toUpperCase()" name="observacion"></textarea><br/>
		        <label style="">Fecha</label><br/>
		        <input class="form-control" placeholder="" type="date" name="fecha">
		        <br/>
		        
		        
		      </div>
		      <div class="modal-footer">
		        <a class="btn btn-default" data-dismiss="modal">Cerrar</a>
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
		$("#newAct").submit(function() {
		    $.ajax({
		           type: "POST",
		           url: '{{url("activity")}}',
		           data: $("#newAct").serialize(), // serializes the form's elements.
				   beforeSend: function(){
						$(".saveBtn").attr('disabled','disabled');
						swal("info","Procesando");
				   },
		           success: function(data)
		           {
		           		location.reload();
		           }
		    });
		    return false;
		});
		$("#removeItem").click(function(){
			var id = $(this).data('id');
			swal({
			  title: "¿Deseas eliminar esta Actividad?",
			  text: "Se perderá para siempre",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#DD6B55",
			  confirmButtonText: "Eliminar",
			  closeOnConfirm: false
			},
			function(){
				$.ajax({
		           type: "DELETE",
		           url: '/activity/'+id,
		           data: $("#delAct").serialize(), // serializes the form's elements
		           success: function(data)
		           {
		           		swal({
						  title: "Genial",
						  text: "Se ha eliminado esta actividad",
						  type: "success",
						  closeOnConfirm: false
						},function(){
		           			location.reload();
						});
		           }
		    	});
			});
		});
	});
</script>
@endsection
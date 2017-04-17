<?php 
error_reporting(0);
session_start();
$sesion =$_SESSION["loggedIn"];    
?>
<html><meta charset="UTF-8">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>
html{
	padding:30px;
	font-size:14px !important;	
	display:none;
}
td{
	padding: 2px !important;	
}
@media print{
html{
	display:block;
	margin-top:-35px;	
}
}
table{
	font-size:13px !important;	
}
</style>
			@if(!$colegio)
			<h3 class="pull-left"><i class="fa fa-building"></i> Actividad &raquo; Colegios</h3>
			@else
			<h3 class="pull-left"><i class="fa fa-building"></i> Actividad {{$colegio[0]->col_nombre}}</h3>
			@endif
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        	@if(!$request->get('c'))
                                            <th>Colegio</th>
                                            @endif
                                            <th>Fecha</th>
                                            <th>Motivo</th>
                                            <th>Observacion</th>
                                            <th>Usuario</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										@foreach($activities as $activity)
                                        <tr style="padding:10px;">
                                        	@if(!$request->get('c'))
							            	<td>{{$activity->colegio->col_nombre}}</td>
                                            @endif
							            	<td>{{date('d/m/Y',strtotime($activity->sc_fecha))}}</td>
							            	<td><b>{{$activity->sc_motivo}}</b></td>
							            	<td><b>{{$activity->sc_observacion}}</b></td>
							            	<td>{{$activity->usuario->u_nombres}} {{$activity->usuario->u_apellidos}}</td>
						                </tr>
										@endforeach
                                    </tbody>
                				</table>

      <script>
      	window.print();
      	window.history.back();
      </script>
					</html>


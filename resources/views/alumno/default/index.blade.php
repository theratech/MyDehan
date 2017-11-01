@extends('layouts.alumno')
@section('title','Yo')
@section('content')
<div class="blue-block" style="background: rgb(88, 181, 224)">
	<div class="page-title">
		<h3 class="pull-left"><img src="/img/logo_small.white.png" width="100px"> &bull; <span>Colegio DEHAN <b>{{$user->u_nombres}} {{$user->u_apellidos}}</b></span></h3> 

		<div class="breads pull-right" style="margin-top:2px;">
			<a class="btn btn-info" href="/me"><b style="font-weight: 800;">Mi Avance</b></a>
			<a class="btn btn-info" href="/achievements" style="font-weight: 400;">Logros</a>
			<a class="btn btn-danger" href="/query.php?f=logout" style="font-weight: 400;"><i class="fa fa-power-off"></i> Cerrar Sesión</a>
			
		</div>
		<div class="clearfix"></div>
	</div>
	<br/>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div id="avance" style="height:400px;"></div>
			</div>
			<div class="col-md-4">
				<div class="blue-knob-block" style="margin-top:7px; padding:10px 20px; background: #FFF; border-radius:0; transform: scale(1.02); opacity: 0.95;">
                	<h3 style="margin-top:0px; padding-top:7px; font-weight:400; text-align: center;">Nivel {{$nivelActual->n_nombre}}</h3>
                	<br/>
					<ul class="list-inline list-unstyled">
						<p>
								<a class="btn btn-success">Libro {{$libroActual->l_nombre}} de 25</a>
						</p>
						<br>
                        <p>
                        		<h5>{{$nivelActual->n_critical}}</h5>
                                <p>{{$nivelActual->n_basico}}</p>
						</p>
					</ul>
				</div>
				<div class="blue-knob-block" style="margin-top:20px; padding:10px 20px; background: #FFF; border-radius:0; opacity: 0.8;">
                	<h3 style="margin-top:0px; padding-top:7px; font-weight:400; text-align: center;">Nivel {{$nivelSiguiente->n_nombre}}</h3>
                	<br/>
					<ul class="list-inline list-unstyled">
						<p>
								<!-- jQuery Knob -->
								
								<a class="btn btn-primary">25 Libros</a>
						</p>
						<br>
                        <p>
                        		<h5>{{$nivelSiguiente->n_critical}}</h5>
                                <p>{{$nivelSiguiente->n_basico}}</p>
						</p>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row" style="background:#EEE;margin: 0 -30px;padding: 50px 20px; text-align: center">
		@if(!count($reconocimientos)==0)
		<h4>
			<b>FELICIDADES</b>
		</h4>
		<p>
			Has logrado completar las siguientes medallas
		</p>
		<br/>
		@foreach($reconocimientos as $rec)
			<div class="rec" style="width: 10%; padding: 10px; margin-left:auto; margin-right: auto; display: inline-table;">
				<img src="{{ $rec->r_img }}" width="100%"/>
				<br/><br/>
				<strong>{{ $rec->r_mes." ".$rec->r_ano }}</strong>
			</div>
		@endforeach
		@else
			<h4>
				<b>¡UY!</b>
			</h4>
			<p>
				Todavía no tienes ninguna medalla.
			</p>
		@endif
	</div>
</div>
@endsection
@section("scripts")
<script type="text/javascript">
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'avance',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
  	{!!$datos!!}
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'month',
  parseTime: false,
  lineColors: ['#FFF'],
  grid: false,
  xLabels: 'month',
  gridTextColor: ['#FFF'],
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Libro'],
  gridIntegers: true,
  ymin: '{{ $menor }}'
});
</script>
@endsection


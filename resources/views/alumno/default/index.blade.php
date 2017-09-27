@extends('layouts.app')
@section('title','Seguimiento')
@section('content')
<?php 
error_reporting(0);
session_start();
$sesion =$_SESSION["loggedIn"];    
?>
<div class="blue-block">
	<div class="page-title">
		<h3 class="pull-left"><i class="fa fa-building"></i> Inicio <span style="letter-spacing:0px;"> Vista General</span></h3> 	
		<div class="breads pull-right">
			<a href="dashboard.php">Mi Avance</a>
		</div>
		<div class="clearfix"></div>
	</div>
	<br/>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h1>Hola</h1>
			</div>
			<div class="col-md-4">
				<h1>Hola</h1>
			</div>
		</div>
	</div>
</div>
@endsection
@section("scripts")
<script type="text/javascript">
	
</script>
@endsection
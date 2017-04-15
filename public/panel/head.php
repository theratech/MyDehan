<?php session_start();
date_default_timezone_set ('America/Chicago');

include("../conexion.php");

if(!$_SESSION["loggedIn"]){
	header("Location: ../index.php?nologged=true");
}else{
	$sesion = $_SESSION["loggedIn"];	
}

$query = "SELECT u.*,r.* FROM usuarios u inner join rangos r ON u.u_id = '".$sesion['u_id']."' AND u.u_rango = r.r_id";
$res = mysql_query($query);
									
									if($res)
									{
										while($filas = mysql_fetch_assoc($res))
										{
											$my_nombre = $filas["u_nombres"];
											$my_apellido = $filas["u_apellidos"];
											$my_id = $filas["u_id"];
											$my_uname = $filas["u_username"];
											$my_rango = $filas["r_nombre"];
											$my_gender = $filas["u_gender"];
											if($res){	
									}
										}
									}
									
								
?>
<!DOCTYPE html>
<html>
	<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<!-- Title here -->
		<title>MyDEHAN - <?php echo $TPAG?></title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="ResponsiveWebInc">
      
      	<style>
		.morris-hover.morris-default-style {
			border-radius: 2px !important;
			padding: 6px;
			color: #FFF !important;
			
			background: rgba(85, 233, 139, 0.79)!important ;
			border: solid 2px rgba(230, 230, 230, 0) !important;
			font-family: sans-serif;
			font-size: 12px;
			text-align: center;
		}
.activate{
	transition: color .2s;	
}
.disabled{
	opacity: 0.7;	
}
		</style>
		<!-- Google web fonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Styles -->
		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
		<!-- jQuery UI -->
		<link href="css/jquery-ui.css" rel="stylesheet">
		
		
      <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
		<!-- Bootstrap Switch -->
		<link href="css/bootstrap-switch.css" rel="stylesheet">
		<!-- jQuery Datatables -->
		<link href="css/jquery.dataTables.css" rel="stylesheet">
		<!-- jQuery prettyPhoto -->
		<link href="css/prettyPhoto.css" rel="stylesheet">	
		<!-- Font awesome CSS -->
		<link href="css/font-awesome.min.css" rel="stylesheet">		
		<!-- Custom CSS -->
		<link href="css/style.css?version" rel="stylesheet">
		
		<!--[if IE]>
			<link rel="stylesheet" type="text/css" href="css/style-ie.css" />
		<![endif]-->
            
		<!-- Favicon -->
		<link rel="shortcut icon" href="index.html#">
	</head>
	
	<body>

                      
         
      <div class="out-container">
         <div class="outer">
            <!-- Sidebar starts -->
            <div class="sidebar" id="navbar" style="height:auto;">
                  <!-- Logo starts -->
                  <div class="logo">
                  <?php if (date("m-d")=="07-09"){
					  ?>
                     <h1><a href="index.html"><img src="../img/identilogoplus.bug.gif" width="205px"></a></h1>
                     <?php }else{
						 if ($sesion['u_activo']==2){
					  ?>
                     <h1><a href="index.html"><img src="../img/identilogoplus.png" width="245px"></a></h1>
                     <?php }else{
							?>
                     <h1><a href="index.html"><img src="../img/identilogo.png" width="200px"></a></h1>
                     <?php } }?>
                  </div>
                  <!-- Logo ends -->
                  
                  <!-- Sidebar buttons starts -->
                  <div class="sidebar-buttons text-center">
                     <!-- User button -->
                     <div class="btn-group">
                     </div>
                     <!-- Logout button -->
                     <div class="btn-group">
                       <a class="btn btn-warning btn-xs"><i class="fa fa-power-off"></i></a>
                       <a href="../index.php" class="btn btn-warning btn-xs">Cerrar Sesión</a>
                     </div>
                  </div>
										<!-- Labels -->
										<div class="col-md-12 col-sm-12 col-xs-12">
											<h5><a href="index.html#" style="color:#000;"><?php echo $my_nombre;?> <?php echo $my_apellido;?></a></h5>
											<p><?php echo $my_rango;?></p>
										</div>
                  <!-- Sidebar buttons ends -->
                  
                  <!-- Sidebar search -->
                     <!--<div class="sidebar-search">
                        <form class="form-inline" role="form">
                           <div class="input-group">
                              <input type="text" class="form-control" id="s" placeholder="Type Here to Search...">
                              <!-- Search button -->
                              <!--<span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                              </span>
                            </div>
                        </form>
                     </div>-->
                  <!-- Sidebar search -->
                  
                  <!-- Sidebar navigation starts -->
                  <hr style=" border-bottom: dashed 1px #CCC !important; border:none; margin-bottom:1px;"/>
				  
				  <div class="sidebar-dropdown" style="background:#f00; margin-bottom:-16px;"><a href="index.html#" style="color:white; border:none transparent; box-shadow:none;">Menú</a></div>
				  
                  <div class="sidey" id="navbar1">
                     <ul class="nav">
                         <!-- Main navigation. Refer Notes.txt files for reference. -->
                         
                         <!-- Use the class "current" in main menu to hightlight current main menu -->
                         <?php if($sesion['u_rango']==1){?>
                         <li class="current"><a href="dashboard.php"><i class="fa fa-desktop" id="menut1"></i> Inicio</a></li><?php if ($sesion['u_activo']==2){
							?><li class="current"><a href="dashboard.php?mode=dehan"><i class="fa fa-circle" id="menut3"></i> MyDEHAN</a></li><?php   
						   }?>
                          <li class="current"><a href="history.php?y=<?php echo date('Y');?>"><i class="fa fa-book" id="menut2"></i> Historial</a></li>
                           <!--<li class="current"><a href="awards.php"><i class="fa fa-trophy" id="menut3"></i> Mis Stickers</a></li>!--><?php }?>
                           
                           <?php if($sesion['u_rango']==2){?>
                           <li class="current"><a href="dashboard.php"><i class="fa fa-desktop" id="menut1"></i> Inicio</a></li>			  <?php if ($sesion['u_activo']==2){?>
                           <li class="current"><a href="new.php?hw=true"><i class="fa fa-edit" id="menut2"></i> Tareas</a></li>			   <li class="current"><a href="dashboard.php"><i class="fa fa-asterisk" id="menut3"></i> Calendarios</a></li>			
                           <?php } ?>
                          <?php }?>
                           
                           <?php if($sesion['u_rango']==3){?>
                           <li class="current"><a href="dashboard.php?type=info&id=&tab=1"><i class="fa fa-desktop" id="menut1"></i> Inicio</a></li>
						   
						   
						   <?php }?>
                           
                           <?php if($sesion['u_rango']==4){?>
                           <li class="current"><a href="dashboard.php?type=info&id=&tab=1"><i class="fa fa-desktop" id="menut1"></i> Inicio</a></li>
                           <?php if ($sesion['u_activo']==2){?>
                           <li class="current"><a href="new.php?asignature=true"><i class="fa fa-plus" id="menut2"></i> Materias</a></li>			   		
                           <?php } ?>
                          <?php }?>
                           
                           <?php if($sesion['u_rango']==5){?>
                           <li class="current"><a href="dashboard.php"><i class="fa fa-desktop" id="menut1"></i> Inicio</a></li>
                          <li class="current"><a href="history.php"><i class="fa fa-book" id="menut2"></i> Historial</a></li>
                           <li class="current"><a href="awards.php"><i class="fa fa-trophy" id="menut3"></i> Mis Trofeos</a></li><?php }?>
                           
                           <?php if($sesion['u_rango']==6){?>
                           <li class="current"><a href="dashboard.php"><i class="fa fa-desktop" id="menut1"></i> Inicio</a></li>
                          <li class="current"><a href="history.php"><i class="fa fa-book" id="menut2"></i> Historial</a></li>
                           <li class="current"><a href="awards.php"><i class="fa fa-trophy" id="menut3"></i> Mis Trofeos</a></li><?php }?>
                           
                           <?php if($sesion['u_rango']==7){?>
                           	<li class="current"><a href="dashboard.php"><i class="fa fa-bars" id="menut1"></i> Estadísticas</a></li>
                            <li class="current"><a href="institucion.php?type=colegio"><i class="fa fa-briefcase" id="menut2"></i> Colegios</a></li>							<!-- href="institucion.php?type=franquicia" !-->
                            <li class="current disabled"><a ><i class="fa fa-briefcase" id="menut3"></i> Franquicias</a></li>
                            <li class="current"><a href="rows.php?filter=representantes"><i class="fa fa-user" id="menut1"></i> Representantes</a></li>					
						  	<?php }?>
                            <?php if($sesion['u_rango']==8){?>
                            <li class="current"><a href="dashboard.php"><i class="fa fa-bars" id="menut1"></i> Estadísticas</a></li>
                            <li class="current"><a href="institucion.php?type=colegio"><i class="fa fa-briefcase" id="menut2"></i> Colegios</a></li>
                            <li class="current disabled"><a><i class="fa fa-briefcase" id="menut3"></i> Franquicias</a></li>
                            <li class="current"><a href="rows.php?filter=representantes"><i class="fa fa-user" id="menut1"></i> Representantes</a></li>
                            
							<?php }?>
                           
                           
						 
                         
                         
                                                  
                     </ul> 
                               
                  </div>
                  <!-- Sidebar navigation ends -->
                  
            </div>
            <!-- Sidebar ends -->
            
            <!-- Mainbar starts -->
            <div class="mainbar" <?php if($TPAG == 'Inicio' && $my_rango == 'Alumno'){?>style="min-height:471px !important;"<?php }?>>
               
			    <!-- Page heading starts -->
<?php 
$TPAG = $_GET['type'];
error_reporting(E_ALL);
include("inc/head.php");?>
<link href="css/fuelux.css" rel="stylesheet" type="text/css">
<script src="js/require.js"></script>
<style>
#opc2{
	opacity: 0;
}
#btn1{
	display:block;
	min-height:auto;
	min-width:auto;
}
.excuse-modal{
	margin-left: 10px;
	display:none !important;
}
.excuse-modal[data-type='alert']{
	color: #F00;
}
.excuse-modal.checkedstatus{
	color: #00c368;
}
.excuse-modal.show{
	margin-left: 10px;
	display:block !important;
}
.input-hidden{
	display:none;
}
</style>
<?php if($_GET['type']=="grupoview"&&$_GET['id']){?>
		
<?php
$query = "SELECT * FROM grupos g INNER JOIN colegios_niveles cn INNER JOIN niveles_escolares ne ON g.g_nivel = cn.cn_id AND cn.cn_nivel = ne.ne_id WHERE g.g_id = '".$_GET['id']."' ORDER BY ne.ne_id,g.g_nombre";
$res = mysqli_query($D,$query);
									
									if($res)
									{
										while($filas = mysqli_fetch_array($res,MYSQLI_ASSOC))
										{
											$gr_nombre = $filas["g_nombre"];
											$gr_colegio = $filas["g_colegio"];
											$gr_nivel = $filas["ne_nombre"];
											$gr_n_id = $filas["ne_id"];
											
										}
									}
$query = "SELECT * FROM colegios WHERE col_id = '".$gr_colegio."'";
$res = mysqli_query($D,$query);
									
									if($res)
									{
										while($filas = mysqli_fetch_array($res,MYSQLI_ASSOC))
										{
											$col_nombre = $filas["col_nombre"];
											
										}
									}
									
								
?>
                <div class="blue-block" style="border-left:solid 1px #CCC;">
					<div class="page-title">
						<h3 class="pull-left"><i class="fa fa-building"></i> <?php echo $col_nombre;?> <span><?php echo $gr_nivel;?> <?php echo $gr_nombre;?></span></h3> 	
						<div class="breads pull-right">
							<a href="dashboard.php">Inicio </a>/ Colegios / Grupos
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="container">
					<div class="page-content page-profile">
						
						<div class="page-tabs">
						
							<!-- Nav tabs 
							<ul class="nav nav-tabs">
							  <li class="active"><a href="profile.html#update" data-toggle="tab">Alumnos</a></li>
							</ul>
-->
							<!-- Tab panes -->
							<div class="tab-content">
							
							  
							  
							  <!-- Update profile tab -->
							  <div class="tab-pane active" id="update">
								
                                    <div id="tabla1">
                                    <h1>Alumnos</h1><p><a class="btn btn-warning pull-right" style="margin-top:-70px; margin-bottom:40px;" href="data-print.php?f=group&id=<?php echo $_GET['id'];?>" target="_blank"><i class="fa fa-print"></i> Imprimir Informe</a><a class="btn btn-primary pull-right" style="margin-top:-70px; margin-bottom:40px; margin-right:10px;" data-toggle="modal" data-target="#addchild"><i class="fa fa-plus"></i> Nuevo Alumno</a></p>
                                    	<div class="table-responsive">
                                        	<table class="table table-striped">
                                              <thead>
                                                <tr>
                                                  <th>Nombre</th>
                                                  <th width="200px">Ultimo Libro</th>
                                                  <th width="300px">Nuevo Libro</th>
                                                  <?php if($sesion['u_rango']==3||$sesion['u_rango']==7||$sesion['u_rango']==8){?><th width="10px">Avance</th><?php }?>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              <?php 
										 
										  $query_gr = "SELECT * FROM usuarios u inner join alumnos_datos ad ON u.u_id = ad.ad_ua WHERE u.u_rango = 1 AND ad.ad_grupo = '".$_GET['id']."' AND u.u_activo !=0 ORDER BY  u_apellidos";
										  $usuarios_q = $query_gr;
										  $result_us = mysqli_num_rows(mysqli_query($D,$query_gr));
$res_gr = mysqli_query($D,$query_gr);
										  
									
									if($res_gr)
									{
										while($filas_gr = mysqli_fetch_array($res_gr,MYSQLI_ASSOC))
										{
											$gr_nombre = $filas_gr["u_nombres"];
											$gr_apellido = $filas_gr["u_apellidos"];
											$gr_nivel = $filas_gr["u_nivel"];
											$gr_id = $filas_gr["u_id"];

											$query_lib = "SELECT MAX(al_id) FROM alumnos_libros WHERE al_alumno = ".$gr_id."";
$res_lib = mysqli_query($D,$query_lib);		$res_libr = mysqli_fetch_array($res_lib,MYSQLI_ASSOC);	
 $squery = mysqli_query($D,"SELECT * FROM alumnos_libros al inner join libros l ON al.al_libro_actual = l.l_id WHERE al_id = '".$res_libr['MAX(al_id)']."'"); $nivel = mysqli_fetch_array($squery,MYSQLI_ASSOC);
											if($res_gr){
												?>
<form class="senddata" data-nivel="<?php echo $nivel['l_nivel']; ?>" data-libro="<?php echo $nivel['l_nombre'];?>" data-id="<?php echo $gr_id; ?>" data-excuse="0"  method="POST" action="query.php?func=updatelevel">
    <tr 
    <?php if($sesion['u_rango']==3||$sesion['u_rango']==7||$sesion['u_rango']==8){
			if(($nivel['al_stock']*-1)>=20){
				echo "class='success'";	
			}else if(($nivel['al_stock']*-1)<=3){
				echo "class='danger'";	
			}
		}?> >
	        <td>
	        	<a href="ins_alumnos.php?type=userview&id=<?php echo $gr_id;?>" style="color:#09F; font-weight:500;"><?php echo $gr_nombre;?><?php if($gr_apellido){ echo " ".$gr_apellido;} ?>
	        		
	        	</a>
	        </td>
            <td>
            	<?php echo $nivel['l_nivel'].".".$nivel['l_nombre'];?>

            	<input type="hidden" value="<?php echo $nivel['l_id'];?>" name="actbook"/>
            </td>

  <!-- Selector de Niveles !-->
  <td style="display:inline-flex; width:100%; vertical-align: center;">                     
  <?php 
  	// Preescolar
  	if($gr_n_id == 1){
  		?>
	  	<select style="width:49%; margin-top:5px; display:inline-block; margin-top:-5px;" name="q_nivel" data-value="<?php echo $nivel['l_nivel']; ?>" class="form-control forma1 levelselector" id="nivell<?php echo $gr_id; ?>">
	  	<?php
	  	$nquery = mysqli_query($D,"SELECT * FROM niveles ORDER BY n_id ASC"); 
	  	$nnunivel = mysqli_num_rows($nquery); 

	  	while ($resultado = mysqli_fetch_array($nquery,MYSQLI_ASSOC)){
			if($resultado){ 
				$levels[] = $resultado; 
			}
		}
		if($levels){
			foreach($levels as $level){
				?> 
				<?php 
				if($level['n_id']>='7'){

				}else if($level['n_id']<$nivel['l_nivel']){

				}else{ 
				?>
					<option <?php 
					if($nivel['l_nivel']==$level['n_id']){
						echo "selected"; 
						$nactual = $level['n_id'];
					}
					?> 
					value="<?php echo $level["n_nombre"];?>">
					<?php echo "Nivel ".$level["n_nombre"];?>
					</option>
					<?php 
				} 
			}
			$levels = null;
		}
	  ?>

	  </select>

	  <?php 
	}
	// Primaria
  	if($gr_n_id == 2){
	  ?>
	  	<select style="width:49%; margin-top:5px; display:inline-block; margin-top:-5px;" name="q_nivel" data-value="<?php echo $nivel['l_nivel']; ?>" class="form-control forma1 levelselector" id="nivell<?php echo $gr_id; ?>">
	  <?php 
	  	$nquery = mysqli_query($D,"SELECT * FROM niveles ORDER BY n_id ASC"); 
	  	$nnunivel = mysqli_num_rows($nquery); 

	  	while ($resultado = mysqli_fetch_array($nquery,MYSQLI_ASSOC)){
			if($resultado){ 
				$levels[] = $resultado; 
			}
		}
		if($levels){
			foreach($levels as $level){
			?> 
			<?php 
				if($level['n_id']=='17'){

				}else if($level['n_id']<$nivel['l_nivel']){

				}else{ ?>
					<option <?php 
					if($nivel['l_nivel']==$level['n_id']){
						echo "selected"; 
						$nactual = $level['n_id'];
					}
					?> 
					value="<?php echo $level["n_nombre"];?>">
					<?php echo "Nivel ".$level["n_nombre"];?>
					</option>
					<?php 
				} 
			} 
			$levels = null;
		}
	  ?>
	  </select>
	  <?php 
	}
	// Secundaria
  	if($gr_n_id >= 3){
	  ?>

	  	<select style="width:49%; margin-top:5px; display:inline-block; margin-top:-5px;" name="q_nivel" data-value="<?php echo $nivel['l_nivel']; ?>" class="form-control forma1 levelselector" id="nivell<?php echo $gr_id; ?>">

	  <?php
	  	$nquery = mysqli_query($D,"SELECT * FROM niveles ORDER BY n_id ASC"); 
	  	$nnunivel = mysqli_num_rows($nquery); 

	  	while ($resultado = mysqli_fetch_array($nquery,MYSQLI_ASSOC)){
			if($resultado){
				$levels[] = $resultado; 
			}
		}
		if($levels){
			foreach($levels as $level){
			?> 
			<?php  
				if($level['n_id']<$nivel['l_nivel']){

				}else{
				?>
					<option <?php 
					if($nivel['l_nivel']==$level['n_id']){
						echo "selected"; $nactual = $level['n_id'];
					}?>
					value="<?php echo $level["n_nombre"];?>">
					<?php echo "Nivel ".$level["n_nombre"];?>
					</option>
				<?php 
				} 
				$levels = null;?>
			<?php
			}
		}
	  ?>

	  </select>

	  <?php
   }
  ?>

  <!-- Selector de Libros !-->

  <select style="width:49%; margin-top:5px; display:inline-block; margin-top:-5px;" class="form-control forma1 bookselector" data-value="<?php echo $nivel['l_nombre'];?>" id="libroboxm<?php echo $gr_id; ?>" name="q_libro">

  <?php
  	$bquery = mysqli_query($D,"SELECT * FROM libros WHERE l_nivel = '1' ORDER BY l_id ASC");
	$cnunivel = mysqli_num_rows($bquery); 

  	while ($result = mysqli_fetch_array($bquery,MYSQLI_ASSOC)){
		if($result){ $libros[] = $result; }
	}
	if($libros){
		foreach($libros as $libro){
			if($libro['l_nombre']<$nivel['l_nombre']){

			}else{
			?>
				<option <?php 
				if($libro['l_nombre']==$nivel['l_nombre']){
					echo "selected"; 
				}?>
				value="<?php echo $libro["l_nombre"];?>">
				<?php echo "Libro ".$libro["l_nombre"];?>
				</option>
				<?php 
			}
		}
		$libros = null;
	}
  ?>
  </select>

  <!-- Campos Ocultos !-->
  <select style="width:49%; margin-top:5px; margin-top:-5px; display:none;" class="form-control forma1" id="librobox<?php echo $gr_id; ?>">
  <?php
   	$bquery = mysqli_query($D,"SELECT * FROM libros WHERE l_nivel = '1' ORDER BY l_id ASC"); 
	$cnunivel = mysqli_num_rows($bquery); 

  	while ($result = mysqli_fetch_array($bquery,MYSQLI_ASSOC)){
		if($result){
			$libros[] = $result;
		}
	}
	if($libros){
		foreach($libros as $libro){
		?>
		  <option <?php 
		  if($libro["l_id"]=='1'){
		  	?> selected<?php 
		  }?>
		  value="<?php echo $libro["l_nombre"];?>">
		  <?php echo "Libro ".$libro["l_nombre"];?>
		  </option>
		<?php
		}
		$libros = null;
	}
  ?> 
  </select>

  <!-- INPUTS INVISIBLES DE METADATOS !-->
  
  <input style="display:none" type="text" value="<?php echo "17".date("-m-Y");?>" name="mes"/>

                          <input style="display:none" type="text" value="<?php echo date("d-m-Y");?>" name="fecha"/>
                          <input style="display:none" type="text" value="" name="al_existencia"/>
                          <input style="display:none" type="text" value="<?php echo $_GET['id'];?>" name="grupo_id"/>
                          <input style="display:none" type="text" value="<?php echo $gr_id;?>" name="user"/>
                          
  </td>
                                                  <?php if($sesion['u_rango']==3||$sesion['u_rango']==7||$sesion['u_rango']==8){?><td><?php echo ($nivel['al_stock']*-1);?></td><?php }?>
                                                           
    </tr>
</form>
                                                <?php
									}
										}
									}
									
										  
										  
										 
										  ?>
                                                
                                                <tr>
                                                	<td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                              <a class="sendall btn btn-primary pull-right" id="enviarTodo" href="#">Guardar Todo</a>
                                              </td>
                                              	</tr>
                                              </tbody>
                                            </table>
                                        </div>
                                    
                                    </div>
                                    
									</div>
                                    </div>
							  </div>
							  
							  <!-- Activity tab -->
							  
							  
							</div>
						
						</div>
						
					</div>
				</div>
				
				<!-- Content ends -->				
			   
            </div>


</div>
<div class="modal fade" id="addchild" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Agregar Usuario</h4>
      </div>
      <div class="modal-body">
        <form id="adduseral">
        <label>Nombre Completo</label><br/>
        <input class="form-control" name="u_nombres" placeholder="Nombres" style="width:50%; border-bottom-right-radius:0px; border-right:none; border-top-right-radius:0px; text-align:right;" onblur="this.value=this.value.toUpperCase()">
        <input class="form-control" name="u_apellidos" style="width:50%; float:right; margin-top:-34px; border-bottom-left-radius:0px; border-top-left-radius:0px; border-left:none;" placeholder="Apellidos" onblur="this.value=this.value.toUpperCase()"><br/>
        <label style="">CURP</label><br/>
        <input class="form-control" placeholder="" onblur="this.value=this.value.toUpperCase()" type="text" style="" name="u_curp"><br/>
        <label style="">Lugar de Nacimiento</label><br/>
        <input class="form-control" placeholder="" onblur="this.value=this.value.toUpperCase()" type="text" style="" name="u_where"><br/>
        <label style="">Fecha de Nacimiento</label><br/>
        <input class="form-control" placeholder="Ejemplo: 12-31-2000" type="text" style="" name="u_nacd"><br/>
        <label style="width:49.9%; margin-top:5px;">Genero</label><br/>
        <input class="form-control" style=" display:none;" name="u_rango" value="1" />
        <input class="form-control" style=" display:none;" name="u_cole" value="<?php echo $_GET['id'];?>" />
        <select style="width:49.9%; margin-top:5px;" name="u_genero" class="form-control">
  <option value="M">Masculino</option>
  <option value="F">Femenino</option>                                       </select>
        <label style="width:49.9%; margin-top:-67px; float:right;">Email</label><br/>
        <input class="form-control" placeholder="E - Mail" type="text" style="width:49.9%; margin-top:-57px; float:right;" name="u_mail"><br/>
        
        <label style="width:49.9%; margin-top:5px;">Libro Inicial</label><br/>
        <select style="width:49%; margin-top:5px;" name="u_libro" class="form-control forma1">
  <?php $bquery = mysqli_query($D,"SELECT * FROM libros ORDER BY l_id ASC"); $cnunivel = mysqli_num_rows($bquery); 
  	while ($result = mysqli_fetch_array($bquery,MYSQLI_ASSOC)){
					   if($result){ $libros[] = $result; }
					}
					foreach($libros as $libro){
						  ?> <option value="<?php echo $libro["l_id"];?>"><?php echo $libro["l_nivel"].".".$libro["l_nombre"];?></option><?php
						  }
  ?>  !-->                                     </select><br/>
        
        
      </div>
      <div class="modal-footer">
        <a class="btn btn-default" data-dismiss="modal">Cerrar</a>
        <button type="submit" class="btn btn-primary">Guardar</button></form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="notifystop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><b>Notificar que no hubo ningun avance</b></h4>
      </div>
      <form id="addexcuse">
	      <div class="modal-body">
	        	<input type="hidden" id="excuseduser" name="user_id">
	        	<select name="excuse" class="form-control" id="excusevalue">
	        		<option value="1">Inasistencia</option>
	        		<option value="2">Capacidades Especiales</option>
	        		<option value="3">No trabajó DEHAN</option>
	        		<option value="5">Alumno dado de baja</option>
	        		<option value="6">Alumno duplicado</option>
	        		<option value="o">Otra</option>
	        	</select>
	        <br/>
	        <input type="text" name="excusedescription" class="form-control input-hidden" placeholder="Especifique la razón">
	      </div>
	      <div class="modal-footer" style="margin-top:0;">
	        <a class="btn btn-default" data-dismiss="modal">Cerrar</a>
	        <a class="btn btn-success" id="submitExcuse">Enviar</a>
	      </div>
      </form>
    </div>
  </div>
</div>

<?php }?>

<?php if($_GET['type']=="userview"&&$_GET['id']){?>
<?php
$query = "SELECT * FROM grupos WHERE g_id = '".$_GET['id']."'";
$res = mysqli_query($D,$query);
									
									if($res)
									{
										while($filas = mysqli_fetch_array($res,MYSQLI_ASSOC))
										{
											$gr_nombre = $filas["g_nombre"];
											$gr_colegio = $filas["g_colegio"];
											
										}
									}
$query = "SELECT * FROM colegios WHERE col_id = '".$gr_colegio."'";
$res = mysqli_query($D,$query);
									
									if($res)
									{
										while($filas = mysqli_fetch_array($res,MYSQLI_ASSOC))
										{
											$col_nombre = $filas["col_nombre"];
											
										}
									}
									
								
?>
                <div class="blue-block" style="border-left:solid 1px #CCC;">
					<div class="page-title">
						<h3 class="pull-left"><i class="fa fa-building"></i> Detalles de Alumno</span></h3> 	
						<div class="breads pull-right">
							<a href="dashboard.php">Inicio </a>/ Colegios / Grupos
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="container">
					<div class="page-content page-profile">
						
						<div class="page-tabs">
						
							<!-- Nav tabs -->

							<!-- Tab panes -->
							<div class="tab-content">
							
							  
							  
							  <!-- Update profile tab -->
							  <div class="tab-pane active" id="update">
								
                                    <div id="tabla1">
                                        	
                                              <?php 
										 
										  $query_gr = "SELECT * FROM usuarios u inner join alumnos_datos ad ON u.u_id = ad.ad_ua WHERE u.u_rango = 1 AND u.u_id = '".$_GET['id']."'";
$res_gr = mysqli_query($D,$query_gr);
										  
									
									if($res_gr)
									{
										while($filas_gr = mysqli_fetch_array($res_gr,MYSQLI_ASSOC))
										{
											$gr_nombre = $filas_gr["u_nombres"];
											$gr_apellido = $filas_gr["u_apellidos"];
											$gr_nivel = $filas_gr["u_nivel"];
											$gr_id = $filas_gr["u_id"];
											$user = $filas_gr["u_username"];
											$mail = $filas_gr["ad_mail"];
											$nacimiento = $filas_gr["ad_fecha_nacimiento"];
											$curp = $filas_gr["ad_curp"];
											$pass = $filas_gr["u_pass"];

											$query_lib = "SELECT MAX(al_id) FROM alumnos_libros WHERE al_alumno = ".$gr_id."";
$res_lib = mysqli_query($D,$query_lib);		$res_libr = mysqli_fetch_array($res_lib,MYSQLI_ASSOC);	

											if($res_gr){
												?>
                                                
                                    <h2><?php if($gr_apellido){ echo $gr_apellido;} ?> <?php echo $gr_nombre;?></h2>
                                    <div class="pull-right" style="margin-top:-45px;">
                                    	<a class="btn btn-default btn-md" href="?type=useredit&id=<?php echo $gr_id;?>"><i class="fa fa-edit"></i> Editar</a>
                                    	<a href="#sure" data-toggle="modal" class="btn btn-danger btn-md">Desactivar</a>
                                    </div>
                                    <p><b><i class="fa fa-user"></i> Usuario</b>: <?php echo $user;?> <b style="margin-left:20px;"><i class="fa fa-key"></i> Contraseña</b>: <?php echo $pass;?></p>
                                    <br/>
                                    <?php if($curp||$mail||$nacimiento){?><h4>Datos</h4>
                                    <?php if($curp){?><p><b>Clave Unica de Registro Poblacional:</b> <?php echo $curp;?></p><?php }?>
                                    <?php if($mail){?><p><b>Correo Electrónico:</b> <?php echo $mail;?></p><?php }?>
                                    <?php if($nacimiento){?><p><b>Fecha de Nacimiento:</b> <?php echo $nacimiento;?></p><?php }?>
                                    <?php }?>
                                    <h4>Información</h4>
                                    	<canvas id="canvas" width="800" height="300" style="padding:25px;"></canvas> 
                                    	<canvas id="convas" width="600" height="300" style="padding:25px;"></canvas> 
                                        
                                        <div id="niveles"></div>
                                                
                                                <?php
									}
										}
									} ?>
                                        </div>
                                    
                                    </div>
                                    
									</div>
                                    </div>
							  </div>
							  
							  <!-- Activity tab -->
							  
							  
							</div>
						
						</div>
						
					</div>
				</div>
				
				<!-- Content ends -->				
			   
            </div>


</div>
<div class="modal" id="sure" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Eliminar Alumno</h4>
      </div>
      <div class="modal-body">
        ¿Deseas desactivar a este alumno del sistema DEHAN?
        
      </div>
      <div class="modal-footer">
        <a class="btn btn-default" data-dismiss="modal">Cancelar</a>
        <a href="query.php?func=desactiva&u_id=<?php echo $_GET['id'];?>" class="btn btn-primary">Continuar</a>
      </div>
    </div>
  </div>
</div>
<?php }?>
<?php 
if($_GET['type']=="useredit"&&$_GET['id']){
?>
<?php
$query = "SELECT * FROM grupos WHERE g_id = '".$_GET['id']."'";
$res = mysqli_query($D,$query);
									
									if($res)
									{
										while($filas = mysqli_fetch_array($res,MYSQLI_ASSOC))
										{
											$gr_nombre = $filas["g_nombre"];
											$gr_colegio = $filas["g_colegio"];
											
										}
									}
$query = "SELECT * FROM colegios WHERE col_id = '".$gr_colegio."'";
$res = mysqli_query($D,$query);
									
									if($res)
									{
										while($filas = mysqli_fetch_array($res,MYSQLI_ASSOC))
										{
											$col_nombre = $filas["col_nombre"];
											
										}
									}
									
								
?>
                <div class="blue-block" style="border-left:solid 1px #CCC;">
					<div class="page-title">
						<h3 class="pull-left"><i class="fa fa-building"></i> Detalles de Alumno</span></h3> 	
						<div class="breads pull-right">
							<a href="dashboard.php">Inicio </a>/ Colegios / Grupos
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="container">
					<div class="page-content page-profile">
						
						<div class="page-tabs">
						
							<!-- Nav tabs -->

							<!-- Tab panes -->
							<div class="tab-content">
							
							  
							  
							  <!-- Update profile tab -->
							  <div class="tab-pane active" id="update">
								
                                    <div id="tabla1">
                                        	
                                              <?php 
										 
										  $query_gr = "SELECT * FROM usuarios u inner join alumnos_datos ad ON u.u_id = ad.ad_ua WHERE u.u_rango = 1 AND u.u_id = '".$_GET['id']."'";

$res_gr = mysqli_query($D,$query_gr);
										  
									
									if($res_gr)
									{
										while($filas_gr = mysqli_fetch_array($res_gr,MYSQLI_ASSOC))
										{
											$gr_nombre = $filas_gr["u_nombres"];
											$gr_apellido = $filas_gr["u_apellidos"];
											$gr_nivel = $filas_gr["u_nivel"];
											$gr_id = $filas_gr["u_id"];
											$user = $filas_gr["u_username"];
											$mail = $filas_gr["ad_mail"];
											$nacimiento = $filas_gr["ad_fecha_nacimiento"];
											$curp = $filas_gr["ad_curp"];
											$pass = $filas_gr["u_pass"];

											$query_lib = "SELECT MAX(al_id) FROM alumnos_libros WHERE al_alumno = ".$gr_id."";
$res_lib = mysqli_query($D,$query_lib);		$res_libr = mysqli_fetch_array($res_lib,MYSQLI_ASSOC);	

											if($res_gr){
												?>
                                    <form action="query.php?func=actualiza" method="post">          
                                    <h2><?php if($gr_apellido){ echo "<input type='text' style='font-size:40px !important;' name='apellidos' value='".$gr_apellido."'>";} ?> <?php echo "<input type='text' style='font-size:40px !important;' name='nombres' value='".$gr_nombre."'>";?></h2>
                                    <div class="pull-right" style="margin-top:-55px;">
                                    	<a class="btn btn-default btn-md" onclick="window.history.back();">Volver</a>
                                    	<button class="btn btn-success btn-md" type="submit"><i class="fa fa-save"></i> Guardar</button>
                                    </div>
                                    <p><b><i class="fa fa-user"></i> Usuario</b>: <input type='text' name='username' value='<?php echo $user;?>'> <b style="margin-left:20px;"><i class="fa fa-key"></i> Contraseña</b>: <input type='text' name='pass' value='<?php echo $pass;?>'></p>
                                    <br/>
                                    <p><b>Clave Unica de Registro Poblacional:</b><input type='text' name='curp' value='<?php echo $curp;?>'> </p>
                                    <p><b>Correo Electrónico:</b> <input type='text' name='mail' value='<?php echo $mail;?>'></p>
                                    <p><b>Fecha de Nacimiento:</b><input type='text' name='fecha' value='<?php echo $nacimiento;?>'> </p>
                                    <input type="text" value="<?php echo $gr_id;?>" style="display:none;" name="id">
                                    </form>
                                    <h4>Información</h4>
                                    	<canvas id="canvas" width="800" height="300" style="padding:25px;"></canvas> 
                                        
                                        <div id="niveles"></div>
                                                <?php
									}
										}
									} ?>
                                        </div>
                                    
                                    </div>
                                    
									</div>
                                    </div>
							  </div>
							  
							  <!-- Activity tab -->
							  
							  
							</div>
						
						</div>
						
					</div>
				</div>
				
				<!-- Content ends -->				
			   
            </div>


</div>
<?php }?>
<?php include("inc/footer.php");?>

 <?php 
										 
										  $query_u = $usuarios_q;
$res_u = mysqli_query($D,$query_u);
										  
									
									if($res_u)
									{
										while($filas_u = mysqli_fetch_array($res_u,MYSQLI_ASSOC))
										{
											$u_id = $filas_u["u_id"];
											$u_nivel = $filas_u["u_nivel"];

										if($u_id){
												?>
<script>
$nivel = "<?php echo $u_nivel;?>";
setInterval(function(){
	$actual = $("#nivell<?php echo $u_id; ?>").val();
	}, 1000);

$("#nivell<?php echo $u_id; ?>").change(function(){
	$("#librobox<?php echo $u_id; ?>").css( "display", "inline-block" ).attr({
  	 name: "q_libro"
	});	
	$("#libroboxm<?php echo $u_id; ?>").css( "display", "none" ).attr({
  	 name: "dis_libro"
	});		
}); 

setInterval(function(){
	if($nivel == $actual){
		
	$("#librobox<?php echo $u_id; ?>").css( "display", "none" ).attr({
  	 name: "dis_libro"
	});	
	$("#libroboxm<?php echo $u_id; ?>").css( "display", "inline-block" ).attr({
  	 name: "q_libro"
	});	
	}
	}, 1000);
								</script>
<?php
}
?>

<?php if($_GET['type']=="grupoview"&&$_GET['id']){?>




<?php }else{
?>

<?php $almes = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");?>
<script>
		var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
		var lineChartData = {
			labels : [<?php $get_nivel = mysqli_query($D,"SELECT n_id,al_fecha FROM alumnos_libros a inner join libros l inner join niveles n ON a.al_libro_actual = l.l_id AND a.al_alumno = '".$_GET['id']."' AND l.l_nivel = n.n_id");
			while($res_nivel = mysqli_fetch_array($get_nivel,MYSQLI_ASSOC)){
				if(!$res_nivel){}else{
					$niveles[] = $res_nivel;	
				}
			}?><?php 
			if($niveles){
				foreach($niveles as $nivel){
					$nivel = explode("-",$nivel['al_fecha']);
					echo '"'.$almes[$nivel[1]-1].'",';
				}
			}?>],
			datasets : [
				{
					label: "Niveles",
					fillColor : "rgba(0,0,0,0.1)",
					strokeColor : "#000",
					pointColor : "#000",
					pointStrokeColor : "#000",
					pointHighlightFill : "rgba(0,0,0,0.1)",
					pointHighlightStroke : "rgba(0,0,0,0.1)",
					data : [<?php 
			foreach($niveles as $nivel){
				echo $nivel['n_id'].',';
			}?>]
				}
			]

		}
		
		

	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	}


	</script>
    <script>

var dataa = {
    labels: [<?php 
	$g_avance =mysqli_query($D,"SELECT * FROM alumnos_libros WHERE al_alumno = '".$_GET['id']."'");
	  
	  $c_avance=mysqli_num_rows($g_avance);
       while ($r_avance = mysqli_fetch_array($g_avance,MYSQLI_ASSOC))
     {
		 if($r_avance){
		   $avances[]=$r_avance;
		 }
         
      } foreach($avances as $avance){
			  $sedato11 = $avance['al_stock'];
			  $sdato11 = str_replace("-","", $sedato11);
			  $sdato12 = $avance['al_fecha'];
			  $sfechadatos = explode('-', $sdato12);
			  $smes = $sfechadatos['1']-1;
			  $smeses[] = $smes;
			  $sdias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$smeses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
			$smonthName = $smeses[$smes];
			  if($svalor==end($scueri)){$sfinal ="";}else{$sfinal =",";}
			  if($sfechadatos['2']){
				echo "'".$smonthName."',";
			  }
		   }
	
	?>],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
            data: [<?php 
	$g_avance =mysqli_query($D,"SELECT * FROM alumnos_libros WHERE al_alumno = '".$_GET['id']."'");
	  
	  $c_avance=mysqli_num_rows($g_avance);
       while ($r_avance = mysqli_fetch_array($g_avance,MYSQLI_ASSOC))
     {
		 if($r_avance){
		   $avances[]=$r_avance;
		 }
         
      } 
		if($avances){
			foreach($avances as $avance){
			  $sedato11 = $avance['al_stock'];
			  $sdato11 = str_replace("-","", $sedato11);
			  $sdato12 = $avance['al_fecha'];
			  $sfechadatos = explode('-', $sdato12);
			  $smes = $sfechadatos['1']-1;
			  $smeses[] = $smes;
			  $sdias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$smeses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
			$smonthName = $smeses[$smes];
			  if($svalor==end($scueri)){$sfinal ="";}else{$sfinal =",";}
			  if($sfechadatos['2']){
				echo $sdato11.", ";
			  }
		   }
		}
	
	?>]
        }
    ]
};
var ctxi = document.getElementById("convas").getContext("2d");
var myBarChart = new Chart(ctxi).Bar(dataa);


	new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'niveles',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
  <?php 
	$g_avance =mysqli_query($D,"SELECT * FROM alumnos_libros WHERE al_alumno = '".$_GET['id']."'");
	  
	  $c_avance=mysqli_num_rows($g_avance);
       while ($r_avance = mysqli_fetch_array($g_avance,MYSQLI_ASSOC))
     {
		 if($r_avance){
		   $avances[]=$r_avance;
		 }
         
      } foreach($avances as $avance){
			  $sedato11 = $avance['al_stock'];
			  $sdato11 = str_replace("-","", $sedato11);
			  $sdato12 = $avance['al_fecha'];
			  $sfechadatos = explode('-', $sdato12);
			  $smes = $sfechadatos['1']-1;
			  $smeses[] = $smes;
			  $sdias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$smeses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
			$smonthName = $smeses[$smes];
			  if($svalor==end($scueri)){$sfinal ="";}else{$sfinal =",";}
			  if($sfechadatos['2']){
				echo "{ month: '".$smonthName." ".$sfechadatos[2]."', value: ".$sdato11." },";
			  }
		   }
	
	?>
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'month',
  parseTime: false,
  barColors: ['#FFF'],
  grid: false,
  xLabels: 'month',
  gridTextColor: ['#FFF'],
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
    ymin: 1,
  axes: false,
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Avance']
});
// query.php?func=desactiva&u_id=<?php echo $gr_id;?>
	</script>



<?php }  }
	}?>
<?php
/*
$(".senddata").submit(function() {

    var url = "query.php?func=updatelevel"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $(".senddata").serialize(), // serializes the form's elements.
           success: function(data)
           {
			   
			   
           }
         });

    return false; // avoid to execute the actual submit of the form.
});*/
?>
<script>
$("#adduseral").submit(function() {

    var url = "query.php?func=nusuario&type=colalu"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#adduseral").serialize(), // serializes the form's elements.
           success: function(data)
           {
			   window.location = "ins_alumnos.php?type=grupoview&id=<?php echo $_GET['id'];?>";
			   
           }
         });

    return false; // avoid to execute the actual submit of the form.
});
$("#excusevalue").change(function(){
	if($(this).val() === "o"){
		$('.input-hidden').fadeIn();
	}else{
		$('.input-hidden').fadeOut();
	}
});
var completos = 0;
$('.sendall').click(function(){
    completos = 0;
    $('.senddata').each(function(iteration,element){
    	if($(this).data('nivel')+"."+$(this).data('libro') === $('#nivell'+$(element).data('id')).val()+"."+$('#libroboxm'+$(element).data('id')).val() && $(element).attr('data-excuse') == 0){
    		if($('#librobox'+$(element).data('id')).next().data('type') != 'alert'){
	    		$('#librobox'+$(element).data('id')).next('.excuse-modal.checkedstatus').removeClass('show');
    			$('#librobox'+$(element).data('id')).after('<a class="excuse-modal show" data-type="alert" data-id="'+$(element).data('id')+'" rel="tooltip" data-original-title="No hay avance"><i class="fa fa-info-circle"></i></a>');

				$('.excuse-modal').tooltip();
				$('a[data-type="alert"].show').click(function(){
					$("#excuseduser").val($(this).data('id'));
					$("#notifystop").modal('show');
				});
    		}else{
	    		$('#librobox'+$(element).data('id')).next('.excuse-modal.checkedstatus').removeClass('show');
    			$('#librobox'+$(element).data('id')).next('.excuse-modal').addClass('show');
    		}
    		var notcomplete = true;
    	}else{
    		if($('#librobox'+$(element).data('id')).next('a').data('type') == 'alert'){
    			$('#librobox'+$(element).data('id')).next('.excuse-modal').removeClass('show');
    		}
    		if(notcomplete == true){
    		}else{
	    		if($('#librobox'+$(element).data('id')).next().data('type') != 'checkedstatus'){
    				$('#librobox'+$(element).data('id')).next('.excuse-modal').removeClass('show');
					$('#librobox'+$(element).data('id')).after('<a class="excuse-modal show checkedstatus" data-id="'+$(element).data('id')+'"><i class="fa fa-check"></i></a>');
					completos += 1;
	    		}else{
    				$('#librobox'+$(element).data('id')).next('.excuse-modal').removeClass('show');
	    			$('#librobox'+$(element).data('id')).next('.excuse-modal.checkedstatus').addClass('show');
					completos += 1;
	    		}
    		}
    	}

    	if($('a[data-type="alert"].show').length===0&&completos == <?php echo $result_us;?>){
			$('.senddata').each(function(){
				$.ajax({
				   type: "POST",
				   url: "query.php?func=updatelevel",
				   data: $(this).serialize(), // serializes the form's elements.
				   success: function(data)
				   {
				   }
				 });
			});
			$(document.excuses).each(function(){
				console.log(this);
				e = this;
		   		swal({
		   			text: 'Procesando',
			   		showConfirmButton: false,
		   		});
				$.ajax({
				   type: "GET",
				   url: "/excuse/create",
				   data: {
				   		user_id: e.user_id,
				   		excuse: e.excuse,
				   		description: e.description
				   }, 
				   error: function(data)
				   {
				   		$('.senddata[data-id="'+e.user_id+'"]').attr('data-excuse',0);

				   		swal({
				   			text: 'Ocurrió un problema',
				   			type: 'error'
				   		});
				   },
				   success: function(data)
				   {
						swal({
							title: '¡Listo!',
							text: 'Se han guardado los avances de este mes',
							type: 'success',
				  			timer: 5000
						}).then(function(){
						 	location.reload();
						});
				   }
				 });
			});
    	}else{
    		swal({
				title: '¡Alerta!',
				text: 'Hay campos que todavía no son capturados',
				type: 'warning',
	  			timer: 3200
			})
    	}
    });
});

function notifyDone(u){
   		$('.senddata[data-id="'+u+'"]').attr('data-excuse',1);
   		if($('.senddata[data-id="'+u+'"]').data('excuse') == 1){
    		if($('#librobox'+u).next().data('type') != 'checkedstatus'){
				$('#librobox'+u).next('.excuse-modal').removeClass('show');
				$('#librobox'+u).after('<a class="excuse-modal show checkedstatus" data-id="'+u+'"><i class="fa fa-check"></i></a>');
    		}else{
				$('#librobox'+u).next('.excuse-modal').removeClass('show');
    			$('#librobox'+u).next('.excuse-modal.checkedstatus').addClass('show');
    		}
	   		swal({
	   			text: '¡Hecho!',
	   			type: 'success',
	   			showConfirmButton: false,
					timer: 1200
	   		});
   		}else{
   			alert("Hey!");
   		}
}
document.excuses = [];
$('#submitExcuse').click(function(){
	document.excuses.push(
		{
		   		user_id: $('#excuseduser').val(),
		   		excuse: $('#excusevalue').val(),
		   		description: $('.input-hidden').val()
		}
	);

   	$('#notifystop').modal('hide');
	notifyDone($('#excuseduser').val());
}); 
</script>	

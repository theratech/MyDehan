<?php 
$TPAG = "envios";
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
</style>
		
<?php 
$query = "SELECT";
$res = mysql_query($query);
									
									if($res)
									{
										while($filas = mysql_fetch_assoc($res))
										{
											$col_nombre = $filas["col_nombre"];




											if($res){	
									}
										}
									}
									
								
?>
<div class="page-head" style="border-left:solid 1px #CCC;">
					<div class="container">
						<div class="row">
							<!-- Page heading -->
							<div class="col-md-3 col-sm-6 col-xs-6">
								<h2><i class="icon-building"></i> <?php echo $TPAG."s";?></h2>
							</div>
							<!-- Mini status -->
						</div>
					</div>
				</div>
                <div class="blue-block" style="border-left:solid 1px #CCC;">
					<div class="page-title">
						<h3 class="pull-left"><i class="icon-building"></i> Envíos <span>Lista de demanda de libros / alumnos</span></h3> 	
						<div class="breads pull-right">
							<a href="../dashboard.php">Inicio </a>/ Enviar
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="container">
					<div class="page-content page-profile">
						
						<div class="page-tabs">
						
							<!-- Nav tabs -->
							
								
                                    <div id="tabla1">
                                    	<div class="table-responsive">
                                        	<table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nombre del Alumno</th>
                                                <th>Enviar</th>
                                                <th>Cantidad</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                                              $query_gr = "SELECT * FROM usuarios u WHERE u.u_rango=1 ";
                                    $res_gr = mysql_query($query_gr);
                                                                              
                                                                        
                                                                        if($res_gr)
                                                                        {
                                                                            while($filas_gr = mysql_fetch_assoc($res_gr))
                                                                            {
                                                                                $gr_nombre = $filas_gr["u_nombres"];
                                                                                $gr_apellido = $filas_gr["u_apellidos"];
                                                                                $gr_nivel = $filas_gr["u_nivel"];
                                                                                $gr_id = $filas_gr["u_id"];
                                    
                                                                                $query_lib = "SELECT MAX(al_id) FROM alumnos_libros WHERE al_alumno = ".$gr_id."";
                                    $res_lib = mysql_query($query_lib);		$res_libr = mysql_fetch_assoc($res_lib);	
                                    
                                                                                if($gr_nombre){
                                                                                    ?>
                                                                                    <tr>
                                                                                      <td><a><b><?php echo $gr_nombre;?><?php if($gr_apellido){ echo " ".$gr_apellido;} ?></b></a></td>
                                                                                      
                                                                                      <td><div id="summary">
                                                                                      <?php 
																					  
																					  $cueri = mysql_query("SELECT MAX(al_id) FROM alumnos_libros WHERE al_alumno = '".$gr_id."'");
$cueriinfo = mysql_fetch_assoc($cueri);
$maxid = $cueriinfo['MAX(al_id)'];
//echo $maxid;
$query = mysql_query("SELECT * FROM alumnos_libros WHERE al_alumno = '".$gr_id."' AND al_id = '".$maxid."'");
$data = mysql_fetch_assoc($query);
//print_r($data);
if($data['al_libro_actual']<$data['al_libro_anterior']){
	$stock = $data['al_libro_existencia']-$data['al_libro_actual'];
	$hasta = $data['al_libro_actual']+20;
	$desde = $data['al_libro_actual'];
	$cuenta = "20";
	$query = mysql_fetch_assoc(mysql_query("SELECT * FROM libros WHERE l_id = '".$desde."'"));
	$query2 = mysql_fetch_assoc(mysql_query("SELECT * FROM libros WHERE l_id = '".$hasta."'"));
     echo "desde el <b>".$query["l_nivel"].".".$query["l_nombre"]."</b> hasta el <b>".$query2['l_nivel'].".".$query2['l_nombre']."</b>";

}else{
	$stock = 20-($data['al_libro_existencia']-$data['al_libro_actual']);
	$hasta = $data['al_libro_existencia'];
	$donde = $stock+$hasta;
	$cuenta = $stock;
	$hastaf = $hasta+1;
	$query = mysql_fetch_assoc(mysql_query("SELECT * FROM libros WHERE l_id = '".$hastaf."'"));
	$query2 = mysql_fetch_assoc(mysql_query("SELECT * FROM libros WHERE l_id = '".$donde."'"));
     echo "desde el <b>".$query["l_nivel"].".".$query["l_nombre"]."</b> hasta el <b>".$query2['l_nivel'].".".$query2['l_nombre']."</b>";
}


																					  ?>
                                                                                      </div></td>
                                                                                      <td><?php echo $cuenta; ?></td>
                                                                                    </tr>
                                                                                    <?php
                                                                        }
                                                                            }
                                                                        }
                                                                        
                                                                              
                                                                              
                                                                             
                                                                              ?>
                                        </tbody>
                                    </table>
                                </div>
                                        </div>
                                    
                                    </div>
                                    
									</div>
                                    </div>
							  </div>
							  
							 
							</div>
						
						</div>
						
					</div>
				</div>
				
				<!-- Content ends -->				
			   
            </div>


</div>
<div class="modal fade" id="addteacher" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Agregar Usuario</h4>
      </div>
      <div class="modal-body">
        <form id="adduser4">
        <label>Nombres</label><br/>
        <input class="form-control" name="u_nombres" onblur="this.value=this.value.toUpperCase()"><br/>
        <label>Apellidos</label><br/>
        <input class="form-control" name="u_apellidos" onblur="this.value=this.value.toUpperCase()"><br/>
        <label>Genero</label><br/>
        <input class="form-control" style=" display:none;" name="u_rango" value="2" />
        <input class="form-control" style=" display:none;" name="u_cole" value="<?php echo $_GET['id'];?>" />
        <select style="width:49%; margin-top:5px;" name="u_genero" class="form-control">
  <option value="M">Masculino</option>
  <option value="F">Femenino</option>                                       </select><br/>
        <label>Teléfonos</label><br/>
        <div class="input-group">
          <input type="text" name="u_tel1" class="form-control" placeholder="(000)-000-00-00">
        </div><br/>
        <label>Email</label><br/>
        <input class="form-control" type="text" name="u_mail"><br/>
        <label><h5>Datos de Acceso</h5></label><hr/>
        <div style="padding:3px; background:#F5F5F5;">
        <div style="padding:7px; background:#F5F5F5; border: dashed 2px #CCC;">
        <label>Usuario</label><br/>
        <input class="form-control" type="text" name="u_username"><br/>
        <label>Contraseña</label><br/>
        <input class="form-control" type="password" name="u_passw"><br/>
        </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <a class="btn btn-default" data-dismiss="modal">Cerrar</a>
        <button type="submit" class="btn btn-primary">Guardar</button></form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="addgroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Agregar Grupo</h4>
      </div>
      <div class="modal-body">
        <form id="addgroup" method="POST" action="../query.php?func=nugrupo">
        <label>Grado / Grupo *</label><br/>
        <input class="form-control" name="gru_nombre" onblur="this.value=this.value.toUpperCase()"><br/>
        <label>Sobrenombre</label><br/>
        <input class="form-control" name="gru_extra" onblur="this.value=this.value.toUpperCase()"><br/>
        <label>Tutor *</label><br/>
        <input class="form-control" style=" display:none;" name="gru_colegio" value="<?php echo $_GET['id'];?>" />
       
        <select style="width:49%; margin-top:5px;" name="gru_tutor" class="form-control">
  <?php 
  
  
  $query_maestros = "SELECT u.* FROM usuarios u INNER JOIN usuarios_instituciones ui INNER JOIN usuarios_maestros um ON u.u_id = um.um_usuario_id AND ui.ui_usuario = u.u_id WHERE ui.ui_institucion = '".$_GET['id']."'" ;
$res_mae = mysql_query($query_maestros);
									
									if($res_mae)
									{
										while($filas_mae = mysql_fetch_assoc($res_mae))
										{
											$mae_nombre = $filas_mae["u_nombres"];
											$mae_apellidos = $filas_mae["u_apellidos"];
											$mae_id = $filas_mae["u_id"];



											if($res_mae){
  
  
  
  ?><option value="<?php echo $mae_id;?>"><?php echo $mae_nombre." ".$mae_apellidos; ?></option><?php }
										}
									}
  
  
  ?>
                                </select><br/>
                                <label>Nivel Escolar *</label><br/>
                                <select style="width:49%; margin-top:5px;" name="gru_gra" class="form-control">
                                <?php 
										  $query11 = "SELECT n.*,cn.* FROM niveles_escolares n INNER JOIN colegios_niveles cn ON n.ne_id = cn.cn_nivel AND cn.cn_colegio = '".$_GET['id']."'";
$res11 = mysql_query($query11);
									
									if($res11)
									{
										while($filas11 = mysql_fetch_assoc($res11))
										{
											$nivel = $filas11["ne_nombre"];
											$nivelid = $filas11["cn_id"];



											if($res11){	?><option value="<?php echo $nivelid;?>"><?php echo $nivel; ?></option><?php
									}
										}
									}
									
										  
										  
										 
										  ?></select>
        
      </div>
      <div class="modal-footer">
        <a class="btn btn-default" data-dismiss="modal">Cerrar</a>
        <button type="submit" class="btn btn-primary">Guardar</button></form>
      </div>
    </div>
  </div>
</div>
<?php include("inc/footer.php");?>

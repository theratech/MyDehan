<?php 
$mes = array("01"=>"Enero","02"=>"Febrero","03"=>"Marzo","04"=>"Abril","05"=>"Mayo","06"=>"Junio","07"=>"Julio","08"=>"Agosto","09"=>"Septiembre","10"=>"Octubre","11"=>"Noviembre","12"=>"Diciembre");
if($sesion['u_rango']==4||$sesion['u_rango']==5){}else{$query = "SELECT c.*,ci.*,cd.*,uc.*,u.*,ui.* FROM colegios c INNER JOIN contactos ci INNER JOIN direcciones cd INNER JOIN usuarios_datos_apoderados uc INNER JOIN usuarios u INNER JOIN usuarios_instituciones ui ON ci.con_id = c.col_contacto AND cd.dir_id = c.col_direccion AND c.col_id = ui.ui_institucion AND u.u_id = ui.ui_usuario AND u.u_rango = 4 WHERE c.col_id ='".$_GET['id']."'";}
$res = mysqli_query($D,$query);
									
									if($res)
									{
										while($filas = mysqli_fetch_array($res,MYSQLI_ASSOC))
										{
											$col_nombre = $filas["col_nombre"];
											$col_tel1 = $filas["con_tel1"];
											$col_tel2 = $filas["con_tel2"];
											$col_id = $filas["col_id"];
											$col_num_ext = $filas["dir_num_ext"];
											$col_num_int = $filas["dir_num_int"];
											$col_colonia = $filas["dir_colonia"];
											$col_ciudad = $filas["dir_ciudad"];
											$col_calle = $filas["dir_calle"];
											$col_pais = $filas["dir_pais"];
											$col_estado = $filas["dir_estado"];
											$col_img = $filas["col_imagen"];
											$col_mail = $filas["con_mail"];
											$col_fechareg = $filas["u_reg"];
											$col_fechauac = $filas["u_uacceso"];
										}
									}
									
								
?>

                                                <style>
													.two{
														display:none;	
													}
												</style>
                <div class="blue-block" style="border-left:solid 1px #CCC;">
					<div class="page-title">
						<h3 class="pull-left"><i class="fa fa-building"></i> <?php echo $col_nombre;?> <span>Información de colegio...</span></h3> 	
						<div class="breads pull-right">
							<a href="dashboard.php">Inicio </a>/ Colegios
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="container">
					<div class="page-content page-profile">
						
						<div class="page-tabs">
						
							<!-- Nav tabs -->
							<ul class="nav nav-tabs">
							  <li <?php if($_GET['tab']=="1"){ ?>class="active"<?php }?>><a href="?type=info&id=<?php echo $_GET['id'];?>&tab=1">Información Básica</a></li>
							  <li <?php if($_GET['tab']=="2"){ ?>class="active"<?php }?>><a href="?type=info&id=<?php echo $_GET['id'];?>&tab=2&view=1">Institución</a></li>
							  <?php if($sesion['u_rango']!=4){?><li <?php if($_GET['tab']=="3"){ ?>class="active"<?php }?>><a href="?type=info&id=<?php echo $_GET['id'];?>&tab=3">Pagos</a></li><?php }?>
							  <?php if($sesion['u_rango']==7||$sesion['u_rango']==8||$sesion['u_rango']==4||$sesion['u_rango']==3||$sesion['u_rango']==5){?><li <?php if($_GET['tab']=="4"){ ?>class="active"<?php }?>><a href="?type=info&id=<?php echo $_GET['id'];?>&tab=4">Notificar Captura</a></li><?php }?>

							  <?php if($sesion['u_rango']==7||$sesion['u_rango']==8||$sesion['u_rango']==3){
								?>	<li><a href="/activity?c=<?php echo $_GET['id'];?>">Seguimiento</a></li><?php
							  	}?>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
							
							  <!-- Profile tab -->
							  <div class="tab-pane fade <?php if($_GET['tab']=="1"){ ?>active in<?php }?>" id="profile">
								<h4><?php echo $col_nombre;?></h4>
								
								<div class="row">
                                 <div class="col-md-3 col-sm-3 text-center">
									<!-- Profile pic -->
                                    <a href="#"><div class="img-thumbnail img-responsive" alt="" style="border-radius:50px; background-image:url('../img/Imagenes/Colegios/<?php echo $col_img;?>'); width:200px; height:200px; background-size:cover; background-position:center;" ></div></a>
                                    <form enctype="multipart/form-data" id="schform" method="POST" action="query.php?func=colfoto">
                                    	<input type="file" id="schfoto" name="perfil" style="background: #000;
width: 200px;
height: 200px;
opacity: 0.0;
margin-top: -208px;
margin-left: 73px;"/>
                                    	<input type="text" style="display:none;" name="id" value="<?php echo $_GET['id'];?>"/>
                                        <button type="submit" style="display:none;"></button>
                                    </form>
                                 </div>
                                 <div class="col-md-9 col-sm-9">
									<!-- Profile details -->
                                    <table class="table table-bordered">
                                    
                                       <tr>
                                          <td class="active"><strong>Nombre del Colegio</strong></td>
                                          <td><?php echo $col_nombre?></td>
                                       </tr>
									   <tr>
										  <td class="active"><strong>Niveles</strong></td>
										  <td>
                                          <?php 
										  $query11 = "SELECT n.*,cn.* FROM niveles_escolares n INNER JOIN colegios_niveles cn ON n.ne_id = cn.cn_nivel AND cn.cn_colegio = '".$_GET['id']."' WHERE cn.cn_uso = 1";
$res11 = mysqli_query($D,$query11);
									
									if($res11)
									{
										while($filas11 = mysqli_fetch_array($res11,MYSQLI_ASSOC))
										{
											$nivel = $filas11["ne_nombre"];
											$nivelid = $filas11["cn_id"];



											if($res11){	echo "<span class='label label-success' style='margin-right:5px;'>".$nivel."</span>";
									}
										}
									}
									
										  
										  
										 
										  ?>
										  </td>
									   </tr>
                                       <?php if($col_tel1||$col_tel2){?><tr>
                                          <td class="active"><strong>Numeros Telefónicos</strong></td>
                                          <td><?php if($col_tel1){?><b>(+<?php echo $col_tel1;?>)</b><?php }?><?php if($col_tel2){?> <b>(+<?php echo $col_tel2;?>)</b></td><?php }?>
                                       </tr>
                                       <?php }?>
                                       <tr>
                                          <td class="active"><strong>Dirección</strong></td>
                                          <td><?php echo $col_calle; ?>, <?php echo $col_num_ext;?><?php if($col_num_int){ echo "(".$col_num_int.")";}?>, <?php echo $col_colonia;?><br /> <?php echo $col_ciudad;?> <br /> <b>
										  <?php if($col_pais=="52"){echo $col_estado.", MÉXICO";}?></b></td>
                                       </tr>
                                       <tr>
                                          <td class="active"><strong>Primer Registro</strong></td>
                                          <td><?php echo $col_fechareg;?></td>
                                       </tr>
									   
                                    </table>
                                    
                                 </div>
                              </div>
								
							  </div>
							  
							  <!-- Update profile tab -->
							  <div class="tab-pane fade <?php if($_GET['tab']=="2"){ ?>active in<?php }?>" id="update">
								<h1>  </h1>
                              
								
									 <div class="container" style="margin-top:50px; height:500px;">
                                           		<div class="row" style="text-align:center;">
                                     
                                                  <div class="col-xs-6 col-md-6">
                                                   
                                                      <div class="bubble c1" id="grupos" style=" margin-left: auto;
    margin-right: auto; "><i class="fa fa-group"></i></div>
                                                   
                                                  </div><div class="col-xs-6 col-md-6">
                                                   
                                                      <div class="bubble c2" id="maestros" style=" margin-left: auto;
    margin-right: auto; "><i class="fa fa-briefcase"></i></div>
                                                   
                                                  </div>
                                    <div class="invisitabla" id="tabla1" style="margin-top:50px; <?php if($_GET['view']==2){ echo "display:none;"; }else{}?>">
                                    <h1>Grupos</h1>
                                    	<div class="table-responsive">
                                        	<table class="table table-bordered table-striped">
                                              <thead>
                                                <tr>
                                                  <th style="width:150px;"><a data-toggle="modal" data-target="#addgroup"><i class="fa fa-plus"></i> Nuevo Grupo</a></th>
                                                  <th>Grupo</th>
                                                  <th>Tutor</th>
                                                  <th>Alumnos</th>
                                                  <?php if($sesion['u_rango']==8||$sesion['u_rango']==7||$sesion['u_rango']==3){ ?><th>Ultima Captura</th><?php }?>
                                                  <th>Eliminar</th>
                                                </tr>
                                              </thead>
                                              <tbody id="grupostable">
		
        <?php 
										 
											 $query_gr = "SELECT * FROM grupos g INNER JOIN colegios_niveles cn INNER JOIN niveles_escolares ne ON g.g_nivel = cn.cn_id AND cn.cn_nivel = ne.ne_id WHERE g.g_colegio = '".$_GET['id']."' ORDER BY ne.ne_id,g.g_nombre";
											 
$res_gr = mysqli_query($D,$query_gr);
									
									if($res_gr)
									{
										while($filas_gr = mysqli_fetch_array($res_gr,MYSQLI_ASSOC))
										{
											$gr_nombre = $filas_gr["g_nombre"];
											$gr_nick = $filas_gr["g_extra"];
											$gr_nivel = $filas_gr["g_nivel"];
											$gr_id = $filas_gr["g_id"];
											$ne_nombre = $filas_gr["ne_nombre"];



											if($res_gr){
												?>
                                                <tr class="">
                                                  <td>-</td>
                                                  <input type="text" style="display:none;" class="gr-id1" value="<?php echo $gr_id;?>" />
                                                  <td><a style="color:#06F;" href="ins_alumnos.php?type=grupoview&id=<?php echo $gr_id;?>"><b><?php echo $ne_nombre." ".$gr_nombre;?><?php if($gr_nick){ echo " (".$gr_nick.")";} ?></b></a></td>
                                                  <td><?php $gr_tutor = mysqli_fetch_array($gtutor = mysqli_query($D,"SELECT * FROM usuarios inner join usuarios_maestros inner join grupos_maestros ON grupos_maestros.gm_maestro = usuarios_maestros.um_grupo  AND usuarios_maestros.um_usuario_id = usuarios.u_id WHERE grupos_maestros.gm_grupo = ".$gr_id.""),MYSQLI_ASSOC); echo $gr_repres = $gr_tutor['u_nombres']." ".$gr_tutor['u_apellidos']; ?></td>
                                                  <td><span class="btn btn-xs btn-success"><?php $a_alumnos = mysqli_fetch_array($nalumnos = mysqli_query($D,"SELECT COUNT(ad_id) FROM alumnos_datos INNER JOIN usuarios ON alumnos_datos.ad_ua = usuarios.u_id WHERE alumnos_datos.ad_grupo = '".$gr_id."' AND u_activo !=0"),MYSQLI_ASSOC); echo $gr_alumnos = $a_alumnos['COUNT(ad_id)']; ?> Alumno<?php if ($gr_alumnos != 1){?>s<?php }?></span></td>
                                                  <?php if($sesion['u_rango']==8||$sesion['u_rango']==7||$sesion['u_rango']==3){ ?>
                                                  	<td><?php if($filas_gr['g_status']==0){ if($filas_gr['g_captura']==""){ ?> <span class="btn btn-danger btn-xs">No hay registro</span> <?php }else{ echo $mes[date("m",strtotime($filas_gr['g_captura']))]." ".date("d",strtotime($filas_gr['g_captura'])).", ".date("Y",strtotime($filas_gr['g_captura'])); } }else if($filas_gr['g_status']==1&&date('m/Y',strtotime($filas_gr['g_captura']))==date('m/Y')){ ?><span class="btn btn-primary btn-xs" data-toggle="tooltip" title="<?php echo $mes[date("m",strtotime($filas_gr['g_captura']))]." ".date("d",strtotime($filas_gr['g_captura'])).", ".date("Y",strtotime($filas_gr['g_captura']));?>">Este mes</span><?php }else{ ?> <span class="btn btn-warning btn-xs"><?php echo $mes[date("m",strtotime($filas_gr['g_captura']))]." ".date("d",strtotime($filas_gr['g_captura'])).", ".date("Y",strtotime($filas_gr['g_captura']));?></span> <?php }?></td>
                                                  <?php } ?>
                                                  <td> <a href="#" class="one" data-toggle="true"><i class="fa fa-trash-o"></i></a> <a class="cancel two"><i class="fa fa-times"></i></a> <a href="query.php?func=del&type=grup&id=<?php echo $gr_id;?>" class="two"><i class="fa fa-check"></i></a></td>
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
                                    <div class="invisitabla" id="tabla2" style="margin-top:50px;<?php if($_GET['view']==1){ echo "display:none"; }else{}?>">
                                    <h1>Administrativo</h1>
                                    
                                    <div class="table-responsive">
                                        	<table class="table table-bordered table-striped">
                                              <thead>
                                                <tr>
                                                  <th style="width:150px;"><a data-toggle="modal" data-target="#addteacher"><i class="fa fa-plus"></i> Nuevo Usuario</a></th>
                                                  <th>Nombres</th>
                                                  <th>Rango</th>
                                                  <th>Activo</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?php 
										  $query_maestros2 = "SELECT * FROM usuarios u INNER JOIN usuarios_instituciones ui INNER JOIN rangos r ON r.r_id = u.u_rango AND ui.ui_usuario = u.u_id WHERE ui.ui_institucion = '".$_GET['id']."' AND u.u_activo !=0" ;
$res_mae2 = mysqli_query($D,$query_maestros2);
									
									if($res_mae2)
									{
										while($filas_mae2 = mysqli_fetch_array($res_mae2,MYSQLI_ASSOC))
										{
											$mae_nombres = $filas_mae2["u_nombres"];
											$mae_apellido = $filas_mae2["u_apellidos"];
											$mae_aidi = $filas_mae2["u_id"];
											$mae_mail = $filas_mae2["um_mail"];
											$mae_phone = $filas_mae2["um_telefono"];
											$mae_activo = $filas_mae2["u_activo"];
											$rango = $filas_mae2["r_nombre"];



											if($res_mae2){
												?>
                                                <tr>
                                                  <td>-</td>
                                                  <td><?php echo $mae_nombres." ".$mae_apellido;?></td>
                                                  <td><?php echo $rango;?></td>
                                                  <td><?php if($mae_activo=='1'){?><span class="label label-success">Activo</span><?php }else{ ?><?php if($mae_activo=='2'){?><span class="label label-success">Activo +</span><?php }else{ ?><span class="label label-danger">En Proceso</span><?php }?></span><?php }?></td>
                                                  <!--<td><a ><i class="fa fa-edit"></i></a> <a href="query.php?func=del&type=maestr&id=<?php echo $mae_aidi;?>"><i class="fa fa-trash"></i></a></td>!-->
                                                </tr> <?php
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
                              
							  
							  <!-- Activity tab -->
							  <div class="tab-pane fade <?php if($_GET['tab']=="3"){ ?>active in<?php }?>" id="activity">
								<h4>Pagos</h4>
                                <div class="container">
                                <div class="row">
								<div class="col-md-3"></div>
                                <div class="col-md-6">
								<table class="table table-bordered">
                                    
									   <tr>
                                       <?php 	
									   $pagos_query = mysqli_query($D,"SELECT * FROM pagos WHERE pa_col_id = '".$_GET['id']."' ORDER BY pa_id DESC");
									   while($pagos_res = mysqli_fetch_array($pagos_query,MYSQLI_ASSOC)){
										   if($pagos_res){
										   		$pagos[] = $pagos_res;
												$pagorec = $pagos[0];
												if($_GET['tab']==3){if($_GET['mes']){}else{?>
												<script>document.location = "?type=info&id=<?php echo $_GET['id']?>&tab=3&mes=<?php echo $pagorec['pa_id'];?>";</script>
												<?php }}
										   }
									   }
									   ?>
										  <td class="active"><?php #print_r($pagos);
										  $pago_q = mysqli_query($D,"SELECT * FROM pagos WHERE pa_id = '".$_GET['mes']."'");
												while($pago_r = mysqli_fetch_array($pago_q,MYSQLI_ASSOC)){
													if($pago_r){
														$pago = $pago_r;	
													}
												}?>
                                          <!--<div class="dropdown">
                                              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                                                <?php echo $pagorec['pa_mes'];?>
                                                <span class="caret"></span>
                                              </button>
                                              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                                
                                              </ul>
                                            </div>!-->
                                            <select class="selectpicker" name="forma" onchange="location = this.options[this.selectedIndex].value;">
                                             <?php if($pagos){
													foreach($pagos as $pagoo){
														?>
                                                        <option value="?type=info&id=<?php echo $_GET['id']?>&tab=3&mes=<?php echo $pagoo['pa_id'];?>"<?php if($_GET['mes']==$pagoo['pa_id']){echo " selected"; $estemes = $pagoo['pa_mes'];}?>><?php echo $pagoo['pa_mes'];?></option>
                                                        <?php 
													}
												}?>
                                            </select>
                                            <?php if($pago['pa_pagado']){ ?>
											<div class="alert alert-success" role="alert">
                                              <span class="fa fa-check" aria-hidden="true"></span>
                                              PAGADO
                                            </div>
											<?php }?>
                                          </td>
										  <td>
											<table class="table table-hover" width="100%">
                                            	<thead>
                                                	<td>
                                                    <b>Nivel Escolar</b>
                                                    </td>
                                                	<td>
                                                    <b>$ / Alumno</b>
                                                    </td>
                                                	<td>
                                                    <b>Nº de Alumnos</b>
                                                    </td>
                                                	<td>
                                                    <b>Total</b>
                                                    </td>
                                                </thead>
                                                <tbody>
                                                <?php 
												$desc_q = mysqli_query($D,"SELECT * FROM pagos_detalle pd INNER JOIN niveles_escolares ne ON ne.ne_id = pd.pd_col_nivel WHERE pd_col = '".$_GET['id']."' AND pd_mes = '".$estemes."'");
												while($desc_r = mysqli_fetch_array($desc_q,MYSQLI_ASSOC)){
													if($desc_r){
														$descripciones[] = $desc_r;	
													}
												}
												if($descripciones){
													foreach($descripciones as $desc){
													?>
                                                    <tr>
                                                        <td>
                                                        <?php echo $desc['ne_nombre'];?>
                                                        </td>
                                                        <td>
                                                        <?php echo "$".number_format($desc['pd_precio'], 2, '.', ',');?>
                                                        </td>
                                                        <td>
                                                        <?php echo $desc['pd_cant_alum'];?>
                                                        </td>
                                                        <td>
                                                        <?php 
														
														$totalito = $desc['pd_cant_alum']*$desc['pd_precio'];
														echo "$".number_format($totalito, 2, '.', ','); $totalito = 0;
														?>
                                                        </td>
                                                    </tr>
													<?php
													}
												}
												?>
                                                    <?php if($pago['pa_moratorio']){?><tr>
                                                    	<td colspan="3" style="text-align:right;">
                                                        <b>Cargo Moratorio:</b>
                                                        </td>
                                                        
                                                        <td><b><?php echo "$".number_format($pago['pa_moratorio'], 2, '.', ',');?></b></td>
                                                    </tr><?php }else{}if($pago['pa_descuento']){?>
                                                    <tr>
                                                    	<td colspan="3" style="text-align:right;">
                                                        <b>Descuento:</b>
                                                        </td>
                                                        <td><b><?php echo "$".number_format($pago['pa_descuento'], 2, '.', ',');?></b></td>
                                                    </tr><?php }else{}?>
                                                    <tr>
                                                    	<td colspan="3" style="text-align:right;">
                                                        <b>Total:</b>
                                                        </td>
                                                        <td><b><?php echo "$".number_format($pago['pa_total'], 2, '.', ',');?></b></td>
                                                    </tr>
                                                </tbody>
                                            </table>
										  </td>
									   </tr>
                                       <tr>
                                          <td class="active"><strong>Fechas</strong></td>
                                          <td><b>Registro:</b> <?php echo $pago['pa_fecha_registro']?><?php if($pago['pa_fecha_pago']){?> <b>Pago:</b> <?php echo $pago['pa_fecha_pago']?> <?php }?><?php if($pago['pa_fecha_factura']){?><b>Facturación:</b> <?php echo $pago['pa_fecha_factura']?><?php }?></td>
                                       </tr>
                                       <?php if($pago['pa_observacion']){?>
                                       <tr>
                                          <td class="active"><strong>Observación</strong></td>
                                          <td><?php echo $pago['pa_observacion'];?></td>
                                       </tr>
									   <?php }?>
                                    </table>
                                </div>
								<div class="col-md-3"></div>
                                </div>
                                </div>
							  </div>
                              
							  
							  <!-- Update profile tab -->
							  <div class="tab-pane fade <?php if($_GET['tab']=="4"){ ?>active in<?php }?>" id="notify">
										<h4>Notificar Captura de Niveles</h4>
                                		<div class="container" style="margin-top:50px; height:500px;">
                                             <table class="table table-hover">
                                             	<thead>
                                                	<th>Nivel Escolar</th>
                                                    <th style="text-align:right;">Notificación</th>
                                                </thead>
                                                <tbody>
                                                   <?php 
										  $query11 = "SELECT n.*,cn.* FROM niveles_escolares n INNER JOIN colegios_niveles cn ON n.ne_id = cn.cn_nivel AND cn.cn_colegio = '".$_GET['id']."' WHERE cn.cn_uso = 1";
$res11 = mysqli_query($D,$query11);
									
									if($res11)
									{
										while($cn_data = mysqli_fetch_array($res11,MYSQLI_ASSOC))
										{
											$nivel = $cn_data["ne_nombre"];
											$nivelid = $cn_data["cn_id"];



											if($res11){	?>
                                                	<tr>
                                                    	<td><?php echo $nivel;?></td>
                                                        <td style="text-align:right;"><a href="query.php?f=notify&id=<?php echo $nivelid;?>" class='btn btn-xs btn-primary <?php if($cn_data['cn_solicitud_leida']==0&&date('m')==date('m',strtotime($cn_data['cn_fecha']))){ ?>disabled<?php }?>' rel="tooltip" title="<?php 
														
															if(date('m')!=date('m',strtotime($cn_data['cn_fecha']))){
																if($cn_data['cn_fecha']==0){ ?>Nunca ha notificado <?php }else{?>Ultima Notificación: <?php echo date('m Y',strtotime($cn_data['cn_fecha'])); }
															}else{
																?>Ya notificado este mes.<?php 
															}
														
														?>" style='margin-right:5px;'><?php 
														
															if(date('m')!=date('m',strtotime($cn_data['cn_fecha']))){
																?>Enviar <i class="fa fa-arrow-right"></i><?php 
															}else{
																if($cn_data['cn_solicitud_leida']==0){
																?>En Proceso <i class="fa fa-recycle"></i><?php
																}else{
																?>Reenviar <i class="fa fa-check"></i><?php 
																}
															}
														
														?></a></td>
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
        <form id="adduser4" action="query.php?func=nusuario&type=colteacher" method="POST">
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
        <form id="addgroup" action="query.php?func=nugrupo" method="POST">
        <label>Grado / Grupo *</label><br/>
        <input class="form-control" name="gru_nombre" onblur="this.value=this.value.toUpperCase()"><br/>
        <label>Sobrenombre</label><br/>
        <input class="form-control" name="gru_extra" onblur="this.value=this.value.toUpperCase()"><br/>
        <label>Tutor *</label><br/>
        <input class="form-control" style=" display:none;" name="gru_colegio" value="<?php echo $_GET['id'];?>" />
       
        <select style="width:49%; margin-top:5px;" name="gru_tutor" class="form-control">
  <?php 
  
  
  $query_maestros = "SELECT u.* FROM usuarios u INNER JOIN usuarios_instituciones ui INNER JOIN usuarios_maestros um ON u.u_id = um.um_usuario_id AND ui.ui_usuario = u.u_id WHERE ui.ui_institucion = '".$_GET['id']."'" ;
$res_mae = mysqli_query($D,$query_maestros);
									
									if($res_mae)
									{
										while($filas_mae = mysqli_fetch_array($res_mae,MYSQLI_ASSOC))
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
										  $query11 = "SELECT n.*,cn.* FROM niveles_escolares n INNER JOIN colegios_niveles cn ON n.ne_id = cn.cn_nivel AND cn.cn_colegio = '".$_GET['id']."' WHERE cn.cn_uso = 1";
$res11 = mysqli_query($D,$query11);
									
									if($res11)
									{
										while($filas11 = mysqli_fetch_array($res11,MYSQLI_ASSOC))
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

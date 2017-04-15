<?php 
$titulo = "CMS - Ventas";
$pag = "business";
include("inc/head.php");
include("inc/plugins/onstock.php");

?><head><?php 

if (!$_SESSION["Log"]){
	Header ("Location: index.php?inicia=true");
}
$miempresa = $_SESSION['empresa'];
?>
<style>
#boton{
	display:inline-block !important;	
}
</style>
			<div id="content-header">
				<h1 style="margin-top:30px;"> 
                <a href="?f=pventa" style="font-size:16px; padding:10px; border-radius:3px; border: solid 1px; <?php if($_GET['f']=='pventa'){ echo "color:#000;"; } ?>">Punto de Venta </a><a href="?f=client" style="font-size:16px; padding:10px; border-radius:3px; border: solid 1px; margin-left:10px; margin-right:10px; <?php if($_GET['f']=='client'){ echo "color:#000;"; } ?>"> Clientes </a>
                </h1>
                <div class="btn-group" style="margin-top:-3px; float:left;">
                  
                  
                  
                  <ul class="dropdown-menu" role="menu">
				  <?php 
					$bodegasquery    = mysql_query("SELECT * FROM cms_onstock.bodegas WHERE b_empresa = '".$miempresa."'"); 
					$check_num_rows=mysql_num_rows($bodegasquery);
				    while ($result = mysql_fetch_assoc($bodegasquery)){
					   if($result){ $bodegas[] = $result; }
					}
					foreach($bodegas as $bodega){
						  ?> <li><a href="?my=bod&bod=<?php echo $bodega['b_id'];?>"><?php echo $bodega['b_nombre'];?></a></li><?php
						  }
					?>
                    
                  </ul>
                </div>
                
                
                 <button type="button" style="margin-right:10px; margin-top:20px; height:35px; background:none; border: none;" class="pull-right"><img src="/extra/img/plugins/business.png" width="100px" style="margin-top:-10px;"/></button>
                
			</div>
            		<?php if($_GET['f']=='pedido'){?>
                    <div id="breadcrumb">
                       <a> Pedido, Resumen</a>
                    </div>
                    <div class="container">
                    	<div class="row">
                        	<div class="col-md-12">
                            	<div class="panel panel-default">
                                    <div class="panel-body">
                                    	
                                          <?php 
										  $q_pedidos = mysql_query("SELECT * FROM cms_business.pedidos p inner join cms_business.clientes c ON c.c_id = p.ped_client WHERE p.ped_empresa = '".$udata['u_empresa']."' AND p.ped_id = '".$_GET['id']."'");
										  while($r_pedidos = mysql_fetch_assoc($q_pedidos)){
												if($r_pedidos){
													$pedidos[] = $r_pedidos;	
												}
										  }
										  if($pedidos){
											  foreach($pedidos as $pedido){
										  ?>
                                            
                                              <div class="pull-left" style="padding:10px; background:rgba(0,0,0,0.1);">
											  Pedido<br/>
											  <h3 style="margin-top:-8px;"><?php echo $pedido['ped_seg'];?></h3>
                                              </div>
                                              <h1 style="margin-left:98px;"> <i class="fa fa-user"></i> <?php echo $pedido['c_nombres']." ".$pedido['c_apellidos'];?></h1>		
                                              <p><?php if($pedido['c_mail']){?><br/><b> <i class="fa fa-envelope"></i> E-Mail </b> <?php echo $pedido['c_mail'];?><?php }?>
                            
                            <?php if($pedido['c_telefono']){?><b> <i class="fa fa-phone"></i> Teléfono </b> <?php echo $pedido['c_telefono'];?>
                            <?php }?>
                            <?php if($pedido['c_celular']){?><b> <i class="fa fa-cell-phone"></i> Celular </b> <?php echo $pedido['c_celular'];?>
                            <?php }?>
                            <?php if($pedido['c_domicilio']){?><b> <i class="fa fa-map-marker"></i> Direccion </b>
                            
                           	 <a target="_blank" href="https://www.google.com/maps/search/<?php echo $pedido['c_domicilio'];?> <?php echo $pedido['c_ciudad'];?>"><?php echo $pedido['c_domicilio'];?></a>
                            <?php }?>
                           	<?php if($pedido['c_ciudad']){?> <?php echo $pedido['c_ciudad'];?>
                            <?php }?>
                           	<?php if($pedido['c_pais']){?> <?php echo $pedido['c_pais']; if($pedido['c_pais']=='México'){echo "(+52)";}?>
                             <?php }?><hr/></p>
                             <table class="table table-hover">
                             	<thead>
                                	<th>Concepto de Pago</th>
                                	<th>Cantidad</th>
                                	<th>Precio</th>
                                </thead>
                                <tbody id="addingnewproduct">
                                              <?php $get_products = mysql_query("SELECT * FROM cms_business.objetos WHERE ob_pedido = '".$_GET['id']."'");
											  while($res_products = mysql_fetch_assoc($get_products)){
													if($res_products){
														$objetos[] = $res_products;	
													}
											  }
											  if($objetos){
												foreach($objetos as $objeto){
													?>
                                                    <tr>
                                                    	<td><a href="query.php?action=delproducttoc&id=<?php echo $objeto['ob_id'];?>"><i class="fa fa-trash-o"></i></a> <?php echo $objeto['ob_data'];?></td>
                                                    	<td><?php echo $objeto['ob_cantidad'];?></td>
                                                    	<td><?php $thisprecio = $objeto['ob_precio']*$objeto['ob_cantidad']; $costototal = $costototal+$thisprecio;
														$esteproducto = money_format('%i', $thisprecio); echo "$ ".$esteproducto; $thisprecio = "";?></td>
                                                    </tr>
                                                    <?php 	
												}
											  }?>
                                            
                                            <?php }
											
										  }?>
                                          <tr>
                                          	<td colspan="3"><?php $refid= $_GET['id'];?>
                                                <div class="btn-group" style="text-align:center;margin-left: auto;margin-right: auto;display: table;">
                                                  <button type="button" id="addnewproduct" type="submit" class="btn btn-default btn-lg"><i class="fa fa-dot-circle-o"></i><br>Agregar</button>
                                                  <button type="button" id="selectfromstock" class="btn btn-default btn-lg"><i class="fa fa-align-justify"></i><br>Bodegas</button>
                                                </div>
                                            </td>
                                          </tr>
                                          <tr style="height:20px;">
                                                    	<td></td>
                                                    	<td></td>
                                                    	<td>Subtotal <?php echo "$ ".money_format('%i',$costototal);?></td>
                                                    </tr><tr style="height:20px;">
                                                    	<td></td>
                                                    	<td></td>
                                                    	<td>IVA (16%) <?php $iva = ($costototal*.16);echo "$ ".money_format('%i',$iva);
														$costototal = $costototal+$iva;?></td>
                                                    </tr><tr style="background-color: #F5F5F5;">
                                                    	<td></td>
                                                    	<td></td>
                                                    	<td>Total <?php echo "$ ".money_format('%i',$costototal);?></td>
                                                    </tr>
                                               </tbody>
                                          </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
			
<?php } if($_GET['f']=='pventa'){?>
                    <div id="breadcrumb">
                        <a data-toggle="modal" data-target="#Nuevo_Pedido" class="btn btn-default" style="height:30px; background:none; border:none;"><i class="fa fa-plus"></i> Nuevo Pedido</a>
                        <form id="demo-2" style="display:inline-block; float:right;" action="" method="get">
                              <input type="text" style="display:none;" name="f" value="client">
                              <input type="search" class="btn btn-default" name="bus" placeholder=" Buscar Clientes" style="height:30px; background:none; border:none;">
                              <input type="submit" style="opacity:0; width:1px; height:1px;"/>
                              </form>
                    </div>
                    <div class="container">
                    	<div class="row">
                        	<div class="col-md-12">
                            	<div class="panel panel-default">
                                    <div class="panel-body" style="padding:0px;">
                                    	<table class="table table-hover" style="margin-bottom:0px;">
                                          <thead>
                                            <tr>
                                              <th style="width:100px;"># Pedido</th>
                                              <th>Cliente</th>
                                              <th>Resumen</th>
                                              <th style="width:100px;">Manejar</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                          <?php 
										  $q_pedidos = mysql_query("SELECT * FROM cms_business.pedidos p inner join cms_business.clientes c ON c.c_id = p.ped_client WHERE p.ped_empresa = '".$udata['u_empresa']."'");
										  while($r_pedidos = mysql_fetch_assoc($q_pedidos)){
												if($r_pedidos){
													$pedidos[] = $r_pedidos;	
												}
										  }
										  if($pedidos){
											  foreach($pedidos as $pedido){
										  ?>
                                            <tr>
                                              <td><a href="?f=pedido&id=<?php echo $pedido['ped_id'];?>"><?php echo $pedido['ped_seg'];?></a></td>
                                              <td><a href="?f=pedido&id=<?php echo $pedido['ped_id'];?>"><?php echo $pedido['c_nombres']." ".$pedido['c_apellidos'];?></a></td>
                                              <td><?php $get_products = mysql_query("SELECT * FROM cms_business.objetos WHERE ob_pedido = '".$pedido['ped_id']."' LIMIT 0,2");
											  while($res_products = mysql_fetch_assoc($get_products)){
													if($res_products){
														$objetos[] = $res_products;	
													}
											  }
											  if($objetos){
												foreach($objetos as $objeto){
													?>
                                                    <?php echo $objeto['ob_cantidad'];?> <?php echo $objeto['ob_data'];?>.<?php 	
												}
												$objetos = "";
											  }?>..</td>
                                              <td><i class="fa fa-trash-o"></i></td>
                                            </tr>
                                            <?php }
											
										  }?>
                                          </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="modal fade" id="Nuevo_Pedido" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    
	  <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myLargeModalLabel">Pedido</h4>
        </div>
        <div class="modal-body">
        <form id="newaskss" method="POST">
                	<div style="float:right; text-align:right;"> Pedido <h3 style="margin-top:-8px;"> <input style="border:none;width: 54px; box-shadow:none; background:none;" type="text" name="order" id="secnumb" placeholder="0000"/></h3></div>
                    <input style="display:none;" type="text" name="id" value="<?php $c_id = '';
		$c_i = 0;
		
		while ($c_i < 7) {
		$c_id .= rand(0, 9);
		
		$c_i++;
		}
		
		$c_id = (int) $c_id; echo $c_id; $refid = $c_id;?>"/>
        <input style="display:none;" type="text" name="date" value="<?php echo date("Y-m-d h:i:s"); ?>"/>
        <input style="display:none;" type="text" name="empresa" value="<?php echo $udata['u_empresa']; ?>"/>
                     	<select class="selectpicker" name="cliente" data-live-search="true" style="float:right;">
                            <?php $qclientes = mysql_query("SELECT * FROM cms_business.clientes WHERE c_demp ='".$udata['u_empresa']."' ORDER BY c_apellidos");
							$counts = mysql_num_rows($qclientes);
							while($rclientes = mysql_fetch_assoc($qclientes)){
								if($rclientes){ $clientes[]=$rclientes;
								}
							}
							if($clientes){
								foreach($clientes as $client){?><option value="<?php echo $client['c_id']?>"><?php echo $client['c_nombres']." ".$client['c_apellidos'];?></option><?php
								}
							}
					?>
                        </select>
                     <hr class="disapearing"/>
                    <button class="btn btn-success disapearing" style="margin-right:auto; margin-left:auto; display:table;">Guardar Pedido</button>
                     <hr/>
        </form>		
                     <table  id="addingnewproduct" class="table table-hover">
                        <thead>
                       <th>Concepto de Pago</th>
                       <th>Cantidad</th>
                       <th>Precio</th>
                       </thead>
                                 
                     </table>
                    <div class="btn-group" style="text-align:center;margin-left: auto;margin-right: auto;display: table;">
                      <button type="button" id="addnewproduct" type="submit" class="btn btn-default btn-lg"><i class="fa fa-dot-circle-o"></i><br>Agregar</button>
                      <button type="button" id="selectfromstock" class="btn btn-default btn-lg"><i class="fa fa-align-justify"></i><br>Bodegas</button>
                    </div>
                    <hr/>
                    <a class="btn btn-default" data-dismiss="modal" >Volver al menu</a>
                    <a href="?f=pedido&id=<?php echo $refid;?>" class="btn btn-success" style="float:right;">Ir al pedido</a>
        </div>
      </div> 
   </div>
 </div>
<?php 
	 }
					if($_GET['f']=='client'){?>
            
        <div id="breadcrumb">
        	<a href="?f=client&c=n" class="btn btn-default" style="height:30px; background:none; border:none;"><i class="fa fa-plus"></i> Nuevo Cliente</a>
            <form id="demo-2" style="display:inline-block; float:right;" action="" method="get">
            	  <input type="text" style="display:none;" name="f" value="client">
                  <input type="search" class="btn btn-default" name="bus" placeholder=" Buscar Clientes" style="height:30px; background:none; border:none;">
                  <input type="submit" style="opacity:0; width:1px; height:1px;"/>
                  </form>
        </div>
         <div class="container">
				<div class="row">
					<div class="col-md-6">
                    	<div class="panel" style="overflow-y:scroll; max-height:500px;">
                        	<table class="table">
                            <thead>
                            <th> Nombre </th>
                            <th> Fecha de Ingreso </th>
                            <th> Proxima cita </th>
                            </thead>
                            <?php 
							if($_GET['bus']){
								$qclientes = mysql_query("SELECT * FROM cms_business.clientes WHERE c_demp ='".$udata['u_empresa']."' AND (c_nombres LIKE '".$_GET['bus']."%' OR c_apellidos LIKE '".$_GET['bus']."%') ORDER BY c_apellidos");
							$counts = mysql_num_rows($qclientes);
							while($rclientes = mysql_fetch_assoc($qclientes)){
								if($rclientes){ $clientes[]=$rclientes;
								}
							}
							if($clientes){
							foreach($clientes as $client){
							?>
                            <tr style="text-align:center;">
                            	<td><a href="?f=client&bus=<?php echo $_GET['bus'];?>&c=<?php echo $client['c_id'];?>"><?php 
								$nombre = explode(" ",$client['c_apellidos']);
								echo $nombre[0];
								$nombre = explode(" ",$client['c_nombres']);
								echo " ".$nombre[0];
								 ?>
                                </a> </td>
                            	<td>
								<?php 
								$fecha = explode("-",$client['c_fecha']);
								echo $fecha[2]."/".$fecha[1]."/".$fecha[0]; ?> </td>
                            	<td><?php
							 $query_citas = mysql_query("SELECT * FROM cms_business.citas WHERE c_cliente = '".$client['c_id']."'");
							 while($re_citas = mysql_fetch_assoc($query_citas)){
									if($re_citas){
										$citas[] = $re_citas;	
									}
							 }
							 if($citas){
							 foreach($citas as $cita){
								$fechahorap = explode(" ",$cita["c_fechahora"]);
								$fecha = $fechahorap[0];
								$hora = $fechahorap[1];
								$fecha = explode("-",$fecha);
								$hora = explode(":",$hora);
								 if($fecha[1]==date('m')){  if($fecha[2]==date('d')){ echo "Hoy a las ";}if(date('d')==$fecha[2]-1){ echo "Mañana a las ";} if($fecha[2]!=date('d') && $fecha[2]!= date('d')+1 ){echo "El dia ".$fecha[2]." a las "; }}else{ echo "El ".$fecha[2]." de ".$meses[$fecha[1]-1]; }
								if($hora[0] > 12){
									echo ($hora[0]-'12').":".$hora[1]." PM";
									
								}else{
								echo $hora[0].":".$hora[1]." AM"; 
								?>
								<?php
								}
								?>
                                
								
                                <?php 
							 $citas="";
							 }
							}else{
								 
								if($citas){}else{
							 ?>&times; No hay cita<?php }
							 }	
							 ?></td>
                            </tr>
                            <?php	
							}
							}}
							else{
							$qclientes = mysql_query("SELECT * FROM cms_business.clientes WHERE c_demp ='".$udata['u_empresa']."' ORDER BY c_apellidos");
							$counts = mysql_num_rows($qclientes);
							while($rclientes = mysql_fetch_assoc($qclientes)){
								if($rclientes){ $clientes[]=$rclientes;
								}
							}
							if($clientes){
								foreach($clientes as $client){
							?>
                            <tr style="text-align:center;">
                            	<td><a href="?f=client&c=<?php echo $client['c_id'];?>"><?php 
								$nombre = explode(" ",$client['c_apellidos']);
								echo $nombre[0];
								$nombre = explode(" ",$client['c_nombres']);
								echo " ".$nombre[0];
								 ?>
                                </a> </td>
                            	<td>
								<?php 
								$fecha = explode("-",$client['c_fecha']);
								echo $fecha[2]."/".$fecha[1]."/".$fecha[0]; ?> </td>
                            	<td><?php
							 $query_citas = mysql_query("SELECT * FROM cms_business.citas WHERE c_cliente = '".$client['c_id']."'");
							 while($re_citas = mysql_fetch_assoc($query_citas)){
									if($re_citas){
										$citas[] = $re_citas;	
									}
							 }
							 if($citas){
							 foreach($citas as $cita){
								$fechahorap = explode(" ",$cita["c_fechahora"]);
								$fecha = $fechahorap[0];
								$hora = $fechahorap[1];
								$fecha = explode("-",$fecha);
								$hora = explode(":",$hora);
								 if($fecha[1]==date('m')){  if($fecha[2]==date('d')){ echo "Hoy a las ";}if(date('d')==$fecha[2]-1){ echo "Mañana a las ";} if($fecha[2]!=date('d') && $fecha[2]!= date('d')+1 ){echo "El dia ".$fecha[2]." a las "; }}else{ echo "El ".$fecha[2]." de ".$meses[$fecha[1]-1]; }
								if($hora[0] > 12){
									echo ($hora[0]-'12').":".$hora[1]." PM";
									
								}else{
								echo $hora[0].":".$hora[1]." AM"; 
								?>
								<?php
								}
								?>
                                
								
                                <?php 
							 $citas="";
							 }
							}else{
								 
								if($citas){}else{
							 ?>&times; No hay cita<?php }
							 }	
							}
							 
							 ?></td>
                            </tr>
                            <?php	
							
							}
							
							}
							?>
                            </table>
                        </div>
                    </div>
					<div class="col-md-6">
                    	<div class="panel" style="padding:20px;">
                        <div class="media">
                          <div class="media-body">
                          <?php if(!$_GET['c']){ echo "Selecciona un cliente de la lista"; }else{
							 $qcliente = mysql_query("SELECT * FROM cms_business.clientes WHERE c_id = '".$_GET['c']."'");
							$count = mysql_num_rows($qcliente);
							while($rcliente = mysql_fetch_assoc($qcliente)){
								if($rcliente){ $cliente[]=$rcliente;
								}
							}
							foreach($cliente as $cl){ ?>
                            <h1 class="media-heading"><?php 
							$nom = explode(" ",$cl['c_nombres']);
								echo $nom[0];
								$nom = explode(" ",$cl['c_apellidos']);
								echo " ".$nom[0];?></h1>
                                <small class="text-muted"><?php echo $cl['c_nombres']." ".$cl['c_apellidos'];?></small><br />
                            <b>E-Mail </b> <?php echo $cl['c_mail'];?>
                            <br />
                            <b>Teléfono </b> <?php echo $cl['c_telefono'];?>
                            <br />
                            <b>Celular </b> <?php echo $cl['c_celular'];?>
                            <br />
                            <b>Direccion </b>
                            <br />
                           	 <a target="_blank" href="https://www.google.com/maps/search/<?php echo $cl['c_domicilio'];?> <?php echo $cl['c_ciudad'];?>"><?php echo $cl['c_domicilio'];?></a>
                            <br />
                           	 <?php echo $cl['c_ciudad'];?>
                            <br />
                           	 <?php echo $cl['c_pais']; if($cl['c_pais']=='México'){echo "(+52)";}?>
                             <br/>
                             <a href="?f=edclient&c=<?php echo $cl['c_id'];?>" class="btn btn-default"><i class="fa fa-edit"></i>Editar</a>
                             <hr/>
                             <b>Citas</b>
                             <br/>
                             <?php
							 $query_citas = mysql_query("SELECT * FROM cms_business.citas WHERE c_cliente = '".$_GET['c']."'");
							 while($re_citas = mysql_fetch_assoc($query_citas)){
									if($re_citas){
										$citas[] = $re_citas;	
									}
							 }
							 foreach($citas as $cita){
								$fechahorap = explode(" ",$cita["c_fechahora"]);
								$fecha = $fechahorap[0];
								$hora = $fechahorap[1];
								$fecha = explode("-",$fecha);
								$hora = explode(":",$hora);
								 if($fecha[1]==date('m')){  if($fecha[2]==date('d')){ echo "Hoy a las ";}if(date('d')==$fecha[2]-1){ echo "Mañana a las ";} if($fecha[2]!=date('d') && $fecha[2]!= date('d')+1 ){echo "El dia ".$fecha[2]." a las "; }}else{ echo "El ".$fecha[2]." de ".$meses[$fecha[1]-1]; }
								if($hora[0] > 12){
									echo ($hora[0]-'12').":".$hora[1]." PM";
									
								}else{
								echo $hora[0].":".$hora[1]." AM"; 
								?>
								<?php
								}
								?>
                                
								<a data-toggle="modal" data-target="#reasignar"><i class="fa fa-calendar"></i> Reasignar</a>
                                <?php 
							 }	
							 
							 if($citas){}else{
							 ?>
                            
                             <a data-toggle="modal" data-target="#agendar" class="btn btn-success">Agendar Cita</a>
                             <?php }?>
                             <hr/>
                             <b>Pedidos</b>
                             <ul>
                             	<?php $q_pedidos = mysql_query("SELECT * FROM cms_business.pedidos p inner join cms_business.clientes c ON c.c_id = p.ped_client WHERE p.ped_empresa = '".$udata['u_empresa']."' AND p.ped_client = '".$cl['c_id']."'");
										  while($r_pedidos = mysql_fetch_assoc($q_pedidos)){
												if($r_pedidos){
													$pedidos[] = $r_pedidos;	
												}
										  }
										  if($pedidos){
											  foreach($pedidos as $pedido){
?>
                            	<li><a href="?f=pedido&id=<?php echo $pedido['ped_id'];?>">Pedido <?php echo $pedido['ped_seg'];?></a></li>
                                <?php }}else{ echo "No hay pedidos.";}?>
                             </ul>
                            <?php }}
							if($_GET['c']=='n'){?>
								<form method="POST" action="query.php?action=nclient">
								<h1 class="media-heading">Nuevo Cliente</h1>
                                <input type="text" class="f-invisible" name="nombres" placeholder="Nombres" /><input type="text" name="apellidos" class="f-invisible" placeholder="Apellidos"/><br />
                            <b>E-Mail </b> <input type="text" class="f-invisible" name="mail" placeholder="Correo" />
                            <br />
                            <b>Teléfono </b><br /> <input type="text" class="f-invisible" name="tel" placeholder="Teléfono" />
                            <br />
                            <input type="text" class="f-invisible" name="cel" placeholder="Celular" />
                            <br />
                            <b>Direccion </b>
                            <br />
                            <input type="text" style="display:none;" value="<?php echo date("Y-m-d");?>" name="fecha" /><input type="text" style="display:none;" value="<?php echo $udata['u_empresa'];?>" name="empr" />
                           	 <input type="text" class="f-invisible" name="domi" placeholder="Calle Número, Colonia" />
                            <br />
                           	 <input type="text" class="f-invisible" name="ciudad" placeholder="Ciudad, EDO" />
                            <br />
                           	 <input type="text" class="f-invisible" name="pais" placeholder="País" />
                            <br />
                           	 <input type="date" class="f-invisible" name="infecha" placeholder="Cliente desde..." />
                            <button type="submit" class="btn btn-success pull-right">
                            <i class="fa fa-save"></i> Guardar
                            </button>
                            </form>
                            <?php }?>
                          </div>
                        </div>
                        </div>
                    	
                    </div>
				</div>
                
            </div>
<div class="modal fade" id="reasignar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myLargeModalLabel">Agenda</h4>
        </div>
        <div class="modal-body">
        <form action="query.php?func=ecita" method="POST">
                	<h3> <?php echo $cl['c_nombres']." ".$cl['c_apellidos'];?></h3> cambiará su cita<hr/>
                    <label>Fecha de la cita</label>
                    <input class="form-control" type="date" name="date" value="<?php echo $fechahorap[0];?>"/> <br/>
                    <textarea name="descripcion" style="resize:none;" class="form-control" placeholder="Recordatorio (opcional)"></textarea>
                    <hr/>
                    <label>Hora de la cita </label>
                    <input type="text" name="id" value="<?php echo $cita['c_id'];?>" style="display:none;"/>
                    <input type="text" name="por" value="<?php echo $udata['u_empresa'];?>" style="display:none;"/>
                    <input type="text" name="para" value="<?php echo $cl['c_id'];?>" style="display:none;"/>
                    <input class="form-control" type="time" name="time" value="<?php echo $fechahorap[1];?>"/>
                    <hr/>
                    <a class="btn btn-default" data-dismiss="modal">Salir</a>
                    <button type="submit" class="btn btn-success" style="float:right;">Guardar</button>
        </form>
        </div>
      </div>
  </div>
</div><div class="modal fade" id="agendar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myLargeModalLabel">Agenda</h4>
        </div>
        <div class="modal-body">
        <form action="query.php?func=ncita" method="POST">
                	<h3> <?php echo $cl['c_nombres']." ".$cl['c_apellidos'];?></h3> tendrá una cita<hr/>
                    <label>Fecha de la cita</label>
                    <input class="form-control" type="date" name="date"/> <br/>
                    <textarea name="descripcion" style="resize:none;" class="form-control" placeholder="Recordatorio (opcional)"></textarea>
                    <hr/>
                    <label>Hora de la cita </label>
                    <input type="text" name="por" value="<?php echo $udata['u_empresa'];?>" style="display:none;"/>
                    <input type="text" name="para" value="<?php echo $cl['c_id'];?>" style="display:none;"/>
                    <input class="form-control" type="time" name="time"/>
                    <hr/>
                    <a class="btn btn-default" data-dismiss="modal">Salir</a>
                    <button type="submit" class="btn btn-success" style="float:right;">Guardar</button>
        </form>
        </div> </div>
   </div>
 </div>
<?php }
if($_GET['f']=='edclient'){?>
            
        <div id="breadcrumb">
        	<a href="?f=client&c=n" class="btn btn-default" style="height:30px; background:none; border:none;"><i class="fa fa-plus"></i> Nuevo Cliente</a>
            <form id="demo-2" style="display:inline-block; float:right;" action="" method="get">
            	  <input type="text" style="display:none;" name="f" value="client">
                  <input type="search" class="btn btn-default" name="bus" placeholder=" Buscar Clientes" style="height:30px; background:none; border:none;">
                  <input type="submit" style="opacity:0; width:1px; height:1px;"/>
                  </form>
        </div>
         <div class="container">
				<div class="row">
					<div class="col-md-6">
                    	<div class="panel" style="overflow-y:scroll; max-height:500px;">
                        	<table class="table">
                            <thead>
                            <th> Nombre </th>
                            <th> Fecha de Ingreso </th>
                            <th> Proxima cita </th>
                            </thead>
                            <?php 
							if($_GET['bus']){
								$qclientes = mysql_query("SELECT * FROM cms_business.clientes WHERE c_demp ='".$udata['u_empresa']."' AND (c_nombres LIKE '".$_GET['bus']."%' OR c_apellidos LIKE '".$_GET['bus']."%') ORDER BY c_apellidos");
							$counts = mysql_num_rows($qclientes);
							while($rclientes = mysql_fetch_assoc($qclientes)){
								if($rclientes){ $clientes[]=$rclientes;
								}
							}
							if($clientes){
							foreach($clientes as $client){
							?>
                            <tr style="text-align:center;">
                            	<td><a href="?f=client&bus=<?php echo $_GET['bus'];?>&c=<?php echo $client['c_id'];?>"><?php 
								$nombre = explode(" ",$client['c_apellidos']);
								echo $nombre[0];
								$nombre = explode(" ",$client['c_nombres']);
								echo " ".$nombre[0];
								 ?>
                                </a> </td>
                            	<td>
								<?php 
								$fecha = explode("-",$client['c_fecha']);
								echo $fecha[2]."/".$fecha[1]."/".$fecha[0]; ?> </td>
                            	<td><?php
							 $query_citas = mysql_query("SELECT * FROM cms_business.citas WHERE c_cliente = '".$client['c_id']."'");
							 while($re_citas = mysql_fetch_assoc($query_citas)){
									if($re_citas){
										$citas[] = $re_citas;	
									}
							 }
							 if($citas){
							 foreach($citas as $cita){
								$fechahorap = explode(" ",$cita["c_fechahora"]);
								$fecha = $fechahorap[0];
								$hora = $fechahorap[1];
								$fecha = explode("-",$fecha);
								$hora = explode(":",$hora);
								 if($fecha[1]==date('m')){  if($fecha[2]==date('d')){ echo "Hoy a las ";}if(date('d')==$fecha[2]-1){ echo "Mañana a las ";} if($fecha[2]!=date('d') && $fecha[2]!= date('d')+1 ){echo "El dia ".$fecha[2]." a las "; }}else{ echo "El ".$fecha[2]." de ".$meses[$fecha[1]-1]; }
								if($hora[0] > 12){
									echo ($hora[0]-'12').":".$hora[1]." PM";
									
								}else{
								echo $hora[0].":".$hora[1]." AM"; 
								?>
								<?php
								}
								?>
                                
								
                                <?php 
							 $citas="";
							 }
							}else{
								 
								if($citas){}else{
							 ?>&times; No hay cita<?php }
							 }	
							 ?></td>
                            </tr>
                            <?php	
							}
							}}
							else{
							$qclientes = mysql_query("SELECT * FROM cms_business.clientes WHERE c_demp ='".$udata['u_empresa']."' ORDER BY c_apellidos");
							$counts = mysql_num_rows($qclientes);
							while($rclientes = mysql_fetch_assoc($qclientes)){
								if($rclientes){ $clientes[]=$rclientes;
								}
							}
							if($clientes){
								foreach($clientes as $client){
							?>
                            <tr style="text-align:center;">
                            	<td><a href="?f=client&c=<?php echo $client['c_id'];?>"><?php 
								$nombre = explode(" ",$client['c_apellidos']);
								echo $nombre[0];
								$nombre = explode(" ",$client['c_nombres']);
								echo " ".$nombre[0];
								 ?>
                                </a> </td>
                            	<td>
								<?php 
								$fecha = explode("-",$client['c_fecha']);
								echo $fecha[2]."/".$fecha[1]."/".$fecha[0]; ?> </td>
                            	<td><?php
							 $query_citas = mysql_query("SELECT * FROM cms_business.citas WHERE c_cliente = '".$client['c_id']."'");
							 while($re_citas = mysql_fetch_assoc($query_citas)){
									if($re_citas){
										$citas[] = $re_citas;	
									}
							 }
							 if($citas){
							 foreach($citas as $cita){
								$fechahorap = explode(" ",$cita["c_fechahora"]);
								$fecha = $fechahorap[0];
								$hora = $fechahorap[1];
								$fecha = explode("-",$fecha);
								$hora = explode(":",$hora);
								 if($fecha[1]==date('m')){  if($fecha[2]==date('d')){ echo "Hoy a las ";}if(date('d')==$fecha[2]-1){ echo "Mañana a las ";} if($fecha[2]!=date('d') && $fecha[2]!= date('d')+1 ){echo "El dia ".$fecha[2]." a las "; }}else{ echo "El ".$fecha[2]." de ".$meses[$fecha[1]-1]; }
								if($hora[0] > 12){
									echo ($hora[0]-'12').":".$hora[1]." PM";
									
								}else{
								echo $hora[0].":".$hora[1]." AM"; 
								?>
								<?php
								}
								?>
                                
								
                                <?php 
							 $citas="";
							 }
							}else{
								 
								if($citas){}else{
							 ?>&times; No hay cita<?php }
							 }	
							}
							 
							 ?></td>
                            </tr>
                            <?php	
							
							}
							
							}
							?>
                            </table>
                        </div>
                    </div>
					<div class="col-md-6">
                    	<div class="panel" style="padding:20px;">
                        <div class="media">
                          <div class="media-body">
                          <?php if(!$_GET['c']){ echo "Selecciona un cliente de la lista"; }else{
							 $qcliente = mysql_query("SELECT * FROM cms_business.clientes WHERE c_id = '".$_GET['c']."'");
							$count = mysql_num_rows($qcliente);
							while($rcliente = mysql_fetch_assoc($qcliente)){
								if($rcliente){ $cliente[]=$rcliente;
								}
							}
							foreach($cliente as $cl){ ?>
                            <form id="editclient" action="query.php?action=editclient&id=<?php echo $cl['c_id'];?>" method="post">
                            <h1 class="media-heading"><?php 
							$nom = explode(" ",$cl['c_nombres']);
								echo "<input type='text' style='border:none' value='".$nom[0]." ".$nom[1]."' name='nombres'/>";
								$nom = explode(" ",$cl['c_apellidos']);
								echo "<input type='text' style='border:none' value='".$nom[0]." ".$nom[1]."' name='apellidos'/>";?>
                                </h1>
                                <br />
                            <b>E-Mail </b> <input type="text" style="border:none" value="<?php echo $cl['c_mail'];?>" name="mail"/>
                            <br />
                            <b>Teléfono </b> <input type="text" style="border:none" value="<?php echo $cl['c_telefono'];?>" name="phone"/>
                            <br />
                            <b>Celular </b> <input type="text" style="border:none" value="<?php echo $cl['c_celular'];?>" name="mphone"/>
                            <br />
                            <b>Direccion </b>
                            <br />
                           	 <input type="text" style="border:none" value="<?php echo $cl['c_domicilio'];?>" name="domicilio"/>
                            <br />
                           	 <input type="text" style="border:none" value="<?php echo $cl['c_ciudad'];?>" name="ciudad"/>
                            <br />
                           	 <input type="text" style="border:none" value="<?php echo $cl['c_pais']; if($cl['c_pais']=='México'){echo "(+52)";}?>" name="pais"/>
                             <hr/>
                             <a class="btn btn-default" onClick="window.history.back();">Cancelar</a>
                             <button type="submit" class="btn btn-success">Guardar</button>
                             </form>
                            <?php }}
							?>
                          </div>
                        </div>
                        </div>
                    	
                    </div>
				</div>
                
            </div>

<?php }

if($_GET['f']=='cita'){?>
	<div class="col-md-3">
    </div>
	<div class="col-md-6">
                    	<div class="panel" style="padding:20px;">
                        <div class="media">
                          <div class="media-body">
                          <?php if(!$_GET['c']){ echo "Selecciona un cliente de la lista"; }else{
							 $qcliente = mysql_query("SELECT * FROM cms_business.clientes WHERE c_id = '".$_GET['c']."'");
							$count = mysql_num_rows($qcliente);
							while($rcliente = mysql_fetch_assoc($qcliente)){
								if($rcliente){ $cliente[]=$rcliente;
								}
							}
							foreach($cliente as $cl){ ?>
                            <h1 class="media-heading"><?php 
							$nom = explode(" ",$cl['c_nombres']);
								echo $nom[0];
								$nom = explode(" ",$cl['c_apellidos']);
								echo " ".$nom[0];?></h1>
                                <h3><?php
							 $query_citas = mysql_query("SELECT * FROM cms_business.citas WHERE c_cliente = '".$_GET['c']."'");
							 while($re_citas = mysql_fetch_assoc($query_citas)){
									if($re_citas){
										$citas[] = $re_citas;	
									}
							 }
							 foreach($citas as $cita){
								$fechahorap = explode(" ",$cita["c_fechahora"]);
								$fecha = $fechahorap[0];
								$hora = $fechahorap[1];
								$fecha = explode("-",$fecha);
								$hora = explode(":",$hora);
								 if($fecha[1]==date('m')){  if($fecha[2]==date('d')){ echo "Hoy a las ";}if(date('d')==$fecha[2]-1){ echo "Mañana a las ";} if($fecha[2]!=date('d') && $fecha[2]!= date('d')+1 ){echo "El dia ".$fecha[2]." a las "; }}else{ echo "El ".$fecha[2]." de ".$meses[$fecha[1]-1]; }
								if($hora[0] > 12){
									echo ($hora[0]-'12').":".$hora[1]." PM";
									
								}else{
								echo $hora[0].":".$hora[1]." AM"; 
								?>
								<?php
								}
								?>
                                
								<a data-toggle="modal" data-target="#reasignar"><i class="fa fa-calendar"></i> Reasignar</a>
                                <?php 
							 }	
							 
							
							 ?></h3>
                             <hr/>
                                <small class="text-muted"><?php echo $cl['c_nombres']." ".$cl['c_apellidos'];?></small><br />
                            <b>E-Mail </b> <?php echo $cl['c_mail'];?>
                            <br />
                            <b>Teléfono </b> <?php echo $cl['c_telefono'];?>
                            <br />
                            <b>Direccion </b>
                            <br />
                             <iframe
                              width="100%"
                              height="500"
                              frameborder="0" style="border:0"
                              src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAi-6Y6WzNu9_oSdAE70_L51Ly9uixqmmo&q=<?php echo str_replace(" ","+",$cl['c_domicilio']);?>+<?php echo str_replace(" ","+",$cl['c_ciudad']);?>">
                            </iframe>
                            <?php echo $cl['c_domicilio'];?>
                            <br />
                           	 <?php echo $cl['c_ciudad'];?>
                            <br />
                           	 <?php echo $cl['c_pais']; if($cl['c_pais']=='México'){echo "(+52)";}?>
                             <hr/>
                            <?php }}
							?>
                          </div>
                        </div>
                        </div>
                    	
                    </div>
	<div class="col-md-3">
    </div>
    <div class="modal fade" id="reasignar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myLargeModalLabel">Agenda</h4>
        </div>
        <div class="modal-body">
        <form action="query.php?func=ecita" method="POST">
                	<h3> <?php echo $cl['c_nombres']." ".$cl['c_apellidos'];?></h3> cambiará su cita<hr/>
                    <label>Fecha de la cita</label>
                    <input class="form-control" type="date" name="date" value="<?php echo $fechahorap[0];?>"/> <br/>
                    <textarea name="descripcion" style="resize:none;" class="form-control" placeholder="Recordatorio (opcional)"></textarea>
                    <hr/>
                    <label>Hora de la cita </label>
                    <input type="text" name="id" value="<?php echo $cita['c_id'];?>" style="display:none;"/>
                    <input type="text" name="por" value="<?php echo $udata['u_empresa'];?>" style="display:none;"/>
                    <input type="text" name="para" value="<?php echo $cl['c_id'];?>" style="display:none;"/>
                    <input class="form-control" type="time" name="time" value="<?php echo $fechahorap[1];?>"/>
                    <hr/>
                    <a class="btn btn-default" data-dismiss="modal">Salir</a>
                    <button type="submit" class="btn btn-success" style="float:right;">Guardar</button>
        </form>
        </div>
      </div>
  </div>
</div>
<?php 
}?>
<?php 
include("inc/footer.php");
?>
<script type="text/javascript">
                $(function () { $("#dates").datetimepicker({
				'date-format': 'YYYY-MM-DD HH:mm:ss',
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            });     });
        </script>
<script>
$("#newaskss").submit(function() {

    var url = "query.php?action=newask"; 

    $.ajax({
           type: "POST",
           url: url,
           data: $("#newaskss").serialize(), 
           success: function(data)
           {
			   $(".disapearing").fadeOut(250);
			   $(".selectpicker").addClass("disabled");
			   $("#secnumb").attr("disabled","disabled");
           }
         });

    return false; 
});
$("#addnewproduct").click(function(){
	
	$("#formcr").remove();
	$("#addingnewproduct").prepend("<tr id='creador'><td colspan='3'><div class='btn-group' id='formcr' style='text-align:center;margin-left: auto;margin-right: auto;display: table;'><form id='nproduct'><input type='text' class='btn btn-default' placeholder='Concepto de pago' name='obdata'/><input type='text' class='btn btn-default' placeholder='Cantidad' style='width:20%;' name='quant'/><input type='text' class='btn btn-default' placeholder='Precio/Unitario' style='width:20%;' name='precio'/><input type='text' style='display:none;' value='<?php echo $refid;?>' name='refid'/><button type='submit' class='btn btn-primary'>Agregar</button></form><br></div></td></tr>");
	$("#nproduct").submit(function() {

    var url = "query.php?action=addproducttoc"; 

    $.ajax({
           type: "POST",
           url: url,
           data: $("#nproduct").serialize(), 
           success: function(data)
           {	
		   		$("#addingnewproduct").prepend(data);
				$("#creador").fadeOut(500);
           }
         });

    return false; 
});
	});
$("#selectfromstock").click(function(){
	$("#formcr").remove();
	
});
$('#ppv').popover();

</script>
<?php if($_GET['error']){
	?>
    <script>
	setTimeout(function(){
	alert("<?php echo $_GET['error'];?>");
	}, 500);
	</script>
    <?php }?>
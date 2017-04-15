<?php 
$TPAG = "Inicio";
include("inc/head.php");

?>
<!-- (Dashboard Alumno !-->
<?php if ($sesion['u_rango']==1&&$sesion['u_activo']==2&&$_GET['mode']!='dehan'){
	$aludata = $_SESSION['aldata'];?>
				<link href='css/fullcalendar.css' rel='stylesheet' />
<link href='css/fullcalendar.print.css' rel='stylesheet' media='print' />
				<!-- Page heading ends -->
				<style>
					#menu1{
					
						background:auto;	
						
					}
				</style>
				
				
				<!-- Black block starts -->
				<div class="blue-block" style="border-left:solid 1px #CCC; padding-bottom:0px !important;">
				
										
					<div class="row">
                    	<div class="col-md-12">
                  		  <h3 style="color:#FFF;">Inicio</h3><hr style="color:#FFF;"/>
                    	</div>
                    </div>
                    <div class="row">
						<div class="col-md-6">
                             <div id="calendar" style="margin-right: -15px;">
                             	<div id="calendar-inner">
                             <?php $dia_actual = date("d")-1;
							 $dia_final = date("t");
							 for($dia=$dia_actual;$dia<=$dia_final;$dia++){
								 ?><?php
										$año = date("Y"); 
										$dias = array("Lunes","Martes","Miercoles","Jueves","Viernes","Sábado","Domingo");
										$tmonth = date('m'); $h = mktime(0, 0, 0, $tmonth, $dia, $año); $d = date("F dS, Y", $h) ; $w= date("N", $h) ; $weekday = $dias[$w-1]; ?>
                                 <div class="panel calendar-item" <?php if($dia==date("d")){?>style="border-top: solid 4px #BECA7D; height:276px;"<?php } if($weekday=="Domingo"){?>style="outline:dashed 4px #FFF; opacity:0.8;"<?php }?><?php if($weekday=="Sábado"){?>style="outline:dashed 4px #FFF; opacity:0.8;"<?php }?><?php if($dia=='1'&&$tmonth=='1'){?>style="background:#000 url(http://stream1.gifsoup.com/view/187309/fireworks-o.gif); color:#FFF !important; background-position:left;"<?php }?><?php if($dia=='25'&&$tmonth=='12'){?>style="background:#000 url(http://digital.hammacher.com/Items/82756/82756_1000x1000.jpg); color:#FFF !important; background-position:left; background-size:cover;"<?php }?>>
                                 	<div class="calendar-heading" style="padding:20px;">
                                    	<h1 style="font-size:90px; margin-left:-5px; margin-top:20px; <?php if($dia=='1'&&$tmonth=='1'){?>color:#FFF;<?php }?><?php if($dia=='25'&&$tmonth=='12'){?>color:#FFF;<?php }?>"><?php echo $dia;?></h1>
                                        <h5 style=" color:#AAA;<?php if($dia=='1'&&$tmonth=='1'){?>color:#FFF;<?php }else{?><?php }?><?php if($dia=='25'&&$tmonth=='12'){?>color:#FFF;<?php }else{?><?php }?>;margin-top:10px;"><?php echo $weekday;?> </h5>
                                        <h5 style=" color:#555;<?php if($dia=='1'&&$tmonth=='1'){?>color:#FFF;<?php }else{?><?php }?><?php if($dia=='25'&&$tmonth=='12'){?>color:#FFF;<?php }else{?><?php }?>"> <?php $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 echo $meses[$tmonth-1];?>, <?php echo $año; $card_fecha = $año."-".$tmonth."-".$dia;$card_fechana = $tmonth."-".$dia;?></h5>
                                    </div>
                                    <div class="calendar-body" style="padding-left:20px;padding-right:20px;max-height:81px; overflow-y:scroll;">
                                    	<?php 
										$q_eventos = mysql_query("SELECT * FROM eventos");
										$c_eventos = mysql_num_rows($q_eventos);
										while($r_eventos = mysql_fetch_assoc($q_eventos)){
											if($r_eventos){
												$eventos[] = $r_eventos;
											}
										}
										foreach($eventos as $evento){
											
										$partes_ev = explode(",", $evento['ev_para']);
											$def_desde = str_replace("-", "", $evento['ev_desde']);
											$hoy = str_replace("-", "", $card_fecha);
											$def_hasta = str_replace("-", "", $evento['ev_hasta']);
										if($def_desde <= $hoy && $def_hasta >= $hoy){
										if(in_array($aludata['ad_grupo'],$partes_ev)){
										?><span class="btn btn-success btn-xs" style="width:100%; white-space:inherit; margin-top:5px;"><i class="fa fa-asterisk"></i> <?php echo $evento['ev_nombre'];  ?></span>
                                        <?php }}
										
											$def_desde = str_replace("-", "", $evento['ev_desde']);
											$hoy = str_replace("-", "", $card_fechana);
											$def_hasta = str_replace("-", "", $evento['ev_hasta']);
										if($def_desde <= $hoy && $def_hasta >= $hoy){
										if($evento['ev_para']=='*'){
										?><span class="btn btn-default btn-xs" style="width:100%; white-space:inherit; margin-top:5px;<?php if($evento['ev_nombre']=="eventbs_aqm"){?>background-color:#000;<?php }?>"><?php if($evento['ev_nombre']=="eventbs_aqm"){?><i class="fa fa-language"></i> <?php }else{?><i class="fa fa-asterisk"></i> <?php }?><?php echo $evento['ev_nombre'];?></span>
                                        <?php }
										}}
										$eventos = "";
										
										?>
                                    </div>
                                 </div>
                                 <?php
							 }
								 ?>     
                                 <?php $dia_primero = 1;
							 $dia_final = date("d");
							 for($dia=$dia_primero;$dia<=$dia_final;$dia++){
								 ?><?php
								 		$tmonth = date('m')+1;
										if(date("m")=='12'){
											$año = date("Y")+1; 
											$tmonth = "01";
										}
										$dias = array("Lunes","Martes","Miercoles","Jueves","Viernes","Sábado","Domingo");
										 $h = mktime(0, 0, 0, $tmonth, $dia, $año); $d = date("F dS, Y", $h) ; $w= date("N", $h) ; $weekday = $dias[$w-1]; ?>
                                 <div class="panel calendar-item" <?php if($weekday=="Domingo"){?>style="outline:dashed 4px #FFF; opacity:0.8;"<?php }?><?php if($weekday=="Sábado"){?>style="outline:dashed 4px #FFF; opacity:0.8;"<?php }?><?php if($dia=='1'&&$tmonth=='1'){?>style="background:#000 url(http://stream1.gifsoup.com/view/187309/fireworks-o.gif); color:#FFF !important; background-position:left;"<?php }?><?php if($dia=='25'&&$tmonth=='12'){?>style="background:#000 url(http://digital.hammacher.com/Items/82756/82756_1000x1000.jpg); color:#FFF !important; background-position:left; background-size:cover;"<?php }?>>
                                 	<div class="calendar-heading" style="padding:20px;">
                                    	<h1 style="font-size:90px; margin-left:-5px; margin-top:20px; <?php if($dia=='1'&&$tmonth=='1'){?>color:#FFF;<?php }?><?php if($dia=='25'&&$tmonth=='12'){?>color:#FFF;<?php }?>"><?php echo $dia;?></h1>
                                        <h5 style=" color:#555;<?php if($dia=='1'&&$tmonth=='1'){?>color:#FFF;<?php }else{?><?php }?><?php if($dia=='25'&&$tmonth=='12'){?>color:#FFF;<?php }else{?><?php }?>;margin-top:10px;"><?php echo $weekday;?> </h5>
                                        <h5 style=" color:#555;<?php if($dia=='1'&&$tmonth=='1'){?>color:#FFF;<?php }else{?><?php }?><?php if($dia=='25'&&$tmonth=='12'){?>color:#FFF;<?php }else{?><?php }?>"> <?php $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 echo $meses[$tmonth-1];?>, <?php echo $año; $card_fecha = $año."-".$tmonth."-".$dia;$card_fechana = $tmonth."-".$dia;?></h5>
                                    </div>
                                    <div class="calendar-body" style="padding-left:20px;padding-right:20px; max-height:81px; overflow-y:scroll;">
                                    	<?php 
										$q_eventos = mysql_query("SELECT * FROM eventos");
										$c_eventos = mysql_num_rows($q_eventos);
										while($r_eventos = mysql_fetch_assoc($q_eventos)){
											if($r_eventos){
												$eventos[] = $r_eventos;
											}
										}
										foreach($eventos as $evento){
											
										$partes_ev = explode(",", $evento['ev_para']);
											$def_desde = str_replace("-", "", $evento['ev_desde']);
											$hoy = str_replace("-", "", $card_fecha);
											$def_hasta = str_replace("-", "", $evento['ev_hasta']);
										if($def_desde <= $hoy && $def_hasta >= $hoy){
										if(in_array($aludata['ad_grupo'],$partes_ev)){
										?><span class="btn btn-success btn-xs" style="width:100%; white-space:inherit; margin-top:5px;"><?php if($evento['ev_nombre']=="eventbs_aqm"){?><i class="fa fa-language"></i> <?php }else{?><i class="fa fa-asterisk"></i> <?php }?> <?php echo $evento['ev_nombre'];  ?></span>
                                        <?php }}
										
											$def_desde = str_replace("-", "", $evento['ev_desde']);
											$hoy = str_replace("-", "", $card_fechana);
											$def_hasta = str_replace("-", "", $evento['ev_hasta']);
										if($def_desde <= $hoy && $def_hasta >= $hoy){
										if($evento['ev_para']=='*'){
										?><span class="btn btn-default btn-xs" style="width:100%; white-space:inherit; margin-top:5px;<?php if($evento['ev_nombre']=="eventbs_aqm"){?>background-color:#000;<?php }?>"><i class="fa fa-asterisk"></i> <?php echo $evento['ev_nombre'];?></span>
                                        <?php }
										}}
										$eventos = "";
										
										?>
                                    </div>
                                 </div>
                                 <?php
							 }
								 ?>     
                                </div>     
                             </div>
                             <div class="widget" style="background:#FFF; height:365px; margin-left:-16px;margin-right:-16px;margin-bottom:0px;margin-top:0px; padding:30px;">
                             <p style="text-align:center">Las calificaciones se publicarán aqui.</p>
                             </div>
						</div>
                        <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1" style="height:682px;background: -moz-linear-gradient(left, rgba(255,255,255,0.33) 0%, rgba(255,255,255,0) 100%);
background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(255,255,255,0.33)), color-stop(100%,rgba(255,255,255,0)));
background: -webkit-linear-gradient(left, rgba(255,255,255,0.33) 0%,rgba(255,255,255,0) 100%);
background: -o-linear-gradient(left, rgba(255,255,255,0.33) 0%,rgba(255,255,255,0) 100%);
background: -ms-linear-gradient(left, rgba(255,255,255,0.33) 0%,rgba(255,255,255,0) 100%);
background: linear-gradient(to right, rgba(0, 0, 0, 0.06) 0%,rgba(255,255,255,0) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#54ffffff', endColorstr='#00ffffff',GradientType=1 ); margin-top:-20px; margin-bottom:-20px;"></div>
						<div class="col-md-6 col-lg-4" style="max-height:250px; overflow-x:hidden; overflow-y:visible;
max-height: 316px;
margin-bottom: -20px;">
							
							
							
							<!-- Knob Block --> 
							<?php 
							$gethw = mysql_query("SELECT * FROM tareas");
							while ($result = mysql_fetch_assoc($gethw)){
							   if($result){ $tareas[] = $result; }
							}
							foreach($tareas as $tarea){
								 $grupo = explode(",", $tarea['t_para']); 
								 if(in_array($aludata['ad_grupo'],$grupo)){
									 $gfecha = explode(" ", $tarea['t_expiracion']);
									 $fecha = explode("-", $gfecha[0]);
									 $hora = explode(":", $gfecha[1]);
									 
									   $mixedtime = $hora[0].$hora[1].$hora[2];
									 if($hora[0]>=13){
										$hora[0]=($hora[0]-12); 
										$hora[3]="PM";
									 }else{
										$hora[0]=($hora[0]); 
										$hora[3]="AM";
									 }
									   $mixeddate = $fecha[0].$fecha[1].$fecha[2];
									   if($mixeddate.$mixedtime <= date('Ymd').date('His')-1000000 ){
								$nohw=true;  }else{ ?>
                                     
								  <div class="panel panel-default" style="border-radius:1px; border:none; margin-top:20px;">
                                        <div class="panel-body">
                                        <span class="label label-success" style="position: absolute;margin-top: -31px;margin-left: -30px;height: 30px;font-size: 12px;border-radius: 100%;padding-top: 9px; width: 30px;text-align: center;
"><?php echo $tarea['t_puntos']; ?></span>
                                        <h3 style="margin-top:0px; padding-top:7px; font-weight:400;"> <?php echo $tarea['t_titulo']; ?></h3><hr style="margin-top:5px; margin-bottom:5px; border-top: 1px solid #999;"/>
                                       <p> <?php echo $tarea['t_descripcion']; ?></p>
                                       <hr style="margin-top:5px; margin-bottom:5px;"/>
                                       <a><i class="fa fa-user"></i> <?php $maestrofav = mysql_fetch_assoc(mysql_query("SELECT * FROM usuarios WHERE u_id = '".$tarea['t_maestro']."'"));$nombres = explode(" ",$maestrofav['u_nombres']);$apellidos = explode(" ",$maestrofav['u_apellidos']); echo $nombres[0]." ".$apellidos[0];?></a>
                                       <?php if($tarea['t_adjunto']!="none"){?><a style="opacity:0;"><i class="fa fa-circle-o"></i></a><a target="_blank" href="files/<?php echo $tarea['t_adjunto'];?>"><i class="fa fa-download"></i> Adjunto</a><?php }?>
                                       <a style="opacity:0;"><i class="fa fa-circle-o"></i></a>
                                       <?php 
									   $get = mysql_query("SELECT tv_tarea FROM tareas_vistas WHERE tv_alumno = '".$sesion['u_id']."' AND tv_tarea = '".$tarea['t_id']."'");
									   $countget = mysql_num_rows($get);
									   $gets = mysql_fetch_assoc($get);?>
                                       <?php 
									   if($mixeddate.$mixedtime <= date('Ymd').date('His') ){?>
									   <a id="unusable" class="<?php if($gets['tv_tarea'] == $tarea['t_id']){ echo "clicked"; }else{ echo "n-checked"; }?>" style="text-decoration:auto;"><i class="fa  <?php if($gets['tv_tarea'] == $tarea['t_id']){ echo "fa-check-circle"; }else{ echo "fa-times-circle"; }?>" ></i> Se acabó el tiempo</a>
									   
									   <?php }else{?><a id="<?php if($gets['tv_tarea'] == $tarea['t_id']){
										   echo "unusable";
									   }else{ echo $tarea['t_id']."done"; }?>" class="<?php if($gets['tv_tarea'] == $tarea['t_id']){ echo "clicked"; }else{  }?>" style="text-decoration:auto;"><i class="fa <?php if($gets['tv_tarea'] == $tarea['t_id']){ echo "fa-check-circle"; }else{ echo "fa-circle-o"; }?>" id="<?php echo $tarea['t_id']?>btn"></i>   Expira <?php if($fecha[1]==date('m')){  if($fecha[2]==date('d')){ echo "hoy a las ".$hora[0].":".$hora[1].$hora[3];}if(date('d')==$fecha[2]-1){ echo "mañana a las ".$hora[0].":".$hora[1].$hora[3];} if($fecha[2]!=date('d') && $fecha[2]!= date('d')+1 ){echo "el ".$fecha[2]." a las ".$hora[0].":".$hora[1].$hora[3];}}else{ echo "el ".$fecha[2]." de ".$meses[$fecha[1]-1]; }?></a><?php }?>
                                            <p></p>
                                        </div>
                                    </div>
								  <?php
								  }}}
								  if($nohw==true){
									echo "<p style='color:#FFF; text-align:center;'>No hay tareas</p>"; 
								  }
							?>
							
						</div>
                        
                        <div class="col-md-0 col-lg-1"></div>
                        
					</div>
					
					<!-- Map block -->
					
				<?php /*
					<div class="row" style="margin-top:20px; background:rgba(0,0,0,0.7);">
					
						
						<div class="col-md-6">
							<!-- OS widget -->
							<div class="widget" style="border-radius:1px; border:none;">

								<!-- Widget head -->
									<h5 class="pull-left" style="font-family:Helvetica Neue, Sans-serif; font-weight:500; padding:10px 10px 10px 10px; border-bottom:solid 1px #09F;width: 100%;">Tablón de mensajes</h5>	
									

								<!-- Widget body -->
								<div class="widget-body no-padd" style="text-align:center; padding-bottom:20px; height:auto;"><br />					
                                			
                                  
								</div>

								

							</div>
						</div>

						<div class="col-md-6">
							<!-- File Upload Widget -->
							<div class="widget">

								<!-- Widget head -->
								<div class="well br-green" style="border:none; color:#FFF; text-align:center; border-radius:0px;">
							  	<h1 style="color:#FFF;">95</h1>
							  	<p>95 de 100</p>
								</div>
                                <div class="widget-body" style="margin-top:-25px;">
                                <table class="table table-hover calif" style="margin-bottom:0px;">
                                  <tr>
                                  	<td style="vertical-align:middle;">
                                    <p>Español I</p>
                                    </td>
                                  	<td width="60px" style="text-align:center;">
                                    <h4>95</h4>
                                    </td>
                                  </tr>
                                  <tr>
                                  	<td style="vertical-align:middle;">
                                    <p>Quimica I</p>
                                    </td>
                                  	<td width="60px" style="text-align:center;">
                                    <h4>95</h4>
                                    </td>
                                  </tr>
                                  <tr>
                                  	<td style="vertical-align:middle;">
                                    <p>Biología</p>
                                    </td>
                                  	<td width="60px" style="text-align:center;">
                                    <h4>95</h4>
                                    </td>
                                  </tr>
                                </table>
                                </div>
                               
								<!-- Widget foot -->

							</div>
						</div>						
						
						
						
					
					</div>*/?>
					
					
					
					
				</div>
									
		
				<!-- Content ends -->				
			   
            </div>
            <!-- Mainbar ends -->
         </div>
      </div>
<?php }?>
<!-- (Dasboard sin +) !-->
<?php if ($_GET['mode']=='dehan'){?>
				<div class="blue-block" style="border-left:solid 1px #CCC;">
				
					<div class="row">
                    	<div class="col-md-12">
							<h3 style="color:#FFF;">Mi Avance</h3><hr style="color:#FFF;"/>
                        </div>
                    </div>
					<div class="row">
						<div class="col-md-7">
							
                                                <div id="avance"></div>
										
										
                             
							
							
							
						</div>
						<div class="col-md-5">
							
							
							
							<!-- Knob Block -->
							<?php $aldata = $_SESSION['aldata']; ?>
							<div class="blue-knob-block" style="border:solid 3px #FFF; color:#FFF;">
                            <h3 style="margin-top:0px; margin-left:55px; padding-top:7px; font-weight:700; color:#FFF;">Mi Nivel</h3>
                            
                           <h1 style="color:#FFF;opacity: 0.5; position:absolute;font-size: 141px;margin-top: -6px;font-weight: 500;"><?php echo $aldata['n_nombre']; ?></h1>
								<ul class="list-inline list-unstyled">
									<li>
											<!-- jQuery Knob -->
											<input type="text" value="<?php echo $aldata['l_nombre']; ?>" class="dial" data-angleArc="250" data-width="100" data-max="25" data-bgColor="rgba(256,256,256,0.2)" data-fgColor="rgba(244, 255, 255, 1)" data-height="100" data-step="1" data-angleOffset="-125" data-inputColor="#FFF" data-readOnly="true"><br/>
											<span class="label label-success">Libro <?php $aldata = $_SESSION['aldata']; echo $aldata['l_nombre']; ?> de 25</span>
									</li>
                                    <li>
                                            <p><?php echo $aldata['l_desc'];?></p>
									</li>
								</ul>
							</div>
							<div class="blue-knob-block" style="border:solid 3px #FFF; color:#FFF;height: 120px;">
                            <h3 style="margin-top:0px; margin-left:55px; padding-top:7px; font-weight:700; color:#FFF;">Siguiente Nivel</h3>
                              <h1 style="color:#FFF;opacity: 0.5; position:absolute;font-size: 141px;margin-top: -6px;font-weight: 500;"><?php echo $aldata['n_nombre']+1; ?></h1>
								<ul class="list-inline list-unstyled">
									<li>
											<!-- jQuery Knob -->
											
											<span class="label label-success">25 Libros</span>
									</li>
                                    <li>
                                            <p> </p>
									</li>
								</ul>
							</div>
						</div>
                        
					</div>
					
					<div class="row" style="margin-top:20px; background:rgba(0,0,0,0.7);">
					
						
						<div class="col-sm-0 col-md-1 col-lg-3">
                        </div>
						<div class="col-sm-12 col-md-10 col-lg-6">
							<!-- OS widget -->
							<div class="widget" style="border-radius:1px; border:none;">

								<!-- Widget head -->
									<h5 class="pull-left" style="font-family:Helvetica Neue, Sans-serif; font-weight:500; padding:10px 10px 10px 10px; border-bottom:solid 1px #09F;width: 100%;">Libro Actual</h5>	
									

								<!-- Widget body -->
								<div class="widget-body no-padd" style="text-align:center; padding-bottom:20px; height:auto;"><br />					
                                			
                                	<img src="../img/libros/<?php echo $aldata['n_nombre'];?>.jpg" class="libro actual" style="margin:10px;"/>
									<img src="../img/libros/<?php echo $aldata['n_nombre']+1;?>.jpg" class="libro" style="margin:10px;"/>
									<img src="../img/libros/<?php echo $aldata['n_nombre']+2;?>.jpg" class="libro" style="margin:10px;"/>
                                			
                                  
								</div>

								

							</div>
						</div>
                        
						<div class="col-sm-0 col-md-1 col-lg-3">
                        </div>
					
					</div>
				<!-- Black block ends
                    <div class="row" style="margin-top:20px;">
                    	<div class="col-sm-0 col-md-1 col-lg-2">
                        </div>
                    	<div class="col-sm-12 col-md-10 col-lg-8">
                        	<h3 style="color:#FFF; text-align:center;">Libros terminados</h3><hr />
                            <div id="libros"></div>
                        </div>
                    	<div class="col-sm-0 col-md-1 col-lg-2">
                        </div>
                    </div> -->
				
			
				
				<!-- Content starts -->
				
				
				
				<!-- Content ends -->				
			   
            </div>
            <!-- Mainbar ends -->
            
            
         </div>
      </div>
      
<?php }?>
<?php if ($sesion['u_rango']==1&&$sesion['u_activo']==1){?>
				<div class="blue-block" style="border-left:solid 1px #CCC;">
				
					<div class="row">
                    	<div class="col-md-12">
							<h3 style="color:#FFF;">Mi Avance</h3><hr style="color:#FFF;"/>
                        </div>
                    </div>
					<div class="row">
						<div class="col-md-7">
							
                                                <div id="avance"></div>
										
										
                             
							
							
							
						</div>
						<div class="col-md-5">
							
							
							
							<!-- Knob Block -->
							<?php $aldata = $_SESSION['aldata']; ?>
							<div class="blue-knob-block" style="border:solid 3px #FFF; color:#FFF;">
                            <h3 style="margin-top:0px; margin-left:55px; padding-top:7px; font-weight:700; color:#FFF;">Mi Nivel</h3>
                            
                           <h1 style="color:#FFF;opacity: 0.5; position:absolute;font-size: 141px;margin-top: -6px;font-weight: 500;"><?php echo $aldata['n_nombre']; ?></h1>
								<ul class="list-inline list-unstyled">
									<li>
											<!-- jQuery Knob -->
											<input type="text" value="<?php echo $aldata['l_nombre']; ?>" class="dial" data-angleArc="250" data-width="100" data-max="25" data-bgColor="rgba(256,256,256,0.2)" data-fgColor="rgba(244, 255, 255, 1)" data-height="100" data-step="1" data-angleOffset="-125" data-inputColor="#FFF" data-readOnly="true"><br/>
											<span class="label label-success">Libro <?php $aldata = $_SESSION['aldata']; echo $aldata['l_nombre']; ?> de 25</span>
									</li>
                                    <li>
                                            <p><?php echo $aldata['l_desc'];?></p>
									</li>
								</ul>
							</div>
							<div class="blue-knob-block" style="border:solid 3px #FFF; color:#FFF;height: 120px;">
                            <h3 style="margin-top:0px; margin-left:55px; padding-top:7px; font-weight:700; color:#FFF;">Siguiente Nivel</h3>
                              <h1 style="color:#FFF;opacity: 0.5; position:absolute;font-size: 141px;margin-top: -6px;font-weight: 500;"><?php echo $aldata['n_nombre']+1; ?></h1>
								<ul class="list-inline list-unstyled">
									<li>
											<!-- jQuery Knob -->
											
											<span class="label label-success">25 Libros</span>
									</li>
                                    <li>
                                            <p> </p>
									</li>
								</ul>
							</div>
						</div>
                        
					</div>
                    <div class="row" style="margin-top:20px; background:rgba(0,0,0,0.7);">
					
						
						<div class="col-sm-0 col-md-1 col-lg-3">
                        </div>
						<div class="col-sm-12 col-md-10 col-lg-6">
							<!-- OS widget -->
							<div class="widget" style="border-radius:1px; border:none;">

								<!-- Widget head -->
									<h5 class="pull-left" style="font-family:Helvetica Neue, Sans-serif; font-weight:500; padding:10px 10px 10px 10px; border-bottom:solid 1px #09F;width: 100%;">Libro Actual</h5>	
									

								<!-- Widget body -->
								<div class="widget-body no-padd" style="text-align:center; padding-bottom:20px; height:auto;"><br />					
                                	<img src="../img/libros/<?php if($aldata['n_nombre']=='K'){echo "0";}else{echo $aldata['n_nombre'];}?>.jpg" class="libro actual" style="margin:10px;"/>
									<img src="../img/libros/<?php echo $aldata['n_nombre']+1;?>.jpg" class="libro" style="margin:10px;"/>
									<img src="../img/libros/<?php echo $aldata['n_nombre']+2;?>.jpg" class="libro" style="margin:10px;"/>
                                			
                                  
								</div>

								
                                
							</div>
						</div>
                        
						<div class="col-sm-0 col-md-1 col-lg-3">
                        </div>
					
					</div>
                    <?php 
					$ifim = mysql_query("SELECT * FROM franquicias WHERE fra_id = '".$aldata['ad_grupo']."'");
					$resifim = mysql_fetch_assoc($ifim);
					if($resifim){
					?>
                    <div class="row" style="margin-top:1px; background:rgba(0,0,0,0.0);">
					
						
						<div class="col-sm-0 col-md-2 col-lg-2">
                        </div>
						<div class="col-sm-12 col-md-4 col-lg-4">
							<!-- OS widget -->
							<div class="widget" style="border-radius:1px; border:none;">

								<!-- Widget head -->
									<h5 class="pull-left" style="font-family:Helvetica Neue, Sans-serif; font-weight:500; padding:10px 10px 10px 10px; border-bottom:solid 1px #09F;width: 100%;">Ultima Asistencia</h5>	
									

								<!-- Widget body -->
								<div class="widget-body no-padd" style="text-align:center; padding-bottom:20px; height:auto;"><br />									
  								 <?php 
									$qu_asist = mysql_query("SELECT * FROM sys_asistencia WHERE as_usuario = '".$aldata['u_id']."' AND as_id_fra = '".$aldata['ad_grupo']."'");		
									while($res_asist = mysql_fetch_assoc($qu_asist)){
										if($res_asist){
											$asistencia[] = $res_asist;	
										}
									}
									if($asistencia){
										foreach($asistencia as $asis){
										 	$fechar = explode("-",$asis['as_fecha']);
											$fecha = $fechar[0].$fechar[1].$fechar[2];
											$date[] = $fecha;
										}
									}	
									$maxdte = max($date);
									$spl_dte = str_split($maxdte);
									foreach($spl_dte as $deit){
										$today[] = $deit;	
									}
									$abuscar = implode("%",$today);
									$qu_myas = mysql_query("SELECT * FROM dehan.sys_asistencia WHERE as_fecha LIKE '".$abuscar."' AND as_usuario = '".$aldata['u_id']."';");		
									while($res_myas = mysql_fetch_assoc($qu_myas)){
										if($res_myas){
											$asistencias[] = $res_myas;	
										}
									}
									if($asistencia){
										foreach($asistencias as $asist){
										 	$lafecha = explode("-",$asist['as_fecha']);
											echo "<h2 style='text-align:center;'>".implode("/",$lafecha)."</h2>";
											?><br>
											<p style="text-align:center;"><b>Entró a las: </b><?php echo $asist['as_h_entrada'];?><br><b>Salió a las: </b><?php echo $asist['as_h_salida'];?></p><?php
										}
									}	
									?>
  								</div>

								
                                
							</div>
						</div>
						<div class="col-sm-12 col-md-4 col-lg-4">
							<!-- OS widget -->
							<div class="widget" style="border-radius:1px; border:none;">

								<!-- Widget head -->
									<h5 class="pull-left" style="font-family:Helvetica Neue, Sans-serif; font-weight:500; padding:10px 10px 10px 10px; border-bottom:solid 1px #09F;width: 100%;">Ultimo Pago</h5>	
									

								<!-- Widget body -->
								<div class="widget-body no-padd" style="text-align:center; padding-bottom:20px; height:auto;"><br />									
  								 
  								</div>


								
                                
							</div>
						</div>
                        
						<div class="col-sm-0 col-md-2 col-lg-2">
                        </div>
					
					</div>
                    <?php }?>
				<!-- Black block ends
                    <div class="row" style="margin-top:20px;">
                    	<div class="col-sm-0 col-md-1 col-lg-2">
                        </div>
                    	<div class="col-sm-12 col-md-10 col-lg-8">
                        	<h3 style="color:#FFF; text-align:center;">Libros terminados</h3><hr />
                            <div id="libros"></div>
                        </div>
                    	<div class="col-sm-0 col-md-1 col-lg-2">
                        </div>
                    </div>!-->
					
				</div>
				<!-- Black block ends -->
				
			
				
				<!-- Content starts -->
				
				
				
				<!-- Content ends -->				
			   
            </div>
            <!-- Mainbar ends -->
            
            
         </div>
      </div>
      
<?php }?>
<!-- (Dashboard Maestro) !-->	
	<?php if ($sesion['u_rango']==2&&$sesion['u_activo']==2){?>
    			
				<!-- Page heading ends -->
				<style>
					#menu1{
					
						background:auto;	
						
					}
				</style>
				
				
				<!-- Black block starts -->
				<div class="blue-block" style="border-left:solid 1px #CCC;">
				
									<div class="row">
                                        <div class="col-md-12">
                                          <h3 style="color:#FFF;">Inicio</h3>
                                          
                                        </div>
                                    </div>
					
				</div>
				<!-- Black block ends -->
				
			
				
				<!-- Content starts -->
				
				<div class="container" style="border-left:1px solid #CCC; margin-top:-5px;">
					<div class="row">
                    <div class="col-lg-4 col-md-12">
							<!-- OS widget -->
							<div class="widget" style="border-radius:1px; border:none;">

								<!-- Widget head -->
									<h5 class="pull-left" style="font-family:Helvetica Neue, Sans-serif; font-weight:500; padding:10px 10px 10px 10px; border-bottom:solid 1px #09F;width: 100%;">Tareas</h5>	
									

								<!-- Widget body -->
							<div class="widget-body no-padd" style="text-align:center; padding-bottom:20px; height:auto;"><br />					<?php 
							$gethw = mysql_query("SELECT * FROM tareas WHERE t_maestro = '".$sesion['u_id']."' ORDER BY t_id DESC");
							while ($result = mysql_fetch_assoc($gethw)){
							   if($result){ $tareas[] = $result; }
							}
							foreach($tareas as $tarea){
								 $grupo = explode(",", $tarea['t_para']); 
									 $gfecha = explode(" ", $tarea['t_expiracion']);
									 $fecha = explode("-", $gfecha[0]);
									 $hora = explode(":", $gfecha[1]);
									 $mixedtime = $hora[0].$hora[1].$hora[2];
									 if($hora[0]>=13){
										$hora[0]=($hora[0]-12); 
										$hora[3]="PM";
									 }else{
										$hora[0]=($hora[0]); 
										$hora[3]="AM";
									 }
									   $mixeddate = $fecha[0].$fecha[1].$fecha[2];
									   if($mixeddate.$mixedtime <= date('Ymd').date('His')-1000000 ){}else{ 
									?>
								  
                                        
                                        <h5 style="margin-top:20px; padding-top:7px; font-weight:400;<?php  if($mixeddate.$mixedtime <= date('Ymd').date('His') ){echo "color:#f00;";}?>"> <?php echo $tarea['t_titulo']; ?> (<?php echo $fecha[0].'/'.$fecha[1].'/'.$fecha[2];?>)<?php  if($mixeddate.$mixedtime <= date('Ymd').date('His') ){echo " <i class='fa fa-lock'></i>";}?></h5>
                                       <p> <?php echo $tarea['t_descripcion']; ?></p>
                                       <a id="pop<?php echo $tarea['t_id']?>" data-content="<form action='query.php?action=ntexto'>
      <textarea class='form-control' id='dates<?php echo $tarea['t_id'];?>' name='ntexto' style='display:inline-block; width:80%;'><?php echo $tarea['t_descripcion'];?></textarea><button class='btn btn-success input-group-addon' type='submit' style='display:inline-block; width:20%; height:33px;'><i class='fa fa-save'></i></button><input class='form-control' type='text' value='<?php echo $tarea['t_id'];?>' name='id' style='display:none;'/></form>"><i class="fa fa-edit"></i> Editar</a>
                                       <a id="popi<?php echo $tarea['t_id']?>" data-content="<form action='query.php?action=nfechat'>
      <input class='form-control' id='dates<?php echo $tarea['t_id'];?>' type='text' value='<?php echo $tarea['t_expiracion'];?>' name='nfecha' style='display:inline-block; width:80%;'/><button class='btn btn-success input-group-addon' type='submit' style='display:inline-block; width:20%; height:33px;'><i class='fa fa-save'></i></button><input class='form-control' type='text' value='<?php echo $tarea['t_id'];?>' name='id' style='display:none;'/></form>"><i class="fa fa-clock-o"></i> Reasignar</a>
  
                                       <a style="opacity:0;"><i class="fa fa-circle-o"></i></a>
                                       <?php 
									   $get = mysql_query("SELECT COUNT(tv_id) c FROM tareas_vistas WHERE tv_tarea = '".$tarea['t_id']."'");
									   $gets = mysql_fetch_assoc($get);
									   ?><a style="text-decoration:auto;"><i class="fa fa-check"></i> Vista por <?php echo $gets['c'];?></a>
                                       <hr style="margin-top:5px; margin-bottom:5px;"/>
								  <?php
								  }}
							?>
                                			
                                  
								</div>

								

							</div>
                    	</div>
                        <div class="col-lg-8 col-md-12">
							<!-- OS widget -->
							<div class="widget" style="border-radius:1px; border:none;">

								<!-- Widget head -->
									<h5 class="pull-left" style="font-family:Helvetica Neue, Sans-serif; font-weight:500; padding:10px 10px 10px 10px; border-bottom:solid 1px #09F;width: 100%;">Calendario</h5>	
									

								<!-- Widget body -->
							<div class="widget-body no-padd" style="text-align:center; padding-bottom:20px; height:auto;"><br />					
                                    <div class="container">
                                    	
                                        <div class="row">
                                        	<?php $dia_actual = 1;
												 $dia_final = date("t");
												 for($dia=$dia_actual;$dia<=$dia_final;$dia++){
													 ?><?php
															$año = date("Y"); 
															$dias = array("Lunes","Martes","Miercoles","Jueves","Viernes","Sábado","Domingo");
															$tmonth = date('m'); $h = mktime(0, 0, 0, $tmonth, $dia, $año); $d = date("F dS, Y", $h) ; $w= date("N", $h) ; $weekday = $dias[$w-1]; ?>
													 <div class="a-calendar-item" <?php if($dia==date("d")){?>style=" background: #DDD;"<?php } if($weekday=="Domingo"){?>style=" background: #EEE;"<?php }?><?php if($weekday=="Sábado"){?>style=" background: #EEE;"<?php }?>>
														<div class="calendar-heading" style="padding:20px;">
															<h5 style="font-size:40px; margin-top:10px;"><?php echo $dia;?></h1>
															<p style="color:#AAA;margin-top:10px;"><?php if($dia==date("d")){?><?php } ?><?php if($dia==date("d")-1){?><?php } ?><?php echo $weekday;?> </p>
															<p style="color:#555; margin-top:-10px;"> <?php $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
					 echo $meses[$tmonth-1];?>, <?php echo $año; $card_fecha = $año."-".$tmonth."-".$dia;?></p>
														
														<?php 
										$q_eventos = mysql_query("SELECT * FROM eventos");
										$c_eventos = mysql_num_rows($q_eventos);
										while($r_eventos = mysql_fetch_assoc($q_eventos)){
											if($r_eventos){
												$eventos[] = $r_eventos;
											}
										}
										foreach($eventos as $evento){
											
										$partes_ev = explode(",", $evento['ev_para']);
											$def_desde = str_replace("-", "", $evento['ev_desde']);
											$hoy = str_replace("-", "", $card_fecha);
											$def_hasta = str_replace("-", "", $evento['ev_hasta']);
										if($def_desde <= $hoy && $def_hasta >= $hoy){
										if(in_array($aludata['ad_grupo'],$partes_ev)){
										$countday = '0';
										$countday = $countday+1;   ?>
                                        <?php }}
										
											$def_desde = str_replace("-", "", $evento['ev_desde']);
											$hoy = str_replace("-", "", $card_fecha);
											$def_hasta = str_replace("-", "", $evento['ev_hasta']);
										if($def_desde <= $hoy && $def_hasta >= $hoy){
										if($evento['ev_para']=='*'){
										$countday = $countday+1; ?>
                                        <?php }
										}}
									    if($countday=='1'){ echo $countday." evento"; }else{
											 echo $countday." eventos";
										}
										?>
															</div>
													 </div>
													 <?php
												
										$eventos = "";
										$countday = 0; }
													 ?>  
                                        </div>
                                    </div>
                                </div>

								

							</div>
                    	</div>
					</div>
				</div>
				
				<!-- Content ends -->				
			   
            </div>
            <!-- Mainbar ends -->
            
            <div class="clearfix"></div>
         </div>
      </div>
    <?php } ?>
	<?php if ($sesion['u_rango']==2&&$sesion['u_activo']==1){?>
    			
				<!-- Page heading ends -->
				<style>
					#menu1{
					
						background:auto;	
						
					}
				</style>
				
				
				<!-- Black block starts -->
				<div class="blue-block" style="border-left:solid 1px #CCC;">
				
									<div class="row">
                                        <div class="col-md-12">
                                          <h3 style="color:#FFF;">Inicio &raquo;<a style="font-size: 21px; color:#FFF; margin-top: -62px;font-weight: 900;"> Mis Grupos</a></h3>
                                          
                                        </div>
                                    </div>
					
				</div>
				<!-- Black block ends -->
				
			
				
				<!-- Content starts -->
				
				<div class="container" style="border-left:1px solid #CCC; margin-top:-5px;">
					<div class="row">
                    <div class="col-lg-3 col-md-0">
                    </div>
                    <div class="col-lg-6 col-md-12">
                    	<div class="invisitabla" id="tabla1" style="margin-top:25px; <?php if($_GET['view']==2){ echo "display:none;"; }else{}?>">
                                    	<div class="table-responsive">
                                        	<table class="table table-bordered table-striped">
                                              <thead>
                                                <tr>
                                                  <th>Grupo</th>
                                                  <th>Tutor</th>
                                                  <th>Alumnos</th>
                                                </tr>
                                              </thead>
                                              <tbody id="grupostable">
		
        <?php 
										 
											 $query_gr = "SELECT * FROM grupos g INNER JOIN grupos_maestros gm ON gm.gm_grupo = g.g_id WHERE gm.gm_maestro = '".$sesion['u_id']."' ORDER BY g.g_nombre";
											 
$res_gr = mysql_query($query_gr);
									
									if($res_gr)
									{
										while($filas_gr = mysql_fetch_assoc($res_gr))
										{
											$gr_nombre = $filas_gr["g_nombre"];
											$gr_nick = $filas_gr["g_extra"];
											$gr_nivel = $filas_gr["g_nivel"];
											$gr_id = $filas_gr["g_id"];



											if($res_gr){
												?>
                                                <tr class="">
                                                  <input type="text" style="display:none;" class="gr-id1" value="<?php echo $gr_id;?>" />
                                                  <td><a style="color:#06F;" href="ins_alumnos.php?type=grupoview&id=<?php echo $gr_id;?>"><b><?php echo $gr_nombre;?><?php if($gr_nick){ echo " (".$gr_nick.")";} ?></b></a></td>
                                                  <td><?php $gr_tutor = mysql_fetch_assoc($gtutor = mysql_query("SELECT * FROM usuarios inner join usuarios_maestros inner join grupos_maestros ON grupos_maestros.gm_maestro = usuarios_maestros.um_grupo  AND usuarios_maestros.um_usuario_id = usuarios.u_id WHERE grupos_maestros.gm_grupo = ".$gr_id."")); echo $gr_repres = $gr_tutor['u_nombres']." ".$gr_tutor['u_apellidos']; ?></td>
                                                  <td><span class="label label-warning"><?php $a_alumnos = mysql_fetch_assoc($nalumnos = mysql_query("SELECT COUNT(ad_id) FROM alumnos_datos WHERE alumnos_datos.ad_grupo = '".$gr_id."'")); echo $gr_alumnos = $a_alumnos['COUNT(ad_id)']; ?> Alumno<?php if ($gr_alumnos != 1){?>s<?php }?></span></td>                                                </tr>
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
                                    
                    <div class="col-lg-3 col-md-0">
                    </div>
					</div>
				</div>
				
				<!-- Content ends -->				
			   
            </div>
            <!-- Mainbar ends -->
            
            <div class="clearfix"></div>
         </div>
      </div>
    <?php } ?>
<!-- (Dashboard Coordinador) !-->	
	<?php if ($sesion['u_rango']==3){?>
    			<!-- Page heading ends -->
				<style>
					#menu1{
					
						background:auto;	
						
					}
				</style>
				
				
				<!-- Black block starts -->
				<div class="blue-block" style="border-left:solid 1px #CCC; height:100%;">
				
										
					<div class="row">
						<div class="col-md-2">
                        </div>
						<div class="col-md-8">
							<h1 style="color:#FFF; text-align:center;" >Bienvenid<?php if($my_gender=="F"){ echo "a"; }else{ echo "o"; }?>, <?php echo $my_nombre;?></h1>
							<!--<h3 style="color:#FFF; text-align:center;font-weight:500;" ><b style="font-weight:600;">Estadísticas</b> del sitio.</h3>!-->
                                           <div class="container" style="margin-top:70px;">
                                           		
                                                <div class="row" style="text-align:center;">
                                                  <!--<div class="col-xs-3 col-md-3">
                                                   
                                                      <div class="bubble c1" style=" margin-left: auto;
    margin-right: auto; "><i class="fa fa-building"></i> 
	<?php 
	$colegios = mysql_query("SELECT COUNT(*) c FROM colegios");
	$franquicias = mysql_query("SELECT COUNT(*) c FROM franquicias");
$c_row = mysql_fetch_assoc($colegios);
$f_row = mysql_fetch_assoc($franquicias);
echo $c_row['c']+$f_row['c']; //Here is your count?></div>
                                                   
                                                  </div>
                                                  <div class="col-xs-3 col-md-3">
                                                   
                                                      <div class="bubble c2" style=" margin-left: auto;
    margin-right: auto; "><i class="fa fa-group"></i> <?php $grupos = mysql_query("SELECT COUNT(*) c FROM grupos");
$g_row = mysql_fetch_assoc($grupos); echo $g_row['c'];?></div>
                                                   
                                                  </div><div class="col-xs-3 col-md-3">
                                                   
                                                      <div class="bubble c3" style=" margin-left: auto;
    margin-right: auto; "><i class="fa fa-suitcase"></i> <?php $usuarios = mysql_query("SELECT COUNT(*) c FROM usuarios WHERE u_rango = 2 AND u_activo != 0");
$u_row = mysql_fetch_assoc($usuarios); echo $u_row['c'];?></div>
                                                   
                                                  </div><div class="col-xs-3 col-md-3">
                                                   
                                                      <div class="bubble c4" style=" margin-left: auto;
    margin-right: auto; "><i class="fa fa-user"></i> <?php $alumnos = mysql_query("SELECT COUNT(*) c FROM usuarios WHERE u_rango = 1 AND u_activo != 0");
$a_row = mysql_fetch_assoc($alumnos); echo $a_row['c'];?></div>
                                                   
                                                  </div>!-->
                                                  
                                                </div> 
                                                <!--<hr  style=" margin-top:70px; margin-bottom:0px;"/>!-->
                                                <div class="row">
                                                	<div class="page-content page-posts">
                                                        
                                                        <div class="page-tabs">
                                                        
                                                            <!-- Nav tabs -->
                                                            <ul class="nav nav-tabs nav-tabsi">
                                                              <li class="active"><a href="posts.html#posts" data-toggle="tab" style="background: #FFF !important;
box-shadow: 0px 0px 0px 2px #FFF">Colegios</a></li>
                                                              <li><a href="#makepost" data-toggle="tab" style="background: #FFF !important;
box-shadow: 0px 0px 0px 2px #FFF">Nuevo Colegio</a></li>
                                                            </ul>
                                
                                                            <!-- Tab panes -->
                                                            <div class="tab-content">
                                                            
                                                              <!-- Posts tab -->
                                                              <div class="tab-pane fade active in" id="posts" style="min-height:300px; margin-bottom:20px;">
                                                              
                                                                    
                                                                    
                                                                   
                                                                    
                                                                     
                                                                          <table class="table table-bordered">
                                                                           <thead>
                                                                             <tr>
                                                                               <th>Nombre</th>
                                                                               <th>Director</th>
                                                                               <th>Primer Registro</th>
                                                                               <th>Registro</th>
                                                                               <th style="width:100px;">Control</th>
                                                                             </tr>
                                                                           </thead>
                                                                           <tbody>
                                                                            <?php 
                                                                            $query = "SELECT c.*,d.*,ui.* FROM colegios c inner join usuarios d inner join usuarios_instituciones ui ON ui.ui_usuario = d.u_id AND ui.ui_institucion = c.col_id WHERE d.u_rango = 4 AND c.col_repres = '".$sesion['u_id']."'";
                                                                    
                                                                    $res = mysql_query($query);
                                                                    
                                                                    if($res)
                                                                    {
                                                                        while($filas = mysql_fetch_assoc($res))
                                                                        {
                                                                            $col_nombre = $filas["col_nombre"];
                                                                            $col_id = $filas["col_id"];
                                                                            $col_director = $filas["u_nombres"];
                                                                            $col_director2 = $filas["u_apellidos"];
                                                                            $col_desde = $filas["u_reg"];
                                                                            $col_activo = $filas["col_activo"];
                                                                            
                                                                    if($col_nombre){
                                                                            
                                                                            ?>
                                                                             <tr>
                                                                               
                                                                               <td><a style="color:#06F;" href="institucion.php?type=info&id=<?php echo $col_id;?>&tab=1"><b><?php echo $col_nombre;?></b></a></td>
                                                                               <td><?php echo $col_director." ".$col_director2;?></td>
                                                                               <td><?php 
                                                                               $col_desde_pro1 = explode(' ', $col_desde);
                                                                               $col_desde_proo = $col_desde_pro1['0'];
                                                                                $col_desde_pro2 = explode('-', $col_desde_proo);
                                                                                $mes = $col_desde_pro2['1'];
                                                                                $año = $col_desde_pro2['0'];
                                                                                $dia = $col_desde_pro2['2'];
                                                                               echo $dia."/".$mes."/".$año;
                                                                               ?></td>
                                                                               <td><?php if($col_activo == "1"){ echo "<span class='label label-success'>Activo</span>"; } if($col_activo == "0"){ echo"<span class='label label-danger'>Inactivo</span>"; } ?><?php if($col_activo == "2"){ echo"<span class='label label-primary'><i class='fa fa-plus'></i> MyDehanPLUS</span>"; } ?></td>
                                                                               <td style="text-align:center;">
                                
                                                                                   <?php if($col_activo == "0"){ ?> <a href="query.php?func=activate&id=<?php echo $col_id;?>&v=1" class="activate"><i class="fa fa-check"></i>Activar </a><?php }?>
                                                                                   <?php if($col_activo == "2"){ ?> <a href="query.php?func=activate&id=<?php echo $col_id;?>&v=1"><i class="fa fa-minus"></i> </a><?php }?>
                                                                                   <?php if($col_activo != "2"){ ?> <a href="query.php?func=activate&id=<?php echo $col_id;?>&v=2"><i class="fa fa-plus"></i> </a><?php }?>
																				   <?php if($col_activo != "0"){ ?> <a href="query.php?func=activate&id=<?php echo $col_id;?>&v=0" style="color:#f00;"><i class="fa fa-power-off"></i></a><?php }?>
                                                                               
                                                                               </td>
                                                                             </tr>
                                                                             <?php 
                                                                             
                                                                    }
                                                                    
                                                                        }
                                                                        
                                }?>
                                                                           </tbody>
                                                                         </table>
                                                                        
                                                                   
                                                              
                                                              </div>
                                                              
                                                              <!-- Make post tab -->
                                                              <div class="tab-pane fade" id="makepost">
                                
                                                                <h4>Nuevo Colegio</h4>
                                                                <div class="row">
                                                                
                                                                    <div class="col-md-12">
                                                                        <!-- Make post Widget -->
                                                                        <div class="widget" id="stp1">
                                
                                                                            <!-- Widget head -->
                                                                            <div class="widget-head">
                                                                                <h5><i class="fa fa-desktop"></i> Información del Colegio</h5>	
                                                                            </div>
                                
                                                                            <!-- Widget body -->
                                                                            <div class="widget-body" style=" padding-bottom:50px;">
                                                                                <!-- Post title area -->
                                                                                <form method="POST" id="forma1" action="query.php?func=ncolegio" enctype="multipart/form-data">
                                                                                <label>Nombre del Colegio</label>
                                                                                <input type="text" name="col_nombre" class="form-control col-lg-8 forma1" placeholder="Nombre del Colegio" onblur="this.value=this.value.toUpperCase()"><br>
                                                                                <!-- Post title area -->
                                                                                <label>Contacto</label><br/>
                                                                                <input name="col_tel1" style="width:49%; margin-right:10px;" type="text" class="form-control col-lg-4 forma1" placeholder="000 000 00 00">
                                                                                <input name="col_email" style="width:49%;" type="text" class="form-control col-lg-4 forma1" placeholder="Correo electrónico"><br><!-- Post title area -->
                                                                                <label>Direccion</label><br/>
                                                                                <div style="margin:30px;padding:20px; padding-bottom:50px; border: dashed 2px #DDD; background:#F5F5F5;">
                                                                                <label><small><b>Calle</b></small></label><br/>
                                                                                <input type="text" name="col_calle" class="form-control col-lg-8 forma1" placeholder="Enter Title" onblur="this.value=this.value.toUpperCase()"><br/>
                                                                                <label><small><b>Número</b></small></label><br/>
                                                                                <input style="width:46%;margin-right:10px;" name="col_num_ext" type="number" class="form-control col-lg-4 forma1" placeholder="Externo">
                                                                                <input name="col_num_int" style="width:46%;" type="text" class="form-control col-lg-4 forma1" placeholder="Interno" onblur="this.value=this.value.toUpperCase()"><br/>
                                                                                <label><small><b>Ubicación</b></small></label><br/>
                                                                                <input name="col_colonia" style="width:65%;margin-right:10px;" type="text" class="form-control col-lg-6 col-xs-6 forma1" placeholder="Colonia" onblur="this.value=this.value.toUpperCase()"> <input name="crea_id" style="width:65%;margin-right:10px; display:none" type="text" class="form-control col-lg-6 col-xs-6 forma1" placeholder="Colonia" onblur="this.value=this.value.toUpperCase()" value="<?php echo $sesion['u_id'];?>">
                                                                                <input name="col_postalcode" style="width:25%;" type="text" class="form-control col-lg-2 col-xs-2 forma1" placeholder="Código Postal"><br/></div>
                                                                                <label>Ciudad / País</label><br/>
                                                                                <input name="col_ciudad" style="width:32%; margin-right:10px;" type="text" class="form-control col-lg-4 col-xs-4 forma1" placeholder="Ciudad" onblur="this.value=this.value.toUpperCase()">
                                                                                <input name="col_estado" style="width:32%; margin-right:10px;" type="text" class="form-control col-lg-4 col-xs-4 forma1" placeholder="Estado" onblur="this.value=this.value.toUpperCase()">
                                                                          <select style="width:32%; margin-top:5px;" name="col_pais" class="form-control forma1">
                                  <option value="52">(+52) México</option>
                                  <!--<option value="51">(+51) Perú</option>     !-->                                           </select>
                                                                                
                                                                            </div>
                                
                                                                            <!-- Widget foot -->
                                                                            <div class="widget-foot">
                                                                                <div class="pull-right">
                                                                                    <!-- Buttons -->
                                                                                    <button type="submit" class="btn btn-default btn-xs" id="btn1">Continuar</button> </form>
                                                                                    
                                                                                </div>
                                                                                <div class="clearfix"></div>
                                                                            </div>
                                
                                                                        </div>
                                                                        <div class="widget" id="stp2" style="display:none;">
                                
                                                                            <!-- Widget head -->
                                                                            <div class="widget-head">
                                                                                <h5>Detalles del Colegio</h5>	
                                                                            </div>
                                
                                                                            <!-- Widget body --><form id="forma2" action="query.php?func=ncolegiop2" method="POST">
                                                                            <div class="widget-body">
                                                                                  <strong>Niveles<b id="echoe"></b></strong>
                                                                                  <div class="check-box">
                                                                                  <input type="text" name="col_id" id="newbox" style="display:none;"></input>
                                                                                     <label><input type="hidden" name="col_niv_1" value="0" /><input type="checkbox" name="col_niv_1" value="1"> Preescolar</label>
                                                                                  </div>
                                                                                  <div class="check-box">
                                                                                     <label><input type="hidden" name="col_niv_2" value="0" /><input type="checkbox" name="col_niv_2" value="1"> Primaria</label>
                                                                                  </div>
                                                                                  <div class="check-box">
                                                                                     <label><input type="hidden" name="col_niv_3" value="0" /><input type="checkbox" name="col_niv_3" value="1"> Secundaria</label>
                                                                                  </div>
                                                                                  <div class="check-box">
                                                                                     <label><input type="hidden" name="col_niv_4" value="0" /><input type="checkbox" name="col_niv_4" value="1"> Bachillerato</label>
                                                                                  </div>
                                                                                  <div class="check-box">
                                                                                     <label><input type="hidden" name="col_niv_5" value="0" /><input type="checkbox" name="col_niv_4" value="1"> Universidad</label>
                                                                                  </div>
                                
                                                                                   <hr>
                                                                                  
                                                                                   
                                                                                   <strong>Director</strong><br>
                                                                                   <a class="btn btn-success" id="ad2" data-toggle="modal" data-target="#add2">Añadir Nuevo</a>
                                                                                   
                                                                                   
                                                                                   <hr>
                                      
                                                                            </div>
                                
                                                                            <!-- Widget foot -->
                                                                            <div class="widget-foot">
                                                                                <button type="submit" class="btn btn-info btn-xs">Guardar</button></form>
                                                                            </div>
                                
                                                                        </div>
                                                                        <div class="widget" id="stperr" style="display:none;">
                                
                                                                            <!-- Widget head -->
                                                                            <h1>Error al crear colegio</h1>
                                
                                
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
						<div class="col-md-2">
                        </div>
				</div>
				
					
				</div>
				<!-- Black block ends -->
				
			
				
				<!-- Content starts -->
                
				
				<!-- Content ends -->				
			   
            </div>
            <!-- Mainbar ends -->
            
            <div class="clearfix"></div>
         </div>
      </div>
      <div class="modal" id="add2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Agregar Usuario</h4>
      </div>
      <div class="modal-body">
        <form id="adduser2">
        <label>Nombres</label><br/>
        <input class="form-control" name="u_nombres" onblur="this.value=this.value.toUpperCase()" autofocus><br/>
        <label>Apellidos</label><br/>
        <input class="form-control" name="u_apellidos" onblur="this.value=this.value.toUpperCase()"><br/>
        <label>Genero</label><br/>
        <input class="form-control" style=" display:none;" name="u_rango" value="4" />
        <input class="form-control" style=" display:none;" id="u_insti" name="u_institucion"/>
        <select style="width:49%; margin-top:5px;" name="u_genero" class="form-control">
  <option value="M">Masculino</option>
  <option value="F">Femenino</option>                                       </select><br/>
        <label>Teléfonos</label><br/>
        <div class="input-group">
          <input type="text" name="u_tel1" class="form-control" placeholder="(000)-000-00-00" style="width:33.33333333%;">
          <input type="text" name="u_tel2" class="form-control" placeholder="(000)-000-00-00" style="width:33.33333333%;">
          <input type="text" name="u_tel3" class="form-control" placeholder="(000)-000-00-00" style="width:33.33333333%;">
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
    <?php } ?>
<!-- (Dashboard Apoderado) !-->

	<?php if ($sesion['u_rango']==4){?>
				<!-- Page heading ends -->
				<style>
					#menu1{
					
						background:auto;	
						
					}
				</style>
				<?php 
$query = "SELECT c.*,ci.*,cd.*,uc.*,u.*,ui.* FROM colegios c INNER JOIN contactos ci INNER JOIN direcciones cd INNER JOIN usuarios_datos_apoderados uc INNER JOIN usuarios u INNER JOIN usuarios_instituciones ui ON ci.con_id = c.col_contacto AND cd.dir_id = c.col_direccion AND c.col_id = ui.ui_institucion AND u.u_id = ui.ui_usuario AND u.u_rango = 4 WHERE ui.ui_usuario ='".$sesion['u_id']."'";  ?>
				
				<?php include("instituciones/colegio.php");?>			
				<?php if(!$_GET['id']){
				 ?>
				<script>document.location = "?type=info&id=<?php echo $col_id;?>&tab=1"</script>
				<?php	
}?>
<!-- (Dashboard Director) !-->
	<?php } if ($sesion['u_rango']==5){?>
    			<!-- Page heading ends -->
				<style>
					#menu1{
					
						background:auto;	
						
					}
				</style>
				<?php 
$query = "SELECT c.*,ci.*,cd.*,uc.*,u.*,ui.* FROM colegios c INNER JOIN contactos ci INNER JOIN direcciones cd INNER JOIN usuarios_datos_apoderados uc INNER JOIN usuarios u INNER JOIN usuarios_instituciones ui ON ci.con_id = c.col_contacto AND cd.dir_id = c.col_direccion AND c.col_id = ui.ui_institucion AND u.u_id = ui.ui_usuario AND u.u_rango = 5 WHERE ui.ui_usuario ='".$sesion['u_id']."'";  ?>
				
				<?php include("instituciones/colegio.php");?>			
				<?php if(!$_GET['id']){
				 ?>
				<script>document.location = "?type=info&id=<?php echo $col_id;?>&tab=1"</script>
				<?php	
}?>
    <?php } ?>
<!-- (Dashboard Administrativo) !-->
	<?php if ($sesion['u_rango']==6){?>
    			<div class="page-head" style="border-left:solid 1px #CCC;">
					<div class="container">
						<div class="row">
							<!-- Page heading -->
							<div class="col-md-3 col-sm-6 col-xs-6">
								<h2><i class="fa fa-desktop"></i> <?php echo $TPAG;?></h2>
							</div>
							<!-- Mini status -->
						</div>
					</div>
				</div>
				<!-- Page heading ends -->
				<style>
					#menu1{
					
						background:auto;	
						
					}
				</style>
				
				
				<!-- Black block starts -->
				<div class="blue-block" style="border-left:solid 1px #CCC;">
				
										
					<div class="row">
						<div class="col-md-7">
							
							<h3 style="color:#FFF;">Mi Avance</h3><hr style="color:#FFF;"/>
                                             <div class="chart-container">
                                                <div id="bar-chart" class="chart-placeholder"></div>
                                             </div>
										
										
                             
							
							
							
						</div>
						<div class="col-md-5">
							
							
							
							<!-- Knob Block -->
							
							<div class="blue-knob-block" style="background-image:url(../img/niveles/nk.png) !important; background-size:cover;">
                            <h5 style="margin-top:0px; margin-left:10px; padding-top:7px;">Mi Nivel</h5>
								<ul class="list-inline list-unstyled">
									<li>
											<!-- jQuery Knob -->
											<input type="text" value="5" disabled="disabled" class="knob" data-bgcolor="#47d26b" data-fgcolor="#5be47f" data-width="95" data-height="85" data-min="0" data-max="20" data-step="1" data-angleOffset="-125" data-angleArc="250"><br/>
											<span class="label label-success">Libro 5 de 20</span>
											<h6>Nivel K</h6>
									</li>
                                    <li>
                                            <p>Trazo de líneas, Comparación de figuras.</p>
									</li>
								</ul>
							</div>
							<div class="blue-knob-block" style="background-image:url(../img/niveles/n1.png) !important; background-size:cover;">
                            <h5 style="margin-top:0px; margin-left:10px; padding-top:7px;">Siguiente Nivel</h5>
								<ul class="list-inline list-unstyled">
									<li>
											<!-- jQuery Knob -->
											
											<span class="label label-success">20 Libros</span>
											<h6>Nivel 1</h6>
									</li>
                                    <li>
                                            <p>Trazo y representación de números del 1 al 10</p>
									</li>
								</ul>
							</div>
						</div>
                        
					</div>
					
					<!-- Map block -->
					<div class="map-block">
						
						
					</div>
					
				</div>
				<!-- Black block ends -->
				
			
				
				<!-- Content starts -->
				
				<div class="container" style="border-left:1px solid #CCC; margin-top:-5px;">
				
					<div class="row">
					
						
						<div class="col-md-4">
							<!-- OS widget -->
							<div class="widget projects-widget">

								<!-- Widget head -->
								<div class="widget-head">
									<h5 class="pull-left"><i class="fa fa-desktop"></i> Mis Libros</h5>	
									<div class="widget-head-btns pull-right">
										<a href="index.html#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
										<a href="index.html#" class="wclose"><i class="fa fa-remove"></i></a>
									</div>
									<div class="clearfix"></div>
								</div>

								<!-- Widget body -->
								<div class="widget-body no-padd" style="text-align:center; padding-bottom:20px; height:auto;"><br />
                                    <img src="../img/libros/nivk.jpg" class="libro actual" style="margin:10px;"/>
									<img src="../img/libros/niv1.jpg" class="libro" style="margin:10px;"/>
									<img src="../img/libros/niv2.jpg" class="libro" style="margin:10px;"/>
								</div>

								<!-- Widget foot -->
								<div class="widget-foot">
								</div>

							</div>
						</div>

						<div class="col-md-8">
							<!-- File Upload Widget -->
							<div class="widget file-upload-widget">

								<!-- Widget head -->
								<div class="widget-head">
									<h5 class="pull-left"> Avance de libros</h5>	<br />
									<div class="chart-container">
                                                <div id="bar2-chart2" class="chart-placeholder"></div>
                                             </div>
									<div class="clearfix"></div>
								</div>

								

								<!-- Widget foot -->
								<div class="widget-foot">
									
								</div>

							</div>
						</div>						
						
						
						
					
					</div>
					
					
					<div class="row">
						
						<div class="col-md-12">
						
							<!-- Chat Widget starts -->							
							<div class="widget chat-widget">

								<!-- Widget head -->
								<div class="widget-head">
									<h5 class="pull-left"><i class="fa fa-comments"></i> Mensajes Recibidos</h5>
									<div class="widget-head-btns pull-right">
										
									</div>
									<div class="clearfix"></div>
								</div>

								<!-- Widget body -->
								<div class="widget-body 300-scroll">
									<ul class="list-unstyled">

									  <!-- Chat by us. Use the class "by-me". -->
									  <li class="by-other">
										<!-- Use the class "pull-left" in avatar -->
										<div class="avatar pull-right ">
										  <img src="img/user.jpg" alt=""/>
										</div>

										<div class="chat-content">
										  <!-- In meta area, first include "name" and then "time" -->
										  <div class="chat-meta">Tutor <span class="pull-right">3 horas atrás</span></div>
										  Gran avance, muy bien, y para arriba
										  <div class="clearfix"></div>
										</div>
									  </li> 

									  <!-- Chat by other. Use the class "by-other". -->
									  <li class="by-other">
										<!-- Use the class "pull-right" in avatar -->
										<div class="avatar pull-right">
										  <img src="img/user2.jpg" alt=""/>
										</div>

										<div class="chat-content">
										  <!-- In the chat meta, first include "time" then "name" -->
										 <div class="chat-meta">Tutor <span class="pull-right">49 horas atrás</span></div>
										  Sigue Así
										  <div class="clearfix"></div>
										</div>
									  </li>   

									</ul>
								</div>

							</div>
							<!-- Chat widget ends -->
							
						</div>
						
						
					</div>
					
					
					
				</div>
				
				<!-- Content ends -->				
			   
            </div>
            <!-- Mainbar ends -->
            
            <div class="clearfix"></div>
         </div>
      </div>
    <?php } ?>
<!-- (Dashboard Admin) !-->
	<?php if ($sesion['u_rango']==7){?>
				<!-- Page heading ends -->
				<style>
					#menu1{
					
						background:auto;	
						
					}
				</style>
				
				
				<!-- Black block starts -->
				<div class="blue-block" style="border-left:solid 1px #CCC; height:700px;">
				
										
					<div class="row">
						<div class="col-md-2">
                        </div>
						<div class="col-md-8">
							<h1 style="color:#FFF; text-align:center;" >Bienvenid<?php if($my_gender=="F"){ echo "a"; }else{ echo "o"; }?>, <?php echo $my_nombre;?></h1>
							<h3 style="color:#FFF; text-align:center;font-weight:500;" ><b style="font-weight:600;">Estadísticas</b> del sitio.</h3>
                                           <div class="container" style="margin-top:70px;">
                                           		<div class="row" style="text-align:center;">
                                                  <div class="col-xs-3 col-md-3">
                                                   
                                                      <div class="bubble c1" style=" margin-left: auto;
    margin-right: auto; 
margin-top: -49px; font-size:16px;"><i class="fa fa-building"></i> 
	<?php 
	$colegios = mysql_query("SELECT COUNT(*) c FROM colegios");
	$franquicias = mysql_query("SELECT COUNT(*) c FROM franquicias");
$c_row = mysql_fetch_assoc($colegios);
$f_row = mysql_fetch_assoc($franquicias);
echo $c_row['c']+$f_row['c']; //Here is your count?></div><p style="margin-top:30px; color:#FFF; font-size:16px;">Instituciones</p>
                                                  </div>
                                                  <div class="col-xs-3 col-md-3">
                                                   
                                                      <div class="bubble c2" style=" margin-left: auto;
    margin-right: auto; 
margin-top: -49px; font-size:16px;"><i class="fa fa-group"></i> <?php $grupos = mysql_query("SELECT COUNT(*) c FROM grupos");
$g_row = mysql_fetch_assoc($grupos); echo $g_row['c']-$f_row['c'];?></div><p style="margin-top:30px; color:#FFF; font-size:16px;">Grupos</p>
                                                   
                                                  </div><div class="col-xs-3 col-md-3">
                                                   
                                                      <div class="bubble c3" style=" margin-left: auto;
    margin-right: auto; 
margin-top: -49px; font-size:16px;"><i class="fa fa-suitcase"></i> <?php $usuarios = mysql_query("SELECT COUNT(*) c FROM usuarios WHERE u_rango = 2 AND u_activo != 0");
$u_row = mysql_fetch_assoc($usuarios); echo $u_row['c'];?></div><p style="margin-top:30px; color:#FFF; font-size:16px;">Profesores</p>
                                                   
                                                  </div><div class="col-xs-3 col-md-3">
                                                   
                                                      <div class="bubble c4" style=" margin-left: auto;
    margin-right: auto;  
margin-top: -49px; font-size:16px;"><i class="fa fa-user"></i> <?php $alumnos = mysql_query("SELECT COUNT(*) c FROM usuarios WHERE u_rango = 1 AND u_activo != 0");
$a_row = mysql_fetch_assoc($alumnos); echo $a_row['c'];?></div><p style="margin-top:30px; color:#FFF; font-size:16px;">Alumnos</p>
                                                   
                                                  </div>
                                                </div>
                                           </div>
                                           
										
										
                             
							
							
							
						</div>
                        	
                                           </div>
						<div class="col-md-2">
                        </div>
				</div>
					
					<!-- Map block -->
					<div class="map-block" style="margin-bottom:200px;">
						
						
					</div>
					
				</div>
				<!-- Black block ends -->
				
			
				
				<!-- Content starts -->
                
				
				<!-- Content ends -->				
			   
            </div>
            <!-- Mainbar ends -->
            
            <div class="clearfix"></div>
         </div>
      </div>
    <?php } ?>
<!-- (Dashboard Global) !-->
	<?php if ($sesion['u_rango']==8){?>
				<!-- Page heading ends -->
				<style>
					#menu1{
					
						background:auto;	
						
					}
				</style>
				
				
				<!-- Black block starts -->
				<div class="blue-block" style="border-left:solid 1px #CCC;">
				
										
					<div class="row">
						<div class="col-md-2">
                        </div>
						<div class="col-md-8">
							<h1 style="color:#FFF; text-align:center;" >Bienvenid<?php if($my_gender=="F"){ echo "a"; }else{ echo "o"; }?>, <?php echo $my_nombre;?></h1>
							<h3 style="color:#FFF; text-align:center;font-weight:500;" ><b style="font-weight:600;">Estadísticas</b> del sitio.</h3>
                                           <div class="container" style="margin-top:70px;">
                                           		<div class="row" style="text-align:center;">
                                                  <div class="col-xs-3 col-md-3">
                                                   
                                                      <div class="bubble c2" style=" margin-left: auto;
    margin-right: auto; "><i class="fa fa-group"></i> <?php $grupos = mysql_query("SELECT COUNT(*) c FROM grupos");
$g_row = mysql_fetch_assoc($grupos); echo $g_row['c'];?></div>
                                                   
                                                  </div><div class="col-xs-3 col-md-3">
                                                   
                                                      <div class="bubble c3" style=" margin-left: auto;
    margin-right: auto; "><i class="fa fa-suitcase"></i> <?php $usuarios = mysql_query("SELECT COUNT(*) c FROM usuarios WHERE u_rango = 2 AND u_activo != 0");
$u_row = mysql_fetch_assoc($usuarios); echo $u_row['c'];?></div>
                                                   
                                                  </div><div class="col-xs-3 col-md-3">
                                                   
                                                      <div class="bubble c4" style=" margin-left: auto;
    margin-right: auto; "><i class="fa fa-user"></i> <?php $alumnos = mysql_query("SELECT COUNT(*) c FROM usuarios WHERE u_rango = 1 AND u_activo != 0");
$a_row = mysql_fetch_assoc($alumnos); echo $a_row['c'];?></div>
                                                   
                                                  </div>
                                                </div>
                                           </div>
										
										
                             
							
							
							
						</div>
						<div class="col-md-2">
                        </div>
				</div>
                <div class="row" style="margin-top:100px;">
                	
						<div class="col-md-2">
                        </div>
                        
						<div class="col-md-8">
                        
							
							
							<!-- Knob Block -->
							
							<div class="blue-knob-block">
                            <h5 style="margin-top:0px; margin-left:10px; padding-top:7px;">Crecimiento semanal (Usuarios)</h5>
                            	<div class="chart-container">
                                	<div id="bar-chart" class="chart-placeholder">
                                    </div>
                                </div>
							</div>
							
						</div>
                        
						<div class="col-md-2">
                        </div>
                        
					</div>
					
					<!-- Map block -->
					<div class="map-block">
						
						
					</div>
					
				</div>
				<!-- Black block ends -->
				
			
				
				<!-- Content starts -->
				
				<div class="container" style="border-left:1px solid #CCC; margin-top:-5px;">
				
					<div class="row">
					
						
						<div class="col-md-4">
							<!-- OS widget -->
							<div class="widget projects-widget">

								<!-- Widget head -->
								<div class="widget-head">
									<h5 class="pull-left"><i class="fa fa-desktop"></i> Mis Libros</h5>	
									<div class="widget-head-btns pull-right">
										<a href="index.html#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
										<a href="index.html#" class="wclose"><i class="fa fa-remove"></i></a>
									</div>
									<div class="clearfix"></div>
								</div>

								<!-- Widget body -->
								<div class="widget-body no-padd" style="text-align:center; padding-bottom:20px; height:auto;"><br />
                                    <img src="../img/libros/nivk.jpg" class="libro actual" style="margin:10px;"/>
									<img src="../img/libros/niv1.jpg" class="libro" style="margin:10px;"/>
									<img src="../img/libros/niv2.jpg" class="libro" style="margin:10px;"/>
								</div>

								<!-- Widget foot -->
								<div class="widget-foot">
								</div>

							</div>
						</div>

						<div class="col-md-8">
							<!-- File Upload Widget -->
							<div class="widget file-upload-widget">

								<!-- Widget head -->
								<div class="widget-head">
									<h5 class="pull-left"> Avance de libros</h5>	<br />
									<div class="chart-container">
                                                <div id="bar2-chart2" class="chart-placeholder"></div>
                                             </div>
									<div class="clearfix"></div>
								</div>

								

								<!-- Widget foot -->
								<div class="widget-foot">
									
								</div>

							</div>
						</div>						
						
						
						
					
					</div>
					
					
					<div class="row">
						
						<div class="col-md-12">
						
						</div>
						
						
					</div>
					
					
					
				</div>
				
				<!-- Content ends -->				
			   
            </div>
            <!-- Mainbar ends -->
            
            <div class="clearfix"></div>
         </div>
      </div>
    <?php } ?>
    
      
<?php include("inc/footer.php");?>

      <?php 
      echo $final;?>
<?php if ($sesion['u_rango']==1){?>  
      
<script>

$(function() {
    $(".dial").knob();
});

new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'avance',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
  <?php 
	$nivel=mysql_query("SELECT n_id,al_fecha FROM alumnos_libros a inner join libros l inner join niveles n ON a.al_libro_actual = l.l_id AND a.al_alumno = '".$sesion['u_id']."' AND l.l_nivel = n.n_id");
	  $cueri = array();
	  $check_num_rows=mysql_num_rows($nivel);
       while ($celda = mysql_fetch_assoc($nivel))
     {
		   $cueri[]=$celda;
		   
         
      } foreach($cueri as $valor){
			  $dato1 = $valor;
			  $dato11 = $dato1['n_id'];
			  $dato12 = $dato1['al_fecha'];
			  $fechadatos = explode('-', $dato12);
			  $mes = $fechadatos['1']-1;
			  $meses[] = $mes;
			  $datos[] = $dato11;
			  
			  $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
			$monthName = $meses[$mes];
			  if($valor==end($cueri)){$final ="";}else{$final =",";}
			  if($fechadatos['2']!= date('Y')){
				  if(date('m') == '01'){
				echo "{ month: '".$monthName."', value: ".$dato11." },";
				  }else{
					  
				  }
				}else{
				echo "{ month: '".$monthName."', value: ".$dato11." },";
			  }
		   }
	
	?>
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
  labels: ['<?php if(date('m')==01){ echo date('Y')-1; }else{}?>  Nivel'],
  gridIntegers: true,
  ymin: 0
});
new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'niveles',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
  <?php 
	$g_avance =mysql_query("SELECT * FROM alumnos_libros WHERE al_alumno = '".$sesion['u_id']."'");
	  
	  $c_avance=mysql_num_rows($g_avance);
       while ($r_avance = mysql_fetch_assoc($g_avance))
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
			  if($sfechadatos['2']!= date('Y')){}else{
				echo "{ month: '".$smonthName."', value: ".$sdato11." },";
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
</script>
      <?php }
	  ?>
      <?php 
							$dgethw = mysql_query("SELECT * FROM tareas");
							while ($dresult = mysql_fetch_assoc($dgethw)){
							   if($dresult){ $dtareas[] = $dresult; }
							}
							foreach($dtareas as $dtarea){
								 $dgrupo = explode(",", $dtarea['t_para']); 
								 if(in_array($aludata['ad_grupo'],$dgrupo)){
									?>
                                 <form style="display:none;" id="<?php echo $dtarea['t_id'];?>send">
                                 	<input name="me" value="<?php echo $my_id;?>"/>
                                 	<input name="hw" value="<?php echo $dtarea['t_id'];?>"/>
                                 </form>
								 <script>
								 // this is the id of the form
									$("#<?php echo $dtarea['t_id']?>done").click(function() {
									
										var url = "query.php?func=donehw";
									
										$.ajax({
											   type: "POST",
											   url: url,
											   data: $("#<?php echo $dtarea['t_id']?>send").serialize(), 
											   
											   success: function(data)
											   {
												   $( "#<?php echo $dtarea['t_id']?>btn" ).removeClass("fa-circle-o");												   $( "#<?php echo $dtarea['t_id']?>btn" ).addClass("fa-check-circle");
												   $( "#<?php echo $dtarea['t_id']?>done" ).attr("id","unusable");
												   $( "#<?php echo $dtarea['t_id']?>done" ).addClass("clicked");
											   }
											 });
									
										return false; // avoid to execute the actual submit of the form.
									});
								 </script> 
								  <?php
								  }}
							?>
                            <?php 
							$sgethw = mysql_query("SELECT * FROM tareas WHERE t_maestro = '".$sesion['u_id']."' ORDER BY t_id DESC");
							while ($sresult = mysql_fetch_assoc($sgethw)){
							   if($sresult){ $stareas[] = $sresult; }
							}
							foreach($stareas as $starea){
								  
                        ?>                
                                  <script>
								  $("#pop<?php echo $starea['t_id'];?>").popover({
									html: true,
									placement: 'bottom', 
									  callback: function() { 
										$('#dates<?php echo $starea['t_id'];?>').datetimepicker(); 
									  } 
    								});

								  </script>  
                                  <script>
								  $("#popi<?php echo $starea['t_id'];?>").popover({
									html: true,
									placement: 'bottom', 
									  callback: function() { 
										$('#dates<?php echo $starea['t_id'];?>').datetimepicker(); 
									  } 
    								});

								  </script>    
 				 <script>
               $(function () { $("#dates<?php echo $starea['t_id'];?>").datetimepicker({
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
$("#grupos").click(function() {
	 window.location = "?tab=2&view=1";
});
$("#maestros").click(function() {
	 window.location = "?tab=2&view=2";
});
</script>
								  <?php
								  }
							?>
                      <?php if($sesion['u_rango']){
						  ?>
						  <script>
						  $("#forma1").submit(function() {

    var url = "query.php?func=ncolegio"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#forma1").serialize(), // serializes the form's elements.
           success: function(data)
           {
			   
			   
			   $data = data;
			    if($data){
					  $("#stp1").css("display","none");
					  $("#stp2").css("display","block");
				}
				if($data==null) {
					$("#stperr").css("display","block");
					  $("#stp1").css("display","none");
				}
				$("#newbox").val(data);
				$("#u_insti").val(data);
           }
         });

    return false; // avoid to execute the actual submit of the form.
});
$("#adduser2").submit(function() {

    var url = "query.php?func=nusuario&type=coladmin"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#adduser2").serialize(), // serializes the form's elements.
           success: function(data)
           {
			   $('#ad2').addClass("disabled");
			   
			   $( "#add2" ).addClass( "invisible" );
			   $( ".modal-backdrop" ).removeClass( "in" );
			   $( ".modal-backdrop" ).css( "display", "none" );
           }
         });

    return false; // avoid to execute the actual submit of the form.
});
 
						  </script>
                          
<script>
$("#grupos").click(function() {
	 window.location = "?type=info&id=<?php echo $_GET['id'];?>&tab=2&view=1";
});
$("#maestros").click(function() {
	 window.location = "?type=info&id=<?php echo $_GET['id'];?>&tab=2&view=2";
});
</script>
						  <?php
						  }?>
	</body>	
</html>

<?php 

if(date("m")==01){
	?><script>
	$(document).ready(function(){
			setTimeout(function(){
			alert("En Febrero las gráficas del año anterior se guardarán en el historial, para dar espacio a los avances de este año, <?php echo date("Y");?>");
			}, 1000);
			
		});
	</script><?php
}
?> 
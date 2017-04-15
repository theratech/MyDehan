<?php $aludata = $_SESSION['aldata'];?>
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
										$q_eventos = mysqli_query($D,"SELECT * FROM eventos");
										$c_eventos = mysqli_num_rows($q_eventos);
										while($r_eventos = mysqli_fetch_array($q_eventos,MYSQLI_ASSOC)){
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
										$q_eventos = mysqli_query($D,"SELECT * FROM eventos");
										$c_eventos = mysqli_num_rows($q_eventos);
										while($r_eventos = mysqli_fetch_array($q_eventos,MYSQLI_ASSOC)){
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
							$gethw = mysqli_query($D,"SELECT * FROM tareas");
							while ($result = mysqli_fetch_array($gethw,MYSQLI_ASSOC)){
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
                                       <a><i class="fa fa-user"></i> <?php 

                                       $mfavq = mysqli_query($D,"SELECT * FROM usuarios WHERE u_id = '".$tarea['t_maestro']."'");

                                       $maestrofav = mysqli_fetch_array($mfavq,MYSQLI_ASSOC);

                                       $nombres = explode(" ",$maestrofav['u_nombres']);$apellidos = explode(" ",$maestrofav['u_apellidos']); echo $nombres[0]." ".$apellidos[0];

                                       ?></a>
                                       <?php if($tarea['t_adjunto']!="none"){?><a style="opacity:0;"><i class="fa fa-circle-o"></i></a><a target="_blank" href="files/<?php echo $tarea['t_adjunto'];?>"><i class="fa fa-download"></i> Adjunto</a><?php }?>
                                       <a style="opacity:0;"><i class="fa fa-circle-o"></i></a>
                                       <?php 
									   $get = mysqli_query($D,"SELECT tv_tarea FROM tareas_vistas WHERE tv_alumno = '".$sesion['u_id']."' AND tv_tarea = '".$tarea['t_id']."'");
									   $countget = mysqli_num_rows($get);
									   $gets = mysqli_fetch_array($get,MYSQLI_ASSOC);?>
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
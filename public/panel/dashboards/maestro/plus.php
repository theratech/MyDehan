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
							$gethw = mysqli_query($D,"SELECT * FROM tareas WHERE t_maestro = '".$sesion['u_id']."' ORDER BY t_id DESC");
							while ($result = mysqli_fetch_array($gethw,MYSQLI_ASSOC)){
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
									   $get = mysqli_query($D,"SELECT COUNT(tv_id) c FROM tareas_vistas WHERE tv_tarea = '".$tarea['t_id']."'");
									   $gets = mysqli_fetch_array($get,MYSQLI_ASSOC);
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
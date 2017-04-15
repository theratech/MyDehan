				<div class="blue-block" style="border-left:solid 1px #CCC;">
				
					<div class="row">
                    	<div class="col-md-12">
							<h3 style="color:#FFF;">Avance por nivel</h3><hr style="color:#FFF;"/>
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
                          			 <p style="margin-left:80px;">
                                     	<b>Básico:</b> <?php echo $aldata['n_basico'];?>
                                        <br/>
                                        <b>Critical:</b> <?php echo $aldata['n_critical'];?>
                                     </p>
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
                                			
                                	<?php if($aldata['n_nombre']=='K'){}else{?><img src="../img/libros/<?php echo $aldata['n_nombre']-1;?>.jpg" class="libro" style="margin:10px; opacity:0.8;
border: solid 2px #AECD89;"/><?php }?>
									<img src="../img/libros/<?php if($aldata['n_nombre']=='K'){echo "0";}else{echo $aldata['n_nombre']; }?>.jpg" class="libro actual" style="margin:10px;
border: solid 5px #4196CF;"/>
									<img src="../img/libros/<?php echo $aldata['n_nombre']+1;?>.jpg" class="libro" style="margin:10px; opacity:0.4;"/>
                                			
                                  
								</div>

								
                                
							</div>
						</div>
                        
						<div class="col-sm-0 col-md-1 col-lg-3">
                        </div>
					
					</div>
                    <?php 
					$ifim = mysqli_query($D,"SELECT * FROM franquicias WHERE fra_id = '".$aldata['ad_grupo']."'");
					$resifim = mysqli_fetch_array($ifim,MYSQLI_ASSOC);
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
									$qu_asist = mysqli_query($D,"SELECT * FROM sys_asistencia WHERE as_usuario = '".$aldata['u_id']."' AND as_id_fra = '".$aldata['ad_grupo']."'");		
									while($res_asist = mysqli_fetch_array($qu_asist,MYSQLI_ASSOC)){
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
									$qu_myas = mysqli_query($D,"SELECT * FROM dehan.sys_asistencia WHERE as_fecha LIKE '".$abuscar."' AND as_usuario = '".$aldata['u_id']."';");		
									while($res_myas = mysqli_fetch_array($qu_myas,MYSQLI_ASSOC)){
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
      
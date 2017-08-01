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
    margin-right: auto; "><i class="fa fa-group"></i> <?php $grupos = mysqli_query($D,"SELECT COUNT(*) c FROM grupos");
$g_row = mysqli_fetch_array($grupos,MYSQLI_ASSOC); echo $g_row['c'];?></div>
                                                   
                                                  </div><div class="col-xs-3 col-md-3">
                                                   
                                                      <div class="bubble c3" style=" margin-left: auto;
    margin-right: auto; "><i class="fa fa-suitcase"></i> <?php $usuarios = mysqli_query($D,"SELECT COUNT(*) c FROM usuarios WHERE u_rango = 2 AND u_activo != 0");
$u_row = mysqli_fetch_array($usuarios,MYSQLI_ASSOC); echo $u_row['c'];?></div>
                                                   
                                                  </div><div class="col-xs-3 col-md-3">
                                                   
                                                      <div class="bubble c4" style=" margin-left: auto;
    margin-right: auto; "><i class="fa fa-user"></i> <?php $alumnos = mysqli_query($D,"SELECT COUNT(*) c FROM usuarios WHERE u_rango = 1 AND u_activo != 0");
$a_row = mysqli_fetch_array($alumnos,MYSQLI_ASSOC); echo $a_row['c'];?></div>
                                                   
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
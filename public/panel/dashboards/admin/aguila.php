<!-- Page heading ends -->
				<style>
					#menu1{
					
						background:auto;	
						
					}
				</style>
				
				
				<!-- Black block starts -->
				<div class="blue-block" style="border-left:solid 1px #CCC; height:100vh;">
				
										
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
	$colegios = mysqli_query($D,"SELECT COUNT(*) c FROM colegios");
	$franquicias = mysqli_query($D,"SELECT COUNT(*) c FROM franquicias");
$c_row = mysqli_fetch_array($colegios,MYSQLI_ASSOC);
$f_row = mysqli_fetch_array($franquicias,MYSQLI_ASSOC);
echo $c_row['c']+$f_row['c']; //Here is your count?></div><p style="margin-top:30px; color:#FFF; font-size:16px;">Instituciones</p>
                                                  </div>
                                                  <div class="col-xs-3 col-md-3">
                                                   
                                                      <div class="bubble c2" style=" margin-left: auto;
    margin-right: auto; 
margin-top: -49px; font-size:16px;"><i class="fa fa-group"></i> <?php $grupos = mysqli_query($D,"SELECT COUNT(*) c FROM grupos");
$g_row = mysqli_fetch_array($grupos,MYSQLI_ASSOC); echo $g_row['c']-$f_row['c'];?></div><p style="margin-top:30px; color:#FFF; font-size:16px;">Grupos</p>
                                                   
                                                  </div><div class="col-xs-3 col-md-3">
                                                   
                                                      <div class="bubble c3" style=" margin-left: auto;
    margin-right: auto; 
margin-top: -49px; font-size:16px;"><i class="fa fa-suitcase"></i> <?php $usuarios = mysqli_query($D,"SELECT COUNT(*) c FROM usuarios WHERE u_rango = 2 AND u_activo != 0");
$u_row = mysqli_fetch_array($usuarios,MYSQLI_ASSOC); echo $u_row['c'];?></div><p style="margin-top:30px; color:#FFF; font-size:16px;">Profesores</p>
                                                   
                                                  </div><div class="col-xs-3 col-md-3">
                                                   
                                                      <div class="bubble c4" style=" margin-left: auto;
    margin-right: auto;  
margin-top: -49px; font-size:16px;"><i class="fa fa-user"></i> <?php $alumnos = mysqli_query($D,"SELECT COUNT(*) c FROM usuarios WHERE u_rango = 1 AND u_activo != 0");
$a_row = mysqli_fetch_array($alumnos,MYSQLI_ASSOC); echo $a_row['c'];?></div><p style="margin-top:30px; color:#FFF; font-size:16px;">Alumnos</p>
                                                   
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

<!-- Page heading ends -->
				<style>
					#menu1{
					
						background:auto;	
						
					}
				</style>
				
				
				<!-- Black block starts -->
				<div class="blue-block" style="border-left:solid 1px #CCC; min-height:75px;">
				
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
                    	<div id="tabla1" style="margin-top:25px; <?php if($_GET['view']==2){ echo "display:block;"; }else{}?>">
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
										 
											 $query_gr = "SELECT * FROM grupos g INNER JOIN grupos_maestros gm INNER JOIN colegios_niveles cn INNER JOIN niveles_escolares ne ON g.g_nivel = cn.cn_id AND cn.cn_nivel = ne.ne_id AND gm.gm_grupo = g.g_id WHERE gm.gm_maestro = '".$sesion['u_id']."' ORDER BY ne.ne_id,g.g_nombre";
											 
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
                                                  <input type="text" style="display:none;" class="gr-id1" value="<?php echo $gr_id;?>" />
                                                  <td><a style="color:#06F;" href="ins_alumnos.php?type=grupoview&id=<?php echo $gr_id;?>"><b><?php echo $ne_nombre." ".$gr_nombre;?><?php if($gr_nick){ echo " (".$gr_nick.")";} ?></b></a></td>
                                                  <td><?php 
                                                  $gtutor = mysqli_query($D,"SELECT * FROM usuarios inner join usuarios_maestros inner join grupos_maestros ON grupos_maestros.gm_maestro = usuarios_maestros.um_grupo  AND usuarios_maestros.um_usuario_id = usuarios.u_id WHERE grupos_maestros.gm_grupo = ".$gr_id."");
                                                  $gr_tutor = mysqli_fetch_array($gtutor,MYSQLI_ASSOC); 
                                                  echo $gr_repres = $gr_tutor['u_nombres']." ".$gr_tutor['u_apellidos']; ?></td>
                                                  <td><span class="label label-warning"><?php $a_alumnos = mysqli_fetch_array($nalumnos = mysqli_query($D,"SELECT COUNT(ad_id) FROM alumnos_datos WHERE alumnos_datos.ad_grupo = '".$gr_id."'"),MYSQLI_ASSOC); echo $gr_alumnos = $a_alumnos['COUNT(ad_id)']; ?> Alumno<?php if ($gr_alumnos != 1){?>s<?php }?></span></td>                                                </tr>
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
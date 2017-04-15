<?php
$TPAG = "Inicio";
include("inc/head.php");

?>
	<?php if ($_GET['hw']){?>
    			
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
                                          <h3 style="color:#FFF;">Tareas</h3>
                                          
                                        </div>
                                    </div>
					
				</div>
				<!-- Black block ends -->
				
			
				
				<!-- Content starts -->
				
				<div class="container" style="border-left:1px solid #CCC; margin-top:10px;">
					<div class="row">
                    <div class="col-lg-1 col-md-0">
                    </div>
                    <div class="col-lg-10 col-md-12">
							<!-- OS widget -->
							<div class="widget" style="border-radius:1px; border:none;">

								<!-- Widget head -->
									<h5 class="pull-left" style="font-family:Helvetica Neue, Sans-serif; font-weight:500; padding:30px 0 30px 20px; border-bottom:solid 1px #09F;width: 100%;margin-bottom: 20px;"><a href="?addhw=true"><i class="fa fa-plus"></i> Nueva Tarea</a></h5>	
									

								<!-- Widget body -->
							<div class="widget-body" style="text-align:center; padding-bottom:20px; height:auto;"><br />					<?php 
							$gethw = mysql_query("SELECT * FROM tareas WHERE t_maestro = '".$sesion['u_id']."' ORDER BY t_expiracion DESC");
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
									   if($mixeddate.$mixedtime <= date('Ymd').date('His')-1000000 ){
										   ?>
										   <h5 style="margin-top:20px; text-align:left; font-weight:400;<?php  if($mixeddate.$mixedtime <= date('Ymd').date('His') ){echo "color:#f00;";}?>"> <?php echo $tarea['t_titulo']; ?> (<?php echo $fecha[0].'/'.$fecha[1].'/'.$fecha[2];?>)<?php  if($mixeddate.$mixedtime <= date('Ymd').date('His') ){echo " <i class='fa fa-lock'></i>";}?></h5>
                                       <p style="text-align:left;"> <?php echo $tarea['t_descripcion']; ?></p>
										   <?php }else{ 
									?>
								  
                                        
                                        <h5 style="margin-top:20px; text-align:left; font-weight:400;<?php  if($mixeddate.$mixedtime <= date('Ymd').date('His') ){echo "color:#f00;";}?>"> <?php echo $tarea['t_titulo']; ?> (<?php echo $fecha[0].'/'.$fecha[1].'/'.$fecha[2];?>)<?php  if($mixeddate.$mixedtime <= date('Ymd').date('His') ){echo " <i class='fa fa-lock'></i>";}?></h5>
                                       <p style="text-align:left;"> <?php echo $tarea['t_descripcion']; ?></p>
                                      <div class="buttons"> <a id="pop" href="?edithw=t&id=<?php echo $tarea['t_id']?>"><i class="fa fa-edit"></i> Editar</a> 
                                       <a id="popi<?php echo $tarea['t_id']?>" data-content="<form action='query.php?action=nfechat'>
      <input class='form-control' id='dates<?php echo $tarea['t_id'];?>' type='text' value='<?php echo $tarea['t_expiracion'];?>' name='nfecha' style='display:inline-block; width:80%;'/><button class='btn btn-success input-group-addon' type='submit' style='display:inline-block; width:20%; height:33px;'><i class='fa fa-save'></i></button><input class='form-control' type='text' value='<?php echo $tarea['t_id'];?>' name='id' style='display:none;'/></form>"><i class="fa fa-clock-o"></i> Reasignar</a>
                                       <?php 
									   $get = mysql_query("SELECT COUNT(tv_id) c FROM tareas_vistas WHERE tv_tarea = '".$tarea['t_id']."'");
									   $gets = mysql_fetch_assoc($get);
									   ?><a style="text-decoration:auto;"><i class="fa fa-check"></i> Vista por <?php echo $gets['c'];?></a> <a id="del" href="?lolxD"><i class="fa fa-trash-o"></i> Eliminar</a></div>
                                       <hr style="margin-top:5px; margin-bottom:5px;"/>
								  <?php
								  }}
							?>
                                			
                                  
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
    <?php if ($_GET['addhw']){?>
    			
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
                                          <h3 style="color:#FFF;">Nueva Tarea</h3>
                                          
                                        </div>
                                    </div>
					
				</div>
				<!-- Black block ends -->
				
			
				
				<!-- Content starts -->
				
				<div class="container" style="border-left:1px solid #CCC; margin-top:10px;">
					<div class="row">
                    <div class="col-lg-1 col-md-0">
                    </div>
                    <div class="col-lg-10 col-md-12">
							<!-- OS widget -->
							<div class="widget" style="border-radius:1px; border:none;">
								<!-- Widget head -->
									<h5 class="pull-left" style="font-family:Helvetica Neue, Sans-serif; font-weight:500; padding:30px 0 30px 20px; border-bottom:solid 1px #09F;width: 100%;margin-bottom: 20px;">Tarea <?php if($_GET['nombre']){echo "de ".$_GET['nombre'];}?></h5>	
									

								<!-- Widget body -->
							<div class="widget-body" style="text-align:center; padding-bottom:20px; height:auto;"><br />					
                                        <form action="query.php?func=addtarea" enctype="multipart/form-data" method="POST">
                                        <h3 style="margin-top:20px; text-align:left; font-weight:400;">
                                        Puntos Asignados: <input type="number" name="puntos" style="
    width: 37px;
    border-radius: 50%;
    text-align: center;
    border: none;
    background: #3BEE33;
    color: #FFF;
" value="1" max="100"> Materia:
                                        <select onchange="location = this.options[this.selectedIndex].value;"><option value="?addhw=true">Selecciona Materia</option><?php 
							$q_getmat = "SELECT * FROM materias WHERE mat_mae = '".$sesion['u_id']."'";
							$getmat = mysql_query($q_getmat);
							while ($resultmat = mysql_fetch_assoc($getmat)){
							   if($resultmat){ $materias[] = $resultmat; }
							}
							if($materias){
									
							foreach($materias as $materia){
									?>
								  		<option <?php if($_GET['mat_id']==$materia['mat_id']){ echo "selected";}?> value="?addhw=true&mat_id=<?php echo $materia['mat_id'];?>&nombre=<?php echo $materia['mat_nombre'];?>"><?php echo $materia['mat_nombre'];?></option>
								  <?php
							}}
							?></select></h3>
                                       <p style="text-align:left;"> <textarea placeholder="Descripción de la Tarea" name="contenido" style="border:none; width:100%; height:100px;" ><?php echo $tarea['t_descripcion']; ?></textarea>
                                       </p>
                                       <hr/>
                                       <br/>
                                       <p style="text-align:left;">
                                       <label for="hasta">Fecha de Cierre</label>
                                       <input type="datetime-local" name="hasta" style="border:none;" placeholder="Fecha" />
                                       </p>
                                       <hr/>
                                       <br/>
                                      <input type="text" name="maestro" value="<?php echo $sesion['u_id'];?>" style="display:none;"/><input type="text" name="titulo" value="<?php echo $_GET['nombre'];?>" style="display:none;"/><input type="text" name="materia" value="<?php echo $_GET['mat_id'];?>" style="display:none;"/><input type="text" name="adjuntos" value="none" id="file" style="display:none;"/>
                                      <label for="adj" class="pull-left">Archivo Adjunto</label><br/>
                                       <input class="btn btn-success" type="file" name="adj">
                                       <hr/>
                                       <br/>
                                      <select multiple name="grupos[]" class="selectpicker" data-live-search="true">
                                          	<?php $query_gr = "SELECT * FROM grupos g INNER JOIN materias mat INNER JOIN materias_grupos mg ON g.g_id = mg.mg_grupo AND mg.mg_materia = mat.mat_id WHERE mat.mat_id = ".$_GET['mat_id']."";
											 
$res_gr = mysql_query($query_gr);
									
									if($res_gr)
									{
										while($filas_gr = mysql_fetch_assoc($res_gr))
										{
											$gr_nombre = $filas_gr["g_nombre"];
											$gr_nick = $filas_gr["g_extra"];
											$gr_nivel = $filas_gr["g_nivel"];
											$gr_id = $filas_gr["g_id"];
											$ne_nombre = $filas_gr["ne_nombre"];



											if($res_gr){
												?><option value="<?php echo $gr_id;?>"><?php echo $ne_nombre." ".$gr_nombre;?></option>
                                                <?php
									}
										}
									}?>
                                       </select>
                                      <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Guardar</button>
                                      
                                       
                                     
                                      
                                       </form>
								  		
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
    <?php if ($_GET['edithw']){?>
    			
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
                                          <h3 style="color:#FFF;">Editando</h3>
                                          
                                        </div>
                                    </div>
					
				</div>
				<!-- Black block ends -->
				<?php 
				 
							$gethw = mysql_query("SELECT * FROM tareas WHERE t_maestro = '".$sesion['u_id']."' AND t_id = '".$_GET['id']."' ORDER BY t_id DESC");
							while ($result = mysql_fetch_assoc($gethw)){
							   if($result){ $tareas[] = $result; }
							}
							foreach($tareas as $tarea){
				?>
			
				
				<!-- Content starts -->
				
				<div class="container" style="border-left:1px solid #CCC; margin-top:10px;">
					<div class="row">
                    <div class="col-lg-1 col-md-0">
                    </div>
                    <div class="col-lg-10 col-md-12">
							<!-- OS widget -->
							<div class="widget" style="border-radius:1px; border:none;">

								<!-- Widget head -->
									<h5 class="pull-left" style="font-family:Helvetica Neue, Sans-serif; font-weight:500; padding:30px 0 30px 20px; border-bottom:solid 1px #09F;width: 100%;margin-bottom: 20px;">Editando</h5>	
									

								<!-- Widget body -->
							<div class="widget-body" style="text-align:center; padding-bottom:20px; height:auto;"><br />					<?php
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
								  
                                        <form action="query.php?edittarea=true" method="POST">
                                        <h5 style="margin-top:20px; text-align:left; font-weight:400;<?php  if($mixeddate.$mixedtime <= date('Ymd').date('His') ){echo "color:#f00;";}?>"><input name="titulo" value="<?php echo $tarea['t_titulo']; ?>" style="border:none;" autofocus/></h5>
                                       <p style="text-align:left;"> <textarea name="contenido" style="border:none; width:100%;" ><?php echo $tarea['t_descripcion']; ?></textarea>
                                       </p>
                                      <input type="text" name="id" value="<?php echo $tarea['t_id'];?>" style="display:none;"/><input type="text" name="adjuntos" value="none" id="file" style="display:none;"/>
                                      <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Guardar</button>
                                      <?php if($tarea['t_adjunto']=='none'){?>
                                       <a class="btn btn-warning disabled" id="popi<?php echo $tarea['t_id'];?>" data-content="<form id='' action='javascript:;' enctype='multipart/form-data'>
      <input class='form-control' id='uploader' type='file' name='files' style='display:inline-block; width:80%;'/><a class='btn btn-success input-group-addon' style='display:inline-block; width:20%; height:33px;' id='uploaderbtn'><i class='fa fa-save'></i></a><input class='form-control' type='text' value='<?php echo $sesion['u_id'];?>' name='id' style='display:none;'/><p style='text-align:center;'>Si deseas subir mas de un archivo agregalos a un fichero .zip </p></form>"><i class="fa fa-download"></i> Subir adjunto</button>
                                       <?php }?>
                                     
                                      <a class="btn btn-link" onClick="window.history.back();">Cancelar</a>
                                      Original: <?php echo $fecha[2].'/'.$fecha[1].'/'.$fecha[0];?><?php  if($mixeddate.$mixedtime <= date('Ymd').date('His') ){echo " <i class='fa fa-lock'></i>";}?>
                                       </form>
								  <?php
								  }
							?>
                                			
                                  
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
         <?php }?>
      </div>
    <?php } ?>
    <?php if ($_GET['asignature']){?>
    			
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
                                          <h3 style="color:#FFF;">Materias</h3>
                                          
                                        </div>
                                    </div>
					
				</div>
				<!-- Black block ends -->
				
			
				
				<!-- Content starts -->
				
				<div class="container" style="border-left:1px solid #CCC; margin-top:10px;">
					<div class="row">
                    <div class="col-lg-1 col-md-0">
                    </div>
                    <div class="col-lg-10 col-md-12">
							<!-- OS widget -->
							<div class="widget" style="border-radius:1px; border:none;">

								<!-- Widget head -->
									<h5 class="pull-left" style="font-family:Helvetica Neue, Sans-serif; font-weight:500; padding:30px 0 30px 20px; border-bottom:solid 1px #09F;width: 100%;margin-bottom: 20px;"><a href="new.php?nasign=true"><i class="fa fa-plus"></i> Nueva Materia</a></h5>	
									
								<!-- Widget body -->
							<div class="widget-body" style="text-align:center; padding-bottom:20px; height:auto;"><br />					<?php 
							$getmat = mysql_query("SELECT * FROM materias ma WHERE ma.mat_colegio = '".$_SESSION['coldata']."'");
							while ($resultmat = mysql_fetch_assoc($getmat)){
							   if($resultmat){ $materias[] = $resultmat; }
							}
							if($materias){
									
							foreach($materias as $materia){
									?>
								  		<style>
										#<?php echo $materia['g_id'];?>:first-child{
											display:block;	
										}
										#<?php echo $materia['g_id'];?>{
											display:none;	
										}
										</style>
                                        <div id="<?php echo $materia['g_id'];?>">
                                        <h5 style="margin-top:20px; text-align:left; font-weight:400;"> <?php echo $materia['mat_nombre']?></h5>
                                       <p style="text-align:left;"> <?php $whois = mysql_fetch_assoc(mysql_query("SELECT u_nombres,u_apellidos FROM usuarios WHERE u_id = '".$materia['mat_mae']."'")); echo $whois['u_apellidos']." ".$whois['u_nombres'];?></p>
                                      <div class="buttons"> <?php $whgr = mysql_query("SELECT g.g_nombre FROM grupos g INNER JOIN materias_grupos mg ON mg.mg_grupo = g.g_id WHERE mg.mg_materia = '".$materia['mat_id']."'");
									  while($resgrupos = mysql_fetch_assoc($whgr)){
										  if($resgrupos){
											$grupos[] = $resgrupos  ;
										  }
									  }
									  if($grupos){
										foreach($grupos as $grupo){
											echo "| <a id='pop'>".$grupo['g_nombre']."</a> ";
										}
									  }
									  $grupos = "";?>
                                      </div>
                                       <hr style="margin-top:5px; margin-bottom:5px;"/>
                                       </div>
								  <?php
							}}
							?>
                                			
                                  
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
	<?php if ($_GET['nasign']){?>
    			
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
                                          <h3 style="color:#FFF;">Nueva Materia</h3>
                                          
                                        </div>
                                    </div>
					
				</div>
				<!-- Black block ends -->
				
			
				
				<!-- Content starts -->
				
				<div class="container" style="border-left:1px solid #CCC; margin-top:10px;">
					<div class="row">
                    <div class="col-lg-1 col-md-0">
                    </div>
                    <div class="col-lg-10 col-md-12">
							<!-- OS widget -->
							<div class="widget" style="border-radius:1px; border:none;">

								<!-- Widget head -->
                                <form action="query.php?func=nmateria" method="POST">
									<h5 class="pull-left" style="font-family:Helvetica Neue, Sans-serif; font-weight:500; padding:30px 0 30px 20px; border-bottom:solid 1px #09F;width: 100%;margin-bottom: 20px;"><input class="typeahead" name="titulo" type="text" placeholder="Nombre de la materia" style="border:none;">	</h5>
									
								<!-- Widget body -->
							<div class="widget-body" style="text-align:center; padding-bottom:20px; height:auto;"><br />					
								  		
                                        <div>
                                        <h5 style="margin-top:20px; text-align:left; font-weight:400;"> 
										<div id="materias">
                                          
                                        </div>
                                        Maestro: 
                                        <input name="colegio" type="text" style="display:none;" value="<?php echo $_SESSION['coldata'];?>">
                                          <select name="maestro" class="selectpicker" data-live-search="true" >
                                          	<?php 
											$getmaestros = mysql_query("SELECT u.*,um.* FROM usuarios u INNER JOIN usuarios_instituciones ui INNER JOIN usuarios_maestros um ON u.u_id = um.um_usuario_id AND ui.ui_usuario = u.u_id WHERE ui.ui_institucion = '".$_SESSION['coldata']."'");
											
											while($resmaestros = mysql_fetch_assoc($getmaestros)){
												if($resmaestros){
													$maeestros[] = $resmaestros;	
												}
											}
											if($maeestros){
												foreach($maeestros as $maeestro){
													?>
                                                    <option value="<?php echo $maeestro['u_id'];?>"><?php echo $maeestro['u_apellidos'];?> <?php echo $maeestro['u_nombres'];?></option>
                                                    <?php 	
												}
											}
											?>
                                          </select>
										</h5>
                                       <hr style="margin-top:5px; margin-bottom:5px;"/>
                                       <p style="text-align:left;"> 
                                       <select multiple name="grupos[]" class="selectpicker" data-live-search="true">
                                          	<?php $query_gr = "SELECT * FROM grupos g INNER JOIN colegios_niveles cn INNER JOIN niveles_escolares ne ON g.g_nivel = cn.cn_id AND cn.cn_nivel = ne.ne_id WHERE g.g_colegio = '".$_SESSION['coldata']."' ORDER BY ne.ne_id";
											 
$res_gr = mysql_query($query_gr);
									
									if($res_gr)
									{
										while($filas_gr = mysql_fetch_assoc($res_gr))
										{
											$gr_nombre = $filas_gr["g_nombre"];
											$gr_nick = $filas_gr["g_extra"];
											$gr_nivel = $filas_gr["g_nivel"];
											$gr_id = $filas_gr["g_id"];
											$ne_nombre = $filas_gr["ne_nombre"];



											if($res_gr){
												?><option value="<?php echo $gr_id;?>"><?php echo $ne_nombre." ".$gr_nombre;?></option>
                                                <?php
									}
										}
									}?>
                                       </select>
                                       </p>
                                      <div class="buttons"> <button type="submit" class="btn btn-success">Guardar</button>
                                      </div>
                                       </div>
								 		
                                  
								</div>
</form>
								

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
<?php include("inc/footer.php");?> <script>
										var substringMatcher = function(strs) {
										  return function findMatches(q, cb) {
											var matches, substrRegex;
										 
											// an array that will be populated with substring matches
											matches = [];
										 
											// regex used to determine if a string contains the substring `q`
											substrRegex = new RegExp(q, 'i');
										 
											// iterate through the pool of strings and for any string that
											// contains the substring `q`, add it to the `matches` array
											$.each(strs, function(i, str) {
											  if (substrRegex.test(str)) {
												// the typeahead jQuery plugin expects suggestions to a
												// JavaScript object, refer to typeahead docs for more info
												matches.push({ value: str });
											  }
											});
										 
											cb(matches);
										  };
										};
										 
										var states = [ <?php $getmats = mysql_query("SELECT mat_nombre FROM materias WHERE mat_colegio = '".$_SESSION['coldata']."'"); while($resmats = mysql_fetch_assoc($getmats)){
											if($resmats){
												$mats[] = $resmats;	
											}
										}
										if($mats){
											foreach($mats as $mat){
												echo "'".$mat['mat_nombre']."',";
											}
										}?> ];
										 
										$('.typeahead').typeahead({
										  hint: true,
										  highlight: true,
										  minLength: 1
										},
										{
										  name: 'materias',
										  displayKey: 'value',
										  source: substringMatcher(states)
										});
										</script>
 <?php 
							$sgethw = mysql_query("SELECT * FROM tareas WHERE t_maestro = '".$sesion['u_id']."' ORDER BY t_id DESC");
							while ($sresult = mysql_fetch_assoc($sgethw)){
							   if($sresult){ $stareas[] = $sresult; }
							}
							if($sresult){
							foreach($stareas as $starea){
								  
                        ?>   
                        
                                       
                        <script>
						setTimeout(function(){
						 
						 $("#popi<?php echo $tarea['t_id'];?>").removeClass("disabled");
									
									}, 1500);
						setTimeout(function(){
									$('#uploaderbtn').click( function() {
									  var file = this.files[0];
									 
									  var fd = new FormData();
									  fd.append("afile", file);
									  // These extra params aren't necessary but show that you can include other data.
									  fd.append("id", "<?php echo $sesion['u_id'];?>");
									 
									  var xhr = new XMLHttpRequest();
									  xhr.open('POST', 'query.php?func=upload', true);
									  
									  xhr.upload.onprogress = function(e) {
										if (e.lengthComputable) {
										  var percentComplete = (e.loaded / e.total) * 100;
										  alert(percentComplete + '% uploaded');
										}
									  };
									 
									  xhr.onload = function() {
										if (this.status == 200) {
										  var resp = JSON.parse(this.response);
									 
										  alert('Server got:', resp);
									 
										  var image = document.createElement('img');
										  image.src = resp.dataUrl;
										  document.body.appendChild(image);
										};
									  };
									 
									  xhr.send(fd);
									}, false);
									}, 2000);
									
						</script>
             					<script>
								  $("#popi<?php echo $starea['t_id'];?>").popover({
									html: true,
									placement: 'bottom', 
									  callback: function() { 
										$('#dates<?php echo $starea['t_id'];?>').datetimepicker(); 
									  } 
    								});
									$("#subir");
								  </script>    
                                  
                                 <?php } }?>
                                 
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
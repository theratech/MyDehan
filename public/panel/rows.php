<?php 
$TPAG = $_GET['filter'];
include("inc/head.php");?>
<link href="css/fuelux.css" rel="stylesheet" type="text/css">
<script src="js/require.js"></script>
<style>
#opc2{
	opacity: 0;
}
#btn1{
	display:block;
	min-height:auto;
	min-width:auto;
}
</style>
                <div class="blue-block" style="border-left:solid 1px #CCC;">
					<div class="page-title">
						<h3 class="pull-left"><i class="fa fa-building"></i> DEHAN <span> Representantes</span></h3> 	
						<div class="breads pull-right">
							<a href="dashboard.php">Inicio </a>/ Representantes
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="container">
					<div class="page-content page-profile">
						
						<div class="page-tabs">
						
							<!-- Nav tabs 
							<ul class="nav nav-tabs">
							  <li class="active"><a href="profile.html#update" data-toggle="tab">Alumnos</a></li>
							</ul>
-->
							<!-- Tab panes -->
							<div class="tab-content">
							
							  
							  
							  <!-- Update profile tab -->
							  <div class="tab-pane active" id="update">
								
                                    <div id="tabla1">
                                    <p> </p>
                                    	<div class="table-responsive">
                                        	<table class="table">
                                              <thead>
                                                <tr>
                                                  <th style="width:150px;"><a data-toggle="modal" data-target="#addchild"><i class="fa fa-plus"></i> Nuevo Usuario</a></th>
                                                  <th>Nombre</th>
                                                  <th>Colegios</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              <?php 
										 
									$query_gr = "SELECT * FROM usuarios WHERE u_rango = 3";
                  $res_gr = mysqli_query($D,$query_gr);
										  
									
									if($res_gr){
										while($filas_gr = mysqli_fetch_array($res_gr,MYSQLI_ASSOC)){
											$gr_nombre = $filas_gr["u_nombres"];
											$gr_apellido = $filas_gr["u_apellidos"];
											$gr_id = $filas_gr["u_id"];

											$query_col = "SELECT COUNT(col_id) c FROM colegios WHERE col_repres = ".$gr_id."";
                      $res_col = mysqli_query($D,$query_col);
                      $res_cole = mysqli_fetch_array($res_col,MYSQLI_ASSOC);	
                      $query_coln = mysqli_query($D,"SELECT * FROM colegios WHERE col_repres = ".$gr_id."");
											?>
                        <tr>
                            <td><a href="#" onClick="$('.<?php echo $gr_id;?>').fadeToggle();" style="color:#09F; font-weight:500;"><i class="fa fa-plus"></i> Ver más...</a></td>
                            <td><?php echo $gr_nombre;?><?php if($gr_apellido){ echo " ".$gr_apellido;} ?></td>
                            <td><?php echo $res_cole['c']; ?></td>
                        </tr>
                      <?php 

                        while($res_coln = mysqli_fetch_array($query_coln,MYSQLI_ASSOC)){
                          if($res_coln){
                            $colrows[] = $res_coln; 
                          }
                        }
												if($colrows){
													foreach($colrows as $coles){
													?>
                            <tr class="active <?php echo $gr_id; ?>" style="display:none;">
                              <td></td>
                              <td><?php echo $coles['col_nombre'];?></td>
                              <td><?php if($coles['col_activo']==1){
																?><span class="badge btn-success">Activo</span><?php
															}else if($coles['col_activo']==2){
																?><span class="badge btn-primary">PLUS</span><?php
															}else{
																?><span class="badge btn-danger">Inactivo</span><?php
															}?></td>
                            </tr>
                          <?php	
													}
                          $colrows = null;
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
	</div>
</div>
</div>
</div>

<div class="modal fade" id="addchild" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Agregar Usuario</h4>
      </div>
      <div class="modal-body">
        <form id="addrep">
        <label>Nombre Completo</label><br/>
        <input class="form-control" name="u_nombres" placeholder="Nombres" style="width:50%; border-bottom-right-radius:0px; border-right:none; border-top-right-radius:0px; text-align:right;" onblur="this.value=this.value.toUpperCase()">
        <input class="form-control" name="u_apellidos" style="width:50%; float:right; margin-top:-34px; border-bottom-left-radius:0px; border-top-left-radius:0px; border-left:none;" placeholder="Apellidos" onblur="this.value=this.value.toUpperCase()"><br/>
        
        
        <label style="">Fecha de Nacimiento</label><br/>
        <input class="form-control" placeholder="Ejemplo: 12-31-2000" type="text" style="" name="u_nacd"><br/>
        <label style="width:49.9%; margin-top:5px;">Genero</label><br/>
        <input class="form-control" style=" display:none;" name="u_rango" value="1" />
        <input class="form-control" style=" display:none;" name="u_cole" value="<?php echo $_GET['id'];?>" />
        <select style="width:49.9%; margin-top:5px;" name="u_genero" class="form-control">
  <option value="M">Masculino</option>
  <option value="F">Femenino</option>                                       </select>
        <label style="width:49.9%; margin-top:-67px; float:right;">Email</label><br/>
        <input class="form-control" placeholder="E - Mail" type="text" style="width:49.9%; margin-top:-57px; float:right;" name="u_mail"><br/>
        <!--
        <label style="width:49.9%; margin-top:5px;">Telefonos</label><br/>
        <input class="form-control" placeholder="(000) 000 00 00" type="text" style="width:49.9%;" name="u_tel1">
        <input class="form-control" placeholder="(000) 000 00 00" type="text" style="width:49.9%; float:right; margin-top:-34px;" name="u_tel2">
        
        <br/>
        !-->
        
      </div>
      <div class="modal-footer">
        <a class="btn btn-default" data-dismiss="modal">Cerrar</a>
        <button type="submit" id="save" class="btn btn-primary">Guardar</button></form>
      </div>
    </div>
  </div>
</div>

<?php include("inc/footer.php");?>
<script>
$("#save").click(function(){
	$("#save").addClass("disabled");
	});
$("#addrep").submit(function(e) {

    e.preventDefault();
    var url = "query.php?func=nusuario&type=repr"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#addrep").serialize(), // serializes the form's elements.
           success: function(data)
           {
			     window.location = "rows.php?filter=representantes";
			   
           }
         });

    return false; // avoid to execute the actual submit of the form.
});
</script>
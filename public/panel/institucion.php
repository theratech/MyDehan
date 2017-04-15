<?php 
$TPAG = $_GET['type'];
include("inc/head.php");?>
<link href="css/fuelux.css" rel="stylesheet" type="text/css">
<script src="js/require.js"></script>
<style>
#opc2{
	opacity: 1;
}
#btn1{
	display:block;
	min-height:auto;
	min-width:auto;
}
#process2{
	display:none;	
}
</style>
<?php if($_GET['type']=='colegio'){?>
                <div class="blue-block">
					<div class="page-title">
						<h3 class="pull-left"><i class="fa fa-building"></i> Colegios <span style="letter-spacing:0px;">Colegios registrados</span></h3> 	
						<div class="breads pull-right">
							<a href="dashboard.php">Inicio </a>/ Colegios
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
                <div class="container">
					<div class="page-content page-posts">
						
						<div class="page-tabs">
						
							<!-- Nav tabs -->
							<ul class="nav nav-tabs">
							  <li class="active"><a href="posts.html#posts" data-toggle="tab">Colegios</a></li>
							  <li><a href="#makepost" data-toggle="tab">Nuevo Colegio</a></li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
							
							  <!-- Posts tab -->
							  <div class="tab-pane fade active in" id="posts" style="min-height:300px; margin-bottom:20px;">
							  
									
									
								   
									
									 
										  <table class="table table-hover">
										   <thead>
											 <tr>
											   <th>Nombre</th>
											   <th>Coordinador</th>
											   <th>Primer Registro</th>
											   <th>Registro</th>
											   <th style="width:100px;">Control</th>
											 </tr>
										   </thead>
										   <tbody>
											<?php 
											$query = "SELECT * FROM colegios c inner join usuarios d inner join usuarios_instituciones ui ON ui.ui_usuario = d.u_id AND ui.ui_institucion = c.col_id WHERE d.u_rango = 4  ORDER BY c.col_nombre";
									
									$res = mysqli_query($D,$query);
									
									if($res)
									{
										while($filas = mysqli_fetch_array($res,MYSQLI_ASSOC))
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
											   
											   <td><a style="color:#06F;" href="?type=info&id=<?php echo $col_id;?>&tab=1"><b><?php echo $col_nombre;?></b></a></td>
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
                                                                               <td><?php if($col_activo == "1"){ echo "<span class='btn btn-xs btn-success'>Activo</span>"; } if($col_activo == "0"){ echo"<span class='btn btn-xs btn-danger'>Inactivo</span>"; } ?><?php if($col_activo == "2"){ echo"<span class='btn btn-xs btn-primary'><i class='fa fa-plus'></i> MyDehanPLUS</span>"; } ?></td>
                                                                               <td style="text-align:center;">
                                
                                                                                   <?php if($col_activo == "0"){ ?> <a href="#" onclick="return swal({title:'¿Deseas realmente activar el colegio?',text:'Esto activara a todos y cada uno de los usuarios dentro del colegio.',type:'warning',showCancelButton: true, confirmButtonText:'Activar',closeOnConfirm:true,cancelButtonText:'Cancelar', closeOnCancel:true},function(isConfirm){ if(isConfirm){location.href = 'query.php?func=activate&id=<?php echo $col_id;?>&v=1';}});" class="activate"><i class="fa fa-check"></i>Activar </a><?php }?>
                                                                                   <?php if($col_activo == "2"){ ?> <a href="#" onclick="return swal({title:'¿Deseas desactivar PLUS?',text:'El colegio perderá los privilegios de myDEHAN plus, y activará a los alumnos inactivos.',type:'warning',showCancelButton: true, confirmButtonText:'Desactivar',closeOnConfirm:false,cancelButtonText:'Cancelar', closeOnCancel:true},function(isConfirm){ if(isConfirm){ swal({title:'Espere',text:'Esto puede tomar unos segundos',imageUrl:'http://preloaders.net/preloaders/728/Skype%20balls%20loader.gif'}); location.href = 'query.php?func=activate&id=<?php echo $col_id;?>&v=1'; }});"><i class="fa fa-minus"></i> </a><?php }?>
                                                                                   <?php if($col_activo != "2"){ ?> <a href="#" onclick="return swal({title:'¿Deseas activar PLUS?',text:'El colegio ganará los privilegios de PLUS, y activará a los alumnos inactivos. ',type:'warning',showCancelButton: true, confirmButtonText:'Activar',closeOnConfirm:false,cancelButtonText:'Cancelar', closeOnCancel:true},function(isConfirm){ if(isConfirm){ swal({title:'Espere',text:'Esto puede tomar unos segundos',imageUrl:'http://preloaders.net/preloaders/728/Skype%20balls%20loader.gif'}); location.href = 'query.php?func=activate&id=<?php echo $col_id;?>&v=2'; }});" ><i class="fa fa-plus"></i> </a><?php }?>
																				   <?php if($col_activo != "0"){ ?> <a href="#" onclick="return swal({title:'¿Desea desactivar el colegio?',text:' Todos los usuarios pasarán a inactivos.',type:'warning',showCancelButton: true, confirmButtonText:'Desactivar',closeOnConfirm:false,cancelButtonText:'Cancelar', closeOnCancel:true},function(isConfirm){ if(isConfirm){ swal({title:'Espere',text:'Esto puede tomar unos segundos',imageUrl:'http://preloaders.net/preloaders/728/Skype%20balls%20loader.gif'}); location.href = 'query.php?func=activate&id=<?php echo $col_id;?>&v=0'; }});" style="color:#f00;"><i class="fa fa-power-off"></i></a><?php }?>
                                                                               
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
								
									<div class="col-md-3" id="processoff">
                                    </div>
									<div class="col-md-6">
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
                                                  
                                                   
												   <strong>Coordinador</strong><br>
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
        <button type="submit" class="btn btn-primary" id="guardar">Guardar</button></form>
      </div>
    </div>
  </div>
</div>

<?php } ?>
<?php if($_GET['type']=='franquicia'){?>
               
<?php } ?>
<?php if($_GET['type']=='info'){
	include("instituciones/colegio.php");
	} ?>
<?php if($_GET['type']=='infofra'){?>


<?php } ?>
<?php include("inc/footer.php");?>
<div id="js">
</div>
<script>
   $('.selectpicker').selectpicker();
</script>
<script>


// this is the id of the form
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

$("#adduser").submit(function() {

    var url = "query.php?func=nusuario&type=coladmin"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#adduser").serialize(), // serializes the form's elements.
		   beforeSend: function(){
				   $("#adduser").children("#guardar").attr('disabled','disabled');
		   },
           success: function(data)
           {           }
         });

    return false; // avoid to execute the actual submit of the form.
});
$("#adduser2").submit(function() {

    var url = "query.php?func=nusuario&type=coladmin"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#adduser2").serialize(), // serializes the form's elements.
		   beforeSend: function(){
				   $("#guardar").attr('disabled','disabled');
		   },
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
 
$("#schfoto").change(
function(){
	$("#schform").submit();	
});

</script>
<script>
$("#grupos").click(function() {
	 window.location = "institucion.php?type=info&id=<?php echo $_GET['id'];?>&tab=2&view=1";
});
$("#maestros").click(function() {
	 window.location = "institucion.php?type=info&id=<?php echo $_GET['id'];?>&tab=2&view=2";
});
$(".one").click(function(){
	$(".one").fadeOut('0.2s');
	$(".two").fadeIn('0.4s');
});
$(".cancel").click(function(){
	$(".one").fadeIn('0.4s');
	$(".two").fadeOut('0.2s');	
});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
	</body>	
</html>
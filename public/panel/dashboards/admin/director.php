
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
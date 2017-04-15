<?php 
include("../conexion.php");
if($_GET['f']=="group"){
	$query = mysqli_query($D,"SELECT * FROM grupos g INNER JOIN colegios_niveles cn INNER JOIN niveles_escolares ne INNER JOIN colegios col ON g.g_nivel = cn.cn_id AND g.g_colegio = col.col_id AND cn.cn_nivel = ne.ne_id WHERE g.g_id = '".$_GET['id']."' ORDER BY ne.ne_id,g.g_nombre");
	while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)){
		if($result){
			$grupo = $result;
		}
	}
	$query_al = mysqli_query($D,"SELECT * FROM usuarios u inner join alumnos_datos ad ON u.u_id = ad.ad_ua WHERE u.u_rango = 1 AND ad.ad_grupo = '".$_GET['id']."' AND u.u_activo !=0 ORDER BY  u_apellidos");
	while($res_al = mysqli_fetch_array($query_al,MYSQLI_ASSOC)){
		if($res_al){
			$alumnos[] = $res_al;	
		}
	}
?>
<html><meta charset="UTF-8">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>
html{
	padding:30px;
	font-size:12px !important;	
	display:none;
}
td{
	padding: 2px !important;	
}
@media print{
html{
	display:block;
	margin-top:-35px;	
}
}
table{
	font-size:12px !important;	
}
</style>
<?php if($grupo['col_imagen']!="addnew.png"){?><img src="../img/Imagenes/Colegios/<?php echo $grupo['col_imagen'];?>" width="100px"><?php } ?>
<b>Colegio:</b> <?php echo $grupo['col_nombre'];?>
<br/>
<b>Grupo:</b> <?php echo $grupo['ne_nombre']." ".$grupo['g_nombre'];?>
<br/>
<b>Tutor:</b> <?php $gr_tutor = mysqli_fetch_array($gtutor = mysqli_query($D,"SELECT * FROM usuarios inner join usuarios_maestros inner join grupos_maestros ON grupos_maestros.gm_maestro = usuarios_maestros.um_grupo  AND usuarios_maestros.um_usuario_id = usuarios.u_id WHERE grupos_maestros.gm_grupo = ".$_GET['id'].""),MYSQLI_ASSOC); echo $gr_repres = $gr_tutor['u_nombres']." ".$gr_tutor['u_apellidos'];	 ?>
<br/>
<b>Fecha de Entrega:</b>
<br/>
<table class="table table-bordered" width="100%" style="margin-top:20px;">
	<thead>
    	<td width="50%">Nombre del Alumno</td>
    	<td width="25%">Nivel Anterior</td>
        <td width="25%">Nivel Actual</td>
    </thead>
    <tbody>
    <?php 
	if($alumnos){
		foreach($alumnos as $alumno){
				$query_lib = "SELECT MAX(al_id) FROM alumnos_libros WHERE al_alumno = ".$alumno['u_id']."";
$res_lib = mysqli_query($D,$query_lib);		$res_libr = mysqli_fetch_array($res_lib,MYSQLI_ASSOC);?>
					<tr>
						<td><?php echo $alumno['u_nombres'];?> <?php echo $alumno['u_apellidos'];?></td>
						<td><?php $squery = mysqli_query($D,"SELECT * FROM alumnos_libros al inner join libros l ON al.al_libro_actual = l.l_id WHERE al_id = '".$res_libr['MAX(al_id)']."'"); $nivel = mysqli_fetch_array($squery,MYSQLI_ASSOC); echo $nivel['l_nivel'].".".$nivel['l_nombre'];?></td>
						<td>____.____</td>
					</tr>
			<?php
			$res_libr = "";
		}
	}
	?>
				</tbody>
			</table>
           	<br/>
           	<br/>
           	<br/>
            <table width="100%">
            	<tr>
                	<td>Nombre y Firma del Tutor</td>
                	<td>Fecha de Entrega</td>
                </tr>
           </table>
           	<br/>
           	<br/>
           	<br/>
            <table width="100%">
            	<tr>
                	<td>Nombre y Firma del Coordinador</td>
                	<td></td>
                </tr>
            </table>
      <script>window.print();</script>
 </html>
    <?php
}
?>
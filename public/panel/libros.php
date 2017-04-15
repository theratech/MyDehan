<?php 
require_once("../conexion.php");
$cueri = mysql_query("SELECT MAX(al_id) FROM alumnos_libros");
$cueriinfo = mysql_fetch_assoc($cueri);
$maxid = $cueriinfo['MAX(al_id)'];
//echo $maxid;
$query = mysql_query("SELECT al_libro_actual,al_libro_anterior,al_libro_existencia FROM alumnos_libros WHERE al_alumno = '".$_GET['id']."' AND al_id = '".$maxid."'");
$data = mysql_fetch_assoc($query);
//print_r($data);
if($data['al_libro_actual']<$data['al_libro_anterior']){
	$stock = $data['al_libro_existencia']-$data['al_libro_actual'];
	$hasta = $data['al_libro_actual']+20;
	$desde = $data['al_libro_actual'];
	$query = mysql_fetch_assoc(mysql_query("SELECT * FROM libros WHERE l_id = '".$desde."'"));
	$query2 = mysql_fetch_assoc(mysql_query("SELECT * FROM libros WHERE l_id = '".$hasta."'"));
     echo "desde el <b>".$query["l_nivel"].".".$query["l_nombre"]."</b> hasta el <b>".$query2['l_nivel'].".".$query2['l_nombre']."</b> (20 Libros)";

}else{
	$stock = 20-($data['al_libro_existencia']-$data['al_libro_actual']);
	$hasta = $data['al_libro_existencia'];
	$donde = $stock+$hasta;
	$hastaf = $hasta+1;
	$query = mysql_fetch_assoc(mysql_query("SELECT * FROM libros WHERE l_id = '".$hastaf."'"));
	$query2 = mysql_fetch_assoc(mysql_query("SELECT * FROM libros WHERE l_id = '".$donde."'"));
     echo "desde el <b>".$query["l_nivel"].".".$query["l_nombre"]."</b> hasta el <b>".$query2['l_nivel'].".".$query2['l_nombre']."</b> (20 Libros)";
}


?>
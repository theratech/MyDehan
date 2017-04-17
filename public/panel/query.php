<?php 
/* FUNCIONES CONSTRUIDAS 2015 */
function getPassword($i){
	switch ($i) {
		case 'mailServer':
			return "mail@cosmos.ink";
			break;
		case 'mailUser':
			return "cuentas@mydehan.com";
			break;
		case 'mail':
			return "d3h4nM4t3";
			break;
		case '2':
			return false;
			break;
		default:
			return false;
			break;
	}
}
if(isset($_GET['f'])&&$_GET['f']=='notify'){
	require_once("../conexion.php");
	date_default_timezone_set ('America/mexico_city');
	extract($_POST);
	extract($_GET);
	$query = mysqli_query($D,"UPDATE colegios_niveles SET cn_solicitud_envio = 1, cn_solicitud_leida = 0, cn_fecha = '".date("m/d/Y")."' WHERE cn_id = '".$id."'");
	if($query){
		header("Location: dashboard.php");
	}else{
	?>
	  <link href="http://www.cosmos.ink/extra/vendors/sweet-alert/sweet-alert.min.css" rel="stylesheet">
	  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
      <script src="http://www.cosmos.ink/extra/vendors/sweet-alert/sweet-alert.min.js"></script>
    	<script>
			$(document).ready(function(e) {
                swal({
  title: "¡Ocurrió un problema!",
   text: "Contacta con sistemas. Error: <?php echo mysqli_error();?>",
    type: "error" 
  },
  function(){
    history.back(1);
});
            });
		</script>
    <?php	
	}
}
/* FUNCIONES CONSTRUIDAS EL 2014 */
if(isset($_GET['func'])&&$_GET['func']=="actualiza"){
	require_once("../conexion.php");
	extract($_POST);
	extract($_GET);
	$query = mysqli_query($D,"UPDATE usuarios SET u_nombres = '$nombres', u_apellidos = '$apellidos', u_username = '$username', u_pass = '$pass' WHERE u_id = '".$id."'");
	$query2 = mysqli_query($D,"UPDATE alumnos_datos SET ad_mail = '$mail', ad_curp = '$curp', ad_fecha_nacimiento = '$fecha' WHERE ad_ua = '".$id."'");
	if($query&&$query2){
		?><script>window.history.go(-2);</script><?php	
	}else{
		echo "No";
		echo mysqli_error();	
	}
}
if(isset($_GET['func'])&&$_GET['func']=="desactiva"){
	require_once("../conexion.php");
	date_default_timezone_set ('America/mexico_city');
	extract($_POST);
	extract($_GET);
	$query = mysqli_query($D,"UPDATE usuarios SET u_activo = '0' WHERE u_id = '".$u_id."'");
	if($query){
		?>
			<script>window.history.go(-2);</script>
		<?php	
	}
}
if(isset($_GET['func'])&&$_GET['func']=="addtarea"){
	require_once("../conexion.php");
	date_default_timezone_set ('America/mexico_city');
	extract($_POST);
	extract($_GET);
	$count_arr  = count( array_keys( $grupos ));
	if($count_arr = 1){
		$para = implode(",", $grupos);
	}
	if($_FILES["adj"]){
		//comprobamos si ha ocurrido un error.
			if ($_FILES["adj"]["error"] > 0){
			  echo "Error al cargar imagen.";
			} else {
					extract($_POST);
			  //ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
			  //y que el tamano del archivo no exceda los 100kb
			  $limite_kb = 4000;
			  $datatype= explode("/",$_FILES['adj']['type']);
			  if($_FILES['adj']['type']=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
				  $datatype[1]="docx";
			  }
			  if($_FILES['adj']['type']=="application/doc"){
				  $datatype[1]="doc";
			  }
			  if($_FILES['adj']['type']=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
				  $datatype[1]="doc";
			  }
			  if($_FILES['adj']['type']=="application/xls"){
				  $datatype[1]="doc";
			  }
			  if($_FILES['adj']['type']=="application/vnd.openxmlformats-officedocument.presentationml.presentation"){
				  $datatype[1]="doc";
			  }
			  if($_FILES['adj']['type']=="application/powerpoint"){
				  $datatype[1]="doc";
			  }
			  if($_FILES['adj']['type']=="application/doc"){
				  $datatype[1]="doc";
			  }
			  if($_FILES['adj']['type']=="application/doc"){
				  $datatype[1]="doc";
			  }
			  if($_FILES['adj']['type']=="application/doc"){
				  $datatype[1]="doc";
			  }
			  if($_FILES['adj']['type']=="application/doc"){
				  $datatype[1]="doc";
			  }
			  $_FILES["adj"]["name"] = $user.uniqid().".".$datatype[1];
			  if ($_FILES['adj']['size'] <= $limite_kb * 1024){
				  
		      $adjuntoo = $_FILES['adj']["name"];
				//esta es la ruta donde copiaremos la imagen
				
				//recuerden que deben crear un directorio con este mismo nombre
				//en el mismo lugar donde se encuentra el archivo subir.php
				$ruta = "files/".$_FILES['adj']["name"];
				//comprobamos si este archivo existe para no volverlo a copiar.
				//pero si quieren pueden obviar esto si no es necesario.
				//o pueden darle otro nombre para que no sobreescriba el actual.
				if (!file_exists($ruta)){
				  //aqui movemos el archivo desde la ruta temporal a nuestra ruta
				  //usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
				  //almacenara true o false
				  $resultado = @move_uploaded_file($_FILES["adj"]["tmp_name"], $ruta);
				  if ($resultado){
					$nombre = $_FILES['adj']['name'];
	mysqli_query($D,"INSERT INTO tareas VALUES (0,'$titulo','$contenido','".date("Y-m-d h:i:s")."','".str_replace("T"," ",$hasta).":00"."','$adjuntoo','$materia','$maestro','$puntos','$para')") ;
	//header("Location: new.php?hw=true");
				print_r($_FILES);
				  } else {
					echo "Error Intero del Servidor.";
				  }
				} else {
				  echo $_FILES['adj']['name'] . ", ya existe, y no se puede reemplazar.";
				}
			  } else {
				echo "Este tipo de archivo no esta permitido, o excede el limite de ".($limite_kb/1000)." MB";
			  }
			}
	}else{
		$adjuntoo = $adjuntos;
	}
	
	
}
if(isset($_GET['func'])&&$_GET['func']=="nmateria"){
	require_once("../conexion.php");
	date_default_timezone_set ('America/Chicago');
	extract($_POST);
	extract($_GET);
	$fecha = date("ymds");
	if($grupos){
	$query="INSERT INTO materias VALUES ($fecha,'$titulo','$maestro','$colegio')";
	echo $query;
	$done = mysqli_query($D,$query);
	foreach($grupos as $grupo){
			$gquery="INSERT INTO materias_grupos VALUES (0,'$fecha','$grupo')";
			$gquery = mysqli_query($D,$gquery);
			echo "Grupo ".$grupo."<br/>";
			$gquery = "";
	}
	}
	if($done){
	?>
	<script>
	window.history.back();
	</script>
	<?php	
	}else{
	echo mysqli_error();	
	}
}	
if(isset($_GET['func'])&&$_GET['func']=='colfoto'){
	require_once("../conexion.php");

//comprobamos si ha ocurrido un error.
if ($_FILES["perfil"]["error"] > 0){
  echo "Error al cargar imagen.";
} else {
		extract($_POST);
  //ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
  //y que el tamano del archivo no exceda los 100kb
  $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
  $limite_kb = 2;
  $datatype= explode("/",$_FILES['perfil']['type']);
  $_FILES["perfil"]["name"] = $user.uniqid().".".$datatype[1];
  if (in_array($_FILES['perfil']['type'], $permitidos) && $_FILES['perfil']['size'] <= $limite_kb * 1048576){
    //esta es la ruta donde copiaremos la imagen
	
    //recuerden que deben crear un directorio con este mismo nombre
    //en el mismo lugar donde se encuentra el archivo subir.php
    $ruta = "../img/Imagenes/Colegios/".$_FILES['perfil']["name"];
	
    //comprobamos si este archivo existe para no volverlo a copiar.
    //pero si quieren pueden obviar esto si no es necesario.
    //o pueden darle otro nombre para que no sobreescriba el actual.
    if (!file_exists($ruta)){
      //aqui movemos el archivo desde la ruta temporal a nuestra ruta
      //usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
      //almacenara true o false
      $resultado = @move_uploaded_file($_FILES["perfil"]["tmp_name"], $ruta);
      if ($resultado){
        $nombre = $_FILES['perfil']['name'];
        mysqli_query($D,"UPDATE colegios SET col_imagen='$nombre' WHERE col_id = '".$_POST['id']."'") ;
        echo "<script>window.history.back()</script>";
      } else {
        echo "Error Intero del Servidor.";
      }
    } else {
      echo $_FILES['perfil']['name'] . ", ya existe, y no se puede reemplazar.";
    }
  } else {
    echo "Este tipo de archivo no esta permitido, o excede el limite de ".($limite_kb)." MB";
  }
}

	
	
}
if(isset($_GET['func'])&&$_GET['func']=='upload'){
$fileName = $_FILES['afile']['name'];
$fileType = $_FILES['afile']['type'];
$fileContent = file_get_contents($_FILES['afile']['tmp_name']);
$dataUrl = 'data:' . $fileType . ';base64,' . base64_encode($fileContent);
 
$json = json_encode(array(
  'name' => $fileName,
  'type' => $fileType,
  'dataUrl' => $dataUrl,
  'username' => $_REQUEST['username'],
  'accountnum' => $_REQUEST['accountnum']
));
 
echo $json;
}
if($_GET['edittarea']==true){
	require_once("../conexion.php");
	extract($_POST);
	extract($_GET);
	echo $titulo."<br>";
	echo $contenido."<br>";
	echo $id;
	$query="UPDATE tareas SET t_descripcion = '$contenido', t_titulo='$titulo', t_adjunto = '$adj' WHERE t_id = '$id'";
	$done = mysqli_query($D,$query);
	if($done){
	?>
	<script>
	window.history.back();
	</script>	
	<?php	
	}else{
	echo mysqli_error();	
	}
}
if($_GET['addtarea']==true){
	require_once("../conexion.php");
	extract($_POST);
	extract($_GET);
	echo $titulo."<br>";
	echo $contenido."<br>";
	echo $id;
	$query="INSERT INTO tareas VALUES(0,'$titulo','$contenido','".date("Y-m-d h:i:s")."','$hasta', $adj','$materia','$maestro','$valor','$para')";
	$done = mysqli_query($D,$query);
	if($done){
	?>
	<script>
	window.history.back();
	</script>	
	<?php	
	}else{
	echo mysqli_error();	
	}
}
if($_GET['ntexto']){
	require_once("../conexion.php");
	extract($_POST);
	extract($_GET);
	$query="UPDATE tareas SET t_descripcion='$ntexto' WHERE t_id = $id";
	$done = mysqli_query($D,$query);
	if($done){
	?>
	<script>
	window.history.back();
	</script>	
	<?php	
	}else{
	echo mysqli_error();	
	}
}
if($_GET['nfecha']){
	require_once("../conexion.php");
	extract($_POST);
	extract($_GET);
	$query="UPDATE tareas SET t_expiracion='$nfecha' WHERE t_id = $id";
	$done = mysqli_query($D,$query);
	if($done){
	?>
	<script>
	window.history.back();
	</script>	
	<?php	
	}else{
	echo mysqli_error();	
	}
}
if(isset($_GET['func'])&&$_GET['func']=='donehw'){
	require_once("../conexion.php");
	extract($_POST);
	extract($_GET);
	$query="INSERT INTO tareas_vistas VALUES(0,'$hw','$me')";
	$done = mysqli_query($D,$query);
}
if(isset($_GET['func'])&&$_GET['func']=='activate'){
	require_once("../conexion.php");
	extract($_POST);
	extract($_GET);
	$query="UPDATE colegios SET col_activo = '".$_GET['v']."' WHERE col_id = '".$_GET['id']."'";
	$done = mysqli_query($D,$query);
	$change_alu="UPDATE usuarios SET u_activo = '".$_GET['v']."' WHERE u_id IN (
 SELECT ad.ad_ua FROM alumnos_datos ad
 INNER JOIN grupos g ON ad.ad_grupo = g.g_id 
 WHERE g.g_colegio = '".$_GET['id']."'
);";
	$dos = mysqli_query($D,$change_alu);
	$change_tea="UPDATE usuarios SET u_activo = '".$_GET['v']."' WHERE u_id IN (
 SELECT ui.ui_usuario FROM usuarios_instituciones ui
 WHERE ui.ui_institucion = '".$_GET['id']."'
);";
	$tres = mysqli_query($D,$change_tea);
	if($done&&$dos&&$tres){
		?><script>window.history.back()</script><?php	
	}else{
	echo mysqli_error();	
	}
}

if(isset($_GET['func'])&&$_GET['func']=="updatelevel"){
	require_once("../conexion.php");
		extract($_POST);
		extract($_GET);
		if($q_nivel=="K"){
			$q_nivel = 0;	
		}
		$getquery = mysqli_query($D,"SELECT * FROM libros WHERE l_nivel = '".$q_nivel."' AND l_nombre = '".$q_libro."'");
		$getresult[] = mysqli_fetch_array($getquery,MYSQLI_ASSOC);
		$fixresult = $getresult[0];
		$libro = $fixresult['l_id'];
		$stock = $actbook-$libro;
		if($stock == 0){}else{
	$query = "INSERT INTO alumnos_libros VALUES(0,'$user','$libro','$mes','$fecha','$stock','$al_existencia','$actbook',0,1)";
		$done = mysqli_query($D,$query);
		}
		if($done){
			$query = mysqli_query($D,"UPDATE grupos SET g_captura = '".date("m/d/Y")."', g_status = '1' WHERE g_id = '".$grupo_id."'");
			?>
            <script>			</script>
            <?php
		}else{
		echo mysqli_error();	
		}
}
if(isset($_GET['func'])&&$_GET['func']=="nugrupo"){
	require_once("../conexion.php");
		extract($_POST);
		
		$id = '';
		$i = 0;
		
		while ($i < 7) {
		$id .= rand(0, 9);
		
		$i++;
		}
		
		$id = (int) $id;
		
	
	$addgroup = "INSERT INTO grupos VALUES($id,'$gru_nombre','$gru_colegio','$gru_gra','".date("d-m-Y")."','$gru_extra')";
	$d1 = mysqli_query($D,$addgroup);
	$addteacher = "INSERT INTO grupos_maestros VALUES(0,$gru_tutor,$id)";
	$d2 = mysqli_query($D,$addteacher);
		if($d1&&$d2){ ?><script>
		window.history.back()
		</script><?php }else{
			echo mysqli_error();
		}
		
	
}
if(isset($_GET['func'])&&$_GET['func']=="nusuario"){
		if($_GET['type']=="colalu"){
			require_once("../conexion.php");
			extract($_POST);
			extract($_GET);
			
		if($u_nacd=""){}else{ $u_nacd = "00-00-0000"; }
			if($u_curp){}else{
			
		$nombres = explode(" ",$u_nombres);
		$apellidos = explode(" ",$u_apellidos);
		$u_curp = $nombres[0].".".$apellidos[0];
			}
			$chars = "BCDFGHJKLMNPQRSTVWXYZ012345678901234567890123456789";
    $pw = substr(str_shuffle($chars),0,4);
			
			/*Generador de ID de usuarios*/
			$id = '';
			$i = 0;
			
			while ($i < 6) {
			$id .= rand(0, 9);
			
			$i++;
			}
			$id = (int) $id;
			
			$query = "INSERT INTO usuarios VALUES ($id,'$u_nombres','$u_apellidos','$u_curp','$pw','$u_rango','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."',1,'$u_genero')";
			$que = mysqli_query($D,$query);
			$query2 = "INSERT INTO alumnos_datos VALUES (0,$u_cole,$u_nacd,'0','0','$u_mail','$u_curp','".date('Y-m-d H:i:s')."','$id','$u_where','0','0','0')";
			$que2 = mysqli_query($D,$query2);
			$query3 = "INSERT INTO alumnos_libros VALUES(0,'$id','$u_libro','".date('17-m-Y')."','".date('d-m-Y')."','0','-1','$u_libro','0','1')";
			$que3 = mysqli_query($D,$query3);

				// Varios destinatarios
				$para  = $_POST['u_mail'];

				// título
				$título = 'Bienvenido a MyDEHAN';

				// mensaje
				$mensaje = '
				<h1>Hola, '.$_POST['u_nombres'].'</h1>
				Hemos creado tu usuario <b>'.$u_curp.'</b>, para <i>MyDehan</i>.
				<div class="im"><hr>
					<h2>Puedes accesar ya!</h2>
					<h4><a href="https://www.mydehan.com/" target="_blank">INICIA SESIÓN AQUÍ</a></h4>
				</div>
				<ul>
					<li>Usuario: <b>'.$u_curp.'</b></li>
					<li>Contraseña: <b>'.$pw.'</b></li>
					<div class="im">
						<hr>
						Un saludo, 
						El equipo de <b>MyDehan</b>.
					</div>
				</ul>
				';

				// Para enviar un correo HTML, debe establecerse la cabecera Content-type
				$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
				$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

				// Cabeceras adicionales
				$cabeceras .= 'To: '.$_POST['u_nombres']." ".$_POST['u_apellidos'].' <'.$_POST['u_mail'].'>' . "\r\n";
				$cabeceras .= 'From: MyDEHAN <'.getPassword("mailUser").'>' . "\r\n";

				// Enviarlo
				mail($para, $título, $mensaje, $cabeceras);
				
				echo "√";
			
	}
	if($_GET['type']=="colteacher"){
		require_once("../conexion.php");
		extract($_POST);
		extract($_GET);
		/*Generador de ID de usuarios*/
		$id = '';
		$i = 0;
		
		while ($i < 7) {
		$id .= rand(0, 9);
		
		$i++;
		}
		
		$id = (int) $id;
		
		function rand_string( $length ) {

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($chars),0,$length);

}
		$nombres = explode(" ",$u_nombres);
		$apellidos = explode(" ",$u_apellidos);
		$nombres[0].".".$apellidos[0].$apellidos[1];
		$u_passw = rand_string(6);
		
		/* */
		$query = "INSERT INTO usuarios VALUES ($id,'$u_nombres','$u_apellidos','$u_username','$u_passw','$u_rango','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."',1,'$u_genero');";
		mysqli_query($D,$query);
		$query2 = "INSERT INTO usuarios_maestros VALUES (0,$id,'$u_tel1','$u_mail',$id);";
		mysqli_query($D,$query2);
		$query3 = "INSERT INTO usuarios_instituciones VALUES (0,$u_cole,$id);";
		mysqli_query($D,$query3);
		if($query&&$query2&&$query3){
		?><script>window.history.back()</script><?php
		}else{
		echo mysqli_error();
		}
		require_once("send/class.phpmailer.php");
			include("send/class.smtp.php");
			
			$mail             = new PHPMailer();
			$body             = "<h1>Hola, ".$_POST['u_nombres']."</h1>
													Hemos creado tu usuario <b>".$u_username."</b>, para <i>MyDehan</i>.<div class='im'><hr>
													
													<h2>Puedes accesar ya!</h2>
													<h4><a href='http://my.dehanmatematicas.com/' target='_blank'>INICIA SESIÓN AQUÍ</a></h4>
													</div><ul>
													<li>Usuario: <b>".$u_username."</b></li>
													<li>Contraseña: <b>".$u_passw."</b></li><div class='im'>
													<hr>
													Un saludo, 
													El equipo de <b>MyDehan</b>.
			
			
			</div></ul>";
			
			$mail->IsSMTP(); // telling the class to use SMTP
			
			$mail->Host       = getPassword("mailServer"); // SMTP server
			$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
													   // 1 = errors and messages
													   // 2 = messages only
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
			$mail->Username   = getPassword("mailUser"); // SMTP account username
			$mail->Password   = getPassword("mail");        // SMTP account password
			
			$mail->SetFrom(getPassword("mailUser"), 'Bienvenido a MyDehan');
			
			$mail->AddReplyTo($_POST['u_mail'],$_POST['u_nombres']." ".$_POST['u_apellidos']);
			
			$mail->Subject    = "MyDehan : Password";
			
			$mail->AltBody    = "Este mensaje requiere lector de HTML"; // optional, comment out and test
			
			$mail->MsgHTML($body);
			
			$address = $_POST['u_mail'];
			$mail->AddAddress($_POST['u_mail'],$_POST['u_nombres']." ".$_POST['u_apellidos']);
			
			if(!$mail->Send()) {
			  echo $mail->ErrorInfo." &times;";
			} else {
			  echo "√";
			}
	}
	if($_GET['type']=="repr"){
		require_once("../conexion.php");
		extract($_POST);
		extract($_GET);
		/*Generador de ID de usuarios*/
		
		$id = '';
		$i = 0;
		
		while ($i < 2) {
		$id .= rand(0, 9);
		
		$i++;
		}
		
		$id = 100+(int)$id;
		
		function rand_string( $length ) {

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($chars),0,$length);

}
		$nombres = explode(" ",$u_nombres);
		$apellidos = explode(" ",$u_apellidos);
		$u_username = $nombres[0].".".$apellidos[0].$apellidos[1];
		$u_passw = rand_string(6);
		$u_rango = 3;
		/* */
		$query = "INSERT INTO usuarios VALUES ($id,'$u_nombres','$u_apellidos','$u_username','$u_passw','$u_rango','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."',1,'$u_genero');";
		$query = mysqli_query($D,$query);
		if($query){
		?><script>window.history.back()</script><?php
		}else{
		echo mysqli_error();
		}
		require_once("send/class.phpmailer.php");
			include("send/class.smtp.php");
			
			$mail             = new PHPMailer();
			$body             = "<h1>Hola, ".$_POST['u_nombres']."</h1>
													Hemos creado tu usuario <b>".$u_username."</b>, para <i>MyDehan</i>.<div class='im'><hr>
													
													<h2>Puedes accesar ya!</h2>
													<h4><a href='http://my.dehanmatematicas.com/' target='_blank'>INICIA SESIÓN AQUÍ</a></h4>
													</div><ul>
													<li>Usuario: <b>".$u_username."</b></li>
													<li>Contraseña: <b>".$u_passw."</b></li><div class='im'>
													<hr>
													Un saludo, 
													El equipo de <b>MyDehan</b>.
			
			
			</div></ul>";
			
			$mail->IsSMTP(); // telling the class to use SMTP
			
			$mail->Host       = getPassword("mailServer"); // SMTP server
			$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
													   // 1 = errors and messages
													   // 2 = messages only
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
			$mail->Username   = getPassword("mailUser"); // SMTP account username
			$mail->Password   = getPassword("mail");        // SMTP account password
			
			$mail->SetFrom(getPassword("mailUser"), 'Bienvenido a MyDehan');
			
			$mail->AddReplyTo($_POST['u_mail'],$_POST['u_nombres']." ".$_POST['u_apellidos']);
			
			$mail->Subject    = "MyDehan : Password";
			
			$mail->AltBody    = "Este mensaje requiere lector de HTML"; // optional, comment out and test
			
			$mail->MsgHTML($body);
			
			$address = $_POST['u_mail'];
			$mail->AddAddress($_POST['u_mail'],$_POST['u_nombres']." ".$_POST['u_apellidos']);
			
			if(!$mail->Send()) {
			  echo $mail->ErrorInfo." &times;";
			} else {
			  echo "√";
			}
	}
	if($_GET['type']=="coladmin"){
		
		require_once("../conexion.php");
		extract($_POST);
		extract($_GET);
		
		/*Generador de ID de usuarios*/
		$id = '';
		$i = 0;
		
		while ($i < 7) {
		$id .= rand(0, 9);
		
		$i++;
		}
		
		$id = (int) $id;
		
		function rand_string( $length ) {

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($chars),0,$length);

}
		$nombres = explode(" ",$u_nombres);
		$apellidos = explode(" ",$u_apellidos);
		$u_username = $nombres[0].".".$apellidos[0].$apellidos[1];
		$u_passw = rand_string(6);
		
		/* */
		$query = "INSERT INTO usuarios VALUES ($id,'$u_nombres','$u_apellidos','$u_username','$u_passw','$u_rango','".date('Y-m-d H:i:s')."','".date('Y-m-d H:i:s')."',1,'$u_genero');";
		mysqli_query($D,$query);
		$query2 = "INSERT INTO usuarios_datos_apoderados VALUES (0,$id,$u_tel1,$u_tel2,$u_tel3,'$u_mail');";
		$querydone = mysqli_query($D,$query2);
		
		if($u_rango=='4'){ echo "'#ad2'";}
		if($u_rango=='4'){
			$query3 = "INSERT INTO usuarios_instituciones VALUES (0,$u_institucion,$id);";
		mysqli_query($D,$query3);
		
			}
		if($querydone){
			require_once("send/class.phpmailer.php");
			include("send/class.smtp.php");
			
			$mail             = new PHPMailer();
			$body             = "<h1>Hola, ".$_POST['u_nombres']."</h1>
													Hemos creado tu usuario <b>".$u_username."</b>, para <i>MyDehan</i>.<div class='im'><hr>
													
													<h2>Puedes accesar ya!</h2>
													<h4><a href='http://http://my.dehanmatematicas.com/' target='_blank'>INICIA SESIÓN AQUÍ</a></h4>
													</div><ul>
													<li>Usuario: <b>".$u_username."</b></li>
													<li>Contraseña: <b>".$u_passw."</b></li><div class='im'>
													<hr>
													Un saludo, 
													El equipo de <b>MyDehan</b>.
			
			
			</div></ul>";
			
			$mail->IsSMTP(); // telling the class to use SMTP
			
			$mail->Host       = getPassword("mailServer"); // SMTP server
			$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
													   // 1 = errors and messages
													   // 2 = messages only
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->Port       = 25;                    // set the SMTP port for the GMAIL server
			$mail->Username   = getPassword("mailUser"); // SMTP account username
			$mail->Password   = getPassword("mail");        // SMTP account password
			
			$mail->SetFrom(getPassword("mailUser"), 'Bienvenido a MyDehan');
			
			$mail->AddReplyTo($_POST['u_mail'],$_POST['u_nombres']." ".$_POST['u_apellidos']);
			
			$mail->Subject    = "MyDehan : Password";
			
			$mail->AltBody    = "Este mensaje requiere lector de HTML"; // optional, comment out and test
			
			$mail->MsgHTML($body);
			
			$address = $_POST['u_mail'];
			$mail->AddAddress($_POST['u_mail'],$_POST['u_nombres']." ".$_POST['u_apellidos']);
			
			if(!$mail->Send()) {
			  echo $mail->ErrorInfo." &times;";
			} else {
			  echo "√";
			}
		}
		
	}
}
if(isset($_GET['func'])&&$_GET['func']=="ncolegiop2"){
	require_once("../conexion.php");
	extract($_POST);
	extract($_GET);
	$query = "INSERT INTO colegios_niveles VALUES (0,$col_id,1,$col_niv_1,'','0','0','0');";
	$query2 = "INSERT INTO colegios_niveles VALUES (0,$col_id,2,$col_niv_2,'','0','0','0');";
	$query3 = "INSERT INTO colegios_niveles VALUES (0,$col_id,3,$col_niv_3,'','0','0','0');";
	$query4 = "INSERT INTO colegios_niveles VALUES (0,$col_id,4,$col_niv_4,'','0','0','0');";
	$query5 = "INSERT INTO colegios_niveles VALUES (0,$col_id,5,$col_niv_5,'','0','0','0');";
	
	mysqli_query($D,$query);  
	mysqli_query($D,$query2);
	mysqli_query($D,$query3);
	mysqli_query($D,$query4);
	mysqli_query($D,$query5);
	Header("Location: institucion.php?type=info&id=$col_id");
	}
if(isset($_GET['func'])&&$_GET['func']=="ncolegio"){
	date_default_timezone_set('MST');
	extract($_POST);
	extract($_GET);
	$identifier = '';
$i = 0;

while ($i < 7) {
$identifier .= rand(0, 9);

$i++;
}

$identifier = (int) $identifier;


$identifier2 = '';
$i2 = 0;

while ($i2 < 7) {
$identifier2 .= rand(0, 9);

$i2++;
}

$identifier2 = (int) $identifier2;



$identifier3 = '';
$i3 = 0;

while ($i3 < 7) {
$identifier3 .= rand(0, 9);

$i3++;
}

$identifier3 = (int) $identifier3;



	require_once("../conexion.php");
$colegio = "INSERT INTO colegios VALUES ($identifier,'$col_nombre',$identifier2,$identifier3,'".date('d-m-Y H:i:s')."',0,'addnew.png','$crea_id');";
$cdone = mysqli_query($D,$colegio);
$telefono = "INSERT INTO contactos VALUES ($identifier3,'$col_tel1','$col_tel2','$col_email')";
$tdone = mysqli_query($D,$telefono);
$direccion = "INSERT INTO direcciones VALUES ($identifier2,'$col_calle','$col_num_int','$col_num_ext','','$col_colonia','$col_postalcode','$col_pais','$col_ciudad','$col_estado','','','');";
$ddone = mysqli_query($D,$direccion);
if($cdone&&$ddone&&$tdone){
	echo $identifier;
}else{
$delcole = "DELETE FROM colegios WHERE col_id = '$identifier'";
mysqli_query($D,$delcole);
$deltel = "DELETE FROM contactos WHERE con_id = '$identifier3'";
mysqli_query($D,$deltel);
$deldir = "DELETE FROM direcciones WHERE dir_id = '$identifier2'";
mysqli_query($D,$deldir);
}

}
if(isset($_GET['token'])&&$_GET['token']=="alumnodata"){
	require_once("../conexion.php");
	session_start();
	$raw2 = $_SESSION['loggedIn'];
	$query = "SELECT u.*,a.*,l.*,z.*,n.* FROM usuarios u inner join alumnos_datos a inner join alumnos_libros l inner join libros z inner join niveles n ON u.u_id = '".$raw2['u_id']."' AND u.u_id = a.ad_ua AND u.u_id = l.al_alumno AND l.al_libro_actual = z.l_id AND z.l_nivel = n.n_id";
	$res = mysqli_query($D,$query);
	if($res){
		while($filas = mysqli_fetch_array($res,MYSQLI_ASSOC)){
			$_SESSION['aldata'] = $filas;

			$my_level = $filas["n_nombre"];
			$my_level_id = $filas["n_id"];
			
			header("Location: dashboard.php");
		}
	}else{
		echo mysqli_error($res);
	}
}
if(isset($_GET['token'])&&$_GET['token']=="query"){

	if($_GET['class']=="grupo"){
	
	}
	
}
if(isset($_GET['func'])&&$_GET['func']=='del'){
	
	if($_GET['type']=='alumn'){
		require_once("../conexion.php");
			extract($_POST);
			extract($_GET);
			$query = "DELETE FROM usuarios WHERE u_id = '".$_GET['id']."'";
			$que = mysqli_query($D,$query);
			$query2 = "DELETE FROM alumnos_datos WHERE ad_ua = '".$_GET['id']."'";
			$que2 = mysqli_query($D,$query2);
			$query3 = "DELETE FROM alumnos_libros WHERE al_alumno = '".$_GET['id']."'";
			$que3 = mysqli_query($D,$query3);
			if($que&&$que2&&$que3){
				?><script>window.history.back()</script><?php
			}else{
			echo mysqli_error();	
			}
	}
	if($_GET['type']=='maestr'){
		require_once("../conexion.php");
			extract($_POST);
			extract($_GET);
			$query = "DELETE FROM usuarios WHERE u_id = '".$_GET['id']."'";
			$que = mysqli_query($D,$query);
			$query2 = "DELETE FROM usuarios_maestros WHERE um_usuario_id = '".$_GET['id']."'";
			$que2 = mysqli_query($D,$query2);
			$query3 = "DELETE FROM usuarios_instituciones WHERE ui_usuario = '".$_GET['id']."'";
			$que3 = mysqli_query($D,$query3);
			if($que&&$que2&&$que3){
				?><script>window.history.back()</script><?php
			}else{
			echo mysqli_error();	
			}
	}
	if($_GET['type']=='grup'){
		require_once("../conexion.php");
			extract($_POST);
			extract($_GET);
			$query = "DELETE FROM grupos WHERE g_id = '".$_GET['id']."'";
			$que = mysqli_query($D,$query);
			$query2 = "DELETE FROM grupos_maestros WHERE gm_grupo = '".$_GET['id']."'";
			$que2 = mysqli_query($D,$query2);
			if($que&&$que2){
				?><script>window.history.back()</script><?php
			}else{
			echo mysqli_error();	
			}
	}
	if($_GET['type']=='cole'){
		require_once("../conexion.php");
			extract($_POST);
			extract($_GET);
			$delcole = "DELETE FROM colegios WHERE col_id = '".$_GET['id']."'";
			$u = mysqli_query($D,$delcole);
			$deltel = "DELETE FROM contactos WHERE con_id = '".$_GET['id']."'";
			$s =mysqli_query($D,$deltel);
			$deldir = "DELETE FROM direcciones WHERE dir_id = '".$_GET['id']."'";
			$e = mysqli_query($D,$deldir);
			if($u&&$s&&$e){
				?><script>window.history.back()</script><?php
			}else{
			echo mysqli_error();	
			}
	}
	

}?>
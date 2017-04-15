
<?php
define('DB_SERVER', '**');
define('DB_USERNAME', '**');
define('DB_PASSWORD', '**');

if(mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,'dehan')){
	$D = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,'dehan');
	$D -> set_charset("utf8");
}else{
	return "Error";
}
?>
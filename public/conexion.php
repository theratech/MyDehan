
<?php
define('DB_SERVER', '192.241.208.91');
define('DB_USERNAME', 'dehan');
define('DB_PASSWORD', '2Bp6SMuqDjZdKD5T');

if(mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,'dehan')){
	$D = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,'dehan');
	$D -> set_charset("utf8");
}else{
	return "Error";
}
?>
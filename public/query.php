<?php
// Init Scripts
date_default_timezone_set("America/Mexico_City"); 
session_start();
require_once("conexion.php");

// Login Script
if($_GET['action']=="log"){
	extract($_POST);

	// Log Validation
	$query = mysqli_query($D,"SELECT u.* FROM usuarios u WHERE u.u_username = '$username' AND u.u_pass = '$pass'");
	$query = $query or die(mysqli_error());
	$count = mysqli_num_rows($query);
	if($count!=0){

		// Login Data
	    $data=mysqli_fetch_array($query,MYSQLI_ASSOC);

	    $_SESSION['loggedIn'] = $data;
	    $rawdata = $_SESSION['loggedIn'];
		
		mysqli_query($D,"UPDATE usuarios SET u_uacceso = '".date('Y-m-d h:i:s')."' WHERE u_id = '".$rawdata['u_id']."'");

		if($rawdata['u_rango']=="1"){
			 header("Location: panel/query.php?token=alumnodata");
		}else{ 
		if($rawdata['u_rango']=="4"){
			header("Location: panel/dashboard.php?type=info&id=&tab=1");
		}else{
			header("Location: panel/dashboard.php");
		}
	}
	} else {
	     $_SESSION['loggedIn'] = false;
	}

 }

 // Logout Script
 if($_GET['f']=='logout'){

	session_destroy();	 
	header("location: index.php?e=lo");

 }?>
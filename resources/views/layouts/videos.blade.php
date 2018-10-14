<!DOCTYPE html>
<html>
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- Title here -->
        <title>MyDEHAN - @yield('title','')</title>
        <!-- Description, Keywords and Author -->
        <meta name="description" content="Matemáticas sencillas, el modelo elegido.">
        <meta name="keywords" content="Matematicas, Educacion, Global">
        <meta name="author" content="Thera Tech">
        <link rel="icon" type="image/png" href="/favicon.png" />
      
        <style>
        .morris-hover.morris-default-style {
            border-radius: 2px !important;
            padding: 6px;
            color: #FFF !important;
            
            background: rgba(85, 233, 139, 0.79)!important ;
            border: solid 2px rgba(230, 230, 230, 0) !important;
            font-family: sans-serif;
            font-size: 12px;
            text-align: center;
        }
.activate{
    transition: color .2s;  
}
.disabled{
    opacity: 0.7;   
}
.back{
	font-weight: 600;
	font-size: 12pt;
}
        </style>
        <!-- Google web fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Styles -->
        <!-- Bootstrap CSS -->
        <link href="/panel/css/bootstrap.min.css" rel="stylesheet">
        <link href="/panel/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <!-- jQuery UI -->
        <link href="/panel/css/jquery-ui.css" rel="stylesheet">
        
        
      <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
        <!-- Bootstrap Switch -->
        <link href="/panel/css/bootstrap-switch.css" rel="stylesheet">
        <!-- jQuery Datatables -->
        <link href="/panel/css/jquery.dataTables.css" rel="stylesheet">
        <!-- jQuery prettyPhoto -->
        <link href="/panel/css/prettyPhoto.css" rel="stylesheet">  
        <!-- Font awesome CSS -->
        <link href="/panel/css/font-awesome.min.css" rel="stylesheet">     
        <!-- Custom CSS -->
        <link href="/panel/css/style.css?version" rel="stylesheet">
        <link href="https://vjs.zencdn.net/7.2.3/video-js.css" rel="stylesheet">

		  <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
		  <script src="https://vjs.zencdn.net/ie8/ie8-version/videojs-ie8.min.js"></script>
        
        <!--[if IE]>
            <link rel="stylesheet" type="text/css" href="css/style-ie.css" />
        <![endif]-->
            
        <!-- Favicon -->
        <link rel="shortcut icon" href="index.html#">
      <script src="//code.jquery.com/jquery-1.11.0.min.js"></script> 
    </head>
    <div class="navbar navbar-fixed-top">
	  <div class="navbar-inner">
	    <ul class="nav">
	    	<li>
	      		<a role="button" class="back" onclick="window.history.back()"><i class="fa fa-arrow-left"></i> Volver a MyDEHAN</a>
	    	</li>
	    </ul>
	  </div>
	</div>
    <body>
	@yield('content')
	</body>
</html>
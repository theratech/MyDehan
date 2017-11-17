<?php
date_default_timezone_set ('america/mexico_city');

error_reporting(0);
include("conexion.php");

if(!isset($_SESSION["loggedIn"])){
    echo "<br><h1>No ha iniciado sesión</h1><p>Puede que su sesión haya expirado</p>";
    die();
}else{
    $sesion = $_SESSION["loggedIn"];    
}

$query = "SELECT u.*,r.* FROM usuarios u inner join rangos r ON u.u_id = '".$sesion['u_id']."' AND u.u_rango = r.r_id";
$res = mysqli_query($D,$query);
                                    
                                    if($res)
                                    {
                                        while($filas = mysqli_fetch_array($res,MYSQLI_ASSOC))
                                        {
                                            $my_nombre = $filas["u_nombres"];
                                            $my_apellido = $filas["u_apellidos"];
                                            $my_id = $filas["u_id"];
                                            $my_uname = $filas["u_username"];
                                            $my_rango = $filas["r_nombre"];
                                            $my_gender = $filas["u_gender"];
                                            if($res){   
                                    }
                                        }
                                    }
                                    
                                
?>
<!DOCTYPE html>
<html>
    <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- Title here -->
        <title>MyDEHAN - @yield('title')</title>
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
            position:absolute !important;
            background: rgba(85, 233, 139, 0.79)!important ;
            border: solid 2px rgba(230, 230, 230, 0) !important;
            font-family: sans-serif;
            font-size: 12px;
            text-align: center;
        }
        .blue-knob-block{   
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
        .blue-knob-block:hover{   
            -webkit-transform:scale(1.05) !important;
            -moz-transform:scale(1.05) !important;
            transform:scale(1.05) !important;
            opacity: 1 !important;
        }
        .rec{
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
        .rec:hover{
            -webkit-transform:scale(1.05) !important;
            -moz-transform:scale(1.05) !important;
            transform:scale(1.05) !important;
            background: #fff;
            box-shadow: 0 10px 50px rgba(0,0,0,0.1);
        }
        .rec>img{
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
        .rec:hover>img{
            -webkit-transform:scale(1.3) !important;
            -moz-transform:scale(1.3) !important;
            transform:scale(1.3) !important;
        }
        .blue-knob-block:hover>ul>p>a.btn {
            transform: scale(1.2);
        }
.activate{
    transition: color .2s;  
}
.disabled{
    opacity: 0.7;   
}
        </style>
        <!-- Google web fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/css/cosmos/extra/vendors/sweet-alert/sweet-alert.min.css" rel="stylesheet">
        
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
        
        <!--[if IE]>
            <link rel="stylesheet" type="text/css" href="css/style-ie.css" />
        <![endif]-->
            
        <!-- Favicon -->
        <link rel="shortcut icon" href="index.html#">
      <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
      <script src="/css/cosmos/extra/vendors/sweet-alert/sweet-alert.min.js"></script>
    </head>
    
    <body style="">

                      
         
      <div class="out-container">
         <div class="outer" style="background: rgba(255, 255, 255, 0) repeat;">
            
            <!-- Mainbar starts -->
            <div class="mainbar" style="margin-left:0px;background: rgba(255, 255, 255, 0) url(../img/subtle_dots.png) repeat;
}">
               
                <!-- Page heading starts -->

        @yield('content')
      <!-- Scroll to top -->
        
      <!-- Javascript files -->
      <!-- jQuery -->
      <script src="/panel/js/jquery.knob.js"></script>
      <script src="/panel/js/raphael.js"></script>
      <!-- Bootstrap JS -->
      <script src="/panel/js/bootstrap.min.js"></script>
      <script src="/panel/js/bootstrap-select.js"></script>
      <script src="/panel/js/typeahead.js"></script>
    <script type="text/javascript" src="/panel/js/moment.min.js"></script>
        
    <script type="text/javascript" src="/panel/js/bootstrap-datetimepicker.min.js"></script>
      <!-- Sparkline for Mini charts -->
      <script src="/panel/js/sparkline.js"></script>

      <!-- jQuery Data Tables -->
      <script src="/panel/js/jquery.dataTables.min.js"></script>
      <!-- jQuery Knob -->
      <script src="/panel/js/bootstrap-switch.min.js"></script>
      <!-- jQuery Knob -->
      <script src="/panel/js/jquery.rateit.min.js"></script>
      <!-- jQuery prettyPhoto -->
      <script src="/panel/js/jquery.prettyPhoto.js"></script>
      <!-- Respond JS for IE8 -->
      <script src="/panel/js/respond.min.js"></script>
      <!-- HTML5 Support for IE -->
      <script src="/panel/js/html5shiv.js"></script>
      <script src="/panel/js/chart.js"></script>
      <script src="/panel/js/require.js"></script>
      <!-- jQuery UI -->
      <script src="/panel/js/morris.js"></script>

      <!-- Javascript for this page -->
      
      <script type="text/javascript">
      $(document).ready(function(){
        $("[rel=tooltip]").tooltip({ placement: 'bottom'});
      });
      $(window).scroll(function() {
          checkPosition('#navbar');
      });

      function checkPosition( element ){
      //choose your limit
      var positionLimit = 88;
      var y = getOffsetY();

      if( y <= positionLimit ){
          $(element).css({'position':'absolute','margin-top':'0px'});
      }
      else{
          $(element).css({'position':'fixed','margin-top':'-88px'});
      }
      }
      function getOffsetY(){

      var  scrOfY = 0;
          if( typeof( window.pageYOffset ) == 'number' ) {
              //Netscape compliant
              scrOfY = window.pageYOffset;
          } else if( document.body && ( document.body.scrollTop ) ) {
              //DOM compliant
              scrOfY = document.body.scrollTop;
          } else if( document.documentElement && (  document.documentElement.scrollTop ) ) {
              //IE6 standards compliant mode
              scrOfY = document.documentElement.scrollTop;
          }

      return scrOfY;
      }
      setInterval(function(){
          $( ".activate" ).css( "color", "rgb(102, 216, 66)" );
          }, 500);

      setTimeout(function(){
      setInterval(function(){
          $( ".activate" ).css( "color", "#777" );
          }, 500);
          }, 250);
      if ( window.location !== window.parent.location ) {
        $("body").css("margin-top","65px");
      } else {
        // The page is not in an iframe
      }
            </script>
            <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-54543400-1', 'auto');
        ga('send', 'pageview');
        </script>
      @yield("scripts")
  </body> 
</html>

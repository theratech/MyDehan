<?php 
session_start();
date_default_timezone_set("America/Mexico_City"); 
?>
<!DOCTYPE html>
    <!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MyDEHAN - Inicia Sesión</title>
        <link rel="icon" type="image/png" href="/favicon.png" />
        
        <!-- Vendor CSS -->
        <link href="/fonts/font-awesome/css/font-awesome.min.css?v=1" rel="stylesheet">
        <link href="/css/cosmos/extra/vendors/animate-css/animate.min.css" rel="stylesheet">
        <link href="/css/cosmos/extra/vendors/loaders/spinKit.css" rel="stylesheet">
        <link href="/css/cosmos/extra/vendors/sweet-alert/sweet-alert.min.css" rel="stylesheet">
        <link href="/css/cosmos/extra/vendors/material-icons/material-design-iconic-font.min.css" rel="stylesheet">
        <link href="/css/cosmos/extra/vendors/socicon/socicon.min.css" rel="stylesheet">
            
        <!-- CSS -->
        <link href="/css/cosmos/extra/css/app.min.1.css" rel="stylesheet">
        <link href="/css/cosmos/extra/css/app.min.2.css" rel="stylesheet">
        <style>
        body:before{
            height:100% !important; 
        }
        #loader{
            display:none;   
        }
        .login-content .lc-block{
            transition: background 0.9s;
        }
        .btn-link{
            color:rgba(255,255,255,0.5) !important;
        }
        .btn-link:hover{
            color:rgba(255,255,255,0.9) !important;
        }
        .input-group-addon{
            vertical-align: middle !important;
        }
        body:before {
            background: url(https://www.dehanmatematicas.com/wp-content/uploads/2017/11/dehanport.jpg) no-repeat center center !important;
            background-size: cover !important;
            transform: scale(1.05);
            opacity: 1;
        }
        body{
            background: transparent;
            font-family:-apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, 'Helvetica', 'Arial', sans-serif, 'Helvetica', 'Arial', sans-serif;    
        }
        .fa-btn{
            padding-top:8px !important;
            font-size:20px !important;  
        }
        </style>
    </head>
    
    <body class="login-content">
        <!-- Login -->
        <div class="lc-block toggled" id="l-login">
        
            <div id="loader">
                <div class="sk-spinner sk-spinner-double-bounce" style="width:60px; height:60px;">
                   <div class="sk-double-bounce1" style="background:#0E0076;"></div>
                   <div class="sk-double-bounce2" style="background:#0A55B1;"></div>
                </div>
                <script>
                </script>
                <br/>
                <p id="mintext">Iniciando Sesión</p>
            </div>
            <form id="loginForm" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <h1>
                            <img src="img/logo_small.png" width="150px"></h1>
                <br/>
                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="icon icon-user"></i></span>
                    <div class="fg-line">
                        <input type="text" autocomplete="off" autofocus id="username" name="username" class="form-control" placeholder="Usuario">
                    </div>
                </div>
                
                <div class="input-group m-b-20">
                    <span class="input-group-addon"><i class="icon icon-lock"></i></span>
                    <div class="fg-line">
                        <input type="password" id="password" name="pass" class="form-control" placeholder="Contraseña">
                    </div>
                </div>
               
                
                <button type="submit" class="btn btn-login btn-primary btn-float" id="login" style="padding-top:8px;"><i class="icon fa-btn icon-arrow-right"></i></button>
                
            </form>
        </div>
            <div id="branding" style="bottom:29px;left: 20px;position: absolute; display:block !important;color: rgba(0,0,0, 0.58); opacity: 0.5;"><img src="http://www.thera.tech/wp-content/uploads/2017/04/logo-white.png" width="85px"> <b style="color:#FFF;"></b></div>
            <div id="branding" style="bottom:20px;right: 20px;position: absolute; text-align: right; display:block !important;color: rgba(255,255,255, 0.58);"><a class="btn btn-link" href="https://www.mydehan.com/privacy.pdf" target="new">Aviso de Privacidad</a></div>
        
        <!-- Older IE warning message -->
        <!--[if IE]>
            <div class="ie-warning">
                <h1 class="c-white">Internet Explorer, Safari y Opera no soportan COSMOS.</h1>
                <p>Estás utilizando un explorador que no soporta nuestro sistema, a continuación te recomendamos exploradores compatibles. </p>
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="/extra/img/browsers/chrome.png" alt="">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="/extra/img/browsers/firefox.png" alt="">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="/extra/img/browsers/fusion.png" alt="">
                            <div>Fusion Explorer (Próximamente)</div>
                        </a>
                    </li>
                </ul>
                <p>Actualiza tu explorador para conseguir una experiencia mas rápida y segura. <br/>COSMOS, Soporte técnico</p>
            </div>   
        <![endif]-->
        
        <!-- Javascript Libraries -->
        <script src="/css/cosmos/extra/js/jquery-2.1.1.min.js"></script>
        <script src="/css/cosmos/extra/js/bootstrap.min.js"></script>
        <script src="/css/cosmos/extra/vendors/sweet-alert/sweet-alert.min.js"></script>
        
        <script src="/css/cosmos/extra/vendors/waves/waves.min.js"></script>
        
        <script src="/css/cosmos/extra/js/functions.js"></script>
    <script>
        $(document).ready(function(e) {
            $("#loginForm").submit(function(ev){
                ev.preventDefault();
                $.ajax({
                    type:"POST",
                    url:"query.php?action=log",
                    data:$("#loginForm").serialize(),
                    beforeSend: function(){ $("#login").html("<i class='icon icon-cogs'></i>"); },
                    cache:false,
                    success: function(data){
                        if(data){
                                window.location.href = "panel/dashboard.php";
                        }else{
                                swal("Error","Hubo un problema iniciando sesión.","error");
                                $("#login").html('<i class="icon icon-arrow-right"></i>'); 
                        }
                    }
                });
                return false;
            });
            <?php if(isset($_GET['nologged'])&&$_GET['nologged']=='true'){?>
                swal("¡Debes Iniciar Sesión!","No has iniciado sesión.","warning");
            <?php }?>
            <?php if(isset($_GET['e'])&&$_GET['e']=='lo'){?>
                swal("Hecho.","Has cerrado sesión correctamente.","success");
            <?php }?>
        });
    </script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-54543400-1', 'auto');
          ga('send', 'pageview');

        </script>
    </body>
</html>
<!-- Localized -->

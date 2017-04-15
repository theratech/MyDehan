<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="
	background: #58B5E0;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- Stylesheets -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/animation.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/checkbox/orange.css" rel="stylesheet">
		<link href="css/authenty.css?ver=1" rel="stylesheet">
	
		<!-- Font Awesome CDN -->
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		
		<!-- Google Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>

<title>MyDEHAN - Inicia Sesión</title>
</head>

<body>
  <body>
		
		<section id="authenty_preview">
			<section id="signin_main" class="authenty signin-main">
				<div class="section-content">
				  <div class="wrap">
					  <div class="container">	  
							<div class="form-wrap" style="opacity:1;">
								<div class="row">
								  <div class="title" data-animation=""  style="opacity:1;" data-animation-delay="">	
                                      <img src="img/logo_small.png" width="200px;"/>                  
                  					  </div>
                                       
                                   
									<div id="form_1" data-animation="" style="z-index:3049493; opacity:1;">
										
									  <div class="form-main bubble" style=" background: #f7f7f7;background: -moz-radial-gradient(center, ellipse cover,  #f7f7f7 0%, #ffffff 66%); background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%,#f7f7f7), color-stop(66%,#ffffff)); background: -webkit-radial-gradient(center, ellipse cover,  #f7f7f7 0%,#ffffff 66%);background: -o-radial-gradient(center, ellipse cover,  #f7f7f7 0%,#ffffff 66%);background: -ms-radial-gradient(center, ellipse cover,  #f7f7f7 0%,#ffffff 66%); background: radial-gradient(ellipse at center,  #f7f7f7 0%,#ffffff 66%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f7f7f7', endColorstr='#ffffff',GradientType=1 ); z-index:25948; margin-top:0px;position: absolute; margin-left:26px; box-shadow: 0 0 70px rgba(0,0,0,0.2); text-align:center;">
										  <form action="query.php?action=log" method="POST">
											  <div class="form-group" style="margin-top:60px; text-align:center;">
									  			<input type="text" id="un_1" name="username" value="admin" class="form-control" style="background: rgba(214, 214, 214, 0.2); display:none;
; color:#000;" placeholder="Usuario" required>		<p>Admin</p>
													<input type="password" id="pw_1" name="pass" style="background: rgba(214, 214, 214, 0.2);
1 color:#000;" class="form-control" placeholder="Contraseña" required>
											  </div>
										    <button type="submit" class="btn btn-block signin" style="background-color: #5FA2D6;">Iniciar Sesión</button>
										  </form><?php if($_GET['error']=="true"){?><div class="btn btn-danger form-control" style="margin-top:10px;
border-bottom-left-radius: 18px;
border-bottom-right-radius: 18px;
}">Error al iniciar sesión</div><?php }  if($_GET['nologged']=="true"){  ?><div class="btn btn-warning form-control" style="margin-top:10px;
border-bottom-left-radius: 18px;
border-bottom-right-radius: 18px;
}">No has iniciado sesión</div><?php } ?>
									  </div>
								  </div>
                                 
								</div>
							</div>
					  </div>
				  </div>
				</div>
			</section>
		 
			
		</div>
	  
    <!-- js library -->
	
		
		<!-- preview scripts -->
		
  </body>
</html>

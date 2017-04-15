<!--Footer-->
    <section id="contact" class="black-bg">
      <div class="container">
        <div class="row margin-60">
          <div class="col-sm-12 text-center">
            <h2 class="white">CONTACTENOS</h2>
          </div>
        </div>
        
        <div class="row margin-80">
          <div class="col-sm-8">
            <h3 class="white">¿Alguna duda?</h3>
            <p>Por favor deje su pregunta o duda en los siguientes campos.</p>
            <br />
            <!-- comment form -->
            <form method="post" action="send-email.php" id="contact-form" class="form-horizontal" role="form">
              <div class="form-group">
                <div class="col-6  col-lg-6">
                  <input type="text" class="form-control" name="name" id="name" placeholder="Nombre">
                </div>
                <div class="col-6  col-lg-6">
                  <input type="text" class="form-control" name="name" id="surname" placeholder="Apellidos">
                </div>
              </div>         
              <div class="form-group">
                <div class="col-6  col-lg-6">
                  <input type="text" class="form-control" name="direction" id="direction" placeholder="Dirección">
                </div>      
                <div class="col-6  col-lg-6">
                  <input type="text" class="form-control" name="city" id="city" placeholder="Ciudad, Estado">
                </div>  
              </div> 
              <div class="form-group">
                <div class="col-6  col-lg-6">
                  <input type="tel" class="form-control" name="phone" id="phone" placeholder="Teléfono">
                </div>  
                <div class="col-6  col-lg-6">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Correo Electrónico">
                </div>
              </div> 
              <div class="form-group">
              	<label for="select">Area de Interés</label>
                <div class="col-12 col-lg-12">
                  <select>
                  	<option>Ayuda y Soporte</option>
                  	<option>Información General</option>
                  	<option>Directivo con interés en mi escuela</option>
                  	<option>Prefesor con interés en mi escuela</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="message" class="col-12  col-lg-2  control-label">Menasaje:</label>
                <div class="col-12  col-lg-10">
                  <textarea class="form-control" rows="7" name="message" id="message"></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-12  col-lg-2">&nbsp;</div>
                <div class="col-12  col-lg-10" style="color:#ccc;">
                No olvides incluír tu lada telefónica en el numero.
                  <button type="submit" class="btn btn-secondary btn-lg btn-full">Enviar</button>
                </div>
              </div>
            </form><!-- /comment form -->
          </div><!--End Col 8-->
    
          <div class="col-sm-4">
            <!--
            <h3 class="white">Dirección</h3>
            <p><strong>Bol 300:</strong>Blvd. Morelos final Plaza BOL 300 Local H
Hermosillo, Sonora México.</p>
            <br />
            !-->
            <h3 class="white">Teléfono</h3>
            <p><strong>León, GTO (Centro):</strong> +01 (477) 707 32 57 <br/><strong> Hermosillo, SON (Local):</strong> +52 (662) 2 18 13 87 <br/><strong> Fax:</strong> 01 662 226 09 003</p>
            <br />
            <h3 class="white">Nuestros Perfiles</h3>
            <ul class="list-inline social">
             <!-- <li class="wow fadeIn animated" data-wow-delay="0.3s"><a href="http://www.twitter.com/davco98"><i class="fa fa-twitter fa-2x"></i></a></li>!-->
              <li class="wow fadeIn animated" data-wow-delay="0.6s"><a href="mailto:contacto@dehanmatematicas.com"><i class="fa fa-envelope fa-2x"></i></a></li>
              <li class="wow fadeIn animated" data-wow-delay="0.9s"><a target="_blank" href="https://www.facebook.com/DehanEducacionGlobal"><i class="fa fa-facebook fa-2x"></i></a></li>
            </ul>
          </div><!--End Col 4-->
        </div><!--End Row-->
        
      </div>
      <img src="img/clouds.bl.png" alt="Logo myDEHAN" width="100%" style="margin-bottom:-88px;">
    </section>
    
    <section id="footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center">
          <img src="img/logo-white.png" alt="DEHAN" width="50px;">
          <p><small>DEHAN EDUCACION GLOBAL S DE R.L DE C.V ©2014, Todos los derechos reservados.</small></p>

          </div>
        </div>
      </div>
    </section>
  
  </div><!--End Wrapper-->
  
    <a href="#" class="scrollToTop" style="border-radius:50%;"><i class="fa fa-chevron-up"></i></a>
    
    <!-- Javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/twitter-fetch.js"></script>
    <script src="js/slippry.min.js"></script>
    <script src="js/fswit.js"></script>
    <script src="js/main.js"></script>
    
    <script>
    jQuery(document).ready(function(){
      jQuery('#slippry-header').slippry({
        transition: 'fade',
        controls: false,
        pause: 9000,
        auto: true
      });
    });   
    </script>
       
    </body>
</html>
<!-- Localized -->
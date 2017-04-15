      <!-- Scroll to top -->
		
	  <!-- Javascript files -->
	  <!-- jQuery -->
	  <script src="js/jquery.knob.js"></script>
	  <script src="js/raphael.js"></script>
	  <!-- Bootstrap JS -->
	  <script src="js/bootstrap.min.js"></script>
	  <script src="js/bootstrap-select.js"></script>
      <script src="js/typeahead.js"></script>
	<script type="text/javascript" src="js/moment.min.js"></script>
    	
	<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
      <!-- Sparkline for Mini charts -->
      <script src="js/sparkline.js"></script>
      <!-- jQuery UI -->
	  <script src="js/morris.js"></script>
      <?php if($_GET['type']=="userview"){
		 ?>
		 <script>
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'aludata',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [<?php 
	$nivel=mysqli_query($D,"SELECT n_id,al_fecha FROM alumnos_libros a inner join libros l inner join niveles n ON a.al_libro_actual = l.l_id AND a.al_alumno = '".$_GET['id']."' AND l.l_nivel = n.n_id");
	  $cueri = array();
	  $check_num_rows=mysqli_num_rows($nivel);
       while ($celda = mysqli_fetch_array($nivel,MYSQLI_ASSOC))
     {
		   $cueri[]=$celda;
		   
         
      } foreach($cueri as $valor){
			  $dato1 = $valor;
			  $dato11 = $dato1['n_id'];
			  $dato12 = $dato1['al_fecha'];
			  $fechadatos = explode('-', $dato12);
			  $mes = $fechadatos['1']-1;
			  $meses[] = $mes;
			  $datos[] = $dato11;
			  
			  $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
			$monthName = $meses[$mes];
			  if($valor==end($cueri)){$final ="";}else{$final =",";}
			  if($fechadatos['2']!= date('Y')){}else{
				echo "{mes:'".$monthName."',value: ".$dato11."}".$final;
			  }
		   }
	
	?>],
  // The name of the data record attribute that contains x-values.
  xkey: 'mes',
  parseTime: false,
  lineColors: ['#F00'],
  grid: false,
  xLabels: 'month',
  gridTextColor: ['#F00'],
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Nivel'],
  gridIntegers: true,
  ymin: 0,
});
</script>
		 <?php 
	  }?>
	  <!-- jQuery Knob -->
	  <!-- jQuery Data Tables -->
	  <script src="js/jquery.dataTables.min.js"></script>
	  <!-- jQuery Knob -->
	  <script src="js/bootstrap-switch.min.js"></script>
	  <!-- jQuery Knob -->
	  <script src="js/jquery.rateit.min.js"></script>
	  <!-- jQuery prettyPhoto -->
	  <script src="js/jquery.prettyPhoto.js"></script>
	  <!-- Respond JS for IE8 -->
	  <script src="js/respond.min.js"></script>
	  <!-- HTML5 Support for IE -->
	  <script src="js/html5shiv.js"></script>
      <script src="js/chart.js"></script>
      <script src="js/require.js"></script>

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
<?php 
$TPAG = "Historial de avance";
include("inc/head.php");

?>
				
				<!-- Page heading ends -->
				<style>
					#menu1{
					
						background:auto;	
						
					}
				</style>
				
				
				<!-- Black block starts -->
				<div class="blue-block" style="border-left:solid 1px #CCC;height: 700px;">
				
										
					<div class="row">
						<div class="col-md-12">
							
							<h3 style="color:#FFF;">Avance del <a href="?y=<?php echo $_GET['y']-1;?>" style="color:#FFF;"><i class="fa fa-arrow-left"></i> </a><?php echo $_GET['y'];?><a href="?y=<?php echo $_GET['y']+1;?>" style="color:#FFF;"> <i class="fa fa-arrow-right"></i></a></h3><hr style="color:#FFF;"/>
                                             <div class="chart-container">
                                                <div id="avance" style="height:1000px;"></div>
                                             </div>
										
										
                             
							
							
							
						</div>
						<div class="col-md-0">
							
							
							
							
						</div>
                        
					</div>
					
					<!-- Map block -->
					<div class="map-block">
						
						
					</div>
					
				</div>
				<!-- Black block ends -->
				
			
				
				<!-- Content starts -->
				
				
				
				<!-- Content ends -->				
			   
            </div>
            <!-- Mainbar ends -->
            
         </div>
      </div>
		
      
<?php include("inc/footer.php");?>
      <script>
		$(function() {
    $(".dial").knob();
});

new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'avance',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
  <?php 
	$nivel=mysql_query("SELECT l_id,al_fecha FROM alumnos_libros a inner join libros l inner join niveles n ON a.al_libro_actual = l.l_id AND a.al_alumno = '".$sesion['u_id']."' AND l.l_nivel = n.n_id");
	  $cueri = array();
	  $check_num_rows=mysql_num_rows($nivel);
       while ($celda = mysql_fetch_assoc($nivel))
     {
		   $cueri[]=$celda;
		   
         
      } foreach($cueri as $valor){
			  $dato1 = $valor;
			  $dato11 = $dato1['l_id'];
			  $dato12 = $dato1['al_fecha'];
			  $fechadatos = explode('-', $dato12);
			  $mes = $fechadatos['1']-1;
			  $meses[] = $mes;
			  $datos[] = $dato11;
			  
			  $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
			$monthName = $meses[$mes];
			  if($valor==end($cueri)){$final ="";}else{$final =",";}
			  if($fechadatos['2']!=$_GET['y']){}else{
				echo "{ month: '".$monthName."', value: ".$dato11.", libro: 'k.11' },";
			  }
		   }
	
	?>
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'month',
  parseTime: false,
  lineColors: ['#FFF'],
  grid: false,
  xLabels: 'month',
  gridTextColor: ['rgba(0,0,0,0)'],
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  gridIntegers: true,
  yLabelFormat: ['km'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
      ymin: 0,
  labels: ['Libro']
});
	  </script>
	</body>	
</html>
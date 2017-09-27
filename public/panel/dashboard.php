<?php 
$TPAG = "Inicio";
include("inc/head.php");

## ALUMNOS
	// Dashboard Alumno Plus
	if ($sesion['u_rango']==1&&$sesion['u_activo']==2&&$_GET['mode']!='dehan'){
		include("dashboards/alumno/plus.php");
	}
	// Dashboard Alumno Plus->Dehan
	if ($_GET['mode']=='dehan'){
		include("dashboards/alumno/dehan.php");
	}
	// Dashboard Alumno Dehan
	if ($sesion['u_rango']==1&&$sesion['u_activo']==1){
		include("dashboards/alumno/dehan.php");
	}
## PROFESORES
	// Dashboard Maestro Plus
	if ($sesion['u_rango']==2&&$sesion['u_activo']==2){
		include("dashboards/maestro/plus.php");
	}
	// Dashboard Maestro Dehan
	if ($sesion['u_rango']==2&&$sesion['u_activo']==1){
		include("dashboards/maestro/main.php");
	}
## REPRESENTANTE DEHAN
	if ($sesion['u_rango']==3){
		include("dashboards/admin/rep.php");
	}
## COORDINADOR ESCOLAR
	if ($sesion['u_rango']==4){
		include("dashboards/admin/coord.php");
	} 
## DIRECTOR ESCOLAR
	if ($sesion['u_rango']==5){
		include("dashboards/admin/director.php");
	} 
## ADMINISTRATIVO
	if ($sesion['u_rango']==6){
		include("dashboards/admin/disabled.php");
	} 
## ADMINISTRADOR DEL SISTEMA
	if ($sesion['u_rango']==7){
		include("dashboards/admin/aguila.php");
	} 
## HYO JUNG
	if ($sesion['u_rango']==8){
		include("dashboards/admin/owner.php");
	} ?>
    
      
<?php include("inc/footer.php");?>

      <?php 
      echo $final;?>
<?php if ($sesion['u_rango']==1){?>  
      
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
	$nivel=mysqli_query($D,"SELECT n_id,al_fecha,l_graph FROM alumnos_libros a inner join libros l inner join niveles n ON a.al_libro_actual = l.l_id AND a.al_alumno = '".$sesion['u_id']."' AND l.l_nivel = n.n_id");
	  $cueri = array();
	  $check_num_rows=mysqli_num_rows($nivel);
       while ($celda = mysqli_fetch_array($nivel,MYSQLI_ASSOC))
     {
		   $cueri[]=$celda;
		   
         
      } foreach($cueri as $valor){
			  $dato1 = $valor;
			  $dato11 = $dato1['l_graph'];
			  $dato12 = $dato1['al_fecha'];
			  $fechadatos = explode('-', $dato12);
			  $mes = $fechadatos['1']-1;
			  $meses[] = $mes;
			  $datos[] = $dato11;
			  
			  $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
 
			$monthName = $meses[$mes];
			  if($valor==end($cueri)){$final ="";}else{$final =",";}
			  if($fechadatos['2']){
				echo "{ month: '".$monthName." ".$fechadatos[2]."', value: ".$dato11." },";
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
  gridTextColor: ['#FFF'],
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Libro'],
  gridIntegers: true,
  ymin: 'auto'
});
new Morris.Bar({
  // ID of the element in which to draw the chart.
  element: 'niveles',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
  <?php 
	$g_avance =mysqli_query($D,"SELECT * FROM alumnos_libros WHERE al_alumno = '".$sesion['u_id']."'");
	  
	  $c_avance=mysqli_num_rows($g_avance);
       while ($r_avance = mysqli_fetch_array($g_avance,MYSQLI_ASSOC))
     {
		 if($r_avance){
		   $avances[]=$r_avance;
		 }
         
      } foreach($avances as $avance){
			  $sedato11 = $avance['al_stock'];
			  $sdato11 = str_replace("-","", $sedato11);
			  $sdato12 = $avance['al_fecha'];
			  $sfechadatos = explode('-', $sdato12);
			  $smes = $sfechadatos['1']-1;
			  $smeses[] = $smes;
			  $sdias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$smeses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
			$smonthName = $smeses[$smes];
			  if($svalor==end($scueri)){$sfinal ="";}else{$sfinal =",";}
			  if($sfechadatos['2']!= date('Y')){}else{
				echo "{ month: '".$smonthName."o', value: ".$sdato11." },";
			  }
		   }
	
	?>
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'month',
  parseTime: false,
  barColors: ['#FFF'],
  grid: false,
  xLabels: 'month',
  gridTextColor: ['#FFF'],
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
    ymin: 1,
  axes: false,
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Avance']
});
</script>
      <?php }
	  ?>
      <?php 
							$dgethw = mysqli_query($D,"SELECT * FROM tareas");
							while ($dresult = mysqli_fetch_array($dgethw,MYSQLI_ASSOC)){
							   if($dresult){ $dtareas[] = $dresult; }
							}
							foreach($dtareas as $dtarea){
								 $dgrupo = explode(",", $dtarea['t_para']); 
								 if(in_array($aludata['ad_grupo'],$dgrupo)){
									?>
                                 <form style="display:none;" id="<?php echo $dtarea['t_id'];?>send">
                                 	<input name="me" value="<?php echo $my_id;?>"/>
                                 	<input name="hw" value="<?php echo $dtarea['t_id'];?>"/>
                                 </form>
								 <script>
								 // this is the id of the form
									$("#<?php echo $dtarea['t_id']?>done").click(function() {
									
										var url = "query.php?func=donehw";
									
										$.ajax({
											   type: "POST",
											   url: url,
											   data: $("#<?php echo $dtarea['t_id']?>send").serialize(), 
											   
											   success: function(data)
											   {
												   $( "#<?php echo $dtarea['t_id']?>btn" ).removeClass("fa-circle-o");												   $( "#<?php echo $dtarea['t_id']?>btn" ).addClass("fa-check-circle");
												   $( "#<?php echo $dtarea['t_id']?>done" ).attr("id","unusable");
												   $( "#<?php echo $dtarea['t_id']?>done" ).addClass("clicked");
											   }
											 });
									
										return false; // avoid to execute the actual submit of the form.
									});
								 </script> 
								  <?php
								  }}
							?>
                            <?php 
							$sgethw = mysqli_query($D,"SELECT * FROM tareas WHERE t_maestro = '".$sesion['u_id']."' ORDER BY t_id DESC");
							while ($sresult = mysqli_fetch_array($sgethw,MYSQLI_ASSOC)){
							   if($sresult){ $stareas[] = $sresult; }
							}
							foreach($stareas as $starea){
								  
                        ?>                
                                  <script>
								  $("#pop<?php echo $starea['t_id'];?>").popover({
									html: true,
									placement: 'bottom', 
									  callback: function() { 
										$('#dates<?php echo $starea['t_id'];?>').datetimepicker(); 
									  } 
    								});

								  </script>  
                                  <script>
								  $("#popi<?php echo $starea['t_id'];?>").popover({
									html: true,
									placement: 'bottom', 
									  callback: function() { 
										$('#dates<?php echo $starea['t_id'];?>').datetimepicker(); 
									  } 
    								});

								  </script>    
 				 <script>
               $(function () { $("#dates<?php echo $starea['t_id'];?>").datetimepicker({
				'date-format': 'YYYY-MM-DD HH:mm:ss',
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            });     });
			
 
    			</script>
                
      <script>
$("#grupos").click(function() {
	 window.location = "?tab=2&view=1";
});
$("#maestros").click(function() {
	 window.location = "?tab=2&view=2";
});
</script>
								  <?php
								  }
							?>
                      <?php if($sesion['u_rango']){
						  ?>
						  <script>
						  $("#forma1").submit(function() {

    var url = "query.php?func=ncolegio"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#forma1").serialize(), // serializes the form's elements.
           success: function(data)
           {
			   
			   
			   $data = data;
			    if($data){
					  $("#stp1").css("display","none");
					  $("#stp2").css("display","block");
				}
				if($data==null) {
					$("#stperr").css("display","block");
					  $("#stp1").css("display","none");
				}
				$("#newbox").val(data);
				$("#u_insti").val(data);
           }
         });

    return false; // avoid to execute the actual submit of the form.
});
$("#adduser2").submit(function() {

    var url = "query.php?func=nusuario&type=coladmin"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $("#adduser2").serialize(), // serializes the form's elements.
           success: function(data)
           {
			   $('#ad2').addClass("disabled");
			   
			   $( "#add2" ).addClass( "invisible" );
			   $( ".modal-backdrop" ).removeClass( "in" );
			   $( ".modal-backdrop" ).css( "display", "none" );
           }
         });

    return false; // avoid to execute the actual submit of the form.
});
 
						  </script>
                          
<script>
$("#grupos").click(function() {
	 window.location = "?type=info&id=<?php echo $_GET['id'];?>&tab=2&view=1";
});
$("#maestros").click(function() {
	 window.location = "?type=info&id=<?php echo $_GET['id'];?>&tab=2&view=2";
});
</script>
						  <?php
						  }?>
	</body>	
</html>

<?php 

if(date("m")==01){
	?><!--<script>
	$(document).ready(function(){
			setTimeout(function(){
			alert("En Febrero las gráficas del año anterior se guardarán en el historial, para dar espacio a los avances de este año, <?php echo date("Y");?>");
			}, 1000);
			
		});
	</script> !--><?php
}
?> 
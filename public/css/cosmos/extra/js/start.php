
<script>
$(document).ready(function(e){
<?php 
if(md5($uData['uufd'])==$uData['s_data']){
?>
	setTimeout(function(){
	 	$("#passSetup").modal("show"); 
	},200);
<?php	
}
?>
			$("#pwt-s1").on( "keyup",function() {
				if($("#pwt-s1").val().length > 5){
					$("#pass1msg").fadeOut();
					$("#pwt-s1").removeClass('c-black');
					$("#pwt-s1").addClass('c-green');
					$("#subreg1").fadeIn();
				}else{
					$("#pass1msg").fadeIn();
					$("#pwt-s1").removeClass('c-green');
					$("#pwt-s1").addClass('c-black');
					$("#subreg1").fadeOut();
				}
            });
			$("#pwt-s2").keyup(function() {
				if($("#pwt-s2").val() == $("#pwt-s1").val()){
					swal({title:'Espere',text:'Esto puede tomar unos segundos',imageUrl:'http://www.curiositest.com/assets/loader-54774a0ce559dd551d51e78d565b3a26.gif'});
					$("#pwt-s2").removeClass('c-black');
					$("#pwt-s2").addClass('c-green');
					$.ajax({
						type: "POST",
						url: "query/main.php?f=changePwd",
						data: 'pass='+$("#pwt-s2").val()+'&id=<?php echo $uData['u_id'];?>',
						cache: false,
						success: function(data){
							if(data){
								window.location.href = "query/secure_logout.php";
							}else{
								swal("Error", "No se pudo cambiar la contraseña", "warning"); 
								var alert = document.querySelector(".sweet-alert"),
								okButton = alert.getElementsByTagName("button")[1];
								$(okButton).click(function(){
									location.reload();
								});
															
							}
						}
					});
				}else{
					$("#pass2msg").fadeIn();
					$("#pwt-s2").removeClass('c-green');
					$("#pwt-s2").addClass('c-black');
				}
            });
			$("#subreg1").click(function(e){
				e.preventDefault;
				$("#pwt-s1").fadeOut('fast');
				$("#subreg1").fadeOut('fast');
				$("#pwt-s2").fadeIn('fast');
				$("#subreg2").fadeIn('fast');
				return false;
			});
			$("#subreg2").click(function(e){
				e.preventDefault;
				$("#pwt-s2").fadeOut('fast');
				$("#subreg2").fadeOut('fast');
				$("#pwt-s1").fadeIn('fast');
				$("#subreg1").fadeIn('fast');
				return false;
			});
});
</script>
<script>
$(document).ready(function(e) {
	window.cosmosColor = '<?php if($color==0){?>.white<?php }?>';
	var blink = function($item){
		setTimeout(function(){
			$($item).css('background-color','rgba(256,256,256,0.8)');
			$($item).css('transform','scale(1.5)');
			setTimeout(function(){
				$($item).css('background-color','rgba(0,0,0,0)');
				$($item).css('transform','scale(1)');
				setTimeout(function(){
					$($item).css('background-color','rgba(256,256,256,0.8)');
					$($item).css('transform','scale(1.5)');
					setTimeout(function(){
						$($item).css('background-color','rgba(0,0,0,0)');
						$($item).css('transform','scale(1)');
						setTimeout(function(){
							$($item).css('background-color','rgba(256,256,256,0.8)');
							$($item).css('transform','scale(1.5)');
							setTimeout(function(){
								$($item).css('background-color','rgba(0,0,0,0)');
								$($item).css('transform','scale(1)');
							},1500);
						},1000);
					},1500);
				},1000);
			},1500);
		},1000);
	};
	
	$("#toStep1").click(function(){
		$("body").css('position','fixed');
		$("#modalDefault").modal('hide');
		$("#step1").modal('show');
		setTimeout(function(){
			blink('#menu-trigger');
			setTimeout(function(){
				$('#menu-trigger').click();
				$('.step1d2').fadeIn('fast');
			},3500);
		},1500);
	});
	$("#toStep2").click(function(){
		$("#step1").modal('hide');
		$("#step2").modal('show');
		setTimeout(function(){
			blink('#top-search');
			setTimeout(function(){
				$('.step2d2').fadeIn('fast');
				$('.tm-search').click();
				$('#searchbox').focus();
			},5500);
		},1500);
	});
	$("#toStep3").click(function(){
		$("#step2").modal('hide');
		$("#top-search-close").click();
		$("#Store").click();
		$("#step3").modal('show');
	});
	$("#toStep4").click(function(){
		$("#step3").modal('hide');
		$("#closeapp").click();
		$("#step4").modal('show');
	});
	$("#toStep4d1").click(function(){
		$(".appRef").first().click();
		blink('#closeapp');
		$("toStep4d1").fadeOut('fast');
		$("#toStep5").fadeIn('fast');
	});
	$("#selectEmp").change(function(){
		$("#selectEmpF").submit();
	});
	$(".app").click(function(){
		$(this).attr("aria-pressed",true);
	});
	$("#searchbox").focus(function(){
		$("#content").css('-webkit-filter', 'blur(20px)');
		$("#content").css('-moz-filter', 'blur(20px)');
		$("#search").fadeIn(1000);
	});
	$("#top-search-close").click(function(){
		$("#content").css('-webkit-filter', 'blur(0px)');
		$("#content").css('-moz-filter', 'blur(0px)');
		$("#search").fadeOut(1000);
		$("#searchbox").val("");
	});
	$("#top-search").click(function(){
		$("#searchbox").focus();
	});
	$('#delCookie').click(function(){
		$.removeCookie('newUser', { path: '/' });
	});
	$('.appRef').click(function(){
		appSelected();
	});
	$('.app2Ref').click(function(){
		$('#menu-trigger').fadeOut('fast',function(){
		$('#app').fadeIn('fast');
		$('header').addClass('open');
		$('.maincosmos').fadeOut('fast');
		$('#top-search').fadeOut('fast');
		$("#bgCont").fadeOut();
		$('#closeapp').fadeIn('fast');
		$('#goBack').fadeIn('fast');
		$('#goForward').fadeIn('fast');
		$('#adjustToggle').fadeIn('fast');
		$('.app').css("-webkit-filter","brightness(1)");
		$('.app').css("-moz-filter","brightness(1)");
		$('body').css("overflow","hidden");
		});
	});
	$('#closeapp').click(function(){
		getMainMenu();
		closeApp();
	});
	$("#appSwitcher").click(function(){
		var a = $('#selector').html();
		$('#selector').html(a)
	});
	$("#mainul").append('<div class="appmenu"></div>');
	$("#OSearch").keypress(function(e){
		if(e.which == 13) {
			if($(this).val()==''){
				$("#searchResult").html('');
			}else{
			$.ajax({
				type: "POST",
				url: "query/main.php?f=searchResults",
				data: "uid=<?php echo $uData['u_id'];?>&search="+$(this).val()+"&empresa=<?php echo $proData['e_id'];?>",
				cache: false,
				success: function(data){
					if(data){
						$("#searchResult").html(data);
					}
				}
			});
			}
		}
	});
	function closeApp(){
		$('#app').css('background','transparent');
		$('#app').fadeOut('fast');
		$('#adjustToggle').fadeOut('fast');
		$("#bgCont").fadeIn();
		$('#goBack').fadeOut('fast');
		$('#goForward').fadeOut('fast');
		$('#mainApps').attr('src','about:blank');	
	}
	function getMainMenu(){
		$('#menu-trigger').css('padding-top','0px !important');
		$('#menu-trigger').html("<a href='#'><img id='mainLogoImg' src='/extra/img/cosmos"+window.cosmosColor+".svg' class='item01'></a>");
		$('#top-search').fadeIn('fast');
		$('.maincosmos').fadeIn('fast');
		$('#closeapp').fadeOut('fast');
		$('.appmenu').fadeOut('fast');
		$('.appmenuitems').fadeOut('fast');
		$("#adjustToggle").data("disable","off");
		$("#adjustToggle").html("<a href='#'><i class='mdn mdn-layers-off'></i></a>");
	}
	function appSelected(){
		$('#menu-trigger').fadeOut('fast',function(){
		$('#app').fadeIn('fast');
		$('header').addClass('open');
		$('.maincosmos').fadeOut('fast');
		$('#top-search').fadeOut('fast');
		$('.appmenu').fadeIn('fast');
		$("#bgCont").fadeOut();
		$('#closeapp').fadeIn('fast');
		$('#goBack').fadeIn('fast');
		$('#goForward').fadeIn('fast');
		$('#adjustToggle').fadeIn('fast');
		$('.app').css("-webkit-filter","brightness(1)");
		$('.app').css("-moz-filter","brightness(1)");
		$('body').css("overflow","hidden");
		});	
	}
	
});
</script>
<script>
		$('.bgSelectorImg').click(function(){
			var background = $(this).data('sour');
			$.ajax({
				type: "POST",
				url: "query/main.php?f=changeBg",
				data: "uid=<?php echo $uData['u_id'];?>&url="+background,
				cache: false,
				success: function(data){
					if(data){
						document.location.reload();
					}else{
						swal('Error','No se pudo cambiar el fondo','error');
					}
				}
			});
		});
		$('#NightModeTag').click(function(){
			if($('header').hasClass('black')){
				$.ajax({
					type: "POST",
					url: "query/main.php?f=changeMode",
					data: "uid=<?php echo $uData['u_id'];?>&mode=255,255,255",
					cache: false,
					success: function(data){
						if(data){
							$('header').removeClass('black');
							$('header').addClass('white');
							$("#mainLogoImg").attr("src","/extra/img/cosmos.svg");
							window.cosmosColor = '';
						}else{
							$("#NightMode").removeAttr('checked');	
						}
					}
				});
			}else if($('header').hasClass('white')){
				$.ajax({
					type: "POST",
					url: "query/main.php?f=changeMode",
					data: "uid=<?php echo $uData['u_id'];?>&mode=0,0,0",
					cache: false,
					success: function(data){
						if(data){
							$('header').removeClass('white');
							$('header').addClass('black');
							$("#mainLogoImg").attr("src","/extra/img/cosmos.white.svg");
							window.cosmosColor = '.white';
						}else{
							$("#NightMode").attr('checked');	
						}
					}
				});
			}
		});
		function toggleFullScreen() {
		  if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
		   (!document.mozFullScreen && !document.webkitIsFullScreen)) {
			if (document.documentElement.requestFullScreen) {  
			  document.documentElement.requestFullScreen();  
			} else if (document.documentElement.mozRequestFullScreen) {  
			  document.documentElement.mozRequestFullScreen();  
			} else if (document.documentElement.webkitRequestFullScreen) {  
			  document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
			}  
			$("#fullscreen").html("<i class='md md-fullscreen-exit'></i> Modo Explorador");
		  } else {  
			if (document.cancelFullScreen) {  
			  document.cancelFullScreen();  
			} else if (document.mozCancelFullScreen) {  
			  document.mozCancelFullScreen();  
			} else if (document.webkitCancelFullScreen) {  
			  document.webkitCancelFullScreen();  
			}  
			$("#fullscreen").html("<i class='md md-fullscreen'></i> Pantalla Completa");
		  } 
		}
	var audioData = '<audio style="display:none;" controls autoplay> <source src="extra/tones/Bleep.mp3" /> <source src="extra/tones/Bleep.wav"/></audio>';
	
		setTimeout(function(){
			$.ajax({
				type: "POST",
				url: "query/main.php?f=checkForUpdates",
				data: "uid=<?php echo $uData['u_id'];?>&uemp=<?php echo $proData['e_id'];?>",
				cache: false,
				success: function(data){
					if(data){
						$('body').append(data);
						$('body').append(audioData);
					}
				}
			});
		},1500);
		setInterval(function(){
			$.ajax({
				type: "POST",
				url: "query/main.php?f=checkForUpdates",
				data: "uid=<?php echo $uData['u_id'];?>",
				cache: false,
				success: function(data){
					if(data){
						$('body').append(data);
						$('body').append(audioData);
					}
				}
			});
		},9000);
		
	<?php if($_GET['e']){
	?>
	if ( window.location == window.parent.location ) {
				swal({   
                    title: "Error <?php echo $_GET['e'];?>",   
                    text: "<?php echo $_GET['ed'];?>", 
					type: "error",  
                    showConfirmButton: true 
                }); 
	} else {
		parent.$("#closeapp").click();
		parent.$("#menu-trigger").fadeIn();
		parent.swal("Error <?php echo $_GET['e'];?>", "<?php echo $_GET['ed'];?>", "error"); 
	}
	<?php	
	}?>
</script>
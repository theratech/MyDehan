<div class="blue-block" style="border-left:solid 1px #CCC;">
				
					<div class="row">
                    	<div class="col-md-12">
							<h3 style="color:#FFF;">Mi Avance</h3><hr style="color:#FFF;"/>
                        </div>
                    </div>
					<div class="row">
						<div class="col-md-7">
							
                                                <div id="avance"></div>
										
										
                             
							
							
							
						</div>
						<div class="col-md-5">
							
							
							
							<!-- Knob Block -->
							<?php $aldata = $_SESSION['aldata']; ?>
							<div class="blue-knob-block" style="border:solid 3px #FFF; color:#FFF;">
                            <h3 style="margin-top:0px; margin-left:55px; padding-top:7px; font-weight:700; color:#FFF;">Mi Nivel</h3>
                            
                           <h1 style="color:#FFF;opacity: 0.5; position:absolute;font-size: 141px;margin-top: -6px;font-weight: 500;"><?php echo $aldata['n_nombre']; ?></h1>
								<ul class="list-inline list-unstyled">
									<li>
											<!-- jQuery Knob -->
											<input type="text" value="<?php echo $aldata['l_nombre']; ?>" class="dial" data-angleArc="250" data-width="100" data-max="25" data-bgColor="rgba(256,256,256,0.2)" data-fgColor="rgba(244, 255, 255, 1)" data-height="100" data-step="1" data-angleOffset="-125" data-inputColor="#FFF" data-readOnly="true"><br/>
											<span class="label label-success">Libro <?php $aldata = $_SESSION['aldata']; echo $aldata['l_nombre']; ?> de 25</span>
									</li>
                                    <li>
                                            <p><?php echo $aldata['l_desc'];?></p>
									</li>
								</ul>
							</div>
							<div class="blue-knob-block" style="border:solid 3px #FFF; color:#FFF;height: 120px;">
                            <h3 style="margin-top:0px; margin-left:55px; padding-top:7px; font-weight:700; color:#FFF;">Siguiente Nivel</h3>
                              <h1 style="color:#FFF;opacity: 0.5; position:absolute;font-size: 141px;margin-top: -6px;font-weight: 500;"><?php echo $aldata['n_nombre']+1; ?></h1>
								<ul class="list-inline list-unstyled">
									<li>
											<!-- jQuery Knob -->
											
											<span class="label label-success">25 Libros</span>
									</li>
                                    <li>
                                            <p> </p>
									</li>
								</ul>
							</div>
						</div>
                        
					</div>
					
					<div class="row" style="margin-top:20px; background:rgba(0,0,0,0.7);">
					
						
						<div class="col-sm-0 col-md-1 col-lg-3">
                        </div>
						<div class="col-sm-12 col-md-10 col-lg-6">
							<!-- OS widget -->
							<div class="widget" style="border-radius:1px; border:none;">

								<!-- Widget head -->
									<h5 class="pull-left" style="font-family:Helvetica Neue, Sans-serif; font-weight:500; padding:10px 10px 10px 10px; border-bottom:solid 1px #09F;width: 100%;">Libro Actual</h5>	
									

								<!-- Widget body -->
								<div class="widget-body no-padd" style="text-align:center; padding-bottom:20px; height:auto;"><br />					
                                			
                                	<img src="../img/libros/<?php echo $aldata['n_nombre']-1;?>.jpg" class="libro" style="margin:10px; opacity:0.8;"/>
									<img src="../img/libros/<?php echo $aldata['n_nombre'];?>.jpg" class="libro actual" style="margin:10px;"/>
									<img src="../img/libros/<?php echo $aldata['n_nombre']+1;?>.jpg" class="libro" style="margin:10px; opacity:0.4;"/>
                                			
                                  
								</div>

								

							</div>
						</div>
                        
						<div class="col-sm-0 col-md-1 col-lg-3">
                        </div>
					
					</div>
				<!-- Black block ends
                    <div class="row" style="margin-top:20px;">
                    	<div class="col-sm-0 col-md-1 col-lg-2">
                        </div>
                    	<div class="col-sm-12 col-md-10 col-lg-8">
                        	<h3 style="color:#FFF; text-align:center;">Libros terminados</h3><hr />
                            <div id="libros"></div>
                        </div>
                    	<div class="col-sm-0 col-md-1 col-lg-2">
                        </div>
                    </div> -->
				
			
				
				<!-- Content starts -->
				
				
				
				<!-- Content ends -->				
			   
            </div>
            <!-- Mainbar ends -->
            
            
         </div>
      </div>
      
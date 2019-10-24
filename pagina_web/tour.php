

<?php 
	if (!isset($_GET['id_dest'])){
		header('location: all_tours_list');
	}
	require_once '../crud/conexion.php';
		
	$dest = $MySQLiconn->query("SELECT vd.id_destino,vd.nombre_dest,vd.desc_corta,vd.desc_larga,
													vd.imagen,vd.precio,vd.dias,vd.minimo,vd.direccion,
													cat.descripcion as categoria,cat.tag
													FROM v_destinos AS vd
													INNER JOIN (
														SELECT DISTINCT cat.id_categoria, cat.descripcion,ma.id_destino,t.descripcion as tag
														FROM categoria cat
														inner join tags t on cat.id_tag = t.id_tag
														INNER JOIN actividad a ON cat.id_categoria = a.id_categoria
														INNER JOIN maestro_act ma ON a.id_actividad = ma.id_actividad) AS cat 
														ON cat.id_destino = vd.id_destino
													WHERE vd.id_estatus = 1
													AND vd.id_destino=".$_GET['id_dest']);
  $countdest = mysqli_num_rows($dest);
  if( $countdest == 0)
				  {
				   header('location: all_tours_list');
				  }
  	
  $getDEST = $dest->fetch_array();
 
	include_once '../includes/menu.php'; 
 
	
	

?>
	<!-- End Header -->

	<section class="parallax-window" data-parallax="scroll" data-image-src="../<?php echo $getDEST['imagen']?>" data-natural-width="1400" data-natural-height="470">
		<div class="parallax-content-2">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-8">
						<h1><?php echo $getDEST['nombre_dest']?></h1>
						<span><?php echo $getDEST['direccion']?>.</span>
						<span class="rating"><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><small>(75)</small></span>
					</div>
					<div class="col-md-4 col-sm-4">
						<div id="price_single_main">
							from/per person <span><sup>$</sup><?php echo $getDEST['precio']?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End section -->

	<main>
		<div id="position">
			<div class="container">
				<ul>
					<li><a href="../index">Home</a>
					</li>
					<li><a href="#">Category</a>
					</li>
					<li><?php echo $getDEST['nombre_dest']?></li>
				</ul>
			</div>
		</div>
		<!-- End Position -->

		<div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
		</div>
		<!-- End Map -->

		<div class="container margin_60">
			<div class="row">
				<div class="col-md-8" id="single_tour_desc">
					<div id="single_tour_feat">
						<ul>
						<?php 
							$contenido_d = $MySQLiconn->query("select t.class,t.descripcion
																from maestro_contenido ma
																inner join tags t on t.id_tag = ma.id_tag
																where ma.id_destino = ".$_GET['id_dest']);
							while ($l_contenido_d = mysqli_fetch_array($contenido_d))
							{
								
							

						?>
							<li><i class="<?php echo $l_contenido_d['class']?>"></i><?php echo $l_contenido_d['descripcion']?></li>
						<?php
								}
								?>
						</ul>
					</div>

					<p class="visible-sm visible-xs"><a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
					</p>
					<!-- Map button for tablets/mobiles -->

					<div id="Img_carousel" class="slider-pro">
						<div class="sp-slides">

							<div class="sp-slide">
								<img alt="Image" class="sp-image" src="../css/images/blank.gif" 
                        data-src="../img/slider_single_tour/leon/1_medium.jpg" 
                        data-small="../img/slider_single_tour/leon/1_medium.jpg" 
                        data-medium="../img/slider_single_tour/leon/1_medium.jpg" 
                        data-large="../img/slider_single_tour/leon/1_medium.jpg" 
                        data-retina="../img/slider_single_tour/leon/1_medium.jpg">
							</div>
							<div class="sp-slide">
								<img alt="Image" class="sp-image" src="../css/images/blank.gif" 
                        data-src="../img/slider_single_tour/leon/2_medium.jpg" 
                        data-small="../img/slider_single_tour/leon/2_medium.jpg" 
                        data-medium="../img/slider_single_tour/leon/2_medium.jpg" 
                        data-large="../img/slider_single_tour/leon/2_medium.jpg" 
                        data-retina="../img/slider_single_tour/leon/2_medium.jpg">
								<h3 class="sp-layer sp-black sp-padding" data-horizontal="40" data-vertical="40" data-show-transition="left">
                        Lorem ipsum dolor sit amet </h3>
								<p class="sp-layer sp-white sp-padding" data-horizontal="40" data-vertical="100" data-show-transition="left" data-show-delay="200">
									consectetur adipisicing elit
								</p>
								<p class="sp-layer sp-black sp-padding" data-horizontal="40" data-vertical="160" data-width="350" data-show-transition="left" data-show-delay="400">
									sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</p>
							</div>

							<div class="sp-slide">
								<img alt="Image" class="sp-image" src="../css/images/blank.gif" 
                        data-src="../img/slider_single_tour/leon/3_medium.jpg" 
                        data-small="../img/slider_single_tour/leon/3_medium.jpg" 
                        data-medium="../img/slider_single_tour/leon/3_medium.jpg" 
                        data-large="../img/slider_single_tour/leon/3_medium.jpg" 
                        data-retina="../img/slider_single_tour/leon/3_medium.jpg">
								<p class="sp-layer sp-white sp-padding" data-position="centerCenter" data-vertical="-50" data-show-transition="right" data-show-delay="500">
									Lorem ipsum dolor sit amet
								</p>
								<p class="sp-layer sp-black sp-padding" data-position="centerCenter" data-vertical="50" data-show-transition="left" data-show-delay="700">
									consectetur adipisicing elit
								</p>
							</div>

							<div class="sp-slide">
								<img alt="Image" class="sp-image" src="../css/images/blank.gif" 
                        data-src="../img/slider_single_tour/leon/4_medium.jpg" 
                        data-small="../img/slider_single_tour/leon/4_medium.jpg" 
                        data-medium="../img/slider_single_tour/leon/4_medium.jpg" 
                        data-large="../img/slider_single_tour/leon/4_medium.jpg" 
                        data-retina="../img/slider_single_tour/leon/4_medium.jpg">
								<p class="sp-layer sp-black sp-padding" data-position="bottomLeft" data-vertical="0" data-width="100%" data-show-transition="up">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</p>
							</div>

							<div class="sp-slide">
								<img alt="Image" class="sp-image" src="../css/images/blank.gif" 
                        data-src="../img/slider_single_tour/leon/5_medium.jpg" 
                        data-small="../img/slider_single_tour/leon/5_medium.jpg" 
                        data-medium="../img/slider_single_tour/leon/5_medium.jpg" 
                        data-large="../img/slider_single_tour/leon/5_medium.jpg" 
                        data-retina="../img/slider_single_tour/leon/5_medium.jpg">
								<p class="sp-layer sp-white sp-padding" data-vertical="5%" data-horizontal="5%" data-width="90%" data-show-transition="down" data-show-delay="400">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</p>
							</div>

							<div class="sp-slide">
								<img alt="Image" class="sp-image" src="../css/images/blank.gif" 
                        data-src="../img/slider_single_tour/leon/6_medium.jpg" 
                        data-small="../img/slider_single_tour/leon/6_medium.jpg" 
                        data-medium="../img/slider_single_tour/leon/6_medium.jpg" 
                        data-large="../img/slider_single_tour/leon/6_medium.jpg" 
                        data-retina="../img/slider_single_tour/leon/6_medium.jpg">
								<p class="sp-layer sp-white sp-padding" data-horizontal="10" data-vertical="10" data-width="300">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</p>
							</div>

							<div class="sp-slide">
								<img alt="Image" class="sp-image" src="../css/images/blank.gif" 
                        data-src="../img/slider_single_tour/leon/7_medium.jpg" 
                        data-small="../img/slider_single_tour/leon/7_medium.jpg" 
                        data-medium="../img/slider_single_tour/leon/7_medium.jpg" 
                        data-large="../img/slider_single_tour/leon/7_medium.jpg" 
                        data-retina="../img/slider_single_tour/leon/7_medium.jpg">
								<p class="sp-layer sp-black sp-padding" data-position="bottomLeft" data-horizontal="5%" data-vertical="5%" data-width="90%" data-show-transition="up" data-show-delay="400">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								</p>
							</div>

							<div class="sp-slide">
								<img alt="Image" class="sp-image" src="../css/images/blank.gif" 
                        data-src="../img/slider_single_tour/leon/8_medium.jpg" 
                        data-small="../img/slider_single_tour/leon/8_medium.jpg" 
                        data-medium="../img/slider_single_tour/leon/8_medium.jpg" 
                        data-large="../img/slider_single_tour/leon/8_medium.jpg" 
                        data-retina="../img/slider_single_tour/leon/8_medium.jpg">
								<p class="sp-layer sp-black sp-padding" data-horizontal="50" data-vertical="50" data-show-transition="down" data-show-delay="500">
									Lorem ipsum dolor sit amet
								</p>
								<p class="sp-layer sp-white sp-padding" data-horizontal="50" data-vertical="100" data-show-transition="up" data-show-delay="500">
									consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
								</p>
							</div>

							<div class="sp-slide">
								<img alt="Image" class="sp-image" src="../css/images/blank.gif" 
                        data-src="../img/slider_single_tour/leon/9_medium.jpg" 
                        data-small="../img/slider_single_tour/leon/9_medium.jpg" 
                        data-medium="../img/slider_single_tour/leon/9_medium.jpg" 
                        data-large="../img/slider_single_tour/leon/9_medium.jpg" 
                        data-retina="../img/slider_single_tour/leon/9_medium.jpg">
							</div>
						</div>
						<div class="sp-thumbnails">
					<img alt="Image" class="sp-thumbnail" src="../img/slider_single_tour/leon/1_medium.jpg">
                    <img alt="Image" class="sp-thumbnail" src="../img/slider_single_tour/leon/2_medium.jpg">
                    <img alt="Image" class="sp-thumbnail" src="../img/slider_single_tour/leon/3_medium.jpg">
                    <img alt="Image" class="sp-thumbnail" src="../img/slider_single_tour/leon/4_medium.jpg">
                    <img alt="Image" class="sp-thumbnail" src="../img/slider_single_tour/leon/5_medium.jpg">
                    <img alt="Image" class="sp-thumbnail" src="../img/slider_single_tour/leon/6_medium.jpg">
                    <img alt="Image" class="sp-thumbnail" src="../img/slider_single_tour/leon/7_medium.jpg">
                    <img alt="Image" class="sp-thumbnail" src="../img/slider_single_tour/leon/8_medium.jpg">
                    <img alt="Image" class="sp-thumbnail" src="../img/slider_single_tour/leon/9_medium.jpg">
						</div>
					</div>

					<hr>

					<div class="row">
						<div class="col-md-3">
							<h3>Descripción</h3>
						</div>
						<div class="col-md-9">
							<h4><?php echo $getDEST['nombre_dest']?></h4>
							<p>
								<?php echo $getDEST['desc_larga']?>.
							</p>
							<h4>Qué incluye</h4>
							<p>
								Lorem ipsum dolor sit amet, at omnes deseruisse pri. Quo aeterno legimus insolens ad. Sit cu detraxit constituam, an mel iudico constituto efficiendi.
							</p>
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<ul class="list_ok">
										<li>Transporte privado(ida y vuelta)</li>
										<li>Guia de turista</li>
										<li>Entradas</li>
										<?php 
										$actividad = $MySQLiconn->query("select a.descripcion
																		from maestro_act ma
																		inner join actividad a on a.id_actividad = ma.id_actividad
																		where ma.id_destino = ".$_GET['id_dest']);
										while ($lactividad = mysqli_fetch_array($actividad))
										{
																					
										?>
										
										<li><?php echo $lactividad['descripcion']?></li>
										
										<?php }?>
									</ul>
								</div>
								<!--<div class="col-md-6 col-sm-6">
									<ul class="list_ok">
										<li>Lorem ipsum dolor sit amet</li>
										<li>No scripta electram necessitatibus sit</li>
										<li>Quidam percipitur instructior an eum</li>
										<li>No scripta electram necessitatibus sit</li>
									</ul>
								</div>-->
							</div>
							<h4>Información Practica</h4>
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<ul class="list_ok">
										<li>Traer zapatos deportivos , agua.</li>
										<li>Apropiado para edades: 10-65 Años.</li>
										<li>Duración: <?php echo $getDEST['dias']?> Dias</li>
										<li>Minimo: <?php echo $getDEST['minimo']?> Personas</li>
									</ul>
								</div>
							</div>
							<!-- End row  -->
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-3">
							<h3>Horarios</h3>
						</div>
						<div class="col-md-9">

							<div class=" table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th colspan="2">
												Dias
											</th>
										</tr>
									</thead>
									<tbody>
					<?php 
						$horarios = $MySQLiconn->query("select CONCAT(UCASE(SUBSTRING(rd.dias, 1, 				1)), LOWER(SUBSTRING(rd.dias, 2))) AS dias,t.inicio,t.fin
									from horario_destino as hd
									inner join tiempo t on hd.id_tiempo = t.id_tiempo
									inner join rango_dias rd on hd.id_rango_dias = rd.id_rango_dias
									where hd.id_destino = ".$_GET['id_dest']."
									order by rd.id_rango_dias");
						while ($lhorarios = mysqli_fetch_array($horarios))
						{ 

					?>
										<tr>
											<td>
												<?php echo $lhorarios['dias']?>
											</td>
											<td>
												<?php echo date('h:i A',strtotime($lhorarios['inicio'])).'-'.date('h:i A',strtotime($lhorarios['fin']))?>
											</td>
										</tr>
					<?php }?>
										</tbody>
								</table>
							</div>

						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-3">
							<h3>Reviews </h3>
							<a href="#" class="btn_1 add_bottom_30" data-toggle="modal" data-target="#myReview">Leave a review</a>
						</div>
						<div class="col-md-9">
							<div id="general_rating">11 Reviews
								<div class="rating">
									<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
								</div>
							</div>
							<!-- End general_rating -->
							<div class="row" id="rating_summary">
								<div class="col-md-6">
									<ul>
										<li>Position
											<div class="rating">
												<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
											</div>
										</li>
										<li>Tourist guide
											<div class="rating">
												<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i>
											</div>
										</li>
									</ul>
								</div>
								<div class="col-md-6">
									<ul>
										<li>Price
											<div class="rating">
												<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
											</div>
										</li>
										<li>Quality
											<div class="rating">
												<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<!-- End row -->
							<hr>
							<?php 
							  $review = $MySQLiconn->query("select CONCAT (u.nombre,' ',u.apellido) AS n_apellidos,u.imagen,r.limpieza,r.puntualidad,
							  r.at_cliente, r.fecha, r.Comentario from rating r
							  inner join usuario u on r.id_usuario = u.id_usuario
							  where r.estatus = 1
							  and r.id_destino = ".$_GET['id_dest']);
							
							while ($lreview = mysqli_fetch_array($review))
								{ 
								 	$date = date_create($lreview['fecha']);
									$fechaformat = date_format($date, 'd M Y');
							?>
							<div class="review_strip_single">
								<img src="../<?php echo $lreview['imagen']?>" width="80" height="80" alt="Image" class="img-circle">
								<small> - <?php echo $fechaformat ?> -</small>
								<h4><?php echo $lreview['n_apellidos']?></h4>
								<p>
									"<?php echo $lreview['Comentario']?>."
								</p>
								<div class="rating">
									<i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i class="icon-smile"></i><i class="icon-smile"></i>
								</div>
							</div>
							
							<?php } ?>
							<!-- End review strip -->
						</div>
					</div>
				</div>
				<!--End  single_tour_desc-->

				<aside class="col-md-4" id="sidebar">
					<p class="hidden-sm hidden-xs">
						<a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
					</p>
					<div class="theiaStickySidebar">
						<div class="box_style_1 expose" id="booking_box">
							<h3 class="inner">- Booking -</h3>
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<!--<div class="form-group">
										<label><i class="icon-calendar-7"></i> Select a date</label>
										<input class="date-pick form-control" data-date-format="M d, D" type="text" id="datepicker" name="datepicker">
									</div>-->
									<div class="form-group">
													<label>Date:</label>

													<div class="input-group date">
													  <div class="input-group-addon">
														<i class="fa fa-calendar"></i>
													  </div>
													  <input class="form-control " id="datepicker" type="text" name="datepicker" value="" readonly>
													</div>
													<!-- /.input group -->
												  </div>
								</div>
								<div class="col-md-6 col-sm-6">
									<!--<div class="form-group">
										<label><i class=" icon-clock"></i> Time</label>
										<input class="time-pick form-control" value="12:00 AM" type="text">
									</div>-->
									<div class="form-group form-control-sm">
										        <div class="input-group date">
													<label>Horario</label>
													<select class="form-control" name="horario" id="horario" required placeholder="Seleccione horario" required >

														<option value="">Seleccione horario</option>
														
														
													</select>
													</div>

												</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Adults</label>
										<div class="numbers-row">
											<input type="text" value="1" id="adults" class="qty2 form-control" name="quantity">
										</div>
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Children</label>
										<div class="numbers-row">
											<input type="text" value="0" id="children" class="qty2 form-control" name="quantity">
										</div>
									</div>
								</div>
							</div>
							<br>
							<table class="table table_summary">
								<tbody>
									<tr>
										<td>
											Adults
										</td>
										<td class="text-right">
											2
										</td>
									</tr>
									<tr>
										<td>
											Children
										</td>
										<td class="text-right">
											0
										</td>
									</tr>
									<tr>
										<td>
											Total amount
										</td>
										<td class="text-right">
											3x $52
										</td>
									</tr>
									<tr class="total">
										<td>
											Total cost
										</td>
										<td class="text-right">
											$154
										</td>
									</tr>
								</tbody>
							</table>
							<a class="btn_full" href="cart.html">Book now</a>
							<a class="btn_full_outline" href="#"><i class=" icon-heart"></i> Add to whislist</a>
						</div>
						<!--/box_style_1 -->
					</div>
					<!--/sticky -->

				</aside>
			</div>
			<!--End row -->
		</div>
		<!--End container -->
        
        <div id="overlay"></div>
		<!-- Mask on input focus -->
    
	</main>
	<!-- End main -->

	<?php include_once '../includes/footer.php' ?>

	<div id="toTop"></div><!-- Back to top button -->
	


	<!-- Modal Review -->
	<div class="modal fade" id="myReview" tabindex="-1" role="dialog" aria-labelledby="myReviewLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myReviewLabel">Write your review</h4>
				</div>
				<div class="modal-body">
					<div id="message-review">
					</div>
					<form method="post" action="assets/review_tour.php" name="review_tour" id="review_tour">
						<input name="tour_name" id="tour_name" type="hidden" value="Paris Arch de Triomphe Tour">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input name="name_review" id="name_review" type="text" placeholder="Your name" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input name="lastname_review" id="lastname_review" type="text" placeholder="Your last name" class="form-control">
								</div>
							</div>
						</div>
						<!-- End row -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<input name="email_review" id="email_review" type="email" placeholder="Your email" class="form-control">
								</div>
							</div>
						</div>
						<!-- End row -->
						<hr>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Position</label>
									<select class="form-control" name="position_review" id="position_review">
										<option value="">Please review</option>
										<option value="Low">Low</option>
										<option value="Sufficient">Sufficient</option>
										<option value="Good">Good</option>
										<option value="Excellent">Excellent</option>
										<option value="Superb">Super</option>
										<option value="Not rated">I don't know</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Tourist guide</label>
									<select class="form-control" name="guide_review" id="guide_review">
										<option value="">Please review</option>
										<option value="Low">Low</option>
										<option value="Sufficient">Sufficient</option>
										<option value="Good">Good</option>
										<option value="Excellent">Excellent</option>
										<option value="Superb">Super</option>
										<option value="Not rated">I don't know</option>
									</select>
								</div>
							</div>
						</div>
						<!-- End row -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Price</label>
									<select class="form-control" name="price_review" id="price_review">
										<option value="">Please review</option>
										<option value="Low">Low</option>
										<option value="Sufficient">Sufficient</option>
										<option value="Good">Good</option>
										<option value="Excellent">Excellent</option>
										<option value="Superb">Super</option>
										<option value="Not rated">I don't know</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Quality</label>
									<select class="form-control" name="quality_review" id="quality_review">
										<option value="">Please review</option>
										<option value="Low">Low</option>
										<option value="Sufficient">Sufficient</option>
										<option value="Good">Good</option>
										<option value="Excellent">Excellent</option>
										<option value="Superb">Super</option>
										<option value="Not rated">I don't know</option>
									</select>
								</div>
							</div>
						</div>
						<!-- End row -->
						<div class="form-group">
							<textarea name="review_text" id="review_text" class="form-control" style="height:100px" placeholder="Write your review"></textarea>
						</div>
						<div class="form-group">
							<input type="text" id="verify_review" class=" form-control" placeholder="Are you human? 3 + 1 =">
						</div>
						<input type="submit" value="Submit" class="btn_1" id="submit-review">
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End modal review -->

	<!-- Common scripts -->
	<!--<script data-cfasync="false" src="/cdn-cgi/scripts/f2bf09f8/cloudflare-static/email-decode.min.js"></script>-->
    <script src="../js/jquery-2.2.4.min.js"></script>
	<script src="../js/common_scripts_min.js"></script>
	<script src="../js/functions.js"></script>
	<!-- date-range-picker -->
	<script src="../../bower_components/moment/min/moment.min.js"></script>
	<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap datepicker -->
	<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<!-- bootstrap color picker -->
	<script src="../../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
	<!-- bootstrap time picker -->
	<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
	<!-- FastClick -->
	<script src="../bower_components/fastclick/lib/fastclick.js"></script>
	<!-- iCheck 1.0.1 -->
	<script src="../../plugins/iCheck/icheck.min.js"></script>
	<script src="../../assets/validate.js"></script>
	<script src="../../bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js"></script>

	<!-- Map -->
<!-- 
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAUQKuq-IHkzCt4VoGq2z4XYJ_ip7ZRkws"></script>-->
                                   
	<script src="../../js/map.js"></script>
	<script src="../../js/infobox.js"></script>

	<!-- Fixed sidebar -->
	<script src="../../js/theia-sticky-sidebar.js"></script>

	<!-- Specific scripts -->
	<!--<script src="../js/icheck.js"></script>-->
	<!--<script>
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-grey',
			radioClass: 'iradio_square-grey'
		});
	</script>-->
	<!-- Date and time pickers -->
	<script src="../js/jquery.sliderPro.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function ($) {
			$('#Img_carousel').sliderPro({
				width: 960,
				height: 500,
				fade: true,
				arrows: true,
				buttons: false,
				fullScreen: false,
				smallSize: 500,
				startSlide: 0,
				mediumSize: 1000,
				largeSize: 3000,
				thumbnailArrows: true,
				autoplay: false
			});
		});
	</script>

	<!-- Date and time pickers -->
	<!--<script src="../js/bootstrap-datepicker.js"></script>-->
    
	<!--<script src="../js/bootstrap-timepicker.js"></script>-->
   

	<!--<script>
		//$('input.date-pick').datepicker('setDate', 'today');
		$('input.time-pick').timepicker({
			minuteStep: 15,
			showInpunts: false
		})
	</script>-->

	<!--Review modal validation -->
	
	<script>
		jQuery('#sidebar').theiaStickySidebar({
			additionalMarginTop: 80
		});
		
		$( window ).on( "load", function() {
        //console.log( "window loaded" );
			var id_dest= <?php echo $_GET['id_dest'] ?>;
			dias_semanas(id_dest);
			busca_horarios(id_dest);
    	});
		
		var dias_semanas = function(id){
		var dest= id;
		$.ajax({
		  type: 'POST',
		  url: '../crud/actividades.php',
		  data: {'id_dest_sem': dest}
		  //dataType: 'json'
		})
		.done(function(semanas){
		  //Date picker
			  var rango=semanas;
			  //console.log(rango);
			$('#datepicker').datepicker({
			  language: 'es',
			  autoclose: true,
			  format: "yyyy-mm-dd",
			  min: new Date(),
			  startDate: new Date(),
			  daysOfWeekDisabled: rango,
			  disabled: true
			});
					  
		  //alert(precio)
		})
		.fail(function(){
		  alert('Hubo un error al cargar las semanas')
		})
	};
	var busca_horarios = function(id){
		var dest= id;
		$.ajax({
		  type: 'POST',
		  url: '../crud/actividades.php',
		  data: {'id_dest_hor': dest}
		  //dataType: 'json'
		})
		.done(function(horario){
		  //combo horario
			//console.log(horario);
			  $('#horario').html(horario);
			
		  //alert(precio)
		})
		.fail(function(){
		  alert('Hubo un error al cargar los horarios')
		})
		
	};
	</script>
</body>

</html>
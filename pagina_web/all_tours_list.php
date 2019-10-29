	

  
<?php 
	require_once '../crud/conexion.php';
	include_once '../includes/menu.php' ?>

	<section class="parallax-window" data-parallax="scroll" data-image-src="../img/home_bg_volcan.jpg" data-natural-width="1400" data-natural-height="470">
		<div class="parallax-content-1">
			<div class="animated fadeInDown">
				<h1>Lava Tour in Volcan Masaya</h1>
				<p>Lava Tour / Tour Tickets / Tour Guides.</p>
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
					<li><a href="#">All tours list</a>
					</li>
					<li>Page active</li>
				</ul>
			</div>
		</div>
		<!-- Position -->

		<!--<div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
		</div>-->
        
        
		<!-- End Map -->


		<div class="container margin_60">

			<div class="row">
				<aside class="col-lg-3 col-md-3">
					<!--<p>
						<a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
					</p>-->
					<?php if(!isset($_GET['desc'])) {?>
				  <div class="box_style_cat">
						<ul id="cat_nav">
							
							<?php
								$cat_nav=$MySQLiconn->query("SELECT count( distinct ma.id_destino) as 									cant_tours,cat.descripcion,t.descripcion as tag
															FROM categoria cat
															inner join tags t on cat.id_tag = t.id_tag
															INNER JOIN actividad a ON cat.id_categoria = a.id_categoria
															INNER JOIN maestro_act ma ON a.id_actividad = ma.id_actividad
															INNER JOIN (
																SELECT dest.id_destino
																FROM destino dest
																WHERE estatus=1) AS d ON d.id_destino = ma.id_destino
															group by cat.id_categoria
															ORDER BY cat.id_categoria");
								$c_tours=$MySQLiconn->query("SELECT d.id_destino FROM destino as d where d.estatus =1");
								$cant_tours= $c_tours->num_rows;
							
							?>
							<li class = "fill" id="all"><a href="#"><i class="icon_set_1_icon-51"></i>All tours <span>(<?php echo $cant_tours?>)</span></a>
							</li>
							<?php
								while ($nav_categoria=mysqli_fetch_array($cat_nav)) 
								{
							?>
							<li class = "fill" id="<?php echo $nav_categoria['descripcion']?>"><a href="#"><i class="<?php echo $nav_categoria['tag']?>"></i><?php echo $nav_categoria['descripcion']?> <span>(<?php echo $nav_categoria['cant_tours']?>)</span></a>
							</li>
							<?php
								}
								//mysqli_free_result($cat_nav);
								//mysqli_free_result($c_tours);
								//mysqli_close($MySQLiconn);
								//if ($cat_nav) { mysqli_close($cat_nav);

							//$mysqli->close();
							?>
						</ul>
					</div>
					<?php } ?>
<!--End filters col-->
					<div class="box_style_2">
						<i class="icon_set_1_icon-57"></i>
						<h4>Need <span>Help?</span></h4>
					  <a href="tel://0050589603207" class="phone">+505 8960 3207</a>
						<small>Monday to Sunday <!--9.00am - 7.30pm--></small>
				  </div>
				</aside>
				<!--End aside -->
				<div class="col-lg-9 col-md-9" id="parent"> <!--/tools -->
				<?php 
					
					$query = "SELECT vd.id_destino,vd.nombre_dest,vd.desc_corta,
													vd.imagen,vd.precio,vd.direccion,
													cat.descripcion as categoria,cat.tag,ifnull(b.`desc`,'comun') AS `desc`
													FROM v_destinos AS vd
													INNER JOIN (
														SELECT DISTINCT cat.id_categoria, cat.descripcion,ma.id_destino,t.descripcion as tag
														FROM categoria cat
														inner join tags t on cat.id_tag = t.id_tag
														INNER JOIN actividad a ON cat.id_categoria = a.id_categoria
														INNER JOIN maestro_act ma ON a.id_actividad = ma.id_actividad) AS cat 
														ON cat.id_destino = vd.id_destino
													LEFT JOIN (SELECT g.id_destino,
														CASE 
															WHEN g.conteo >= 5 THEN 'mvistos'
															WHEN g.conteo >= 3 THEN 'hot'  
															ELSE 'comun'
															END AS 'desc'
														FROM (
														SELECT b.id_destino, COUNT(b.id_destino) conteo
														FROM busquedas b
														GROUP BY b.id_destino) AS g) b ON b.id_destino = vd.id_destino
														WHERE vd.id_estatus = 1";
					if (isset($_GET['desc'])){
						$where = $_GET['desc'];
						if($where=='hot') {
							$query = $query." AND ifnull(b.`desc`,'comun') = 'hot'";
						} elseif ($where=='vistos'){
							$query = $query." AND ifnull(b.`desc`,'comun') = 'mvistos'";
						} else {
							$query = $query.' ';
						}
						
					}
					$tour_list = $MySQLiconn->query($query);	
					while ($all_tour_list=mysqli_fetch_array($tour_list))
					{ 
				
				?>
				  <div class="strip_all_tour_list wow fadeIn <?php echo $all_tour_list['categoria']?>" data-wow-delay="0.1s">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4">
								<div class="ribbon_3 popular"><span>Top rated</span>
								</div>
						<div class="img_list">
						  <a href="tour?id_dest=<?php echo $all_tour_list['id_destino']?>"><img src="../<?php echo $all_tour_list['imagen']?>" alt="Image">
						  <div class="short_info"><i class="<?php echo $all_tour_list['tag']?>"></i><?php echo $all_tour_list['categoria']?> </div>
									</a>
								</div>
							</div>
							<div class="clearfix visible-xs-block"></div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<div class="tour_list_desc">
									<div class="rating"><i class="icon-smile voted"></i><i class="icon-smile  voted"></i><i class="icon-smile  voted"></i><i class="icon-smile  voted"></i><i class="icon-smile voted"></i><small>(100)</small>
									</div>
									<h3><strong><?php echo $all_tour_list['nombre_dest']?></strong> tour</h3>
									<p><?php echo $all_tour_list['desc_corta']?></p>
									<ul class="add_info">
										<li>
											<div class="tooltip_styled tooltip-effect-4">
												<span class="tooltip-item"><i class="icon_set_1_icon-83"></i></span>
												<div class="tooltip-content">
													<h4>Horarios</h4>
										<?php 
											$horario = $MySQLiconn->query("SELECT t.inicio,t.fin,rd.dias
																			FROM horario_destino AS hd
																			INNER JOIN tiempo t ON t.id_tiempo = hd.id_tiempo
																			INNER JOIN rango_dias rd ON rd.id_rango_dias = t.id_rango_dias
																			WHERE hd.estatus = 1 AND hd.id_destino = ".$all_tour_list['id_destino']." order by rd.id_rango_dias");
											while ($horarios = mysqli_fetch_array($horario))
											{ 
													
													?>
													<strong><?php echo $horarios['dias']?></strong> <?php echo date('h:i A',strtotime($horarios['inicio'])).'-'.date('h:i A',strtotime($horarios['fin']))?>
													<br>
													
											<?php 
												}
												?>
<!--																										<strong>Sunday</strong> <span class="label label-danger">Closed</span>-->
												</div>
											</div>
										</li>
										<li>
											<div class="tooltip_styled tooltip-effect-4">
												<span class="tooltip-item"><i class="icon_set_1_icon-41"></i></span>
												<div class="tooltip-content">
													<h4>Dirección</h4> <?php echo $all_tour_list['direccion']?>
													<br>
												</div>
											</div>
										</li>
										<li>
											<div class="tooltip_styled tooltip-effect-4">
												<span class="tooltip-item"><i class="icon_set_1_icon-97"></i></span>
												<div class="tooltip-content">
													<h4>Idiomas</h4> English - Spanish
												</div>
											</div>
										</li>
										<li>
											<div class="tooltip_styled tooltip-effect-4">
												<span class="tooltip-item"><i class="icon_set_1_icon-27"></i></span>
												<div class="tooltip-content">
													<h4>Parqueo</h4> <?php echo 'parqueo'?>
													<br>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2">
								<div class="price_list">
									<div><sup>$</sup><?php echo $all_tour_list['precio']?>*<span class="normal_price_list">$<?php echo $all_tour_list['precio']?></span><small>*Per person</small>
										<p><a href="tour?id_dest=<?php echo $all_tour_list['id_destino']?>" class="btn_1">Detalle</a>
										</p>
									</div>

								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				 
				
<!--End strip -->
					
                    
                

					<hr>

					

			  	</div>
				<!-- End col lg-9 -->
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
	</main>
	<!-- End main -->

	<?php include_once '../includes/footer.php' ?>
	<!-- End footer -->

	<div id="toTop"></div><!-- Back to top button -->
	
	

	<!-- Common scripts -->
	<script src="../js/jquery-1.11.2.min.js"></script>
	<script src="../js/common_scripts_min.js"></script>

	<script src="../js/functions.js"></script>

	<!-- Specific scripts -->
	<!-- Cat nav mobile -->
	<script src="../js/cat_nav_mobile.js"></script>
	<script>
		$('#cat_nav').mobileMenu();
	</script>
	<!-- Check and radio inputs -->
	<script src="../js/icheck.js"></script>
	<script>
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-grey',
			radioClass: 'iradio_square-grey'
		});
	</script>

	<script>
		var $btns = $('.fill').click(function() {
		  if (this.id == 'all') {
		    $('#parent > div').fadeIn(450);
		  } else {
		    var $el = $('.' + this.id).fadeIn(450);
		    $('#parent > div').not($el).hide();
		  }
		  $btns.removeClass('active');
		  $(this).addClass('active');
		});
	</script>
	<!-- Map -->
    <!--<script>

      // The following example creates complex markers to indicate beaches near
      // Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
      // to the base of the flagpole.

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: {lat: 12.2, lng: -85.1}
        });

        setMarkers(map);
      }

      // Data for the markers consisting of a name, a LatLng and a zIndex for the
      // order in which these markers should display on top of each other.
      var beaches = [
        ['Masaya', 11.9288488, -85.9773091, 4],
        ['Granada', 11.9750111, -86.1102345, 5],
        ['Leon',12.4339937,-86.9170986, 6],
        ['San Juan del Sur',11.2600445,-85.8855627,7]
      ];

      function setMarkers(map) {
        // Adds markers to the map.

        // Marker sizes are expressed as a Size of X,Y where the origin of the image
        // (0,0) is located in the top left of the image.

        // Origins, anchor positions and coordinates of the marker increase in the X
        // direction to the right and in the Y direction down.
        var image = {
          url: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
          // This marker is 20 pixels wide by 32 pixels high.
          size: new google.maps.Size(20, 32),
          // The origin for this image is (0, 0).
          origin: new google.maps.Point(0, 0),
          // The anchor for this image is the base of the flagpole at (0, 32).
          anchor: new google.maps.Point(0, 32)
        };
        // Shapes define the clickable region of the icon. The type defines an HTML
        // <area> element 'poly' which traces out a polygon as a series of X,Y points.
        // The final coordinate closes the poly by connecting to the first coordinate.
        var shape = {
          coords: [1, 1, 1, 20, 18, 20, 18, 1],
          type: 'poly'
        };
        for (var i = 0; i < beaches.length; i++) {
          var beach = beaches[i];
          var marker = new google.maps.Marker({
            position: {lat: beach[1], lng: beach[2]},
            map: map,
            icon: "img/pinkball.png",
            shape: shape,
            title: beach[0],
            zIndex: beach[3]
          });
        }
      }
    </script>
	<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRXAcbXN3SvGS0BD5i2IouRfnGD8l1Wh0&callback=initMap">
    </script>-->
	<!--<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBRXAcbXN3SvGS0BD5i2IouRfnGD8l1Wh0&callback=initMap"></script>
	<script src="js/map.js"></script>
    <script src="js/infobox.js"></script>-->
<script>/* <![CDATA[ */(function(d,s,a,i,j,r,l,m,t){try{l=d.getElementsByTagName('a');t=d.createElement('textarea');for(i=0;l.length-i;i++){try{a=l[i].href;s=a.indexOf('/cdn-cgi/l/email-protection');m=a.length;if(a&&s>-1&&m>28){j=28+s;s='';if(j<m){r='0x'+a.substr(j,2)|0;for(j+=2;j<m&&a.charAt(j)!='X';j+=2)s+='%'+('0'+('0x'+a.substr(j,2)^r).toString(16)).slice(-2);j++;s=decodeURIComponent(s)+a.substr(j,m-j)}t.innerHTML=s.replace(/</g,'&lt;').replace(/\>/g,'&gt;');l[i].href='mailto:'+t.value}}catch(e){}}}catch(e){}})(document);/* ]]> */</script></body>
</body>
</html>
<?php 
require_once '../crud/conexion.php';
include_once '../includes/menu.php'; 
?>

	<section class="parallax-window" data-parallax="scroll" data-image-src="../img/home_bg_ometepe.jpg" data-natural-width="1400" data-natural-height="470">
		<div class="parallax-content-1">
			<div class="animated fadeInDown">
				<h1>Galeria</h1>
				<!-- <p>Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.</p> -->
			</div>
		</div>
	</section>
	<!-- End Section -->

	<main>
		<div id="position">
			<div class="container">
				<ul>
					<li><a href="../index">Home</a></li>
                    <li>Galeria</li>
				</ul>
			</div>
		</div>
		<!-- End Position -->

		<div class="container margin_60">
			<div class="main_title">
				<h2>Algunas <span>imagenes</span> de nuestros tours</h2>
				<p>
					Lugares que visitaras.
				</p>
			</div>
			<hr>
			<div class="row magnific-gallery add_bottom_60 "><!--fotos-->
				<?php 
				$image_list = $MySQLiconn->query("SELECT d.id_destino,d.nombre_dest,d.imagen
												  FROM destino d
												  WHERE d.estatus = 1");	
					while ($all_image_list=mysqli_fetch_array($image_list))
					{ 
				
				?>
				<div class="col-md-4 col-sm-4">
					<div class="img_wrapper_gallery">
						<div class="img_container_gallery">
							<a href="../<?php echo $all_image_list['imagen']?>" title="Photo title"><img src="../<?php echo $all_image_list['imagen']?>" alt="Image" class="img-responsive">
								<i class="icon-resize-full-2"></i>
							</a>
						</div>
					</div>
				</div>
				<?php } ?>
			</div><!--end fotos-->
			<!-- End row -->
			<div class="main_title"><!--videos-->
				<h2>Algunos <span>videos</span> de viajeros</h2>
				<p>
					Estos videos muestran algunos de nuestros mejores lugares.
				</p>
			</div>
			<hr>
			<div class="row"><!--videos-->
				<div class="col-md-4 col-sm-4">
					<div class="img_wrapper_gallery">
						<div class="img_container_gallery">
							<a href="https://www.youtube.com/watch?v=8nhcqKII-pQ" class="video" title="Video Youtube"><img src="../img/slider_single_tour/isletas/7_medium.jpg" alt="Image" class="img-responsive"><i class="icon-resize-full-2"></i>
							</a>
						</div>
					</div>
				</div>
			</div><!--fin videos-->
			<!-- End row -->

		</div>
		<!-- End container -->
	</main>
	<!-- End main -->

	<?php include_once '../includes/footer.php' ?>

	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- Search Menu -->
	<!--<div class="search-overlay-menu">
		<span class="search-overlay-close"><i class="icon_set_1_icon-77"></i></span>
		<form role="search" id="searchform" method="get">
			<input value="" name="q" type="search" placeholder="Search..." />
			<button type="submit"><i class="icon_set_1_icon-78"></i>
			</button>
		</form>
	</div>-->
<!-- End Search Menu -->

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

<script>/* <![CDATA[ */(function(d,s,a,i,j,r,l,m,t){try{l=d.getElementsByTagName('a');t=d.createElement('textarea');for(i=0;l.length-i;i++){try{a=l[i].href;s=a.indexOf('/cdn-cgi/l/email-protection');m=a.length;if(a&&s>-1&&m>28){j=28+s;s='';if(j<m){r='0x'+a.substr(j,2)|0;for(j+=2;j<m&&a.charAt(j)!='X';j+=2)s+='%'+('0'+('0x'+a.substr(j,2)^r).toString(16)).slice(-2);j++;s=decodeURIComponent(s)+a.substr(j,m-j)}t.innerHTML=s.replace(/</g,'&lt;').replace(/\>/g,'&gt;');l[i].href='mailto:'+t.value}}catch(e){}}}catch(e){}})(document);/* ]]> */</script></body>

</body>

</html>
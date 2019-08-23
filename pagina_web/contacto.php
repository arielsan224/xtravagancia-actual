<?php 
require_once '../crud/conexion.php';
include_once '../includes/menu.php'; 
?>
    
    <section class="parallax-window-1" data-parallax="scroll" data-image-src="../img/home_bg_granada.jpg" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-10">
            <div class="animated fadeInDown">
            <h1>Contact us</h1>
            <!-- <p>Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.</p> -->
            </div>
        </div>
    </section><!-- End Section -->
<main>
    <div id="position">
    	<div class="container">
                	<ul>
                    <li><a href="../index">Home</a></li>
                        <li>Contacto</li>
                    </ul>
        </div>
    </div><!-- End Position -->

<div class="container margin_60">
	<div class="row">
		<div class="col-md-8 col-sm-8">
			<div class="form_title">
				<h3><strong><i class="icon-pencil"></i></strong>Rellena el siguiente formulario</h3>
				<p>
					Nos comunicaremos con usted tan pronto como sea posible.
				</p>
			</div>
			<div class="step">
            
				
                <!-- <form method="POST" action="/cgi-bin/FormMail.cgi" id="contactform" name="formContacto">  -->
                <form role="form" action="../php/contacto.php" method="POST" id="contacto" title="Nombre">
                    <!-- <input type=hidden name="recipient" value="arielfit@gmail.com"> 
                    <input type=hidden name="subject" value="Asunto del mail que se envia"> 
                    <input type=hidden name="redirect" value="http://eledatours.comxa.com/contact.html"> -->
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
                                <!-- <input type="hidden" name="action" value="submit"> -->
								<label>Nombre</label>
								<input type="text" class="form-control" id="name_contact" name="name_contact" placeholder="Nombres" required>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Apellido</label>
								<input type="text" class="form-control" id="lastname_contact" name="lastname_contact" placeholder="Apellidos" required>
							</div>
						</div>
					</div>
					<!-- End row -->
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Email</label>
								<input type="email" id="email_contact" name="email_contact" class="form-control" placeholder="Email" required>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label>Teléfono</label>
								<input type="text" id="phone_contact" name="phone_contact" class="form-control" placeholder="Teléfono" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Mensaje</label>
								<textarea rows="5" id="message_contact" name="message_contact" class="form-control" placeholder="Mensaje" style="height:200px;" required></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<!-- <input name="submit" type="submit" value="Send email" class="btn_1" id="submit"> -->
                            <input class="btn btn-primary" type="submit" name="enviar" tabindex="7" value="Enviar">&nbsp <input type="reset" tabindex="8" class="btn btn-primary" value="Borrar">
                            <input type="hidden" name="estado" value="1">
						</div>
					</div>
				</form>
                
                	</div>
		</div><!-- End col-md-8 -->
        
		<div class="col-md-4 col-sm-4">
			<div class="box_style_1">
				<span class="tape"></span>
				<h4>Dirección <span><i class="icon-pin pull-right"></i></span></h4>
				<p>
					Iglesia la merced 1 cuadra oeste , 2 1/2 cuadra sur, Casa numero 303, Granada
				</p>
				<hr>
				<h4>Centro de Ayuda <span><i class="icon-help pull-right"></i></span></h4>
				<p>
					
				</p>
				<ul id="contact-info">
					<li>+ 00505 8960-3207</li>
					<li><a href='#'>el&#101;da&#46;&#116;ransp&#111;&#114;&#116;&#101;&#46;ni&#99;&#97;&#64;&#103;m&#97;il&#46;&#99;om</a></li>
				</ul>
			</div>
			<div class="box_style_4">
				<i class="icon_set_1_icon-57"></i>
				<h4>Necesita <span>Ayuda?</span></h4>
				<a href="tel://0050589603207" class="phone">+00505 8960-3207</a>
				<small>Lunes a Domingo 6.00am - 11pm</small>
			</div>
		</div><!-- End col-md-4 -->
	</div><!-- End row -->
</div><!-- End container -->
<!--
< div id="map_contact"></div>end map
<div id="directions">
      <div class="container">
        <div class="row">
        <div class="col-md-8 col-md-offset-2">
       <form action="http://maps.google.com/maps" method="get" target="_blank">
                <div class="input-group">
                    <input type="text" name="saddr" placeholder="Enter your starting point" class="form-control style-2" />
                    <input type="hidden" name="daddr" value="New York, NY 11430"/>Write here your end point
                    <span class="input-group-btn">
                    <button class="btn" type="submit" value="Get directions" style="margin-left:0;">GET DIRECTIONS</button>
                    </span>
                </div>/input-group
            </form>
          </div>
        </div>
    </div>
  </div>end directions -->
</main>

<?php include_once '../includes/footer.php' ?>

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
<!-- <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBRXAcbXN3SvGS0BD5i2IouRfnGD8l1Wh0"></script> -->
<!-- <script src="js/map_contact.js"></script> -->
<!-- <script src="js/infobox.js"></script> -->


  <script>/* <![CDATA[ */(function(d,s,a,i,j,r,l,m,t){try{l=d.getElementsByTagName('a');t=d.createElement('textarea');for(i=0;l.length-i;i++){try{a=l[i].href;s=a.indexOf('/cdn-cgi/l/email-protection');m=a.length;if(a&&s>-1&&m>28){j=28+s;s='';if(j<m){r='0x'+a.substr(j,2)|0;for(j+=2;j<m&&a.charAt(j)!='X';j+=2)s+='%'+('0'+('0x'+a.substr(j,2)^r).toString(16)).slice(-2);j++;s=decodeURIComponent(s)+a.substr(j,m-j)}t.innerHTML=s.replace(/</g,'&lt;').replace(/\>/g,'&gt;');l[i].href='mailto:'+t.value}}catch(e){}}}catch(e){}})(document);/* ]]> */</script>
</body>

</html>
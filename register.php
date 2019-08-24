<?php 
require_once 'crud/conexion.php';
include_once 'includes/menu.php'; 
include_once 'crud/crud_register_user.php';
if ( isset( $_SESSION[ 'message' ] ) /*&& $_SESSION['message']*/ ) {
	$mensajito = $_SESSION[ 'message' ];

}
?>
<main>
    <section id="hero" class="login">
    	<div class="container">
        	<div class="row justify-content-center">
            	<div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
							<!-- /.box-header -->
                	<div id="login">
                    		<div class="text-center"><img src="img/logo_sticky.png" alt="Image" data-retina="true" ></div>
						<?php if (isset($mensajito)) {?>
							<div class="alert alert-info alert-dismissible text-center" role="alert">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<?php 
								echo $mensajito; 
								$mensajito=null;
								/*$_SESSION['message'] = false;*/
								unset($_SESSION['message']);

								?>
								
							</div>
							<?php } ?>
                            <hr>
                           <form method="post">
                                <div class="form-group">
                                	<label>Nombres</label>
                                    <input type="text" class=" form-control"  placeholder="Nombres" id="nombres" name="nombres">
                                </div>
							    <div class="form-group">
                                	<label>Apellidos</label>
                                    <input type="text" class=" form-control"  placeholder="Apellidos" id="apellidos" name="apellidos">
                                </div>
                                <div class="form-group">
                                	<label>Email</label>
                                    <input type="email" class=" form-control" placeholder="Email" id="email" name="email">
                                </div>
                                <div class="form-group">
                                	<label>Password</label>
                                    <input type="password" class=" form-control" id="password1" placeholder="Password" name="password1">
                                </div>
                                <div class="form-group">
                                	<label>Confirme password</label>
                                    <input type="password" class=" form-control" id="password2" placeholder="Confirm password" name="password2">
                                </div>
                                <div id="pass-info" class="clearfix"></div>
                                <button class="btn_full" name="save">Crear cuenta</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </section>
	</main><!-- End main -->

<?php include_once 'includes/footer.php' ?>

<div id="toTop"></div><!-- Back to top button -->

 <!-- Common scripts -->
	<script src="js/jquery-1.11.2.min.js"></script>
	<script src="js/common_scripts_min.js"></script>

	<script src="js/functions.js"></script>

	<!-- Specific scripts -->
	<!-- Cat nav mobile -->
	<script src="js/cat_nav_mobile.js"></script>
	<script>
		$('#cat_nav').mobileMenu();
	</script>
	<!-- Check and radio inputs -->
	<script src="js/icheck.js"></script>
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
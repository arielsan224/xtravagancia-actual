<?php 
session_start();
if(!isset($_SESSION['userId'])) {
	header('location: index');
	//exit();
} 

require_once 'crud/conexion.php';
include_once 'includes/menu.php' ;
include_once 'crud/c_user.php';

$user_id = $_SESSION['userId'];
$sql = "SELECT * FROM usuario WHERE id_usuario = {$user_id}";
$query = $MySQLiconn->query($sql);
$result = $query->fetch_assoc();

$MySQLiconn->close();
?>

<section class="parallax-window-1" data-parallax="scroll" data-image-src="/xtravagancia/img/home_bg_granada.jpg" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-10">
            <div class="animated fadeInDown">
            <h1>Perfil</h1>
            <!-- <p>Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.</p> -->
            </div>
        </div>
    </section><!-- End Section -->
<main>
    <div id="position">
    	<div class="container">
                	<ul>
                    <li><a href="/xtravagancia/index">Home</a></li>
                        <li>Perfil</li>
                    </ul>
        </div>
    </div><!-- End Position -->

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-wrench"></i> Perfil</div>
			</div> <!-- /panel-heading -->

			<div class="panel-body">

				
				<form method="post" class="form-horizontal" id="changePasswordForm">
					<fieldset>
						<legend>Cambiar Correo Electronico</legend>

						<div class="changeUsenrameMessages"></div>			

						<div class="form-group">
					    <label for="email" class="col-sm-2 control-label">Email</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $result['email']; ?>"/>
					    </div>
					  </div>
					</fieldset>
					<fieldset>
						
						<legend>Cambiar Contraseña</legend>

						<div class="changePasswordMessages"></div>

						<div class="form-group">
					    <label for="password" class="col-sm-2 control-label">Contraseña Actual</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="password" name="password" placeholder="Current Password">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="npassword" class="col-sm-2 control-label">Nueva Contraseña</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="npassword" name="npassword" placeholder="New Password">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="cpassword" class="col-sm-2 control-label">Confirm Password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
					    </div>
					  </div>

					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					    	<input type="hidden" name="user_id" id="user_id" value="<?php echo $result['id_usuario'] ?>" /> 
					      <button type="submit" class="btn btn-primary" name="update"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes </button>
					      
					    </div>
					  </div>


					</fieldset>
				</form>

			</div> <!-- /panel-body -->		

		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->	
</div> <!-- /row-->


<script src="custom/js/setting.js"></script>
<?php include_once 'includes/footer.php' ?>

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

<script>/* <![CDATA[ */(function(d,s,a,i,j,r,l,m,t){try{l=d.getElementsByTagName('a');t=d.createElement('textarea');for(i=0;l.length-i;i++){try{a=l[i].href;s=a.indexOf('/cdn-cgi/l/email-protection');m=a.length;if(a&&s>-1&&m>28){j=28+s;s='';if(j<m){r='0x'+a.substr(j,2)|0;for(j+=2;j<m&&a.charAt(j)!='X';j+=2)s+='%'+('0'+('0x'+a.substr(j,2)^r).toString(16)).slice(-2);j++;s=decodeURIComponent(s)+a.substr(j,m-j)}t.innerHTML=s.replace(/</g,'&lt;').replace(/\>/g,'&gt;');l[i].href='mailto:'+t.value}}catch(e){}}}catch(e){}})(document);/* ]]> */</script></body>

</body>

</html>
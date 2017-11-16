<?php
include_once 'crud/crud_mun.php';


$limit =10;
if (isset($_GET['pag']))
{
	$pag=(int)$_GET['pag'];
}
else 
 $pag=1;
$offset =($pag-1)*$limit;

if (isset($_SESSION['message'])/*&& $_SESSION['message']*/)
{
	$mensajito=$_SESSION['message'];
	
}

?>
<!DOCTYPE html>
<!--[if IE 8]><html class="ie ie8"> <![endif]-->
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="Xtravagancia - Agencia de Viajes.">
	<meta name="author" content="Ansonika">
	<title>XTRAVAGANCIA - Nicaragua Tours</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
	
	<!-- Google web fonts -->
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Lato:300,400|Montserrat:400,400i,700,700i" rel="stylesheet">

	<!-- CSS -->
	<link href="css/base.css" rel="stylesheet">

	<!-- Radio and check inputs -->
	<link href="css/skins/square/grey.css" rel="stylesheet">

	<!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body>

	<!--[if lte IE 8]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p>
<![endif]-->

	<!--<div id="preloader">
		<div class="sk-spinner sk-spinner-wave">
			<div class="sk-rect1"></div>
			<div class="sk-rect2"></div>
			<div class="sk-rect3"></div>
			<div class="sk-rect4"></div>
			<div class="sk-rect5"></div>
		</div>
	</div>-->
	<!-- End Preload -->

	<div class="layer"></div>
	<!-- Mobile menu overlay mask -->

	<!-- Header================================================== -->
    <?php include("includes/menu.php");?>
	
	<!-- End Header -->

	<section id="hero_2">
	  <div class="intro_title animated fadeInDown">
		<h1>Municipio</h1>
		  <!-- End bs-wizard -->
		</div>
		<!-- End intro-title -->
	</section>
	<!-- End Section hero_2 -->

	<main>
		<div id="position">
			<div class="container">
				<ul>
					<li><a href="#">Home</a>
					</li>
					<li><a href="#">Category</a>
					</li>
					<li>Page active</li>
				</ul>
			</div>
		</div>
		<!-- End position -->
        
        <div class="container margin_40">
        
		<?php if (isset($mensajito)) {?>
		<div class="alert alert-success text-center" role="alert">
			<?php 
				echo $mensajito; 
				$mensajito=null;
				/*$_SESSION['message'] = false;*/
				unset($_SESSION['message']);
				
			?>
		</div>
	<?php } ?>
		
			<form method="post"><div class="row">
				
                <div class="col-md-12 add_bottom_15">
<div>
			
        <div class="row">
							<?php
							if (isset($_GET['edit']))
							{
								?>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Departamento</label>
									<input type="text" class="form-control" id="nombre_depto" placeholder="Nombre departamento" name="nombre_depto" disabled value="<?php if(isset($_GET['edit'])) echo $getROW['nombre_depto']; ?>" required>
								</div>
							</div>
							<?php
							}
							else
							{
							?>
                            <div class="col-md-6 col-sm-6">
						    <div class="form-group">
						      <label>Departamento</label>
						      <select class="form-control" name="id_depto" id="id_depto" required>
						        <option value="" >Seleccione departamento</option>
						        <?php
			$dep = $MySQLiconn->query("SELECT * FROM departamento");
			while($row=$dep->fetch_array())
			{					
            ?>
                                <option value="<?php echo $row['id_depto'];  ?>"><?php echo $row['nombre_depto'];  ?></option>
                                
                                <?php
			}
			?>
						      </select>
					        </div>
					      </div>
                          <?php
			}
			?>
          <div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Nombre de municipio</label>
								  <input type="text" class="form-control" id="nombre_depto" placeholder="Nombre municipio" name="nombre_municipio" value="<?php if(isset($_GET['edit'])) echo $getROW['nombre_municipio'];  ?>" required>
								</div>
						</div>
          </div>
		  <div class="row"></div>
<div class="row"> </div>
			  </div>
					<!--End step -->
					<!--End step -->
					<!--End step -->

					<!--<div id="policy">
						<h4>Cancellation policy</h4>-->
						<!--<div class="form-group">
							<label>
								<input type="checkbox" name="policy_terms" id="policy_terms">I accept terms and conditions and general policy.</label>
						</div>-->
						<?php
if(isset($_GET['edit']))
{
	?>
                        <button  class="btn_1 green medium" name="update">Editar</a>
                        
                        <?php
}
else
{
	?>
	<button class="btn_1 green medium" name="save">Aceptar</a>
	<?php
}
?>
					</div>
				</div>
                </form>
</div>
			<!--End row -->
        <div class="container margin_40" > 
        <table class="table table-inverse " >
          <thead>
            <tr>
              <th>Id</th>
              <th>Departamento</th>
              <th>Municipio</th>
              <th colspan="2" style="text-align:center;" >Acciones</th>
            </tr>
          </thead>
          <tbody>
	     <?php
			$mun = $MySQLiconn->query("SELECT mun.id_municipio,dep.nombre_depto, mun.nombre_municipio 
FROM municipio mun inner join departamento dep on mun.id_depto = dep.id_depto 
order by mun.Id_municipio limit $offset,$limit");
			$total_mun = $MySQLiconn->query("SELECT mun.id_municipio
from municipio mun inner join departamento dep on mun.id_depto = dep.id_depto");

			$total= $total_mun-> num_rows;
			while($row=$mun->fetch_array())
			{					
            ?>
            <tr>
              <!--<th scope="row">1</th>-->
              <td ><?php echo $row['id_municipio']; ?></td>
              <td ><?php echo $row['nombre_depto']; ?></td>
              <td ><?php echo $row['nombre_municipio']; ?></td>
              <td width="10%"><a href="?edit=<?php echo $row['id_municipio']; ?>" onclick="return confirm('Estas seguro que desea editar!'); " >edit</a></td>
    		  <td width="10%"><a href="?del=<?php echo $row['id_municipio']; ?>" onclick="return confirm('Estas seguro que desea borrar el registro !'); " >delete</a></td>
            </tr>
            <?php
			}
			?>
			

          </tbody>
    
        </table>
        	<nav aria-label="...">
			  <ul class="pagination justify-content-center">
			    <?php
			$total_pag = ceil($total/$limit);
			$links= array();
			for ($i=1; $i <=$total_pag; $i++)
			{
				if($pag == $i) // Es igual a la pagina que estoy lo resalto
					{	
				?>
				<li class="page-item active"><a class="page-link" href="?pag=<?php echo $i; ?>"><?php echo $i; ?> <span class="sr-only">(current)</span></a>
			    <?php 
			    	}
				else  // No lo resalto
				{
			    ?>
				<li class="page-item"><a class="page-link" href="?pag=<?php echo $i; ?>"><?php echo $i; ?></a></li>
				<?php 
					}
				?>
    </li>
			    <?php	
			}
			?>
			  </ul>
			</nav>
		</div>

		
		</div>
		<!--End container -->
	</main>
	<!-- End main -->
	<!-- Start footer -->
	<?php include("includes/footer.php");?>
	<!-- End footer -->

	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- Search Menu -->
	<!--<div class="search-overlay-menu">
		<span class="search-overlay-close"><i class="icon_set_1_icon-77"></i></span>
		<form role="search" id="searchform" method="get">
			<input value="" name="q" type="search" placeholder="Search..." />
			<button type="submit"><i class="icon_set_1_icon-78"></i>
			</button>
		</form>
	</div>--><!-- End Search Menu -->

	<!-- Common scripts -->
	<script src="js/jquery-2.2.4.min.js"></script>
	<script src="js/common_scripts_min.js"></script>
	<script src="js/functions.js"></script>

	<!-- Specific scripts -->
	<script src="js/icheck.js"></script>
	<script>
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-grey',
			radioClass: 'iradio_square-grey'
		});
	</script>

<script>/* <![CDATA[ */(function(d,s,a,i,j,r,l,m,t){try{l=d.getElementsByTagName('a');t=d.createElement('textarea');for(i=0;l.length-i;i++){try{a=l[i].href;s=a.indexOf('/cdn-cgi/l/email-protection');m=a.length;if(a&&s>-1&&m>28){j=28+s;s='';if(j<m){r='0x'+a.substr(j,2)|0;for(j+=2;j<m&&a.charAt(j)!='X';j+=2)s+='%'+('0'+('0x'+a.substr(j,2)^r).toString(16)).slice(-2);j++;s=decodeURIComponent(s)+a.substr(j,m-j)}t.innerHTML=s.replace(/</g,'&lt;').replace(/\>/g,'&gt;');l[i].href='mailto:'+t.value}}catch(e){}}}catch(e){}})(document);/* ]]> */</script></body>

</html>
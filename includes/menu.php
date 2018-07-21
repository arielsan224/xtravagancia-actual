<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="EledaTours - Tours & Transportations.">
    <meta name="author" content="Arlo Productions">
    <title>XTRAVAGANCIA TOURS - Nicaragua tours</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
	
	<!-- jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    

    <!-- BASE CSS -->
    <link href="/xtravagancia/css/base.css" rel="stylesheet">

    <!-- Google web fonts -->
   <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Gochi+Hand" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet" type="text/css">

    <!-- REVOLUTION SLIDER CSS -->
    <link href="/xtravagancia/rs-plugin/css/settings.css" rel="stylesheet">
    <link href="/xtravagancia/css/extralayers.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

 <!--analitics-->      


  
</head>

<body>

	<!--<div id="preloader">
        <div class="sk-spinner sk-spinner-wave">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div>-->
    <div class="layer"></div>
    <!-- Mobile menu overlay mask -->
<!-- Header================================================== -->
    <header>
        <div id="top_line visible_on_mobile">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6"><i class="icon-phone"></i><strong>00505 8960-3207</strong></div>
                    
                    <div class="col-md-6 col-sm-6 col-xs-6">
						<ul id="top_links">
                            <li>
                                <div class="dropdown dropdown-access">
                                    <a href="#" class="show-submenu" data-toggle="dropdown" id="access_link" aria-expanded="false">Iniciar Sesion</a>
                                    <div class="dropdown-menu">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="inputUsernameEmail" placeholder="Correo electrónico">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="inputPassword" placeholder="Contraseña">
                                        </div>
                                        <a id="forgot_pw" href="#">Olvidaste contaseña?</a>
                                        <a id="forgot_pw" href="/xtravagancia/login">Eres Administrador?</a>
                                        <input type="submit" name="Sign_in" value="Iniciar Sesion" id="Sign_in" class="button_drop" style="text-align: center;">
                                        <input type="submit" name="Sign_up" value="Registrate" id="Sign_up" class="button_drop outline">
                                    </div>
                                </div><!-- End Dropdown access -->
                            </li>
                        </ul>
					</div>
                </div><!-- End row -->
            </div><!-- End container-->
        </div><!-- End top line-->
        
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <div id="logo_home">
                    	<h1><a href="/xtravagancia/index" title="Xtravagancia Tours">Xtravagancia Tours</a></h1>
                    </div>
                </div>
                <nav class="col-md-9 col-sm-9 col-xs-9">
                    <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                    <div class="main-menu">
                        <div id="header_menu">
                            <img src="/xtravagancia/img/logo_sticky.png" width="208" height="94" alt="Eleda tours" data-retina="true">
                        </div>
                        <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                        <ul>
                           <?php 
							
							$menu = $MySQLiconn->query("SELECT sm.*
														FROM  r_menu_sub AS sm 
														WHERE id_tipo_usuario=2
															and sm.acceso = 1
														ORDER BY secuencia_sub_menu");
							
							while ($lmenu = mysqli_fetch_array($menu))
							{
							
							?>
                            <li class="submenu">
                               <?php 
								if($lmenu['title']=='Tours')
								{
								?>
                                <a href="javascript:void(0);" class="show-submenu"><?php echo $lmenu['title']?> <i class="icon-down-open-mini"></i></a>
                             
                               <ul>
								<li><a href="/xtravagancia/pagina_web/all_tours_list">Todos los tours</a></li>
								<?php 
								$cat = $MySQLiconn->query("SELECT distinct cat.id_categoria, cat.descripcion
															FROM categoria cat
															inner join actividad a on cat.id_categoria = a.id_categoria
															inner join maestro_act ma on a.id_actividad = ma.id_actividad
															order by cat.id_categoria");
								while ($categoria = mysqli_fetch_array($cat))
								{
								 
								?>
								
								<li><a href="javascript:void(0);"><?php echo $categoria['descripcion']?> </a>
								 <ul>
								 <?php
								   $dest = $MySQLiconn->query("select distinct d.id_destino,d.nombre_dest
																from destino d
																inner join maestro_act ma on d.id_destino = ma.id_destino
																inner join actividad a on ma.id_actividad = a.id_actividad
																where a.id_categoria = '".$categoria['id_categoria'].
															 	"' order by d.id_destino");
									while ($destinos = mysqli_fetch_array($dest))
									{
								  ?>
								  <li><a href="/xtravagancia/pagina_web/tour?id_dest=<?php echo $destinos['id_destino']?>"><?php echo $destinos['nombre_dest']?></a>
								  </li>
								 <?php
									}
								 ?>
								 </ul>
								</li>
								<?php }?>
							  </ul>
                                <?php }
								elseif (!isset($_SESSION['userId']) )
									{															
								?>
                           <a href="/xtravagancia/<?php echo $lmenu['url']?>" class="show-submenu"><?php echo $lmenu['title']?> <i class=""></i></a>
                            <?php }
								
                               else 
									{															
								?>
                           <a href="busquedas" class="show-submenu">Busquedas <i class=""></i></a>
                           <a href="reservaciones" class="show-submenu">Reservaciones <i class=""></i></a>
                            <?php }?>
                                
                            </li>
                            
                            <?php }?>
                            
<!--
                               <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">Tours <i class="icon-down-open-mini"></i></a>
                                </li>
-->
                            </ul>
                    </div><!-- End main-menu -->                </nav>
            </div>
        </div><!-- container -->
    </header><!-- End Header -->

	

<!--</body>-->
<!--</html>-->
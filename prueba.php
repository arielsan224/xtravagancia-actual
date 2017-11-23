<?php
include_once 'crud/crud_dest.php';

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Advanced form elements</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
    <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
<!--  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">-->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <form action="crud/test.php" method="post">
  
<!--
  <div class="col-md-6">
              <div class="form-group">
                <label>Multiple</label>
                <select name="id[]" class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                        style="width: 100%;">
                  <option value="1">Alabama</option>
                  <option value="2">Alaska</option>
                  <option value="3">California</option>
                  <option value="4">Delaware</option>
                  <option value="5">Tennessee</option>
                  <option value="6">Texas</option>
                  <option value="7">Washington</option>
                </select>
              </div>
-->
              <!-- /.form-group -->
              
              <!-- /.form-group -->
<!--            </div>-->
           <div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Actividades</label>
													<select id="actividad" name="actividad[]" class="form-control select2 " multiple="multiple" data-placeholder="Actividades"
                        							style="width: 100%;">
                        							<?php
														if(isset($_GET['edit'])){
														$act = $MySQLiconn->query( "SELECT * FROM actividad where id_categoria=1" );
														$selected_ids = array();
														$result1 =$MySQLiconn->query("SELECT id_actividad from maestro_act where id_destino = 1");
														while($row1 = mysqli_fetch_assoc($result1))
														{
															$selected_ids[] = $row1['id_actividad'];
															
														}
														
														while ( $row = mysqli_fetch_assoc($act) ) {
																															
//															if ( $getROW2[ 'id_actividad' ] == $row[ 'id_actividad' ] ) 
															if(in_array($row['id_actividad'], $selected_ids))
															{
																?>
														<option selected value="<?php echo $row['id_actividad'];  ?>">
															<?php echo $row['descripcion'];  ?>
														</option>

														<?php
																next($getROW2);
														} else {
															?>
														<option value="<?php echo $row['id_actividad'];  ?>">
															<?php echo $row['descripcion'];  ?>
														</option>
														<?php
														}
																
														}
															}
														?>
                        							</select>
												</div>
												<?php
												var_dump ($selected_ids);
			   									echo $row['id_actividad'];
			   									?>
											</div>
            
</form>            
  
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->

<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    
  })
</script>
</body>
</html>

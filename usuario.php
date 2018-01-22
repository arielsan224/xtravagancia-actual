<?php
include_once 'crud/crud_user.php';

if(isset($_GET['edit']))
{
?>
<script type="text/javascript">
	window.onload = function() {
        $(document).ready(function () {
            $("#myModal").modal();
        });
		}
</script>

<?php
}

//$limit = 10;
//if ( isset( $_GET[ 'pag' ] ) ) {
//	$pag = ( int )$_GET[ 'pag' ];
//} else
//	$pag = 1;
//$offset = ( $pag - 1 ) * $limit;

if ( isset( $_SESSION[ 'message' ] ) /*&& $_SESSION['message']*/ ) {
	$mensajito = $_SESSION[ 'message' ];

}



?>




<div class="layer"></div>
<!-- Mobile menu overlay mask -->

<!-- Menu================================================== -->
<?php include("includes/dashboard.php");?>

<!-- End Menu -->


<!-- End position -->

<!--		<div class="container margin_40">-->


			<!-- Modal -->
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header bg-modal">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Usuarios</h4>
						</div>
						<div class="modal-body">

							<form method="post">
								<div class="row">

									<div class="col-md-12 add_bottom_15">
										<div>

										<div class="row">

											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Email</label>
													<input type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?php if(isset($_GET['edit'])) echo $getROW['email'];  ?>" required>
												</div>
											</div>

											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Contraseña</label>
													<input type="password" class="form-control" id="password" placeholder="Contraseña" name="password" value="<?php if(isset($_GET['edit'])) echo $getROW['password'];  ?>" required>
												</div>
											</div>

											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Nombre</label>
													<input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value="<?php if(isset($_GET['edit'])) echo $getROW['nombre'];  ?>" required>
												</div>
											</div>

											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Apellido</label>
													<input type="text" class="form-control" id="apellido" placeholder="Apellido" name="apellido" value="<?php if(isset($_GET['edit'])) echo $getROW['apellido'];  ?>" required>
												</div>
											</div>
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Tipo usuario</label>
													<select class="form-control" name="id_tipo_usuario" id="id_tipo_usuario" required>
														<option value="">Seleccione tipo usuario</option>
														<?php
														$usrtip = $MySQLiconn->query( "SELECT * FROM tipo_usuario" );
														while ( $row = $usrtip->fetch_array() ) {
															if ( $getROW['id_tipo_usuario' ] == $row[ 'id_tipo_usuario' ] ) {
																?>
														<option selected value="<?php echo $row['id_tipo_usuario'];  ?>">
															<?php echo $row['descripcion'];  ?>
														</option>

														<?php
														} else {
															?>
														<option value="<?php echo $row['id_tipo_usuario'];  ?>">
															<?php echo $row['descripcion'];  ?>
														</option>
														<?php
														}
														}
														?>
													</select>
												</div>
											</div>
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Estatus</label>
													<select class="form-control" name="id_estatus" id="id_estatus" required>
														<option value="">Seleccione estatus</option>
														<?php
														$usrest = $MySQLiconn->query( "SELECT * FROM estatus" );
														while ( $row = $usrest->fetch_array() ) {
															if ( $getROW['id_estatus' ] == $row[ 'id_estatus' ] ) {
																?>
														<option selected value="<?php echo $row['id_estatus'];  ?>">
															<?php echo $row['descripcion'];  ?>
														</option>

														<?php
														} else {
															?>
														<option value="<?php echo $row['id_estatus'];  ?>">
															<?php echo $row['descripcion'];  ?>
														</option>
														<?php
														}
														}
														?>
													</select>
												</div>
											</div>

</div>

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
										if ( isset( $_GET[ 'edit' ] ) ) {
											?>
										<button class="btn btn-warning" name="update">Editar</a>

										<?php
										}
										else
										{
										?>
										<button class="btn btn-primary" name="save">Aceptar</a>
										<?php
										}
										?>
									</div>
							</div>
						</form>
					</div>
						<div class="modal-footer bg-modal-footer">
						  <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
						</div>
								</div>
				</div>
			</div>
<!--		</div>-->
		<!--End row -->
		<div class="content-wrapper">
			<section class="content-header">
						<h1>
						Catalogos
						<small>Usuarios</small>
						</h1>

						<ol class="breadcrumb">
							<li><a href="#"><i class="fa fa-dashboard"></i> Home</a>
							</li>
							<li><a href="#">Catalogos</a>
							</li>
							<li class="active">Usuarios</li>
						</ol>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Listado de Usuarios</h3>
								<button type="button" class="btn btn-info btn-md pull-right" data-toggle="modal" data-target="#myModal">Agregar</button>
							</div>
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
							<!-- /.box-header -->
							<div class="box-body">
							<table id="dtatable" class="table table-bordered table-hover dataTable dt-responsive nowrap" >
                              <thead>  
                               <tr>  
								  <td>Id</td>
								  <td>Nombre</td>
								  <td>Apellido</td>
<!--								  <td>Password</td>-->
								  <td>Email</td>
								  <td>Tipo</td>
								  <td>Estatus</td>
                                  <td style="text-align:center;">Acciones</td>
                               </tr>  
                          	 </thead>  
                          <?php 
						 
						$res = $MySQLiconn->query("SELECT us.id_usuario,us.nombre, us.apellido,us.password,us.email, 
													  tu.descripcion as tipo,es.descripcion as estatus 
													FROM usuario as us
													inner join tipo_usuario as tu on us.id_tipo_usuario = tu.id_tipo_usuario
													inner join estatus as es on us.id_estatus=es.id_estatus
													order by us.id_usuario ");
						while($row = mysqli_fetch_array($res))  
                          {  
                               ?>
<!--                               <tbody>-->
							  <tr>
									  <td ><?php echo $row['id_usuario']; ?></td>
									  <td ><?php echo $row['nombre']; ?></td>
									  <td ><?php echo $row['apellido']; ?></td>
<!--									  <td ><?php echo $row['password']; ?></td>-->
									  <td ><?php echo $row['email']; ?></td>
									  <td ><?php echo $row['tipo']; ?></td>
									  <td ><?php echo $row['estatus']; ?></td>
									<td class= "text-center" width="20%"><a href="?edit=<?php echo $row['id_usuario']; ?> " onclick="return confirm('Estas seguro que desea editar!'); "class="btn btn-warning btn-sm" role="button">editar</a>
									   <a href="?del=<?php echo $row['id_usuario']; ?> " onclick="return confirm('Estas seguro que desea borrar el registro !'); "class="btn btn-danger btn-sm" role="button">borrar</a>
									</td>
							 </tr>  
<!--                        		</tbody>-->
                         <?php
                           }  
                          ?>  

								</table>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->
			</section>
		</div>
		<?php include("includes/footeradmin.php");?>
	</div>


</div>
<!--End container -->

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Datatable responsive -->
<script src="bower_components/Responsive-2.2.0/js/dataTables.responsive.min.js"></script>
<script src="bower_components/Responsive-2.2.0/js/responsive.bootstrap.min.js"></script>
<script>
  $(function () {
      $("#dtatable").DataTable({
    language: {
        processing:     "Procesando...",
        search:         "Buscar:",
        lengthMenu:    "Mostrar _MENU_ registros",
        info:           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        infoEmpty:      "Mostrando registros del 0 al 0 de un total de 0 registros",
        infoFiltered:   "(filtrado de un total de _MAX_ registros)",
        infoPostFix:    "",
        loadingRecords: "Cargando...",
        zeroRecords:    "No se encontraron resultados",
        emptyTable:     "Ningún dato disponible en esta tabla",
        paginate: {
            first:      "Primero",
            previous:   "Anterior",
            next:       "Siguiente",
            last:       "Último"
        },
        aria: {
            sortAscending:  ": Activar para ordenar la columna de manera ascendente",
            sortDescending: ": Activar para ordenar la columna de manera descendente"
        }
    }
});
	  document.title= "AdminLTE | Catalogos";
	  $("li").removeClass("active");
	  $(".catalogo").addClass("active");
      $(".usuario").addClass("active");

  });

</script>
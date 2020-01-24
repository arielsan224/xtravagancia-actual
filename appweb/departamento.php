<?php
include_once '../crud/crud_depto.php';

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






<!-- Menu================================================== -->
<?php include("../includes/dashboard.php");?>

<!-- End Menu -->


<!-- End position -->

<!--		<div class="container margin_40">-->
<div class="layer"></div>
<!-- Mobile menu overlay mask -->

			<!-- Modal -->
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header bg-modal">
							<button type="button" class="close" data-dismiss="modal" 
							<?php
								if(isset($_GET['edit'])){
							?>
							onclick="location='departamento'"
							<?php
								}
							?>
							>&times;</button>
							<h4 class="modal-title">Departamentos</h4>
						</div>
						<div class="modal-body">

							<form method="post">
								<div class="row">

									<div class="col-md-12 add_bottom_15">
										<div>

											<div class="row">
												<div class="col-md-6 col-sm-6">
													<div class="form-group">
														<label>Nombre departamento</label>
														<input type="text" class="form-control" id="nombre_depto" placeholder="Nombre departamento" name="nombre_depto" value="<?php if(isset($_GET['edit'])) echo $getROW['nombre_depto'];  ?>" onkeyup="javascript:this.value=this.value.toTitleCase();" required>
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
						  <button type="button" class="btn btn-primary" data-dismiss="modal" <?php
								if(isset($_GET['edit'])){
							?>
							onclick="location='departamento'"
							<?php
								}
							?>
							>Close</button>
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
						<small>Departamento</small>
						</h1>

						<ol class="breadcrumb">
							<li><a href="#"><i class="fa fa-dashboard"></i> Home</a>
							</li>
							<li><a href="#">Catalogos</a>
							</li>
							<li class="active">Departamento</li>
						</ol>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Listado de Departamentos</h3>
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
							<table id="dtatable" class="table table-bordered table-hover dataTable dt-responsive nowrap" style="width:100%">
                              <thead>  
                               <tr>  
                                    <td>Id</td>  
                                    <td>Departamento</td>
								    <td>Estatus</td>
                                    <td style="text-align:center;">Acciones</td>
                               </tr>  
                          	 </thead>  
                          <?php 
						 
						$res = $MySQLiconn->query( "SELECT d.id_depto, d.nombre_depto, 												e.id_estatus,e.descripcion as estatus
													FROM departamento d 
													INNER JOIN estatus e ON e.id_estatus = d.estatus
													order by id_depto" );
						while($row = mysqli_fetch_array($res))  
                          {  
                               ?>
<!--                               <tbody>-->
							  <tr>
									<td width="5%">
										<?php echo $row['id_depto']; ?>
									</td>
									<td width="60%">
										<?php echo $row['nombre_depto']; ?>
									</td>
								    <td ><span <?php if ($row['id_estatus']==1) { ?>class="label label-success"<?php } else { ?>class="label label-danger"<?php }?> ><?php echo $row['estatus']; ?></span></td>
									<td class= "text-center" ><a href="?edit=<?php echo $row['id_depto']; ?> " onclick="return confirm('Estas seguro que desea editar!'); "class="btn btn-warning btn-sm" role="button">editar</a>
									   <a href="?del=<?php echo $row['id_depto']; ?>&est=<?php echo $row['id_estatus']; ?> " onclick="return confirm('Estas seguro que desea activar/inactivar el registro !'); "class="btn <?php if ($row['id_estatus']==1){  ?> btn-danger <?php } else { ?>btn-primary <?php }?> btn-sm" role="button"><?php if ($row['id_estatus']==1){  ?> inactivar <?php } else { ?>activar <?php }?></a>
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
		<?php include("../includes/footeradmin.php");?>
	</div>


</div>
<!--End container -->

<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Datatable responsive -->
<script src="../bower_components/Responsive-2.2.0/js/dataTables.responsive.min.js"></script>
<script src="../bower_components/Responsive-2.2.0/js/responsive.bootstrap.min.js"></script>
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
	  $(".Catalogos").addClass("active");
      $(".departamento").addClass("active");

  });

</script>
</body>
</html>

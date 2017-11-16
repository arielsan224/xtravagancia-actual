<?php
include_once 'crud/crud_depto.php';

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

<!-- Header================================================== -->
<?php include("includes/dashboard.php");?>

<!-- End Header -->


<!-- End position -->

<div class="container margin_40">
	

	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Modal Header</h4>
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
												<input type="text" class="form-control" id="nombre_depto" placeholder="Nombre departamento" name="nombre_depto" value="<?php if(isset($_GET['edit'])) echo $getROW['nombre_depto'];  ?>" required>
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
								<button class="btn_1 green medium" name="update">Editar</a>
                        
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
				</div>
			</div>
		</div>
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
							<table id="example2" class="table table-bordered table-hover dataTable " >
                              <thead>  
                               <tr>  
                                    <td>Id</td>  
                                    <td>Nombre</td>
                                    <td style="text-align:center;">Acciones</td>
                               </tr>  
                          	 </thead>  
                          <?php 
						 
						$res = $MySQLiconn->query( "SELECT * FROM departamento order by id_depto" );
						while($row = mysqli_fetch_array($res))  
                          {  
                               ?>
<!--                               <tbody>-->
							  <tr>
									<td>
										<?php echo $row['id_depto']; ?>
									</td>
									<td>
										<?php echo $row['nombre_depto']; ?>
									</td>
									<td class= "text-center" width="20%"><a href="?edit=<?php echo $row['id_depto']; ?> " onclick="return confirm('Estas seguro que desea editar!'); "class="btn btn-warning btn-sm" role="button">editar</a>
									   <a href="?del=<?php echo $row['id_depto']; ?> " onclick="return confirm('Estas seguro que desea borrar el registro !'); "class="btn btn-danger btn-sm" role="button">borrar</a>
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
<script>
  $(function () {
      $("#example2").DataTable();
	  document.title= "AdminLTE | Catalogos";
//	  $('#example2').DataTable({
//      'paging'      : true,
//      'lengthChange': false,
//      'searching'   : false,
//      'ordering'    : true,
//      'info'        : true,
//      'autoWidth'   : false
//    })
  });
//	$(document).ready(function(){  
//      $('#example2').DataTable();  
// }); 
</script>
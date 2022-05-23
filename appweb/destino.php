<?php
include_once '../crud/crud_dest.php';

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
							onclick="location='destino.php'"
							<?php
								}
							?>
							>&times;</button>
							<h4 class="modal-title">Destinos</h4>
						</div>
						<div class="modal-body">
							
						<div class="stepwizard">
							<div class="stepwizard-row setup-panel">
								<div class="stepwizard-step col-md-4"> 
									<a href="#step-1" type="button" class="btn btn-success btn-circle active">1</a>
									<p><small>Info destino</small></p>
								</div>
								<div class="stepwizard-step col-md-4"> 
									<a href="#step-2" type="button" class="btn btn-default btn-circle <?php
											if(!isset($_GET['edit'])){?> disabled <?php
												}
											?>" <?php
											if(!isset($_GET['edit'])){?> disabled <?php
												}
											?> >2</a>
									<p><small>Ubicación</small></p>
								</div>
								<div class="stepwizard-step col-md-4"> 
									<a href="#step-3" type="button" class="btn btn-default btn-circle <?php
											if(!isset($_GET['edit'])){ ?> disabled <?php
												}
											?>" <?php
											if(!isset($_GET['edit'])){?> disabled <?php
												}
											?>>3</a>
									<p><small>Galeria</small></p>
								</div>
							</div>
						</div>
							<form method="post" enctype="multipart/form-data" id=formModal>
								<div class="row">

									<div class="col-md-12 add_bottom_15">
										<div>

										<div class="row">
	
<!--
											<div class="col-md-12 col-sm-6">
  											<div class="form-group">
   											<input id="input-es" name="input-es[]" type="file" class="file" multiple 
    											data-show-upload="false" data-show-caption="true" data-msg-placeholder="Seleccione archivo a cargar..." data-allowed-file-extensions='["jpg", "png"]' >
    										</div>
    										</div>
-->
											<div class="panel setup-content" id="step-1">
											  <div class="panel-heading">
												<h3 class="panel-title">Info destino</h3>
											  </div>
											  <div class="panel-body">
											<?php
											if(isset($_GET['edit'])){
											?>
											<input type="hidden" name="id_destino" value="<?php echo $getROW['id_destino']; ?>">
											<?php
												}
											?>
											<?php
											
											if(isset($_GET['edit'])){
											?>
											<div class="col-md-6">
											<div class="form-group">
												<label for="img_cargada" class="col-sm-3 control-label">Imagen de destino: </label>
												<label class="col-sm-1 control-label">: </label>
													<div class="col-sm-8">							    				   
													  <img src="../<?php echo $getROW['imagen']; ?>" id="img_cargada" class="thumbnail" style="width:250px; height:200px;"  alt="../<?php echo $getROW['imagen']; ?>"/>
													</div>
											</div>
											</div>
											<?php
											}
											?>
											<div class="col-md-6">
											<div class="col-xs-12 text-center form-group" >
												<label>Imagen de destino</label>
												<div class="kv-avatar center-block" >
													<div class="file-loading" >
														<input id="img_dest" name="img_dest" type="file" 
														<?php if(!isset($_GET['edit'])) {  
														?>
														required
														<?php
															}
														?>
														>
													</div>
												</div>
												<div class="kv-avatar-hint"><small>Archivos < 1500 KB</small></div>
												<div id="kv-avatar-errors-1" class="center-block" style="width:400px;display:none"></div>
											</div>
											
											</div>
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Nombre del destino</label>
													<input type="text" class="form-control"  id="nombre_dest" placeholder="Nombre del destino" name="nombre_dest" value="<?php if(isset($_GET['edit'])) echo $getROW['nombre_dest'];  ?>" onkeyup="javascript:this.value=this.value.toTitleCase();" required>
												</div>
											</div>
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Departamento</label>
													<select class="form-control" name="id_depto" id="id_depto" required>
														<option value="">Seleccione departamento</option>
														<?php
														$mun = $MySQLiconn->query( "SELECT * FROM departamento" );
														while ( $row = $mun->fetch_array() ) {
															if ( isset($getROW[ 'id_depto' ]) && $getROW[ 'id_depto' ] == $row[ 'id_depto' ] ) {
																?>
														<option selected value="<?php echo $row['id_depto'];  ?>">
															<?php echo $row['nombre_depto'];  ?>
														</option>

														<?php
														} else {
															?>
														<option value="<?php echo $row['id_depto'];  ?>">
															<?php echo $row['nombre_depto'];  ?>
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
													<label>Municipio</label>
													<select class="form-control" name="id_municipio" id="id_municipio" required placeholder="Seleccione municipio">

														<option value="">Seleccione municipio</option>
														
														<?php
														if(isset($_GET['edit'])){
														$mun = $MySQLiconn->query( "SELECT * FROM municipio where id_depto=".$getROW[ 'id_depto' ] );
														while ( $row = $mun->fetch_array() ) {
															if ( isset($getROW[ 'id_municipio' ]) && $getROW[ 'id_municipio' ] == $row[ 'id_municipio' ] ) {
																?>
														<option selected value="<?php echo $row['id_municipio'];  ?>">
															<?php echo $row['nombre_municipio'];  ?>
														</option>

														<?php
														} else {
															?>
														<option value="<?php echo $row['id_municipio'];  ?>">
															<?php echo $row['nombre_municipio'];  ?>
														</option>
														<?php
														}
														}
															}
														?>
													</select>

												</div>
											</div>
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Precio</label>
													<input type="number" class="form-control" id="precio" placeholder="Precio" name="precio" value="<?php if(isset($_GET['edit'])) echo $getROW['precio'];  ?>" required>
												</div>
											</div>
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Dias</label>
													<input type="number" class="form-control" id="dias" placeholder="Cant. de dias" name="dias" value="<?php if(isset($_GET['edit'])) echo $getROW['dias'];  ?>" required>
												</div>
											</div>
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Mínimo de personas</label>
													<input type="number" class="form-control" id="minimo" placeholder="Mínimo de personas" name="minimo" value="<?php if(isset($_GET['edit'])) echo $getROW['minimo']; else echo '2';  ?>" required>
												</div>
											</div>
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Categoria</label>
													<select  class="form-control" name="id_categoria" id="id_categoria" required>
														<option value="">Seleccione Categoria</option>
														<?php
														$destest = $MySQLiconn->query( "SELECT * FROM categoria" );
														while ( $row = $destest->fetch_array() ) {
															if ( $getROW[ 'id_categoria' ] == $row[ 'id_categoria' ] ) {
																?>
														<option selected value="<?php echo $row['id_categoria'];  ?>">
															<?php echo $row['descripcion'];  ?>
														</option>

														<?php
														} else {
															?>
														<option value="<?php echo $row['id_categoria'];  ?>">
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
													<label>Actividades</label>
													<select id="actividad" name="actividad[]" class="form-control select2 " multiple="multiple" data-placeholder="Actividades"
                        							style="width: 100%;" required>
                        							<?php
														if(isset($_GET['edit'])){
														$act = $MySQLiconn->query( "SELECT * FROM actividad where id_categoria=".$getROW['id_categoria'] );
														$selected_ids = array();
														$result1 =$MySQLiconn->query("SELECT id_actividad from maestro_act where id_destino = ".$getROW['id_destino']);
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
//												var_dump ($selected_ids);
//			   									echo $row['id_actividad'];
			   									?>
											</div>
											 <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
											  </div>
											</div>
											<div class="panel setup-content" id="step-2">
											  <div class="panel-heading">
												<h3 class="panel-title">Ubicación</h3>
											  </div>
											  <div class="panel-body">
											  <div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Dias</label>
													<select id="id_rango_dias" name="id_rango_dias" class="form-control " data-placeholder="Dias"
                        							style="width: 100%;" required>

														<option value="">Seleccione Dias</option>
														<?php
														$destest = $MySQLiconn->query( "SELECT * FROM rango_dias" );
														while ( $row = $destest->fetch_array() ) {
															if ( $getROW[ 'id_rango_dias' ] == $row[ 'id_rango_dias' ] ) {
																?>
														<option selected value="<?php echo $row['id_rango_dias'];  ?>">
															<?php echo $row['dias'];  ?>
														</option>

														<?php
														} else {
															?>
														<option value="<?php echo $row['id_rango_dias'];  ?>">
															<?php echo $row['dias'];  ?>
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
													<label>Horario</label>
													<select id="horario" name="horario[]" class="form-control select2 " multiple="multiple" data-placeholder="Horarios"
                        							style="width: 100%;" required>

														<option value="">Seleccione horario</option>
														<?php
														$tiempo = $MySQLiconn->query( "SELECT id_tiempo,inicio, fin FROM tiempo ");
														if(isset($_GET['edit'])){
														$selected_idst = array();
														$result1t =$MySQLiconn->query("SELECT id_tiempo FROM horario_destino  WHERE estatus=1 and id_destino =".$getROW['id_destino']);
														while($row1t = mysqli_fetch_assoc($result1t))
														{
															$selected_idst[] = $row1t['id_tiempo'];
															
														}
														
														while ( $row = mysqli_fetch_assoc($tiempo) ) {
																															
															if(in_array($row['id_tiempo'], $selected_idst))
															{
																?>
														<option selected value="<?php echo $row['id_tiempo'];  ?>">
															<?php echo date('h:i A',strtotime($row['inicio'])).'-'.date('h:i A',strtotime($row['fin']));  ?>
														</option>

														<?php
																
														} else {
															?>
														<option value="<?php echo $row['id_tiempo'];  ?>">
															<?php echo date('h:i A',strtotime($row['inicio'])).'-'.date('h:i A',strtotime($row['fin'])); ?>
														</option>
														<?php
														}
																
														}
															}
															else { 
																while ( $row = mysqli_fetch_assoc($tiempo) ) { 


														?>
														<option value="<?php echo $row['id_tiempo'];  ?>">
															<?php echo date('h:i A',strtotime($row['inicio'])).'-'.date('h:i A',strtotime($row['fin'])); ?>
														</option>
														<?php } } ?>
													</select>

												</div>
												<?php
//												var_dump ($selected_idst);
//			   									echo $row['id_actividad'];
			   									?>
											</div>
											<div class="col-md-12 col-sm-6">
												<div class="form-group">
													<label>Dirección</label>
													<textarea type="text" class="form-control" id="direccion" required placeholder="Dirección" name="direccion" rows="2" onkeyup="javascript:this.value=this.value.toTitleCase();"><?php if(isset($_GET['edit'])) echo $getROW['direccion'];  ?></textarea>
												</div>
											</div>
											<div class="col-md-12 col-sm-6">
												<div class="form-group">
													<label>Descrpcion Corta</label>
													<textarea type="text" class="form-control" id="desc_corta" required placeholder="Descripcion Corta" name="desc_corta" rows="2" onkeyup="javascript:this.value=this.value.toTitleCase();"><?php if(isset($_GET['edit'])) echo $getROW['desc_corta'];  ?></textarea>
												</div>
											</div>
											<div class="col-md-12 col-sm-6">
												<div class="form-group">
													<label>Descripcion Larga</label>
													<textarea type="text" class="form-control" id="desc_larga" required placeholder="Descripcion Larga" name="desc_larga" rows="6" onkeyup="javascript:this.value=this.value.toTitleCase();"><?php if(isset($_GET['edit'])) echo $getROW['desc_larga'];  ?></textarea>
												</div>
											</div>
											<button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
											</div>
											</div>
											<div class="panel setup-content" id="step-3">
											  <div class="panel-heading">
												<h3 class="panel-title">Galeria</h3>
											  </div>
											  <div class="panel-body">
											<div class="col-lg-12">
												<div class="form-group center-block" >
													<label>Galeria de destino</label>
													<div class="file-loading" >
														<input id="galery_dest" name="galery_dest[]" type="file" class="file" multiple 
															data-show-upload="false" data-show-caption="true" data-msg-placeholder="Seleccione imagenes a cargar..." data-allowed-file-extensions='["jpg", "png", "gif"]' data-language ='es' required oninput="setCustomValidity('')">
													</div>
												</div>
												<div class="kv-avatar-hint"><small>Archivos < 1500 KB</small></div>
																							
											
											</div>
											
											<?php
												if ( isset( $_GET[ 'edit' ] ) ) {
													?>
												<button class="btn btn-warning pull-right" name="update">Editar</a>

												<?php
												}
												else
												{
												?>
												<button class="btn btn-primary pull-right" name="save">Aceptar</a>
												<?php
												}
												?>
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
										
									</div>
							</div>
						</form>
					</div>
						<div class="modal-footer bg-modal-footer">
						  <button type="button" class="btn btn-primary" data-dismiss="modal" <?php
								if(isset($_GET['edit'])){
							?>
							onclick="location='destino'"
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
						Registro
						<small>Destinos</small>
						</h1>

						<ol class="breadcrumb">
							<li><a href="admin"><i class="fa fa-dashboard"></i> Home</a>
							</li>
							<li><a href="">Registro</a>
							</li>
							<li class="active">Destinos</li>
						</ol>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Listado de Destinos</h3>
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
								  <td>Imagen</td>
<!--								  <td>Id</td>-->
								  <td>Destino</td>
								  <td>Departamento</td>
								  <td>Municipio</td>
								  <td>Precio</td>
								  <td>Dias</td>
								  <td>Actividades</td>
								  <td>Estatus</td>
                                  <td style="text-align:center;">Acciones</td>
                               </tr>  
                          	 </thead>  
                          <?php 
						 
						$res = $MySQLiconn->query("select dest.id_destino,dest.nombre_dest, dest.id_depto, 							   dest.nombre_depto,
													dest.id_municipio, dest.nombre_municipio,dest.precio,dest.dias,			dest.imagen,dest.id_estatus,dest.estatus,dest.actividades
													from v_destinos as dest");
						while($row = mysqli_fetch_array($res))  
                          {  
                               ?>
<!--                               <tbody>-->
							  <tr>
								   <td ><img src="../<?php echo $row['imagen']; ?>" class="rounded" alt="<?php echo $row['imagen']; ?>" width="50" height="30"></td>
<!--								   <td ><?php echo $row['id_destino']; ?></td>-->
								   <td ><?php echo $row['nombre_dest']; ?></td>
								   <td ><?php echo $row['nombre_depto']; ?></td>
								   <td ><?php echo $row['nombre_municipio']; ?></td>
								   <td ><?php echo $row['precio']; ?></td>
								   <td width="5%"><?php echo $row['dias']; ?></td>
								   <td ><?php echo $row['actividades']; ?></td>
								   <td ><span <?php if ($row['id_estatus']==1) { ?>class="label label-success"<?php } else { ?>class="label label-danger"<?php }?> ><?php echo $row['estatus']; ?></span></td>
									<td class= "text-center" >
										<!--<a href="?edit=<?php //echo $row['id_destino']; ?> " onclick="return confirm('Estas seguro que desea editar!'); "class="btn btn-warning btn-sm" role="button">editar</a>
									   <a href="?del=<?php //echo $row['id_destino']; ?>&est=<?php //echo $row['id_estatus']; ?> " onclick="return confirm('Estas seguro que desea activar/inactivar el registro !'); "class="btn <?php //if ($row['id_estatus']==1){  ?> btn-danger <?php //} else { ?>btn-primary <?php //}?> btn-sm" role="button"><?php //if ($row['id_estatus']==1){  ?> inactivar <?php //} else { ?>activar <?php //}?></a>-->
										
								<select name="cmbo_accion" id="cmbo_accion" onchange="return confirm('Estas seguro que desea modificar el registro!')&& (window.location.href=this.value)">
									<option value="">Seleccione</option>
									<option value="?edit=<?php echo $row['id_destino']; ?>">Editar</option>
									<option value="?adm=<?php echo $row['id_destino']; ?>">Administrar</option>
									<option value="?del=<?php echo $row['id_destino']; ?>&est=<?php echo $row['id_estatus']; ?> "><?php if ($row['id_estatus']==1){  ?> Inactivar <?php } else { ?>Activar <?php }?></option>
									
								</select>
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

<script src="../bower_components/bootstrap-fileinput/js/fileinput.min.js"></script>
<script src="../bower_components/bootstrap-fileinput/js/locales/es.js"></script>

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
<!--<script src="bower_components/fileinput/js/fileinput.min.js"></script>-->
<!--<script src="bower_components/bootstrap-fileinput-4.4.6/js/fileinput.min.js"></script>-->

<!--<script src="bower_components/bootstrap-fileinput-4.4.6/js/locales/es.js"></script>-->
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- Datatable responsive -->
<script src="../bower_components/Responsive-2.2.0/js/dataTables.responsive.min.js"></script>
<script src="../bower_components/Responsive-2.2.0/js/responsive.bootstrap.min.js"></script>
<script src="../js/step_bootstrap.js"></script>


<script>
  $(function () {
      $('.select2').select2();
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
	  $(".Registro").addClass("active");
      $(".destino").addClass("active");
	  //$(".destino").removeClass("active");
	  
		  

	  
//$("#input-es").fileinput(
////	{
////	language: "es",
////    uploadUrl: "uploads/",
////    allowedFileExtensions: ["jpg", "png", "gif"]
//////	language: {
//////		browseLabel: "Navegar",
//////	}
////}	
//);
	  
var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
    'onclick="alert(\'Call your custom code here.\')">' +
    '<i class="glyphicon glyphicon-tag"></i>' +
    '</button>'; 
$("#img_dest").fileinput({
    language: "es",
	overwriteInitial: true,
    maxFileSize: 1500,
    showClose: false,
    showCaption: false,
    browseLabel: '',
    removeLabel: '',
    browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
    removeTitle: 'Cancelar o reset cambios',
    elErrorContainer: '#kv-avatar-errors-1',
    msgErrorClass: 'alert alert-block alert-danger',
    defaultPreviewContent: '<img src="../uploads/avatar montana2.png" alt="Your Avatar">',
    layoutTemplates: {main2: '{preview} ' +  /*btnCust +*/ ' {remove} {browse}'},
//	uploadUrl: "/uploads/",
	maxImageWidth: 1000,
    maxImageHeight: 667,
	minImageWidth: 1000,
    minImageHeight: 667,
    allowedFileExtensions: ["jpg", "png", "gif"]
});
	  	  
   $("#galery_dest").fileinput({
		language: "es",
	    overwriteInitial: true,
	    showUpload:false,
		maxFileCount: 5,
		maxFileSize: 1500,
		maxImageWidth: 1000,
		maxImageHeight: 667,
		minImageWidth: 1000,
		minImageHeight: 667,
		allowedFileExtensions: ["jpg", "png", "gif"]
    });

	$('#id_categoria').on('change', function(){
    var id = $('#id_categoria').val()
    $.ajax({
      type: 'POST',
      url: '../crud/actividades.php',
      data: {'id_act': id}
    })
    .done(function(lista_act){
      $('#actividad').html(lista_act)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las actividades')
    })
  });  
	
	 $('#id_depto').on('change', function(){
    var id = $('#id_depto').val()
    $.ajax({
      type: 'POST',
      url: '../crud/actividades.php',
      data: {'id_depto': id}
    })
    .done(function(lista_mun){
      $('#id_municipio').html(lista_mun)
    })
    .fail(function(){
      alert('Hubo un errror al cargar los Municipios')
    })
  });   
	 
  });
	
	$("#myModal").on('hidden.bs.modal', function (e) { 
		var step = 'step-1';
        $("#formModal")[0].reset();
		$("#formModal").find('span[style="color:red;"]').text(''); //reset error spans
		$('#actividad').empty();
		var allWells = $('.setup-content'), navListItems = $('div.setup-panel div a');
		var target = $('div.setup-panel div a[href="#' + step + '"]');
		allWells.hide();
		navListItems.removeClass('btn-success active').addClass('btn-default disabled').attr('disabled');
		target.addClass('btn-success active').removeAttr('disabled').removeClass('disabled').trigger('click');
		

      });
	
	//document.getElementById('galery_dest').setCustomValidity('Debe cargar al menos una imagen');
	$("#galery_dest")[0].setCustomValidity('Debe cargar al menos una imagen');
	


	$(document).ready(function () {

    	bootstrap_step();
				
	});

</script>

</body>
</html>

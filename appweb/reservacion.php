<?php
include_once '../crud/crud_res.php';

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
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Reservas</h4>
						</div>
						<div class="modal-body">

							<form method="post"  id=formModal>
								<div class="row">

									<div class="col-md-12 add_bottom_15">
										<div>

										<div class="row">
											<?php
											if(isset($_GET['edit'])){
											?>
											<input type="hidden" name="id_reservacion" value="<?php echo $getROW['idreservacion']; ?>">
											<?php
												}
											?>
											<input type="hidden" id="id_usuario" name="id_usuario" value="">
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Email</label>
													<a id="info" name="info" href="#" data-toggle="tooltip" data-placement="right" title="Formato de correo invalido!" class="ttwarning"></a>
													<input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php if(isset($_GET['edit'])) echo $getROW['email'];  ?>" required <?php if (isset($_GET['edit'])){  ?> readonly <?php } ?> >
												</div>
											</div>
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Nombres</label>
													<input type="text" class="form-control"  id="nombres" placeholder="Nombres" name="nombres" value="<?php if(isset($_GET['edit'])) echo $getROW['nombre'];  ?>" onkeyup="javascript:this.value=this.value.toTitleCase();" required <?php if (isset($_GET['edit'])){  ?> readonly <?php } ?>>
												</div>
											</div>
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Apellidos</label>
													<input type="text" class="form-control"  id="apellidos" placeholder="Apellidos" name="apellidos" value="<?php if(isset($_GET['edit'])) echo $getROW['apellido'];  ?>" onkeyup="javascript:this.value=this.value.toTitleCase();" required <?php if (isset($_GET['edit'])){  ?> readonly <?php } ?>>
												</div>
											</div>
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Telefono</label>
													<input type="tel" pattern="[0-9]{8}" class="form-control" id="telefono" placeholder="1234-4678" name="telefono" value="<?php if(isset($_GET['edit'])) echo $getROW['telefono'];  ?>" required <?php if (isset($_GET['edit'])){  ?> readonly <?php } ?>>
												</div>
											</div>
											
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Departamento</label>
													<select class="form-control" name="id_depto" id="id_depto" required <?php if (isset($_GET['edit'])){  ?> disabled <?php } ?>>
														<option value="">Seleccione departamento</option>
														<?php
														$mun = $MySQLiconn->query( "SELECT * FROM departamento" );
														while ( $row = $mun->fetch_array() ) {
															if ( $getROW[ 'id_depto' ] == $row[ 'id_depto' ] ) {
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
													<select class="form-control" name="id_municipio" id="id_municipio" required placeholder="Seleccione municipio" <?php if (isset($_GET['edit'])){  ?> disabled <?php } ?> >

														<option value="">Seleccione municipio</option>
														
														<?php
														if(isset($_GET['edit'])){
														$mun = $MySQLiconn->query( "SELECT * FROM municipio where id_depto=".$getROW[ 'id_depto' ] );
														while ( $row = $mun->fetch_array() ) {
															if ( $getROW[ 'id_municipio' ] == $row[ 'id_municipio' ] ) {
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
													<label>Tour</label>
													<select class="form-control" name="id_dest" id="id_dest" required placeholder="Seleccione destino" required <?php if (isset($_GET['edit'])){  ?> disabled <?php } ?> >

														<option value="">Seleccione destino</option>
														<?php
														if(isset($_GET['edit'])){
															
														
														?>
														<option selected value="<?php echo $getROW['id_destino'];  ?>">
															<?php echo $getROW['nombre_dest'];;  ?>
														</option>
														<?php }?>
														
													</select>

												</div>
											</div>
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Date:</label>

													<div class="input-group date">
													  <div class="input-group-addon">
														<i class="fa fa-calendar"></i>
													  </div>
													  <input class="form-control pull-right" id="datepicker" type="text" name="datepicker" value="<?php if(isset($_GET['edit'])) echo $getROW['fecha_tour'];  ?>" readonly>
													</div>
													<!-- /.input group -->
												  </div>
											</div>
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Horario</label>
													<select class="form-control" name="horario" id="horario" required placeholder="Seleccione horario" required <?php if (isset($_GET['edit'])){  ?> disabled <?php } ?> >

														<option value="">Seleccione horario</option>
														<?php
														if(isset($_GET['edit'])){
															
														
														?>
														<option selected value="<?php echo $getROW['id_horario_destino'];  ?>">
															<?php echo $getROW['horario'];  ?>
														</option>
														<?php }?>
													</select>

												</div>
											</div>
											
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Precio</label>
													<input type="number" class="form-control" id="precio" placeholder="Precio" name="precio" value="<?php if(isset($_GET['edit'])) echo $getROW['precio'];  ?>" readonly>
												</div>
											</div>
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Cant. de personas</label>
													<input type="number" class="form-control" id="personas" placeholder="Cant. de personas" name="personas" value="<?php if(isset($_GET['edit'])) echo $getROW['cant_personas'];  ?>" required min="2">
												</div>
											</div>

											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Total</label>
													<input type="number" class="form-control" id="total" placeholder="Total" name="total" value= "<?php if(isset($_GET['edit'])) echo $getROW['total'];  ?>" readonly>
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
							onclick="location='reservacion'"
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
						<small>Reservaciones</small>
						</h1>

						<ol class="breadcrumb">
							<li><a href="admin"><i class="fa fa-dashboard"></i> Home</a>
							</li>
							<li><a href="">Registro</a>
							</li>
							<li class="active">Reservaciones</li>
						</ol>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Reservaciones</h3>
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
								  <td>Id reservacion</td>
<!--								  <td>Id</td>-->
								  <td>Destino</td>
								  <td>Fecha reserva</td>
								  <td>Precio</td>
								  <td>Cant. Personas</td>
								  <td>Total</td>
								  <td>Estatus</td>
                                  <td style="text-align:center;">Acciones</td>
                               </tr>  
                          	 </thead>  
                          <?php 
						 
						$res = $MySQLiconn->query('SELECT r.idreservacion,                            d.id_destino,d.nombre_dest, 								e.descripcion    AS     est_reserva, DATE_FORMAT(r.fecha_reservacion,"%d %b %Y") AS         fecha_reserva,r.precio,r.cant_personas,r.total,r.estatus AS           id_estatus,
							CASE 
							WHEN r.estatus = 2 THEN "primary"
							WHEN r.estatus = 4 THEN "success"
							ELSE "danger" END AS class
							FROM v_destinos d
							INNER JOIN reservacion r ON r.id_destino = d.id_destino
							INNER JOIN estatus e ON e.id_estatus = r.estatus
							ORDER BY r.fecha_reservacion DESC');
						while($row = mysqli_fetch_array($res))  
                          {  
                               ?>
<!--                               <tbody>-->
							  <tr>
								  <td ><a href="../jreports/lanzador_reports?id_reserva=<?php echo $row['idreservacion']; ?>&jreport=MiReserva.jrxml" target="_blank"><?php echo $row['idreservacion']; ?></a></td>
								   <td ><?php echo $row['nombre_dest']; ?></td>
								   <td ><?php echo $row['fecha_reserva']; ?></td>
								   <td ><?php echo $row['precio']; ?></td>
								   <td ><?php echo $row['cant_personas']; ?></td>
								   <td ><?php echo $row['total']; ?></td>
								   <td ><span class="label label-<?php echo $row['class']; ?>"><?php echo $row['est_reserva']; ?></span></td>
									<td class= "text-center" >
								<select name="cmbo_accion" id="cmbo_accion" onchange="return confirm('Estas seguro que desea modificar el registro!')&& (window.location.href=this.value)">
									<option value="">Seleccione</option>
									<?php if ($row['id_estatus']==2 ){ ?>
									<option value="?edit=<?php echo $row['idreservacion']; ?>">Editar</option>
									<?php } 
									   if ($row['id_estatus']==2 || $row['id_estatus']==3){ ?>
									<option value="?del=<?php echo $row['idreservacion']; ?>&est=<?php echo $row['id_estatus']; ?> "><?php if ($row['id_estatus']==2){  ?> Cancelar <?php } else if ($row['id_estatus']==3) { ?>Reservar <?php }?></option>
									<?php }?>
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
		<?php include("../includes/footeradmin.php");
						
		?>
	</div>


</div>
<!--End container -->

<script src="../bower_components/jquery/dist/jquery.min.js"></script>
  <!--<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>-->
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!--<script src="../js/bootstrap-datepicker.js"></script>-->


<script src="../bower_components/bootstrap-fileinput/js/fileinput.min.js"></script>
<script src="../bower_components/bootstrap-fileinput/js/locales/es.js"></script>
<!--<script src="../bower_components/raphael/raphael.min.js"></script>-->
<!--<script src="../bower_components/morris.js/morris.min.js"></script>-->

<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<!--<script src="../bower_components/chart.js/Chart.js"></script>-->
<script src="../../bower_components/chart.js/Chart2.js"></script>
<!--<script src="../js/mycharts.js"></script>-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="../dist/js/pages/dashboard2.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Datatable responsive -->
<!--<script src="bower_components/fileinput/js/fileinput.min.js"></script>-->
<!--<script src="bower_components/bootstrap-fileinput-4.4.6/js/fileinput.min.js"></script>-->

<!--<script src="bower_components/bootstrap-fileinput-4.4.6/js/locales/es.js"></script>-->
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- Datatable responsive -->
<script src="../bower_components/Responsive-2.2.0/js/dataTables.responsive.min.js"></script>
<script src="../bower_components/Responsive-2.2.0/js/responsive.bootstrap.min.js"></script>
<script src="../../bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js"></script>




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
	  document.title= "AdminLTE | Registro";
	  $("li").removeClass("active");
	  $(".Registro").addClass("active");
      $(".reservacion").addClass("active");
	  //$(".destino").removeClass("active");
  });
	
	$("#myModal").on('hidden.bs.modal', function (e) { 
        $("#formModal")[0].reset();
        $("#formModal").find('span[style="color:red;"]').text(''); //reset error spans
		$("[data-toggle='tooltip']").tooltip('hide');
		$('#datepicker').datepicker('destroy');

      });

</script>

<script type="text/javascript">
//$.get( "../function/charts.php?data=mes" );
	
	/*	
	  var id = 1;	
	  $.ajax({
      type: 'POST',
      url: '../function/charts.php',
      data: {'data': id},
	  dataType: 'json'
    })
    .done(function(lista_data){
      //$('#id_municipio').html(lista_data)
		  //alert("Data: " + lista_data)
		var mes = [];
		var cant_dest = [];
		

		for (var i in lista_data) {
			mes.push(lista_data[i].mes);
			cant_dest.push(lista_data[i].cant_dest);
			//alert("i:" + lista_data[i].mes)
		}
		  //alert("Data: " + mes);
		  	var ctx = document.getElementById('salesChart').getContext('2d');
			var chart = new Chart(ctx, {
			// The type of chart we want to create
			type: 'line',

			// The data for our dataset
			data: {
				labels: mes,
				datasets: [{
					label: 'Cant. de Tours',
					//backgroundColor: 'rgba(200, 200, 200, 0.75)',
					//borderColor: 'rgba(200, 200, 200, 0.75)',
					//hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
					//hoverBorderColor: 'rgba(200, 200, 200, 1)',
					fillColor           : 'rgb(210, 214, 222)',
					strokeColor         : 'rgb(210, 214, 222)',
					pointColor          : 'rgb(210, 214, 222)',
					pointStrokeColor    : '#c1c7d1',
					pointHighlightFill  : '#fff',
					pointHighlightStroke: 'rgb(220,220,220)',
					data: cant_dest
				}]
			},

			// Configuration options go here
			options: {}
			});
		  
    })
    .fail(function(){
      alert('Hubo un errror al cargar los Municipios')
	  
    })*/
	
	/* Carga de datos de usuario segun email escrito */
	
	$('#email').on('blur',function(){
		var id = $('#email').val();
		var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		var incorrecto = false;
		if (!(regex.test(id)) && id.length > 0 ) {
			
			//alert('Formato de correo invalido');
			$("[data-toggle='tooltip']").tooltip('show');
			$('#email').val('');
			$('#nombres').val('');
			$('#apellidos').val('');
			$('#nombres').attr('readonly',false);
			$('#apellidos').attr('readonly',false);
			$('#telefono').attr('readonly',false);
			//$('#info').show();
			$('#email').focus();
			
			
		}
		//alert(id);
		else {
		$("[data-toggle='tooltip']").tooltip('hide');
		$.ajax({
			type:'POST',
			url:'../crud/actividades.php',
			data:{'email':id},
			dataType: 'json'
		})
		.done(function(info_user){
			var nombres;
			var apellidos;
			var telefono;
			var id_usuario;
			if(info_user && info_user.length > 0){ 
				nombres   = info_user[0].nombre;
				apellidos =info_user[0].apellido;
				telefono  =info_user[0].telefono; 
				id_usuario=info_user[0].id_usuario;
				//alert(info_user[0].nombre);
				$('#nombres').attr('readonly',true);
				$('#apellidos').attr('readonly',true);
				$('#telefono').attr('readonly',true);
				$('#nombres').val(nombres);
				$('#apellidos').val(apellidos);
				$('#id_depto').focus();
				$('#telefono').val(telefono)
				$('#id_usuario').val(id_usuario);
			}
			else {
				$('#nombres').focus();
			}
		})
		.fail(function(){
			alert('Hubo un error al cargar usuarios ')
		})
		}	  
			 
	});
	
	
	/* Carga de municipio segun depto selecciondo */
	  
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
      alert('Hubo un error al cargar los Municipios')
    })
  });
	
	/* Carga de destinos segun municipio selecciondo */
	
	 $('#id_municipio').on('change', function(){
    var id = $('#id_municipio').val()
    $.ajax({
      type: 'POST',
      url: '../crud/actividades.php',
      data: {'id_municipio': id}
	  //dataType: 'json'
    })
    .done(function(lista_dest){
      $('#id_dest').html(lista_dest);
	  limpia_montos();
	  //alert(response.value)
    })
    .fail(function(){
      alert('Hubo un error al cargar los Destinos')
    })
  });
	
	/* Carga de destinos segun municipio selecciondo */
	
	 $('#id_dest').on('change', function(){
		var id = $('#id_dest').val()
		$.ajax({
		  type: 'POST',
		  url: '../crud/actividades.php',
		  data: {'id_dest': id}
		  //dataType: 'json'
		})
		.done(function(precio){
		  $('#precio').val(parseFloat(precio));
			actualiza_sub_total();
			dias_semanas(id);
			busca_horarios(id);
			
		  //alert(precio)
		})
		.fail(function(){
		  alert('Hubo un error al cargar los Destinos')
		})
	  });
	
	
	 $('#personas').on('change',function(){
		 if(!isNaN(this.value))
			 {
				if(this.value.length > 0 && this.value < 2){ 
					alert ('El minimo de Personas es de 2');
					$('#personas').val('');
					$('#personas').focus();
					$('#total').val('');
				}
				else 
				actualiza_sub_total(); 
			 }
		 	
		  else 
			$('#total').val(0);
		 
	 });
		 
	
	$('#id_dest').on('change',function(){
		if(this.value != '0')
		 actualiza_sub_total();
		else 
			$('#total').val(0);
			//limpia_montos();
		    $('#datepicker').datepicker('destroy');
	 })
	
	
	/* Limpieza de modal cada vez que se cierra */
	
	$("#myModal").on('hidden.bs.modal', function (e) { 
        $("#formModal")[0].reset();
		$('#nombres').attr('readonly',false);
		$('#apellidos').attr('readonly',false);
        $("#formModal").find('span[style="color:red;"]').text(''); //reset error spans

      });
	
	var actualiza_sub_total=function(){
		var precio = $('#precio').val();
		 var personas = $('#personas').val();
		 var total = precio * personas;
		 //alert (total)
		 $('#total').val(total);
	};
	
	var limpia_montos = function(){
		$('#precio').val('');
		$('#total').val('');
		$('#datepicker').datepicker('destroy');
	};
	
	var dias_semanas = function(id){
		var dest= id;
		$.ajax({
		  type: 'POST',
		  url: '../crud/actividades.php',
		  data: {'id_dest_sem': dest}
		  //dataType: 'json'
		})
		.done(function(semanas){
		  //Date picker
			  var rango=semanas;
			  //console.log(rango);
			$('#datepicker').datepicker({
			  language: 'es',
			  autoclose: true,
			  format: "yyyy-mm-dd",
			  min: new Date(),
			  startDate: new Date(),
			  daysOfWeekDisabled: rango,
			  disabled: true
			});
					  
		  //alert(precio)
		})
		.fail(function(){
		  alert('Hubo un error al cargar las semanas')
		})
	};
	
	var busca_horarios = function(id){
		var dest= id;
		$.ajax({
		  type: 'POST',
		  url: '../crud/actividades.php',
		  data: {'id_dest_hor': dest}
		  //dataType: 'json'
		})
		.done(function(horario){
		  //combo horario
			//console.log(horario);
			  $('#horario').html(horario);
			
		  //alert(precio)
		})
		.fail(function(){
		  alert('Hubo un error al cargar los horarios')
		})
		
	};
	
	
	
	
	
	//$('.datepicker').datepicker();
	
</script>
<script>
  $(function () {
    
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
	
	  
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )
/*
    //Date picker
	  var rango=;
	  //console.log(rango);
    $('#datepicker').datepicker({
      locale: 'es',
	  autoclose: true,
	  format: "dd/mm/yyyy",
	  min: new Date(),
	  startDate: new Date(),
	  daysOfWeekDisabled: rango
    })*/

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

</body>
</html>







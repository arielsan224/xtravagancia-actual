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




<div class="layer"></div>
<!-- Mobile menu overlay mask -->

<!-- Menu================================================== -->
<?php include("../includes/dashboard.php");?>

<!-- End Menu -->


<!-- End position -->

<!--		<div class="container margin_40">-->


<!-- Modal -->
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header bg-modal">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Reservas</h4>
						</div>
						<div class="modal-body">

							<form method="post" enctype="multipart/form-data" id=formModal>
								<div class="row">

									<div class="col-md-12 add_bottom_15">
										<div>

										<div class="row">
	

											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Nombres</label>
													<input type="text" class="form-control"  id="nombres" placeholder="Nombres" name="nombres" value="" onkeyup="javascript:this.value=this.value.toTitleCase();" required>
												</div>
											</div>
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Apellidos</label>
													<input type="text" class="form-control"  id="nombre_dest" placeholder="Nombre del destino" name="nombre_dest" value="" onkeyup="javascript:this.value=this.value.toTitleCase();" required>
												</div>
											</div>
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Email</label>
													<input type="text" class="form-control" id="email" placeholder="Email" name="email" value="" required>
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
														
															?>
														<option value="<?php echo $row['id_depto'];  ?>">
															<?php echo $row['nombre_depto'];  ?>
														</option>
														<?php
														
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
														
													</select>

												</div>
											</div>
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Tour</label>
													<select class="form-control" name="id_dest" id="id_dest" required placeholder="Seleccione destino">

														<option value="">Seleccione destino</option>
														
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
													  <input class="form-control pull-right" id="datepicker" type="text">
													</div>
													<!-- /.input group -->
												  </div>
											</div>
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Precio</label>
													<input type="number" class="form-control" id="precio" placeholder="Precio" name="precio" value="" disabled>
												</div>
											</div>
											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Cant. de personas</label>
													<input type="number" class="form-control" id="personas" placeholder="Cant. de personas" name="personas" value="" required min="2">
												</div>
											</div>

											<div class="col-md-6 col-sm-6">
												<div class="form-group">
													<label>Total</label>
													<input type="number" class="form-control" id="total" placeholder="Total" name="total" disabled>
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
						Catalogos
						<small>Destinos</small>
						</h1>

						<ol class="breadcrumb">
							<li><a href="admin"><i class="fa fa-dashboard"></i> Home</a>
							</li>
							<li><a href="">Catalogos</a>
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
<script src="../bower_components/chart.js/Chart2.js"></script>
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
    removeTitle: 'Cancel or reset changes',
    elErrorContainer: '#kv-avatar-errors-1',
    msgErrorClass: 'alert alert-block alert-danger',
    defaultPreviewContent: '<img src="../uploads/default_avatar_male.jpg" alt="Your Avatar">',
    layoutTemplates: {main2: '{preview} ' +  /*btnCust +*/ ' {remove} {browse}'},
//	uploadUrl: "/uploads/",
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
        $("#formModal")[0].reset();
        $("#formModal").find('span[style="color:red;"]').text(''); //reset error spans

      });

</script>

<script type="text/javascript">
//$.get( "../function/charts.php?data=mes" );
	
		
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
	  
    })
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
      alert('Hubo un errror al cargar los Municipios')
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
      alert('Hubo un errror al cargar los Destinos')
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
		  //alert(precio)
		})
		.fail(function(){
		  alert('Hubo un errror al cargar los Destinos')
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
	 })
	
	
	/* Limpieza de modal cada vez que se cierra */
	
	$("#myModal").on('hidden.bs.modal', function (e) { 
        $("#formModal")[0].reset();
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
	};
	
	
	
	
	//$('.datepicker').datepicker();
	
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

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

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

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








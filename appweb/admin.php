<?php
//include_once '../function/charts.php';
session_start();
include_once '../crud/conexion.php';
if ( isset( $_SESSION[ 'message' ] ) /*&& $_SESSION['message']*/ ) {
	$mensajito = $_SESSION[ 'message' ];

}

?>
  
<div class="layer"></div>
 
  <?php 
	include("../includes/dashboard.php");
	//include_once '../crud/conexion.php';
	?>

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
			
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <?php   
		
		// General info 
			$res = $MySQLiconn->query('SELECT FORMAT(COUNT(*),0) AS cantidad, YEAR(CURDATE()) AS 							year,format(sum(r.total),2) AS total,
										FORMAT((sum(r.total)/1.30),2) AS costo,format((sum(r.total))-(sum(r.total)/1.30),2) AS ganancia
										FROM reservacion r
										WHERE YEAR (r.fecha_reservacion)= YEAR(CURDATE())');
		$get_res = mysqli_fetch_assoc($res);
		$mem = $MySQLiconn->query(' SELECT FORMAT(COUNT(*),0) AS cantidad,YEAR(CURDATE()) AS year FROM usuario AS us WHERE us.id_tipo_usuario = 2 AND YEAR (us.fecha_creacion)=YEAR(CURDATE()) ORDER BY us.fecha_creacion');
		$get_mem = mysqli_fetch_assoc($mem);
		$busc = $MySQLiconn->query('SELECT FORMAT(COUNT(*),0) AS cantidad,YEAR(CURDATE()) AS year FROM busquedas AS b WHERE YEAR (b.fecha_busqueda)=YEAR(CURDATE()) ORDER BY b.fecha_busqueda');
		$get_busc = mysqli_fetch_assoc($busc);
		
		
		
		?>
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Busquedas <?php echo $get_busc['year'] ?></span>
              <span class="info-box-number"><?php echo $get_busc['cantidad'] ?><small></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Reservas <?php echo $get_res['year']?></span>
              <span class="info-box-number"><?php echo $get_res['cantidad'] ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Miembros <?php echo $get_mem['year']?></span>
              <span class="info-box-number"><?php echo $get_mem['cantidad'] ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Resumen de reservas</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <!--<div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>-->
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Ventas: Año <?php echo $get_busc['year'] ?></strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 180px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Goal Completion</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Add Products to Cart</span>
                    <span class="progress-number"><b>160</b>/200</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Complete Purchase</span>
                    <span class="progress-number"><b>310</b>/400</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Visit Premium Page</span>
                    <span class="progress-number"><b>480</b>/800</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Send Inquiries</span>
                    <span class="progress-number"><b>250</b>/500</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                    <h5 class="description-header">$<?php echo $get_res['total'] ?></h5>
                    <span class="description-text">TOTAL PAGADO</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                    <h5 class="description-header">$<?php echo $get_res['costo'] ?></h5>
                    <span class="description-text">COSTO TOTAL</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                    <h5 class="description-header">$<?php echo $get_res['ganancia'] ?></h5>
                    <span class="description-text">GANANCIA TOTAL</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                    <h5 class="description-header">1200</h5>
                    <span class="description-text">GOAL COMPLETIONS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          
          <!-- /.box -->
          <div class="row">
            <div class="col-md-6">
              <!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Direct Chat</h3>

                  <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow">3</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts"
                            data-widget="chat-pane-toggle">
                      <i class="fa fa-comments"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages">
                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">Alexander Pierce</span>
                        <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="../dist/img/user1-128x128.jpg" alt="message user image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        Is this template really for free? That's unbelievable!
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right">Sarah Bullock</span>
                        <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="../dist/img/user3-128x128.jpg" alt="message user image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        You better believe it!
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">Alexander Pierce</span>
                        <span class="direct-chat-timestamp pull-right">23 Jan 5:37 pm</span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="../dist/img/user1-128x128.jpg" alt="message user image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        Working with AdminLTE on a great new app! Wanna join?
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right">Sarah Bullock</span>
                        <span class="direct-chat-timestamp pull-left">23 Jan 6:10 pm</span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="../dist/img/user3-128x128.jpg" alt="message user image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        I would love to.
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                  </div>
                  <!--/.direct-chat-messages-->

                  <!-- Contacts are loaded here -->
                  <div class="direct-chat-contacts">
                    <ul class="contacts-list">
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="../dist/img/user1-128x128.jpg" alt="User Image">

                          <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Count Dracula
                                  <small class="contacts-list-date pull-right">2/28/2015</small>
                                </span>
                            <span class="contacts-list-msg">How have you been? I was...</span>
                          </div>
                          <!-- /.contacts-list-info -->
                        </a>
                      </li>
                      <!-- End Contact Item -->
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="../dist/img/user7-128x128.jpg" alt="User Image">

                          <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Sarah Doe
                                  <small class="contacts-list-date pull-right">2/23/2015</small>
                                </span>
                            <span class="contacts-list-msg">I will be waiting for...</span>
                          </div>
                          <!-- /.contacts-list-info -->
                        </a>
                      </li>
                      <!-- End Contact Item -->
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="../dist/img/user3-128x128.jpg" alt="User Image">

                          <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Nadia Jolie
                                  <small class="contacts-list-date pull-right">2/20/2015</small>
                                </span>
                            <span class="contacts-list-msg">I'll call you back at...</span>
                          </div>
                          <!-- /.contacts-list-info -->
                        </a>
                      </li>
                      <!-- End Contact Item -->
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="../dist/img/user5-128x128.jpg" alt="User Image">

                          <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Nora S. Vans
                                  <small class="contacts-list-date pull-right">2/10/2015</small>
                                </span>
                            <span class="contacts-list-msg">Where is your new...</span>
                          </div>
                          <!-- /.contacts-list-info -->
                        </a>
                      </li>
                      <!-- End Contact Item -->
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="../dist/img/user6-128x128.jpg" alt="User Image">

                          <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  John K.
                                  <small class="contacts-list-date pull-right">1/27/2015</small>
                                </span>
                            <span class="contacts-list-msg">Can I take a look at...</span>
                          </div>
                          <!-- /.contacts-list-info -->
                        </a>
                      </li>
                      <!-- End Contact Item -->
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="../dist/img/user8-128x128.jpg" alt="User Image">

                          <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Kenneth M.
                                  <small class="contacts-list-date pull-right">1/4/2015</small>
                                </span>
                            <span class="contacts-list-msg">Never mind I found...</span>
                          </div>
                          <!-- /.contacts-list-info -->
                        </a>
                      </li>
                      <!-- End Contact Item -->
                    </ul>
                    <!-- /.contatcts-list -->
                  </div>
                  <!-- /.direct-chat-pane -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <form action="#" method="post">
                    <div class="input-group">
                      <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                      <span class="input-group-btn">
                            <button type="button" class="btn btn-warning btn-flat">Send</button>
                          </span>
                    </div>
                  </form>
                </div>
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->
            </div>
            <!-- /.col -->

            <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                <?php
				 $locate = $MySQLiconn->query("SET lc_time_names = 'es_ES'");
                 $list_us = $MySQLiconn->query("SELECT us.id_usuario,CONCAT (us.nombre,' ',us.apellido) AS n_apellidos,us.email,us.imagen,
															 case 
																when date(us.fecha_creacion) = CURDATE() then 'Hoy'
																when date(us.fecha_creacion) = DATE_ADD(CURDATE(),INTERVAL -1 DAY) then 'Ayer'
																ELSE DATE_FORMAT(us.fecha_creacion,'%d %b %Y')  END as t_fecha, 
															 tu.descripcion AS tipo,es.descripcion AS estatus,us.id_estatus
													FROM usuario AS us
													INNER JOIN tipo_usuario AS tu ON us.id_tipo_usuario = tu.id_tipo_usuario
													INNER JOIN estatus AS es ON us.id_estatus=es.id_estatus
													WHERE us.id_tipo_usuario = 2
													ORDER BY us.fecha_creacion
													LIMIT 10");
					  $cant_user= $list_us->num_rows;
					?>
                  <h3 class="box-title">Ultimos Miembros</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger"><?php echo $cant_user?> Nuevos Miembros</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                   <?php 
					  
					  while ($u_list = mysqli_fetch_array($list_us))
					  {
						  
					  
					  
					  ?>
                    <li>
                      <img class="user-image" src="..<?php echo $u_list['imagen']?>" alt="User Image">
                      <a class="users-list-name" href="#"><?php echo $u_list['n_apellidos']?></a>
                      <span class="users-list-date"><?php echo $u_list['t_fecha']?></span>
                    </li>
                    <?php } ?>
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <?php if($_SESSION['userId']==1) { ?>
                <div class="box-footer text-center">
                  <a href="usuario" class="uppercase">Ver Usuarios</a>
                </div>
                <?php } ?>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Ultimas Reservaciones</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
				  <?php 
					$res = $MySQLiconn->query('SELECT r.idreservacion, d.id_destino,d.nombre_dest, 								e.descripcion AS est_reserva ,DATE_FORMAT(r.fecha_reservacion,"%d %b %Y") AS fecha_reserva,r.estatus as id_estatus
												FROM v_destinos d
												INNER JOIN reservacion r ON r.id_destino = d.id_destino
												INNER JOIN estatus e ON e.id_estatus = r.estatus
												ORDER BY r.fecha_reservacion DESC
												LIMIT 8');
				  ?>
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Id Reserva</th>
                    <th>Destino</th>
                    <th>Estatus</th>
                    <th>Fecha de Reserva</th>
                  </tr>
                  </thead>
                  <tbody>
					  <?php
					  	while ($list_res= mysqli_fetch_array($res))
						{
							
						
					  ?>
                  <tr>
					<td><a href="pages/examples/invoice.html"><?php echo $list_res['idreservacion']?></a></td>
                    <td><?php echo $list_res['nombre_dest']?></td>
                    <td><span <?php if ($list_res['id_estatus']==2) { ?>class="label label-primary"<?php }elseif ($list_res['id_estatus']==4){ ?>class="label label-success" <?php }else { ?>class="label label-danger"<?php }?>><?php echo $list_res['est_reserva']?></span></td>
					  <td><?php echo $list_res['fecha_reserva']?></td>
                      <!--<div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>-->
						
					  
                  </tr>
					  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="" class="btn btn-sm btn-info btn-flat pull-left" data-toggle="modal" data-target="#myModal">Nueva Reserva</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Ver Todas las Reservas</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Inventory</span>
              <span class="info-box-number">5,200</span>

              <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
              <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Mentions</span>
              <span class="info-box-number">92,050</span>

              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
              <span class="progress-description">
                    20% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Downloads</span>
              <span class="info-box-number">114,381</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Direct Messages</span>
              <span class="info-box-number">163,921</span>

              <div class="progress">
                <div class="progress-bar" style="width: 40%"></div>
              </div>
              <span class="progress-description">
                    40% Increase in 30 Days
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->

          
          <!-- /.box -->

          <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ultimos destinos agregados</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
               
               <?php  
				  	$dest = $MySQLiconn->query('SELECT d.id_destino,d.nombre_dest,d.desc_corta, d.imagen,d.precio,d.fecha_creacion
												FROM v_destinos d
												WHERE d.id_estatus = 1
												ORDER BY d.fecha_creacion DESC
												LIMIT 8');
				  while ($list_dest = mysqli_fetch_array($dest))
				  {
				  
				  ?>
               
                <li class="item">
                  <div class="product-img">
                    <img src="../<?php echo $list_dest['imagen'] ?>" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title"><?php echo $list_dest['nombre_dest'] ?>
                      <span class="label label-warning pull-right">$<?php echo $list_dest['precio']?></span></a>
                    <span class="product-description">
                          <?php echo $list_dest['desc_corta']?>
                        </span>
                  </div>
                </li>
                <?php } ?>
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="destino" class="uppercase">Ver todos los destinos</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  <?php include("../includes/footeradmin.php");?>  

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






  
  


<?php  
include_once '../crud/crud_depto.php';
 

 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Datatables Jquery Plugin with Php MySql and Bootstrap</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h3 align="center">Datatables Jquery Plugin with Php MySql and Bootstrap</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Id</td>  
                                    <td>Nombre</td>
<!--                                    <th colspan="2" style="text-align:center;">Acciones</th>  -->
                                    <td style="text-align:center;">Acciones</td>
                                     
<!--
                                    <td>Designation</td>  
                                    <td>Age</td>  
-->
                               </tr>  
                          </thead>  
                          <?php 
						 
						$res = $MySQLiconn->query( "SELECT * FROM departamento " );
						$total_mun = $MySQLiconn->query( "SELECT id_depto FROM departamento" );

						$total = $total_mun->num_rows;
                          while($row = mysqli_fetch_array($res))  
                          {  
                               ?>
							  <tr>
											<td>
												<?php echo $row['id_depto']; ?>
											</td>
											<td>
												<?php echo $row['nombre_depto']; ?>
											</td>
											<td width="20%"><a href="?edit=<?php echo $row['id_depto']; ?>" onclick="return confirm('Estas seguro que desea editar!'); ">edit</a>
											/ <a href="?del=<?php echo $row['id_depto']; ?>" onclick="return confirm('Estas seguro que desea borrar el registro !'); ">delete</a>
											</td>
										</tr>  
                         <?php
                           }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  
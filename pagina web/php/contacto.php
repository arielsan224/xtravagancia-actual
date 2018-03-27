<?php
/*Formulario de contacto HTML5, PHP Y Bootstraps
Creado por: www.render2web.com
Version: 1.1*/

//Comprobamos que se haya presionado el boton enviar
if($_POST['estado']==1){
	//Guardamos en variables los datos enviados
	$nombre = $_POST['name_contact'];
	$apellido = $_POST['lastname_contact'];
	$email = $_POST['email_contact'];
	$telefono = $_POST['phone_contact'];
	$mensaje = $_POST['message_contact'];
	
	///Validamos del lado del servidor que el nombre y el email no estén vacios
	if($nombre == ''){
		echo "Debe ingresar su nombre";
	}
	else if($email == ''){
		echo "Debe ingresar su email";
}else{
	$para = "arielfit@gmail.com, eleda.transporte.nica@gmail.com";//Email al que se enviará
	$asunto = "Contacto para su sitio web";//Puedes cambiar el asunto del mensaje desde aqui
	//Este sería el cuerpo del mensaje
	$mensaje = "
		<table border='0' cellspacing='3' cellpadding='2'>
		  <tr>
			<td width='30%' align='left' bgcolor='#f0efef'><strong>Nombre:</strong></td>
			<td width='80%' align='left'>$nombre</td>
		  </tr>
		  <tr>
			<td width='30%' align='left' bgcolor='#f0efef'><strong>Apellido:</strong></td>
			<td width='80%' align='left'>$apellido</td>
		  </tr>
		  <tr>
			<td align='left' bgcolor='#f0efef'><strong>E-mail:</strong></td>
			<td align='left'>$email</td>
		  </tr>
		   <tr>
			<td width='30%' align='left' bgcolor='#f0efef'><strong>Teléfono:</strong></td>
			<td width='70%' align='left'>$telefono</td>
		  </tr>
		  <tr>
			<td align='left' bgcolor='#f0efef'><strong>Comentario:</strong></td>
			<td align='left'>$mensaje</td>
		  </tr>
	</table>	
";	
	
//Cabeceras del correo
    $headers = "From: $nombre  $apellido <$email>\r\n"; //Quien envia?
    $headers .= "X-Mailer: PHP5\n";
    $headers .= 'MIME-Version: 1.0' . "\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //
	
//Comprobamos que los datos enviados a la función MAIL de PHP estén bien y si es correcto enviamos
	if(mail($para, $asunto, $mensaje, $headers)){
		echo "<script language='javascript'>
		alert('Message Sent, Thanks.');
		window.location.href = '/contact';
		</script>";
		} else {
		//echo 'Falló el envio';
		echo "<script language='javascript'>
		alert('Falló el envio vuelva a intentarlo');
		window.location.href = '/contact';
		</script>";
}
}
}



if($_POST['estado']==2){
	//Guardamos en variables los datos enviados
	$nombre = $_POST['name_contact'];
	$apellido = $_POST['lastname_contact'];
	$email = $_POST['email_contact'];
	$telefono = $_POST['phone_contact'];
	$persons = $_POST['persons'];
	$tour = $_POST['tour'];
	$mensaje = $_POST['message_contact'];
	
	///Validamos del lado del servidor que el nombre y el email no estén vacios
	if($nombre == ''){
		echo "Debe ingresar su nombre";
	}
	else if($email == ''){
		echo "Debe ingresar su email";
}else{
	$para = "arielfit@gmail.com, eleda.transporte.nica@gmail.com";//Email al que se enviará
	$asunto = "Contacto para su sitio web";//Puedes cambiar el asunto del mensaje desde aqui
	//Este sería el cuerpo del mensaje
	$mensaje = "
		<table border='0' cellspacing='3' cellpadding='2'>
		  <tr>
			<td width='30%' align='left' bgcolor='#f0efef'><strong>Nombre:</strong></td>
			<td width='80%' align='left'>$nombre</td>
		  </tr>
		  <tr>
			<td width='30%' align='left' bgcolor='#f0efef'><strong>Apellido:</strong></td>
			<td width='80%' align='left'>$apellido</td>
		  </tr>
		  <tr>
			<td align='left' bgcolor='#f0efef'><strong>E-mail:</strong></td>
			<td align='left'>$email</td>
		  </tr>
		   <tr>
			<td width='30%' align='left' bgcolor='#f0efef'><strong>Teléfono:</strong></td>
			<td width='70%' align='left'>$telefono</td>
		  </tr>
		  <tr>
			<td width='30%' align='left' bgcolor='#f0efef'><strong>Teléfono:</strong></td>
			<td width='70%' align='left'>$persons</td>
		  </tr>
		  <tr>
			<td width='30%' align='left' bgcolor='#f0efef'><strong>Teléfono:</strong></td>
			<td width='70%' align='left'>$tour</td>
		  </tr>
		  <tr>
			<td align='left' bgcolor='#f0efef'><strong>Comentario:</strong></td>
			<td align='left'>$mensaje</td>
		  </tr>
	</table>	
";	
	
//Cabeceras del correo
    $headers = "From: $nombre  $apellido <$email>\r\n"; //Quien envia?
    $headers .= "X-Mailer: PHP5\n";
    $headers .= 'MIME-Version: 1.0' . "\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; //
	
//Comprobamos que los datos enviados a la función MAIL de PHP estén bien y si es correcto enviamos
	if(mail($para, $asunto, $mensaje, $headers)){
		echo "<script language='javascript'>
		alert('Message Sent, Thanks.');
		window.location.href = '/reservacion';
		</script>";
		} else {
		//echo 'Falló el envio';
		echo "<script language='javascript'>
		alert('Falló el envio vuelva a intentarlo');
		window.location.href = '/reservacion';
		</script>";
}
}
}

?>
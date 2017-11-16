<?

/////////////ENLISTAR LOS FICHEROS EXISTENTES///////////////////////////////////////////////
$listar = null;
$directorio=opendir("docs/");

while ($elemento = readdir($directorio))
{
  if ($elemento != '.' && $elemento != '..')
  {
  if (is_dir("docs/".$elemento))
  {
    $listar .="<a class=' col-md-6' href='docs/$elemento' target='_blank'> 
    $elemento/</a>
    <br><br>";
  }
  else
  {
     $listar .="<a class=' col-md-6' href='docs/$elemento' target='_blank'> 
    $elemento</a>
    <br><br>";
  }
  }
}

/////////////////////////7 SUBIR UN NUEVO FICHERO /////////////////////////////////////////////
if ($_POST["subir"] == "Cargar archivo")
{
$folder = "docs/";
move_uploaded_file($_FILES["formato"]["tmp_name"] , "$folder".$_FILES["formato"]["name"]);
echo "
<div class='alert alert-success'><p class='hidd' align=center>El archivo  ".$_FILES["formato"]["name"]." se ha cargado correctamente. <a href='index.php' class='btn btn-default'>Cliqué aquí </a> para verificar.</div>";
}

/////////////////////////////// BORRAR ARCHIVO ////////////////////////////////////

$borrarFor=($_POST['borrarFor']);
if (isset($_POST['borrar']))
{
@unlink('docs/'.$borrarFor);
echo "
<div class='alert alert-danger'><p class='hidd' align=center>El archivo  ".$_FILES["formato"]["name"]." ha sido eliminado correctamente. <a href='index.php' class='btn btn-default'>Cliqué aquí </a> para verificar.</div>";
}
?>


<html lang="es">

  <head>
    <title>Enlistar, Cargar y Eliminar Ficheros en el Servidor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

    <link href="css/estilos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  </head>

  <body>
    <header>
      <div class="alert alert-info">
      <h2>Enlistar / Cargar / Eliminar Ficheros en el Servidor</h2>
      </div>
    </header>

<div class="col-md-offset-4">
<?
echo $listar;
?>
</div>

<form  method="post" enctype="multipart/form-data" class="col-md-offset-4 col-md-4" style="margin-right:2%; border-radius:20px;">

   <div class="bg-success" style="margin-top:2%; margin-bottom:20%; padding:3%; border-radius:20px;">
    <input  class="form-control" type="file" name="formato" id="formato" style="margin-bottom:2%;">
    <input  class="btn btn-default" type="submit" name="subir" value="Cargar archivo" style="width:100%;">
    </div>
</form>

<form method="post" class="col-md-offset-4 col-md-4"  style="margin-right:2%; margin-top:-7%; " >

   <div class="bg-danger" style="margin-top:2%; margin-bottom:20%; padding:3%; border-radius:20px;">
    <input class="form-control" name="borrarFor" size="50" placeholder=" Ejemplo: 1.Nombre_Del_Formato.xls" style="margin-bottom:2%;"/>
    <input  class="btn btn-default" type="submit" name="borrar" value="Borrar formato" style="width:100%;">

    <div class="col-md-6" style="margin-top:1%;">

    <?php
    echo $mensajeOk;
    ?>

    </div>
    <br>
    <br>
    </div>

  </form>
</body>
</html>



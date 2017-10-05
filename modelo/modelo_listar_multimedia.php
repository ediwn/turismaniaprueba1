<h3 align="center"> Lista de imagenes y videos</h3>
<?php


$ID_oferta = $_POST['ID_oferta'];

require '../conector/conexion.php';

$sql = mysqli_query($con, "SELECT * FROM multimedia WHERE ID_oferta='$ID_oferta'");

while ($row = mysqli_fetch_array($sql)) {
  
   $archivo = $row['recurso'];

  $buscar = ".mp4";
  $resultado = strpos($archivo, $buscar);

  if($resultado !== FALSE)
  {
  	echo "mostrar video";
  	?>
    <video src="../multimedia/img-empresa/<?php ECHO $archivo; ?>" controls> </video>
  	<?php

  }

  else
  {
    echo "mostrar img =  ";
    ?>
    <center>
    <img src="../multimedia/img-empresa/<?php ECHO $archivo; ?>" style="width: 50%; height: 150px;"></img>
    </center>
  	<?php

  }

  echo "</br>";


}


?>
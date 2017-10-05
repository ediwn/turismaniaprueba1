
<?php
  $ID_oferta = $_POST['ID_oferta'];require("../conector/conexion.php");  
  
  $query = mysqli_query($con,"DELETE FROM `oferta` WHERE `ID_oferta` =$ID_oferta");

  ?>
   <div class="alert alert-info" role="alert">
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
?>


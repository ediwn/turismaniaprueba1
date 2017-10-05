
<?php
  $ID_sector = $_POST['ID_sector'];require("../conector/conexion.php");  
  
  $query = mysqli_query($con,"DELETE FROM `sector` WHERE `ID_sector` =$ID_sector");

  ?>
   <div class="alert alert-info" role="alert">
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
?>


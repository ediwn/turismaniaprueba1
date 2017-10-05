
<?php
  $ID_area = $_POST['ID_area'];require("../conector/conexion.php");  
  
  $query = mysqli_query($con,"DELETE FROM `area` WHERE `ID_area` =$ID_area");

  ?>
   <div class="alert alert-info" role="alert">
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
?>


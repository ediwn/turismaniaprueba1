
<?php
  $ID_user = $_POST['ID_user'];require("../conector/conexion.php");  
  
  $query = mysqli_query($con,"DELETE FROM `user` WHERE `ID_user` =$ID_user");

  ?>
   <div class="alert alert-info" role="alert">
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
?>


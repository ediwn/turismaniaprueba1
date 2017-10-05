
   <?php $nombre_area = $_POST['nombre_area'];$ID_area = $_POST['ID_area'];require("../conector/conexion.php");
  
  $cadena="";
       if($nombre_area!="")
       {
       $query = mysqli_query($con,"UPDATE `area` SET `nombre_area` = '$nombre_area' WHERE `ID_area` = $ID_area;");
       $cadena.=" Se edito nombre_area , ";
       }

        if($cadena!="")
   {
   ?>
   <div class="alert alert-success" role="alert">
   <strong> CAMBIOS!! </strong> actualizados de <?php echo $cadena; ?>
   </div><?php

  }
  else
  {
    
   ?>
   <div class="alert alert-danger" role="alert">
   <strong>ALERTA! </strong> Debes ingresar datos validos.
   </div><?php
  }

?>
  

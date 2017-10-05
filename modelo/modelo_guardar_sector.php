
   <?php $nombre_area = $_POST['nombre_area'];$empresa = $_POST['empresa'];$ID_empresa = $_POST['ID_empresa'];$ID_sector = $_POST['ID_sector'];$ID_area = $_POST['ID_area'];require("../conector/conexion.php");
  
  $cadena="";
       if($nombre_area!="")
       {
       $query = mysqli_query($con,"UPDATE `sector` SET `nombre_area` = '$nombre_area' WHERE `ID_sector` = $ID_sector;");
       $cadena.=" Se edito nombre_area , ";
       }

       
       if($empresa!="")
       {
       $query = mysqli_query($con,"UPDATE `sector` SET `empresa` = '$empresa' WHERE `ID_sector` = $ID_sector;");
       $cadena.=" Se edito empresa , ";
       }

       
       if($ID_empresa!="")
       {
       $query = mysqli_query($con,"UPDATE `sector` SET `ID_empresa` = '$ID_empresa' WHERE `ID_sector` = $ID_sector;");
       $cadena.=" Se edito ID_empresa , ";
       }

       
       if($ID_area!="")
       {
       $query = mysqli_query($con,"UPDATE `sector` SET `ID_area` = '$ID_area' WHERE `ID_sector` = '$ID_sector';");
       $cadena.=" Se edito el area , ";
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
  

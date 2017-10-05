
   <?php $correo = $_POST['correo'];$password = $_POST['password'];$permiso = $_POST['permiso'];$ID_user = $_POST['ID_user'];require("../conector/conexion.php");
  
  $cadena="";
       if($correo!="")
       {
       $query = mysqli_query($con,"UPDATE `user` SET `correo` = '$correo' WHERE `ID_user` = $ID_user;");
       $cadena.=" Se edito correo , ";
       }

       
       if($password!="")
       {
       $query = mysqli_query($con,"UPDATE `user` SET `password` = '$password' WHERE `ID_user` = $ID_user;");
       $cadena.=" Se edito password , ";
       }

       
       if($permiso!="")
       {
       $query = mysqli_query($con,"UPDATE `user` SET `permiso` = '$permiso' WHERE `ID_user` = $ID_user;");
       $cadena.=" Se edito permiso , ";
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
  

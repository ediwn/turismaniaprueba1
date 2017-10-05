
   <?php 
   $caracterisitca = $_POST['caracterisitca'];
   $icono = $_POST['icono'];
   $titulo = $_POST['titulo'];
   $direccion = $_POST['direccion'];
   $tel_cel = $_POST['tel_cel'];
   $calificacion = $_POST['calificacion'];
   $descripcion_empresa = $_POST['descripcion_empresa'];
   $mapa_google = $_POST['mapa_google'];
   $ID_oferta = $_POST['ID_oferta'];

   $correo = $_POST['correo'];

   require("../conector/conexion.php");
  
  $cadena="";
       if($caracterisitca!="")
       {
       $query = mysqli_query($con,"UPDATE `oferta` SET `caracterisitca` = '$caracterisitca' WHERE `ID_oferta` = $ID_oferta;");
       $cadena.=" Se edito caracterisitca , ";
       }

       
       if($icono!="")
       {
       $query = mysqli_query($con,"UPDATE `oferta` SET `icono` = '$icono' WHERE `ID_oferta` = $ID_oferta;");
       $cadena.=" Se edito icono , ";
       }

       
       if($titulo!="")
       {
       $query = mysqli_query($con,"UPDATE `oferta` SET `titulo` = '$titulo' WHERE `ID_oferta` = $ID_oferta;");
       $cadena.=" Se edito titulo , ";
       }

       
       if($direccion!="")
       {
       $query = mysqli_query($con,"UPDATE `oferta` SET `direccion` = '$direccion' WHERE `ID_oferta` = $ID_oferta;");
       $cadena.=" Se edito direccion , ";
       }

       
       if($tel_cel!="")
       {
       $query = mysqli_query($con,"UPDATE `oferta` SET `tel_cel` = '$tel_cel' WHERE `ID_oferta` = $ID_oferta;");
       $cadena.=" Se edito tel_cel , ";
       }

       
       if($calificacion!="")
       {
       $query = mysqli_query($con,"UPDATE `oferta` SET `calificacion` = '$calificacion' WHERE `ID_oferta` = $ID_oferta;");
       $cadena.=" Se edito calificacion , ";
       }

       
       if($descripcion_empresa!="")
       {
       $query = mysqli_query($con,"UPDATE `oferta` SET `descripcion_empresa` = '$descripcion_empresa' WHERE `ID_oferta` = $ID_oferta;");
       $cadena.=" Se edito descripcion_empresa , ";
       }

       
       if($mapa_google!="")
       {
       $query = mysqli_query($con,"UPDATE `oferta` SET `mapa_google` = '$mapa_google' WHERE `ID_oferta` = $ID_oferta;");
       $cadena.=" Se edito mapa_google , ";
       }

       
       if($correo!="")
       {
       $query = mysqli_query($con,"UPDATE `oferta` SET `correo` = '$correo' WHERE `ID_oferta` = $ID_oferta;");
       $cadena.=" Se edito correo, se recomienda asignar nuevas empresas !!! ";
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
  

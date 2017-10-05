<?php 

 $nombre_completo = $_POST["nombre_completo"]; 
 $password = $_POST["password"];
 $password_confir = $_POST["password_confir"]; 

 require("../conector/conexion.php");

    $sql1 =mysqli_query($con,"SELECT * FROM user WHERE nombre_completo = '$nombre_completo'");

    $cont = 0;

    while ($row = mysqli_fetch_array($sql1)) {
      $cont++;
    }

    if($cont == 0 )
    {
       $sql=mysqli_query($con,"INSERT INTO `user` (`ID_user`, `nombre_completo`, `password`, `password_conf`) VALUES (NULL, '$nombre_completo', '$password', '$password_confir');"); 

	   if($sql==TRUE)
	   {
		   echo "<center> <h3> <label> Registro Correcto </label> </h3></center>";
	   }
	   else
	   {
		   echo "<center> <h3> <label> No se Registro!! Volver a intentar </label> </h3></center>";
	   }
    }

    else
    {
        echo "<center> <h3> <label> Ese nombre ya fue registrado!! Volver a intentar </label> </h3></center>";
    }

   
    ?>

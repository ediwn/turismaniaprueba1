<?php $nombre_area= $_POST["nombre_area"]; require("../conector/conexion.php");$sql=mysqli_query($con,"INSERT INTO `area` (`ID_area`,`nombre_area` ) VALUES (NULL, '$nombre_area' )"); 

    if($sql==TRUE)
    {
    	echo "<center> <h3> <label> Registro Correcto </label> </h3></center>";
    }
    else
    {
    	echo "<center> <h3> <label> No se Registro!! Volver a intentar </label> </h3></center>";
    }
    ?>

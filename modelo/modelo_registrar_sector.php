<?php $nombre_area= $_POST["nombre_area"]; $empresa= $_POST["empresa"]; $ID_empresa= $_POST["ID_empresa"]; $ID_area= $_POST["ID_sector"]; 

require("../conector/conexion.php");

$sql=mysqli_query($con,"INSERT INTO `sector` (`ID_sector`,`nombre_area` ,`empresa` ,`ID_empresa` ,`ID_area` ) VALUES (NULL, '$nombre_area' , '$empresa' , '$ID_empresa' , '$ID_area' )"); 


    if($sql==TRUE)
    {
    	echo "<center> <h3> <label> Registro Correcto </label> </h3></center>";
    }
    else
    {
    	echo "<center> <h3> <label> No se Registro!! Volver a intentar </label> </h3></center>";
    }
    ?>

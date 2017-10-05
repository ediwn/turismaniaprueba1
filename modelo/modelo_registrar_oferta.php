<?php 

$caracterisitca= $_POST["caracterisitca"]; 
$icono= $_POST["icono"]; 
$titulo= $_POST["titulo"]; 
$direccion= $_POST["direccion"]; 
$tel_cel= $_POST["tel_cel"]; 
$correo = $_POST["correo"]; 
$calificacion= $_POST["calificacion"]; 
$descripcion_empresa= $_POST["descripcion_empresa"];
$mapa_google= $_POST["mapa_google"]; 

$seccion = $_POST["seccion"]; 
$ID_user = $_POST["ID_user"]; 


require("../conector/conexion.php");

   $sql=mysqli_query($con,"INSERT INTO `oferta` (`ID_oferta`,`caracterisitca` ,`icono` ,`titulo` ,`direccion` ,`tel_cel` , `correo`, `calificacion` ,`descripcion_empresa` ,`mapa_google`,`ID_user`,`area` ) VALUES (NULL, '$caracterisitca' , '$icono' , '$titulo' , '$direccion' , '$tel_cel' ,'$correo', '$calificacion' , '$descripcion_empresa' , '$mapa_google','$seccion' , '$ID_user')"); 

    if($sql==TRUE)
    {
    	echo "<center> <h3> <label> Registro Correcto </label> </h3></center>";
    }
    else
    {
    	echo "<center> <h3> <label> No se Registro!! Volver a intentar </label> </h3></center>";
    }

    // Realziamos la insercion de datos de la lista de ofertas
     
     $lista_empresas = json_decode($_POST['lista_empresas']);

     foreach($lista_empresas as $empresa)
     {    
        $ID_oferta = $empresa->ID_empresa; 
        $nombre = $empresa->nombre; 
           

        $sql = mysqli_query($con,"INSERT INTO `relacion` (`ID_relacion`, `correo_empresa`, `ID_relacionados`) VALUES (NULL, '$correo', '$ID_oferta')");    
      }

?>

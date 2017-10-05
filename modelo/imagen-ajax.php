<?php

if (isset($_FILES["file"]))
{
    $file = $_FILES["file"];
    $nombre = $file["name"];
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    $size = $file["size"];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../multimedia/img-empresa/";
    
    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
      echo "Error, el archivo no es una imagen"; 
    }
    else if ($size > 2024*2024)
    {
      echo "Error, el tamaño máximo permitido es un 1MB";
    }
    else if ($width > 1000 || $height > 1000)
    {
        echo "Error la anchura y la altura maxima permitida es 500px";
    }
    else if($width < 60 || $height < 60)
    {
        echo "Error la anchura y la altura mínima permitida es 60px";
    }
    else
    {    
         /*$archivo_origen = $_FILES["file"]["tmp_name"];
         $archivo_destino = '/directorio/nuevo_nombre.txt';

        // Generamos un nombre de archivo Aleatorio para evitar conflictos entre los nombres.
         $ruta_provisional = md5(rand() * time()) ."$nombre";

         rename($nombre, $ruta_provisional);
         echo $ruta_provisional;*/

         $src = $carpeta.$nombre;
    
         move_uploaded_file($ruta_provisional, $src);
         echo "<center> <label> imagen de oferta </labo> </br> <img src='$src' style='width:150px; height:150px;'> </center> ";
       // $ruta_provisional = md5(rand() * time()) ."$nombre";
       //rename('../multimedia/img-empresa/profesora.png', 'prueba2133.png');
         
    }
}
?>

<script type="text/javascript">
           actualizar_img();
           function actualizar_img()
           {
            $("#icono").val('<?php echo $nombre; ?>');
            
           }

         </script>
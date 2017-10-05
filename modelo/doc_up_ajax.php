<?php
//if (isset($_FILES['file'])) 
//{   

  echo "var => ";
  echo $uploadfile_temporal= $_FILES['file']['tmp_name']; 
  echo "</br> var 2 =>";
  echo $uploadfile_nombre="".$_FILES['file']['name']; 
  echo "</br> var 3 =>";
  echo $ruta_video='../multimedia/img-empresa/'.$_FILES['file']['name']; 
  move_uploaded_file($uploadfile_temporal,$ruta_video); 
    




    /*echo " estos es => "; echo $ID_oferta_multimedia = $_POST['ID_oferta_multimedia'];

    $archivo = $_FILES['file'];
    echo "el tipo es :"; echo $tipo = $_FILES['file']['type'];

    $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
    $time = time();
    $nombre = "mutimedia-$time.$extension";

    if (move_uploaded_file($archivo['tmp_name'], "../multimedia/img-empresa/$nombre")) {
        echo 1;
        echo $nombre;
        echo "  subio correctamente  ";
    } else {
        echo 0;
    }

    require '../conector/conexion.php';

    mysqli_query($con, "INSERT INTO `multimedia` (`ID_multimedia`, `recurso`, `ID_oferta`) VALUES (NULL, '$nombre', '$ID_oferta_multimedia')")*/
//}


?>
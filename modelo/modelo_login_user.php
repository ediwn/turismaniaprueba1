<?php 

 $nombre_completo = $_POST["nombre_completo"]; 
 $password = $_POST["password"];

 require("../conector/conexion.php");

    $sql1 =mysqli_query($con,"SELECT * FROM user WHERE nombre_completo = '$nombre_completo'");

    $cont = 0;

    while ($row = mysqli_fetch_array($sql1)) {
      $cont++;
      $ID_user= $row['ID_user'];
    }

    if($cont == 1 )
    {
      
          session_start();
          $_SESSION["ID_usuario"]= $ID_user;
        

            ?> 
          <script type="text/javascript">
            window.location="../vista/vista_menu_usuario.php";
          </script>
         <?php
    }

    else
    {
        echo "<center> <h3> <label> Esta cuenta no se encuentra registrada!! Volver a intentar </label> </h3></center>";
    }

   
    ?>

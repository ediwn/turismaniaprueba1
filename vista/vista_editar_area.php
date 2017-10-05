
 <script type="text/javascript" src="../control/control_area.js"></script>
 <?php
 require("../conector/conexion.php");
 $ID_area = $_POST['ID_area'];$query = mysqli_query($con,"SELECT * FROM area WHERE ID_area='$ID_area'");
  
  while($row = mysqli_fetch_array($query))
  {
    ?> 
    <input type="text" id="ID_area_edicion" value="<?php echo $ID_area;?>"><label> nombre_area </label><?php $nombre_area=$row['nombre_area']; ?><input type="text" class="form-control" id="nombre_area" value="<?php echo $nombre_area;?>" placeholder="(*)Escriba su nombre_area" onkeyup="validador_campo('nombre_area','resp_nombre_area',4)" maxlength="100"><div id="resp_nombre_area"></div>

    <?php
  }


?>


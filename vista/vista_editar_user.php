
 <script type="text/javascript" src="../control/control_user.js"></script>
 <?php
 require("../conector/conexion.php");
 $ID_user = $_POST['ID_user'];$query = mysqli_query($con,"SELECT * FROM user WHERE ID_user='$ID_user'");
  
  while($row = mysqli_fetch_array($query))
  {
    ?> 
    <input type="text" id="ID_user_edicion" value="<?php echo $ID_user;?>"><label> correo </label><?php $correo=$row['correo']; ?><label> password </label><?php $password=$row['password']; ?><label> permiso </label><?php $permiso=$row['permiso']; ?><input type="text" class="form-control" id="permiso" value="<?php echo $permiso;?>" placeholder="(*)Escriba su permiso" onkeyup="validador_campo('permiso','resp_permiso',4)" maxlength="100"><div id="resp_permiso"></div>

    <?php
  }


?>


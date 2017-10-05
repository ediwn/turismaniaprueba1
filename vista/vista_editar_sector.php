
 <script type="text/javascript" src="../control/control_sector.js"></script>
 <?php
 require("../conector/conexion.php");
 $ID_sector = $_POST['ID_sector'];$query = mysqli_query($con,"SELECT * FROM sector WHERE ID_sector='$ID_sector'");
  
  while($row = mysqli_fetch_array($query))
  {
    ?> 
    <input type="hidden" id="ID_sector_edicion" value="<?php 
    echo $ID_sector;?>">

    <label> Area : </label><?php $nombre_area=$row['nombre_area'];
           $sql3 = mysqli_query($con,"SELECT * FROM area WHERE ID_area = '$nombre_area'");

           while ($row3 = mysqli_fetch_array($sql3)) {
            
               $nombre_area = $row3['nombre_area'];
               echo $nombre_area;
            } ?>

    <select id="nombre_area" class="form-control" >
  
 	 <option value=""> Seleccione el area </option> 
	  <?php
	   $sql1 = mysqli_query($con,"SELECT * FROM area");

	   while ($row1 = mysqli_fetch_array($sql1)) {
	    $ID_area = $row1['ID_area'];
	    $nombre_area = $row1['nombre_area']
	       ?>
	        <option value="<?php echo $ID_area; ?>"> <?php echo $nombre_area; ?></option>
	       <?php
	   } ?>
    </select>


    <label> Empresa : </label><?php $empresa=$row['empresa']; 
    
     $sql4 = mysqli_query($con,"SELECT * FROM oferta WHERE ID_oferta='$empresa'");

        while ($row4 = mysqli_fetch_array($sql4)) {
        
          $oferta = $row4['titulo'];
            
              echo $oferta; 
          }

    ?>

    <select id="empresa" class="form-control" >
  
	  <option value=""> Seleccione la empresa </option> 
	  <?php
	    $sql2 = mysqli_query($con,"SELECT * FROM oferta");
	    while ($row2 = mysqli_fetch_array($sql2)) {
	    $ID_oferta = $row2['ID_oferta'];
	    $nombre = $row2['titulo']
	    ?>
	    <option value="<?php echo $ID_oferta; ?>"> <?php echo $nombre; ?></option>
	    <?php
	    }

	  ?>
   </select>

    <div id="resp_empresa"></div>



    <input type="hidden" class="form-control" id="ID_empresa" value="<?php echo $ID_empresa;?>" placeholder="(*)Escriba su ID_empresa" onkeyup="validador_campo('ID_empresa','resp_ID_empresa',4)" maxlength="10">

    <div id="resp_ID_empresa"></div>

   

    <input type="hidden" class="form-control" id="ID_sector" value="<?php echo $ID_sector;?>" placeholder="(*)Escriba su ID_sector" onkeyup="validador_campo('ID_sector','resp_ID_sector',4)" maxlength="10">

    <div id="resp_ID_sector"></div>

    <?php
  }


?>


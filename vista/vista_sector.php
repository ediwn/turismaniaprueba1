
   <link rel="stylesheet" type="text/css" href="../libreria/bootstrap/css/bootstrap.min.css">
   <script type="text/javascript" src="../libreria/bootstrap/js/jquery.min.js"></script>
   <script type="text/javascript" src="../libreria/bootstrap/js/bootstrap.min.js"></script>
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <div class="row" style="background: #585858;"> 
  <?php include "header_nav_root.php";?>
	
  <div class="col-lg-4 col-xs-12"></div>
	<div class="col-lg-4 col-xs-12" style="background: #EAECEE; margin-bottom: 2%; margin-top: 3%; ">
  <h2 align="center"> Sectores </h2>
	<label> Todos los campos con (*) son obligatorios </label> </br>

  <h6><label> Area </label></h6>

  <select id="nombre_area" class="form-control" >
  
  <option value=""> Seleccione el nombre_area </option> 
  <?php
   require('../conector/conexion.php');

   $sql = mysqli_query($con,"SELECT * FROM area");

   while ($row = mysqli_fetch_array($sql)) {
    $ID_area = $row['ID_area'];
    $nombre_area = $row['nombre_area']
       ?>
        <option value="<?php echo $ID_area; ?>"> <?php echo $nombre_area; ?></option>
       <?php
   }

  ?>
  </select>

  <h6><label> Empresa </label></h6>

  <select id="empresa" class="form-control" >
  
  <option value=""> Seleccione el empresa </option> 
 <?php
 

   $sql = mysqli_query($con,"SELECT * FROM oferta");

   while ($row = mysqli_fetch_array($sql)) {
    $ID_oferta = $row['ID_oferta'];
    $nombre = $row['titulo']
       ?>
        <option value="<?php echo $ID_oferta; ?>"> <?php echo $nombre; ?></option>
       <?php
   }

  ?>
  </select>


  <input type="hidden" id="ID_empresa" class="form-control" placeholder="(*)Escriba su ID_empresa" onkeyup="validador_campo('ID_empresa','resp_ID_empresa',1)" maxlength="10">

  <div id="resp_ID_empresa"></div>

 
  <input type="hidden" id="ID_sector" class="form-control" placeholder="(*)Escriba su ID_sector" onkeyup="validador_campo('ID_sector','resp_ID_sector',1)" maxlength="10">

  <div id="resp_ID_sector"></div>

  </br> 

  <center><button class="btn btn-default" onclick="btn_registro_sector()"> Agregar sector </button> 

  </center><hr>
  
  <div id="resultado_registro_sector"></div></div>
	
  <div class="col-lg-4 col-xs-12"></div>
  
  </div>

  <?php include "footer.php";
  ?>
<script type="text/javascript" src="../control/control_sector.js"></script>
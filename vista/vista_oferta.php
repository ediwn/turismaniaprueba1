<!DOCTYPE html>
<html>
<head>
  <title> Turismo </title>
     <?php
     include ('librerias_root.php');
     include ('header_nav_root.php');
     ?>
     
</head>
<body style="background: #585858;">
  
 <div class="row"> 
	
  <div class="col-lg-4 col-xs-12"></div>

	<div class="col-lg-4 col-xs-12" style="background:#E6E6E6; box-shadow: 1px 1px 1px 1px #848484; margin: 1%; ">
  <h2 align="center"> Registrar Oferta </h2>

	<label> Todos los campos con (*) son obligatorios </label> 
  </br>

  <h6><label> Nombre de la empresa </label></h6>
  <input type="text" id="titulo" class="form-control" placeholder="(*)Escriba su titulo" onkeyup="validador_campo('titulo','resp_titulo',4)" maxlength="100">

  <div id="resp_titulo"></div>

  <h6><label> Productos y servicios </label></h6>

  <textarea id="caracterisitca" class="form-control" placeholder="(*)Escriba su caracterisitca" onkeyup="validador_campo('caracterisitca','resp_caracterisitca',4)" maxlength="500"></textarea> 

  <div id="resp_caracterisitca"></div>

  <h6><label> Categoría de negocio </label></h6>

  <select class="form-control" id="seccion">
    <option value=""> Seleccione </option>
    <option> Hoteleria </option>
    <option> Restaurantes </option>
    <option> Turismo </option>
  </select>


  <h6><label> Icono </label></h6>

  <input type="text" id="icono" class="form-control" placeholder="(*) Logotipo " disabled style="background: transparent; border-style: none; box-shadow: none;">

    <form method="post" id="formulario" enctype="multipart/form-data">
      <center> <span class="btn btn-default btn-file" id="btn_icono">
        Subir Imagen  <input type="file" name="file" id="icono_empresa">
      </span> </center>
    </form>
   
  <div id="resp_icono"></div>

 

  <h6><label> Direccion </label></h6>
  <textarea id="direccion" class="form-control" placeholder="(*)Escriba su direccion" onkeyup="validador_campo('direccion','resp_direccion',4)" maxlength="300"></textarea> 

  <div id="resp_direccion"></div>

  <h6><label> Tel/cel </label></h6>

  <input type="number" id="tel_cel" class="form-control" placeholder="(*)Escriba su tel_cel" onkeyup="validador_campo('tel_cel','resp_tel_cel',4)" maxlength="10">

  <div id="resp_tel_cel"></div>

  <h6><label> Correo </label></h6>
  
  <input type="email" id="correo" class="form-control" placeholder="(*)Escriba su correo" onkeyup="validador_correo('correo','resp_correo',4)" maxlength="100"> 

  <div id="resp_correo"></div>

  <h6><label> Calificacion </label></h6>

  <select id="calificacion" class="form-control" >
   <option value=""> Seleccione la calificacion </option> 
   <option> 1 </option>
   <option> 2 </option>
   <option> 3 </option>
   <option> 4 </option>
   <option> 5 </option>
  </select>

  <h6><label> Descripcion empresa </label></h6>

  <textarea id="descripcion_empresa" class="form-control" placeholder="(*)Escriba su descripcion_empresa" onkeyup="validador_campo('descripcion_empresa','resp_descripcion_empresa',4)" maxlength="300"></textarea> 

  <div id="resp_descripcion_empresa"></div>

  <h6><label> Mapa google</label></h6>

  <textarea id="mapa_google" class="form-control" placeholder="(*)Escriba su mapa_google" onkeyup="validador_campo('mapa_google','resp_mapa_google',4)" maxlength="300"></textarea> 

  <div id="resp_mapa_google"></div>

  <h6><label> Relacionar empresas </label></h6>
  <select id="relacionar_empresas" class="form-control" >
   <option value=""> Agregar </option> 
   <?php  require 'vista_empresas.php';?>
  </select>
 
  </br> 


  <center>

  <div id="panel_empresas"></div>

  <button class="btn btn-default" onclick="btn_registro_oferta()"> REGISTRAR </button> 
  </center>
  </br> 

   <div id="resultado_registro_oferta" style="text-align: left;"></div>
   </div>
	 
   <div class="col-lg-4 col-xs-12"></div>
  
  </div>

</body>
<?php
   include ('footer.php');
?>
<script type="text/javascript" src="../control/control_oferta.js"></script>
</html>

<style type="text/css">
  .btn-file {
  position: relative;
  overflow: hidden;
  }
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
</style>


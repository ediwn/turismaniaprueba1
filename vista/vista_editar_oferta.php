

 <?php
 require("../conector/conexion.php");
 $ID_oferta = $_POST['ID_oferta'];$query = mysqli_query($con,"SELECT * FROM oferta WHERE ID_oferta='$ID_oferta'");
  
  while($row = mysqli_fetch_array($query))
  {
    ?> 
    <input type="hidden" id="ID_oferta_edicion" value="<?php echo $ID_oferta;?>">
    
    <label> Caracterisitca </label>
    <?php $caracterisitca=$row['caracterisitca']; ?>
    <textarea class="form-control" id="caracterisitca" placeholder="(*)Escriba su caracterisitca" onkeyup="validador_campo('caracterisitca','resp_caracterisitca',4)" maxlength="100"> <?php echo $caracterisitca;?>  </textarea> 
    <div id="resp_caracterisitca"></div>

    <label> Logo </label>
    <?php $icono=$row['icono']; ?>

    <input type="text" class="form-control" id="icono" value="<?php echo $icono;?>" placeholder="(*)Escriba su icono" onkeyup="validador_campo('icono','resp_icono',4)" maxlength="100" disabled>

    <form method="post" id="formulario" enctype="multipart/form-data">
      <center> <span class="btn btn-default btn-file" id="btn_icono">
        Subir Imagen  <input type="file" name="file" id="icono_empresa">
      </span> </center>
    </form>
   
    <div id="resp_icono">
    	<center>
        <img src="../multimedia/img-empresa/<?php echo $icono;?>" style="height: 100px; height: 100px;">
        </center>
    </div>


    <label> Empresa </label><?php $titulo=$row['titulo']; ?>
    <input type="text" class="form-control" id="titulo" value="<?php echo $titulo;?>" placeholder="(*)Escriba su empresa" onkeyup="validador_campo('titulo','resp_titulo',4)" maxlength="100">

    <div id="resp_titulo"></div>

    <label> Direccion </label><?php $direccion=$row['direccion']; ?>

    <textarea class="form-control" id="direccion" placeholder="(*)Escriba su direccion" onkeyup="validador_campo('direccion','resp_direccion',4)" maxlength="100"> <?php echo $direccion;?>  </textarea> 

    <div id="resp_direccion"></div>


    <label> Tel/cel </label><?php $tel_cel=$row['tel_cel']; ?>

    <input type="number" class="form-control" id="tel_cel" value="<?php echo $tel_cel;?>" placeholder="(*)Escriba su tel_cel" onkeyup="validador_campo('tel_cel','resp_tel_cel',4)" maxlength="10">

    <div id="resp_tel_cel"></div>

    <label> Correo </label><?php $correo = $row['correo']; ?>

    <input type="text" class="form-control" id="correo_ed" value="<?php echo $correo; ?>" placeholder="(*)Escriba su correo" validador_correo('correo_ed','resp_correo_ed',4)" maxlength="100">

    <div id="resp_correo_ed"></div>

    <label> Calificacion : </label><?php echo " "; echo $calificacion=$row['calificacion']; ?>

    <select id="calificacion" class="form-control" >
      <option value=""> Califica </option> 
	   <option> 1 </option>
	   <option> 2 </option>
	   <option> 3 </option>
	   <option> 4 </option>
	   <option> 5 </option>
    </select>

    <label> Descripcion </label><?php $descripcion_empresa=$row['descripcion_empresa']; ?>

    <textarea class="form-control" id="descripcion_empresa" placeholder="(*)Escriba su descripcion_empresa" onkeyup="validador_campo('descripcion_empresa','resp_descripcion_empresa',4)" maxlength="100"> <?php echo $descripcion_empresa;?>  </textarea> 

    <div id="resp_descripcion_empresa"></div>

    <label> Mapa google </label><?php $mapa_google=$row['mapa_google']; ?>

    <textarea class="form-control" id="mapa_google" placeholder="(*)Escriba su mapa_google" onkeyup="validador_campo('mapa_google','resp_mapa_google',4)" maxlength="500"> <?php echo $mapa_google;?>  </textarea> 

    <div id="resp_mapa_google"></div>

    <label> Relacionar Empresas </label>


    <div id="resp_relacionar_empresas"></div>

    <?php
  }


?>

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

 <script type="text/javascript" src="../control/control_oferta.js"></script>
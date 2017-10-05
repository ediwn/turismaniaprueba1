
   <link rel="stylesheet" type="text/css" href="../libreria/bootstrap/css/bootstrap.min.css">
   <script type="text/javascript" src="../libreria/bootstrap/js/jquery.min.js"></script>
   <script type="text/javascript" src="../libreria/bootstrap/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="../control/control_area.js"></script>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <div class="row" style="background: #585858;"> <?php include "header_nav_root.php";?>
	<div class="col-lg-3 col-xs-12"></div>
	<div class="col-lg-6 col-xs-12" style="background:#E6E6E6; box-shadow: 1px 1px 1px 1px #848484; margin: 1%; ">
    <h2 align="center"> Area de turismo </h2>
	<label> Todos los campos con (*) son obligatorios </label> </br><h6><label> Nombre del Area</label></h6><input type="text" id="nombre_area" class="form-control" placeholder="(*)Escriba su nombre_area" onkeyup="validador_campo('nombre_area','resp_nombre_area',4)" maxlength="100"><div id="resp_nombre_area"></div></br> <center><button class="btn btn-default" onclick="btn_registro_area()"> Agregar area </button> </center><hr>
   <div id="resultado_registro_area"></div></div>
	       <div class="col-lg-3 col-xs-12"></div>
           </div>

           <?php include "footer.php";

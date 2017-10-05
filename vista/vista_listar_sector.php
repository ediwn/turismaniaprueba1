<link rel="stylesheet" type="text/css" href="../libreria/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="../libreria/bootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="../libreria/bootstrap/js/bootstrap.min.js"></script>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <div class="row">
    <?php include "header_nav_root.php";?>
    <!-- Formulario de Busqueda-->
    <div class="col-lg-4 col-xs-12"></div>
    <div class="col-lg-4 col-xs-12">

		       <h2 align="center"> Sectores </h2>
		     <table class="table table-condensed">
		     	<tr>
		     		<td> 
                     <input type="text" class="form-control" id="txt_buscar_sector" placeholder="Buscar">
		     		</td>
		     		<td>
		     		  <button class="btn btn-default" onclick="btn_buscar_sector()"> Buscar </button>
		     		</td>
		     	</tr>
		     </table>
		  </div>
		  <div id="resp_busqueda_sector"></div>
		  <hr>

    <div class="col-lg-12 col-xs-12"></div>

  

	<div class="col-lg-2 col-xs-12"> </div>
	<div class="col-lg-8 col-xs-12" >
		<h3> Listado de sector </h3>
		
         <div class="table responsive" id="panel_listado_sector"></div>
        
	</div>
	<div class="col-lg-2 col-xs-12"></div>
</div>

<?php include "footer.php"; ?>

<script>
  $(document).ready(function(){
    cargar_datos(1);
  });

  function cargar_datos(page){
    var parametros = {"action":"ajax","page":page};
    $("#loader").fadeIn("slow");
    $.ajax({
      url:"../modelo/modelo_listar_sector.php",
      data: parametros,
       beforeSend: function(objeto){
       $("#loader").html("cargando .... ");
      },
      success:function(data){
        $("#panel_listado_sector").html(data).fadeIn("slow");
        $("#loader").html("");
      }
    })
  }

   function btn_buscar_sector(){

    var txt_buscar_sector=$("#txt_buscar_sector").val();

    var parametros = {"action":"ajax","txt_buscar_sector":txt_buscar_sector};
    
    $("#loader").fadeIn("slow");
    $.ajax({
      url:"../modelo/modelo_buscar_listado_sector.php",
      data: parametros,
       beforeSend: function(objeto){
       $("#loader").html("cargando .... ");
      },
      success:function(data){
        $("#panel_listado_sector").html(data).fadeIn("slow");
        $("#loader").html("");
      }
    })
  }
  </script>

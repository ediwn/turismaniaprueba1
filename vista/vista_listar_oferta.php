<link rel="stylesheet" type="text/css" href="../libreria/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="../libreria/bootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="../libreria/bootstrap/js/bootstrap.min.js"></script>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <div class="row" style="background: #2E2E2E; color:white; ">
    <?php include "header_nav_root.php";?>
    <!-- Formulario de Busqueda-->
    <div class="col-lg-6 col-xs-12" style="padding-top:0%;">

		     <h2 align="center"> EMPRESAS REGISTRADAS </h2>
		     <table class="table table-condensed">
		     	<tr>
		     		<td> 
                     <input type="text" class="form-control" id="txt_buscar_oferta" placeholder="Buscar">
		     		</td>
		     		<td>
		     		  <button class="btn btn-default" onclick="btn_buscar_oferta()"> Buscar </button>
		     		</td>
		     	</tr>
		     </table>
		  </div>
		  <div id="resp_busqueda_oferta"></div>

  <div class="col-lg-12 col-xs-12"></div>

	<div class="col-lg-12 col-xs-12" style="padding-left: 2%;">
		<h3> Listado de oferta </h3>
		
      <div class="table responsive" id="panel_listado_oferta" style="padding: 2%;"></div>
        
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
      url:"../modelo/modelo_listar_oferta.php",
      data: parametros,
       beforeSend: function(objeto){
       $("#loader").html("cargando .... ");
      },
      success:function(data){
        $("#panel_listado_oferta").html(data).fadeIn("slow");
        $("#loader").html("");
      }
    })
  }

   function btn_buscar_oferta(){

    var txt_buscar_oferta=$("#txt_buscar_oferta").val();

    var parametros = {"action":"ajax","txt_buscar_oferta":txt_buscar_oferta};
    
    $("#loader").fadeIn("slow");
    $.ajax({
      url:"../modelo/modelo_buscar_listado_oferta.php",
      data: parametros,
       beforeSend: function(objeto){
       $("#loader").html("cargando .... ");
      },
      success:function(data){
        $("#panel_listado_oferta").html(data).fadeIn("slow");
        $("#loader").html("");
      }
    })
  }
  </script>

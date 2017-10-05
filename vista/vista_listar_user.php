<link rel="stylesheet" type="text/css" href="../libreria/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="../libreria/bootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="../libreria/bootstrap/js/bootstrap.min.js"></script>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <div class="row">
    <?php include "header_nav.php";?>
    <!-- Formulario de Busqueda-->
    <div class="col-lg-4 col-xs-12"></div>
    <div class="col-lg-4 col-xs-12">

		     
		     <table class="table table-condensed">
		     	<tr>
		     		<td> 
                     <input type="text" class="form-control" id="txt_buscar_user" placeholder="Buscar">
		     		</td>
		     		<td>
		     		  <button class="btn btn-default" onclick="btn_buscar_user()"> Buscar </button>
		     		</td>
		     	</tr>
		     </table>
		  </div>
		  <div id="resp_busqueda_user"></div>
		  <hr>

    <div class="col-lg-12 col-xs-12"></div>

  

	<div class="col-lg-2 col-xs-12"> </div>
	<div class="col-lg-8 col-xs-12" >
		<h3> Listado de user </h3>
		
         <div class="table responsive" id="panel_listado_user"></div>
        
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
      url:"../modelo/modelo_listar_user.php",
      data: parametros,
       beforeSend: function(objeto){
       $("#loader").html("cargando .... ");
      },
      success:function(data){
        $("#panel_listado_user").html(data).fadeIn("slow");
        $("#loader").html("");
      }
    })
  }

   function btn_buscar_user(){

    var txt_buscar_user=$("#txt_buscar_user").val();

    var parametros = {"action":"ajax","txt_buscar_user":txt_buscar_user};
    
    $("#loader").fadeIn("slow");
    $.ajax({
      url:"../modelo/modelo_buscar_listado_user.php",
      data: parametros,
       beforeSend: function(objeto){
       $("#loader").html("cargando .... ");
      },
      success:function(data){
        $("#panel_listado_user").html(data).fadeIn("slow");
        $("#loader").html("");
      }
    })
  }
  </script>

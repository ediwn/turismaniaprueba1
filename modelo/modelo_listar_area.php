<?php
    require("../conector/conexion.php");
   
    $action = (isset($_REQUEST["action"])&& $_REQUEST["action"] !=NULL)?$_REQUEST["action"]:"";
    
    if($action == "ajax"){
    include "paginacion.php"; //incluir el archivo de paginación
    //las variables de paginación
    
    $page = (isset($_REQUEST["page"]) && !empty($_REQUEST["page"]))?$_REQUEST["page"]:1;
    $per_page = 10; //la cantidad de registros que desea mostrar
    $adjacents  = 4; //brecha entre páginas después de varios adyacentes
    $offset = ($page - 1) * $per_page;
    
    //Cuenta el número total de filas de la tabla*/
    
    $count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM area");
    if ($row= mysqli_fetch_array($count_query)){$numrows = $row["numrows"];}
    $total_pages = ceil($numrows/$per_page);
    $reload = "../vista/vista_listar_area.php";

    //consulta principal para recuperar los datos
    $query = mysqli_query($con,"SELECT * FROM area order by ID_area LIMIT $offset,$per_page");
    
    if ($numrows>0){
      ?>
    <table class="table table-bordered">
        <thead>
        <tr><th>nombre_area</th>
      <th class="col-lg-2" aling="center"> </th> </tr>
      </thead>
      <tbody>
      <?php
       while($row = mysqli_fetch_array($query)){
        $ID_area=$row['ID_area'];
        ?>
        <tr><td><?php echo $row["nombre_area"];?></td><td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal" onclick="btn_editar_area('<?php echo $ID_area;?>')"> Editar </button> 
    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal_Elimar" onclick="btn_eliminar_area('<?php echo $ID_area;?>')"> Eliminar </button> </td></tr>
        <?php
      }
      ?>
      </tbody>
    </table>

      <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Editar area </h4>
              </div>
              <div class="modal-body">

                 <div id="panel_edicion_area">
                   
                 </div>

              </div>
              <div class="modal-footer">
              <div id="respuesta_guardar_cambios_area"></div>
                <button type="button" class="btn btn-success" onclick="btn_guardar_cambios_area()"> Guardar </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"> Cerrar </button>
              </div>
            </div>

          </div>
        </div>

     <!-- MODAL ELIMINAR AREA-->
        <!-- Modal -->
        <div id="myModal_Elimar" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Eliminar area</h4>
              </div>
              <div class="modal-body">
              <input type="text" id="ID_eliminar_area">
                

                 <div id="panel_eliminar_area">
                    <div class="alert alert-danger" role="alert">
                   <strong> SEGURO !! </strong> Desea eliminar este dato ?
                    </div>
                 </div>

              </div>
              <div class="modal-footer">
              <div id="respuesta_eliminar_total_area"></div>
                <button type="button" class="btn btn-success" onclick="btn_borrar_area()"> Eliminar </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"> Cerrar </button>
              </div>
            </div>

          </div>
        </div>

     <!-- FINALIZA EL MODAL -->


    <div class="table-pagination pull-right">
      <?php echo paginate($reload, $page, $total_pages, $adjacents);?>
    </div>
    
      <?php
      
    } else {
      ?>
      <div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>Aviso!!!</h4> No hay datos para mostrar
            </div>
      <?php
    }
  }
?>


<script type="text/javascript">

  //FUNCION DE EDICION DE LOS DATOS 

  function btn_editar_area(ID_area)
  { 
     var parametros = {ID_area:ID_area};
    
    $.ajax({
      type: "POST",
      url:"../vista/vista_editar_area.php",
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $("#panel_edicion_area").html(data).fadeIn("slow");;
      }
    });

  }

  function btn_guardar_cambios_area()
  {
   var ID_area =$("#ID_area_edicion").val();
   var nombre_area = $("#nombre_area").val(); var parametros = {ID_area: ID_area,nombre_area:nombre_area};
     
    $.ajax({
      type: "POST",
      url:"../modelo/modelo_guardar_area.php",
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $("#respuesta_guardar_cambios_area").html(data).fadeIn("slow");
        window.setTimeout("actualizar_datos_area_editar()",3000);

      }
    });

  }

  function actualizar_datos_area_editar()
  {  $("#myModal").modal("hide").fadeIn("slow");
     $("#respuesta_guardar_cambios_area").html("").fadeIn("slow");
     location.reload();
  }


 function btn_eliminar_area(ID_area)
 {
    $("#ID_eliminar_area").val(ID_area);
 }

 function btn_borrar_area()
  {  
     var ID_area = $("#ID_eliminar_area").val();
     var parametros = {ID_area:ID_area};
    
     $.ajax({
      type: "POST",
      url:"../modelo/modelo_eliminar_area.php",
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $("#panel_eliminar_area").html(data).fadeIn("slow");
          window.setTimeout("actualizar_datos_area_eliminar()",3000);
      }
    });
  }

function actualizar_datos_area_eliminar()
  {  $("#myModal").modal("hide").fadeIn("slow");
     $("#respuesta_eliminar_total_area").html("").fadeIn("slow");
     location.reload();
  }

</script>



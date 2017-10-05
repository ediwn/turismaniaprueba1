
<?php
   require("../conector/conexion.php");

   $action = (isset($_REQUEST["action"])&& $_REQUEST["action"] !=NULL && $_REQUEST["txt_buscar_oferta"])?$_REQUEST["action"]:"";
 
   if($action == "")
    {
      ?>
      <div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>Aviso!!!</h4> debe escribir datos en el buscador para mostrarlos
            </div>
      
      <a href="../vista/vista_listar_oferta.php"> Volver al listado </a>
      <?php
    }

  if($action == "ajax"){
    include "paginacion.php"; //incluir el archivo de paginación
    //las variables de paginación
    echo "<h4> RESULTADOS PARA : ";
    $txt_buscar_oferta=$_REQUEST["txt_buscar_oferta"];
    
   

    echo "<label>".$txt_buscar_oferta." !! </label> </h4>";
    ?><a href="../vista/vista_listar_oferta.php"> Volver al listado </a> <?php

    $page = (isset($_REQUEST["page"]) && !empty($_REQUEST["page"]))?$_REQUEST["page"]:1;
    $per_page = 10; //la cantidad de registros que desea mostrar
    $adjacents  = 4; //brecha entre páginas después de varios adyacentes
    $offset = ($page - 1) * $per_page;
    
    //Cuenta el número total de filas de la tabla*/
    
    $count_query = mysqli_query($con,"SELECT count(*) AS numrows FROM oferta WHERE caracterisitca LIKE '%$txt_buscar_oferta%' OR icono LIKE '%$txt_buscar_oferta%' OR titulo LIKE '%$txt_buscar_oferta%' OR direccion LIKE '%$txt_buscar_oferta%' OR tel_cel LIKE '%$txt_buscar_oferta%' OR calificacion LIKE '%$txt_buscar_oferta%' OR descripcion_empresa LIKE '%$txt_buscar_oferta%' OR mapa_google LIKE '%$txt_buscar_oferta%' OR correo LIKE '%$txt_buscar_oferta%' ");if ($row= mysqli_fetch_array($count_query)){$numrows = $row["numrows"];}
    $total_pages = ceil($numrows/$per_page);
    $reload = "../vista/vista_listar_oferta.php";

    //consulta principal para recuperar los datos
    $query = mysqli_query($con,"SELECT * FROM oferta WHERE caracterisitca LIKE '%$txt_buscar_oferta%' OR icono LIKE '%$txt_buscar_oferta%' OR titulo LIKE '%$txt_buscar_oferta%' OR direccion LIKE '%$txt_buscar_oferta%' OR tel_cel LIKE '%$txt_buscar_oferta%' OR calificacion LIKE '%$txt_buscar_oferta%' OR descripcion_empresa LIKE '%$txt_buscar_oferta%' OR mapa_google LIKE '%$txt_buscar_oferta%' OR correo LIKE '%$txt_buscar_oferta%'  order by ID_oferta LIMIT $offset,$per_page");
    
    if ($numrows>0){
      ?>
 <div class="table-responsive">
    <table class="table table-bordered table-condensed table-hover">
        <thead>
        <tr>
        <th> Caracteristicas </th>
        <th> Logo </th>
        <th> Nombre </th>
        <th> Direccion </th>
        <th> Correo </th>
        <th> Tel/cel </th>
        <th> Calificacion </th>
        <th> Descripcion </th>
        <th> Ubicacion </th>
        <th> Edicion </th>

      <th class="col-lg-2" aling="center"> </th> </tr>
      </thead>
      <tbody>
      <?php
       while($row = mysqli_fetch_array($query)){
        $ID_oferta=$row['ID_oferta'];
        ?>
        <tr>
        <td><?php echo $row["caracterisitca"];?></td>
        <td>
        <img src="../multimedia/img-empresa/<?php echo $row["icono"];?>" style='height: 100px; width: 100px;'>
       </td>
        <td><?php echo $row["titulo"];?></td>
        <td><?php echo $row["direccion"];?></td>
        <td><?php echo $row["correo"];?></td>
        <td><?php echo $row["tel_cel"];?></td>
        <td><?php echo $row["calificacion"];?></td>
        <td><?php echo $row["descripcion_empresa"];?></td>
        <td >
         <div style="width: 200px; height: 100px; overflow-x: scroll; overflow-y: scroll;">
          <?php echo $row["mapa_google"];?>
         </div>
        </td>
        
        <td>
            
              <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal" onclick="btn_editar_oferta('<?php echo $ID_oferta;?>')"> Editar </button>
         
              <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal_Elimar" onclick="btn_eliminar_oferta('<?php echo $ID_oferta;?>')"> Eliminar </button>
           
    
     </td></tr>
        <?php
      }
      ?>
      </tbody>
    </table>
    </div>

      <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Editar oferta </h4>
              </div>
              <div class="modal-body">

                 <div id="panel_edicion_oferta">
                   
                 </div>

              </div>
              <div class="modal-footer">
              <div id="respuesta_guardar_cambios_oferta"></div>
                <button type="button" class="btn btn-success" onclick="btn_guardar_cambios_oferta()"> Guardar </button>
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
                <h4 class="modal-title"> Eliminar oferta</h4>
              </div>
              <div class="modal-body">
              <input type="text" id="ID_eliminar_oferta">
                

                 <div id="panel_eliminar_oferta">
                    <div class="alert alert-danger" role="alert">
                   <strong> SEGURO !! </strong> Desea eliminar este dato ?
                    </div>
                 </div>

              </div>
              <div class="modal-footer">
              <div id="respuesta_eliminar_total_oferta"></div>
                <button type="button" class="btn btn-success" onclick="btn_borrar_oferta()"> Eliminar </button>
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

  function btn_editar_oferta(ID_oferta)
  { 
     var parametros = {ID_oferta:ID_oferta};
    
    $.ajax({
      type: "POST",
      url:"../vista/vista_editar_oferta.php",
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $("#panel_edicion_oferta").html(data).fadeIn("slow");;
      }
    });

  }

  function btn_guardar_cambios_oferta()
  {
   var ID_oferta =$("#ID_oferta_edicion").val();
   var caracterisitca = $("#caracterisitca").val();  var icono = $("#icono").val();  var titulo = $("#titulo").val();  var direccion = $("#direccion").val();  var tel_cel = $("#tel_cel").val();  var calificacion = $("#calificacion").val();  var descripcion_empresa = $("#descripcion_empresa").val();  var mapa_google = $("#mapa_google").val();  var relacionar_empresas = $("#relacionar_empresas").val(); var parametros = {ID_oferta: ID_oferta,caracterisitca:caracterisitca,icono:icono,titulo:titulo,direccion:direccion,tel_cel:tel_cel,calificacion:calificacion,descripcion_empresa:descripcion_empresa,mapa_google:mapa_google,relacionar_empresas:relacionar_empresas};
     
    $.ajax({
      type: "POST",
      url:"../modelo/modelo_guardar_oferta.php",
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $("#respuesta_guardar_cambios_oferta").html(data).fadeIn("slow");
        window.setTimeout("actualizar_datos_oferta_editar()",3000);

      }
    });

  }

  function actualizar_datos_oferta_editar()
  {  $("#myModal").modal("hide").fadeIn("slow");
     $("#respuesta_guardar_cambios_oferta").html("").fadeIn("slow");
     location.reload();
  }


 function btn_eliminar_oferta(ID_oferta)
 {
    $("#ID_eliminar_oferta").val(ID_oferta);
 }

 function btn_borrar_oferta()
  {  
     var ID_oferta = $("#ID_eliminar_oferta").val();
     var parametros = {ID_oferta:ID_oferta};
    
     $.ajax({
      type: "POST",
      url:"../modelo/modelo_eliminar_oferta.php",
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $("#panel_eliminar_oferta").html(data).fadeIn("slow");
          window.setTimeout("actualizar_datos_oferta_eliminar()",3000);
      }
    });
  }

function actualizar_datos_oferta_eliminar()
  {  $("#myModal").modal("hide").fadeIn("slow");
     $("#respuesta_eliminar_total_oferta").html("").fadeIn("slow");
     location.reload();
  }

</script>


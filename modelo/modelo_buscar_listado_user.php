
<?php
   require("../conector/conexion.php");

   $action = (isset($_REQUEST["action"])&& $_REQUEST["action"] !=NULL && $_REQUEST["txt_buscar_user"])?$_REQUEST["action"]:"";
 
   if($action == "")
    {
      ?>
      <div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>Aviso!!!</h4> debe escribir datos en el buscador para mostrarlos
            </div>
      
      <a href="../vista/vista_listar_user.php"> Volver al listado </a>
      <?php
    }

  if($action == "ajax"){
    include "paginacion.php"; //incluir el archivo de paginación
    //las variables de paginación
    echo "<h4> RESULTADOS PARA : ";
    $txt_buscar_user=$_REQUEST["txt_buscar_user"];
    
   

    echo "<label>".$txt_buscar_user." !! </label> </h4>";
    ?><a href="../vista/vista_listar_user.php"> Volver al listado </a> <?php

    $page = (isset($_REQUEST["page"]) && !empty($_REQUEST["page"]))?$_REQUEST["page"]:1;
    $per_page = 10; //la cantidad de registros que desea mostrar
    $adjacents  = 4; //brecha entre páginas después de varios adyacentes
    $offset = ($page - 1) * $per_page;
    
    //Cuenta el número total de filas de la tabla*/
    
    $count_query = mysqli_query($con,"SELECT count(*) AS numrows FROM user WHERE correo LIKE '%$txt_buscar_user%' OR password LIKE '%$txt_buscar_user%' OR permiso LIKE '%$txt_buscar_user%' ");if ($row= mysqli_fetch_array($count_query)){$numrows = $row["numrows"];}
    $total_pages = ceil($numrows/$per_page);
    $reload = "../vista/vista_listar_user.php";

    //consulta principal para recuperar los datos
    $query = mysqli_query($con,"SELECT * FROM user WHERE correo LIKE '%$txt_buscar_user%' OR password LIKE '%$txt_buscar_user%' OR permiso LIKE '%$txt_buscar_user%'  order by ID_user LIMIT $offset,$per_page");
    
    if ($numrows>0){
      ?>
    <table class="table table-bordered">
        <thead><th>correo</th><th>password</th><th>permiso</th><th class="col-lg-2" aling="center"> </th> </tr>
      </thead>
      <tbody>
      <?php
       while($row = mysqli_fetch_array($query)){$ID_user=$row['ID_user'];?> <tr><td><?php echo $row["correo"];?></td><td><?php echo $row["password"];?></td><td><?php echo $row["permiso"];?></td><td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal" onclick="btn_editar_user('<?php echo $ID_user;?>')"> Editar </button> 
    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal_Elimar" onclick="btn_eliminar_user('<?php echo $ID_user;?>')"> Eliminar </button> </td></tr>
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
                <h4 class="modal-title"> Editar user </h4>
              </div>
              <div class="modal-body">

                 <div id="panel_edicion_user">
                   
                 </div>

              </div>
              <div class="modal-footer">
              <div id="respuesta_guardar_cambios_user"></div>
                <button type="button" class="btn btn-success" onclick="btn_guardar_cambios_user()"> Guardar </button>
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
                <h4 class="modal-title"> Eliminar user</h4>
              </div>
              <div class="modal-body">
              <input type="text" id="ID_eliminar_user">
                

                 <div id="panel_eliminar_user">
                    <div class="alert alert-danger" role="alert">
                   <strong> SEGURO !! </strong> Desea eliminar este dato ?
                    </div>
                 </div>

              </div>
              <div class="modal-footer">
              <div id="respuesta_eliminar_total_user"></div>
                <button type="button" class="btn btn-success" onclick="btn_borrar_user()"> Eliminar </button>
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

  function btn_editar_user(ID_user)
  { 
     var parametros = {ID_user:ID_user};
    
    $.ajax({
      type: "POST",
      url:"../vista/vista_editar_user.php",
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $("#panel_edicion_user").html(data).fadeIn("slow");;
      }
    });

  }

  function btn_guardar_cambios_user()
  {
   var ID_user =$("#ID_user_edicion").val();
   var correo = $("#correo").val();  var password = $("#password").val();  var permiso = $("#permiso").val(); var parametros = {ID_user: ID_user,correo:correo,password:password,permiso:permiso};
     
    $.ajax({
      type: "POST",
      url:"../modelo/modelo_guardar_user.php",
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $("#respuesta_guardar_cambios_user").html(data).fadeIn("slow");
        window.setTimeout("actualizar_datos_user_editar()",3000);

      }
    });

  }

  function actualizar_datos_user_editar()
  {  $("#myModal").modal("hide").fadeIn("slow");
     $("#respuesta_guardar_cambios_user").html("").fadeIn("slow");
     location.reload();
  }


 function btn_eliminar_user(ID_user)
 {
    $("#ID_eliminar_user").val(ID_user);
 }

 function btn_borrar_user()
  {  
     var ID_user = $("#ID_eliminar_user").val();
     var parametros = {ID_user:ID_user};
    
     $.ajax({
      type: "POST",
      url:"../modelo/modelo_eliminar_user.php",
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $("#panel_eliminar_user").html(data).fadeIn("slow");
          window.setTimeout("actualizar_datos_user_eliminar()",3000);
      }
    });
  }

function actualizar_datos_user_eliminar()
  {  $("#myModal").modal("hide").fadeIn("slow");
     $("#respuesta_eliminar_total_user").html("").fadeIn("slow");
     location.reload();
  }

</script>


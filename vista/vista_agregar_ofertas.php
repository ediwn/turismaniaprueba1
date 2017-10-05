<div class="row">
	<div class="col-lg-12 col-xs-12">
	<select class="form-control" id="selec_agregar_empresa_ed">
		<option value=""> Agregar </option>
	
		<?php
		 require '../conector/conexion.php';
 		
 		 $query = mysqli_query($con,"SELECT * FROM oferta");

          while ($fila = mysqli_fetch_array($query)) {
          	 ?>
          	 <option value="<?php echo $fila['ID_oferta']; ?>"> <?php echo $fila['titulo']; ?></option>
          	 <?php
          	 
          }

		?>
		</select>
	</div>
	<div class="col-lg-12 col-xs-12" id="panel_edicion_relacion_empresas">
	<center>
	<div align="center" style="width: 70%; background: #8A2908; color: white;">
		<h3> Lista de Ofertas </h3>
		<table class="table table-condensed table-bordered table-hover">
		<?php
          $ID_empresa = $_POST['ID_empresa'];
          $correo_ed = $_POST['correo_ed'];
        

          $sql=mysqli_query($con,"SELECT * FROM relacion WHERE correo_empresa = '$correo_ed'");

          while ($row = mysqli_fetch_array($sql)) {
          	   $ID_relacion = $row['ID_relacion'];
          	   $ID_oferta_rela = $row['ID_relacionados'];
          	 ?>
          	 <tr>
				<td>
					<?php
                       $sql2 = mysqli_query($con,"SELECT * FROM oferta WHERE ID_oferta = '$ID_oferta_rela'");

                       while($row2 = mysqli_fetch_array($sql2))
                       {
                          echo $row2['correo'];
                       }
					?>
				</td>
				<td align="center">
					<button class="btn btn-danger btn-xs" onclick="eliminar_oferta_edicion('<?php echo $ID_relacion;?>')"> Eliminar X </button>
				</td>
			</tr>

          	 <?php
          
          }

		?>
		 </table>
		</div>
		</center>
	  </div>
	</div>
</div>

<script type="text/javascript" >
	// Edicion de empresas 
 $("#selec_agregar_empresa_ed").change(function(){
    var ID_empresa = $("#selec_agregar_empresa_ed").val();
    var correo = $('#correo_ed').val();

    //alert(correo+" - "+ID_empresa);

    var ob ={ID_empresa:ID_empresa, correo:correo};
      $.ajax({
                type: "POST",
                url:"../modelo/modelo_relacionar_empresas.php",
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $("#panel_edicion_relacion_empresas").html(data);
                }
             });
   
   });

  function eliminar_oferta_edicion(ID_relacion)
  {
     
      var correo = $('#correo_ed').val();

     // alert('eliminar'+ID_relacion+" "+correo);

      var ob ={ ID_relacion:ID_relacion, correo:correo };

      $.ajax({
                type: "POST",
                url:"../modelo/eliminar_relacion.php",
                data: ob,
                beforeSend: function(objeto){
                },
                success: function(data)
                { 
                  $("#panel_edicion_relacion_empresas").html(data);
                }
         });
  }

</script>
	

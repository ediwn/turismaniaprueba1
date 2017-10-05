<?php

 $ID_empresa = $_POST['ID_empresa'];
 $correo = $_POST['correo'];

 require '../conector/conexion.php';

 mysqli_query($con,"INSERT INTO `relacion` (`ID_relacion`, `correo_empresa`, `ID_relacionados`) VALUES (NULL, '$correo', '$ID_empresa')");

?>
<center>
	<div align="center" style="width: 70%; background: #8A2908; color: white;">
		<h3> Lista de Ofertas </h3>
		<table class="table table-condensed table-bordered table-hover">
		<?php
        

          $sql=mysqli_query($con,"SELECT * FROM relacion WHERE correo_empresa = '$correo'");

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
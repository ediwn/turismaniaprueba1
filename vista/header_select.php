<div class="row" style="padding: 0px; margin: 0px; border-style: none; margin-top: 0px;">
	<div class="col-lg-12 col-xs-12" style="padding:0px; background: #0B610B; border-style: none; margin-top: 0px; ">
	<div class="table-responsive" style="border-style: none; margin-top: 0px; border-style: none">
		<?php
         require ("../conector/conexion.php");
         $sql = mysqli_query($con,"SELECT * FROM area");

         ?>
         <center>
		 <table style="margin: 0px; width: 100%;">
		 <tr>
		    <?php
		      while ($row = mysqli_fetch_array($sql)) {
		      	   $area = $row['nombre_area'];
		      	   $ID_area = $row['ID_area'];
		      	  ?>
                   <td align="center" onclick="btn_mostrar_area('<?php echo $area;?>','<?php echo $ID_area;?>');" style="cursor: pointer;" id="filtrador_areas"> <?php echo $area; ?></td>
		      	  <?php
		      }
		    ?>
		 	
		 </tr>
		 </table>
		 </center>
		 </div>
         <?php
      
		?>
	</div>
</div>


<style type="text/css">
	#filtrador_areas
	{ 
		color:#86B404;
		transition: 1s;
		font-weight: bold;
		padding: 3px;

	}
	#filtrador_areas:hover
	{
		font-weight: bold;
		color: #DF7401;
		transition: 1s;
		font-family: 'Open Sans', sans-serif;
		font-size: 20px;
	}
	
	/*::-webkit-scrollbar {
      width: 15px;
     }
     */
	
</style>
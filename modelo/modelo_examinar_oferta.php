<div align="left" style="background: ; padding: 0px; margin: 0px;">
	<a href="menu.php" style="font-size: 20px;"> Volver al menu </a>
	</br>
	</br>
</div>
<?php

 $ID_oferta = $_POST['ID_oferta'];
 require '../conector/conexion.php';

 $sql = mysqli_query($con,"SELECT * FROM oferta WHERE ID_oferta='$ID_oferta'");
 while ($row = mysqli_fetch_array($sql)) {
 	
 	$caracteristica = $row['caracterisitca'];
 	$icono = $row['icono'];
 	$titulo = $row['titulo'];
 	$direccion = $row['direccion'];
 	$tel_cel = $row['tel_cel'];
 	$correo = $row['correo'];
 	$calificacion = $row['calificacion'];
 	$descripcion_empresa = $row['descripcion_empresa'];
 	$mapa_google = $row['mapa_google'];
 }

?>
 
<div class="row" >
	<div class="col-lg-6" style="background:;">
		<img src="../multimedia/img-empresa/<?php echo $icono;?>" style="height: 250px; width: 100%;" id="panel_individual_ofertas">
	</div>
	<div class="col-lg-6" style="color:#585858;">
		<h1 id="titulo_empresa">
			<?php echo $titulo;?>
		</h1>
		<article>
			<?php echo $direccion;?>
		</article>
		<h4>
			<?php echo $tel_cel;?>
		</h4>
	</div>

	<div class="col-lg-12 col-xs-12" align="left" style=" font-family: arial; font-size: 20px; background:#F2F2F2;">

		<h4 style="color:green;" align="center">
			<?php echo "Correo : <label> "; echo $correo; echo "</label>";?> </h4>

	</div>

	<div class="col-lg-12 col-xs-12" align="left" style="background:#04B404; margin-top: 1%; padding-top: 2%;">
	    
	    <h3 id="titulo_empresa" align="center">  Calificacion </h3>
	  
	    <div id="panel_estrellas">
	    <?php

	    	$res ="";
            for ($i=0; $i <$calificacion; $i++) { 
             $res= $res."<span class='glyphicon glyphicon-star' style='color:#D7DF01;'>  </span>";
            } 

            echo $res = "<h1 align='center' style='margin:0px;'>".$res."<h1>";

	    ?>
	    </div>
	 
		<h4 align="center" style="color:white;"><?php echo $correo; ?></h4>
	</div>

	<div class="col-lg-12 col-xs-12" align="left" style="background:#D5D8DC; margin-top: 1%; padding-top: 2%;">
	   
	  <h1 align="center" style="font-family: 'Lobster', cursive; color:green;"> Caracteristicas </h1>
	
	   	<article style="text-align: justify; color:#515A5A; font-family: arial; font-size: 20px;">
	   		<?php echo $caracteristica; ?>
	   	</article>
	 

	  <h1 align="center" style="font-family: 'Lobster', cursive; color:green;"> Descripcion Empresarial </h1>
	
	   	<article style="text-align: justify; color:#515A5A; font-family: arial; font-size: 20px;">
	   		<?php echo $descripcion_empresa; ?>
	   	</article>
	 
	</div>

	<div class="col-lg-12 col-xs-12 table-responsive" align="center" style="background:#04B404;">
	    <h1 align="center" style="font-family: 'Lobster', cursive; color:yellow;"> Encuentranos Aqui !!! </h1>
	  <div style="">
	  	<?php echo $mapa_google; ?>
	  </div>
	</div>

	<div class="col-lg-12 col-xs-12" align="center">
	   <h1 align="center" style="font-family: 'Baloo Tammudu', cursive; color:#515A5A;"> Empresas Relacionadas <span style="font-size: 12px;"> Porque tu interes en nuestra prioridad </span></h1>
	  <div class="row">
	  	<?php  $correo; 

         $sql1 = mysqli_query($con,"SELECT * FROM relacion WHERE correo_empresa='$correo'");

         while ($row1 = mysqli_fetch_array($sql1)) {
         	   
         	    $ID_empresa = $row1['ID_relacionados'];
         	   
         	   $sql2 = mysqli_query($con,"SELECT * FROM oferta WHERE ID_oferta='$ID_empresa'");

         	   while ($row2 = mysqli_fetch_array($sql2)) {
         	   	  
         	   	   $titulo_of = $row2['titulo'];
         	   	   $direccion_of = $row2['direccion'];
         	   	   $icono_of = $row2['icono'];
         	   	   $correo_of = $row2['correo'];
         	   	   $ID_empresa_of = $row2['ID_oferta'];

         	   	 // echo "</br> </br> </br>";

         	   	  ?>

                    <div class="col-lg-4" style="padding: 1%;" >
                    	<div style="background:; color:; height: 450px;" id="panel_individual_ofertas" >
                    		<img src="../multimedia/img-empresa/<?php echo $icono_of;?>" style="height: 200px;
                    		width: 100%; background: white;">
                    		<h3 id="titulo_empresa"><?php echo $titulo_of;?></h3>
                    		<label>
                    			<article>
                    				<?php echo $direccion_of;?>
                    			</article>
                    		</label>

                    		<h5><?php echo $correo_of ?></h5>
                    		<center>
                 		    <button class="btn btn-success" onclick="btn_examinar_oferta('<?php echo $ID_empresa_of;?>');"> Probar </button>
                 		    
                 	        </center>

                    	</div>
                    </div>
         	   	  <?php
         	   }
         }
	  	?>
	  </div>
	</div>

</div>

<div align="left" style="background: ; padding: 0px; margin: 0px;">
    <a href="menu.php" style="font-size: 20px;"> Volver al menu </a>
    </br>
    </br>
</div>

<div class="row" style="">
<?php
 
 $texto_buscar = $_POST['texto_buscar'];

 echo '<h3 style="font-family:cursive; color:green; margin-top:0px;"> Resultados que te pueden agradar para : <label>'.$texto_buscar."</label></h3>";

 require '../conector/conexion.php';

            $sql2 = mysqli_query($con,"SELECT * FROM oferta WHERE titulo LIKE '%$texto_buscar%' OR direccion LIKE '%$texto_buscar%' OR correo LIKE '%$texto_buscar%' OR tel_cel LIKE '%$texto_buscar%' OR descripcion_empresa LIKE '%$texto_buscar%'");

         	   while ($row2 = mysqli_fetch_array($sql2)) {
         	   	  
         	   	   $titulo_of = $row2['titulo'];
         	   	   $direccion_of = $row2['direccion'];
         	   	   $icono_of = $row2['icono'];
         	   	   $correo_of = $row2['correo'];
         	   	   $ID_empresa_of = $row2['ID_oferta'];

         	   	  ?>
                    <div class="col-lg-4" style="padding: 1%;">

                    	<div style="background: #D8D8D8; color:; height: 400px;" align="center" id="panel_individual_ofertas">

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

?>
  </div>
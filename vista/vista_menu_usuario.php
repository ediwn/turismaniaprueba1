<!DOCTYPE html>
<html>
<head style="background: green; margin: 0px; padding: 0px;">
	<title> Turismo </title>
	   <?php
	   include ('librerias.php');
	   include ('header_nav_root.php');
	   ?>
</head>
<body style="padding: 0px; background: #2E2E2E;">
<script type="text/javascript" src="../control/controlador_examinar_ofertas.js"></script>
   <div class="row" style="margin: 0px; padding: 0px;">
     <div class="hidden-lg">
                   <div class="form-group"  align="center" style="background:;">
                      <input type="text" class="form-control" placeholder="Buscar" id="txt_buscar2">
                      <button  type="button" class="btn btn-default" onclick="Buscar_ofertas_responsive()" style="margin-top: 1%;">
                       Enviar</button>
                      <div id="resultado_buscador"> </div>
                   </div>
   		         </div>

   	<div class="col-lg-1 col-xs-12"></div>

   	<div class="col-lg-10 col-xs-12" style="color: #1C1C1C; padding: 0%; margin: 0px; 
   	background: white; box-shadow: 2px 2px 5px #999;">
   		<div id="carrusel_principal" style="padding: 0%; margin: 0px; background: white;"> 
     
   		<article style="padding: 2%; font-family: 'Merriweather Sans', sans-serif; text-align: justify;  box-shadow: 1px 2px #999;"> 

        <h3 style="font-family: 'Lobster', cursive;"> Caracteristicas</h3>
   		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
   		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
   		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
   		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
   		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
   		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
   		</article>

   		<div id="myCarousel" class="carousel slide" data-ride="carousel" style="padding: 0%;margin:0px;" 
   		>
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		    <li data-target="#myCarousel" data-slide-to="1"></li>
		    <li data-target="#myCarousel" data-slide-to="2"></li>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" style="height: 300px;">
		    <div class="item active">
		      <img src="../multimedia/img/opciones.jpg" style="width: 100%; height: 300px;">
		    </div>

		    <div class="item">
		      <img src="../multimedia/img/opciones1.jpg" style="width: 100%; height: 300px;">
		    </div>

		    <div class="item">
		      <img src="../multimedia/img/opciones2.jpg" style="width: 100%; height: 300px;">
		    </div>
		  </div>

		  <!-- Left and right controls -->
		  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#myCarousel" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>

		</div>

		<!-- Empresas que se promocionan -->
         </br>
         </br>
		<div class="row" style="margin: 0px; padding: 3%; background:; width: 100%;">
			<div class="col-lg-8 col-xs-12" id="panel_ofertas_principal" style="margin: 0px; padding: 0px;">
				
              
              <div class="row" style="margin: 0px; padding: 0px;">
               <?php
                 require('../conector/conexion.php');
                 $sql = mysqli_query($con,"SELECT * FROM oferta LIMIT 0,10");
                 while ($row = mysqli_fetch_array($sql)) {
                 	?>
                    <div class="col-lg-4 col-xs-12"  align="center" style="padding: 1%; margin: 0px;">
                    <div id="panel_individual_ofertas">
                 	<?php
                 	 $ID_oferta = $row['ID_oferta'];
                 	 $titulo = $row['titulo'];
                 	 $correo = $row['correo'];
                 	 $direccion = $row['direccion'];
                 	 $icono = $row['icono'];

               
                 	?>
                 	
                 	<img src="../multimedia/img-empresa/<?php echo $icono;?>" style="width: 100%; height: 150px; background: white; margin-top: 0px; padding-top: 0px;">
                 	<h3 id="titulo_empresa"><?php echo $titulo;?></h3>
                 	<article>
                 		<?php echo $direccion;?>
                 	</article>
                 	<h5><label><?php echo $correo;?></label></h5>
                 	<center>
                 		<button class="btn btn-success" onclick="btn_examinar_oferta('<?php echo $ID_oferta;?>');"> Probar </button>
                 	</center>
                 	</div>
                    </div>
                 	<?php
                 }
                
                /* echo "<h1> Segunda tongada </h1>";
                 $sql = mysqli_query($con,"SELECT * FROM oferta LIMIT 4,6");
                 while ($row = mysqli_fetch_array($sql)) {
                 	echo $row['titulo'];
                 	echo "</br>";
                 }*/
               ?>
              
              		
              
              </div>

			</div>
			<div class="col-lg-4 col-xs-12" style="margin: 0px; padding: 0px;">
				<h3 id="titulo_empresa" align="center">
				Planea tu dia!!!
				</h3>
				<div id="panel_botones">

				  <button onclick="btn_servicio_turista('comida');" id="btn_botones"> Comida </button> 
				  <button onclick="btn_servicio_turista('servicio');" id="btn_botones"> Servicio </button> 
				  <button onclick="btn_servicio_turista('ambiente');" id="btn_botones"> Ambiente </button>

				</div>
				
				<div id="panel_ofertas">
					<div class="row">
	<div class="col-lg-12 col-xs-12" style="padding-left:10%;">
		<h3> <label> Restaurantes </label> </h3>
		 <h4 style="margin-bottom: 0px;"> Ránking de Mejor Comida </h4>
         <h6 style="margin-top: 0px;"> según nuestros usuarios </h6>

	</div>
	<div class="col-lg-12 col-xs-12" style="color:#585858 ; padding-left:10%;">
	
	
				<h4 style="margin: 0px;">
				<span style="border-radius: 50%; background: #04B404; padding-left: 1.5%; text-align: center; font-weight: bold; margin-right: 1%; color:yellow;"> 1 </span>
				<label>  Casa de Campo </label> </h4>

				<h6 style="margin-top: 0px;"> <label> <span class="glyphicon glyphicon-tag" style="background: white;"></span> Comida tradicional </label></h6>
				<hr style="height: 1px; background: #D5D8DC; margin: 3%;">

				<h4 style="margin: 0px;">
				<span style="border-radius: 50%; background: #04B404; padding-left: 1.5%; text-align: center; font-weight: bold; margin-right: 1%; color:yellow;"> 2 </span>
				<label>  Restauran Suiza</label> </h4>

				<h6 style="margin-top: 0px;"> <label> <span class="glyphicon glyphicon-tag" style="background: white;"></span> Comida Internacional </label></h6>
				<hr style="height: 1px; background: #D5D8DC; margin: 3%;">

				<h4 style="margin: 0px;">
				<span style="border-radius: 50%; background: #04B404; padding-left: 1.5%; text-align: center; font-weight: bold; margin-right: 1%; color:yellow;"> 3 </span>
				<label>  La estancia </label> </h4>

				<h6 style="margin-top: 0px;"> <label> <span class="glyphicon glyphicon-tag" style="background: white;"></span> Churrasco </label></h6>
				<hr style="height: 1px; background: #D5D8DC; margin: 3%;">

				<h4 style="margin: 0px;">
				<span style="border-radius: 50%; background: #04B404; padding-left: 1.5%; text-align: center; font-weight: bold; margin-right: 1%; color:yellow;"> 4 </span>
				<label>  Dumbo </label> </h4>

				<h6 style="margin-top: 0px;"> <label> <span class="glyphicon glyphicon-tag" style="background: white;"></span> Heladeria </label></h6>
				<hr style="height: 1px; background: #D5D8DC; margin: 3%;">

				<h4 style="margin: 0px;">
				<span style="border-radius: 50%; background: #04B404; padding-left: 1.5%; text-align: center; font-weight: bold; margin-right: 1%; color:yellow;"> 5 </span>
				<label>  Chiken King Dong </label> </h4>

				<h6 style="margin-top: 0px;"> <label> <span class="glyphicon glyphicon-tag" style="background: white;"></span> Comida Rapida </label></h6>
				<hr style="height: 1px; background: #D5D8DC; margin: 3%;">

				<h4 style="margin: 0px;">
				<span style="border-radius: 50%; background: #04B404; padding-left: 1.5%; text-align: center; font-weight: bold; margin-right: 1%; color:yellow;"> 6 </span>
				<label>  Tropical Chiken </label> </h4>

				<h6 style="margin-top: 0px;"> <label> <span class="glyphicon glyphicon-tag" style="background: white;"></span> Comida gurmet </label></h6>
				<hr style="height: 1px; background: #D5D8DC; margin: 3%;">

				<h4 style="margin: 0px;">
				<span style="border-radius: 50%; background: #04B404; padding-left: 1.5%; text-align: center; font-weight: bold; margin-right: 1%; color:yellow;"> 7 </span>
				<label>  Beirut </label> </h4>

				<h6 style="margin-top: 0px;"> <label> <span class="glyphicon glyphicon-tag" style="background: white;"></span> Comida bufet </label></h6>
				<hr style="height: 1px; background: #D5D8DC; margin: 3%;">	
		
	</div>

</div>
				</div>
			</div>
		</div>



   	</div>

   	<div class="col-lg-2"></div>

   </div>

   <!-- Portabilidad movil tablet y web con imagen con texto -->

		<div class="row" style="margin: 0px; padding: 0px; background: #D8D8D8;">
			<div class="col-lg-6 col-xs-12" style="margin: 0px; padding: 0px;">
				<center>
					<img src="../multimedia/img/multiplataforma.png" style="width: 70%;
					height: 300px;">
				</center>
			</div>
			<div class="col-lg-6 col-xs-12" style="margin: 0px; padding: 0px; padding-top: 10%;">
				<h1 align="center" id="titulo_empresa">
					!Visita la pagina en cualquier momento!
				</h1>
				<article>
					Sabemos que estás en movimiento por eso nuestro website se adapta a todos tus dispositivos.
				</article>
			</div>
		</div>

		<!-- Linea de registro de cuenta -->

		<div class="row" style="margin: 0px; padding: 0px; background: #04B404;">
			<div class="col-lg-8 col-xs-12"  style="margin: 0px; padding: 2%; color: white;">
				<h1> !Registrate para ofertar!</h1>
				<p>
					Haz que tu produto o servicio sea visto por miles de clientes potenciales
				</p>
			</div>
			<div class="col-lg-4 col-xs-12" align="center" style="margin: 0px; padding: 2%; color: white;">
			<a class="btn btn-default" style="font-size: 20px;" href="vista_user.php"> Registra tu empresa </a>
				<h1> ! 100% GRATIS !</h1>
				
			</div>
		</div>

</body>
<?php
   include ('footer.php');
?>
</html>







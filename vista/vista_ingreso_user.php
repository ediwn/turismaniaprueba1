
  <script type="text/javascript" src="../control/control_user.js"></script>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <?php 
  
   include ('librerias.php'); 
   include "header_nav.php";

  ?>

  <div class="row" style="background: #616A6B  ;"> 

	<div class="col-lg-4 col-xs-12"></div>
	<div class="col-lg-4 col-xs-12" style="background: #E5E7E9; box-shadow:2px 2px 5px #B2BABB; color:#616A6B; margin-top: 2%; margin-bottom: 2%; padding-left: 3%; padding-right: 3%;">
    <h2 align="center" style="color: #298A08; font-weight: bold;"> LOGIN </h2>
	<label> Todos los campos con (*) son obligatorios </label> 

  </br>

  <h6><label> Nombre Completo </label></h6>
  
  <input type="email" id="nombre_completo" placeholder="(*) Escribe tu nombre" onkeyup="validador_campo('nombre_completo','resp_nombre_completo',4)" maxlength="100" 
    class="campos_ingreso"> 

  <div id="resp_nombre_completo" ></div>

  <h6><label> Contraseña </label></h6>

  <input type="password" id="password" class="campos_ingreso" placeholder="(*) Escriba su contraseña " onkeyup="validador_campo('password','resp_password',4)" maxlength="20" > 

  <div id="resp_password"></div>

   </br>
   </br>
  <center><a class="btn btn-default" onclick="btn_login_user()"> INGRESO </a> 
  </center>

  <hr>
  
  <div id="resultado_registro_user"></div>
  
  </div>

	 <div class="col-lg-4 col-xs-12"></div>
    </div>

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

  <?php include "footer.php";

?>

<style type="text/css">
  .campos_ingreso
  {
    color:#616A6B; border-style: none; 
    padding: 2%; 
    border-bottom: 2px solid #616A6B; 
    width: 100%; 
    background: transparent;
    box-shadow: 0px;
    font-size: 15px;
  }
   .campos_ingreso:focus
  { outline:0px;
    box-shadow: 0px;
    border-bottom: 2px solid #298A08; 
    transition: 0.5s;
  }
</style>
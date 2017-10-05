    
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="padding: 0%;margin:0px;" 
      >
      <!-- Indicators -->
      <ol class="carousel-indicators">
       
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" style="height: 300px;">
        <div class="item active">
          <img src="../multimedia/img/slider-1.jpg" style="width: 100%; height: 300px;">
        </div>

        <div class="item">
          <img src="../multimedia/img/slider-2.jpg" style="width: 100%; height: 300px;">
        </div>

        <div class="item">
          <img src="../multimedia/img/slider-3.jpg" style="width: 100%; height: 300px;">
        </div>
      </div>

      <!-- Left and right controls -->
      
    </div>

    </div>


     <nav class="navbar navbar-default" role="navigation" 
              style="margin: 0px; padding: 0px; width: 100%;  background:#04B404; border-color:#04B431; border-radius: 0px;  ">

                <!-- El logotipo y el icono que despliega el menú se agrupan
                     para mostrarlos mejor en los dispositivos móviles -->
                <div class="navbar-header navbar-fix" style="margin: 0px; padding: 0px;">
                  
                  <button type="button" class="navbar-toggle" data-toggle="collapse"
                          data-target=".navbar-ex1-collapse" style="border:2px solid #0B610B; background: transparent; border-radius: 0px;">
                    <span class="sr-only">Desplegar navegación</span>
                    <span class="icon-bar" style="background:#0B610B;"></span>
                    <span class="icon-bar" style="background:#0B610B;"></span>
                    <span class="icon-bar" style="background:#0B610B;"></span>
                  </button>

                  <a class="navbar-brand" href="menu.php">
                    <label style="color: #0B610B; font-family: 'Lobster', cursive; font-size: 40px;
                    text-shadow: 1px 2px #D7DF01;">  

                    <img src="../multimedia/img/icono_turismo.png" style="height: 35px; width: 35px; padding-bottom: 2%;" > TurismaniA
                    </a> </label>
                </div>
               
                <!-- Agrupar los enlaces de navegación, los formularios y cualquier
                     otro elemento que se pueda ocultar al minimizar la barra -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                 
               
                  <form class="navbar-form navbar-left" role="search" style="background: ; width: 400px;">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Buscar" id="txt_buscar" style="width: 300px;">
                    </div>
                    <button type="button" class="btn btn-default" onclick="Buscar_ofertas()"> Enviar</button>
                    <div id="resultado_buscador"> </div>
                  </form>
              
               <ul class="navbar navbar-right" style="padding:0px; background:; width: 150px; padding-top: 1%; padding-bottom: 0px;">

                 <li style="list-style: none; float: left; padding-right: 5%;"> 
                 <a href="vista_ingreso_user.php" style="text-decoration: none; color:yellow;" > Ingresar  </a> </li>

                 <li style="list-style: none; float:; padding-left: 5%;"> 
                 <a href="vista_user.php" style="text-decoration: none; color:yellow;" > Registrarse </a> </li>

               </ul>

             
               
                 
                </div>
              </nav>

              <?php include 'header_select.php';?>
       
    
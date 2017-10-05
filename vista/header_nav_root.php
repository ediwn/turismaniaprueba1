<?php

 session_start();
 ob_start();
 error_reporting(0);
 
if(!empty($_SESSION['ID_usuario']))
{    echo $ID_user = $_SESSION['ID_usuario'];
     
     ?>
     <input type="text" id="ID_user" value="<?php echo $ID_user?>"> 
     <?php
   }
else{
   echo '<meta http-equiv="Refresh" content="0; URL=../index.php">';
}

?>
              <nav class="navbar navbar-default" role="navigation" 
              style="margin: 0px; padding: 0px; width: 100%;  background:#04B404; border-color:#04B431; border-radius: 0px; margin-right: -20px;">

                <!-- El logotipo y el icono que despliega el menú se agrupan
                     para mostrarlos mejor en los dispositivos móviles -->
                <div class="navbar-header navbar-fix" style="margin: 0px; padding: 0px;">
                  <button type="button" class="navbar-toggle" data-toggle="collapse"
                          data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Desplegar navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="vista_menu_usuario.php">
                    <label style="color:#FFBF00;">  <img src="../multimedia/img/icono_turismo_final.png" style="height: 20px; width: 20px;" > Turismania
                    </a> </label>
                </div>
               
                <!-- Agrupar los enlaces de navegación, los formularios y cualquier
                     otro elemento que se pueda ocultar al minimizar la barra -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                  <ul class="nav navbar-nav">
                      <!--<li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        user <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="vista_user.php">Registrar user</a></li>
                         <li class="divider"></li>
                        <li><a href="vista_listar_user.php"> Kardex de user</a></li>
                      </ul> -->
                    </li>
                    
                        <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background: transparent; color:yellow;">
                        Ofertas 
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="vista_oferta.php">Registrar oferta</a></li>
                         <li class="divider"></li>
                        <li><a href="vista_listar_oferta.php"> Kardex de oferta</a></li>
                      </ul>
                    </li>
                    
                        <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background: transparent; color:yellow;">
                        Sectores 
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="vista_sector.php">Registrar sector</a></li>
                         <li class="divider"></li>
                        <li><a href="vista_listar_sector.php"> Kardex de sector</a></li>
                      </ul>
                    </li>
                    
                        <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background: transparent; color:yellow;">
                        Areas 
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="vista_area.php">Registrar area</a></li>
                         <li class="divider"></li>
                        <li><a href="vista_listar_area.php"> Kardex de area</a></li>
                      </ul>
                    </li>
                    </ul>
               
               

               
                  <ul class="nav navbar-nav navbar-right">
                   
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background: transparent; color:yellow;">
                        Sesion <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu">
                         <li><a href="vista_cerrar_sesion.php"> Cerrar sesion </a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </nav>

              <?php include 'header_select.php';?>
       
    


<?php
 echo "DESARROLLO PARA EL SIGUIENTE AREA : <H3>";
 echo $area = $_POST['area'];
 echo "</H3>"; 

 //primera parte de la consulta

 $sql='CREATE TABLE '.$area.' (ID_'.$area.' INT NOT NULL PRIMARY KEY AUTO_INCREMENT,';

 $lista_campos = json_decode($_POST['lista']);

  foreach($lista_campos as $form)
  {    
              echo $campo = $form->campo; 
              echo " - ";
              echo $clase = $form->tipo; 
              echo "</br>";

              if($clase=="Texto")
              {
                 $sql.=$campo.' VARCHAR(100),';
              }

               if($clase=="Number")
              {
                 $sql.=$campo.' INT(11),';
              }

              if($clase=="Area")
              {
                 $sql.=$campo.' TEXT,';
              }

              if($clase=="Select")
              {
                 $sql.=$campo.' VARCHAR(100),';
              }

              if($clase=="Password")
              {
                 $sql.=$campo.' VARCHAR(100),';
              }
              
              if($clase=="Correo")
              {
                 $sql.=$campo.' VARCHAR(150),';
              }



    }
   
   $sql = substr($sql, 0, -1); 
   $sql.=')';
   echo "</br>";
   //echo $sql;
   
   require("conector/conexion.php");
   
   $res_sql = mysqli_query($con,$sql);

   if($res_sql==TRUE)
   {
   	echo "</br> Consulta correcta </br>";
   }
   else
   {
   	echo "</br> Fallo en consulta SQL </br>";
   }



   // Creacion del menu de navegacion en html5
    $tupla_menu ='CREATE TABLE navegacion (ID_area INT NOT NULL PRIMARY KEY AUTO_INCREMENT, area VARCHAR(100))';
    
    mysqli_query($con,$tupla_menu);
   
 
              $cont_nav =0;

              $sql1=mysqli_query($con,"SELECT * FROM navegacion WHERE area='$area'");

              while ($row = mysqli_fetch_array($sql1)) {
                $cont_nav ++;
              }

              if($cont_nav==0)
              {
                mysqli_query($con,"INSERT INTO `navegacion` (`ID_area`, `area`) VALUES ('', '$area')");
              }

              else{
                echo " <center> VARIABLE DE NAVEGACION REPETIDA </center>";
              }        

  // CREAMOS EL CODIGO HTML5 PARA QUE GENERE EL MENU DE NAVEGACION 
    $narvar='
              <div class="col-lg-12" > <nav class="navbar navbar-default" role="navigation">
                <!-- El logotipo y el icono que despliega el menú se agrupan
                     para mostrarlos mejor en los dispositivos móviles -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse"
                          data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Desplegar navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">Logotipo</a>
                </div>
               
                <!-- Agrupar los enlaces de navegación, los formularios y cualquier
                     otro elemento que se pueda ocultar al minimizar la barra -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                  <ul class="nav navbar-nav">';

                  $sql2 = mysqli_query($con,"SELECT * FROM navegacion");

                  while ($row = mysqli_fetch_array($sql2)) {
                    
                    $sector = $row['area'];

                    $narvar.= '
                        <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        '.$sector.' <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="vista_'.$sector.'.php">Registrar '.$sector.'</a></li>
                         <li class="divider"></li>
                        <li><a href="vista_listar_'.$sector.'.php"> Kardex de '.$sector.'</a></li>
                      </ul>
                    </li>
                    ';
                  }

                  $narvar.='</ul>
               
                  <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Buscar">
                    </div>
                    <button type="submit" class="btn btn-default">Enviar</button>
                  </form>
               
                  <ul class="nav navbar-nav navbar-right">
                   
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Sesion <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu">
                         <li><a href="#"> Iniciar </a></li>
                         <li class="divider"></li>
                         <li><a href="#"> Registrarse </a></li>
                         <li class="divider"></li>
                         <li><a href="#"> Cerrar sesion </a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </nav>
              </div>
    ';
   
    $rut='vista/header_nav.php';
    $file = fopen($rut, 'w');
    fwrite($file, $narvar . PHP_EOL);
    fclose($file);


   //Creamos el footer para que se implante en el sistema

    $footer='
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <footer>
            <div class="footer" id="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                            <h3> Lorem Ipsum </h3>
                            <ul>
                                <li> <a href="#"> Lorem Ipsum </a> </li>
                                <li> <a href="#"> Lorem Ipsum </a> </li>
                                <li> <a href="#"> Lorem Ipsum </a> </li>
                                <li> <a href="#"> Lorem Ipsum </a> </li>
                            </ul>
                        </div>
                        <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                            <h3> Lorem Ipsum </h3>
                            <ul>
                                <li> <a href="#"> Lorem Ipsum </a> </li>
                                <li> <a href="#"> Lorem Ipsum </a> </li>
                                <li> <a href="#"> Lorem Ipsum </a> </li>
                                <li> <a href="#"> Lorem Ipsum </a> </li>
                            </ul>
                        </div>
                        <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                            <h3> Lorem Ipsum </h3>
                            <ul>
                                <li> <a href="#"> Lorem Ipsum </a> </li>
                                <li> <a href="#"> Lorem Ipsum </a> </li>
                                <li> <a href="#"> Lorem Ipsum </a> </li>
                                <li> <a href="#"> Lorem Ipsum </a> </li>
                            </ul>
                        </div>
                        <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                            <h3> Lorem Ipsum </h3>
                            <ul>
                                <li> <a href="#"> Lorem Ipsum </a> </li>
                                <li> <a href="#"> Lorem Ipsum </a> </li>
                                <li> <a href="#"> Lorem Ipsum </a> </li>
                                <li> <a href="#"> Lorem Ipsum </a> </li>
                            </ul>
                        </div>
                        <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                            <h3> Lorem Ipsum </h3>
                            <ul>
                                <li>
                                    <div class="input-append newsletter-box text-center">
                                        <input type="text" class="full text-center" placeholder="Email ">
                                        <button class="btn  bg-gray" type="button"> Lorem ipsum <i class="fa fa-long-arrow-right"> </i> </button>
                                    </div>
                                </li>
                            </ul>
                            <ul class="social">
                                <li> <a href="#"> <i class=" fa fa-facebook">   </i> </a> </li>
                                <li> <a href="#"> <i class="fa fa-twitter">   </i> </a> </li>
                                <li> <a href="#"> <i class="fa fa-google-plus">   </i> </a> </li>
                                <li> <a href="#"> <i class="fa fa-pinterest">   </i> </a> </li>
                                <li> <a href="#"> <i class="fa fa-youtube">   </i> </a> </li>
                            </ul>
                        </div>
                    </div>
                    <!--/.row--> 
                </div>
                <!--/.container--> 
            </div>
            <!--/.footer-->
            
            <div class="footer-bottom">
                <div class="container">
                    <p class="pull-left"> Copyright © Footer 2014. All right reserved. </p>
                    <div class="pull-right">
                        <ul class="nav nav-pills payments">
                            <li><i class="fa fa-cc-visa"></i></li>
                            <li><i class="fa fa-cc-mastercard"></i></li>
                            <li><i class="fa fa-cc-amex"></i></li>
                            <li><i class="fa fa-cc-paypal"></i></li>
                        </ul> 
                    </div>
                </div>
            </div>
            <!--/.footer-bottom--> 
        </footer>
        <style>
                .full {
                    width: 100%;    
                }
                .gap {
                  height: 30px;
                  width: 100%;
                  clear: both;
                  display: block;
                }
                .footer {
                  background: #EDEFF1;
                  height: auto;
                  padding-bottom: 30px;
                  position: relative;
                  width: 100%;
                  border-bottom: 1px solid #CCCCCC;
                  border-top: 1px solid #DDDDDD;
                }
                .footer p {
                  margin: 0;
                }
                .footer img {
                  max-width: 100%;
                }
                .footer h3 {
                  border-bottom: 1px solid #BAC1C8;
                  color: #54697E;
                  font-size: 18px;
                  font-weight: 600;
                  line-height: 27px;
                  padding: 40px 0 10px;
                  text-transform: uppercase;
                }
                .footer ul {
                  font-size: 13px;
                  list-style-type: none;
                  margin-left: 0;
                  padding-left: 0;
                  margin-top: 15px;
                  color: #7F8C8D;
                }
                .footer ul li a {
                  padding: 0 0 5px 0;
                  display: block;
                }
                .footer a {
                  color: #78828D
                }
                .supportLi h4 {
                  font-size: 20px;
                  font-weight: lighter;
                  line-height: normal;
                  margin-bottom: 0 !important;
                  padding-bottom: 0;
                }
                .newsletter-box input#appendedInputButton {
                  background: #FFFFFF;
                  display: inline-block;
                  float: left;
                  height: 30px;
                  clear: both;
                  width: 100%;
                }
                .newsletter-box .btn {
                  border: medium none;
                  -webkit-border-radius: 3px;
                  -moz-border-radius: 3px;
                  -o-border-radius: 3px;
                  -ms-border-radius: 3px;
                  border-radius: 3px;
                  display: inline-block;
                  height: 40px;
                  padding: 0;
                  width: 100%;
                  color: #fff;
                }
                .newsletter-box {
                  overflow: hidden;
                }
                .bg-gray {
                  background-image: -moz-linear-gradient(center bottom, #BBBBBB 0%, #F0F0F0 100%);
                  box-shadow: 0 1px 0 #B4B3B3;
                }
                .social li {
                  background: none repeat scroll 0 0 #B5B5B5;
                  border: 2px solid #B5B5B5;
                  -webkit-border-radius: 50%;
                  -moz-border-radius: 50%;
                  -o-border-radius: 50%;
                  -ms-border-radius: 50%;
                  border-radius: 50%;
                  float: left;
                  height: 36px;
                  line-height: 36px;
                  margin: 0 8px 0 0;
                  padding: 0;
                  text-align: center;
                  width: 36px;
                  transition: all 0.5s ease 0s;
                  -moz-transition: all 0.5s ease 0s;
                  -webkit-transition: all 0.5s ease 0s;
                  -ms-transition: all 0.5s ease 0s;
                  -o-transition: all 0.5s ease 0s;
                }
                .social li:hover {
                  transform: scale(1.15) rotate(360deg);
                  -webkit-transform: scale(1.1) rotate(360deg);
                  -moz-transform: scale(1.1) rotate(360deg);
                  -ms-transform: scale(1.1) rotate(360deg);
                  -o-transform: scale(1.1) rotate(360deg);
                }
                .social li a {
                  color: #EDEFF1;
                }
                .social li:hover {
                  border: 2px solid #2c3e50;
                  background: #2c3e50;
                }
                .social li a i {
                  font-size: 16px;
                  margin: 0 0 0 5px;
                  color: #EDEFF1 !important;
                }
                .footer-bottom {
                  background: #E3E3E3;
                  border-top: 1px solid #DDDDDD;
                  padding-top: 10px;
                  padding-bottom: 10px;
                }
                .footer-bottom p.pull-left {
                  padding-top: 6px;
                }
                .payments {
                  font-size: 1.5em; 
                }
        </style>
    ';

    $rut='vista/footer.php';
    $file = fopen($rut, 'w');
    fwrite($file, $footer . PHP_EOL);
    fclose($file);

   // Ahora creamos la cadena del formulario en la vista

   $html='
   <link rel="stylesheet" type="text/css" href="../libreria/bootstrap/css/bootstrap.min.css">
   <script type="text/javascript" src="../libreria/bootstrap/js/jquery.min.js"></script>
   <script type="text/javascript" src="../libreria/bootstrap/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="../control/control_'.$area.'.js"></script>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <div class="row"> <?php include "header_nav.php";?>
	<div class="col-lg-3 col-xs-12"></div>
	<div class="col-lg-6 col-xs-12">
	<label> Todos los campos con (*) son obligatorios </label> </br>';

   foreach($lista_campos as $form)
   {    
              $campo = $form->campo; 
             // echo " - ";
              $clase = $form->tipo; 
             

             if($clase=="Texto")
             {
              $html.='<h6><label>'.$campo.'</label></h6>';
              $f_js='onkeyup="';
              $f_js.="validador_campo('".$campo."','resp_".$campo."',4)";

              $html.='<input type="text" id="'.$campo.'" class="form-control" placeholder="(*)Escriba su '.$campo.'" '.$f_js.'" maxlength="100"><div id="resp_'.$campo.'"></div>';

             }

             if($clase=="Number")
             {
               $html.='<h6><label>'.$campo.'</label></h6>';

               $f_js='onkeyup="';
               $f_js.="validador_campo('".$campo."','resp_".$campo."',4)";

               $html.='<input type="number" id="'.$campo.'" class="form-control" placeholder="(*)Escriba su '.$campo.'" '.$f_js.'" maxlength="10"><div id="resp_'.$campo.'"></div>';

             }

             if($clase=="Area")
             {
               $f_js='onkeyup="';
               $f_js.="validador_campo('".$campo."','resp_".$campo."',4)";

               $html.='<h6><label>'.$campo.'</label></h6>';

               $html.='<textarea id="'.$campo.'" class="form-control" placeholder="(*)Escriba su '.$campo.'" '.$f_js.'" maxlength="300"></textarea> <div id="resp_'.$campo.'"></div>';

             }

             if($clase=="Select")
             {
               
               $html.='<h6><label>'.$campo.'</label></h6>';

               $html.='<select id="'.$campo.'" class="form-control" >
               <option value=""> Seleccione el '.$campo.' </option> </select>';
          
             }

             if($clase=="Password")
             {
               $f_js='onkeyup="';
               $f_js.="validador_campo('".$campo."','resp_".$campo."',4)";

               $html.='<h6><label>'.$campo.'</label></h6>';

               $html.='<input type="password" id="'.$campo.'" class="form-control" placeholder="(*)Escriba su '.$campo.'" '.$f_js.'" maxlength="50"> <div id="resp_'.$campo.'"></div>';
          
             }

             if($clase=="Correo")
             {
               $f_js='onkeyup="';
               $f_js.="validador_correo('".$campo."','resp_".$campo."',4)";

               $html.='<h6><label>'.$campo.'</label></h6>';

               $html.='<input type="email" id="'.$campo.'" class="form-control" placeholder="(*)Escriba su '.$campo.'" '.$f_js.'" maxlength="100"> <div id="resp_'.$campo.'"></div>';
          
             }


           
               if($clase=="File")
             {
               $f_js='onkeyup="';
               $f_js.="validador_campo('".$campo."','resp_".$campo."',1)";

               $html.='<h6><label>'.$campo.'</label></h6>';

               $html.='<input type="file" id="'.$campo.'" class="form-control" placeholder="(*)Escriba su '.$campo.'" '.$f_js.'" maxlength="50"> <div id="resp_'.$campo.'"></div>';
          
             }

               if($clase=="Time")
             {
               $f_js='onkeyup="';
               $f_js.="validador_campo('".$campo."','resp_".$campo."',1)";

               $html.='<h6><label>'.$campo.'</label></h6>';

               $html.='<input type="time" id="'.$campo.'" class="form-control" placeholder="(*)Escriba su '.$campo.'" '.$f_js.'" maxlength="50"> <div id="resp_'.$campo.'"></div>';
          
             }

             if($clase=="Date")
             {
               $f_js='onkeyup="';
               $f_js.="validador_campo('".$campo."','resp_".$campo."',1)";

               $html.='<h6><label>'.$campo.'</label></h6>';

               $html.='<input type="date" id="'.$campo.'" class="form-control" placeholder="(*)Escriba su '.$campo.'" '.$f_js.'" maxlength="50"> <div id="resp_'.$campo.'"></div>';
          
             }

             if($clase=="URL")
             {
               $f_js='onkeyup="';
               $f_js.="validador_campo('".$campo."','resp_".$campo."',4)";

               $html.='<h6><label>'.$campo.'</label></h6>';

               $html.='<input type="url" id="'.$campo.'" class="form-control" placeholder="(*)Escriba su '.$campo.'" '.$f_js.'" maxlength="50"> <div id="resp_'.$campo.'"></div>';
          
             }


    }
   
   $html.='</br> <center><button class="btn btn-default" onclick="btn_registro_'.$area.'()"> Agregar '.$area.' </button> </center><hr>
   <div id="resultado_registro_'.$area.'"></div>';
   
   $html.='</div>
	       <div class="col-lg-3 col-xs-12"></div>
           </div>

           <?php include "footer.php";';


  // $html;

  $rut='vista/vista_'.$area.'.php';
  $file = fopen($rut, 'w');
  fwrite($file, $html . PHP_EOL);
  fclose($file);

// CREACION DEL CODIGO DEL CONTROLADOR
    $js='';

    $js.='function btn_registro_'.$area.'(){';

    foreach($lista_campos as $form)
     {    
              $campo = $form->campo; 
             
              $clase = $form->tipo; 

              $js.=' var '.$campo.' = $("#'.$campo.'").val(); ';
            
      }
     
     $js.=' var ob={';
     
     foreach($lista_campos as $form)
     {    
              $campo = $form->campo; 
             
              $clase = $form->tipo; 

              $js.=''.$campo.' : '.$campo.',';
            
      }

    $js = substr($js, 0, -1); 
    $js.='};';
    
    $js.=' 
    if(';
    foreach($lista_campos as $form)
     {    
              $campo = $form->campo; 
             
              $clase = $form->tipo; 

              $js.=''.$campo.' !="" && ';
            
      }

    $js = substr($js, 0, -3); 

    $js.='){ ';

    $js.='$.ajax({
                type: "POST",
                url:"../modelo/modelo_registrar_'.$area.'.php",
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $("#resultado_registro_'.$area.'").html(data);
                 setTimeout(limpiar_'.$area.',1000);';

                   foreach($lista_campos as $form)
                   {    
                                $campo = $form->campo; 
                               
                                $clase = $form->tipo; 

                                $js.='$("#'.$campo.'").val("");';
                              
                    }

                 $js.='

                }
             });
           }';

     $js.='else{';
     
      foreach($lista_campos as $form)
     {    
              $campo = $form->campo; 
             
              $clase = $form->tipo; 

              $js.='if ('.$campo.' ==""){ $("#'.$campo.'").focus();}';
            
      }
       $js.='} 
  }';

    // CONTROL DE VALIDACION DE CAMPOS DEL FORMULARIO 
 $js.='function limpiar_'.$area.'()
{
    $("#resultado_registro_'.$area.'").html("");
}

function validador_campo(campo,mensaje,cant_min)
{   
  var cadena=$("#"+campo).val();
  var dimencion=cadena.length;
  
  if(dimencion<cant_min)
  {    $("#"+mensaje).html("<label style=';

  $js.="'color:red;'";
  
  $js.='> min "+cant_min+" digitos " + dimencion+"</label>");
     $("#"+campo).css("border-color","red");
    
  }
  
  else
     {   // alert("entro");  
       $("#"+campo).css("border-color","green");
       $("#"+mensaje).html("");
   }

   }
    
  var noti_email=0; 
  function validador_correo(campo,mensaje,cant_min)
   {
      
    var email = $("#"+campo).val();
    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

    if (caract.test(email) == false){
        $("#"+mensaje).html(';
        $js.= '"<label style=';
        $js.= "'color:#EC7063;'> invalido </label>";
        $js.='");
        noti_email++;

        return false;
    }else{';

        $js.='$("#"+mensaje).html("valido").slideDown("slow");';

         $js.='noti_email=0;
        return true;
    }
   }
';
  
  //echo $js;
  $rut='control/control_'.$area.'.js';
  $file = fopen($rut, 'w');
  fwrite($file, $js . PHP_EOL);
  fclose($file);

  $model='<?php ';
 
  foreach($lista_campos as $form)
     {    
              $campo = $form->campo; 
             
              $clase = $form->tipo; 

               $model.='$'.$campo.'= $_POST["'.$campo.'"]; ';
            
      }

   $model.='require("../conector/conexion.php");';

   $model.= '$sql=mysqli_query($con,"INSERT INTO `'.$area.'` (`ID_'.$area.'`,';

   foreach($lista_campos as $form)
   {     

              $campo = $form->campo; 
             
              $clase = $form->tipo; 


               $model.='`'.$campo.'` ,';       
    }

    $model = substr($model, 0, -1); 
    $model.=') VALUES (NULL,';

    foreach($lista_campos as $form)
    {     
              $campo = $form->campo; 
             
              $clase = $form->tipo; 

               $model.=" '$".$campo."' ,";  

           
    }
            
    $model = substr($model, 0, -1); 
    $model.=')"); 

    if($sql==TRUE)
    {
    	echo "<center> <h3> <label> Registro Correcto </label> </h3></center>";
    }
    else
    {
    	echo "<center> <h3> <label> No se Registro!! Volver a intentar </label> </h3></center>";
    }
    ?>';

            

  $rut='modelo/modelo_registrar_'.$area.'.php';
  $file = fopen($rut, 'w');
  fwrite($file, $model. PHP_EOL);
  fclose($file);

  //Creacion del codigo de listado, edicion, eliminacion y busqueda de los datos

  $listado='<link rel="stylesheet" type="text/css" href="../libreria/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="../libreria/bootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="../libreria/bootstrap/js/bootstrap.min.js"></script>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <div class="row">
    <?php include "header_nav.php";?>
    <!-- Formulario de Busqueda-->
    <div class="col-lg-4 col-xs-12"></div>
    <div class="col-lg-4 col-xs-12">

		     
		     <table class="table table-condensed">
		     	<tr>
		     		<td> 
                     <input type="text" class="form-control" id="txt_buscar_'.$area.'" placeholder="Buscar">
		     		</td>
		     		<td>
		     		  <button class="btn btn-default" onclick="btn_buscar_'.$area.'()"> Buscar </button>
		     		</td>
		     	</tr>
		     </table>
		  </div>
		  <div id="resp_busqueda_'.$area.'"></div>
		  <hr>

    <div class="col-lg-12 col-xs-12"></div>

  

	<div class="col-lg-2 col-xs-12"> </div>
	<div class="col-lg-8 col-xs-12" >
		<h3> Listado de '.$area.' </h3>
		
         <div class="table responsive" id="panel_listado_'.$area.'"></div>
        
	</div>
	<div class="col-lg-2 col-xs-12"></div>
</div>

<?php include "footer.php"; ?>

<script>
  $(document).ready(function(){
    cargar_datos(1);
  });

  function cargar_datos(page){
    var parametros = {"action":"ajax","page":page};
    $("#loader").fadeIn("slow");
    $.ajax({
      url:"../modelo/modelo_listar_'.$area.'.php",
      data: parametros,
       beforeSend: function(objeto){
       $("#loader").html("cargando .... ");
      },
      success:function(data){
        $("#panel_listado_'.$area.'").html(data).fadeIn("slow");
        $("#loader").html("");
      }
    })
  }

   function btn_buscar_'.$area.'(){

    var txt_buscar_'.$area.'=$("#txt_buscar_'.$area.'").val();

    var parametros = {"action":"ajax","txt_buscar_'.$area.'":txt_buscar_'.$area.'};
    
    $("#loader").fadeIn("slow");
    $.ajax({
      url:"../modelo/modelo_buscar_listado_'.$area.'.php",
      data: parametros,
       beforeSend: function(objeto){
       $("#loader").html("cargando .... ");
      },
      success:function(data){
        $("#panel_listado_'.$area.'").html(data).fadeIn("slow");
        $("#loader").html("");
      }
    })
  }
  </script>';


 $rut='vista/vista_listar_'.$area.'.php';
  $file = fopen($rut, 'w');
  fwrite($file, $listado. PHP_EOL);
  fclose($file);


$mod_lis='<?php
    require("../conector/conexion.php");
   
    $action = (isset($_REQUEST["action"])&& $_REQUEST["action"] !=NULL)?$_REQUEST["action"]:"";
    
    if($action == "ajax"){
    include "paginacion.php"; //incluir el archivo de paginación
    //las variables de paginación
    
    $page = (isset($_REQUEST["page"]) && !empty($_REQUEST["page"]))?$_REQUEST["page"]:1;
    $per_page = 10; //la cantidad de registros que desea mostrar
    $adjacents  = 4; //brecha entre páginas después de varios adyacentes
    $offset = ($page - 1) * $per_page;
    
    //Cuenta el número total de filas de la tabla*/
    
    $count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM '.$area.'");
    if ($row= mysqli_fetch_array($count_query)){$numrows = $row["numrows"];}
    $total_pages = ceil($numrows/$per_page);
    $reload = "../vista/vista_listar_'.$area.'.php";

    //consulta principal para recuperar los datos
    $query = mysqli_query($con,"SELECT * FROM '.$area.' order by ID_'.$area.' LIMIT $offset,$per_page");
    
    if ($numrows>0){
      ?>
    <table class="table table-bordered">
        <thead>
        <tr>';
          
           foreach($lista_campos as $form)
            {     
              $campo = $form->campo; 
             
              $clase = $form->tipo; 

               $mod_lis.="<th>".$campo."</th>";       
            }

        

    $mod_lis.='
      <th class="col-lg-2" aling="center"> </th> </tr>
      </thead>
      <tbody>
      <?php
       while($row = mysqli_fetch_array($query)){
        $ID_'.$area.'=$row[';

    $mod_lis.="'ID_".$area."'];";

    $mod_lis.='
        ?>
        <tr>';
         foreach($lista_campos as $form)
            {     
              $campo = $form->campo; 
             
              $clase = $form->tipo; 

               $mod_lis.='<td><?php echo $row["'.$campo.'"];?></td>';       
            }

    $mod_lis.='<td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal" onclick="btn_editar_'.$area.'';

    $mod_lis.="('<?php echo ".'$'."ID_".$area.";?>')";
    $mod_lis.='"> Editar </button> 
    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal_Elimar" onclick="btn_eliminar_'.$area.'';

    $mod_lis.="('<?php echo ".'$'."ID_".$area.";?>')";
    
    $mod_lis.='"> Eliminar </button> </td></tr>
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
                <h4 class="modal-title"> Editar '.$area.' </h4>
              </div>
              <div class="modal-body">

                 <div id="panel_edicion_'.$area.'">
                   
                 </div>

              </div>
              <div class="modal-footer">
              <div id="respuesta_guardar_cambios_'.$area.'"></div>
                <button type="button" class="btn btn-success" onclick="btn_guardar_cambios_'.$area.'()"> Guardar </button>
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
                <h4 class="modal-title"> Eliminar '.$area.'</h4>
              </div>
              <div class="modal-body">
              <input type="text" id="ID_eliminar_'.$area.'">
                

                 <div id="panel_eliminar_'.$area.'">
                    <div class="alert alert-danger" role="alert">
                   <strong> SEGURO !! </strong> Desea eliminar este dato ?
                    </div>
                 </div>

              </div>
              <div class="modal-footer">
              <div id="respuesta_eliminar_total_'.$area.'"></div>
                <button type="button" class="btn btn-success" onclick="btn_borrar_'.$area.'()"> Eliminar </button>
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

  function btn_editar_'.$area.'(ID_'.$area.')
  { 
     var parametros = {ID_'.$area.':ID_'.$area.'};
    
    $.ajax({
      type: "POST",
      url:"../vista/vista_editar_'.$area.'.php",
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $("#panel_edicion_'.$area.'").html(data).fadeIn("slow");;
      }
    });

  }

  function btn_guardar_cambios_'.$area.'()
  {
   var ID_'.$area.' =$("#ID_'.$area.'_edicion").val();
  ';
   
   $parametros='var parametros = {ID_'.$area.': ID_'.$area.',';
   foreach($lista_campos as $form)
   {     
              $campo = $form->campo; 
             
              $clase = $form->tipo; 

       $mod_lis.=' var '.$campo.' = $("#'.$campo.'").val(); ';  
       $parametros.=''.$campo.':'.''.$campo.',';     
    }
    
    $parametros = substr($parametros, 0, -1); 
    $parametros.='};';

    $mod_lis.=''.$parametros.'
     
    $.ajax({
      type: "POST",
      url:"../modelo/modelo_guardar_'.$area.'.php",
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $("#respuesta_guardar_cambios_'.$area.'").html(data).fadeIn("slow");
        window.setTimeout("actualizar_datos_'.$area.'_editar()",3000);

      }
    });

  }

  function actualizar_datos_'.$area.'_editar()
  {  $("#myModal").modal("hide").fadeIn("slow");
     $("#respuesta_guardar_cambios_'.$area.'").html("").fadeIn("slow");
     location.reload();
  }


 function btn_eliminar_'.$area.'(ID_'.$area.')
 {
    $("#ID_eliminar_'.$area.'").val(ID_'.$area.');
 }

 function btn_borrar_'.$area.'()
  {  
     var ID_'.$area.' = $("#ID_eliminar_'.$area.'").val();
     var parametros = {ID_'.$area.':ID_'.$area.'};
    
     $.ajax({
      type: "POST",
      url:"../modelo/modelo_eliminar_'.$area.'.php",
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $("#panel_eliminar_'.$area.'").html(data).fadeIn("slow");
          window.setTimeout("actualizar_datos_'.$area.'_eliminar()",3000);
      }
    });
  }

function actualizar_datos_'.$area.'_eliminar()
  {  $("#myModal").modal("hide").fadeIn("slow");
     $("#respuesta_eliminar_total_'.$area.'").html("").fadeIn("slow");
     location.reload();
  }

</script>

';

 $rut='modelo/modelo_listar_'.$area.'.php';
  $file = fopen($rut, 'w');
  fwrite($file, $mod_lis. PHP_EOL);
  fclose($file);


//CREAREMOS EL BUSCADOR DE PARA EL MODELO

$mod_busc='
<?php
   require("../conector/conexion.php");

   $action = (isset($_REQUEST["action"])&& $_REQUEST["action"] !=NULL && $_REQUEST["txt_buscar_'.$area.'"])?$_REQUEST["action"]:"";
 
   if($action == "")
    {
      ?>
      <div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>Aviso!!!</h4> debe escribir datos en el buscador para mostrarlos
            </div>
      
      <a href="../vista/vista_listar_'.$area.'.php"> Volver al listado </a>
      <?php
    }

  if($action == "ajax"){
    include "paginacion.php"; //incluir el archivo de paginación
    //las variables de paginación
    echo "<h4> RESULTADOS PARA : ";
    $txt_buscar_'.$area.'=$_REQUEST["txt_buscar_'.$area.'"];
    
   

    echo "<label>".$txt_buscar_'.$area.'." !! </label> </h4>";
    ?><a href="../vista/vista_listar_'.$area.'.php"> Volver al listado </a> <?php

    $page = (isset($_REQUEST["page"]) && !empty($_REQUEST["page"]))?$_REQUEST["page"]:1;
    $per_page = 10; //la cantidad de registros que desea mostrar
    $adjacents  = 4; //brecha entre páginas después de varios adyacentes
    $offset = ($page - 1) * $per_page;
    
    //Cuenta el número total de filas de la tabla*/
    
    $count_query = mysqli_query($con,"SELECT count(*) AS numrows FROM '.$area.' WHERE ';


    /*%$txt_buscar_'.$area.'%' OR
    apellido LIKE '%$txt_buscar_sapo%' OR
    edad LIKE '%$txt_buscar_sapo%'");*/

            foreach($lista_campos as $form)
            {     
              $campo = $form->campo; 
              $clase = $form->tipo; 

              $mod_busc.="".$campo." LIKE '%".'$'."txt_buscar_".$area."%' OR ";       
            }

   $mod_busc = substr($mod_busc, 0, -3); 
   $mod_busc.='");';

    $mod_busc.='if ($row= mysqli_fetch_array($count_query)){$numrows = $row["numrows"];}
    $total_pages = ceil($numrows/$per_page);
    $reload = "../vista/vista_listar_'.$area.'.php";

    //consulta principal para recuperar los datos
    $query = mysqli_query($con,"SELECT * FROM '.$area.' WHERE ';

      foreach($lista_campos as $form)
            {     
              $campo = $form->campo; 
              $clase = $form->tipo; 

              $mod_busc.="".$campo." LIKE '%".'$'."txt_buscar_".$area."%' OR ";       
            }

   $mod_busc = substr($mod_busc, 0, -3); 

   $mod_busc.=' order by ID_'.$area.' LIMIT $offset,$per_page");
    
    if ($numrows>0){
      ?>
    <table class="table table-bordered">
        <thead>';
          foreach($lista_campos as $form)
            {     
              $campo = $form->campo; 
             
              $clase = $form->tipo; 

                $mod_busc.="<th>".$campo."</th>";       
            }

        
      $mod_busc.= '<th class="col-lg-2" aling="center"> </th> </tr>
      </thead>
      <tbody>
      <?php
       while($row = mysqli_fetch_array($query)){';
        
        $mod_busc.= '$ID_'.$area.'=$row[';

        $mod_busc.="'ID_".$area."'];";

        $mod_busc.= '?> <tr>';

  


         foreach($lista_campos as $form)
            {     
              $campo = $form->campo; 
             
              $clase = $form->tipo; 

              $mod_busc.='<td><?php echo $row["'.$campo.'"];?></td>';       
            }

       $mod_busc.='<td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal" onclick="btn_editar_'.$area.'';

    $mod_busc.="('<?php echo ".'$'."ID_".$area.";?>')";
    $mod_busc.='"> Editar </button> 
    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal_Elimar" onclick="btn_eliminar_'.$area.'';

    $mod_busc.="('<?php echo ".'$'."ID_".$area.";?>')";
    
    $mod_busc.='"> Eliminar </button> </td></tr>
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
                <h4 class="modal-title"> Editar '.$area.' </h4>
              </div>
              <div class="modal-body">

                 <div id="panel_edicion_'.$area.'">
                   
                 </div>

              </div>
              <div class="modal-footer">
              <div id="respuesta_guardar_cambios_'.$area.'"></div>
                <button type="button" class="btn btn-success" onclick="btn_guardar_cambios_'.$area.'()"> Guardar </button>
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
                <h4 class="modal-title"> Eliminar '.$area.'</h4>
              </div>
              <div class="modal-body">
              <input type="text" id="ID_eliminar_'.$area.'">
                

                 <div id="panel_eliminar_'.$area.'">
                    <div class="alert alert-danger" role="alert">
                   <strong> SEGURO !! </strong> Desea eliminar este dato ?
                    </div>
                 </div>

              </div>
              <div class="modal-footer">
              <div id="respuesta_eliminar_total_'.$area.'"></div>
                <button type="button" class="btn btn-success" onclick="btn_borrar_'.$area.'()"> Eliminar </button>
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

  function btn_editar_'.$area.'(ID_'.$area.')
  { 
     var parametros = {ID_'.$area.':ID_'.$area.'};
    
    $.ajax({
      type: "POST",
      url:"../vista/vista_editar_'.$area.'.php",
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $("#panel_edicion_'.$area.'").html(data).fadeIn("slow");;
      }
    });

  }

  function btn_guardar_cambios_'.$area.'()
  {
   var ID_'.$area.' =$("#ID_'.$area.'_edicion").val();
  ';
   
   $parametros='var parametros = {ID_'.$area.': ID_'.$area.',';
   foreach($lista_campos as $form)
   {     
              $campo = $form->campo; 
             
              $clase = $form->tipo; 

       $mod_busc.=' var '.$campo.' = $("#'.$campo.'").val(); ';  
       $parametros.=''.$campo.':'.''.$campo.',';     
    }
    
    $parametros = substr($parametros, 0, -1); 
    $parametros.='};';

    $mod_busc.=''.$parametros.'
     
    $.ajax({
      type: "POST",
      url:"../modelo/modelo_guardar_'.$area.'.php",
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $("#respuesta_guardar_cambios_'.$area.'").html(data).fadeIn("slow");
        window.setTimeout("actualizar_datos_'.$area.'_editar()",3000);

      }
    });

  }

  function actualizar_datos_'.$area.'_editar()
  {  $("#myModal").modal("hide").fadeIn("slow");
     $("#respuesta_guardar_cambios_'.$area.'").html("").fadeIn("slow");
     location.reload();
  }


 function btn_eliminar_'.$area.'(ID_'.$area.')
 {
    $("#ID_eliminar_'.$area.'").val(ID_'.$area.');
 }

 function btn_borrar_'.$area.'()
  {  
     var ID_'.$area.' = $("#ID_eliminar_'.$area.'").val();
     var parametros = {ID_'.$area.':ID_'.$area.'};
    
     $.ajax({
      type: "POST",
      url:"../modelo/modelo_eliminar_'.$area.'.php",
      data: parametros,
       beforeSend: function(objeto){
      },
      success:function(data){
        $("#panel_eliminar_'.$area.'").html(data).fadeIn("slow");
          window.setTimeout("actualizar_datos_'.$area.'_eliminar()",3000);
      }
    });
  }

function actualizar_datos_'.$area.'_eliminar()
  {  $("#myModal").modal("hide").fadeIn("slow");
     $("#respuesta_eliminar_total_'.$area.'").html("").fadeIn("slow");
     location.reload();
  }

</script>
';

$rut='modelo/modelo_buscar_listado_'.$area.'.php';
  $file = fopen($rut, 'w');
  fwrite($file, $mod_busc. PHP_EOL);
  fclose($file);


//REALIZAMOS LA CREACION DE LOS DATOS DE EDICION

 $mod_vis_ed='
 <script type="text/javascript" src="../control/control_'.$area.'.js"></script>
 <?php
 require("../conector/conexion.php");
 $ID_'.$area.' = $_POST[';
 
 $mod_vis_ed.="'ID_".$area."'];";

 $mod_vis_ed.='$query = mysqli_query($con,"SELECT * FROM '.$area.' WHERE ID_'.$area.'=';

 $mod_vis_ed.="'".'$'."ID_".$area."'";

$mod_vis_ed.='");
  
  while($row = mysqli_fetch_array($query))
  {
    ?> 
    <input type="text" id="ID_'.$area.'_edicion" value="<?php echo $ID_'.$area.';?>">';

     foreach($lista_campos as $form)
     {     
              $campo = $form->campo; 
             
              $clase = $form->tipo; 

       $mod_vis_ed.='<label> '.$campo.' </label>';
       
       $mod_vis_ed.='<?php $'.$campo.'=$row[';

       $mod_vis_ed.="'".$campo."']; ?>";
      
      //ACA MODIFY

           if($clase=="Texto")
             {
             
              $f_js='onkeyup="';
              $f_js.="validador_campo('".$campo."','resp_".$campo."',4)";
              $mod_vis_ed.='<input type="text" class="form-control" id="'.$campo.'" value="<?php echo $'.$campo.';?>" placeholder="(*)Escriba su '.$campo.'" '.$f_js.'" maxlength="100"><div id="resp_'.$campo.'"></div>';

             }

              if($clase=="Select")
             {
             
              $f_js='onkeyup="';
              $f_js.="validador_campo('".$campo."','resp_".$campo."',4)";
              $mod_vis_ed.='<input type="text" class="form-control" id="'.$campo.'" value="<?php echo $'.$campo.';?>" placeholder="(*)Escriba su '.$campo.'" '.$f_js.'" maxlength="100"><div id="resp_'.$campo.'"></div>';

             }

             if($clase=="Number")
             {
               $f_js='onkeyup="';
               $f_js.="validador_campo('".$campo."','resp_".$campo."',4)";
               $mod_vis_ed.='<input type="number" class="form-control" id="'.$campo.'" value="<?php echo $'.$campo.';?>" placeholder="(*)Escriba su '.$campo.'" '.$f_js.'" maxlength="10"><div id="resp_'.$campo.'"></div>';

             }

             if($clase=="Area")
             {
              
              $f_js='onkeyup="';
              $f_js.="validador_campo('".$campo."','resp_".$campo."',4)";
              
              $mod_vis_ed.='<textarea class="form-control" id="'.$campo.'" placeholder="(*)Escriba su '.$campo.'" '.$f_js.'" maxlength="100"> <?php echo $'.$campo.';?>  </textarea> <div id="resp_'.$campo.'"></div>';

             }
         
      }

      $mod_vis_ed.='

    <?php
  }


?>
';

$rut='vista/vista_editar_'.$area.'.php';
  $file = fopen($rut, 'w');
  fwrite($file, $mod_vis_ed. PHP_EOL);
  fclose($file);

//AHORA REALIZAREMOS LA EDICION DE GUARDAR CAMBIOS

  $mod_guard='
   <?php ';

  foreach($lista_campos as $form)
  {     
    $campo = $form->campo; 
    $clase = $form->tipo; 

       $mod_guard.='$'.$campo.' = $_POST[';
       $mod_guard.="'".$campo."'];";
  }

  $mod_guard.='$ID_'.$area.' = $_POST[';

  $mod_guard.="'ID_".$area."'];";

  $mod_guard.='require("../conector/conexion.php");
  
  $cadena="";';
  
   foreach($lista_campos as $form)
   {     
    $campo = $form->campo; 
    $clase = $form->tipo; 

       $mod_guard.='
       if($'.$campo.'!="")
       {
       $query = mysqli_query($con,"UPDATE `'.$area.'` SET `'.$campo.'` = ';
      $mod_guard.="'$".$campo."'";

       $mod_guard.=' WHERE `ID_'.$area.'` = $ID_'.$area.';");
       $cadena.=" Se edito '.$campo.' , ";
       }

       ';
   }

 $mod_guard.=' if($cadena!="")
   {
   ?>
   <div class="alert alert-success" role="alert">
   <strong> CAMBIOS!! </strong> actualizados de <?php echo $cadena; ?>
   </div><?php

  }
  else
  {
    
   ?>
   <div class="alert alert-danger" role="alert">
   <strong>ALERTA! </strong> Debes ingresar datos validos.
   </div><?php
  }

?>
  ';

 $rut='modelo/modelo_guardar_'.$area.'.php';
  $file = fopen($rut, 'w');
  fwrite($file, $mod_guard. PHP_EOL);
  fclose($file); 


$mod_elim='
<?php
  $ID_'.$area.' = $_POST[';
  $mod_elim.="'ID_".$area."'];";

   $mod_elim.='require("../conector/conexion.php");  
  
  $query = mysqli_query($con,"DELETE FROM `'.$area.'` WHERE `ID_'.$area.'` =$ID_'.$area.'");

  ?>
   <div class="alert alert-info" role="alert">
   <strong>CORRECTO!! </strong> Se elimino el dato correctamente
   </div><?php
  
?>
';

 $rut='modelo/modelo_eliminar_'.$area.'.php';
  $file = fopen($rut, 'w');
  fwrite($file, $mod_elim. PHP_EOL);
  fclose($file); 

echo "<h1> CREACION DE ARCHIVOS DE DESARROLLO </h1>
<p> <label>© rigth all Solidev Tecnology - 2017 </label> </p>";
?>
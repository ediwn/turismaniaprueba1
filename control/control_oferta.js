
var noti_email=0; 
function btn_registro_oferta(){ 

  var caracterisitca = $("#caracterisitca").val();  
  var icono = $("#icono").val();  
  var titulo = $("#titulo").val();  
  var direccion = $("#direccion").val();  
  var tel_cel = $("#tel_cel").val();  
  var correo = $("#correo").val();
  var calificacion = $("#calificacion").val();  
  var descripcion_empresa = $("#descripcion_empresa").val();  
  var mapa_google = $("#mapa_google").val(); 

  var seccion= $("#seccion").val();   
  var ID_user = $("#ID_user").val();  

  alert(seccion+" "+ID_user);

  var lista_empresas = JSON.stringify(Lista_empresa);
  
 //alert(icono+" - "+ noti_email);

  var ob={ caracterisitca : caracterisitca,icono : icono, titulo : titulo,direccion : direccion,
    tel_cel : tel_cel, correo: correo, calificacion : calificacion,descripcion_empresa : descripcion_empresa,
    mapa_google : mapa_google,lista_empresas:lista_empresas, seccion: seccion, ID_user: ID_user }; 
    
    if(caracterisitca !="" && icono !="" && titulo !="" && direccion !="" && tel_cel !="" && 
      calificacion !="" && descripcion_empresa !="" && mapa_google !="" && relacionar_empresas !="" &&
      correo !="" && seccion!="" && ID_user!="") { 

           $.ajax({
                type: "POST",
                url:"../modelo/modelo_registrar_oferta.php",
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $("#resultado_registro_oferta").html(data);
                
                 setTimeout(limpiar_oferta,1000);

                 $("#caracterisitca").val("");
                 $("#icono").val("");
                 $("#titulo").val("");
                 $("#direccion").val("");
                 $("#tel_cel").val("");
                 $("#calificacion").val("");
                 $("#descripcion_empresa").val("");
                 $("#mapa_google").val("");
                 $("#relacionar_empresas").val("");
                 $("#icono").val("");
                 $("#resp_icono").html("");
                 $("#btn_icono").css('border','none');
                 Lista_empresa = [];
                 mostrar_empresas();
                 $("#correo").val("");
                 $("#resp_correo").html("");
                 

                }
             });
           }
           else{ 

             if (mapa_google ==""){ $("#mapa_google").focus();}

             if (descripcion_empresa ==""){ $("#descripcion_empresa").focus();}
             if (calificacion ==""){ $("#calificacion").focus();}
             if (noti_email > 0 ){ $("#correo").focus(); }
             if (correo==""){ $("#correo").focus(); }
             if (tel_cel ==""){ $("#tel_cel").focus();}
           
             if (direccion ==""){ $("#direccion").focus();}
             if (seccion ==""){ $("#seccion").focus();}
             if (titulo ==""){ $("#titulo").focus();}
             if (icono ==""){ alert('Coloca una imagen a tu empresa'); $("#btn_icono").css('border','1px solid red');}
             if (caracterisitca ==""){ $("#caracterisitca").focus();}

          } 
  }

function limpiar_oferta()
{
    $("#resultado_registro_oferta").html("");
}

function validador_campo(campo,mensaje,cant_min)
{   
  var cadena=$("#"+campo).val();
  var dimencion=cadena.length;
  
  if(dimencion<cant_min)
  {    $("#"+mensaje).html("<label style='color:red;'> min "+cant_min+" digitos " + dimencion+"</label>");
     $("#"+campo).css("border-color","red");
    
  }
  
  else
     {   // alert("entro");  
       $("#"+campo).css("border-color","green");
       $("#"+mensaje).html("");
   }

   }
    

  function validador_correo(campo,mensaje,cant_min)
   {
      
    var email = $("#"+campo).val();
    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

    if (caract.test(email) == false){
        $("#"+mensaje).html("<center> <label style='color:#EC7063;'> Correo invalido </label> </center>");
        noti_email++;

        return false;
    }else{$("#"+mensaje).html("<center> <label> Correo valido !!! </label></center>").slideDown("slow");
        noti_email=0;
        return true;
    }
   }

   //subir imagenes
    $("input[name='file']").on("change", function(){
              
            
              var formData = new FormData($("#formulario")[0]);
              var ruta = "../modelo/imagen-ajax.php";
              $.ajax({
                  url: ruta,
                  type: "POST",
                  data: formData,
                  contentType: false,
                  processData: false,
                  success: function(datos)
                  {
                      $("#resp_icono").html(datos);
                      //alert("avatar cambiado "+img);
                      //actualizar_img();
                  }
              });
          });

// controlador de objetos


function Empresa(ID_empresa,nombre)
{
  this.ID_empresa = ID_empresa;
  this.nombre = nombre;
}

var Lista_empresa = []; 

$('#relacionar_empresas').change(function() {
  
  var ID_empresa = $('#relacionar_empresas').val().substr(0,1);
  var nombre = $('#relacionar_empresas').val().substr(1);
  
  //alert(ID_empresa+" - "+nombre);

  agregar_lista(ID_empresa,nombre);
});

// funcion para gregar lista

function agregar_lista(ID_empresa,nombre)
{  
   var obj = new Empresa(ID_empresa,nombre);

   Lista_empresa.push(obj);
   mostrar_empresas();
   
}

function mostrar_empresas()
{ 
  var cadena = "";

  //alert("olasss 2 " + Lista_empresa.length);

  for (var i = 0; i < Lista_empresa.length; i++) {
    cadena = cadena + Lista_empresa[i].nombre +" <button onclick='borrar_lista();'> Eliminar </button> </br>";
  }

  $('#panel_empresas').html(cadena);
}

function borrar_lista()
{
  Lista_empresa.pop();

  mostrar_empresas();
}

mostrar_empresas_relacionadas();

function mostrar_empresas_relacionadas()
{
    var ID_empresa = $('#ID_oferta_edicion').val();
    var correo_ed  = $('#correo_ed').val();
    
     //$('#resp_relacionar_empresas').html(ID_empresa);
     var ob ={ID_empresa:ID_empresa,correo_ed:correo_ed};
      $.ajax({
                type: "POST",
                url:"../vista/vista_agregar_ofertas.php",
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $("#resp_relacionar_empresas").html(data);

                }
             });

}



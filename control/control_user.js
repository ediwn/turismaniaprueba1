
function btn_login_user()
{
   var nombre_completo = $("#nombre_completo").val();  
   var password = $("#password").val();  

    if(nombre_completo !="" && password !=""){ 

     var ob={nombre_completo:nombre_completo, password:password };

      $.ajax({
                type: "POST",
                url:"../modelo/modelo_login_user.php",
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $("#resultado_registro_user").html(data);
                 
                 setTimeout(limpiar_user,1000);
                 
                 $("#nombre_completo").val("");
                 $("#password").val("");
               

                }
             });

    }

    else
    {  
        if (password ==""){ $("#password").focus();}
        if (nombre_completo ==""){ $("#nombre_completo").focus();}
      } 


}

function btn_registro_user(){ 

   var nombre_completo = $("#nombre_completo").val();  
   var password = $("#password").val();  
   var password_confir = $("#password_confir").val();  

   var ob={nombre_completo:nombre_completo, password:password, password_confir:password_confir};

    if(nombre_completo !="" && password !="" && password_confir !="" ){ 

      if (password == password_confir)
      {
          $.ajax({
                type: "POST",
                url:"../modelo/modelo_registrar_user.php",
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $("#resultado_registro_user").html(data);
                 
                 setTimeout(limpiar_user_rec,2000);
                 
                 $("#nombre_completo").val("");
                 $("#password").val("");
                 $("#password_confir").val("");

                }
             });
      }
      else
      {
         $("#resultado_registro_user").html("<h4 align='center'> Las contraseñas no coinciden </h4>");
                 
                 setTimeout(limpiar_user,1000);
      }

     }

    else

    {  
        if (password_confir ==""){ $("#password_confir").focus();}
        if (password ==""){ $("#password").focus();}
        if (nombre_completo ==""){ $("#nombre_completo").focus();}
      } 
  }


function limpiar_user()
{
    $("#resultado_registro_user").html("");
}

function limpiar_user_rec()
{
    $("#resultado_registro_user").html("");
    location.href = "vista_ingreso_user.php";
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
    
  var noti_email=0; 
  function validador_correo(campo,mensaje,cant_min)
   {
      
    var email = $("#"+campo).val();
    var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

    if (caract.test(email) == false){
        $("#"+mensaje).html("<label style='color:#EC7063;'> invalido </label>");
        noti_email++;

        return false;
    }else{$("#"+mensaje).html("valido").slideDown("slow");noti_email=0;
        return true;
    }
   }


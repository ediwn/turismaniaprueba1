function btn_registro_area(){ var nombre_area = $("#nombre_area").val();  var ob={nombre_area : nombre_area}; 
    if(nombre_area !="" ){
     $.ajax({
                type: "POST",
                url:"../modelo/modelo_registrar_area.php",
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $("#resultado_registro_area").html(data);
                 setTimeout(limpiar_area,1000);$("#nombre_area").val("");

                }
             });
           }else{if (nombre_area ==""){ $("#nombre_area").focus();}} 
  }function limpiar_area()
{
    $("#resultado_registro_area").html("");
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


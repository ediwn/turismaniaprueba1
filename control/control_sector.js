function btn_registro_sector(){ var nombre_area = $("#nombre_area").val();  var empresa = $("#empresa").val();  var ID_empresa = $("#ID_empresa").val();  var ID_sector = $("#ID_sector").val();  var ob={nombre_area : nombre_area,empresa : empresa,ID_empresa : ID_empresa,ID_sector : ID_sector}; 
    if(nombre_area !="" && empresa !="" && ID_empresa !="" && ID_sector !="" ){ $.ajax({
                type: "POST",
                url:"../modelo/modelo_registrar_sector.php",
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $("#resultado_registro_sector").html(data);
                 setTimeout(limpiar_sector,1000);$("#nombre_area").val("");$("#empresa").val("");$("#ID_empresa").val("");$("#ID_sector").val("");

                }
             });
           }else{if (nombre_area ==""){ $("#nombre_area").focus();}if (empresa ==""){ $("#empresa").focus();}if (ID_empresa ==""){ $("#ID_empresa").focus();}if (ID_sector ==""){ $("#ID_sector").focus();}} 
  }function limpiar_sector()
{
    $("#resultado_registro_sector").html("");
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


$("#nombre_area").change(function(){
  var $ID_area = $("#nombre_area").val();
  $("#ID_sector").val($ID_area);
});

$("#empresa").change(function(){
  var $ID_empresa = $("#empresa").val();
  $("#ID_empresa").val($ID_empresa);
});
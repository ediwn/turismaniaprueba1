
function btn_examinar_oferta(ID_oferta)
{
	//alert(" holas = <label>"+ID_oferta+"</label>");
	//panel_ofertas_principal
	//carrusel
      var ob={ID_oferta:ID_oferta};
	  $.ajax({
       type: "POST",
       url:"../modelo/modelo_examinar_oferta.php",
       data: ob,
       beforeSend: function(objeto){
              
       },
       success: function(data)
       { 
       	$("#carrusel_principal").css('display','none'); 
        $("#panel_ofertas_principal").html(data);
        

       }
    });
}

function btn_mostrar_area(area ,ID_area)
{
	  //alert(area+" "+ID_area);

	  var ob={ID_area:ID_area, area:area};
	  $.ajax({
       type: "POST",
       url:"../modelo/modelo_examinar_oferta_area.php",
       data: ob,
       beforeSend: function(objeto){
              
       },
       success: function(data)
       { 
       	$("#carrusel_principal").css('display','none'); 
        $("#panel_ofertas_principal").html(data);
        
       }
    });
}

function Buscar_ofertas()
{
	  var texto_buscar = $('#txt_buscar').val();

	  if(texto_buscar =="")
	  {   
          $("#resultado_buscador").html('<h5><label style="color:#EC7063;"> Escriba en el campo buscar !!!</label> </h5>');

          setTimeout(function(){
          	$("#resultado_buscador").html('');
          },2000);
	  }

	  else{
	  	var ob={texto_buscar:texto_buscar};

	  $.ajax({
       type: "POST",
       url:"../modelo/modelo_buscar_menu_oferta.php",
       data: ob,
       beforeSend: function(objeto){
              
       },
       success: function(data)
       { 
       	$("#carrusel_principal").css('display','none'); 
        $("#panel_ofertas_principal").html(data);
        
       }
    });
	  }

	  
}

function Buscar_ofertas_responsive()
{
      var texto_buscar = $('#txt_buscar2').val();

	  if(texto_buscar =="")
	  {   
          $("#resultado_buscador").html('<h5><label style="color:#EC7063;"> Escriba en el campo buscar !!!</label> </h5>');

          setTimeout(function(){
          	$("#resultado_buscador").html('');
          },2000);
	  }

	  else{
	  	var ob={texto_buscar:texto_buscar};

	  $.ajax({
       type: "POST",
       url:"../modelo/modelo_buscar_menu_oferta.php",
       data: ob,
       beforeSend: function(objeto){
              
       },
       success: function(data)
       { 
       	$("#carrusel_principal").css('display','none'); 
        $("#panel_ofertas_principal").html(data);
        
         }
        });
	  }


}

// Botones fronet


function btn_servicio_turista(opcion)
{
   
      var ob ={opcion:opcion};
     $.ajax({
       type: "POST",
       url:"../vista/vista_ofertas_menu_adorno.php",
       data: ob,
       beforeSend: function(objeto){
              
       },
       success: function(data)
       { 
        $("#panel_ofertas").html(data);
       }
    });

}
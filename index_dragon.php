<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="libreria/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="libreria/bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="libreria/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>


<table class="table" style="width: 50%; margin: 0px; background: ; margin: 0px;">
	<tr>
		<td>
			<center> <img src="sigfrid.png" width="150" height="100"></center>
		</td>
		<td>
			<h1 align="center" style="color:#e6e200; font-family: arial; font-weight: bold; text-shadow: 1px 1px 1px #aaa; font-style: italic ;"> SYCFRID The Frame MVC </h1>
		</td>
	</tr>
</table>
<hr style="margin: 0px;">

<div class="row container">
	<div class="col-lg-4 col-xs-12" style="background: #F8F9F9;">
	<h6> Area del formulario </h6>
	    <input type="text" id="area" class="form-control">
	<h6> Campo del formulario </h6>
		<input type="text" id="campo" class="form-control" maxlength="">
	<h6> Seleccione el tipo </h6>
		<select class="form-control" id="opcion_campo">
			<option> Tipo </option>
			
			<option> Texto </option>
			<option> Number </option>
			<option> Area </option>
			<option> Select </option>
			<option> Password </option>
			<option> Correo </option>
			<option> File </option>
			<option> Time </option>
			<option> Date </option>
			<option> URL </option>
		</select>
		</br>
		<center>
		<button class="btn btn-default" onclick="btn_agregar_campos()"> AGREGAR </button>
		</center>

		</br>
		</br>
		</br>
		</br>
		<h3 style="font-weight: bold; font-style: oblique; text-align: center;"> Genera codigo MVC </h3>

		<center>
			<button class="btn btn-success" onclick="generar_code()"> GENERAR </button>
		</center>
		<hr>

	</div>
	<div class="col-lg-8 col-xs-12" id="resultado_form">
		
	</div>
	<div class="col-lg-6 col-xs-12">
	
	</div>


</div>


</body>
</html>

<script type="text/javascript">
    
 var lista_campos=[];
    //creamos el objeto

	 function formulario(campo, tipo) {
	  this.campo = campo;
	  this.tipo = tipo;
	}

	
	function btn_agregar_campos() {
	  	
	  	var campo = $("#campo").val();
		var tipo = $("#opcion_campo").val();
		

		var obj = new formulario(campo,tipo);
        
		lista_campos.push(obj);
		//alert(campo+" - "+tipo);
		mostrar_campos();
      
	}

	function mostrar_campos()
	{  
		var cadena="";
		for (var i = 0; i < lista_campos.length; i++) {
			cadena = cadena +"<h5> "+lista_campos[i].campo+" - "+lista_campos[i].tipo+" <button class='btn btn-danger btn-xs' onclick='borrar()'> x </button></h5>";
		}
        
        $("#resultado_form").html(cadena);
	}

	function generar_code()
	{
		var area=$("#area").val();
		var lista = JSON.stringify(lista_campos);

		 var ob={lista : lista, area:area};
            
            $.ajax({
                type: "POST",
                url:"crear_code.php",
                data: ob,
                beforeSend: function(objeto){
              
                },
                success: function(data)
                { 
                 $("#resultado_form").html(data);


                }
             });
	}

	function borrar()
	{ lista_campos.pop();
		var cadena="";
		for (var i = 0; i < lista_campos.length; i++) {
			cadena = cadena +"<h5> "+lista_campos[i].campo+" - "+lista_campos[i].tipo+" <button class='btn btn-danger btn-xs' onclick='borrar()'> x </button> </h5>";
		}
        
        $("#resultado_form").html(cadena);
	}

</script>


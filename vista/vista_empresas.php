<?php
echo "entra";
require('../conector/conexion.php');

$sql=mysqli_query($con,'SELECT * FROM oferta ORDER BY ID_oferta DESC');

while ($row = mysqli_fetch_array($sql)) {
	$ID_oferta = $row['ID_oferta'];
	$nombre_empresa = $row['titulo'];

	$value = $ID_oferta.''.$nombre_empresa;
	?>
	<option value="<?php echo $value;?>"> <?php echo $nombre_empresa; ?> </option>
	<?php
}


?>
<?php
	require ('../../conexion.php');
	
	$id_ubicacion = $_POST['id_ubicacion'];
	
	$query = "SELECT ubicaciones.NOM_SITIO AS SITIOS, ubicaciones.TIPO, ubicaciones.ID_UB, ubicaciones.ALTURA, ubicaciones.LAT, ubicaciones.LON, resp_zona.RESPONSABLE FROM ubicaciones INNER JOIN resp_zona ON ubicaciones.ZON = resp_zona.ID WHERE ubicaciones.ZON='$id_ubicacion'";
	$resultado=$mysqli->query($query);
	$html.= "<option>Selecciona ubicacion</option>";
	while($row = $resultado->fetch_assoc())
	{
		
		$html.= "<option value='".$row['ID_UB']."'>".$row['SITIOS']."</option>";
	}
	echo $html;
?>
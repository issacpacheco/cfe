<?php
	
	require ('../conexion.php');
	
	$id_datos = $_POST['id_datos'];
	
	$queryS = "SELECT ubicaciones.NOM_SITIO AS SITIOS, ubicaciones.TIPO, ubicaciones.ALTURA, ubicaciones.LAT, ubicaciones.LON, resp_zona.RESPONSABLE FROM ubicaciones INNER JOIN resp_zona ON ubicaciones.ZON = resp_zona.ID WHERE ubicaciones.ID_UB='$id_datos'";
	$resultadoS = $mysqli->query($queryS);
	
	$html = "";
	
	while($rowS = $resultadoS->fetch_assoc())
	{
		$html.= "Ubicacion: <input value='".$rowS['LAT']."'><br />";
        $html.= "Tipo: <input value='".$rowS['TIPO']."' name='tipo'>";
        $html.= "Altura: <input value='".$rowS['ALTURA']."' name='altura'>";
        $html.= "Descripcion del trabajo: <textarea value='comentarios' name='comentarios'>";
        
	}
	
	echo $html;
?>
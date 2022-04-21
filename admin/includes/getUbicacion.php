<?php
	
	require ('../../conexion.php');
	
	$id_datos = $_POST['id_datos'];
	
	$queryS = "SELECT ubicaciones.NOM_SITIO AS SITIOS, ubicaciones.TIPO, ubicaciones.ALTURA, ubicaciones.LATITUD, ubicaciones.LONGITUD, resp_zona.RESPONSABLE FROM ubicaciones INNER JOIN resp_zona ON ubicaciones.ZON = resp_zona.ID WHERE ubicaciones.ID_UB='$id_datos'";
	$resultadoS = $mysqli->query($queryS);
	
	$html = "";
	
	while($rowS = $resultadoS->fetch_assoc())
	{
		$html.= "Coordenadas: <input class='form-control form-control-user' value='".$rowS['LATITUD'].",".$rowS['LONGITUD']."' name='coordenadas'><br />";
        $html.= "Tipo: <input class='form-control form-control-user' value='".$rowS['TIPO']."' name='tipo'>";
        $html.= "Altura: <input class='form-control form-control-user' value='".$rowS['ALTURA']."' name='altura'>";
        $html.= "Descripcion del trabajo: <textarea class='form-control form-control-user' value='comentarios' name='comentarios'>";
	}
	
	echo $html;
?>
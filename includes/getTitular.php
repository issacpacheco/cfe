<?php
	
	require ('../conexion.php');
	
	$id_zona = $_POST['id_zona'];
	
	$queryM = "SELECT * FROM resp_zona WHERE ID='$id_zona'";
	$resultadoM = $mysqli->query($queryM);
	
	//$html= "<option value='0'>Seleccionar Municipio</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['ID']."'>".$rowM['RESPONSABLE']."</option>";
        
	}
	
	echo $html;
?>		
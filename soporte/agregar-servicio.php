<?php
	require ('../conexion.php');
	$id_ticket=$_REQUEST['id'];
	$query = "SELECT * FROM servicios";
	$resultado=$mysqli->query($query);
?>

<html>
	<head>
		<title>Agregar servicio</title>
		
		<script language="javascript" src="js/jquery-3.1.1.min.js"></script>
	</head>
	
	<body>
		<form id="combo" name="combo" action="guardar-servicio.php" method="POST" enctype="multipart/form-data">
			<div>Ticket: <input type="" value="<?php echo $id_ticket ?>" name="id_ticket"></div>

			<br />

			<div>Seleccione servicio : <select name="cbx_servicio" id="cbx_servicio">
				<option value="0">Seleccionar Servicio</option>
				<?php while($row = $resultado->fetch_assoc()) { ?>
					<option value="<?php echo $row['id']; ?>"><?php echo $row['servicios']; ?></option>
				<?php } ?>
			</select></div>
			
			<br />
			
			<div>Foto:<input type="file" accept="image/*" name="fileToUpload1" value=""></div>
			
			<br />
			
			<div>Foto:<input type="file" accept="image/*" name="fileToUpload2" value=""></div>
			
			<br />
            
            <br />
			<input type="submit" id="enviar" name="enviar" value="Guardar" />
		</form>
	</body>
</html>

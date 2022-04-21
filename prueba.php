<?php
	require ('conexion.php');
	
	$query = "SELECT ID, ZONA FROM resp_zona";
	$resultado=$mysqli->query($query);
?>

<html>
	<head>
		<title>Solicitud de ticket</title>
		
		<script language="javascript" src="js/jquery-3.1.1.min.js"></script>
		
		<script language="javascript">
			$(document).ready(function(){
				$("#cbx_zona").change(function () {

					//$('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#cbx_zona option:selected").each(function () {
						id_zona = $(this).val();
						$.post("includes/getTitular.php", { id_zona: id_zona }, function(data){
							$("#cbx_titular").html(data);
						});            
					});
				})
			});
			
			$(document).ready(function(){
				$("#cbx_zona").change(function () {
					$("#cbx_zona option:selected").each(function () {
						id_ubicacion = $(this).val();
						$.post("includes/getSitio.php", { id_ubicacion: id_ubicacion }, function(data){
							$("#cbx_localidad").html(data);
						});            
					});
				})
			});
            $(document).ready(function(){
				$("#cbx_localidad").change(function () {
					$("#cbx_localidad option:selected").each(function () {
						id_datos = $(this).val();
						$.post("includes/getUbicacion.php", { id_datos: id_datos }, function(data){
							$("#txt_ubicacion").html(data);
						});            
					});
				})
			});
		</script>
		
	</head>
	
	<body>
		<form id="combo" name="combo" action="guardar.php" method="POST">
            <div>
                Solicitante: <input name="txt_solicitante"><br>
                Licencia: <input name="txt_licencia"><br>
                Celular: <input name="txt_cel"><br>
                Correo: <input name="txt_correo" type="email"><br>
                
            </div>
			<div>Seleccione Zona : <select name="cbx_zona" id="cbx_zona">
				<option value="0">Seleccionar Zona</option>
				<?php while($row = $resultado->fetch_assoc()) { ?>
					<option value="<?php echo $row['ID']; ?>"><?php echo $row['ZONA']; ?></option>
				<?php } ?>
			</select></div>
			
			<br />
			
			<div>Titular: <select name="cbx_titular" id="cbx_titular"></select></div>
			
			<br />
			
			<div>Ubicacion: <select name="cbx_localidad" id="cbx_localidad"></select></div>
			
			<br />
            
            <div name="txt_ubicacion" id="txt_ubicacion"></div>
            
            <br />
			<input type="submit" id="enviar" name="enviar" value="Guardar" />
		</form>
	</body>
</html>

<?php
	include '../conexion.php';

	ModificarProducto($_POST['id_ticket'], $_POST['estado']);

	function ModificarProducto($id_ticket, $estado)
	{
		include '../conexion.php';
		$sentencia="UPDATE ticket SET estado='".$estado."' WHERE id_tickets='".$id_ticket."' ";
		$mysqli->query($sentencia) or die (mysqli_error());
		if($mysqli->query($sentencia)===TRUE)
           	{
                	include("correo_confirmacion.php");
                	echo "<script type='text/javascript'>
				alert('estado modificado exitosamente');
				window.location.href='tickets_usuario.php';
				</script>";
            	}else{
                	echo "El estatus no se modifico. Error: ".$sql."<br>".$mysqli->error;
            	}
	}
?>
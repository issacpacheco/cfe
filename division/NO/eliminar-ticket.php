<?php
	include "../conexion.php";

	EliminarProducto($_GET['id']);

	function EliminarProducto($id_ticket)
	{
		include "../conexion.php";
		$sentencia="DELETE FROM ticket WHERE id_tickets='".$id_ticket."' ";
		$mysqli->query($sentencia) or die (mysql_error());
	}
?>

<script type="text/javascript">
	alert("El ticket se elimino exitosamente");
	window.location.href='tickets_usuario.php';
</script>
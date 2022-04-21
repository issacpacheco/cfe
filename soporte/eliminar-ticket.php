<?php
	include "../conexion.php";

	EliminarProducto($_GET['id']);

	function EliminarProducto($id_ticket)
	{
		include "../conexion.php";
		$eliminartrabajo="DELETE FROM trabajos WHERE id_ticket = '".$id_ticket."'";
		$mysqli->query($eliminartrabajo) or die (mysql_error());
		$sentencia="DELETE FROM ticket WHERE id_tickets='".$id_ticket."' ";
		$mysqli->query($sentencia) or die (mysql_error());
	}
?>

<script type="text/javascript">
	alert("El ticket se elimino exitosamente");
	window.location.href='tickets_soporte.php';
</script>
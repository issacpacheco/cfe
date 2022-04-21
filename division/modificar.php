<?php
	include '../conexion.php';

	ModificarProducto($_POST['id_ticket'], $_POST['estado'], $_POST['total'], $_POST['idzona']);


	function ModificarProducto($id_ticket, $estado, $total, $ID_ZONA)
	{
		include '../conexion.php';
if ($estado== 4) {
	$sentencia="UPDATE ticket SET estado='".$estado."' WHERE id_tickets='".$id_ticket."' ";
		$mysqli->query($sentencia) or die (mysqli_error());
		if($mysqli->query($sentencia)===TRUE)
           	{
                	include("correo_confirmacion.php");
                	echo "<script type='text/javascript'>
				alert('estado modificado exitosamente');
				window.location.href='menu_admin.php';
				</script>";
                
            	}else{
                	echo "El estatus no se modifico. Error: ".$sql."<br>".$mysqli->error;
            	}
} else{

		$sentencia="UPDATE ticket SET estado='".$estado."' WHERE id_tickets='".$id_ticket."' ";
		$mysqli->query($sentencia) or die (mysqli_error());
		if($mysqli->query($sentencia)===TRUE)
           	{
                	include("correo_confirmacion.php");
                
            	}else{
                	echo "El estatus no se modifico. Error: ".$sql."<br>".$mysqli->error;
            	}

            	$CON="SELECT PRESUPUESTO FROM resp_zona WHERE ID ='$ID_ZONA'";
            	$result=$mysqli->query($CON);
            	if($result->num_rows>0){
            		while($row=mysqli_fetch_assoc($result)){
            			$presupuesto=$row['PRESUPUESTO'];
            		}
            	}
            	echo $presupuesto;
            	$resta= $presupuesto - $total;
            	echo $resta;


            	$sentencia="UPDATE resp_zona SET PRESUPUESTO='".$resta."' WHERE ID='".$ID_ZONA."' ";
		$mysqli->query($sentencia) or die (mysqli_error());
		if($mysqli->query($sentencia)===TRUE)
           	{
                	//include("correo_confirmacion.php");
                	echo "<script type='text/javascript'>
				alert('estado modificado exitosamente');
				window.location.href='menu_admin.php';
				</script>";
            	}else{
                	echo "El estatus no se modifico. Error: ".$sql."<br>".$mysqli->error;
            	}
	}
}

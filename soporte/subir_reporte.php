<?php
	require ('../conexion.php');
	$targetfolder = "pdf/";

	$nombrePDF 	= $_FILES['userfile']['name'];
	$idTicket 	= $_POST['idTicket'];
	$subtotal 	= filter_input(INPUT_POST, 'subtotal', FILTER_SANITIZE_STRING);

	echo $idTicket;

	$targetfolder = $targetfolder . basename( $_FILES['userfile']['name']);

	if(move_uploaded_file($_FILES['userfile']['tmp_name'], $targetfolder)){
		echo "The file ". basename( $_FILES['userfile']['name']). " is uploaded";
		$sql = "UPDATE ticket SET PDFReport = '$nombrePDF', subtotal_ticket = '$subtotal', estado = 5 WHERE id_tickets = {$idTicket}";
		 if($mysqli->query($sql)===TRUE)
            {
            	header('location: reporte_fotografico_1.php');
            }else{
                echo "El Servicio no se genero. Error: ".$sql."<br>".$mysqli->error;
            }

	}else{
		echo "Problem uploading file";
	}

?>
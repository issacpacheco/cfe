<?php

include ('../../conexion.php');


$id_ticket=$_POST['id_ticket'];


$sentencia = "UPDATE ticket SET estado='2' where id_tickets='".$id_ticket."' ";
$mysqli->query($sentencia) or die (mysql_error());

$mysqli->close();

error_reporting(0);



 ?>
<?php
$hostname = "localhost";
$usuariodb = "root";
$contrasenadb = "";
$dbname = "ticket-asv";
	
// Generar conexion con el servidor MySQl
$conexion = mysqli_connect($hostname, $usuariodb, $contrasenadb, $dbname);
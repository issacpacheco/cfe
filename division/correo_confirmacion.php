<?php

Correo($_POST['id_ticket']);
function Correo($id_ticket)
{
include('../conexion.php');
$conect="SELECT id_tickets, solicitante, ticket.correo AS SolCorreo, estado, resp_zona.CORREO AS RespCorreo, resp_zona.RESPONSABLE AS responsable FROM ticket LEFT JOIN resp_zona ON ticket.zona = resp_zona.ID_ZONA WHERE id_tickets = '$id_ticket'";
$result = $mysqli->query($conect);
if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        $correo_zona=$row['RespCorreo'];
        $responsable=$row['responsable'];
        $solicitante=$row['solicitante'];
        $correo_solicitante=$row['SolCorreo'];
        $status=$row['estado'];


switch ($status) {
    case 3:
        $estado="El ticket ha sido aprovado";
        break;
    case 4:
        $estado="El ticket ha sido rechazado";
    break;
    default:
        // code...
        break;
}

//librerias
  require 'PHPMailer/PHPMailerAutoload.php';
$mail="";
//Create a new PHPMailer instance
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 3;

//Configuracion servidor mail
$mail->From = '$correo_zona'; //remitente
$mail->FromName = "SOPORTE ASV";
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls'; //seguridad
$mail->Host = "smtp.gmail.com"; // servidor smtp
$mail->Port = 587; //puerto
$mail->Username ='cfe.emails@gmail.com'; //nombre usuario
$mail->Password = 'cfe@sv2021'; //contraseña

$mensaje = "Este mensaje fue enviado por: " .$responsable . ",\r\n";
$mensaje .= "Su e-mail es: " . $correo_zona . " \r\n";
$mensaje .= "Asunto: Estatus del ticket \r\n";
$mensaje .= "Mensaje: " . $estado . " \r\n";
$mensaje .= "Enviado el " .date('d/m/Y', time());

//Agregar destinatario
$mail->AddAddress("k.coyoc@asv.com.mx");
$mail->Subject = "Estatus del tickets";
$mail->Body = $mensaje;
$mail->AddBCC('$correo_zona','$reponsable');
$mail->AddBCC('$correo_solicitante','$solicitante');
$mail->AddBCC("r.cazola@asv.com.mx","Roberto Cazola");
$mail->AddBCC("factura@asv.com.mx","Azucena Canto");
$mail->AddBCC("soporte@asv.com.mx","soporte");

//Avisar si fue enviado o no y dirigir al index
if ($mail->Send()) {
    echo'<script type="text/javascript">
           alert("Enviado Correctamente");
        </script>';
    echo "<script type='text/javascript'>window.location.href='tickets_usuario.php';</script>";
} else {
    echo'<script type="text/javascript">
           alert("NO ENVIADO, intentar de nuevo");
        </script>';
}
    }
}
}
/*if(isset($_POST["enviar"])){
    $nombre=$_POST['txt_solicitante'];
    $licencia=$_POST['txt_licencia'];
    $telefono=$_POST['txt_cel'];
    $correo=$_POST['txt_correo'];
    $comentarios=$_POST['comentarios'];
    

    $header='From: ' . $correo . "\r\n";
    $header .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    $header .= "Mine-Version: 1.0 \r\n";
    $header .= "Content-Type: text/plain";

    $mensaje = "Este mensaje fue enviado por: " .$nombre . ",\r\n";
    $mensaje .= "Su e-mail es: " . $correo . " \r\n";
    $mensaje .= "Asunto: Solicitud de mantenimiento \r\n";
    $mensaje .= "Telefono: " . $telefono . " \r\n";
    $mensaje .= "Mensaje: " . $comentarios . " \r\n";
    $mensaje .= "Enviado el " .date('d/m/Y', time());

    $para = 'soporte@asv.com.mx';
    $asunto = 'Ticket generado con el folio ';

    if(mail($para, $asunto, utf8_decode($mensaje), $header)){
        echo "<script type='text/javascript'>alert('Tu ticket ha sido registrado con exito');</script>";
        echo "<script type='text/javascript'>window.location.href='tickets_usuario.php';</script>";
    }  
}*/
?>
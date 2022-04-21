<?php
    include("conexion.php");
    if(isset($_POST['enviar']))
    {
        if(isset($_POST['txt_solicitante']) && !empty($_POST['txt_solicitante']) && isset($_POST['txt_licencia']) && !empty($_POST['txt_licencia']) && isset($_POST['txt_cel']) && !empty($_POST['txt_cel']) && isset($_POST['txt_correo']) && !empty($_POST['txt_correo']) && isset($_POST['cbx_zona']) && !empty($_POST['cbx_zona']) && isset($_POST['cbx_titular']) && !empty($_POST['cbx_titular']) && isset($_POST['cbx_localidad']) && !empty($_POST['cbx_localidad']) && isset($_POST['tipo']) && !empty($_POST['tipo']) && isset($_POST['altura']) && !empty($_POST['altura']) && isset($_POST['comentarios']) && !empty($_POST['comentarios']))
        {
            $nombre=$_POST['txt_solicitante'];
            $licencia=$_POST['txt_licencia'];
            $telefono=$_POST['txt_cel'];
            $correo=$_POST['txt_correo'];
            $id_zona=$_POST['cbx_zona'];
            $titular=$_POST['cbx_titular'];
            $localidad=$_POST['cbx_localidad'];
            $tipo=$_POST['tipo'];
            $altura=$_POST['altura'];
            $comentarios=$_POST['comentarios'];
            
            $sql="INSERT INTO ticket (solicitante, licencia, celular, correo, zona, titular, ubicacion, tipo, altura, descripcion, estatus) VALUES ('$nombre', '$licencia', '$telefono', '$correo', '$id_zona', '$titular', '$localidad', '$tipo', '$altura', '$comentarios', '1')";
            if($mysqli->query($sql)===TRUE)
            {
                include("correo.php");
                echo "Ticket dado de alta";
            }else{
                echo "El ticket no se genero. Error: ".$sql."<br>".$conexion->error;
            }
        }else{
            echo "Faltan datos de para generar el ticket";
        }
    }
    $mysqli->close();
    ?>
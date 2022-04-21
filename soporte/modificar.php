<?php
    session_start();
    $usu=$_SESSION['usuario'];

    if(!isset($_SESSION['rol'])){
        header('location: ../login.php');
    }else{
        if($_SESSION['rol'] != 3){
            header('location: ../login.php');
        }
    }
include '../conexion.php';

error_reporting(0);
?>



<?php
    include("../conexion.php");
    $id_ticket = $_REQUEST['id'];
    if(isset($_POST['enviar']))
    {
        if(isset($_POST['txt_solicitante']) && !empty($_POST['txt_solicitante']) 
            && isset($_POST['txt_licencia']) && !empty($_POST['txt_licencia']) 
            && isset($_POST['txt_cel']) && !empty($_POST['txt_cel']) 
            && isset($_POST['txt_correo']) && !empty($_POST['txt_correo']) 
            && isset($_POST['cbx_zona']) && !empty($_POST['cbx_zona']) 
            && isset($_POST['cbx_titular']) && !empty($_POST['cbx_titular']) 
            && isset($_POST['cbx_localidad']) && !empty($_POST['cbx_localidad'])
            && isset($_POST['coordenadas']) && !empty($_POST['coordenadas'])
            && isset($_POST['tipo']) && !empty($_POST['tipo']) 
            && isset($_POST['altura']) && !empty($_POST['altura']) 
            && isset($_POST['comentarios']) && !empty($_POST['comentarios']))
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
            $coordenadas=$_POST['coordenadas'];


            $CON="SELECT * FROM usuario WHERE '$usu' = usuario";
            
            $result = $mysqli->query($CON);
            if($result->num_rows>0){
                
                while($row = $result->fetch_assoc()){
                  $id_usuario=$row['ID'];
                }
            }
            
            $sql="UPDATE ticket SET solicitante='".$nombre."', licencia='".$licencia."', celular='".$telefono."', correo='".$correo."', zona='".$id_zona."', titular='".$titular."', tipo='".$tipo."', ubicacion='".$coordenadas."', ciudad='".$localidad."', altura='".$altura."', descripcion='".$comentarios."' WHERE id_tickets = '".$id_ticket."' ";
            if($mysqli->query($sql)===TRUE)
            {
               // include("correo.php");
                echo "Ticket modificado";
                echo "<script type='text/javascript'>
                        alert('estado modificado exitosamente');
                        window.location.href='mis-tickets.php';
                      </script>";
            }else{
                echo "El ticket no se modifico. Error: ".$sql."<br>".$mysqli->error;
            }
        }else{
            echo "Faltan datos de para modificar el ticket";
        }
    }
    $mysqli->close();
?>
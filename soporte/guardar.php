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
            
            $sql="INSERT INTO ticket (id_usuario, solicitante, licencia, celular, correo, zona, titular, ubicacion, ciudad, altura, tipo, descripcion, estado) VALUES ('$id_usuario', '$nombre', '$licencia', '$telefono', '$correo', '$id_zona', '$titular', '$coordenadas', '$localidad', '$altura', '$tipo', '$comentarios', '1')";
            if($mysqli->query($sql)===TRUE)
            {
               // include("correo.php");
                 echo "<script>
                alert('Servicio agregado al ticket.$id_ticket;');
                window.location= 'tickets_soporte.php'
                    </script>";
            }else{

                echo "<script type='text/javascript'>
    alert('El ticket no se genero. Error: '".$sql."'<br>'".$mysqli->error."');
    window.location.href='agregar_ticket.php';
</script>";
            }
        }else{
            echo "<script type='text/javascript'>
    alert('Faltan datos por llenar. ');
    window.location.href='agregar_ticket.php';
</script>";
        }
    }
    $mysqli->close();
?>
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
    //error_reporting(0);

    include("../conexion.php");
    if(isset($_POST["enviar"])){
        if(isset($_POST['cbx_servicio']) && !empty($_POST['cbx_servicio'])
            && isset ($_POST['txt_cantidad']) && !empty ($_POST['txt_cantidad']))
        {
            $id_trabajo=$_REQUEST['id'];
            $servicio=$_POST['cbx_servicio'];
            $file1=$_FILES['fileToUpload1']['name'];
            $file2=$_FILES['fileToUpload2']['name'];
            $cantidad=$_POST['txt_cantidad'];

            
            if($file1 == FALSE){
                $file1 = filter_input(INPUT_POST, 'file1', FILTER_SANITIZE_STRING);
            }else{
                include('upload_file_one.php');
            }

            if($file2 == FALSE){
                $file2 = filter_input(INPUT_POST, 'file2', FILTER_SANITIZE_STRING);
            }else{
                include('upload_file_two.php');
            }

            $sql="UPDATE trabajos SET id_servicio='".$servicio."', foto1='".$file1."', foto2='".$file2."', cantidad='".$cantidad."' WHERE id_trabajo = '".$id_trabajo."'";
            if($mysqli->query($sql)===TRUE){
                //include('upload.php');
                echo "<script type='text/javascript'>
                alert('servicio modificado exitosamente');
                window.location.href='reporte_fotografico_1.php';
                </script>";
            }else{
                echo "El servicio no se modifico. Error: ".$sql."<br>".$mysqli->error;
            }
        }else{
            $id_trabajo=$_REQUEST['id'];
            $servicio=$_POST['cbx_servicio'];
            $cantidad=$_POST['txt_cantidad'];

            $sql="UPDATE trabajos SET id_servicio='".$servicio."', cantidad='".$cantidad."' WHERE id_trabajo = '".$id_trabajo."'";
            if($mysqli->query($sql)===TRUE){
                echo "<script type='text/javascript'>
                alert('servicio modificado exitosamente');
                window.location.href='reporte_fotografico_1.php';
                </script>";
            }
        }
    }
    $mysqli->close();
?>
<script type="text/javascript">
    location.href="trabajos.php?id=<?php $id_trabajo; ?>"
</script>
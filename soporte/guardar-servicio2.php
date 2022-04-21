<?php
    include("../conexion.php");

    if(isset($_POST['enviar2']))
    {

            $id_ticket=$_POST['id_ticket'];
            $servicio=$_POST['cbx_servicio'];
            $file1=$_FILES['fileToUpload1']['name'];
            $file2=$_FILES['fileToUpload2']['name'];
            $cantidad=$_POST['txt_cantidad'];

            echo $file1;
            echo $file2;


        if(isset($_POST['id_ticket']) && !empty($_POST['id_ticket']) 
            && isset($_POST['cbx_servicio']) && !empty($_POST['cbx_servicio']) 
            && isset($_FILES['fileToUpload1']['name']) && !empty($_FILES['fileToUpload1']['name']) 
            && isset($_FILES['fileToUpload2']['name']) && !empty($_FILES['fileToUpload2']['name']) 
            && isset ($_POST['txt_cantidad']) && !empty ($_POST['txt_cantidad']))
        {
              $id_ticket=$_POST['id_ticket'];
            $servicio=$_POST['cbx_servicio'];
            $file1=$_FILES['fileToUpload1']['name'];
            $file2=$_FILES['fileToUpload2']['name'];
            $cantidad=$_POST['txt_cantidad'];
            $subtotal3= 0;
            $precio = 0;
            $consultaprecio = "SELECT precios FROM servicios where id = '$servicio'";
            $result = $mysqli->query($consultaprecio);
            if($result->num_rows>0){ 
                while($rowT = $result->fetch_assoc()){
                    $precio= $rowT['precios'];
                    $subtotal3 = $precio * $cantidad;
                }
            }
            $sql="INSERT INTO trabajos (id_ticket, id_servicio, foto1, foto2, cantidad, subtotal) VALUES ('$id_ticket', '$servicio', '$file1', '$file2', '$cantidad','$subtotal3')";
            if($mysqli->query($sql)===TRUE)
            {
                
                include('upload.php');
                include('includes/poststatus.php');
                echo "<script>
                alert('Servicio agregado al ticket.$id_ticket;');
                window.location.href='trabajos.php?id=$id_ticket'
                </script>";
                
            }else{
                echo "El Servicio no se genero. Error: ".$sql."<br>".$mysqli->error;
            }
        }else{
            echo "<script>
                alert('Error al guardar. ');
                 window.location.href='trabajos.php?id=$id_ticket'
                    </script>";
        }
        
    }
    $mysqli->close();
?>
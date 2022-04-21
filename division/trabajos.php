<?php
    session_start();
    $_SESSION['usuario'];

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
	require ('../conexion.php');
	$cont=0;

	$ID = $_REQUEST['id'];
	
	$query = "SELECT * FROM trabajos INNER JOIN servicios ON servicios.id = trabajos.id_servicio INNER JOIN ticket ON ticket.id_tickets = trabajos.id_ticket  WHERE id_ticket = '$ID'";
	$resultado=$mysqli->query($query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tickets</title>
	<link rel="stylesheet" href="../../css/bootstrap-panel.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="../../js/b99e675b6e-panel.js"></script>
	<script src="../../js/bootstrap-panel.min.js"></script>
	<script src="../../js/jquery-panel.min.js"></script>
	<script src="../../js/popper-panel.min.js"></script>
	<link rel="icon" href="../img/AS-Logo.jpg">
	<style type="text/css">
		.sp p:before{
			content: "\02716";
			color: lightsalmon;
		}
		.ate p:before{
			content: "\02691";
			color: lightsalmon;
		}
		.list p:before{
			content: "\02714";
			color: lightsalmon;
		}
		
		th {
			width: 10px;
		}
		td{
			width: 10px;
			align-content: center;
		}
	</style>
</head>
<body>
<div class="wrapper">
    <div class="main_content">
        <div class="info">
          <div>
              
              <div class="container">	
              <br>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th># Servicio</th>
        <th>Trabajo</th>
        <th>Estatus</th>
      </tr>
    </thead>
    <tbody>
     <?php
			if($resultado->num_rows>0){
                
                while($row = $resultado->fetch_assoc()){
                	$cont = $cont + 1;
                  $id_servicio=$row['id_servicio'];
                  $servicio=$row['servicio'];
                  $estatus=$row['estado'];

		  		  
    ?>

      <tr>
        <td><?php echo $cont ?></td>
        <td><?php echo $servicio ?></td>
        
        <?php
				if($estatus == 1){
					echo "<td style='color: yellow;' class='ate'><p>Pendiente </p></td>";
					}else{
						if($estatus == 2){
							echo "<td style='color: #0D0672;' class='ate'><p>En revision </p></td>";
						}else{
							if($estatus == 3){
								echo "<td style='color: green;' class='list'><p>Aprovada </p></td>";
							}else{
								if($estatus == 4){
									echo "<td style='color: red;' class='sp'><p>No aprovada </p></td>";
								}
							}
						}
					}
		?>
      </tr><?php }
            } ?>
    </tbody>
  </table>
</div>
      </div>
    </div>
</div>
    </div>
</body>
</html>
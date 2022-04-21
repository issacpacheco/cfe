<?php
	require ('conexion.php');
	
	$query = "SELECT * FROM ticket";
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
        <th>Folio</th>
        <th>Solcitante</th>
        <th>Zona</th>
        <th>Ubicacion</th>
        <th>Comentarios</th>
        <th>Estatus</th>
        <th>Reporte</th>
        <th>Lista de trabajos</th>
      </tr>
    </thead>
    <tbody>
     <?php
			if($resultado->num_rows>0){
                
                while($row = $resultado->fetch_assoc()){
                  $id_ticket=$row['id_tickets'];
                  $solicitante=$row['solicitante'];
                  $zona=$row['zona'];
		  		  			$comentarios=$row['descripcion'];
		  		  			$estatus=$row['estado'];

		  		  switch ($zona) {
		  		  	case '1':
		  		  		$lugar = 'Merida';
		  		  		$ubicacion = 'Merida';
		  		  		break;
		  		  	case '2':
		  		  		$lugar = 'Cancun';
		  		  		$ubicacion = 'Cancun';
		  		  		break;
		  		  	case '3':
		  		  		$lugar = 'Ticul';
		  		  		$ubicacion = 'Ticul';
		  		  		break;
		  		  	case '4':
		  		  		$lugar = 'Campeche';
		  		  		$ubicacion = 'Campeche';
		  		  		break;
		  		  	case '5':
		  		  		$lugar = 'Carmen';
		  		  		$ubicacion = 'Carmen';
		  		  		break;
		  		  	case '6':
		  		  		$lugar = 'Tizimin';
		  		  		$ubicacion = 'Tizimin';
		  		  		break;
		  		  	case '7':
		  		  		$lugar = 'Chetumal';
		  		  		$ubicacion = 'Chetumal';
		  		  		break;
		  		  	case '8':
		  		  		$lugar = 'Motul';
		  		  		$ubicacion = 'Motul';
		  		  		break;
		  		  	case '9':
		  		  		$lugar = 'Riviera Maya';
		  		  		$ubicacion = 'Riviera Maya';
		  		  		break;
		  		  }
    ?>

      <tr>
        <td><?php echo $id_ticket ?></td>
        <td><?php echo $solicitante ?></td>
        <td><?php echo $lugar ?></td>
        <td><?php echo $ubicacion ?></td>
        <td><?php echo $comentarios ?></td>
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
				<td><a  class="fa fa-file-pdf-o" href="reporte.php?id=<?php echo $id_ticket; ?>" style="color: red" target="_blank"></a></td>
				<td><a href="trabajos.php?id=<?php echo $id_ticket ?>">ver</a></td>
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
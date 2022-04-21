
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
    $id_ticket=$_REQUEST['id'];
    $query = "SELECT * FROM servicios";
    $resultado=$mysqli->query($query);
?>

<?php
	require ('../conexion.php');
	$cont=0;

	$ID = $_REQUEST['id'];
	
	$query = "SELECT * FROM trabajos INNER JOIN servicios ON servicios.id = trabajos.id_servicio INNER JOIN ticket ON ticket.id_tickets = trabajos.id_ticket  WHERE id_ticket = '$ID'";
	$resultado=$mysqli->query($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tickets Tecnico</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class=""></div>
                <div class="sidebar-brand-text mx-3"><sup>Tickets </sup></div>
            </a>
            <div class="text-center d-none d-md-inline"></div>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="reporte_fotografico_1.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Regresar</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                         <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['usuario'];?></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h6 class="border-bottom pb-2 mb-0">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#servicioform"> Agregar servicio</button> 
                        <button type="button" href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#reporte"> Finalizar servicio</button>
                    </h6>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Servicio</th>
                                            <th>Trabajo</th>
                                            <th>Cantidad</th>
                                            <th>Costo de servicio</th>
                                            <th>Subtotal</th>
                                            <th>Modificar</th>
                                            <th>Estatus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $total = 0;
                                            if($resultado->num_rows>0){
                                                
                                                while($row = $resultado->fetch_assoc()){
                                                    $cont          = $cont + 1;
                                                    $id_trabajo    = $row['id_trabajo'];
                                                    $id_servicio   = $row['id_servicio'];
                                                    $servicio      = $row['servicio'];
                                                    $cantidad      = $row['cantidad'];
                                                    $costo         = number_format($row['precios'],2,'.',',');
                                                    $subtotal      = number_format($row['subtotal'],2,'.',',');
                                                    $total         = $total + $row['subtotal'];
                                        ?>

                                        <tr>
                                            <td> <?php echo $id_servicio ?></td>
                                            <td> <?php echo $servicio ?></td>
                                            <td> <?php echo $cantidad ?></td>
                                            <td>$<?php echo $costo ?></td>
                                            <td>$<?php echo $subtotal ?></td>
                                            <td><a href="modificar_servicio.php?id=<?php echo $id_trabajo ?>"> <button type='button' class='btn btn-success'>Modificar servicio</button> </a></td>
                                            <?php
                                                if($estatus == 1){
                                                    echo "<td style='color: yellow;' class='ate'><p>Pendiente </p></td>";
                                                }else if($estatus == 2){
                                                    echo "<td style='color: #0D0672;' class='ate'><p>En revision </p></td>";
                                                }else if($estatus == 3){
                                                    echo "<td style='color: green;' class='list'><p>Aprovada </p></td>";
                                                }else if($estatus == 4){
                                                    echo "<td style='color: red;' class='sp'><p>No aprovada </p></td>";
                                                }else{
                                                    echo "<td style='color: red;' class='sp'><p> Sin estatus </p></td>";
                                                }
                                            ?>
                                        </tr><?php } } ?>
                                    </tbody>
                                    <tbody>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>Subtotal</td>
                                        <td>$<?php echo number_format($total,2,'.',','); ?></td>
                                        <td></td>
                                        <td></td>
                                    </tbody>
                                </table>
                                <div class="modal fade" id="servicioform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header btn-primary">
                                                <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo servicio</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                            </div>
                                            <!-- Empieza formulario -->
                                            <form class="user"  action="guardar-servicio2.php" method="POST" enctype="multipart/form-data">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="modal-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Ticket:</label>
                                                                    <input class="form-control form-control-user" type="" value="<?php echo $id_ticket ?>" name="id_ticket">
                                                                </div>
                                                                <div>
                                                                <?php
                                                                    require ('../conexion.php');
                                                                    $query = "SELECT * FROM servicios";
                                                                    $resultado=$mysqli->query($query);
                                                                ?>
                                                                    Seleccione servicio : 
                                                                    <select  class="form-control" name="cbx_servicio" id="cbx_servicio">
                                                                        <option value="0">Seleccionar Servicio</option>
                                                                        <?php while($row = $resultado->fetch_assoc()) { ?> 
                                                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['servicio']; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Foto:</label>
                                                                    <input class="form-control" type="file" accept="image/*" name="fileToUpload1" value="">
                                                                    <input class="form-control" type="file" accept="image/*" name="fileToUpload2" value="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Cantidad:</label>
                                                                    <input name="txt_cantidad" value="" class="form-control form-control-user">
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        <button name="enviar2" type="submit" class="btn btn-primary">Guardar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>ASV &copy; Sistemas de Comunicacion y vigilancia. </span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Estas seguro de cerrar sesion?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecciona "Salir" para cerrar sesion o cancelar para permanecer en la pagina.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="../logout.php">Salir</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="reporte" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content container-fluid">
                <div class="modal-header">
                    <h5 class="modal-title" id="reporte">Captura de subtotal y reporte final. </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>
                <form action="subir_reporte.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="idTicket" value="<?php echo $id_ticket; ?>">
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="">Seleccione el reporte</label>
                            <input name="userfile" type="file" class="form-control" accept="application/pdf, application/vnd.ms-Excel" value="" placeholder="subir reporte">
                        </div>
                        <div class="col-sm-12">
                            <label for="">Capture el subtotal</label>
                            <input type="text" name="subtotal" class="form-control esprecio">
                        </div>

                    </div>
                <div class="modal-footer">
                  <input type="submit" name="enviar3" value="Guardar">
                </div>
                    
                </form>
                
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>
<script>
    $(document).ready(function () {
        $("body, #board, #popup").on("keypress", ".esnumero", function(){
            elem = $(this);
            // capturamos la tecla pulsada
            var teclaPulsada = window.event ? window.event.keyCode : e.which;

            // capturamos el contenido del input
            var valor = $(elem).val();
            if (teclaPulsada > 31 && (teclaPulsada < 48 || teclaPulsada > 57)) {
                return false;
            }else{
                return true;
            }

            // devolvemos true o false dependiendo de si es numerico o no
            return /\d/.test(String.fromCharCode(teclaPulsada));        
        });
        $("body, #board, #popup").on("keypress", ".esprecio", function(){
            elem = $(this);
            // capturamos la tecla pulsada
            var teclaPulsada = window.event ? window.event.keyCode : e.which;

            // capturamos el contenido del input
            var valor = $(elem).val();

            // 45 = tecla simbolo menos (-)
            // Si el usuario pulsa la tecla menos, y no se ha pulsado anteriormente
            // Modificamos el contenido del mismo aÃ±adiendo el simbolo menos al
            // inicio
            if (teclaPulsada == 45 && valor.indexOf("-") == -1) {
                $(elem).val("-" + valor)
            }

            // 13 = tecla enter
            // 46 = tecla punto (.)
            // Si el usuario pulsa la tecla enter o el punto y no hay ningun otro
            // punto
            if (teclaPulsada == 13 || (teclaPulsada == 46 && valor.indexOf(".") == -1)) {
                return true;
            }

            // devolvemos true o false dependiendo de si es numerico o no
            return /\d/.test(String.fromCharCode(teclaPulsada));        
        });
    });
</script>

</html>

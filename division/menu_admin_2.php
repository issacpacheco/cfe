<?php
    session_start();
    $_SESSION['usuario'];

    if(!isset($_SESSION['rol'])){
        header('location: ../login.php');
    }else{
        if($_SESSION['rol'] == 1){
            header('location: ../login.php');
        }
    }
    include '../conexion.php';

    error_reporting(0);


    $totalzona="SELECT SUM(tr.subtotal) AS total, t.*, r.* FROM trabajos tr LEFT JOIN ticket t ON tr.id_ticket = t.id_tickets LEFT JOIN resp_zona r ON t.zona = r.ID_ZONA GROUP BY r.ID_ZONA";
    $resultzona = $mysqli->query($totalzona);
    //SELECT SUM(tr.subtotal) AS total, t.*, r.* FROM trabajos tr LEFT JOIN ticket t ON tr.id_ticket = t.id_tickets LEFT JOIN resp_zona r ON t.zona = r.ID_ZONA WHERE t.zona = 2;
?>


<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>CFE Tickets</title>

        <!-- Custom fonts for this template-->
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    </head>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"><sup>Menu administrador </sup></div>
                </a>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Addons
                </div>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Agregar</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="nuevo_ticket.php"> Ticket </a>
                        </div>
                    </div>
                </li>
                <!-- Nav Item - Tables -->
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        <ul class="navbar-nav ml-auto">
                            <div class="topbar-divider d-none d-sm-block"></div>
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['usuario'];?></span>
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- End of Topbar -->
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Bienvenida(o) <?php echo $_SESSION['usuario'];?> </h1>  
                        </div>
                        <!-- Content Row -->
                        <div class="row">
                            <div class="container-fluid">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary"></h6>
                                    </div> 
                                    <!-- Pending Requests Card Example -->
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table style="text-align: center;" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>ZONAS</th>
                                                        <th>PRESUPUESTO INICIAL</th>
                                                        <th>EJECUTADO</th>
                                                        <th>AMPLIACION</th>
                                                        <th>EJECUTADO</th>
                                                        <th>TOTAL PRESUPUESTO</th>
                                                        <th>TOTAL EJECUTADO</th>
                                                        <th>PENDIENTE</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        if($resultzona->num_rows>0){
                                                            while($rowT = $resultzona->fetch_assoc()){ 
                                                                $presupuesto2= $rowT['PRESUPUESTO2'];
                                                                $presupuesto= $rowT['PRESUPUESTO'];
                                                                $total= $rowT['total']; 
                                                                $ejecutado= 0;
                                                                $subtotalInicial = 0;
                                                                $subtotalAmpliacion = 0;
                                                                $porcentaje= $presupuesto - $total;
                                                                // $porcentaje = round(($total/$presupuesto)*100,1);
                                                                $ejecutado= $presupuesto2 - $presupuesto;
                                                                $qryAmpliacion ="SELECT SUM(subtotal_ticket) AS total FROM ticket WHERE zona = '".$rowT['zona']."'";
                                                                $resAmpliacion = $mysqli->query($qryAmpliacion);
                                                                while($a = $resAmpliacion->fetch_assoc()){
                                                                    $ampliacion = $a['total'];
                                                                }
                                                                $qryPresupIni = "SELECT id_tickets FROM ticket WHERE zona = '".$rowT['zona']."' AND fch_finalizado BETWEEN '2021-01-01' AND '2021-12-31'";
                                                                $resPresupIni = $mysqli->query($qryPresupIni);
                                                                while($b = $resPresupIni->fetch_assoc()){
                                                                    // $qrysumpresini = "SELECT trabajos.cantidad, servicios.precios FROM trabajos LEFT JOIN servicios ON servicios.id = trabajos.id_servicio LEFT JOIN ticket ON ticket.id_tickets = trabajos.id_ticket  WHERE trabajos.id_ticket = '".$b['id_tickets']."'";
                                                                    $qrysumpresini  = "SELECT SUM(subtotal) AS suma FROM trabajos WHERE id_ticket = '".$b['id_tickets']."'"; 
                                                                    $ressumpresini = $mysqli->query($qrysumpresini);
                                                                    
                                                                    while($c = $ressumpresini->fetch_assoc()){
                                                                        // $cantidad   = $c['cantidad'];
                                                                        // $precio     = $c['precios'];
                                                                        // $pt         = $cantidad * $precio;
                                                                        $pt                 = $c['suma'];
                                                                        $subtotalInicial    = $subtotalInicial + $pt;
                                                                    }

                                                                }
                                                                $qryPresupAmpliacion = "SELECT id_tickets FROM ticket WHERE zona = '".$rowT['zona']."' AND fch_finalizado BETWEEN '2022-01-01' AND CURDATE()";
                                                                $resPresupAmpliacion = $mysqli->query($qryPresupAmpliacion);
                                                                while($d = $resPresupAmpliacion->fetch_assoc()){
                                                                    $qrysumpresampliacion  = "SELECT SUM(subtotal) AS suma FROM trabajos WHERE id_ticket = '".$b['id_tickets']."'"; 
                                                                    $ressumpresampliacion = $mysqli->query($qrysumpresampliacion);
                                                                    
                                                                    while($e = $ressumpresampliacion->fetch_assoc()){
                                                                        // $cantidad   = $c['cantidad'];
                                                                        // $precio     = $c['precios'];
                                                                        // $pt         = $cantidad * $precio;
                                                                        $pt                     = $c['suma'];
                                                                        $subtotalAmpliacion     = $subtotalAmpliacion + $pt;
                                                                    }

                                                                }
                                                    ?>
                                                    <td><?php echo $rowT['ZONA'] ?></td>
                                                    <td>$ <?php echo number_format($subtotalInicial,2,'.',','); //A ?></td>
                                                    <td>$ <?php echo number_format($subtotalInicial,2,'.',','); //B ?></td>
                                                    <td>$ <?php echo number_format($subtotalAmpliacion,2,'.',','); //C ?></td>
                                                    <td>$ <?php echo number_format($subtotalAmpliacion,2,'.',','); //D ?></td>
                                                    <?php $totalpresupuesto = $subtotalInicial + $subtotalAmpliacion; ?>
                                                    <td>$ <?php echo number_format($totalpresupuesto,2,'.',',');  //E ?></td>
                                                    <?php $totalejecutado = $subtotalInicial + $subtotalAmpliacion; ?>
                                                    <td>$ <?php echo number_format($totalejecutado,2,'.',',');  //F ?></td>
                                                    <?php $pendiente = $totalpresupuesto - $totalejecutado; ?>
                                                    <td>$ <?php echo number_format($pendiente,2,'.',',');  //G ?></td>
                                                </tbody>
                                                <?php } } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-8 col-lg-7"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mb-4"></div>
                            <div class="col-lg-6 mb-4"></div>
                        </div>
                    </div>
                </div>
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>ASV &copy; Sistemas de Comunicacion y vigilancia. </span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</html>
<?php
    session_start();
    $usu=$_SESSION['usuario'];
    $_SESSION['rol'];
    if(!isset($_SESSION['rol'])){
        header('location: ../login.php');
    }else{
        if($_SESSION['rol'] != 1){
            header('location: ../login.php');
        }
    }
include '../conexion.php';

error_reporting(0);

//$totalzona="SELECT SUM(tr.subtotal) AS total, t.*, r.* FROM trabajos tr LEFT JOIN ticket t ON tr.id_ticket = t.id_tickets LEFT JOIN resp_zona r ON t.zona = r.ID_ZONA GROUP BY r.ID_ZONA";
  //          $resultzona = $mysqli->query($totalzona);
//SELECT SUM(tr.subtotal) AS total, t.*, r.* FROM trabajos tr LEFT JOIN ticket t ON tr.id_ticket = t.id_tickets LEFT JOIN resp_zona r ON t.zona = r.ID_ZONA WHERE t.zona = 2;
?>
<?php
    require ('../conexion.php');
      $CON="SELECT * FROM usuario WHERE '$usu' = usuario";
            $result = $mysqli->query($CON);
            if($result->num_rows>0){
                
                while($row = $result->fetch_assoc()){
                  $id_zona=$row['id_zona'];
                }
            }
        $query = "SELECT SUM(TR.cantidad*s.precios) AS total, s.*, t.*, r.* FROM trabajos tr LEFT JOIN ticket t ON tr.id_ticket = t.id_tickets LEFT JOIN servicios s ON s.id = tr.id_servicio LEFT JOIN resp_zona r ON t.zona = r.ID_ZONA WHERE r.ID_ZONA = '$id_zona' and t.id_tickets = t.id_tickets GROUP BY id_ticket";
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
    <title>Panel de administracion</title>
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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="menu_admin.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    
                </div>
                
                <div class="sidebar-brand-text mx-3"><sup>Menu administrador </sup></div>
            </a>
            <div class="text-center d-none d-md-inline">
            </div>
<li class="nav-item">
 
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
            
            

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="tickets_usuario.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Tickets</span></a>
            </li>

            <!-- Nav Item - Tables -->
           



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
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                               
                                
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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tickets de zonas</h1>
                    <p class="mb-4"> <a target="_blank"
                            href="https://datatables.net"></a></p>



                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">



                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div> 
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <tr>
        <th>Folio</th>
        <th>Solcitante</th>
        <th>Zona</th>
        
        <th>Comentarios</th>
        <th>Estatus</th>
        <th>Reporte</th>
        <th>Subtotal</th>
        <th>Modificar</th>
        <th>Reporte Final</th>

      </tr>
    </thead>
    <tbody>
     <?php
            if($resultado->num_rows>0){
                
                while($row = $resultado->fetch_assoc()){

                    $total =$row['total'];
                  $id_ticket=$row['id_tickets'];
                  $solicitante=$row['solicitante'];
                  $zona=$row['zona'];
                            $comentarios=$row['descripcion'];
                            $estatus=$row['estado'];
                            $pdf = $row['PDFReport'];

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
                                }else if($estatus == 5){
                                    echo "<td style='color: black;' class='sp'><p>Finalizado </p></td>";
                                }
                            }
                        }
                    }
        ?>
                <td><a  class="fa fa-file-pdf-o" href="../soporte/reporte_fotos.php?id=<?php echo $id_ticket ?>" style="color: red" target="_blank"></a></td>
                 <td>
                    $ <?php echo number_format($total,2);  ?>

                     </td>

                <td><a href="lista_modificar.php?id=<?php echo $id_ticket ?>"> <button type='button' class='btn btn-success'>Modificar estatus</button> </a> </td>

 <td><?php if($estatus == 5){ ?><a  class="fa fa-file-pdf" href="../soporte/pdf/<?php echo $pdf; ?>" style="color: red" target="_blank"></a><?php }else{} ?></td>
                   




     <!--    <td><a href="#" data-toggle="modal" data-target="#EliminarModal"> <button type='button' class='btn btn-danger'>Eliminar</button> </a> </td>
                    <a href="lista_modificar.php?id=<?php echo $id_ticket ?>">Revisar estado del ticket</a></td>

                    
                     Modal Eliminar
    <div class="modal fade" id="EliminarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro de elimiar el ticket?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecciona "Si" para eliminar el ticket o selecciona "No" para cancelar la acción</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                    <a class="btn btn-primary" href="eliminar-ticket.php?id=<?php echo $id_ticket ?>">Si</a>
                </div>
            </div>
        </div>
    </div> -->


      </tr><?php }
            } ?>
    </tbody>
  </table>
</div>
      </div>
    </div>
</div>
    </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
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
   
    <!-- Bootstrap core JavaScript-->
  
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
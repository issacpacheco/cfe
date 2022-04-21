<?php
    session_start();
    $_SESSION['usuario'];

    if(!isset($_SESSION['rol'])){
        header('location: ../login.php');
    }else{
        if($_SESSION['rol'] != 1 && $_SESSION['rol'] != 4){
            header('location: ../login.php');
        }
    }
include '../conexion.php';

error_reporting(0);
?>


<?php
    require ('../conexion.php');
    
    $query = "SELECT ID, ZONA FROM resp_zona";
    $resultado=$mysqli->query($query);
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


    <script language="javascript" src="js/jquery-3.1.1.min.js"></script>
        <script language="javascript">
            $(document).ready(function(){
                $("#cbx_zona").change(function () {

                    //$('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
                    
                    $("#cbx_zona option:selected").each(function () {
                        id_zona = $(this).val();
                        $.post("includes/getTitular.php", { id_zona: id_zona }, function(data){
                            $("#cbx_titular").html(data);
                        });            
                    });
                })
            });
            
            $(document).ready(function(){
                $("#cbx_zona").change(function () {
                    $("#cbx_zona option:selected").each(function () {
                        id_ubicacion = $(this).val();
                        $.post("includes/getSitio.php", { id_ubicacion: id_ubicacion }, function(data){
                            $("#cbx_localidad").html(data);
                        });            
                    });
                })
            });
            $(document).ready(function(){
                $("#cbx_localidad").change(function () {
                    $("#cbx_localidad option:selected").each(function () {
                        id_datos = $(this).val();
                        $.post("includes/getUbicacion.php", { id_datos: id_datos }, function(data){
                            $("#txt_ubicacion").html(data);
                        });            
                    });
                })
            });
        </script>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    
   <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="menu_admin.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    
                </div>
                <div class="sidebar-brand-text mx-3"><sup>Menu administrador </sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

 
            

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

            


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>





        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['usuario'];?>
                                
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Nuevo ticket </h1>
                                    </div>
                    <div>

    <form class="user" id="combo" name="combo" action="guardar.php" method="POST">
                        <div class="form-group">
                                <a> Solicitante: </a>
                                <input name="txt_solicitante" class="form-control form-control-user">
                        </div>
                        <div class="form-group">
                                <a> Referencia: </a>
                                <input name="txt_licencia" class="form-control form-control-user">
                        </div>
                        <div class="form-group">
                                <a> Telefono: </a>
                                <input name="txt_cel" class="form-control form-control-user">
                        </div>
                        <div class="form-group">
                                <a> Correo: </a>
                                <input  name="txt_correo" class="form-control form-control-user" type="email">
                        </div>
                                <a> Zona: </a>
                                <select class="form-control" aria-label="Default select example" name="cbx_zona" id="cbx_zona">
                                <option value="0"></option>
                                <?php while($row = $resultado->fetch_assoc()) { ?>
                                <option value="<?php echo $row['ID']; ?>"><?php echo $row['ZONA']; ?></option>
                                <?php } ?>
                            </select>
                        <div class="">
                        <div>Titular: <select class="form-control" aria-label="Default select example" name="cbx_titular" id="cbx_titular"></select>
                        </div>
                        </div>
                        <div class="form-group">
                                <a> Ubicacion: </a>
                                <select name="cbx_localidad" id="cbx_localidad" class="form-control" aria-label="Default select example">
                                </select>
                                <div name="txt_ubicacion" id="txt_ubicacion"></div>
                        </div>
                         <input class="btn btn-primary btn-user" type="submit" id="enviar" name="enviar" value="Guardar" />
        </form>
        
                    </div>
                    <div class="row">
                        <div class="col-xl-8 col-lg-7">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                        </div>
                        <div class="col-lg-6 mb-4">
                        </div>
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
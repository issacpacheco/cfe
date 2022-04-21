<?php
    include 'conexion.php';

    session_start();
    
    if(isset($_GET['cerrar_sesion'])){
        session_unset();
        
        session_destroy();
    }
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
                case 1:
                    header('location: admin/menu_admin.php');
                break;
                
                case 2:
                    header('location: usuario/menu_usuario.php');
                break;
                    
                case 3:
                    header('location: soporte/menu_soporte.php');
                break;
                case 4:
                    header('location: division/menu_admin.php');
                break;
                
            default:
        }
    }

    if(isset($_POST['usuario']) && isset($_POST['password'])){
        $username = $_POST['usuario'];
        $password = $_POST['password'];
 
        $sql = "SELECT * FROM usuario WHERE usuario = '$username' AND password = '$password'";

        $result = $mysqli->query($sql);
        
        $row = $result->fetch_array(PDO::FETCH_NUM);
        if($row == true){
            //validar rol
            $rol = $row[3];
            $_SESSION['rol'] = $rol;
            $_SESSION['loggedin'] = true;
            $_SESSION['usuario'] = $username;
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (360 * 60);
            
            switch($_SESSION['rol']){
                case 1:
                    header('location: admin/menu_admin.php');
                break;
                
                case 2:
                    header('location: usuario/menu_usuario.php');
                break;
                    
                case 3:
                    header('location: soporte/menu_soporte.php');
                break;
                case 4:
                    header('location: division/menu_admin.php');
                break;
                
            default:
            }
        }else{
             echo "<script>
                alert('Usuario o contraseña son incorrectos');
                window.location= 'login.php'
                    </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inicio de sesion</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body ">
                        <!-- Nested Row within Card Body -->
                        <div>
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="">
                                <div class="p-5">
                                    <div class="text-center">
                                          <img src="img/captura2.png" style="width: 80%; height: 80%; text-align: center; ">
                                    <br/>    
                                    </div>
                                    <form class="user" action="#" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Ingresa usuario..." name="usuario">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Contraseña..." name="password">
                                        </div>
                                        <div class="form-group">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit" value="Iniciar Sesion">Iniciar Sesion</button>
                                     
                                        
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="../menu/index2.php">Regresar al menu principal</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
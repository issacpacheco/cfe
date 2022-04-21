<?php
    
    session_start();
    $usu=$_SESSION['usuario'];
   

    if(!isset($_SESSION['rol'])){
        header('location: ../Index.php');
    }else{
        if($_SESSION['rol'] != 4){
            header('location: ../Index.php');
        }
    }
$now = time();

if($now > $_SESSION['expire']) {
session_destroy();

echo "Su sesion a terminado,
<a href='../Index.php'>Necesita Hacer Login</a>";
exit;
}
?>
<!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Menu Principal</title>
                                <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
                                <style>body {
    padding: 0 20px;
    height: 100vh;
    background: rgb(98, 9, 121);
    background: linear-gradient(56deg, rgba(98, 9, 121, 1) 0%, rgba(0, 255, 246, 1) 100%);
    background-size: cover;
    background-repeat: none;
    margin: 0 auto;
    display: grid;
    place-items: center
}

.container {
    margin-top: 40px
}

.section-title {
    margin-bottom: 38px
}

.shadow,
.subscription-wrapper {
    box-shadow: 0px 15px 39px 0px rgba(8, 18, 109, 0.1) !important
}

.icon-primary {
    color: #062caf
}

.icon-bg-circle {
    position: relative
}

.icon-lg {
    font-size: 50px
}

.icon-bg-circle::before {
    z-index: 1;
    position: relative
}

.icon-bg-primary::after {
    background: #062caf !important
}

.icon-bg-circle::after {
    content: '';
    position: absolute;
    width: 68px;
    height: 68px;
    top: -35px;
    left: 15px;
    border-radius: 50%;
    background: inherit;
    opacity: .1
}

p,
.paragraph {
    font-weight: 400;
    color: #8b8e93;
    font-size: 15px;
    line-height: 1.6;
    font-family: "Open Sans", sans-serif
}

.icon-bg-yellow::after {
    background: #f6a622 !important
}

.icon-bg-purple::after {
    background: #7952f5
}

.icon-yellow {
    color: #f6a622
}

.icon-purple {
    color: #7952f5
}

.icon-cyan {
    color: #02d0a1
}

.icon-bg-cyan::after {
    background: #02d0a1
}

.icon-bg-red::after {
    background: #ff4949
}

.icon-red {
    color: #ff4949
}

.icon-bg-green::after {
    background: #66cc33
}

.icon-green {
    color: #66cc33
}

.icon-bg-orange::after {
    background: #ff7c17
}

.icon-orange {
    color: #ff7c17
}

.icon-bg-blue::after {
    background: #3682ff
}

.icon-blue {
    color: #3682ff
}</style>
                                <script type='text/javascript' src=''></script>
                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
                                <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
                            </head>
                            <body oncontextmenu='return false' class='snippet-body'>
                            <div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="section-title">Servicios</h2>
        </div>
        <div class="col-lg-3 col-sm-6 mb-4">
            <div class="card border-0 shadow rounded-xs pt-5">
                <div class="card-body"> <i class="fa fa-object-ungroup icon-lg icon-primary icon-bg-primary icon-bg-circle mb-3"></i>
                    <h4 class="mt-4 mb-3">Eventos</h4>
                    <a href="../Eventos/eventos.php"><input type="submit" name="" value="Ir al formulario"></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-4">
            <div class="card border-0 shadow rounded-xs pt-5">
                <div class="card-body"> <i class="fa fa-users icon-lg icon-yellow icon-bg-yellow icon-bg-circle mb-3"></i>
                    <h4 class="mt-4 mb-3">Metas semanales</h4>
                    <a href="metas-semanales.php"><input type="submit" name="" value="Ir al formulario"></a>
                </div>
            </div>
        </div>
        <!---<div class="col-lg-3 col-sm-6 mb-4">
            <div class="card border-0 shadow rounded-xs pt-5">
                <div class="card-body"> <i class="fa fa-desktop icon-lg icon-purple icon-bg-purple icon-bg-circle mb-3"></i>
                    <h4 class="mt-4 mb-3">Fusion</h4>
                    <a href="fusion.php"><input type="submit" name="" value="Ir al formulario"></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-4">
            <div class="card border-0 shadow rounded-xs pt-5">
                <div class="card-body"> <i class="fa fa-search-plus icon-lg icon-green icon-bg-green icon-bg-circle mb-3"></i>
                    <h4 class="mt-4 mb-3">Cargar fotos PMT</h4>
                    <a href="../carga/cargafotos.php"><input type="submit" name="" value="Cargar fotos"></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-4">
            <div class="card border-0 shadow rounded-xs pt-5">
                <div class="card-body"> <i class="fa fa-users icon-lg icon-yellow icon-bg-yellow icon-bg-circle mb-3"></i>
                    <h4 class="mt-4 mb-3">Construcción</h4>
                    <a href="construccion-pruebas.php"><input type="submit" name="" value="Ir al formulario"></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-4">
            <div class="card border-0 shadow rounded-xs pt-5">
                <div class="card-body"> <i class="fa fa-desktop icon-lg icon-purple icon-bg-purple icon-bg-circle mb-3"></i>
                    <h4 class="mt-4 mb-3">Fusion</h4>
                    <a href="fusion-prueba.php"><input type="submit" name="" value="Ir al formulario"></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-4">
            <div class="card border-0 shadow rounded-xs pt-5">
                <div class="card-body"> <i class="fa fa-user icon-lg icon-orange icon-bg-orange icon-bg-circle mb-3"></i>
                    <h4 class="mt-4 mb-3">Cerrar sesion</h4>
                    <a href="logout.php"><input type="submit" name="" value="Cerrar Sesion"></a>
                </div>
            </div>
        </div>
        <!---<div class="col-lg-3 col-sm-6 mb-4">
            <div class="card border-0 shadow rounded-xs pt-5">
                <div class="card-body"> <i class="fa fa-search-plus icon-lg icon-green icon-bg-green icon-bg-circle mb-3"></i>
                    <h4 class="mt-4 mb-3">SEO Optimization</h4>
                    <p>For what reason would it be advisable for me to think about business content?</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-4">
            <div class="card border-0 shadow rounded-xs pt-5">
                <div class="card-body"> <i class="fa fa-user icon-lg icon-orange icon-bg-orange icon-bg-circle mb-3"></i>
                    <h4 class="mt-4 mb-3">Usability Testing</h4>
                    <p>For what reason would it be advisable for me to think about business content?</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-4">
            <div class="card border-0 shadow rounded-xs pt-5">
                <div class="card-body"> <i class="fa fa-envelope icon-lg icon-blue icon-bg-blue icon-bg-circle mb-3"></i>
                    <h4 class="mt-4 mb-3">UX Prototyping</h4>
                    <p>For what reason would it be advisable for me to think about business content?</p>
                </div>
            </div>
        </div>---->
    </div>
</div>
                            <script type='text/javascript'></script>
                            </body>
                        </html>
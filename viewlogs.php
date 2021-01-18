<?php 
include("global.php");
include("kernel/verifica_login.php");
include("kernel/get_patente.php");
$usuarioNome = $_SESSION["usuario"];
$getuserperm = mysqli_query($conn, "SELECT * FROM painel WHERE usr_habbo = '{$usuarioNome}' AND usr_perm >= 1");
$perm = mysqli_num_rows($getuserperm);
if($perm == 0) {
    $usu_ip = $_SERVER['REMOTE_ADDR'];
    $insert_log = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip) VALUES('{$usuarioNome}', 'Tentou acessar uma página proibida com IP: ', '{$usu_ip}')");
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <link rel="shortcut icon" href="<?php echo $imagem_site ?>" />

    <!-- Title Page-->
    <title><?php echo $titulo_site ?> - Ver Logs</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    
</head>

<body class="animsition">
    <div class="page-wrapper">

        <?php include("includes/sidebar.php");?>

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <?php include("includes/header.php"); ?>
            
            <!-- END HEADER DESKTOP-->

            <!-- BREADCRUMB-->
            <section class="au-breadcrumb m-t-75">
               
            </section>
            <!-- END BREADCRUMB-->

            <!-- STATISTIC-->
            <section class="statistic">
               
            </section>
            <!-- END STATISTIC-->
<!-- Começo sistema de formulários -->
            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="recent-report2">
                                    <h3 class="title-3">Ver logs</h3>
                                    
                                   
                                    <table id="tableLogs" class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>#ID</th>
                                                <th>Usuário</th>
                                                <th>Log</th>
                                                <th>Tipo</th>
                                                <th>IP</th>
                                                <th>Data</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $sql_get_logs = mysqli_query($conn, "SELECT * FROM logs ORDER BY id DESC");
                                        while($rgl = mysqli_fetch_array($sql_get_logs)) {

                                        
                                        ?>
                                            <tr>
                                                <td><?php echo $rgl["id"] ?></td>
                                                <td style="font-weight: bold;"><?php echo $rgl["usr_habbo"] ?></td>
                                                <td style="font-weight: bold;"><?php echo $rgl["msg"] ?></td>
                                                <td><?php switch($rgl['log_tipo']) {
                                                    case 0:
                                                        $textolog = 'Comum - sistema';
                                                    break;
                                                    case 1:
                                                        $textolog = 'Comum - ação';
                                                    break;
                                                    case 2:
                                                        $textolog = '<span style="color: darkred;">Crítico - ação</span>';
                                                    break;
                                                    default:
                                                    $textolog = 'Erro - contate o Dev.';
                                                break;
                                                } echo $textolog; ?></td>
                                                <td><?php echo $rgl["usr_ip"] ?></td>
                                                <td><?php echo date('d/m/Y H:i:s',strtotime($rgl["data"])) ?></td>
                                            </tr>
                                         <?php } ?>
                                        </tbody>
                                    </table>
                                   
                                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                  
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                                   


                                

                                    

                                    
                                </div>
                                
                            </div>
                           

                           

                            
                        </div>
                    </div>
                </div>
            </section>
<!-- Fim sistema de formulários -->
           <?php include("includes/footer.php"); ?>
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>
    <script src="vendor/vector-map/jquery.vmap.js"></script>
    <script src="vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
    $('#tableLogs').DataTable();
} );
        </script>
</body>

</html>
<!-- end document-->

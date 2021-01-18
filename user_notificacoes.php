<?php 
include("global.php");
include("kernel/verifica_login.php");

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
    <title><?php echo $titulo_site ?> - Notificações</title>

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
    <style>
.ttype-user {
  position: relative;
  display: inline-block;
}

.ttype-user .ttype-user-text {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.ttype-user:hover .ttype-user-text {
  visibility: visible;
}
</style>
</head>

<body class="animsition">
    <div class="page-wrapper">

        <?php include("includes/sidebar.php");?>

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <?php include("includes/header.php"); ?>
            
            <!-- END HEADER DESKTOP-->

           <?php include("includes/breadcrumb.php"); ?>

            <!-- STATISTIC-->
            <section class="statistic">
               
            </section>
            <!-- END STATISTIC-->
            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- RECENT REPORT 2-->
                                <div class="recent-report2">
                                <?php  $query_not = "SELECT * FROM notificacoes WHERE user = '{$usuarioNome}' ORDER BY id DESC";
                                    $res_not = $conn->query($query_not);
                                    $total_not = $res_not->num_rows;?>
                                    <h3 class="title-3">Suas notificações</h3><br>
                                    <h5>Você possui <?php echo $total_not ?> notificações ao todo</h5>
                                    <?php 
                                   
                                        $sql_not = mysqli_query($conn, $query_not);
                                        while($r_n = mysqli_fetch_array($sql_not)) {
                                            $data = date("d/m/Y", strtotime($r_n["data"]));
                                            $hora = date("H:i:s", strtotime($r_n["data"]));
                                            switch($r_n['noti_type']) {
                                            case 1:
                                                $bgc = "green";
                                            break;
                                            case 2:
                                                $bgc = "yellow";
                                            break;
                                            case 3:
                                                $bgc = "red";
                                            break;
                                            }
                                            echo ' <div class="notifi__item">
                                            <div style="background-color:'.$bgc.';"class="bg-c1 img-cir img-40">
                                                <img src="https://www.habbo.com.br/habbo-imaging/avatarimage?user='.$r_n["enviado_por"].'&action=std&direction=2&head_direction=2&size=l&headonly=1">
                                            </div>
                                            <div class="content">
                                                <p>'.$r_n['msg'].'</p>
                                                <span class="date" style="font-weight: bold;">'.$data.' às '.$hora.' por: '.$r_n['enviado_por'].'&nbsp;&nbsp;</span>
                                            </div>
                                        </div>';
                                        }
                                        ?>
                                </div>
                                <!-- END RECENT REPORT 2             -->
                            </div>
                          

                            
                        </div>
                    </div>
                </div>
            </section>

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

</body>

</html>
<!-- end document-->

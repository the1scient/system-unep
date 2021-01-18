<?php 
include("global.php");
include("kernel/verifica_login.php");
$usr = $_SESSION["usuario"];

$usuarioNome = $_SESSION["usuario"];

$sql_get_ptt = mysqli_query($conn, "SELECT * FROM membros WHERE usr_habbo = '{$usuarioNome}'");
$fetch_get_ptt = mysqli_fetch_array($sql_get_ptt);
$get_ptt = $fetch_get_ptt["usr_patente"];
$getuptt = mysqli_query($conn, "SELECT * FROM patentes WHERE id = '{$get_ptt}'");
$fetchuptt = mysqli_fetch_array($getuptt);
$self_perm_promover = $fetchuptt["perm_promover"];
$self_perm_rebaixar = $fetchuptt["perm_rebaixar"];



$getmembro = mysqli_query($conn, "SELECT * FROM membros WHERE usr_habbo = '{$usr}'");
$rmembro = mysqli_fetch_array($getmembro);
$count_exist_member = mysqli_num_rows($getmembro);
if($count_exist_member <= 0)
{
    echo "<script type='text/javascript'>alert('Este usuário não existe em nosso banco de dados.');window.location.href='painel.php';</script>";
}
    $usr_nome = $rmembro["usr_habbo"];
    $usr_promo = $rmembro["usr_promo"];
    $usr_resp = $rmembro["usr_responsavel"];
    $patente_id = $rmembro["usr_patente"];
    $usr_exec = $rmembro["usr_executivo"];
    $usr_status = $rmembro["usr_status"];

    $select_u_p = mysqli_query($conn, "SELECT * FROM patentes WHERE id = '{$patente_id}'");
    $r_u_p = mysqli_fetch_array($select_u_p);
    if($usr_exec == 1) {
        $usr_patente = $r_u_p["patente_executivo"];
    }
    else {
        $usr_patente = $r_u_p["patente"];
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
    <title>Perfil de <?php echo $usr_nome ?> - <?php echo $titulo_site ?></title>

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
.promocao:hover {
    background-color: darkgreen;
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
                                    <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fa fa-user"></i>
                                        <strong class="card-title pl-2">Perfil de <?php echo $usr_nome ?></strong>
                                    </div>
                                    <div class="card-body" style="background-color: black;">
<div style="float: left; position: absolute;">
<img src="https://www.habbo.com.br/habbo-imaging/avatarimage?user=<?php echo $usr_nome ?>&action=std&direction=0&head_direction=0&gesture=std&size=b" />
<img src="https://www.habbo.com.br/habbo-imaging/avatarimage?user=<?php echo $usr_nome ?>&action=std&direction=3&head_direction=3&gesture=std&size=b" />
<img src="https://www.habbo.com.br/habbo-imaging/avatarimage?user=<?php echo $usr_nome ?>&action=std&direction=4&head_direction=3&gesture=std&size=b" />

</div>


                                        <div class="mx-auto d-block">
                                            <img class="rounded-circle mx-auto d-block" style="border: 1px solid black; " src="https://www.habbo.com.br/habbo-imaging/avatarimage?user=<?php echo $usr_nome ?>&action=std&direction=3&head_direction=3&gesture=std&size=l&headonly=1" alt="Card image cap"> <img style="box-shadow: 1px 3px 10px white; right: 15px; top: 20%; position: absolute; width: 10%;" src="https://i.imgur.com/oMED9fq.png">
                                            <h5 class="text-sm-center mt-2 mb-1" style="color: white;"><?php echo $usr_nome ?></h5>
                                            <div class="location text-sm-center" style="color: white;">
                                            <i class="fa fa-briefcase"></i> <?php echo $usr_patente ?></div>
                           
                                        </div>
                                        <hr>
                                        <div class="card-text text-sm-center">
                                            <a href="#" style="color: white;">
                                                <i class="fa fa-arrow-up"></i> <?php echo date('d/m/Y', strtotime($usr_promo));?>&nbsp;
                                            </a>
                                            <a href="#" style="color: white;">
                                                <i class="fa fa-user"></i> <?php echo $usr_resp ?>&nbsp;
                                            </a>
                                            <a href="#" style="color: white;">
                                                <i class="fa fa-paperclip"></i> <?php $select_relatorios = mysqli_query($conn, "SELECT * FROM relatorios WHERE usr_habbo = '{$usr_nome}'");
                                                  $count_rel = mysqli_num_rows($select_relatorios);
                                                  
                                                  $select_new_rel = mysqli_query($conn, "SELECT * FROM new_relatorios WHERE nickname = '{$usr_nome}'");
                                                  $count_new_rel = mysqli_num_rows($select_new_rel);

                                                  echo $count_new_rel + $count_rel;
                                                  ?> relatórios enviados.
                                            </a>
                                            <a href="#" style="color: white;">
                                                <i class="fa fa-pinterest pr-1"></i>
                                            </a>
                                           
                                            <br>
                                            


                                        </div>
                                    </div>
                                </div>
                            </div>
                            Últimas 50 ações: 
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


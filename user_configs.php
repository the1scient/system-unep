<?php 
include("global.php");
include("kernel/verifica_login.php");
$usuarioNome = $_SESSION["usuario"];

if(isset($_POST["alterar_senha"])) {
  $raw_senha_atual = htmlspecialchars($_POST["senha_atual"]);
  $raw_senha_nova = htmlspecialchars($_POST["senha_nova"]);

  $senha_atual = md5($raw_senha_atual);
  $senha_nova = md5($raw_senha_nova);

  # Comparação de senhas
$sql_select_user_senha = mysqli_query($conn, "SELECT * FROM painel WHERE usr_habbo = '{$usuarioNome}' AND usr_senha = '{$senha_atual}'");
$count_select_user_senha = mysqli_num_rows($sql_select_user_senha);

if($count_select_user_senha <= 0) {
    echo '<script type="text/javascript">alert("Senha atual errada! \n Log guardado.");window.location.href="";</script>';
}
else {
$update_u_senha = mysqli_query($conn, "UPDATE painel SET usr_senha = '{$senha_nova}' WHERE usr_habbo = '{$usuarioNome}'");
    echo '<script type="text/javascript">alert("Senha alterada! \n Faça login novamente.");window.location.href="logout.php";</script>';

}


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
    <title><?php echo $titulo_site ?> - Painel</title>

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
                                    <h3 class="title-3"></h3>
                                    
                                   
                                        <div class="card">
                                    <div class="card-header">
                                       <strong>Mudar</strong> Senha
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="form-horizontal">
                                           
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="data_inicio" class=" form-control-label">Senha atual</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="hf-password" name="senha_atual" placeholder="Digite sua senha atual" class="form-control">
                                                    
                                                </div>
                                                </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="data_inicio" class=" form-control-label">Senha nova</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="hf-password" name="senha_nova" placeholder="Digite sua senha nova" class="form-control">
                                                    
                                                </div></div>
                                           
                                            <div class="card-footer">
                                        <button type="submit" name="alterar_senha" class="btn btn-primary btn-sm">
                                            <i class="fa fa-check"></i> Alterar senha
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Resetar
                                        </button>
                                    </div>
                                        </form>
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

</body>

</html>
<!-- end document-->

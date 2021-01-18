<?php 
include("global.php");
include("kernel/verifica_login.php");


$relatorio_id = $_GET["relatorio_id"];

if(isset($_POST['atualizar_relatorio'])) {
$usr_habbo = $_POST['usr_habbo'];
$recrutas = $_POST['recrutas'];
$observacoes = $_POST['observacoes'];
$tipo = $_POST['tipo'];
$sqlupdaterelatorio = mysqli_query($conn, "UPDATE relatorios SET usr_habbo = '{$usr_habbo}', recrutas = '{$recrutas}', observacoes = '{$observacoes}', tipo = '{$tipo}' WHERE id = '{$relatorio_id}'");
echo '<script type="text/javascript">alert("Relatório atualizado com sucesso!");window.href.location="redirect_painel.php";</script>';
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

    <script src='https://cdn.tiny.cloud/1/mo4jrwwx09rnl6hezud8upgf2wy4yi2c3mlrx8zv9i385eew/tinymce/5/tinymce.min.js' referrerpolicy="origin">
  </script>
  <script>
    tinymce.init({
      selector: '#mytextarea'
    });
  </script>

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
               

 
 
            <?php 
                                    $sql_select_relatorio = mysqli_query($conn, "SELECT * FROM relatorios WHERE id = '{$relatorio_id}'");
                                      $count_select_relatorio = mysqli_num_rows($sql_select_relatorio);
                                      if($count_select_relatorio <= 0) {
                                        echo "<script type='text/javascript'>alert('Este relatório não existe!');window.location.href='painel.php';</script>";
                                      }

                                      while($res_fetch = mysqli_fetch_array($sql_select_relatorio)) {

                                      

                                   ?>
                                        <div class="card">
                                    <div class="card-header">
                                        <strong>Editar</strong> Relatório
                                       <br> <small>Obs: lembre-se de preencher corretamente os campos.</small>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="usuarios" class=" form-control-label">Quem enviou: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="usuarios" name="usr_habbo" value="<?php echo $res_fetch["usr_habbo"] ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="usuarios" class=" form-control-label">Aprovados: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="usuarios" name="recrutas" value="<?php echo $res_fetch["recrutas"] ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="data_inicio" class=" form-control-label">Observações</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                <textarea name="observacoes" id="textarea-input" rows="2" value="<?php echo $res_fetch["observacoes"] ?>" class="form-control"><?php echo $res_fetch["observacoes"] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="usuarios" class=" form-control-label">Tipo: </label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                          <select name="tipo" id="">
                                         <option value="0" <?php echo $res_fetch['tipo'] == 0 ? 'selected' : '' ?>>TS</option>
                                         <option value="1" <?php echo $res_fetch['tipo'] == 1 ? 'selected' : '' ?>>T1</option>
                                         <option value="2" <?php echo $res_fetch['tipo'] == 2 ? 'selected' : '' ?>>T2</option>
                                         <option value="3" <?php echo $res_fetch['tipo'] == 3 ? 'selected' : '' ?>>T3</option>
                                         <option value="4" <?php echo $res_fetch['tipo'] == 4 ? 'selected' : '' ?>>TE</option>
                                         <option value="5" <?php echo $res_fetch['tipo'] == 5 ? 'selected' : '' ?>>TF</option>
                                         <option value="6" <?php echo $res_fetch['tipo'] == 6 ? 'selected' : '' ?>>CFO</option>
                                          </select>
                                              </div>
                                            </div>


                                            <div class="card-footer">
                                        <button type="submit" name="atualizar_relatorio" class="btn btn-primary btn-sm">
                                            <i class="fa fa-check"></i> Editar
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Resetar
                                        </button>
                                    </div>
                                        </form>
                                    </div>
                                   
                                </div>
                                    <?php } ?>




            </section>
            <!-- END STATISTIC-->

            

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

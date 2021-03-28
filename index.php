<?php 
	include("app/global.php");
	if(isset($_SESSION["usuario"])) {
		header('Location: painel.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags-->
	<meta charset="UTF-8">
	<link rel="icon" href="https://www.habbo.com.br/habbo-imaging/badge/b09114s02010s11017s55011t2711481455e142351964ef03b8868295e5ec5.gif" type="image/x-icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="au theme template">
	<meta name="author" content="Hau Nguyen">
	<meta name="keywords" content="au theme template">
	<!-- Title Page-->
	<title><?php echo $titulo_site ?> - Login</title>
	<!-- Fontfaces CSS-->
	<link href="assets/css/font-face.css" rel="stylesheet" media="all">
	<link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
	<link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
	<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
   <link rel="icon" href="https://www.habbo.com.br/habbo-imaging/badge/b09114s02010s11017s55011t2711481455e142351964ef03b8868295e5ec5.gif" type="image/gif" sizes="16x16">
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
	<!-- Main CSS-->
	<link href="assets/css/theme.css" rel="stylesheet" media="all">
</head>
<body class="animsition" >
	<div class="page-wrapper" >
		<div class="page-content--bge5">
		<div class="row">
			<div class="col-md-6">
				<div class="login-wrap">
					<div class="login-content">
						<div class="login-logo">
							<a href="#">
								<h3>Login <img src="<?php echo $imagem_site ?>" /></h3> 
							</a>
						</div>
						<div class="login-form">
							<form action="kernel/login.php" method="post">
								<div class="form-group">
									<label>Usuário</label>
									<input class="au-input au-input--full" type="text" name="usuario" placeholder="Digite seu usuário. Exemplo: theGuiihBR">
								</div>
								<div class="form-group">
									<label>Senha</label>
									<input class="au-input au-input--full" type="password" name="senha" placeholder="Digite sua senha">
								</div>
								<div class="login-checkbox">
									<label>
										
									</label>
									<label>
										<a href="esqueceu_senha.php">Esqueceu a senha?</a>
									</label>
								</div>
								<button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Login</button>
							   
							</form>
							<div class="social-login-content">
									
								</div>
							<div class="register-link">
								<p>
									Feito <i class="fa fa-code"></i> com <i class="fa fa-heart"></i> por <a target="_blank" href="https://github.com/the1scient">theGuiihBR</a>
								</p>
							</div>
					   
						</div>
					</div>
				</div>
			</div> 
			<style>
				.introdução {
					border-radius: 2px;
				}
				.texto-busca {
					color: #000;
					font-size: 14px;
				}
				.btn{
					background: linear-gradient(45deg, red, pink);
					border-radius: 6px;
				}
				.btn-info:hover{
					color:#fff;
					background: linear-gradient(45deg, pink, red);
					border-color:#2a6683
				}
				.btn-info.focus,.btn-info:focus{
					-webkit-box-shadow:0 0 0 2px #99c586;
					box-shadow:0 0 0 2px #99c586
				}
				.btn-info.disabled,.btn-info:disabled{
					background-color:#4b6a3d;
					border-color:#4b6a3d
				}
				
				.btn-info.active,.btn-info:active,.show>.btn-info.dropdown-toggle{
					color:#fff;
					background-color:#4b6a3d;
					background-image:none;
					border-color:#4b6a3d
				}
		</style>
		<script>
			function Mudarestado(el) {
					var display = document.getElementById(el).style.display;
					if(display == "none")
						document.getElementById(el).style.display = 'block';
				}
			</script>
			<script type='text/javaScript'>
			function Trim(str){
			 return str.replace(/( )/ig,"");
			}
		</script>
			<div class="col-md-6">
				<div class="login-wrap">
					<div class="login-content">
						<div class="login-logo">
							<a href="#">
								<h3>Pesquisa de funcionário <img src="<?php echo $imagem_site ?>" /></h3> 
							</a>
						</div>
						<div class="login-form">
						<div class='introdução'>
										<div style='padding: 15px; text-align: center;'>
										<form action='search_users.php' class='buscar' method='get' target='pesquisado'>
										<div class='texto-busca'>Digite o nome de usuário do militar para realizar a pesquisa: </div>
										<br><input style="border: 1px solid black; border-radius: 2px; " class='buscar-barra' id='main2' name='consulta' onkeyup='this.value = Trim( this.value )' placeholder='Insira o nome do militar...' required='' type='text' value=''/>
										<input class='btn btn-info col-md-2' onclick='Mudarestado("exibir")' type='submit' value='Buscar'/>
										</form>
										</div>
										<div id='exibir' style='display: none;'>
										<center>
										<span style='color:#000;padding-top: 5px'><b>Resultado</b></span></center>
										<center><iframe frameborder='0' id='pesquisado' name='pesquisado' src='' style='margin-left: -2%; height: auto;min-height:250px; margin-top: 7px; width: 105%;'></iframe></center>
										</div>
										</div>
					   
						</div>
					</div>
				</div>
			</div> 

</div>

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

	<!-- Main JS-->
	<script src="assets/js/main.js"></script>
</body>

</html>
<!-- end document-->

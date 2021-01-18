<?php 
session_start();
include("configs.php");
$usuario = htmlspecialchars($_POST["usuario"]);
$senha = htmlspecialchars($_POST["senha"]);
$senha_cripto = md5($senha);

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}

$query = "SELECT * FROM painel WHERE usr_habbo = '{$usuario}' and usr_senha = '{$senha_cripto}'";
$query_go = $conn->query($query);

if($query_go->num_rows > 0) { # Se foi digitado usuário e senhas corretamente:

$select_membro = mysqli_query($conn, "SELECT * FROM membros WHERE usr_habbo = '{$usuario}'");
$r = mysqli_fetch_array($select_membro);
$usr_habbo = $r["usr_habbo"];
$usr_status = $r["usr_status"];
 # Verificação de status de usuário:
if($usr_status == 3) {
    $_SESSION["invalido"] == true;
    header("Location: index.php");
    exit();
}
else {
    $_SESSION["usuario"] = $usr_habbo;
    header("Location: ../painel.php");
    $usr_ip = $_SERVER['REMOTE_ADDR'];
    $insert_log = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip) VALUES('{$usr_habbo}', 'Fez login no sistema com o IP', '{$usr_ip}')");
}


}
else {
    $_SESSION["invalido"] == true;
    header("Location: index.php");
    exit();
}

?>
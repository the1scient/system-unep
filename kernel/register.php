<?php 
session_start();
include("configs.php");
$theuser = htmlspecialchars($_POST['usuario']);
$cod_secreto = $_SESSION["cod_secreto"];
$ssenha = htmlspecialchars($_POST['senha']);
$senha = md5($ssenha);
$HabboAPI = "https://www.habbo.com.br/api/public/users?name=".$theuser;
$ch = curl_init();
$options = array(
    CURLOPT_URL => $HabboAPI,
    CURLOPT_HEADER => false,
    CURLOPT_POST => 0,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_RETURNTRANSFER => true,
);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
curl_setopt_array($ch, $options);
$saida = curl_exec($ch);
/* Decoda o JSON e exibe a missão */
$missao = json_decode($saida)->motto;
curl_close($ch);

if($missao == $cod_secreto) {
    # missão foi comparada, portanto, verificação de usuário já existente e posteriormente inserção de usuário na tabela
    $select_pracas_usuarios = "SELECT * FROM painel WHERE usr_habbo = '{$theuser}'";
    $r_pracas_usuarios = $conn->query($select_pracas_usuarios);
    if($r_pracas_usuarios->num_rows > 0) { # Encontrada uma conta já
        echo "<script type='text/javascript'>alert('Esta conta já existe.');window.location.href='../index.php'</script>";
    }
    else { # Conta do PAINEL não existe. Verificação de conta na tabela MEMBROS aaa
        $select_membros = "SELECT * FROM membros WHERE usr_habbo = '{$theuser}'";
        $r_select_membros = $conn->query($select_membros);
            if($r_select_membros->num_rows > 0) { # Se o usuário FOR MEMBRO crie um novo usuário no painel
                $sql_insert = mysqli_query($conn, "INSERT INTO painel(usr_habbo, usr_senha) VALUES('{$theuser}', '{$senha}')");
                echo "<script type='text/javascript'>alert('Sua conta foi criada com sucesso. \n Bem-vindo!');window.location.href='../painel.php'</script>";
                header('Location: ../painel.php');


            }
         else {
            echo "<script type='text/javascript'>alert('Você não é um alistado.');window.location.href='../index.php'</script>";

        }

    }
}
else {
    echo "<script type='text/javascript'>alert('Verifique sua missão e tente novamente!');window.location.href='../register.php'</script>";

}


?>
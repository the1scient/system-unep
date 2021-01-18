<?php 
session_start();
include("../kernel/configs.php");
include("get_patente.php");



if($_GET["tipo"]) 
{
    $usr_ip = $_SERVER['REMOTE_ADDR'];

    $tipo = $_GET["tipo"];
    if($tipo == "notificacao") { # Marcar notificação como lida:
        $id = $_GET["id"];
        # Verificação para ver se o usuário possui aquela notificação
        $query_not = "SELECT * FROM notificacoes WHERE id = '{$id}' AND is_read = 0";
        $res_not = $conn->query($query_not);
        if($res_not->num_rows > 0) { # Há resultados e vai marcar como lida
            $query_update_not = mysqli_query($conn, "UPDATE notificacoes SET is_read = 1 WHERE id = '{$id}'");
        header('Location: ../painel.php');    
            }
        else {
            header('Location: ../painel.php');
        }
    }

    elseif($tipo == "remover_adm") {
        $u_id = $_GET["user_id"];
        # Pegar permissão de adm
    $query_perm = mysqli_query($conn, "SELECT * FROM painel WHERE usr_habbo = '{$usuarioNome}' AND usr_perm > 1");
    $count_perm = mysqli_num_rows($query_perm);
    if($count_perm > 0) {

        echo "<script type='text/javascript'>alert('Permissão removida com sucesso! Log guardado.');window.location.href='../tables.php?type=gerusers';</script>";
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Removeu a permissão do usuário com ID {$u_id}', '{$usr_ip}', '1')");
    $sql_update_perm = mysqli_query($conn, "UPDATE painel SET usr_perm = 0 WHERE id = '{$u_id}'");
}
    else {
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou tirar a permissão do usuário com ID {$u_id}', '{$usr_ip}', '2')");
        echo "<script type='text/javascript'>alert('Você não pode fazer isso! Log guardado.');window.location.href='../painel.php';</script>";
    }

    }


    elseif($tipo == "remover_guia") {
        $u_nick = $_GET["nickname"];
        # Pegar permissão de adm
    $query_perm = mysqli_query($conn, "SELECT * FROM painel WHERE usr_habbo = '{$usuarioNome}' AND usr_perm >= 1");
    $count_perm = mysqli_num_rows($query_perm);
    if($count_perm > 0) {

        echo "<script type='text/javascript'>alert('Guia removido com sucesso! Log guardado.');window.location.href='../tables.php?type=ver_guias';</script>";
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Removeu o guia {$u_nick}', '{$usr_ip}', '1')");
    $sql_update_perm = mysqli_query($conn, "DELETE FROM guias WHERE nickname = '{$u_nick}'");
}
    else {
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou remover o usuário {$u_nick} dos guias', '{$usr_ip}', '2')");
        echo "<script type='text/javascript'>alert('Você não pode fazer isso! Log guardado.');window.location.href='../painel.php';</script>";
    }

    }





    elseif($tipo == "remover_professor") {
        $u_nick = $_GET["nickname"];
        # Pegar permissão de adm
    $query_perm = mysqli_query($conn, "SELECT * FROM painel WHERE usr_habbo = '{$usuarioNome}' AND usr_perm >= 1");
    $count_perm = mysqli_num_rows($query_perm);
    if($count_perm > 0) {

        echo "<script type='text/javascript'>alert('Professor removido com sucesso! Log guardado.');window.location.href='../tables.php?type=ver_professores';</script>";
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Removeu o professor {$u_nick}', '{$usr_ip}', '1')");
    $sql_update_perm = mysqli_query($conn, "DELETE FROM professores WHERE nickname = '{$u_nick}'");
}
    else {
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou remover o usuário {$u_nick} dos professores', '{$usr_ip}', '2')");
        echo "<script type='text/javascript'>alert('Você não pode fazer isso! Log guardado.');window.location.href='../painel.php';</script>";
    }

    }


    elseif($tipo == "remover_instrutores") {
        $u_nick = $_GET["nickname"];
        # Pegar permissão de adm
    $query_perm = mysqli_query($conn, "SELECT * FROM painel WHERE usr_habbo = '{$usuarioNome}' AND usr_perm >= 1");
    $count_perm = mysqli_num_rows($query_perm);
    if($count_perm > 0) {

        echo "<script type='text/javascript'>alert('Instrutor removido com sucesso! Log guardado.');window.location.href='../tables.php?type=ver_instrutores';</script>";
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Removeu o instrutor {$u_nick}', '{$usr_ip}', '1')");
    $sql_update_perm = mysqli_query($conn, "DELETE FROM instrutores WHERE nickname = '{$u_nick}'");
}
    else {
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou remover o usuário {$u_nick} dos instrutores', '{$usr_ip}', '2')");
        echo "<script type='text/javascript'>alert('Você não pode fazer isso! Log guardado.');window.location.href='../painel.php';</script>";
    }

    }




elseif($tipo == "aprovar_aval") {
    $aval_id = $_GET["id"];
    $sqlgetunameaval = mysqli_query($conn, "SELECT * FROM avais WHERE id = '{$aval_id}'");
    $fetchnameaval = mysqli_fetch_array($sqlgetunameaval);
    $a_id = $fetchnameaval["id"];
    $a_user = $fetchnameaval["user"];
    $a_inicio = date('d/m/Y H:i:s', strtotime($fetchnameaval["data_inicio"]));
    $a_fim = date('d/m/Y H:i:s', strtotime($fetchnameaval["data_fim"]));
    if($a_id != $aval_id) {
        echo "<script type='text/javascript'>alert('Você não pode fazer isso! Log guardado.');window.location.href='../painel.php';</script>";
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou aprovar aval ID {$aval_id}', '{$usr_ip}', '2')");

    }
    # pegar patente de diretor
    if($patente_id > 5) { # n tem patente de diretor
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou aprovar aval ID {$aval_id}', '{$usr_ip}', '2')");
        echo "<script type='text/javascript'>alert('Você não pode fazer isso! Log guardado.');window.location.href='../painel.php';</script>";
    }
    else { # tem patente de diretor ou 'maior'
    $sql_update_aval = mysqli_query($conn, "UPDATE avais SET status = 1 WHERE id = '{$aval_id}'");
    $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Aprovou o aval id {$aval_id}', '{$usr_ip}', '1')");
      


    $sql_inserthist = mysqli_query($conn, "INSERT INTO historico(enviado_por, usr_habbo, tipo, msg) VALUES('{$usuarioNome}', '{$a_user}', '5', 'teve seu aval (id: {$a_id}) de {$a_inicio} até {$a_fim} aprovado')");
    $sql_insertnoti = mysqli_query($conn, "INSERT INTO notificacoes(enviado_por, user, msg, noti_type) VALUES('{$usuarioNome}', '{$a_user}', 'Seu aval de {$a_inicio} até {$a_fim} foi aprovado!', '1')");

    echo "<script type='text/javascript'>alert('Aval aprovado com sucesso!');window.location.href='../tables.php?type=ver_avais';</script>";

    }




}



elseif($tipo == "reprovar_aval") {
    $aval_id = $_GET["id"];
    $sqlgetunameaval = mysqli_query($conn, "SELECT * FROM avais WHERE id = '{$aval_id}'");
    $fetchnameaval = mysqli_fetch_array($sqlgetunameaval);
    $a_id = $fetchnameaval["id"];
    $a_user = $fetchnameaval["user"];
    $a_inicio = date('d/m/Y H:i:s', strtotime($fetchnameaval["data_inicio"]));
    $a_fim = date('d/m/Y H:i:s', strtotime($fetchnameaval["data_fim"]));
    if($a_id != $aval_id) {
        echo "<script type='text/javascript'>alert('Você não pode fazer isso! Log guardado.');window.location.href='../painel.php';</script>";
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou reprovar aval ID {$aval_id}', '{$usr_ip}', '2')");

    }
    # pegar patente de diretor
    if($patente_id > 5) { # n tem patente de diretor
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou reprovar aval ID {$aval_id}', '{$usr_ip}', '2')");
        echo "<script type='text/javascript'>alert('Você não pode fazer isso! Log guardado.');window.location.href='../painel.php';</script>";
    }
    else { # tem patente de diretor ou 'maior'
    $sql_update_aval = mysqli_query($conn, "UPDATE avais SET status = 2 WHERE id = '{$aval_id}'");
    $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Reprovou o aval id {$aval_id}', '{$usr_ip}', '1')");
      

    $sql_insertnoti = mysqli_query($conn, "INSERT INTO notificacoes(enviado_por, user, msg, noti_type) VALUES('{$usuarioNome}', '{$a_user}', 'Seu aval de {$a_inicio} até {$a_fim} foi reprovado.', '3')");
    echo "<script type='text/javascript'>alert('Aval aprovado com sucesso!');window.location.href='../tables.php?type=ver_avais';</script>";

    }


    


}





elseif($tipo == "aprovar_cfo") {
    $aval_id = $_GET["id"];
    $sqlgetunameaval = mysqli_query($conn, "SELECT * FROM relatorios WHERE id = '{$aval_id}'");
    $fetchnameaval = mysqli_fetch_array($sqlgetunameaval);
    $a_id = $fetchnameaval["id"];
    $a_user = $fetchnameaval["usr_habbo"];

    if($a_id != $aval_id) {
        echo "<script type='text/javascript'>alert('Você não pode fazer isso! Log guardado.');window.location.href='../painel.php';</script>";
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou aprovar Relatório (CFO) ID {$aval_id}', '{$usr_ip}', '2')");

    }
    $sql_get_ins = mysqli_query($conn, "SELECT * FROM instrutores WHERE nickname = '{$usuarioNome}' AND cargo = 2");
    $num_get_ins = mysqli_num_rows($sql_get_ins);
    if($num_get_ins <= 0) { # n tem perm de ins tipo 2 ou n eh ins
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou aprovar relatório (CFO) ID {$aval_id}', '{$usr_ip}', '2')");
        echo "<script type='text/javascript'>alert('Você não pode fazer isso! Log guardado.');window.location.href='../painel.php';</script>";
    }
    
    else { # tem a perm
    $sql_update_aval = mysqli_query($conn, "UPDATE relatorios SET status = 1 WHERE id = '{$aval_id}'");
    $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Aprovou o relatório (CFO) id {$aval_id}', '{$usr_ip}', '1')");
      


    $sql_inserthist = mysqli_query($conn, "INSERT INTO historico(enviado_por, usr_habbo, tipo, msg) VALUES('{$usuarioNome}', '{$a_user}', '4', 'teve seu CFO aprovado.')");
    $sql_insertnoti = mysqli_query($conn, "INSERT INTO notificacoes(enviado_por, user, msg, noti_type) VALUES('{$usuarioNome}', '{$a_user}', 'Seu CFO foi aprovado!', '1')");

    echo "<script type='text/javascript'>alert('CFO aprovado com sucesso!');window.location.href='../tables.php?type=ver_cfos';</script>";

    }




}




elseif($tipo == "aprovar_hist") {
    $aval_id = $_GET["id"];
    $sqlgetunameaval = mysqli_query($conn, "SELECT * FROM historico WHERE id = '{$aval_id}'");
    $fetchnameaval = mysqli_fetch_array($sqlgetunameaval);
    $a_id = $fetchnameaval["id"];
    $a_user = $fetchnameaval["usr_habbo"];

    if($a_id != $aval_id) {
        echo "<script type='text/javascript'>alert('Você não pode fazer isso! Log guardado.');window.location.href='../painel.php';</script>";
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou aprovar histórico ID {$aval_id}', '{$usr_ip}', '2')");

    }
    $query_perm = mysqli_query($conn, "SELECT * FROM painel WHERE usr_habbo = '{$usuarioNome}' AND usr_perm >= 1");
    $count_perm = mysqli_num_rows($query_perm);
    if($count_perm <= 0) { # n tem perm de ins tipo 2 ou n eh ins
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou aprovar histórico ID {$aval_id}', '{$usr_ip}', '2')");
        echo "<script type='text/javascript'>alert('Você não pode fazer isso! Log guardado.');window.location.href='../painel.php';</script>";
    }
    
    else { # tem a perm
        $type = str_replace('-', '', $_GET['type']);
    $sql_update_aval = mysqli_query($conn, "UPDATE historico SET tipo = '{$type}' WHERE id = '{$aval_id}'");
    $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Aprovou o histórico id {$aval_id}', '{$usr_ip}', '1')");
      


    $sql_insertnoti = mysqli_query($conn, "INSERT INTO notificacoes(enviado_por, user, msg, noti_type) VALUES('{$usuarioNome}', '{$a_user}', 'Algo em seu histórico foi aprovado!', '1')");

    echo "<script type='text/javascript'>alert('Histórico aprovado com sucesso!');window.location.href='../tables.php?type=ver_historico';</script>";

    }




}











elseif($tipo == "cancelar_hist") {
    $aval_id = $_GET["id"];
    $sqlgetunameaval = mysqli_query($conn, "SELECT * FROM historico WHERE id = '{$aval_id}'");
    $fetchnameaval = mysqli_fetch_array($sqlgetunameaval);
    $a_id = $fetchnameaval["id"];
    $a_user = $fetchnameaval["usr_habbo"];

    if($a_id != $aval_id) {
        echo "<script type='text/javascript'>alert('Você não pode fazer isso! Log guardado.');window.location.href='../painel.php';</script>";
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou reprovar histórico ID {$aval_id}', '{$usr_ip}', '2')");

    }
    $query_perm = mysqli_query($conn, "SELECT * FROM painel WHERE usr_habbo = '{$usuarioNome}' AND usr_perm >= 1");
    $count_perm = mysqli_num_rows($query_perm);
    if($count_perm <= 0) { # n tem perm de ins tipo 2 ou n eh ins
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou reprovar histórico ID {$aval_id}', '{$usr_ip}', '2')");
        echo "<script type='text/javascript'>alert('Você não pode fazer isso! Log guardado.');window.location.href='../painel.php';</script>";
    }
    
    else { # tem a perm
        $type = $_GET['type'];
        $type = "-".$type;
    $sql_update_aval = mysqli_query($conn, "UPDATE historico SET tipo = '{$type}' WHERE id = '{$aval_id}'");
    $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Cancelou o histórico id {$aval_id}', '{$usr_ip}', '1')");
      


    $sql_insertnoti = mysqli_query($conn, "INSERT INTO notificacoes(enviado_por, user, msg, noti_type) VALUES('{$usuarioNome}', '{$a_user}', 'Algo em seu histórico foi cancelado.', '1')");

    echo "<script type='text/javascript'>alert('Histórico cancelado com sucesso!');window.location.href='../tables.php?type=ver_historico';</script>";

    }




}





















elseif($tipo == "reprovar_cfo") {
    $aval_id = $_GET["id"];
    $sqlgetunameaval = mysqli_query($conn, "SELECT * FROM relatorios WHERE id = '{$aval_id}'");
    $fetchnameaval = mysqli_fetch_array($sqlgetunameaval);
    $a_id = $fetchnameaval["id"];
    $a_user = $fetchnameaval["usr_habbo"];

    if($a_id != $aval_id) {
        echo "<script type='text/javascript'>alert('Você não pode fazer isso! Log guardado.');window.location.href='../painel.php';</script>";
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou reprovar Relatório (CFO) ID {$aval_id}', '{$usr_ip}', '2')");

    }
    $sql_get_ins = mysqli_query($conn, "SELECT * FROM instrutores WHERE nickname = '{$usuarioNome}' AND cargo = 2");
    $num_get_ins = mysqli_num_rows($sql_get_ins);
    if($num_get_ins <= 0) { # n tem perm de ins tipo 2 ou n eh ins
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou reprovar relatório (CFO) ID {$aval_id}', '{$usr_ip}', '2')");
        echo "<script type='text/javascript'>alert('Você não pode fazer isso! Log guardado.');window.location.href='../painel.php';</script>";
    }
    
    else { # tem a perm
    $sql_update_aval = mysqli_query($conn, "UPDATE relatorios SET status = 2 WHERE id = '{$aval_id}'");
    $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Reprovou o relatório (CFO) id {$aval_id}', '{$usr_ip}', '1')");
      


    $sql_inserthist = mysqli_query($conn, "INSERT INTO historico(enviado_por, usr_habbo, tipo, msg) VALUES('{$usuarioNome}', '{$a_user}', '4', 'teve seu CFO reprovado.')");
    $sql_insertnoti = mysqli_query($conn, "INSERT INTO notificacoes(enviado_por, user, msg, noti_type) VALUES('{$usuarioNome}', '{$a_user}', 'Seu CFO foi reprovado.', '1')");

    echo "<script type='text/javascript'>alert('CFO reprovado com sucesso!');window.location.href='../tables.php?type=ver_cfos';</script>";

    }




}






















    


    elseif($tipo == "transformar_lider_guia") {
        $u_nick = $_GET["nickname"];
        # Pegar permissão de adm
    $query_perm = mysqli_query($conn, "SELECT * FROM painel WHERE usr_habbo = '{$usuarioNome}' AND usr_perm >= 1");
    $count_perm = mysqli_num_rows($query_perm);
    if($count_perm > 0) {

        echo "<script type='text/javascript'>alert('Usuário promovido com sucesso! Log guardado.');window.location.href='../tables.php?type=ver_guias';</script>";
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Transformou {$u_nick} em membro do RH líder', '{$usr_ip}', '1')");
    $sql_update_perm = mysqli_query($conn, "UPDATE guias SET cargo = 2 WHERE nickname = '{$u_nick}'");
}
    else {
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou transformar o usuário {$u_nick} em guia líder', '{$usr_ip}', '2')");
        echo "<script type='text/javascript'>alert('Você não pode fazer isso! Log guardado.');window.location.href='../painel.php';</script>";
    }

    }

    elseif($tipo == "transformar_lider_professor") {
        $u_nick = $_GET["nickname"];
        # Pegar permissão de adm
    $query_perm = mysqli_query($conn, "SELECT * FROM painel WHERE usr_habbo = '{$usuarioNome}' AND usr_perm >= 1");
    $count_perm = mysqli_num_rows($query_perm);
    if($count_perm > 0) {

        echo "<script type='text/javascript'>alert('Usuário promovido com sucesso! Log guardado.');window.location.href='../tables.php?type=ver_professores';</script>";
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Transformou {$u_nick} em professor líder', '{$usr_ip}', '1')");
    $sql_update_perm = mysqli_query($conn, "UPDATE professores SET cargo = 2 WHERE nickname = '{$u_nick}'");
}
    else {
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou transformar o usuário {$u_nick} em professor líder', '{$usr_ip}', '2')");
        echo "<script type='text/javascript'>alert('Você não pode fazer isso! Log guardado.');window.location.href='../painel.php';</script>";
    }

    }



    elseif($tipo == "transformar_lider_instrutores") {
        $u_nick = $_GET["nickname"];
        # Pegar permissão de adm
    $query_perm = mysqli_query($conn, "SELECT * FROM painel WHERE usr_habbo = '{$usuarioNome}' AND usr_perm >= 1");
    $count_perm = mysqli_num_rows($query_perm);
    if($count_perm > 0) {

        echo "<script type='text/javascript'>alert('Usuário promovido com sucesso! Log guardado.');window.location.href='../tables.php?type=ver_instrutores';</script>";
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Transformou {$u_nick} em membro do DI líder', '{$usr_ip}', '1')");
    $sql_update_perm = mysqli_query($conn, "UPDATE instrutores SET cargo = 2 WHERE nickname = '{$u_nick}'");
}
    else {
        $sql_insertlog = mysqli_query($conn, "INSERT INTO logs(usr_habbo, msg, usr_ip, log_tipo) VALUES('{$usuarioNome}', 'Tentou transformar o usuário {$u_nick} em instrutor líder', '{$usr_ip}', '2')");
        echo "<script type='text/javascript'>alert('Você não pode fazer isso! Log guardado.');window.location.href='../painel.php';</script>";
    }

    }













   
}
else 
{

}




?>
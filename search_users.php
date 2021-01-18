<?php 
include_once("global.php");
$consulta = htmlspecialchars($_GET['consulta']);

$get_user_infos = mysqli_query($conn, "SELECT * FROM membros WHERE usr_habbo LIKE '{$consulta}%'");
if($count_user_infos = mysqli_num_rows($get_user_infos) > 0) {

$fetch_infos = mysqli_fetch_array($get_user_infos);

$usr_habbo = $fetch_infos["usr_habbo"];
$ultima_promocao = $fetch_infos['usr_promo'];
$usr_promo = date('d/m/Y H:i:s', strtotime($ultima_promocao));
$usr_responsavel = $fetch_infos['usr_responsavel'];
switch($fetch_infos['usr_status']) {
    case 1:
        $usr_status = "<span style='color: green;'>Ativo</span>";
        break;
    case 2:
        $usr_status = "<span style='color: white;'>Aposentado</span>";
        break;
    case 3:
        $usr_status = "<span style='color: red;'>Demitido</span>";
        break;
}
$usr_exec = $fetch_infos['usr_executivo'];
$usr_sigla = $fetch_infos['usr_sigla'];
$usr_patente = $fetch_infos['usr_patente'];
$select_u_p = mysqli_query($conn, "SELECT * FROM patentes WHERE id = '{$usr_patente}'");
    $r_u_p = mysqli_fetch_array($select_u_p);
    if($usr_exec == 1) {
        $usr_patente = $r_u_p["patente_executivo"];
    }
    else {
        $usr_patente = $r_u_p["patente"];
    }


$get_confirm_painel = mysqli_query($conn, "SELECT id FROM painel WHERE usr_habbo = '{$usr_habbo}'");
if($numconfirmpainel = mysqli_num_rows($get_confirm_painel) > 0) 
{
    $usr_painel_confirmado = "<span style='color: green;'>Sim</span>";
}
else {
    $usr_painel_confirmado = "<span style='color: red;'>Não</span>";

}
?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
</style>


<div class="infobox" style=" background: url(https://www.habbo.com.br/habbo-imaging/avatarimage?&amp;user=<?php echo $usr_habbo ?>&amp;action=&amp;direction=3&amp;head_direction=3&amp;img_format=png&amp;gesture=&amp;headonly=0&amp;size=l), rgb(173,216,230,0.8); height: auto; background-repeat: no-repeat; border: 1px solid white; border-radius: 6px;">
<h3 style="text-align: center; margin-top: 5%; position: relative;"><?php echo $usr_habbo ?></h3>

<ul style="position: relative; margin-left: 30%;">
<li>Cargo: <?php echo $usr_patente ?></li>
<li>Última promoção: <strong><?php echo $usr_promo ?></strong></li>
<li>Promovido por: <strong><?php echo $usr_responsavel ?></strong></li>
<li>Status: <strong><?php echo $usr_status ?></strong></li>
<li>Tag: [<strong><?php echo $usr_sigla ?></strong>]</li>
<li>Possui painel: <strong><?php echo $usr_painel_confirmado ?></strong></li>
</ul>
</div>


<?php }  else {
    echo "<center><span>Sem resultados</span></center>";
}?>


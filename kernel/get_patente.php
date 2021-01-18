<?php 
# Pegar o ID da patente na tabela membros
$usuarioNome = $_SESSION["usuario"];
$get_patente_id = mysqli_query($conn, "SELECT * FROM membros WHERE usr_habbo = '{$usuarioNome}'");
$fetch_patente_id = mysqli_fetch_array($get_patente_id);
$patente_id = $fetch_patente_id["usr_patente"];
$usr_executivo = $fetch_patente_id["usr_executivo"];

if($patente_id == 12) {
$sql_get_relatorios_t2 = mysqli_query($conn, "SELECT * FROM relatorios WHERE recrutas = '{$usuarioNome}' AND tipo = 2");
$count_get_relatorios_t2 = mysqli_num_rows($sql_get_relatorios_t2);
}
elseif($patente_id == 13) {
    $count_get_relatorios_t2 = "0";
}
else {
    $count_get_relatorios_t2 = "1";
}


# Pegar o nome da patente na tabela patentes
$get_patente_nome = mysqli_query($conn, "SELECT * FROM patentes WHERE id = '{$patente_id}'");
$fetch_patente_nome = mysqli_fetch_array($get_patente_nome);

$poder_promover_patente = $fetch_patente_nome["perm_promover"];
$poder_rebaixar_patente = $fetch_patente_nome["perm_rebaixar"];
$poder_demitir_patente = $fetch_patente_nome["perm_demitir"];
if($usr_executivo == 0) {
    $patente_nome = $fetch_patente_nome["patente"];
}
else {
    $patente_nome = $fetch_patente_nome["patente_executivo"];
}

?>
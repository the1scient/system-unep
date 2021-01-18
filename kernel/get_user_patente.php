<?php 
include_once("global.php");

function getuserpatente($name) {
$sql_get_u_patente = mysqli_query($conn, "SELECT * FROM membros WHERE usr_habbo = '{$name}'");
$fetch_get_u_patente = mysqli_fetch_array($sql_get_u_patente);



}
?>
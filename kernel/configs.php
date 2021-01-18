<?php 
define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("DB", "systemunep");

$conn = mysqli_connect(HOST, USER, PASS, DB) or die("Não é possível conectar-se ao banco de dados.");

$titulo_site = "System UNEP";
$imagem_site = "https://www.habbo.com.br/habbo-imaging/badge/b09114s02010s11017s55011t2711481455e142351964ef03b8868295e5ec5.gif";

?>

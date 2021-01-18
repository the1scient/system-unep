<?php 

if(isset($_POST['submit'])) {
$conteudo_anuncio = $_POST['conteudo_anuncio'];
$sqlupdateanuncio = mysqli_query($conn, "UPDATE avisos SET mensagem = '{$conteudo_anuncio}' WHERE id = 1");
echo '<script type="text/javascript">alert("Anúncio atualizado com sucesso!");window.href.location="redirect_painel.php";</script>';
}

?>
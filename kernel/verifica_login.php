<?php
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } $usuario = $_SESSION['usuario'];

if(!$_SESSION['usuario']) {
	header('Location: index.php');
	echo "Faça login para visualizar esta página.";
	echo"<script language='javascript' type='text/javascript'>alert('Faça login para visualizar esta página! \n Redirecionando ao painel principal...');window.location.href='index.php';</script>";

	exit();
}
?>
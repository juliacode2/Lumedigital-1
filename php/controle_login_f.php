<!DOCTYPE html>
<html>

<head>

<title>Valida_login</title>
<meta charset="utf-8">

</head>

<body>

<h2>Validacao</h2>

 

<?php

session_start();

// definindo valor para uma variavel de sessão para ser testado em outros scripts. 
// $_SESSION['autenticado'] = 'NAO';

if(!isset($_POST['email_usu']) || !isset($_POST['senha']))
{
  HEADER('Location:login_f.php');
  exit();
}


$ema = $_POST['email_usu'];

$sen = trim($_POST['senha']); // para evitar vir espaços em branco


require 'classe_usuario_f.php'; // para executar a classe
$u = new Usuario("db_login","localhost","root","");  // instanciando

if($u->pesquisarUsuarioLogin($ema, $sen))
{
	$_SESSION['autenticado'] = 'SIM';
	$_SESSION['lembra_usu'] = $ema;
	header('location:index.php');
	exit();
}
else
{
	header('login_f.php?invalido');
	exit();
}



?>

</body>
</html>

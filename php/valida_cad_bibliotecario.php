<!DOCTYPE html>
<html>
<head>
<title>valida_login</title>
<meta charset="utf-8">
</head>

<body>
<h2>Cadastro</h2>
<?php

if(!isset($_POST['nome'])) 
{ 
  HEADER('Location:cad1.php');
} 
?>

<?
$servidor = 'localhost';
$usuario = 'usuario';
$senha = 'NULL';
$banco = 'cad2'; 

$link = mysqli_connect($servidor, $usuario, $senha, $banco)

or die ('Nao foi possivel conectar: 'mysqli_connect($link));

if (isset($_REQUEST["acao"]) && $_REQUEST["acao"] == "adicionar")

$v1 = $_POST['nome'];
$v2 = $_POST['telefone'];
$v3 = $_POST['cpf'];
$v4 = $_POST['email'];
$v5 = $_POST['senha'];
$v6 = $_POST['cadigo_escola'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografar a senha


$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$abc = mysqli_connect('localhost', 'root', NULL, 'cad2')
or die ('Erro ao se conectar ao banco de dados');

$result = mysqli_query($link, $sql);

if (!$result)
{ die ('Erro:' .mysli_error($link)); }

$consulta = "SELECT * FROM cad2
WHERE cpf = '$v3' OR email = '$v4'";

$result = mysqli_query($abc, $consulta);

if(!$result)
{
  HEADER('Location:cad2.php?log=erro');
}
/*
while ($tbl = mysqli_fetch_array($result)) 
  {
    $cod = $tbl["ID"];
    $nom = $tbl["NOME"];
    $cp = $tbl["CPF"];
    $tel = $tbl["TEL"];
    $emai = $tbl["EMAIL"];

	$usu = $tbl["cpf"];
	$senh = $tbl["senha"];
  }
  */

if(mysqli_num_rows($result) == 1) 
{
HEADER('Location:cad2.php?log=erro3');
}

if(mysqli_num_rows($result) < 1)  
{


$sql = "INSERT INTO cad2 (ID, NOME, EMAIL, TEL , CPF, SENHA, codigo_escola) 
VALUES (NULL, '$v1', '$v2', '$v3', '$v4', '$v5', '$v6')";

$result2 = mysqli_query($abc, $sql);

if(!$result2)
{
HEADER('Location:cad2.php?log=erro');
}
else
{
	// $mes = "Usuario cadastrado com sucesso!";
	// echo "<script>alert('$mes');</script>";
	mysqli_close($abc);
	HEADER('Location:cad2.php?log=cadastrado'); 
}

} 

mysqli_close($abc);

?>

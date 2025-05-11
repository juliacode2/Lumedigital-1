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
  exit;
} 

$servidor = 'localhost';
$usuario = 'estudante';
$senha = 'cad1';
$banco = 'aluno';

$conn = mysqli_connect($servidor, $usuario, $senha, $banco);
if (!$conn) {
  die('Erro ao conectar ao banco: ' . mysqli_connect_error());
}


$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirma= $_POST['confirmaSenha'];


if (isset($_REQUEST["acao"]) && $_REQUEST["acao"] == "adicionar"){
  
  if ($senha !== $confirma) {
    header('Location:cad1.php?log=senhas_diferentes');
    exit;
  }
  }

  $senha_hash= password_hash($senha, PASSWORD_DEFAULT); 

$consulta = "SELECT * FROM tb_cadastroaluno  WHERE nome = '$nome' OR CPF = '$cpf'";
$result = mysqli_query($conn, $consulta);

if (!$result) {
  die("Erro na consulta: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
  header('Location:cad1.php?log=erro3'); // Já existe
  exit;
}

$nome = $_POST['nome'];
$cpf= $_POST['cpf'];
$abc = mysqli_connect('localhost', 'estudante', 'cad1', 'aluno');

if (!$abc) {

  die('Erro ao se conectar ao banco de dados: ' . mysqli_connect_error());
}

$consulta = "SELECT * FROM aluno WHERE nome = '$cad_nome' OR CPF = '$cpf_usuario'";

$result = mysqli_query($abc, $consulta);
  




	mysqli_close($abc);
	HEADER('Location:cad1.php?log=cadastrado'); 



$insert = "INSERT INTO tb_cadastroaluno (ID, NOME, EMAIL, TEL, CPF, SENHA, CONFIRM_CADASTROALUNO) 
           VALUES (NULL, '$nome', '$email', '$telefone', '$cpf', '$senha_hash', '$confirma')";

if (mysqli_query($conn, $insert)) {
    mysqli_close($conn);
    header('Location:cad1.php?log=cadastrado');
    exit;
} else {
    die("Erro ao cadastrar: " . mysqli_error($conn));
}



?>




<!DOCTYPE html>
<html>

<head>

<title>valida_cadastro</title>
<meta charset="utf-8">

</head>

<body>

<h2>Cadastro</h2>

<?php


if(!isset($_POST['cad_nome'])) 
{ 
  HEADER('Location:aluno.php');
} 

$v0 = $_POST['nome'];
$v1 = $_POST['email'];
$v2 = $_POST['birth'];
$v3 = $_POST['cpf'];
$v4 = $_POST['tel'];
$v5 = $_POST['senha'];


$abc = mysqli_connect('localhost', 'root', NULL, 'login_aluno')
or die ('Erro ao se conectar ao banco de dados');

$consulta = "SELECT * FROM tb_usuario_aluno
WHERE nome = '$v0' OR cpf = '$v3'";

$result = mysqli_query($abc, $consulta);

if(!$result)
{
  HEADER('Location:aluno.php?log=erro');
}

// A função abaixo retorna a quantidade de registros retornados pelo SELECT.
if(mysqli_num_rows($result) == 1) 
{
HEADER('Location:aluno.php?log=erro3');
}

if(mysqli_num_rows($result) < 1)  
{

$sql = "INSERT INTO TB_USUARIO (ID, NOME, EMAIL, BIRTH, CPF, TEL, SENHA ) 
VALUES (NULL, '$v0', '$v1', '$v2', '$v3', '$v4', '$v5')";

$result2 = mysqli_query($abc, $sql);

if(!$result2)
{
HEADER('Location:aluno.php?log=erro');
}
else
{
	mysqli_close($abc);
	HEADER('Location:aluno.php?log=cadastrado'); 
}

} 

mysqli_close($abc);

?>


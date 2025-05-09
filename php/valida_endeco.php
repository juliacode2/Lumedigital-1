<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

if(isset($_POST['cep'])) 
{ 
  HEADER('Location:cad2.php');
} 

$servidor = 'localhost';
$usuario = 'usuario';
$senha = 'NULL';
$banco = 'cadastro';

$link = mysqli_connect($servidor, $usuario, $senha, $banco)
or die ('Nao foi possivel conectar: 'mysqli_connect($link));

if (isset($_REQUEST["acao"]) && $_REQUEST["acao"] == "adicionar")
     

$v1 = $_POST['cep'];
$v2 = $_POST['bairro'];
$v3 = $_POST['num'];
$v4 = $_POST['cidade'];
$v5 = $_POST['cumple'];

$cep= $_POST['cep'];
$cidade = $_POST['cidade'];
$abc = mysqli_connect('localhost', 'root', NULL, 'endereco')
or die ('Erro ao se conectar ao banco de dados');

$consulta = "SELECT * FROM cad2
WHERE cef = '$v3' OR cidade = '$v4'";

$result = mysqli_query($abc, $consulta);


    ?>

</body>
</html>
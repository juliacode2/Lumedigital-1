<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "NULL";
$dbname = "cadastro";

$conn = new mysqli($servername, $username, $password, $dbname);

$abc = mysqli_connect('localhost', 'root', NULL, 'cadastro')
or die ('Erro ao se conectar ao banco de dados');

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obter o ID do registro a ser excluído (por exemplo, do formulário ou da URL)
$id_a_excluir = $_POST['id_cadastro']; // Substitua 'id' pelo nome do campo que contém o ID

// Consulta SQL DELETE
$sql = "DELETE FROM tb_cadstro WHERE id = " . $id_a_excluir;

// Executa a consulta
if ($conn->query($sql) === TRUE) {
    echo "Registro excluído com sucesso!";
    // Redirecionar ou exibir mensagem de sucesso
    header("Location: pesquisa.php"); // Redireciona para uma página de lista de cadastros
} else {
    echo "Erro ao excluir registro: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>



</body>
</html>



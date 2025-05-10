<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
        $servername = "localhost";
        $username = "usuario";
        $password = "NULL";
        $dbname = "livros";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        $termo = $_POST['pesquisa'];

        $sql = "SELECT * FROM planilha1 WHERE livros LIKE '%" . $termo . "%'";

        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            while($row = $resultado->fetch_assoc()) {
                echo "ID: " . $row["id"] . " - Nome: " . $row["nome"] . "<br>";
            }
        } else {
            echo "Nenhum resultado encontrado.";
        }

        

?>
</body>
</html>
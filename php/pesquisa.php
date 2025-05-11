<!DOCTYPE html>
<html>

<head>

<title>Pesquisa</title>
<meta charset="utf-8">

</head>

<body>

<h2>Resultado da pesquisa</h2>

 

<?php

 
$abc = mysqli_connect('localhost', 'root', NULL, 'cadastro')
or die ('Erro ao se conectar ao banco de dados');


$consulta =  "SELECT * FROM tb_cadastro";


$resultado = mysqli_query($abc, $consulta);


while ($arra = mysqli_fetch_array($resultado))
{
$to = $arra['id_cadastro'];
echo "ID: $to <br />";

$to2 = $arra['nome'];
echo "Nome: $to2 <br />";

$to3 = $arra['email'];
echo "E-mail: $to3 <br />";

$to4 = $arra['cpf'];
echo "cpf: $to4 <br />";

$to5 = $arra['tel'];
echo "Telefone: $to5 <br />";

$to6 = $arra['senha'];
echo "senha:$to6 <br />";

$to5 = $arra['comentario'];
echo "Comentario: $to5 <br /> <br /> <br />";
} 


mysqli_close($abc);


/* acima, mysql_connect faz a conexao com o banco de dados. Entre parenteses, colcoa-se, na ordem: 
o servidor, o usuario, a senha e o banco de dados. Quando não há senha usa-se NULL.

A funcao die() eh solicitada caso a conexao nao tenha sido estabelecida.
Tudo eh armazenado na variavel $abc, para uso posterior.

Apos se conectar, agora se faz uso das querys do sql, e se armazena em uma variavel tambem.

Agora usamos a funcao mysqli_query() para executar a instrucao. Colocamos tambem em outra variavel.
mysql_query(conexao, instrucao sql);

A funcao mysqli_fetch_array(instrucao) pesquisa no banco de dados, conforme a instrucao dada e coloca a primeira ocorrencia
que encontrar. Repetindo esta funcao, ela busca pela segunda e assim sucessivamente.
Por fim, fechamos o banco de dados, apos a instrucao. Isso eh importante, para evitar grande trafego, ja que varios usuarios 
podem estar usando ao mesmo tempo.
*/

 

?>

 

</body>
 </html>
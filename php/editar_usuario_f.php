<!DOCTYPE html>
<html>

<head>

<title>editar_usuario</title>
<meta charset="utf-8">

</head>

<body>

<A href="cilbpagina.php">Clique aqui para voltar à página inicial.</A> <br> <br>

<?php
session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM')
{
	header('Location:aluno.php');
}


if(isset($_POST['c_nome']) || isset($_POST['c_exc']))
{
	//abixo, o goto direciona o comando para  o local determinado aqui dentro
	goto avanca;
}
$lu = $_SESSION['lembra_usu'];

$abc = mysqli_connect('localhost', 'root', NULL, 'login_aluno')
or die ('Erro ao se conectar ao banco de dados');

$consulta =  "SELECT * FROM tb_usuario_aluno WHERE nome = '$lu'";

$result = mysqli_query($abc, $consulta);
if(!$result)
{
  HEADER('Location:aluno.php?log=erro');
}
?>
  <TABLE border=1>
   <TR>
    
    <TD>Nome</TD>
    <TD>EMAIL</TD>
    <TD>BARTH</TD>	
    <TD>CPF</TD>
    <TD>TEL</TD>
	<TD>Senha</TD>
	
   </TR>
<?php
  while ($tbl = mysqli_fetch_array($result)) 
  {
    $id = $tbl["ID"];
	$nome  = $tbl["NOME"];
    $email = $tbl["EMAIL"];
    $barth= $tbl["BARTH"];
    $cpf   = $tbl["CPF"];
    $senha = $tbl["SENHA"];
?>


	
    <FORM method="post" action="editar_usuario_f.php?cod=alt">

    <TR>

   	<INPUT type="hidden" name="c_id" value="<?php echo $id;?>">	
	<TD><INPUT type="text" name="c_nome" maxlength="50" value="<?php echo $nome; ?>"> </TD>
	<TD> <INPUT for="name"> <?php echo $email; ?> </label><TD>
    <TD><INPUT type="text" name="c_data" maxlength="10" value="<?php echo $data_n; ?>"> </TD>
	<TD><INPUT type="text" name="c_cpf" maxlength="14" value="<?php echo $cpf; ?>"> </TD>
	<TD><INPUT type="text" name="c_usuario" size="40" maxlength="60" value="<?php echo $usuario; ?>"> </TD>
	<TD><INPUT type="password" name="c_senha" maxlength="15" value="<?php echo $senha; ?>"> </TD>
	<TD><input type="submit" value="Alterar"></TD>
  	 
	</form>
	<TD>
	<form method="post" action="editar_usuario_f.php?cod=exc">
	<INPUT type="hidden" name="c_exc" value="<?php echo $id;?>">	
	<input type="submit" value="Excluir">
	</form>
	</TD>
    
	</TR>
	

  </TABLE>

   
<?php

avanca:
if(isset($_POST['c_nome'])) // && $_GET['cod'] == 'alt') 
{
	$val0 = $_POST['c_id'];
	$val1 = $_POST['c_nome'];
	

	
	$val3 = $_POST['c_barth'];
	$val4 = $_POST['c_cpf'];
	$val6 = $_POST['c_senha'];
	

	$abc = mysqli_connect('localhost', 'root', NULL, 'login_aluno')
	or die ('Erro ao se conectar ao banco de dados');
	
	/* abaixo, testando  se email  ou cpf já existe.
	Para isso, precisa colocar entre parênteses
	entre os ors, pois o and é precendente ao or. */
	$busca_email = "SELECT * FROM tb_usuario_aluno WHERE (nome = '$val1' OR CPF = '$val4') AND ID <> '$val0'";
	$res = mysqli_query($abc, $busca_email);
	if(!$res)
	{
		mysqli_close($abc);
		HEADER('Location:editar_usuario_f.php?log=erro8');
	}
	if(mysqli_num_rows($res) == 1)
	{
		mysqli_close($abc);
		HEADER('Location:editar_usuario_f.php?log=erro9');
	}
	
	$editar = "UPDATE tb_usuario_aluno SET NOME = '$val1', EMAIL = '$val2', BARTH = '$val3', CPF = '$val4', 
	CAMPO_SENHA = '$val5'  WHERE ID = '$val0'";

	$result = mysqli_query($abc, $editar);

	if(!$result)
	{
		mysqli_close($abc);
		// HEADER('Location:editar_usuario_f.php?log=erro8');
	}
	
   mysqli_close($abc);
   /* acima, assim que houver a alteração, é importante que a variavel $_SESSION receba o valor do email
      como está agora. Isso, para caso o usuario o altere, porque, senão, ao carregar a página, esta buscará
	  o email como estava antes. */
   
   
   header("Refresh: 1; editar_usuario_f.php?log=ok");
   
}

if(isset($_POST['c_exc'])) // && $_GET['cod'] == 'exc')
{
    $idd = $_POST['c_exc'];
	$abc = mysqli_connect('localhost', 'root', NULL, 'login_aluno')
	or die ('Erro ao se conectar ao banco de dados');

	$excluir = "DELETE FROM tb_usuario_aluno WHERE ID = '$idd'";

	$result = mysqli_query($abc, $excluir);

	if(!$result)
	{
		HEADER('Location:editar_usuario_f.php?log=erro8');
	}
	mysqli_close($abc);
	// echo "Usuario excluido com sucesso";
	unset($_GET['cod']);
	$_SESSION['autenticado'] = 'NAO';
	session_destroy();
	sleep(2);
	header("Location:cilbpagina.php");

}



?>
<br> <br>
<A href="editar_usuario_f.php?sai=sair">Clique aqui para fazer Logout.</A> 
<?php
if(isset($_GET['sai']) && $_GET['sai'] == 'sair')
{
	$_SESSION['autenticado'] = 'NAO';
	sleep(2);
	session_destroy();
	header('Location:cilbpagina.php');
}

if(isset($_GET['log']) && $_GET['log'] == 'erro5')
{
	Echo "<br /> <br/>";
	echo "Arquivo inválido!";
}

if(isset($_GET['log']) && $_GET['log'] == 'erro6')
{
	Echo "<br /> <br />";
	echo "Tipo de arquivo inválido!";
}

if(isset($_GET['log']) && $_GET['log'] == 'erro7')
{
	Echo "<br /> <br/>";
	echo "Erro no envio do arquivo!";
}

if(isset($_GET['log']) && $_GET['log'] == 'erro8')
{
	Echo "<br /> <br/>";
	echo "Falha na conexao!";
}

if(isset($_GET['log']) && $_GET['log'] == 'erro9')
{
	Echo "<br /> <br/>";
	echo "Email ou CPF já existente!";
}


if(isset($_GET['log']) && $_GET['log'] == 'ok')
{
	Echo "<br /> <br/>";
echo "Alteração feita com sucesso";
}

?>

</body>
</html>


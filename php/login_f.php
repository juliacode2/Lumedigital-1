<!DOCTYPE html> 
 <html lang="pt-br">
<head>
		<title> Login </title>
		<meta charset="utf-8">
	</head>
   <body> 

<p><h1> Entre com email e senha </h1> </p>

<form method="post" action="../controladores/controle_login_f.php">

<label for="name"> Email: </label>
<input type="text" id="name" name="email_usu" size="60" maxlength="60" /> <br /> <br />

<label for="email">Senha: </label>
<input type="password" id="senha" name="senha" size="15" maxlength="15" /> <br /> <br />

<input type="submit" value="Entrar" name="submit" /> <br />

</form>


<form method="post" action="cadastrar_f.php">
<INPUT type="hidden" name="cadastro"/>
<input type="submit" value="Cadastrar"/> 
</form>
  <br />
  
<form method="post" action="editar_excluir_f.php">
<INPUT type="hidden" name="edit_excl"/>
<input type="submit" value="Editar/Excluir"/> 
</form>
  <br />
  
<br /> <br />


</form>

<?php

if(isset($_GET['invalido']))
{
	echo "Email ou senha inválidos!";
}

if(isset($_GET['sucesso']))
{
	echo "Cadastro feito com sucesso. Faça login.";
}
?>

<br> <br> 
<A href="../index.php">Clique aqui para voltar à página inicial.</A>

</bory>
</html>





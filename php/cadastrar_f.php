<!DOCTYPE html>
<html>

<head>

<title>Cadastrar</title>
<meta charset="utf-8">

</head>

<body>


<h2>Cadastro</h2>


<p><h1> Preencha os campos abaixo para Cadastrar </h1> </p>

<form method="POST" action="controle_cadastro_f.php">

<label for="name"> Nome: </label>
<input type="text" id="name" name="cad_nome" size="50" maxlength="50" /> <br /> <br />

<label for="name"> Sexo: </label>
<input type="radio" id="name" name="cad_sexo" value="Masculino" /> 
<label for="name"> Masculino </label>
<input type="radio" id="name" name="cad_sexo" value="Feminino" /> 
<label for="name"> Feminino </label>
<br /> <br />

<label for="name"> Data de nascimento: </label>
<input type="text" id="dat" name="cad_data" size="10" maxlength="10" /> <br /> <br />

<label for="name"> CPF: </label>
<input type="text" id="cp" name="cad_cpf" size="14" maxlength="14" /> <br /> <br />

<label for="name"> Email: </label>
<input type="text" id="us" name="cad_email" size="60" maxlength="60" /> <br /> <br />

<label for="name"> Senha: </label>
<input type="password" id="se" name="cad_senha" size="15" maxlength="15" /> <br /> <br />


<input type="submit" value="Enviar" name="submit" /> 
<!-- <input type="submit" value="Cadastrar" name="submiti" /> -->
<!-- <a href="cadastrar.php"> <input type="button" value="Enviar" /> </a> -->
</form>
  <br />
  <?php
if(isset($_GET['ja_cadastrado']))
{
	echo "Usuário já cadastrado";
}

if(isset($_GET['branco'])) // && $_GET['branco'] == 'branc')
{
	echo "Preencha todos os campos";
}


?>

<br> <br> 
<A href="../index.php">Clique aqui para voltar à página inicial.</A>

</bory>
</html>

<!DOCTYPE html>
<html>

<head>

<title>editar_usuario</title>
<meta charset="utf-8">

</head>

<body>



<?php
session_start();
	
		if(isset($_POST['c_id']))
		{
			if(isset($_POST['c_sexo'])) // se o usuario marcou um dos sexos.
			{
				$sexo_u = $_POST['c_sexo'];
			}
			else    
				/* caso nao tenha alterado, abaixo continua o mesmo sexo. Foi criada uma variavel de sessão mais acima
				  porque houve um outro post, e a variavel $sexo anterior se perdeu. Mas, a de sessão não se perde */
			{
				$sexo_u = $_SESSION['sex']; 
			}
			if (!empty($c_senha)) 
			{
				$senha_u = password_hash($c_senha, PASSWORD_DEFAULT);
			} 
			else 
			{
				// Recupera o hash original do banco se não foi alterado
				require 'classe_usuario_f.php'; // para executar a classe
				$u = new Usuario("db_login","localhost","root","");  // instanciando
				$email_usuario = $_POST['c_usuario'];
				$dados = $u->pesquisar_Para_Alterar_Usuario($email_usuario); // buscamos os dados para manter a senha hasheada
				$senha_u = $dados['CAMPO_SENHA'];
			}
			$id_u = $_POST['c_id'];
			$nome_u = $_POST['c_nome'];
			$nascimento_u = $_POST['c_data'];
			$cpf_u = $_POST['c_cpf'];
			$email_u = $_POST['c_usuario'];
			if($u->alterarUsuario($id_u, $nome_u, $sexo_u, $nascimento_u, $cpf_u, $email_u, $senha_u))
			{
				$_SESSION['lembra_usu'] = $email_usu;
			} // para quando voltar no header abaixo, ir com o nr. de email novo, caso tenha sido alterado
			header("location:editar_usuario_f.php"); // recarregar a pagina e atualizar os dados no formulario
			exit();
		}
	
	
	?>
	



</body>
</html>


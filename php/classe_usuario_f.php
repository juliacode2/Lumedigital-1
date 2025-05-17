<?php
class Usuario
{
	private $pdo; // variável a ser usada nos métodos.
	public function __construct($dbname, $host, $user, $senha)
	{
		try
		{
			$this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
			// $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $this->pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER); // Tudo em minúsculo

		}
		catch (PDOException $e)
		{
			echo "Erro com banco de dados: ".$e->getMessge();
			exit();
		}
		catch (Exception $e)
		{
			echo "Erro genérico: ".$e->getMessage();
		}
	}
	
public function cadastrarUsuario($nom, $sex, $data_n, $cp, $usu, $sen)
{
		// antes de cadastrar, verificar se já está cadastrada:
		$cmd = $this->pdo->prepare("SELECT * FROM tb_usuario WHERE campo_usuario = :e or cpf = :c");
		$cmd->bindValue(":e", $usu);
		$cmd->bindValue(":c", $cp);
		$cmd->execute();
		if($cmd->rowCount() > 0)
		{
			return false;
		}
		else
		{
			$cmd = $this->pdo->prepare("INSERT INTO tb_usuario (nome, sexo, data_nasc, cpf, campo_usuario, campo_senha) VALUES (:n, :s, :d, :c, :u, :h)");
			$cmd->bindValue(":n", $nom);
			$cmd->bindValue(":s", $sex);
			$cmd->bindValue(":d", $data_n);
			$cmd->bindValue(":c", $cp);
			$cmd->bindValue(":u", $usu);
			// $cmd->bindValue(":h", $sen);
			$cmd->bindValue(":h", password_hash($sen, PASSWORD_DEFAULT));
			$cmd->execute();
			return true;
		}
}

public function alterarUsuario($id_usu, $nom, $sex, $dt_n, $cp, $usu, $senh)
{
	// colocamos acima o $id também, não para alterá-lo, mas para usá-lo no filtro.
	$cmd = $this->pdo->prepare("UPDATE tb_usuario SET nome = :n, sexo = :s, data_nasc = :d, cpf = :c, campo_usuario = :u, campo_senha = :h WHERE id = :i");
	$cmd->bindValue(":n", $nom);
	$cmd->bindValue(":s", $sex);
	$cmd->bindValue(":d", $dt_n);
	$cmd->bindValue(":c", $cp);
	$cmd->bindValue(":u", $usu);
	$cmd->bindValue(":h", $senh);
	
		
	$cmd->bindValue(":i", $id_usu);
	$cmd->execute();
	return;
		
}

public function excluirUsuario($email_usu)
{
	$cmd = $this->pdo->prepare("DELETE FROM tb_usuario WHERE CAMPO_USUARIO = :e");
	$cmd->bindValue(":e",$email_usu);
	$cmd->execute();
	return;
}

public function pesquisarUsuarioLogin($ema, $sen) 
{
	$res = array();  // para caso não venha nada do banco a variavel ser um array vazio e não dar erro
	$cmd = $this->pdo->prepare("SELECT * FROM tb_usuario WHERE CAMPO_USUARIO = :e");
	$cmd->bindValue(":e",$ema);
	// $cmd->bindValue(":s",$sen);
	$cmd->execute();
	
	if ($cmd->errorCode() != '00000')  // verificar erro de conexão
	{
        $error = $cmd->errorInfo();
        echo 'Erro na consulta SQL: ' . $error[2];  // Exibe o erro se houver
    }
	
	if ($cmd->rowCount() == 1) 
	{
	
        $dados = $cmd->fetch(PDO::FETCH_ASSOC);
        if (password_verify($sen, $dados['CAMPO_SENHA'])) 
		{
            return true;
        }
		else
		{
			return false;
		}
	}
	/*
	//outra forma:
	$dados = $cmd->fetch(PDO::FETCH_ASSOC); // retorna vazio se não encontrar
	if ($dados && password_verify($sen, $dados['CAMPO_SENHA'])) 
	{
		return true;
	} 
	else 
	{
		return false;
	}*/ 
 
}
public function pesquisar_Para_Alterar_Usuario($email_usu) 
{
	$cmd = $this->pdo->prepare("SELECT * FROM tb_usuario WHERE campo_usuario = :e");
	$cmd->bindValue(":e",$email_usu);
	$cmd->execute();
	$res = $cmd->fetch(PDO::FETCH_ASSOC);
	return $res;
}




	
	
	
	
	
	
}
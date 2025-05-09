<HTML>
 <HEAD>
  <TITLE>Gerenciando Registros</TITLE>
 </HEAD>
 <BODY>

  <FORM method="POST" action="gerencia-registro.php?acao=<?php echo $AcaoForm; ?>">

   <TABLE>
    <TR>
     <TD>Livro:</TD>
     <TD>
      <INPUT name="FormNomeLivro" maxlength=64 value="<?php echo $Livro; ?>">
     </TD>
    </TR>
    <TR>
     <TD>Autor:</TD>
     <TD>
      <INPUT name="FormNomeAutor" maxlength=32 value="<?php echo $Autor; ?>">
     </TD>
    </TR>
    <TR>
     <TD>Unidade:</TD>
     <TD>
      <INPUT name="FormNomeEditora" maxlength=16 value="<?php echo $Editora; ?>">
     </TD>
    </TR>
    <TR>
     <TD colspan=2 align=right>
 <?php 
    if(isset($_REQUEST["acao"]) && $_REQUEST["acao"] == "editar")
    { $NomeBotao = "Alterar"; }
    else
    { $NomeBotao = "Cadastrar"; } 

?> 
      <INPUT type="submit" value="<?php echo $NomeBotao; ?>">
     </TD>
    </TR>
   </TABLE>
  </FORM>
 </BODY>
</HTML>

<?php 
  
  // Projeto do livro Construindo aplicações Web com PHP e MySQL.
  
   # Dados para a conexão com o banco de dados
	 $servidor = 'localhost'; 		# Nome DNS ou IP do seu servidor HTTP
	 $usuario = 'root';       # Nome de usuário para acesso ao MySQL
	 $senha = NULL;      	    # Senha de acesso
	 $banco = 'bancomo';   		  # Nome do banco de dados
  
   # Executa a conexão com o MySQL
   $link = mysqli_connect($servidor, $usuario, $senha, $banco)
    or die('Não foi possivel conectar: '.mysqli_error($link));
  
  if(isset($_REQUEST["acao"]) && $_REQUEST["acao"] == "editar")
  {
   $sql = "INSERT INTO LIVROS(LIVROS, AUTOR, UNIDADE, DESCRICAO)(";
   $SQL ,="'".$_POST ['FORMLIVROS']
   $SQL ,="'".$_POST ['FORMAUTOR']
   $SQL ,="'".$_POST ['FORMIDIOMA']
   $SQL ,="'".$_POST ['FORMDESCRISAO']

    $result = mysqli_query ($link, $sql);
    if (!$result)
    { die ('Erro: '.mysqli_error ($link)); }
    else
    {echo 'A operacao foi relizada com sucesso';}
  }
?>

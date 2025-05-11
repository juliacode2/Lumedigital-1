<!DOCTYPE html>

<head>
<title>Cadastro</title>
<meta charset="utf-8">
<style>
</style>
</head>

<body>

<p><h1> Preencha o formulário: </h1> </p>
<form method="post" action="report.php">

<label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <label for="confirmaSenha">Confirme sua senha:</label>
            <input type="password" id="confirmaSenha" name="confirmaSenha" required>



            <button type="submit">Cadastrar</button><br>

            <form method="post" action="cad1.php">
<INPUT type="hidden" name="cadastro"/>
<button type="submit">Editar</button><br>

<form method="post" action="editar_excluir.php">
<INPUT type="hidden" name="edit_excl"/>
<button type="submit">Excluir</button><br><br>
</form>
</form>
</div>
</body>

</html>
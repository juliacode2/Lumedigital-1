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

</form>
</div>
        
    <div class="container1">
        <form action= "validacadastro.php" method="post">
            <label for="endereco">CEP:</label>
            <input type="text" id="cep" name="cep" required>
            <label for="endereco">BAIRRO:</label>
            <input type="text" id="bairro" name="bloco" required>
            <label for="endereco">NÚMERO:</label>
            <input type="number" id="num" name="num" required>
            <label for="endereco">CIDADE:</label>
            <input type="text" id="cep" name="cep" required>
            <label for="endereco">COMPLEMENTO:</label>
            <input type="text" id="cep" name="cep" required>

            <button type="submit">Cadastrar</button><br>

            <form method="post" action="cad1.php">
<INPUT type="hidden" name="cadastro"/>
<button type="submit">Editar</button><br>

<form method="post" action="editar_excluir.php">
<INPUT type="hidden" name="edit_excl"/>
<button type="submit">Excluir</button><br><br>
</form>

</body>

</html>
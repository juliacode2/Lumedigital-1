<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Cadastro de Livros</title>
  <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #dab3e9;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .container {
        background: #ab97d1;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        width: 500px;
    }
    input, textarea {
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #414c87;
        border-radius: 4px;
        width: 95%;
    }
    button {
        background-color: #a879c7;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        transition: background-color 0.3s;
    }
    button:hover {
        background-color: #ca45c4;
    }
    img {
        margin-top: 10px;
        max-width: 100px;
        border: 2px solid #333;
        border-radius: 6px;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>CADASTRAR LIVRO</h2>

  <form method="post" action="ima.php" enctype="multipart/form-data">

    <!-- ID opcional -->
    <label for="id">ID (opcional):</label>
    <input type="number" id="id" name="id">

    <label for="name">Nome:</label>
    <input type="text" id="name" name="name" maxlength="40" required>

    <label for="autor">Autor:</label>
    <input type="text" id="autor" name="autor" maxlength="40" required>

    <label for="unidade">Unidade:</label>
    <input type="text" id="unidade" name="unidade" maxlength="35" required>

    <label for="idioma">Idioma:</label>
    <input type="text" id="idioma" name="idioma" maxlength="35" required>

    <label for="descricao">Descrição:</label>
    <input type="text" id="descricao" name="descriscao" maxlength="255" required>

    <label for="imagem">Imagem (foto da capa):</label>
    <input type="file" name="imagem" id="imagem" accept="image/*" required onchange="previewImagem()">

    <div id="preview"></div>

    <button type="submit">Adicionar</button>

  </form>
</div>

<script>
  function previewImagem() {
    const fileInput = document.getElementById('imagem');
    const preview = document.getElementById('preview');
    const file = fileInput.files[0];

    if (file && file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.onload = function (e) {
        preview.innerHTML = `<img src="${e.target.result}" alt="Pré-visualização da imagem">`;
      };
      reader.readAsDataURL(file);
    } else {
      preview.innerHTML = '';
    }
  }
</script>

</body>
</html>
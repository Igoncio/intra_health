<?php
require_once __DIR__ . '/../vendor/autoload.php';
include '../includes/menu.php';
include '../includes/php/permissoes.php';
include '../includes/php/config_user.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/config_usuario.css">

    <title>Configuração de Usuario</title>
</head>
<body>
  
<form action="#" method="POST">
        <h1 id="titulo">Configuração de Usuario</h1>

        <div class="area-img">
            <img src="img.png" id="imgperfil">
            <input type="file" id="inputFile" style="display: none;">
            <h1 class="nome">Roberto da Conceissao</h1>
        </div>

        <label for="folder-name">Setor:</label>
        <select name="id_grupo" id="">
            <option value="">T.I</option>
        </select>

        <label for="folder-name">Telefone:</label>
        <input type="text" id="folder-name" name="telefone" placeholder="Digite o telefone" required>

        <label for="folder-name">senha:</label>
        <input type="text" id="folder-name" name="senha_hash" placeholder="Digite a senha" required>

        <div class="button-container">
            <button id="botao" type="submit">Salvar</button>
            <a class="a-btn" id="botao2" href="home.php">Voltar</a>
        </div>
    </form>



        <script> 
        const image = document.querySelector("#imgperfil"),
          input = document.querySelector("#inputFile");

            image.addEventListener("click", () => {
                input.click();
            });

            input.addEventListener("change", () => {
                if (input.files.length > 0) {
                    image.src = URL.createObjectURL(input.files[0]);
                }
            });
        </script>

</body>
</html>
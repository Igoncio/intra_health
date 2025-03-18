<?php
require_once __DIR__ . '/../vendor/autoload.php';
include '../includes/menu.php';
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
            <h1 class="nome"><?php echo $nome_user; ?></h1>
        </div>

        <label for="folder-name">Setor:</label>
        <select name="id_grupo" id="">
            <option value="<?php echo $id_grupo; ?>"><?php echo $nome_grupo; ?></option>
        </select>

        <label for="folder-name">Telefone:</label>
        <input type="text" id="folder-name" name="telefone" value="<?php echo $telefone;?>" required>

        <label for="folder-name">senha:</label>
        <a id="alterar_senha" href="acesso_alterar_senha.php">Clique aqui para alterar a senha</a>
     

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
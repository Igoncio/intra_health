<?php
require_once __DIR__ . '/../vendor/autoload.php';
include '../includes/menu.php';
include '../includes/php/alterar_senha.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/config_usuario.css">
    <title>Document</title>
</head>
<body>

    <form action="#" method="POST">  

        <h1>Alterar senha</h1>
        <h1 class="nome">Digite uma nova senha</h1>
        <label for="folder-name">senha:</label>
        <input type="text" id="folder-name" name="senha" placeholder="senha nova" required>


        <div class="button-container">
            <button id="botao" type="submit">Salvar</button>
            <a class="a-btn" id="botao2" href="home.php">Voltar</a>
        </div>

    </form>    


</body>
</html>
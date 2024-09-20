<?php
require_once __DIR__ . '/vendor/autoload.php';
include 'includes/php/index.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/index.css">
    
    <title>Document</title>
</head>
<body>
<h1 id="titulo"></h1>
    
    <form action="#" method="POST">  

        <h1>Entrar</h1>

        <label for="folder-name">email do Usuario:</label>
        <input type="text" id="folder-name" name="nome" placeholder="Digite o seu email" required>
        
        <label for="folder-name">Senha:</label>
        <input type="password" id="folder-name" name="senha" placeholder="Digite a sua senha" required>

       
            
        <button id="botao" type="submit">Entrar</button>

    </form>

</body>
</html>
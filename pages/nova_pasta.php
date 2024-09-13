<?php
require_once __DIR__ . '/../vendor/autoload.php';
include '../includes/menu.php';
include '../includes/php/nova_pasta.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/nova_pasta.css">
    <title>Nova Pasta</title>
</head>
<body>

    <h1 id="titulo">Criar Nova Pasta</h1>
    
    <form action="#" method="POST">
    <select name="id_grupo" id="">
        <option value="">Selecione o grupo</option>
        <option value="1">Financeiro</option>
        <option value="2">Comercial</option>
        <option value="3">Administrativo</option>
        <option value="4">T.I</option>
    </select>
    
    
        <label for="folder-name">Nome da Pasta:</label>
        <input type="text" id="folder-name" name="nome" placeholder="Digite o nome da pasta" required>
        
        <button id="botao" type="submit">Criar Pasta</button>
    </form>


</body>
</html>

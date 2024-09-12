<?php
include '../includes/menu.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/nova_pasta.css">
    <title>Nova Pasta</title>
</head>
<body>

    <h1 id="titulo">Criar Nova SubPasta</h1>
    
    <form action="#" method="POST">
    <select name="" id="">
        <option value="">Selecione a pasta</option>
        <option value="">2024</option>
        <option value="">2023</option>
    </select>
    
    
        <label for="folder-name">Nome da SubPasta:</label>
        <input type="text" id="folder-name" name="folder-name" placeholder="Digite o nome da pasta" required>
        
        <button id="botao" type="submit">Criar SubPasta</button>
    </form>


</body>
</html>

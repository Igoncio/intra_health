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

    
    <form action="#" method="POST">
        <h1 id="titulo">Criar Nova Pasta</h1>

        <select name="id_grupo" id="">
            <option value="">Selecione o grupo</option>
            
            <?php if($acesso_financeiro):?>
            <option value="1">Financeiro</option>
            <?php endif;
            ?>
            
            <?php if($acesso_comercial):?>
            <option value="2">Comercial</option>
            <?php endif;?>
            
            <?php if($acesso_adm):?>
            <option value="3">Administrativo</option>
            <?php endif;?>

            <?php if($acesso_ti):?>
            <option value="4">T.I</option>
            <?php endif;?>
        </select>
    
    
        <label for="folder-name">Nome da Pasta:</label>
        <input type="text" id="folder-name" name="nome" placeholder="Digite o nome da pasta" required>
        
        <div class="button-container">
            <button id="botao" type="submit">Criar Pasta</button>
            <button id="botao2" onclick="history.back()">Voltar</button>
        </div>
    
    </form>


</body>
</html>

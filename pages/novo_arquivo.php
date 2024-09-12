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

    <h1 id="titulo">Criar Novo Arquivo</h1>
    
    <form action="#" method="POST">  

        <label for="folder-name">Selecione a pasta</label>
        <select name="pasta" id="pasta">
            <option value="">Selecione a pasta</option>
            <option value="orcamentos">Orçamentos</option>
            <option value="clausulas">Cláusulas</option>
        </select>

        <select name="pasta" id="pasta">
            <option value="">Selecione a SubPasta</option>
            <option value="orcamentos">2024</option>
            <option value="clausulas">2023</option>
        </select>
        
        <label for="folder-name">Nome do arquivo:</label>
        <input type="text" id="folder-name" name="folder-name" placeholder="Digite o nome do arquivo" required>
        
        <fieldset>
            <legend>Selecione uma opção</legend>
            <div class="radio-group">
                <input type="radio" id="opcao1" name="opcao" value="pronto">
                <label for="opcao1">Irei adicionar um arquivo já pronto</label>
            </div>
            <div class="radio-group">
                <input type="radio" id="opcao2" name="opcao" value="editor">
                <label for="opcao2">Irei usar o editor de texto do sistema</label>
            </div>
        </fieldset>
        
        <button id="botao" type="submit">Criar Arquivo</button>
    </form>

</body>
</html>

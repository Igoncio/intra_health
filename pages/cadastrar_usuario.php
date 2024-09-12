<?php
include '../includes/menu.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/cadastrar_usuario.css">
    
    <title>Document</title>
</head>
<body>
<h1 id="titulo">Cadastrar Usuario</h1>
    
    <form action="#" method="POST">  
        
        <label for="folder-name">Selecione o grupo</label>
        <select name="pasta" id="pasta">
            <option value="">Selecione o grupo</option>
            <option value="orcamentos">Financeiro</option>
            <option value="clausulas">Recursos Humanos</option>
            <option value="clausulas">Comercial</option>
            <option value="clausulas">T.I</option>
        </select>

        <label for="folder-name">Selecione o tipo de permissão</label>
        <select name="pasta" id="pasta">
            <option value="">Selecione o tipo de permissão</option>
            <option value="orcamentos">Financeiro</option>
            <option value="orcamentos">Financeiro/adm</option>
            <option value="clausulas">Comercial</option>
            <option value="clausulas">Comercial/adm</option>
            <option value="clausulas">ADM SUPREMO</option>
        </select>


        <label for="folder-name">Nome do Usuario:</label>
        <input type="text" id="folder-name" name="folder-name" placeholder="Digite o nome do usuario" required>
        
        <label for="folder-name">Telefone:</label>
        <input type="text" id="folder-name" name="folder-name" placeholder="Digite o telefone" required>

        <label for="folder-name">email:</label>
        <input type="text" id="folder-name" name="folder-name" placeholder="Digite o email" required>

        <label for="folder-name">senha:</label>
        <input type="text" id="folder-name" name="folder-name" placeholder="Digite a senha" required>
            
        <button id="botao" type="submit">Cadastrar Usuario</button>

    </form>

</body>
</html>
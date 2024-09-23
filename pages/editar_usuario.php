<?php
require_once __DIR__ . '/../vendor/autoload.php';
// include '../includes/menu.php';
include '../includes/php/editar_user.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/cadastrar_usuario.css">
    
    <title>Document</title>
</head>
<body>
<h1 id="titulo">Editar Usuario</h1>
    
    <form action="#" method="POST">  
        
        <label for="folder-name">Selecione o grupo</label>
        <select name="pasta" id="pasta">
            <option value="<?php echo $user['id_grupo']; ?>"><?php echo  $user['nome_grupo']; ?></option>
            <option value="1">Financeiro</option>
            <option value="2">Recursos Humanos</option>
            <option value="3">Comercial</option>
            <option value="4">T.I</option>
        </select>

        <label for="folder-name">Selecione o tipo de permissão</label>
        <select name="pasta" id="pasta">
            <option value="<?php echo $user['id_permissao']; ?>"><?php echo  $user['nome_permissao']; ?></option>
            <?=$lista_perm?>
        </select>


        <label for="folder-name">Nome do Usuario:</label>
        <input type="text" id="folder-name" name="folder-name" placeholder="<?php echo  $user['nome']; ?>" required>
        
        <label for="folder-name">Telefone:</label>
        <input type="text" id="folder-name" name="folder-name" placeholder="<?php echo  $user['telefone']; ?>" required>

        <label for="folder-name">email:</label>
        <input type="text" id="folder-name" name="folder-name" placeholder="<?php echo  $user['email']; ?>" required>

        <label for="folder-name">senha:</label>
        <input type="text" id="folder-name" name="folder-name" placeholder="<?php echo  $user['senha']; ?>" required>
            
        <button id="botao" type="submit">Salvar</button>

    </form>

</body>
</html>
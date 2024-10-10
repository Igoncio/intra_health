<?php
require_once __DIR__ . '/../vendor/autoload.php';
include '../includes/menu.php';
include '../includes/php/usuario.php';

if ($cad_user == 0) {
    die("<span id='msg_perm'> Você não tem permissão, por isso não pode acessar</span>");
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/cadastrar_usuario.css">
    <link rel="stylesheet" href="../assets/css/nova_pasta.css">
    
    <title>cadastrar usuario</title>
</head>
<body>
    
    <form action="#" method="POST">  
        <h1 id="titulo">Cadastrar Usuario</h1>
        
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

        <label for="folder-name">Selecione o tipo de permissão</label>
        <select name="id_permissao" id="pasta">
        <option value="">Selecione o tipo de permissão</option>
        <?=$lista_perm?>
        </select>

        <label for="folder-name">Nome do Usuario:</label>
        <input type="text" id="folder-name" name="nome" placeholder="Digite o nome do usuario" required>
        
        <label for="folder-name">Telefone:</label>
        <input type="text" id="folder-name" name="telefone" placeholder="Digite o telefone" required>

        <label for="folder-name">email:</label>
        <input type="text" id="folder-name" name="email" placeholder="Digite o email" required>

        <label for="folder-name">senha:</label>
        <input type="text" id="folder-name" name="senha_hash" placeholder="Digite a senha" required>
            
        <div class="button-container">
            <button id="botao" type="submit">Criar Usuario</button>
            <a class="a-btn" id="botao2" href="home.php">Voltar</a>
        </div>
    </form>

</body>
</html>
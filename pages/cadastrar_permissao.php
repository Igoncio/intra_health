<?php
require_once __DIR__ . '/../vendor/autoload.php';
include '../includes/menu.php';
include '../includes/php/permissoes.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/cadastrar_permissao.css">
    
    <title>Document</title>
</head>
<body>
<h1 id="titulo">Cadastrar Grupo de Permissões</h1>
    
    <form action="#" method="POST">  
        
        <label for="folder-name">Nome do Grupo:</label>
        <input type="text" id="folder-name" name="folder-name" placeholder="Digite o nome do grupo" required>
            
        <section class="perm-chama">
            <label id="titulo">Acesso aos grupos:</label>
            <div class="area-perm">
                
                <label class="container-check">
                    <input type="checkbox" name="acesso_financeiro" value="1">
                    <div>Financeiro</div>
                </label>

                <label class="container-check">
                    <input type="checkbox" name="acesso_comercial" value="1">
                    <div>Comercial</div>
                </label>

                <label class="container-check">
                    <input type="checkbox" name="acesso_administrativo" value="1">
                    <div>Administrativo</div>
                </label>

                <label class="container-check">
                    <input type="checkbox" name="acesso_ti" value="1">
                    <div>T.I</div>
                </label>

            </div>
        </section>


        <section class="perm-chama">
            <label id="titulo">Cadastros:</label>
            <div class="area-perm">
                
                <label class="container-check">
                    <input type="checkbox" name="cad_pasta" value="1">
                    <div>Nova Pasta</div>
                </label>

                <label class="container-check">
                    <input type="checkbox" name="cad_arquivo" value="1">
                    <div>Novo Arquivo</div>   
                </label>   

                <label class="container-check">
                    <input type="checkbox" name="cad_usuario" value="1">
                    <div>Novo Usuario</div>   
                </label>

                <label class="container-check">
                    <input type="checkbox" name="cad_grupo" value="1">
                    <div>Nova Grupo de Permissões</div>                
                </label>

            </div>
        </section>


        <section class="perm-chama">
            <label id="titulo">Editar:</label>
            <div class="area-perm">

                <label class="container-check">
                    <input type="checkbox" name="edit_pasta" value="1">
                    <div>Editar Pasta</div>
                </label>

                <label class="container-check">
                    <input type="checkbox" name="edit_arquivo" value="1">
                    <div>Editar Arquivo</div>
                </label>

                <label class="container-check">
                    <input type="checkbox" name="edit_usuario" value="1">
                    <div>Editar Usuario</div>
                </label>

            </div>
        </section>


        <section class="perm-chama">
            <label id="titulo">Excluir:</label>
            <div class="area-perm">

                <label class="container-check">
                    <input type="checkbox" name="excluir_pasta" value="1">
                    <div>Excluir Pasta</div>
                </label>

                <label class="container-check">
                    <input type="checkbox" name="excluir_arquivo" value="1">
                    <div>Excluir Arquivo</div>
                </label>

                <label class="container-check">
                    <input type="checkbox" name="excluir_usuario" value="1">
                    <div>Excluir Usuario</div>
                </label>
                
                <label class="container-check">
                    <input type="checkbox" name="excluir_grupo" value="1">
                    <div>Excluir Grupo de Permissões</div>
                </label>

            </div>
        </section>


        <button id="botao" type="submit">Cadastrar Usuario</button>

    </form>

</body>
</html>

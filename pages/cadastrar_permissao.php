<?php
include '../includes/menu.php';
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
                <input type="checkbox" >
                <div for="">Financeiro</div>
            </label>

            <label class="container-check">
                <input type="checkbox">
                <div for="">Comercial</div>
            </label>

            <label class="container-check">
                <input type="checkbox">
                <div for="">Administrativo</div>
            </label>

            </div>
        </section>


        <section class="perm-chama">
        <label id="titulo">Cadastros:</label>
            <div class="area-perm">
                
            <label class="container-check">
                <input type="checkbox">
                <div for="">Nova Pasta</div>
            </label>

            <label class="container-check">
                <input type="checkbox">
                <div for="">Novo Arquivo</div>   
            </label>   


            <label class="container-check">
                <input type="checkbox">
                <div for="">Novo Usuario</div>   
            </label>

            <label class="container-check">
                <input type="checkbox">
                <div for="">Novo Grupo de Permissões</div>                
            </label>


            </div>
        </section>


        <section class="perm-chama">
        <label id="titulo" >Editar:</label>
            <div class="area-perm">

            <label class="container-check">
                <input type="checkbox">
                <div for="">Editar Pasta</div>
            </label>

            <label class="container-check">
                <input type="checkbox">
                <div for="">Editar Arquivo</div>
            </label>

            <label class="container-check">
                <input type="checkbox">
                <div for="">Editar Usuario</div>
            </label>

            </div>
        </section>
        


        <section class="perm-chama">
        <label id="titulo">Excluir:</label>
            <div class="area-perm">

            <label class="container-check">
                <input type="checkbox">
                <div for="">Excluir Pasta</div>
            </label>

            <label class="container-check">
                <input type="checkbox">
                <div for="">Excluir Arquivo</div>
            </label>


            <label class="container-check">
                <input type="checkbox">
                <div for="">Excluir Usuario</div>
            </label>
            
            <label class="container-check">
                <input type="checkbox">
                <div for="">Excluir Grupo de Permissões</div>
            </label>

            </div>
        </section>


        <button id="botao" type="submit">Cadastrar Usuario</button>

    </form>

</body>
</html>
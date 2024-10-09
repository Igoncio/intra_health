<?php
require_once __DIR__ . '/../vendor/autoload.php';
include '../includes/menu.php';
include '../includes/php/gerenciar_usuario.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/gerenciar_usuario.css">
    <title>Gerenciar Usuários</title>
    <!-- Link para Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>



    <h1 id="titulo"> Gerenciar Usuario</h1>


<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?= $lista_user ?>
        </tbody>
    </table>
</div>
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <p>Tem certeza que deseja excluir?</p>
        <div class="modal-actions">
            <button id="btn" onclick="confirmDelete()">Sim</button>
            <button  id="btn" onclick="closeModal()">Cancelar</button>
        </div>
    </div>
</div>
<a href="home.php"><button>voltar</button></a>

<script>function openModal() {
    document.getElementById("deleteModal").style.display = "block";
}

function closeModal() {
    document.getElementById("deleteModal").style.display = "none";
}


</script>

</body>
</html>

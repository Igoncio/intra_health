<?php
include '../includes/menu.php';
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
        <tr>
            <td>João Silva</td>
                <td>
                    <div class="actions">
                        <a href="editar_usuario.php"><span class="material-icons edit">edit</span></a>
                        <span class="material-icons delete" onclick="openModal()">delete</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>João Silva</td>
                <td>
                    <div class="actions">
                        <span class="material-icons edit">edit</span>
                        <span class="material-icons delete">delete</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>João Silva</td>
                <td>
                    <div class="actions">
                        <span class="material-icons edit">edit</span>
                        <span class="material-icons delete">delete</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>João Silva</td>
                <td>
                    <div class="actions">
                        <span class="material-icons edit">edit</span>
                        <span class="material-icons delete">delete</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>João Silva</td>
                <td>
                    <div class="actions">
                        <span class="material-icons edit">edit</span>
                        <span class="material-icons delete">delete</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>João Silva</td>
                <td>
                    <div class="actions">
                        <span class="material-icons edit">edit</span>
                        <span class="material-icons delete">delete</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>João Silva</td>
                <td>
                    <div class="actions">
                        <span class="material-icons edit">edit</span>
                        <span class="material-icons delete">delete</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>João Silva</td>
                <td>
                    <div class="actions">
                        <span class="material-icons edit">edit</span>
                        <span class="material-icons delete">delete</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>João Silva</td>
                <td>
                    <div class="actions">
                        <span class="material-icons edit">edit</span>
                        <span class="material-icons delete">delete</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>João Silva</td>
                <td>
                    <div class="actions">
                        <span class="material-icons edit">edit</span>
                        <span class="material-icons delete">delete</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>João Silva</td>
                <td>
                    <div class="actions">
                        <span class="material-icons edit">edit</span>
                        <span class="material-icons delete">delete</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>João Silva</td>
                <td>
                    <div class="actions">
                        <span class="material-icons edit">edit</span>
                        <span class="material-icons delete">delete</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Ana Oliveira</td>
                <td>
                    <div class="actions">
                        <span class="material-icons edit">edit</span>
                        <span class="material-icons delete">delete</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Pedro Santos</td>
                <td>
                    <div class="actions">
                        <span class="material-icons edit">edit</span>
                        <span class="material-icons delete">delete</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Maria Costa</td>
                <td>
                    <div class="actions">
                        <span class="material-icons edit">edit</span>
                        <span class="material-icons delete">delete</span>
                    </div>
                </td>
            </tr>
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
<button>voltar</button>

<script>function openModal() {
    document.getElementById("deleteModal").style.display = "block";
}

function closeModal() {
    document.getElementById("deleteModal").style.display = "none";
}

function confirmDelete() {
    // Adicione aqui o código para confirmar a exclusão
    alert("Usuário excluído!");
    closeModal();
}
</script>

</body>
</html>

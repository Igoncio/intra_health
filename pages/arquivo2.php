<?php
require_once __DIR__ . '/../vendor/autoload.php';
include '../includes/menu.php';
include '../includes/php/arquivo2.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor de Texto</title>
    <link rel="stylesheet" href="../assets/css/arquivo2.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
    
<div class="editor-container">

    <a class="link-btn" href="home.php">   
    <span class="material-icons">arrow_back</span>
    Voltar
    </a> 
    <h1 class="page-title"><?=$lista_nome?></h1>
    <i id="registros" class="fa-solid fa-clock-rotate-left"></i>
        <div id="uploadSection">
        <?=$lista?>
    </div>

    <div class="button-container" id="actionButtons" style="display: none;">
        <button id="reloadBtn" onclick="resetForm()">
            <span class="material-icons"></span>Selecionar outro arquivo
        </button>
    </div>
    
    <div class="preview-container" id="previewContainer"></div>
</div>

<div id="modalRegistros" class="modal">
    <div class="modal-content">
        <h2>Histórico de Registros</h2>
        <div class="area-registro">
            <div class="registro-cabecalho">
                <p id="nome">Responsável</p>
                <p id="acao">Ação</p>
                <p id="data_hora">Data e hora </p>
            </div>
        <div class="registros-2">


                <?= $lista_registros; ?>
            </div>


        </div>
    </div>
</div>

<script>
function hidePreview() {
    document.getElementById('previewContainer').style.display = 'none';
    document.getElementById('hidePreviewBtn').style.display = 'none';
    document.getElementById('uploadForm').style.display = 'block';
}

document.getElementById('registros').addEventListener('click', function() {
    document.getElementById('modalRegistros').style.display = 'block';
});

function fecharModal() {
    document.getElementById('modalRegistros').style.display = 'none';
}

window.onclick = function(event) {
    var modal = document.getElementById('modalRegistros');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
}
</script>
</body>
</html>

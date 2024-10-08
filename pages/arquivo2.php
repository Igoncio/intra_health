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
    <style>
        .button-container {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    
<div class="editor-container">

    <a class="link-btn" href="home.php">   
    <span class="material-icons">arrow_back</span>
    Voltar
    </a> 
    <h1 class="page-title"><?=$lista_nome?></h1>
    
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

<script>
function hidePreview() {
   
    document.getElementById('previewContainer').style.display = 'none';
    document.getElementById('hidePreviewBtn').style.display = 'none'
    document.getElementById('uploadForm').style.display = 'block';
}
</script>
</body>
</html>

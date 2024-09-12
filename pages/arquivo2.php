<?php
include '../includes/menu.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor de Texto</title>
    <link rel="stylesheet" href="../assets/css/arquivo2.css">
    <!-- Link do Google Material Icons para usar ícones -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        /* Estilo para alinhar os botões horizontalmente */
        .button-container {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
<div class="editor-container">
    <!-- Botão de voltar -->
    <button class="back-btn" onclick="window.history.back()">
        <span class="material-icons">arrow_back</span>
        Voltar
    </button>

    <!-- Título da página -->
    <h1 class="page-title">Orçamentos 2</h1>

    <!-- Seção para adicionar o arquivo -->
    <section class="file-upload-section"></section>
        
    <!-- Formulário de upload -->
    <form id="uploadForm" enctype="multipart/form-data">
        <!-- Campo de arquivo -->
        <input type="file" id="fileInput" name="file" accept=".pdf, .jpg, .jpeg, .png" required>
        <div class="button-container">
            <button type="submit">Enviar</button>
        </div>
    </form>

    <!-- Botões de Salvar e Recarregar (escondidos inicialmente) -->
    <div class="button-container" id="actionButtons" style="display: none;">
        <button id="saveBtn">Salvar</button>
        <button id="reloadBtn" onclick="resetForm()">
            <span class="material-icons"></span>Selecionar outro arquivo
        </button>
    </div>

    <!-- Container de visualização -->
    <div class="preview-container" id="previewContainer">
        <!-- O conteúdo será atualizado via JavaScript -->
    </div>
</div>

<script>
    document.getElementById('uploadForm').addEventListener('submit', function(event) {
        event.preventDefault();

        var fileInput = document.getElementById('fileInput');
        var file = fileInput.files[0];
        var previewContainer = document.getElementById('previewContainer');
        var actionButtons = document.getElementById('actionButtons');
        var uploadForm = document.getElementById('uploadForm');

        if (file) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var fileType = file.type;
                var fileUrl = e.target.result;

                previewContainer.innerHTML = '';
                actionButtons.style.display = 'flex'; // Mostra os botões de ação
                uploadForm.style.display = 'none'; // Esconde o formulário após o envio

                if (fileType.startsWith('image/')) {
                    // Exibe a imagem
                    var img = document.createElement('img');
                    img.src = fileUrl;
                    previewContainer.appendChild(img);
                } else if (fileType === 'application/pdf') {
                    // Exibe o PDF
                    var iframe = document.createElement('iframe');
                    iframe.src = fileUrl;
                    iframe.width = '100%';
                    iframe.height = '600px';
                    previewContainer.appendChild(iframe);
                } else {
                    previewContainer.textContent = 'Formato de arquivo não suportado.';
                }
            };

            reader.readAsDataURL(file);
        }
    });

    document.getElementById('saveBtn').addEventListener('click', function() {
        var fileInput = document.getElementById('fileInput');
        var file = fileInput.files[0];

        if (file) {
            var formData = new FormData();
            formData.append('file', file);

            fetch('path/to/save.php', { // Altere para o caminho do seu script de salvamento
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert('Arquivo salvo com sucesso!');
                console.log(data);
            })
            .catch(error => {
                alert('Erro ao salvar o arquivo.');
                console.error('Erro:', error);
            });
        } else {
            alert('Nenhum arquivo selecionado.');
        }
    });

    // Função para "resetar" o formulário e limpar a seleção de arquivo
    function resetForm() {
        var fileInput = document.getElementById('fileInput');
        var previewContainer = document.getElementById('previewContainer');
        var actionButtons = document.getElementById('actionButtons');
        var uploadForm = document.getElementById('uploadForm');

        // Limpa o campo de input do arquivo
        fileInput.value = '';
        previewContainer.innerHTML = ''; // Limpa a pré-visualização
        actionButtons.style.display = 'none'; // Esconde os botões de ação
        uploadForm.style.display = 'block'; // Mostra o formulário novamente
    }
</script>
</body>
</html>

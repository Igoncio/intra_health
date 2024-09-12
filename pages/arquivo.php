<?php
include '../includes/menu.php';

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor de Texto</title>
    <link rel="stylesheet" href="../assets/css/arquivo.css">
    <!-- Link do Google Material Icons para usar ícones -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="editor-container">
        <!-- Botão de voltar -->
        <button class="back-btn" onclick="window.history.back()">
            <span class="material-icons">arrow_back</span>
            Voltar
        </button>

        <!-- Título da página -->
        <h1 class="page-title">Orçamentos</h1>

        <!-- Barra de formatação que aparece ao habilitar a edição -->
        <div class="toolbar" id="toolbar" style="display: none;">
            <button class="format-btn" onclick="formatText('bold')"><span class="material-icons">format_bold</span></button>
            <button class="format-btn" onclick="formatText('italic')"><span class="material-icons">format_italic</span></button>
            <button class="format-btn" onclick="formatText('underline')"><span class="material-icons">format_underline</span></button>
            <button class="format-btn" onclick="formatText('justifyCenter')"><span class="material-icons">format_align_center</span></button>
            <button class="format-btn" onclick="formatText('justifyLeft')"><span class="material-icons">format_align_left</span></button>
            <button class="format-btn" onclick="formatText('justifyRight')"><span class="material-icons">format_align_right</span></button>
        </div>

        <div class="sheet" id="editable-text" contenteditable="false">
            Este é um texto simulado em uma folha, semelhante ao Word. Clique no ícone abaixo para habilitar a edição.
        </div>

        <div class="edit-icon-container">
            <span class="material-icons edit-icon" id="edit-icon">edit</span>
            <p>Editar</p>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editableText = document.getElementById("editable-text");
            const editIcon = document.getElementById("edit-icon");
            const toolbar = document.getElementById("toolbar");

            let isEditingEnabled = false;

            // Alternar edição e exibição da barra de ferramentas
            editIcon.addEventListener("click", function() {
                isEditingEnabled = !isEditingEnabled;

                if (isEditingEnabled) {
                    editableText.contentEditable = "true";
                    editableText.focus(); // Move o foco para o texto
                    editIcon.textContent = "done"; // Altera o ícone para indicar que a edição está habilitada
                    toolbar.style.display = "block"; // Exibe a barra de formatação
                } else {
                    editableText.contentEditable = "false";
                    editIcon.textContent = "edit"; // Volta o ícone para o modo de edição
                    toolbar.style.display = "none"; // Esconde a barra de formatação
                }
            });
        });

        // Função para aplicar formatação de texto
        function formatText(command) {
            document.execCommand(command, false, null);
        }
    </script>
</body>
</html>

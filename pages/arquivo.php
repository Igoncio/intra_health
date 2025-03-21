<?php
require_once __DIR__ . '/../vendor/autoload.php';
include '../includes/menu.php';
include '../includes/php/arquivo.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor de Texto</title>
    <link rel="stylesheet" href="../assets/css/arquivo.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="editor-container">
        <a class="link-btn" href="home.php">   
        <span class="material-icons">arrow_back</span>
        Voltar
        </a> 
        <i id="registros" class="fa-solid fa-clock-rotate-left"></i>

        <h1 class="page-title"><?=$lista_nome?></h1>

        <div class="toolbar" id="toolbar" style="display: none;">
            <button class="format-btn" onclick="formatText('bold')"><span class="material-icons">format_bold</span></button>
            <button class="format-btn" onclick="formatText('italic')"><span class="material-icons">format_italic</span></button>
            <button class="format-btn" onclick="formatText('underline')"><span class="material-icons">format_underline</span></button>
            <button class="format-btn" onclick="formatText('justifyCenter')"><span class="material-icons">format_align_center</span></button>
            <button class="format-btn" onclick="formatText('justifyLeft')"><span class="material-icons">format_align_left</span></button>
            <button class="format-btn" onclick="formatText('justifyRight')"><span class="material-icons">format_align_right</span></button>
        </div>

        <div class="sheet" id="editable-text" contenteditable="false">
            <?= $lista_id?>
        </div>


        <?php if($edit_arq):?>
        <div class="edit-icon-container">
            <span class="material-icons edit-icon" id="edit-icon">edit</span>
            <p>Editar</p>
        </div>

        <form  method="post">
            <textarea id="text-to-send" name="text" style="display:none;"></textarea>
            <button type="submit" class="send-btn">Salvar</button>
        </form>
        </div>
        <?php endif;?>

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
        document.addEventListener("DOMContentLoaded", function() {
            const editableText = document.getElementById("editable-text");
            const editIcon = document.getElementById("edit-icon");
            const toolbar = document.getElementById("toolbar");
            const textToSend = document.getElementById("text-to-send");

            let isEditingEnabled = false;

            editIcon.addEventListener("click", function() {
                isEditingEnabled = !isEditingEnabled;

                if (isEditingEnabled) {
                    editableText.contentEditable = "true";
                    editableText.focus();
                    editIcon.textContent = "done";
                    toolbar.style.display = "block";
                } else {
                    editableText.contentEditable = "false";
                    editIcon.textContent = "edit";
                    toolbar.style.display = "none";
                    // Atualiza o textarea com o conteúdo editável
                    textToSend.value = editableText.innerHTML;
                }
            });
        });

        function formatText(command) {
            document.execCommand(command, false, null);
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

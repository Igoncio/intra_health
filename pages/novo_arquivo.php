<?php
require_once __DIR__ . '/../vendor/autoload.php';
include '../includes/menu.php';
include '../includes/php/novo_arquivo.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/nova_pasta.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

    <title>Nova Pasta</title>
</head>
<body>

    <h1 id="titulo">Criar Novo Arquivo</h1>
    
    <form action="#" method="POST">  

        <label for="folder-name">Selecione a pasta</label>

        <select class="form-select" name="id_grupo" id="selectID">
            <option value="">Selecione o grupo</option>
                <?php
                $sql = "SELECT * FROM grupo";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    // Verifique o acesso com base no grupo
                    if (($row['id_grupo'] == 1 && $acesso_financeiro) ||
                        ($row['id_grupo'] == 2 && $acesso_comercial) ||
                        ($row['id_grupo'] == 3 && $acesso_adm) ||
                        ($row['id_grupo'] == 4 && $acesso_ti)) {
                        echo '<option value="' . $row['id_grupo'] . '">' . $row['nome'] . '</option>';
                    }
                }
                ?>
        </select>


        <select  class="form-select"  name="id_pasta" id="pasta"></select>


        <select  class="form-select"  name="id_subpasta" id="sub"></select>
        
        <label for="folder-name">Nome do arquivo:</label>
        <input type="text" id="folder-name" name="nome" placeholder="Digite o nome do arquivo" required>
        
        <fieldset>
            <legend>Selecione uma opção</legend>
            <div class="radio-group">
                <input type="radio" id="opcao1" name="editavel" value="1">
                <label for="opcao1">Irei adicionar um arquivo já pronto</label>
            </div>
            <div class="radio-group">
                <input type="radio" id="opcao2" name="editavel" value="0">
                <label for="opcao2">Irei usar o editor de texto do sistema</label>
            </div>
        </fieldset>
        
        <div class="button-container">
            <button id="botao" type="submit">Criar Arquivo</button>
            <button id="botao2" onclick="history.back()">Voltar</button>
        </div>
    </form>



    <script>
    $(document).ready(function(){
    $('#grupo').on('change', function(){
        var grupoID = $(this).val();
        if (grupoID) {
            $.ajax({
                type: 'POST',
                url: 'filtro2.php',
                data: { id_grupo: grupoID },
                success: function(html) {
                    $('#pasta').html(html);
                    $('#sub').html('<option value="">Selecione a pasta primeiro</option>'); 
                }
            }); 
        } else {
            $('#pasta').html('<option value="">Selecione o grupo primeiro</option>');
            $('#sub').html('<option value="">Selecione a pasta primeiro</option>'); 
        }
    });

    $('#pasta').on('change', function(){
        var pastaID = $(this).val();
        if (pastaID) {
            $.ajax({
                type: 'POST',
                url: 'filtro2.php',
                data: { id_pasta: pastaID },
                success: function(html) {
                    $('#sub').html(html);
                }
            }); 
        } else {
            $('#sub').html('<option value="">Selecione a pasta primeiro</option>'); 
        }
    });
});

    </script>
</body>
</html>

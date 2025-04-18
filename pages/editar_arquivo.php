<?php
require_once __DIR__ . '/../vendor/autoload.php';
include '../includes/menu.php';
include '../includes/php/editar_arquivo.php';

if ($edit_arq == 0) {
    die("<span id='msg_perm'> Você não tem permissão, por isso não pode acessar</span>");
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/nova_pasta.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

    <title>Editar Arquivo</title>
</head>
<body>

    
    <form action="#" method="POST">  
        <h1 id="titulo">Editar Arquivo</h1>

        <label for="folder-name">Selecione o grupo</label>

        <select class="form-select" name="id_grupo" id="grupo">
            <option value="">Selecione o grupo</option>
            <?php
            $sql = "SELECT * FROM grupo";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
        
                // Verifique o acesso com base no grupo
                if (($row['id_grupo'] == 1 && $acesso_financeiro) ||
                    ($row['id_grupo'] == 2 && $acesso_comercial) ||
                    ($row['id_grupo'] == 3 && $acesso_adm) ||
                    ($row['id_grupo'] == 4 && $acesso_ti)||
                    ($row['id_grupo'] == 5 && $acesso_mod) ||
                    ($row['id_grupo'] == 6 && $acesso_geral)
                    ) {
                    echo '<option value="' . $row['id_grupo'] . '">' . $row['nome'] . '</option>';
                }
            }
            ?>
        </select>


        <select  class="form-select"  name="id_arq" id="arq"></select>
        
        <label for="folder-name">Nome do Arquivo:</label>
        <input type="text" id="folder-name" name="nome" placeholder="Digite o nome que queira mudar" required>
        
        <div class="button-container">
            <button id="botao2" type="submit">salvar</button>
            <a class="a-btn" id="botao" href="home.php">Voltar</a>
        </div>
    </form>



    <script>
    $(document).ready(function(){
    $('#grupo').on('change', function(){
        var grupoID = $(this).val();
        if (grupoID) {
            $.ajax({
                type: 'POST',
                url: 'filtro4.php',
                data: { id_grupo: grupoID },
                success: function(html) {
                    $('#arq').html(html);
                }
            }); 
        } else {
            $('#arq').html('<option value="">Selecione o grupo primeiro</option>');
        }
    });


});

    </script>
</body>
</html>

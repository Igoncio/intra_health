<?php
require_once __DIR__ . '/../vendor/autoload.php';
include '../includes/menu.php';
include '../includes/php/editar_subpasta.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/nova_pasta.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

    <title>Nova Pasta</title>
</head>
<body>

    <h1 id="titulo">Editar Subpasta</h1>
    
    <form action="#" method="POST">  

        <label for="folder-name">Editar Pasta</label>

        <select class="form-select" name="id_grupo" id="grupo">
            <option value="">Selecione o grupo</option>
            <?php
            $sql = "SELECT * FROM grupo";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){?>
            <option value="<?php echo $row['id_grupo']?>"><?php echo $row['nome']?></option>
            <?php }?>
        </select>


        <select  class="form-select"  name="id_pasta" id="pasta"></select>


        <select  class="form-select"  name="id_subpasta" id="sub"></select>
        
        <label for="folder-name">Nome da Subpasta:</label>
        <input type="text" id="folder-name" name="nome" placeholder="Digite o nome que queira mudar" required>

        
        <div class="button-container">
            <button id="botao" type="submit">salvar</button>
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

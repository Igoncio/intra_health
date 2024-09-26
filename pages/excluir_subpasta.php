<?php
require_once __DIR__ . '/../vendor/autoload.php';
include '../includes/menu.php';
// include '../includes/php/novo_arquivo.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/nova_pasta.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

    <title>excluir subpasta</title>
</head>
<body>

    <h1 id="titulo">Excluir Subpasta</h1>
    
    <form action="#" method="POST">  

        <label for="folder-name">Excluir Pasta</label>

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
        
        
        <div class="button-container">
            <button id="botao2" type="submit">excluir</button>
            <button id="botao" onclick="history.back()">Voltar</button>
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

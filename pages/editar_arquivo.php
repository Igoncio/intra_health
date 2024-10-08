<?php
require_once __DIR__ . '/../vendor/autoload.php';
include '../includes/menu.php';
include '../includes/php/editar_arquivo.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/nova_pasta.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

    <title>Excluir Arquivo</title>
</head>
<body>

    <h1 id="titulo">Excluir Arquivo</h1>
    
    <form action="#" method="POST">  

        <label for="folder-name">Selecione o grupo</label>

        <select class="form-select" name="id_grupo" id="grupo">
            <option value="">Selecione o grupo</option>
            <?php
            $sql = "SELECT * FROM grupo";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){?>
            <option value="<?php echo $row['id_grupo']?>"><?php echo $row['nome']?></option>
            <?php }?>
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

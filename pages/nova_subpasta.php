<?php
require_once __DIR__ . '/../vendor/autoload.php';
include '../includes/menu.php';
include '../includes/php/nova_subpasta.php';

if ($cad_pasta == 0) {
    die("<span id='msg_perm'> Você não tem permissão, por isso não pode acessar</span>");
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/nova_pasta.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <title>Nova SubPasta</title>
</head>
<body>

    
    <form action="#" method="POST">
        <h1 id="titulo">Nova Subpasta</h1>

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
                    ($row['id_grupo'] == 4 && $acesso_ti)||
                    ($row['id_grupo'] == 5 && $acesso_mod) ||
                    ($row['id_grupo'] == 6 && $acesso_geral)
                    ) {
                    echo '<option value="' . $row['id_grupo'] . '">' . $row['nome'] . '</option>';
                }
            }
            ?>
    </select>

   
    <select  class="form-select"  name="id_pasta" id="show"></select>
    </div>
    
   </div>
    
    
        <label for="folder-name">Nome da subpasta:</label>
        <input type="text" id="folder-name" name="nome" placeholder="Digite o nome da subpasta" required>
        
        <div class="button-container">
            <button id="botao" type="submit">Nova subpasta</button>
            <a class="a-btn" id="botao2" href="home.php">Voltar</a>
        </div>
    </form>



    <script>
        $(document).ready(function(){
            $('#selectID').change(function(){
            var Stdid = $('#selectID').val(); 
        
            $.ajax({
                type: 'POST',
                url: 'filtro1.php',
                data: {id:Stdid},  
                success: function(data)  
                {
                    $('#show').html(data);
                }
                });
            });
        });
    </script>



</body>
</html>

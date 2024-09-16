<?php
require_once __DIR__ . '/../vendor/autoload.php';
include '../includes/menu.php';
include '../includes/php/nova_subpasta.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/nova_pasta.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <title>Nova Pasta</title>
</head>
<body>

    <h1 id="titulo">Criar Nova SubPasta</h1>
    
    <form action="#" method="POST">

    <select class="form-select" name="id_grupo" id="selectID">
        <option value="">Selecione o grupo</option>
        <?php
        $sql = "SELECT * FROM grupo";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){?>
        <option value="<?php echo $row['id_grupo']?>"><?php echo $row['nome']?></option>
       <?php }?>
        
    </select>


   
    <select  class="form-select"  name="id_pasta" id="show"></select>
    </div>
    
   </div>
    
    
        <label for="folder-name">Nome da SubPasta:</label>
        <input type="text" id="folder-name" name="nome" placeholder="Digite o nome da pasta" required>
        
        <button id="botao" type="submit">Criar SubPasta</button>
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

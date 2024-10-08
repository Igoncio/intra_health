<?php

include '.././App/Db/connPoo.php';


    $db = new PDO("mysql:host=localhost;dbname=intra_health", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_grupo = $_POST['id_grupo'];
        $nome = $_POST['nome'];

        // Prepara a consulta SQL de inserção
        $sql = "INSERT INTO pasta (id_grupo, nome) VALUES (:id_grupo, :nome)";
        $stmt = $db->prepare($sql);

        // Vincula os parâmetros
        $stmt->bindParam(':id_grupo', $id_grupo);
        $stmt->bindParam(':nome', $nome);

        // Executa a inserção
        if ($stmt->execute()) {
            echo "<script>alert('Pasta criada com sucesso!')</script>";
            header('location: home.php');
        } else {
            echo "Erro ao cadastrar o usuário.";
        }
    }

?>

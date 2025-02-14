<?php

include '.././App/Db/connPoo.php';

$db = new PDO("mysql:host=192.168.1.15;dbname=intra_health", "teste", "H3@LTH_2024");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_grupo = $_POST['id_grupo'];
        $nome = $_POST['nome'];

        //INSERT
        $sql = "INSERT INTO pasta (id_grupo, nome) VALUES (:id_grupo, :nome)";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':id_grupo', $id_grupo);
        $stmt->bindParam(':nome', $nome);

        if ($stmt->execute()) {
            echo "<script>alert('Pasta criada com sucesso!')</script>";
            header('location: home.php');
        } else {
            echo "Erro ao cadastrar o usuário.";
        }
    }

?>

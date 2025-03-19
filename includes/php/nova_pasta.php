<?php

include '.././App/Db/connPoo.php';

    $db = new PDO("mysql:host=$dbHost;dbname=intra_health", "$dbUsername", "$dbPassword");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_grupo = $_POST['id_grupo'];
        $nome = $_POST['nome'];

        $acao = "criou a pasta '$nome'";
        $id_log = $_SESSION['id_user'];

        //INSERT
        $sql = "INSERT INTO pasta (id_grupo, nome) VALUES (:id_grupo, :nome)";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':id_grupo', $id_grupo);
        $stmt->bindParam(':nome', $nome);

        if ($stmt->execute()) {

            $sql_log = "INSERT INTO log (id_user, acao)
            VALUES (:id_user, :acao)";
    
            $stmt_log = $db->prepare($sql_log);
            $stmt_log->bindParam(':id_user', $id_log);
            $stmt_log->bindParam(':acao', $acao);

            if($stmt_log->execute()){
            echo "<script>alert('Pasta criada com sucesso!')</script>";
            echo "<script>window.location.href = 'home.php';</script>";            }
        } else {
            echo "Erro ao cadastrar o usuário.";
        }
    }

?>

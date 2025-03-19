<?php

include '.././App/Db/connPoo.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pasta = $_POST['id_pasta'];
    $nome = $_POST['nome'];

    $acao = "criou a subpasta '$nome'";
    $id_log = $_SESSION['id_user'];

    $sql = "INSERT INTO subpasta (id_pasta, nome) VALUES (?, ?)";
    $stmt = $db->prepare($sql);

    $stmt->bind_param('is', $id_pasta, $nome);  // 'i' para integer e 's' para string

    if ($stmt->execute()) {

        $sql_log = "INSERT INTO log (id_user, acao) VALUES (?, ?)";
        $stmt_log = $db->prepare($sql_log);
        $stmt_log->bind_param('is', $id_log, $acao); 

        if($stmt_log->execute()){
        echo "<script>alert('Subpasta criada com sucesso!')</script>";
        header('location: home.php');
        }
    } else {
        echo "Erro ao cadastrar o usuário.";
    }
}


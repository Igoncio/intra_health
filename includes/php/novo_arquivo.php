<?php

include '.././App/Db/connPoo.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_grupo = $_POST['id_grupo'];
    $id_pasta = $_POST['id_pasta'];
    $id_subpasta = $_POST['id_subpasta'];
    $nome = $_POST['nome'];
    $editavel = isset($_POST['editavel']) ? intval($_POST['editavel']) : 0;

    $acao = "criou o arquivo '$nome'";
    $id_log = $_SESSION['id_user'];

    $checkSql = "SELECT COUNT(*) FROM arquivo WHERE nome = ?";
    $checkStmt = $db->prepare($checkSql);
    $checkStmt->bind_param('s', $nome);
    $checkStmt->execute();
    $checkStmt->bind_result($count);
    $checkStmt->fetch();
    $checkStmt->close();

    if ($count > 0) {
        echo "<script>alert('Não é permitido a repetição de nome de arquivos, tente novamente')</script>";
    } else {
        $sql = "INSERT INTO arquivo (id_grupo, id_pasta, id_subpasta, nome, editavel) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param('iiisi', $id_grupo, $id_pasta, $id_subpasta, $nome, $editavel);  // 'i' para integer e 's' para string

        if ($stmt->execute()) {
  
            $sql_log = "INSERT INTO log (id_user, acao) VALUES (?, ?)";
            $stmt_log = $db->prepare($sql_log);
            $stmt_log->bind_param('is', $id_log, $acao); 
            
            if ($stmt_log->execute()) {    
                echo "<script>alert('Arquivo cadastrado com sucesso!'); window.location.href='home.php';</script>";
                exit();
            }

        } else {
            echo "Erro ao cadastrar o arquivo.";
        }
    }
}

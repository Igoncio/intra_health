<?php

include '.././App/Db/connPoo.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pasta = $_POST['id_pasta'];
    $nome = $_POST['nome'];

    $sql = "INSERT INTO subpasta (id_pasta, nome) VALUES (?, ?)";
    $stmt = $db->prepare($sql);

    $stmt->bind_param('is', $id_pasta, $nome);  // 'i' para integer e 's' para string

    if ($stmt->execute()) {
        echo "<script>alert('Sub pasta cadastrada com sucesso!')</script>";
    } else {
        echo "Erro ao cadastrar o usuário.";
    }
}


<?php

include '.././App/Db/connPoo.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_grupo = $_POST['id_grupo'];
    $id_pasta = $_POST['id_pasta'];


    $sql = "DELETE FROM pasta WHERE id_pasta = ?";
    $stmt = $db->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('i', $id_pasta); 

        if ($stmt->execute()) {
            echo "Pasta excluída com sucesso!";
        } else {
            echo "Erro ao excluir a pasta: " . $stmt->error;
        }
    } else {
        echo "Erro ao preparar a declaração: " . $db->error;
    }

    $stmt->close();
}

$db->close();
?>

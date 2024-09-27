<?php

include '.././App/Db/connPoo.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_grupo = $_POST['id_grupo'];
    $id_subpasta = $_POST['id_subpasta'];

    // Primeiro, excluir arquivos relacionados à subpasta
    $sql2 = "DELETE FROM arquivo WHERE id_subpasta = ?";
    $stmt2 = $db->prepare($sql2);

    if ($stmt2) {
        $stmt2->bind_param('i', $id_subpasta); 

        if (!$stmt2->execute()) {
            echo "Erro ao excluir arquivos: " . $stmt2->error;
        }
        $stmt2->close();
    } else {
        echo "Erro ao preparar a declaração para arquivos: " . $db->error;
    }

    // Depois, excluir a subpasta
    $sql = "DELETE FROM subpasta WHERE id_subpasta = ?";
    $stmt = $db->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('i', $id_subpasta); 

        if ($stmt->execute()) {
            echo "<script>alert('Subpasta excluida com sucesso')</script>";
        } else {
            echo "Erro ao excluir a subpasta: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Erro ao preparar a declaração para subpasta: " . $db->error;
    }
}

$db->close();
?>

<?php

include '.././App/Db/connPoo.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_grupo = $_POST['id_grupo'];
    $id_pasta = $_POST['id_pasta'];

    // Prepare and execute the DELETE statements
    $sql2 = "DELETE FROM subpasta WHERE id_pasta = ?";
    $sql3 = "DELETE FROM arquivo WHERE id_pasta = ?";
    
    // First, delete subpastas
    $stmt2 = $db->prepare($sql2);
    if ($stmt2) {
        $stmt2->bind_param('i', $id_pasta); 
        if (!$stmt2->execute()) {
            echo "Erro ao excluir subpastas: " . $stmt2->error;
        }
        $stmt2->close();
    } else {
        echo "Erro ao preparar a declaração para subpastas: " . $db->error;
    }

    // Then, delete arquivos
    $stmt3 = $db->prepare($sql3);
    if ($stmt3) {
        $stmt3->bind_param('i', $id_pasta); 
        if (!$stmt3->execute()) {
            echo "Erro ao excluir arquivos: " . $stmt3->error;
        }
        $stmt3->close();
    } else {
        echo "Erro ao preparar a declaração para arquivos: " . $db->error;
    }

    // Finally, delete the pasta
    $sql = "DELETE FROM pasta WHERE id_pasta = ?";
    $stmt = $db->prepare($sql);
    if ($stmt) {
        $stmt->bind_param('i', $id_pasta); 
        if ($stmt->execute()) {
            echo "Pasta excluída com sucesso!";
        } else {
            echo "Erro ao excluir a pasta: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Erro ao preparar a declaração para pasta: " . $db->error;
    }

}

$db->close();
?>

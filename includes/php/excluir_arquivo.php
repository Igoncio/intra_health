<?php

include '.././App/Db/connPoo.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id_arq'])) {
        $id_arq = $_POST['id_arq'];
        $sql3 = "DELETE FROM arquivo WHERE id_arquivo = ?";

        $stmt2 = $db->prepare($sql3); 
        if ($stmt2) {
            $stmt2->bind_param('i', $id_arq); 
            if (!$stmt2->execute()) {
                echo "Erro ao excluir subpastas: " . $stmt2->error;
            } else {
                echo "<script>alert('Arquivo excluido com sucesso!')</script>";
                header('location: home.php');
            }
            $stmt2->close();
        } else {
            echo "Erro ao preparar a declaração para subpastas: " . $db->error;
        }
    } else {
        echo "ID do arquivo não fornecido.";
    }
}


<?php

include '../App/Db/connPoo.php';

if (isset($_POST["id_grupo"]) && !empty($_POST["id_grupo"])) { 
    $id_grupo = intval($_POST['id_grupo']);  
    $query = "SELECT * FROM arquivo WHERE id_grupo = ?";
    
    $stmt = $db->prepare($query);
    if ($stmt) {
        $stmt->bind_param('i', $id_grupo);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) { 
            echo '<option value="">Selecione o arquivo</option>'; 
            while ($row = $result->fetch_assoc()) {  
                echo '<option value="' . htmlspecialchars($row['id_arquivo'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($row['nome'], ENT_QUOTES, 'UTF-8') . '</option>'; 
            } 
        } else {
            echo '<option value="">Nenhum arquivo encontrado</option>';
        }
        $stmt->close();
    } else {
        echo 'Erro ao preparar a consulta: ' . $db->error;
    }
}

// Fechando a conexão
$db->close();

?>

<?php

include '../App/Db/connPoo.php';


// if (isset($_POST["id_grupo"]) && !empty($_POST["id_grupo"])) { 
//     $id_grupo = intval($_POST['id_grupo']);  
//     $query = "SELECT * FROM arquivo WHERE id_grupo = ?";
//     $stmt = $db->prepare($query);
//     $stmt->bind_param('i', $id_grupo);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     if ($result->num_rows > 0) { 
//         echo '<option value="">Selecione a pasta</option>'; 
//         while ($row = $result->fetch_assoc()) {  
//             echo '<option value="' . htmlspecialchars($row['id_arq'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($row['nome'], ENT_QUOTES, 'UTF-8') . '</option>'; 
//         } 
//     } else {
//         echo '<option value="">Nenhuma pasta encontrada</option>';
//     }
//     $stmt->close();
// }


if (isset($_POST["id_grupo"]) && !empty($_POST["id_grupo"])) { 
    $id_grupo = intval($_POST['id_grupo']);  
    $query = "SELECT * FROM pasta WHERE id_grupo = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('i', $id_grupo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) { 
        echo '<option value="">Selecione a pasta</option>'; 
        while ($row = $result->fetch_assoc()) {  
            echo '<option value="' . htmlspecialchars($row['id_pasta'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($row['nome'], ENT_QUOTES, 'UTF-8') . '</option>'; 
        } 
    } else {
        echo '<option value="">Nenhuma pasta encontrada</option>';
    }
    $stmt->close();
}


if (isset($_POST["id_pasta"]) && !empty($_POST["id_pasta"])) { 
    $id_pasta = intval($_POST['id_pasta']);  
    $query = "SELECT * FROM subpasta WHERE id_pasta = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('i', $id_pasta);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) { 
        echo '<option value="">Selecione a subpasta</option>'; 
        while ($row = $result->fetch_assoc()) {  
            echo '<option value="' . htmlspecialchars($row['id_subpasta'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($row['nome'], ENT_QUOTES, 'UTF-8') . '</option>'; 
        } 
    } else {
        echo '<option value="">Nenhuma subpasta encontrada</option>';
    }
    $stmt->close();
}

$db->close();
?>

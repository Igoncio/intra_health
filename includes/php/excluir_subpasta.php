<?php

include '.././App/Db/connPoo.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_grupo = $_POST['id_grupo'];
    $id_subpasta = $_POST['id_subpasta'];

    $sql2 = "DELETE FROM arquivo WHERE id_subpasta = ?";
    $stmt2 = $db->prepare($sql2);

    $sql_consulta = "SELECT nome_grupo, nome_pasta, nome_subpasta FROM vw_grupo_estrutura WHERE id_subpasta = ?";
    $stmt_consulta = $db->prepare($sql_consulta);

    if ($stmt_consulta) {
        $stmt_consulta->bind_param('i', $id_subpasta); 
        $stmt_consulta->execute();
        $stmt_consulta->store_result();

        if ($stmt_consulta) {
            $stmt_consulta->bind_param('i', $id_subpasta);
        
            if (!$stmt_consulta->execute()) {
                echo "Erro ao executar consulta: " . $stmt_consulta->error;
                exit;
            }
        
            $stmt_consulta->store_result();
            
            if ($stmt_consulta->num_rows > 0) {
                $stmt_consulta->bind_result($nome_grupo, $nome_pasta, $nome_subpasta);
                $stmt_consulta->fetch();
            } else {
                echo "Nenhum resultado encontrado para ID: " . $id_subpasta;
                exit;
            }
        }
    }

    if ($stmt2) {
        $stmt2->bind_param('i', $id_subpasta); 

        if (!$stmt2->execute()) {
            echo "Erro ao excluir arquivos: " . $stmt2->error;
        }
        $stmt2->close();
    } else {
        echo "Erro ao preparar a declaração para arquivos: " . $db->error;
    }

    $sql = "DELETE FROM subpasta WHERE id_subpasta = ?";
    $stmt = $db->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('i', $id_subpasta); 

        if ($stmt->execute()) {
            $acao = "excluiu a subpasta '$nome_subpasta' da pasta '$nome_pasta'";
            $id_log = $_SESSION['id_user'];
            $sql_log = "INSERT INTO log (id_user, acao) VALUES (?, ?)";
            $stmt_log = $db->prepare($sql_log);
            
            if ($stmt_log) {
                $stmt_log->bind_param('is', $id_log, $acao); 
                if ($stmt_log->execute()) {
                    echo "<script>alert('Subpasta excluída com sucesso!'); window.location.href='home.php';</script>";
                    exit(); 
                } else {
                    echo "Erro ao registrar log: " . $stmt_log->error;
                }
            } else {
                echo "Erro ao preparar a consulta de log: " . $db->error;
            }
        }}
$db->close();
        }

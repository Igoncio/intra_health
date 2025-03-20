<?php

include '.././App/Db/connPoo.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_grupo = $_POST['id_grupo'];
    $id_pasta = $_POST['id_pasta'];


    $sql_consulta = "SELECT nome_grupo, nome_pasta FROM vw_grupo_estrutura WHERE id_pasta = ?";
    $stmt_consulta = $db->prepare($sql_consulta);

    if ($stmt_consulta) {
        $stmt_consulta->bind_param('i', $id_pasta); 
        $stmt_consulta->execute();
        $stmt_consulta->store_result();

        if ($stmt_consulta->num_rows > 0) {
            $stmt_consulta->bind_result($nome_grupo, $nome_pasta);
            $stmt_consulta->fetch();
        } else {
            echo "Nenhum resultado encontrado.";
            exit;
        }

        $stmt_consulta->close();
    } else {
        die("Erro ao preparar a consulta: " . $db->error);
    }

    // Excluir subpastas
    $sql2 = "DELETE FROM subpasta WHERE id_pasta = ?";
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

    // Excluir arquivos
    $sql3 = "DELETE FROM arquivo WHERE id_pasta = ?";
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

    // Excluir a pasta
    $sql = "DELETE FROM pasta WHERE id_pasta = ?";
    $stmt = $db->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('i', $id_pasta);
        if ($stmt->execute()) {
            // Registrar a ação no log
            $acao = "excluiu a pasta '$nome_pasta' do grupo '$nome_grupo'";
            $id_log = $_SESSION['id_user'];
            $sql_log = "INSERT INTO log (id_user, acao) VALUES (?, ?)";
            $stmt_log = $db->prepare($sql_log);

            if ($stmt_log) {
                $stmt_log->bind_param('is', $id_log, $acao);
                if (!$stmt_log->execute()) {
                    echo "Erro ao registrar o log: " . $stmt_log->error;
                }
                $stmt_log->close();
            }

            echo "<script>alert('Pasta excluída com sucesso!'); window.location.href='home.php';</script>";
        } else {
            echo "Erro ao excluir a pasta: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Erro ao preparar a declaração para excluir a pasta: " . $db->error;
    }
}
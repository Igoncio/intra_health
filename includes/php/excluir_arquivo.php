<?php
include '.././App/Db/connPoo.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id_arq'])) {
        $id_arq = $_POST['id_arq'];

        $sql_consulta = "SELECT nome FROM arquivo WHERE id_arquivo = ?";
        $stmt_consulta = $db->prepare($sql_consulta);
        if ($stmt_consulta) {
            $stmt_consulta->bind_param('i', $id_arq);
            $stmt_consulta->execute();
            $stmt_consulta->bind_result($nome);
            $stmt_consulta->fetch();
            $stmt_consulta->close();
        } else {
            die("Erro ao preparar a consulta: " . $db->error);
        }

        $sql3 = "DELETE FROM arquivo WHERE id_arquivo = ?";
        $stmt2 = $db->prepare($sql3); 
        if ($stmt2) {
            $stmt2->bind_param('i', $id_arq); 
            if (!$stmt2->execute()) {
                die("Erro ao excluir arquivo: " . $stmt2->error);
            } else {
                $acao = "excluiu o arquivo '$nome'";
                $id_log = $_SESSION['id_user'];
                $sql_log = "INSERT INTO log (id_user, acao) VALUES (?, ?)";
                $stmt_log = $db->prepare($sql_log);
                if ($stmt_log) {
                    $stmt_log->bind_param('is', $id_log, $acao); 
                    if (!$stmt_log->execute()) {
                        die("Erro ao registrar log: " . $stmt_log->error);
                    } else {
                        echo "<script>alert('Arquivo excluído com sucesso!'); window.location.href='home.php';</script>";
                             
                    }
                
                } else {
                    die("Erro ao preparar a declaração para log: " . $db->error);
                }
            }
        } else {
            die("Erro ao preparar a declaração para excluir arquivo: " . $db->error);
        }
    } else {
        echo "ID do arquivo não fornecido.";
    }
}
?>
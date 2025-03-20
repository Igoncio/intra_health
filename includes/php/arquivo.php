<?php

include '.././App/Db/connPoo.php';

$db = new PDO("mysql:host=$dbHost;dbname=intra_health", "$dbUsername", "$dbPassword");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = isset($_GET['id']) ? $_GET['id'] : null;

$stmt = $db->prepare("SELECT texto FROM arquivo WHERE id_arquivo = :id");
$stmt->execute([':id' => $id]);

$lista_id = '';
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC); 
foreach ($dados as $row) {
    $textoAtual = html_entity_decode($row['texto'], ENT_QUOTES, 'UTF-8');
    $lista_id .= $textoAtual;
}

$stmt2 = $db->prepare("SELECT nome FROM arquivo WHERE id_arquivo = :id");
$stmt2->execute([':id' => $id]);

$lista_nome = '';
$dados2 = $stmt2->fetchAll(PDO::FETCH_ASSOC); 
foreach ($dados2 as $row2) {
    $lista_nome .= $row2['nome'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $texto = isset($_POST['text']) ? $_POST['text'] : '';
    $texto = htmlspecialchars(trim($texto));
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    if ($id !== null) {
        try {
            $stmt = $db->prepare("UPDATE arquivo SET texto = :texto WHERE id_arquivo = :id");
            $stmt->execute([':texto' => $texto, ':id' => $id]);
            
            $acao = "Atualizou o texto do arquivo '$lista_nome'";
            $id_log = $_SESSION['id_user'];

            $sql_log = "INSERT INTO log (id_user, acao)
            VALUES (:id_user, :acao)";

            $stmt_log = $db->prepare($sql_log);
            $stmt_log->bindParam(':id_user', $id_log);
            $stmt_log->bindParam(':acao', $acao);
            $stmt_log->execute();

            echo "<script>window.location.href = '" . $_SERVER['PHP_SELF'] . "?id=" . $id . "';</script>";
            exit;
        } catch (PDOException $e) {
            echo "<script>alert('Erro ao atualizar o registro:')</script>" . $e->getMessage();
        }
    } else {
        echo "ID não fornecido.";
    }
}
?>

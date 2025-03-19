<?php
include '.././App/Db/connPoo.php';


$db = new PDO("mysql:host=$dbHost;dbname=intra_health", "$dbUsername", "$dbPassword");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_arquivo = $_POST['id_arq'];
    $nome = $_POST['nome'];

    $acao = "mudou o nome de um arquivo de seu grupo para '$nome'";
    $id_log = $_SESSION['id_user'];

    $sql = "UPDATE arquivo 
            SET nome = :nome WHERE id_arquivo = :id_arquivo";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':id_arquivo', $id_arquivo);

    if ($stmt->execute()) {

        $sql_log = "INSERT INTO log (id_user, acao)
        VALUES (:id_user, :acao)";

        $stmt_log = $db->prepare($sql_log);
        $stmt_log->bindParam(':id_user', $id_log);
        $stmt_log->bindParam(':acao', $acao);

        if($stmt_log->execute()){
        echo "<script>alert('Arquivo atualizada com sucesso!')</script>";
        header('location: home.php');
        }
    } 
}
?>

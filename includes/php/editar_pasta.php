<?php
include '.././App/Db/connPoo.php';


$db = new PDO("mysql:host=$dbHost;dbname=intra_health", "$dbUsername", "$dbPassword");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pasta = $_POST['id_pasta'];
    $nome = $_POST['nome'];

    $acao = "mudou o nome de uma pasta de seu grupo para '$nome'";
    $id_log = $_SESSION['id_user'];

    $sql = "UPDATE pasta 
            SET nome = :nome WHERE id_pasta = :id_pasta";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':id_pasta', $id_pasta);

    if ($stmt->execute()) {

        $sql_log = "INSERT INTO log (id_user, acao)
        VALUES (:id_user, :acao)";

        $stmt_log = $db->prepare($sql_log);
        $stmt_log->bindParam(':id_user', $id_log);
        $stmt_log->bindParam(':acao', $acao);

        if($stmt_log->execute()){
        echo "<script>alert('Pasta atualizada com sucesso!')</script>";
        header('location: home.php');
        }
    } 
}
?>

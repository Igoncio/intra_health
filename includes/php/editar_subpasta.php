<?php
include '.././App/Db/connPoo.php';



$db = new PDO("mysql:host=$dbHost;dbname=intra_health", "$dbUsername", "$dbPassword");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_subpasta = $_POST['id_subpasta'];
    $nome = $_POST['nome'];

    $sql = "UPDATE subpasta 
            SET nome = :nome WHERE id_subpasta = :id_subpasta";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':id_subpasta', $id_subpasta);

    if ($stmt->execute()) {
        echo "<script>alert('Subpasta atualizada com sucesso!')</script>";
        header('location: home.php');
    } 
}
?>

<?php
include '.././App/Db/connPoo.php';


$db = new PDO("mysql:host=192.168.1.71;dbname=intra_health", "teste", "H3@LTH_2024");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_arquivo = $_POST['id_arq'];
    $nome = $_POST['nome'];

    $sql = "UPDATE arquivo 
            SET nome = :nome WHERE id_arquivo = :id_arquivo";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':id_arquivo', $id_arquivo);

    if ($stmt->execute()) {
        echo "<script>alert('Arquivo atualizada com sucesso!')</script>";
        header('location: home.php');
    } 
}
?>

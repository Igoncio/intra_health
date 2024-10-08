<?php
include '.././App/Db/connPoo.php';



$db = new PDO("mysql:host=192.168.1.71;dbname=intra_health", "teste", "H3@LTH_2024");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_subpasta = $_POST['id_subpasta'];
    $nome = $_POST['nome'];

    $sql = "UPDATE subpasta 
            SET nome = :nome WHERE id_subpasta = :id_subpasta";

    $stmt = $db->prepare($sql);

    // Bind os parâmetros
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':id_subpasta', $id_subpasta);

    // Execute o statement
    if ($stmt->execute()) {
        echo "<script>alert('Subpasta atualizada com sucesso!')</script>";
        header('location: home.php');
    } 
}
?>

<?php
include '.././App/Db/connPoo.php';


$db = new PDO("mysql:host=192.168.1.15;dbname=intra_health", "teste", "H3@LTH_2024");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pasta = $_POST['id_pasta'];
    $nome = $_POST['nome'];

    $sql = "UPDATE pasta 
            SET nome = :nome WHERE id_pasta = :id_pasta";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':id_pasta', $id_pasta);

    if ($stmt->execute()) {
        echo "<script>alert('Pasta atualizada com sucesso!')</script>";
        header('location: home.php');
    } 
}
?>

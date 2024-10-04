<?php
include '.././App/Db/connPoo.php';



$db = new PDO("mysql:host=localhost;dbname=intra_health", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pasta = $_POST['id_pasta'];
    $nome = $_POST['nome'];

    $sql = "UPDATE pasta 
            SET nome = :nome WHERE id_pasta = :id_pasta";

    $stmt = $db->prepare($sql);

    // Bind os parâmetros
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':id_pasta', $id_pasta);

    // Execute o statement
    if ($stmt->execute()) {
        echo "<script>alert('Pasta atualizada com sucesso!')</script>";
    } 
}
?>

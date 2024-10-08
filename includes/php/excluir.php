<?php


$db = new PDO("mysql:host=localhost;dbname=intra_health", "teste", "H3@LTH_2024");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id_user = $_GET['id_user'];


    $sql = "DELETE FROM usuario WHERE id_user = :id_user"; 

    $stmt = $db->prepare($sql); 
    $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT); 
    $stmt->execute(); 

    echo "<script>alert('Usuário excluído'); window.location.href='../../pages/home.php';</script>";
    echo header('location: ../../pages/home.php');
 

?>

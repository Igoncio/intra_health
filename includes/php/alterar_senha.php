<?php
include '../App/Db/connPoo.php';

$db = new PDO("mysql:host=$dbHost;dbname=intra_health", "$dbUsername", "$dbPassword");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    if (!empty($_POST['senha'])) {
        $senha_nova = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $id_usuario = $_SESSION['id_user']; 

        $sql = "UPDATE usuario SET senha = :senha WHERE id_user = :id_usuario";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':senha', $senha_nova); 
        $stmt->bindParam(':id_usuario', $id_usuario);

        if ($stmt->execute()) {
            echo "<script>alert('Senha atualizada com sucesso!');</script>";
            echo "<script>window.location.href='home.php';</script>";
            exit();
        } else {
            echo "<script>alert('Erro ao atualizar senha!');</script>";
        }
    } else {
        echo "<script>alert('A senha não pode estar vazia!');</script>";
    }
}
?>

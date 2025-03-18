<?php
include '../App/Db/connPoo.php';

$db = new PDO("mysql:host=$dbHost;dbname=intra_health", "$dbUsername", "$dbPassword");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['senha'])) {
    $senha = $_POST['senha'];
    $stmt = $db->prepare("SELECT * FROM usuario WHERE id_user = $_SESSION[id_user]");
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($senha, $usuario['senha'])) {
            header('Location: alterar_senha.php');
            exit(); 
        } else {
            echo "<script>alert('senha incorreta!')</script>";
        }
    }
}
?>

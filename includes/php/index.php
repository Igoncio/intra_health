<?php
session_start();

$db = new PDO("mysql:host=192.168.1.15;dbname=intra_health", "teste", "H3@LTH_2024");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['email'], $_POST['senha'])) {
    $email = $_POST['email']; 
    $senha = $_POST['senha'];

    $stmt = $db->prepare("SELECT * FROM usuario WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['id_user'] = $usuario['id_user'];
            $_SESSION['nome'] = $usuario['nome'];

            header('Location: pages/home.php');
            exit(); 
        } else {
            echo "<script>alert('email ou senha incorretos!')</script>";
        }
    } else {
        echo "<script>alert('email ou senha incorretos!')</script>";
    }
}
?>

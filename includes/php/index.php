<?php
session_start();

$db = new PDO("mysql:host=localhost;dbname=intra_health", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['email'], $_POST['senha'])) {
    $email = $_POST['email']; 
    $senha = $_POST['senha'];

    $stmt = $db->prepare("SELECT * FROM usuario WHERE email = :email AND senha = :senha");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

   
    $quantidade = $stmt->rowCount();

    if ($quantidade == 1) {
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

       
        $_SESSION['id_user'] = $usuario['id_user'];
        $_SESSION['nome'] = $usuario['nome'];

        header('Location: pages/home.php');
        exit(); 
    } else {
        echo "Falhou: usuário ou senha incorretos.";
    }
}
?>

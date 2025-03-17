<?php
session_start();
$parsed = parse_ini_file('environment.ini', true);

$_ENV['ENVIRONMENT'] = $parsed['ENVIRONMENT'];

foreach($parsed[$parsed['ENVIRONMENT']] as $key => $value){
    $_ENV[$key] = $value;
}

$db = new PDO("mysql:host={$_ENV['DB_HOST']};dbname=intra_health", $_ENV['DB_USER'], $_ENV['DB_PASS']);
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

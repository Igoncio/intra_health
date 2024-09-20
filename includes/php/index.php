<?php
session_start(); 

include 'App/Db/connPoo.php'; 

$db = new PDO("mysql:host=localhost;dbname=intra_health", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['nome'];
    $senha = $_POST['senha'];

    $pega_id = 'SELECT * FROM usuario';
    $stmt = $db->query($pega_id);
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // echo "<pre>"; print_r($dados); echo "</pre>";


    foreach ($dados as $usuario) {
        if($email = $usuario['email'] and $senha == $usuario['senha_hash']){
            header('location: pages/home.php');
        }
    }
    echo "<script>alert('Email ou senha inválidos');</script>";
}
?>

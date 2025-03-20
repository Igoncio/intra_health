<?php

session_start();

$parsed = parse_ini_file('../../environment.ini', true);

$_ENV['ENVIRONMENT'] = $parsed['ENVIRONMENT'];

foreach($parsed[$parsed['ENVIRONMENT']] as $key => $value){
    $_ENV[$key] = $value;
}

$dbHost = $_ENV['DB_HOST'];
$dbUsername = $_ENV['DB_USER'];
$dbPassword = $_ENV['DB_PASS'];
$dbName = "intra_health";

$db = new PDO("mysql:host=$dbHost;dbname=intra_health", "$dbUsername", "$dbPassword");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id_user = $_GET['id_user'];

// Primeiro, buscamos os dados do usuário antes da exclusão
$sql_consulta = "SELECT nome FROM usuario WHERE id_user = :id_user";
$stmt_consulta = $db->prepare($sql_consulta);

if (!isset($id_user)) {
    die("Erro: ID do usuário não foi definido.");
}

$stmt_consulta->bindParam(':id_user', $id_user, PDO::PARAM_INT);
$stmt_consulta->execute();
$usuario = $stmt_consulta->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    echo "<script>alert('Usuário não encontrado'); window.location.href='../../pages/home.php';</script>";
    exit;
}

// Agora podemos excluir o usuário
$sql = "DELETE FROM usuario WHERE id_user = :id_user";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);

if ($stmt->execute()) {
    // Registra a ação no log usando o nome obtido antes da exclusão
    $acao = "Excluiu o usuário '{$usuario['nome']}'";
    $id_log = $_SESSION['id_user'];

    $sql_log = "INSERT INTO log (id_user, acao) VALUES (:id_user, :acao)";
    $stmt_log = $db->prepare($sql_log);
    $stmt_log->bindParam(':id_user', $id_log);
    $stmt_log->bindParam(':acao', $acao);
    $stmt_log->execute();

    echo "<script>
        alert('Usuário excluído');
        window.location.href='../../pages/home.php';
    </script>";
    exit;
}

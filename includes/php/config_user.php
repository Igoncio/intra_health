<?php
include '../App/Db/connPoo.php';

$db = new PDO("mysql:host=$dbHost;dbname=intra_health", "$dbUsername", "$dbPassword");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$perm = "SELECT * FROM vw_grupo_usuario WHERE id_user = '$_SESSION[id_user]'";
$stmt = $db->query($perm);
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $perm = "SELECT * FROM usuario WHERE id_user = '$_SESSION[id_user]'";
// $stmt = $db->query($perm);
// $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($dados as $user){
    $id_grupo =  $user['id_grupo'];
    $telefone=  $user['telefone'];
    $nome_user =  $user['nome'];
    $nome_grupo=  $user['nome_grupo'];
}

// echo '<pre>'; print_r($dados); echo'</pre>';
// echo "$id_grupo\n";
// echo "$telefone\n";
// echo "$nome\n";
// echo $nome_grupo;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $telefone = $_POST['telefone'];
    $id_usuario = $_SESSION['id_user'];

    $sql = "UPDATE usuario SET telefone = :telefone WHERE id_user = :id_usuario";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':id_usuario', $id_usuario);

    if ($stmt->execute()) {
        echo "<script>alert('Configurações atualizadas com sucesso!')</script>";
    } else {
        echo "<script>alert('Erro ao atualizar usuário!')</script>";
    }
}
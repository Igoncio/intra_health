<?php
include '.././App/Db/connPoo.php';

$db = new PDO("mysql:host=$dbHost;dbname=intra_health", "$dbUsername", "$dbPassword");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id_user = $_GET['id_user'];
$user = "SELECT * FROM vw_grupo_usuario WHERE id_user = :id_user"; 

$stmt = $db->prepare($user); 
$stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT); 
$stmt->execute(); 

$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($dados as $user) {
    echo $user['id_grupo'];
}

$select = "SELECT * FROM permissoes";
$stmt = $db->query($select);
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

$lista_perm = '';
foreach ($dados as $row) {
    $lista_perm .= '<option value="' . htmlspecialchars($row['id_permissao']) . '">' . htmlspecialchars($row['nome']) . '</option>';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_usuario = $_GET['id_user'];
    $id_grupo = $_POST['id_grupo'];
    $id_permissao = $_POST['id_permissao'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    
    $senha_hash = '';
    if (!empty($_POST['senha'])) {
        $senha_hash = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    }

    $sql = "UPDATE usuario 
            SET id_grupo = :id_grupo, 
                id_permissao = :id_permissao, 
                nome = :nome, 
                telefone = :telefone, 
                email = :email" .
                (!empty($senha_hash) ? ", senha = :senha_hash" : "") . 
            " WHERE id_user = :id_usuario";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->bindParam(':id_grupo', $id_grupo);
    $stmt->bindParam(':id_permissao', $id_permissao);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':email', $email);

    if (!empty($senha_hash)) {
        $stmt->bindParam(':senha_hash', $senha_hash);
    }

    if ($stmt->execute()) {

        $acao = "Editou o usuário '$user[nome]'";
        $id_log = $_SESSION['id_user'];

        $sql_log = "INSERT INTO log (id_user, acao) VALUES (:id_user, :acao)";
        $stmt_log = $db->prepare($sql_log);
        $stmt_log->bindParam(':id_user', $id_log);
        $stmt_log->bindParam(':acao', $acao);
        $stmt_log->execute();

        echo "<script>alert('Usuario Atualizado com sucesso!'); window.location.href='home.php';</script>";

        exit(); 
    } 
}
?>
<!-- $2y$10$getSMxPv8YJarFa17G8H4.vaS0hUChNnjyq9KWvQ7yFdQHKXeZ6Uq -->
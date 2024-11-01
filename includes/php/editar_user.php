<?php
include '.././App/Db/connPoo.php';

$db = new PDO("mysql:host=192.168.1.71;dbname=intra_health", "teste", "H3@LTH_2024");
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
        echo "<script>alert('Usuario Atualizado com sucesso!')</script>";
        header('location: home.php');
        exit(); 
    } 
}
?>

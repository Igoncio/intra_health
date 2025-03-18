<?php
session_start();
include '../App/Db/connPoo.php';

$db = new PDO("mysql:host=$dbHost;dbname=intra_health", "$dbUsername", "$dbPassword");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id_usuario = $_SESSION['id_user'] ?? null;

if (!$id_usuario) {
    echo "<script>alert('Usuário não autenticado!'); window.location.href = 'login.php';</script>";
    exit;
}

// Obtém os dados do usuário
$stmt = $db->prepare("SELECT * FROM vw_grupo_usuario WHERE id_user = :id_usuario");
$stmt->bindParam(':id_usuario', $id_usuario);
$stmt->execute();
$dados = $stmt->fetch(PDO::FETCH_ASSOC);

$id_grupo = $dados['id_grupo'] ?? '';
$telefone = $dados['telefone'] ?? '';
$nome_user = $dados['nome'] ?? '';
$nome_grupo = $dados['nome_grupo'] ?? '';
$foto_user = $dados['foto'] ?? '../img/perfil/default.png'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $telefone = $_POST['telefone'] ?? '';

    // Obtém a imagem atual do usuário
    $stmt = $db->prepare("SELECT foto FROM usuario WHERE id_user = :id_usuario");
    $stmt->bindParam(':id_usuario', $id_usuario);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    $foto_antiga = $usuario['foto'] ?? ''; 
    $uploadDir = '../img/perfil/';
    $foto = '';

    if (!empty($_FILES['foto']['name'])) {
        $fileName = basename($_FILES['foto']['name']);
        $targetFile = $uploadDir . time() . "_" . $fileName; 

        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png'];

        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetFile)) {
                
                if (!empty($foto_antiga) && file_exists($foto_antiga) && basename($foto_antiga) !== 'image.png') {
                    unlink($foto_antiga);
                }

                $foto = $targetFile;
            } else {
                echo "<script>alert('Erro ao fazer upload da imagem!')</script>";
            }
        } else {
            echo "<script>alert('Formato de imagem inválido! Use JPG ou PNG.')</script>";
        }
    }

    // Atualiza os dados no banco
    $sql = "UPDATE usuario SET telefone = :telefone" . ($foto ? ", foto = :foto" : "") . " WHERE id_user = :id_usuario";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':id_usuario', $id_usuario);

    if ($foto) {
        $stmt->bindParam(':foto', $foto);
    }

    if ($stmt->execute()) {
        echo "<script>alert('Configurações atualizadas com sucesso!'); window.location.href = 'configuracao_usuario.php';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar usuário!')</script>";
    }
}
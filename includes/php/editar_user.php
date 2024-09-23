<?php
include '.././App/Db/connPoo.php';



$db = new PDO("mysql:host=localhost;dbname=intra_health", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id_user = $_GET['id_user'];
$user = "SELECT * FROM vw_grupo_usuario WHERE id_user = :id_user"; 

$stmt = $db->prepare($user); 
$stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT); 
$stmt->execute(); 

$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);


foreach($dados as $user){
    // echo "<pre>"; print_r($user); echo "</pre>";
}

$select = "SELECT * FROM permissoes";
$stmt = $db->query($select);
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

$lista_perm = '';
foreach ($dados as $row) {
    $lista_perm .= '<option value="' . htmlspecialchars($row['id_permissao']) . '">' . htmlspecialchars($row['nome']) . '</option>';
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_grupo = $_POST['id_grupo'];
    $id_permissao = $_POST['id_permissao'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha_hash = $_POST['senha_hash'];

    // Prepare o SQL
    $sql = "INSERT INTO usuario (id_grupo, id_permissao, nome, telefone, email, senha)
            VALUES (:id_grupo, :id_permissao, :nome, :telefone, :email, :senha_hash)";

    $stmt = $db->prepare($sql);

    // Bind os parâmetros
    $stmt->bindParam(':id_grupo', $id_grupo);
    $stmt->bindParam(':id_permissao', $id_permissao);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha_hash', $senha_hash);

    // Execute o statement
    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o usuário.";
    }
}
?>

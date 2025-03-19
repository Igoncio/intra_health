<?php

#SENHA GMAIL ACESSO A APP "xhft xqiw tgbl gcwk"


include '.././App/Db/connPoo.php';

$db = new PDO("mysql:host=$dbHost;dbname=intra_health", "$dbUsername", "$dbPassword");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
    $senha_hash = password_hash($_POST['senha_hash'], PASSWORD_DEFAULT);
    $acao = "cadastrou o usuario '$nome'";
    $id_log = $_SESSION['id_user'];

    $sql = "INSERT INTO usuario (id_grupo, id_permissao, nome, telefone, email, senha)
            VALUES (:id_grupo, :id_permissao, :nome, :telefone, :email, :senha_hash)";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':id_grupo', $id_grupo);
    $stmt->bindParam(':id_permissao', $id_permissao);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha_hash', $senha_hash);
    if ($stmt->execute()) {

        $sql_log = "INSERT INTO log (id_user, acao)
        VALUES (:id_user, :acao)";

        $stmt_log = $db->prepare($sql_log);
        $stmt_log->bindParam(':id_user', $id_log);
        $stmt_log->bindParam(':acao', $acao);

        if($stmt_log->execute()){
            echo "<script>alert('Usuário cadastrado com sucesso!');</script>";
        }
    }
 
}
?>

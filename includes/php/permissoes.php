<?php

include '.././App/Db/connPoo.php';

$db = new PDO("mysql:host=$dbHost;dbname=intra_health", "$dbUsername", "$dbPassword");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];
    $acesso_financeiro = isset($_POST['acesso_financeiro']) ? 1 : 0;
    $acesso_comercial = isset($_POST['acesso_comercial']) ? 1 : 0;
    $acesso_adm = isset($_POST['acesso_adm']) ? 1 : 0;
    $acesso_ti = isset($_POST['acesso_ti']) ? 1 : 0;
    $acesso_mod = isset($_POST['acesso_mod']) ? 1 : 0;
    $acesso_geral = 1;
    $cad_pasta = isset($_POST['cad_pasta']) ? 1 : 0;
    $cad_arq = isset($_POST['cad_arq']) ? 1 : 0;
    $cad_user = isset($_POST['cad_user']) ? 1 : 0;
    $cad_perm = isset($_POST['cad_perm']) ? 1 : 0;
    $edit_pasta = isset($_POST['edit_pasta']) ? 1 : 0;
    $edit_arq = isset($_POST['edit_arq']) ? 1 : 0;
    $edit_user = isset($_POST['edit_user']) ? 1 : 0;
    $excluir_pasta = isset($_POST['excluir_pasta']) ? 1 : 0;
    $excluir_arq = isset($_POST['excluir_arq']) ? 1 : 0;
    $excluir_user = isset($_POST['excluir_user']) ? 1 : 0;
    $excluir_perm = isset($_POST['excluir_perm']) ? 1 : 0;

    $sql = "INSERT INTO permissoes 
            (nome, acesso_financeiro, acesso_comercial, acesso_adm, acesso_ti, 
             cad_pasta, cad_arq, cad_user, cad_perm, 
             edit_pasta, edit_arq, edit_user, 
             excluir_pasta, excluir_arq, excluir_user, excluir_perm, acesso_geral, acesso_mod) 
            VALUES 
            (:nome, :acesso_financeiro, :acesso_comercial, :acesso_adm, :acesso_ti, 
             :cad_pasta, :cad_arq, :cad_user, :cad_perm, 
             :edit_pasta, :edit_arq, :edit_user, 
             :excluir_pasta, :excluir_arq, :excluir_user, :excluir_perm, :acesso_geral, :acesso_mod)";

    $stmt = $db->prepare($sql);

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':acesso_financeiro', $acesso_financeiro);
    $stmt->bindParam(':acesso_comercial', $acesso_comercial);
    $stmt->bindParam(':acesso_adm', $acesso_adm);
    $stmt->bindParam(':acesso_ti', $acesso_ti);
    $stmt->bindParam(':acesso_mod', $acesso_mod);
    $stmt->bindParam(':acesso_geral', $acesso_geral);
    $stmt->bindParam(':cad_pasta', $cad_pasta);
    $stmt->bindParam(':cad_arq', $cad_arq);
    $stmt->bindParam(':cad_user', $cad_user);
    $stmt->bindParam(':cad_perm', $cad_perm);
    $stmt->bindParam(':edit_pasta', $edit_pasta);
    $stmt->bindParam(':edit_arq', $edit_arq);
    $stmt->bindParam(':edit_user', $edit_user);
    $stmt->bindParam(':excluir_pasta', $excluir_pasta);
    $stmt->bindParam(':excluir_arq', $excluir_arq);
    $stmt->bindParam(':excluir_user', $excluir_user);
    $stmt->bindParam(':excluir_perm', $excluir_perm);
 
    if ($stmt->execute()) {
        echo "Permissão cadastrada com sucesso!";
    } else {
        echo "Erro ao cadastrar a permissão.";
    }
}

?>

<?php


$db = new PDO("mysql:host=192.168.1.15;dbname=intra_health", "teste", "H3@LTH_2024");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$perm = "SELECT * FROM vw_grupo_permissoes WHERE id_user = '$_SESSION[id_user]'";
$stmt = $db->query($perm);
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($dados as $permissao){
    
    $id_perm =  $permissao['id_perm2'];
    $nome_perm = $permissao['nome_user'];
    $acesso_financeiro = $permissao['acesso_financeiro'];
    $acesso_comercial = $permissao['acesso_comercial'];
    $acesso_adm = $permissao['acesso_adm'];
    $acesso_ti = $permissao['acesso_ti'];
    $cad_pasta = $permissao['cad_pasta'];
    $cad_user = $permissao['cad_user'];
    $cad_arq = $permissao['cad_arq'];
    $cad_perm = $permissao['cad_perm'];
    $edit_pasta = $permissao['edit_pasta'];
    $edit_user = $permissao['edit_user'];
    $edit_arq = $permissao['edit_arq'];
    $excluir_pasta = $permissao['excluir_pasta'];
    $excluir_user = $permissao['excluir_user'];
    $excluir_arq = $permissao['excluir_arq'];
    $excluir_perm = $permissao['excluir_perm'];
    

    // echo "<pre>"; print_r($permissao); echo "</pre>";
}
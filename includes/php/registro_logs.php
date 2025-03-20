<?php

include '.././App/Db/connPoo.php';

$db = new PDO("mysql:host=$dbHost;dbname=intra_health", "$dbUsername", "$dbPassword");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$perm = "SELECT * FROM vw_grupo_log";
$stmt = $db->query($perm);
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);





$lista_user = '';

foreach ($dados as $user) {
    // Buscar a foto corretamente usando o nome do usuário atual
    $consulta_foto = "SELECT foto FROM usuario WHERE nome = :nome";
    $stmt_foto = $db->prepare($consulta_foto);
    $stmt_foto->bindParam(':nome', $user['nome'], PDO::PARAM_STR); // Corrigido aqui
    $stmt_foto->execute();
    $dados_foto = $stmt_foto->fetch(PDO::FETCH_ASSOC);

    // print_r($dados_foto); echo "<----"; 

    // Construindo a lista de usuários com a foto (se existir)
    $lista_user .= '
        <tr>
        <td><img id="foto" src="' . htmlspecialchars($dados_foto['foto']) . '" width="50">' . htmlspecialchars($user['nome']) . '</td>
        <td>' . htmlspecialchars($user['acao']) . '</td>
        <td>' . htmlspecialchars($user['data_hora']) . '</td>
         
        </tr>';
}


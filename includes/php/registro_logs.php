<?php

include '.././App/Db/connPoo.php';

$db = new PDO("mysql:host=$dbHost;dbname=intra_health", "$dbUsername", "$dbPassword");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$perm = "SELECT * FROM vw_grupo_log";
$stmt = $db->query($perm);
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

$lista_user = '';
foreach ($dados as $user) {
    // echo "<pre>"; print_r($user); echo "</pre>";
    $lista_user .= '
        <tr>
            <td>' . htmlspecialchars($user['data_hora']) . '</td>
            <td>' . htmlspecialchars($user['nome']) . '</td>
            <td>' . htmlspecialchars($user['acao']) . '</td>

        </tr>';
}


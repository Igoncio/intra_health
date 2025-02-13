<?php

include '.././App/Db/connPoo.php';

$db = new PDO("mysql:host=192.168.1.15;dbname=intra_health", "teste", "H3@LTH_2024");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$perm = "SELECT * FROM usuario";
$stmt = $db->query($perm);
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

$lista_user = '';
foreach ($dados as $user) {
    // echo "<pre>"; print_r($user); echo "</pre>";
    $lista_user .= '
        <tr>
            <td>' . htmlspecialchars($user['nome']) . '</td>
            <td>
                <div class="actions">';

    if ($edit_user) {
        $lista_user .= '<a href="editar_usuario.php?id_user=' . $user['id_user'] . '"><span class="material-icons edit">edit</span></a>';
    }

    if ($excluir_user) {
        $lista_user .= '<a href="../includes/php/excluir.php?id_user=' . $user['id_user'] . '">
            <span class="material-icons delete">delete</span>
        </a>';
    }

    $lista_user .= '</div>
            </td>
        </tr>';
}


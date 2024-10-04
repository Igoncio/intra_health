<?php

include '.././App/Db/connPoo.php';

$db = new PDO("mysql:host=localhost;dbname=intra_health", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$perm = "SELECT * FROM usuario";
$stmt = $db->query($perm);
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);


$lista_user = '';
foreach($dados as $user){
    // echo"<pre>";print_r($user); echo "</pre>";
    $lista_user .='
        <tr>
            <td>'.$user['nome'].'</td>
                <td>
                    <div class="actions">
                        <a href="editar_usuario.php?id_user='.$user['id_user'].'"><span class="material-icons edit">edit</span></a>
                       <a href="../includes/php/excluir.php?id_user='.$user['id_user'].'">
                        <span class="material-icons delete">delete</span>
                        </a>
                    </div>
                </td>
        </tr>
    ';


}
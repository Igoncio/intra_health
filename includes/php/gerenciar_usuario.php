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
                        <a href="editar_usuario.php?id_user='.$user['id_user'].'"><span class="material-icons edit">edit</span></a>                    <div class="actions">
                        <span class="material-icons delete" onclick="openModal()">delete</span>
                    </div>
                </td>
        </tr>
    ';


}
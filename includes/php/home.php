<?php

include '.././App/Db/connPoo.php';

$db = new PDO("mysql:host=localhost;dbname=intra_health", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);






//===============  P E G A N D O - I D  ======================================================================================================================= =================================================================== ===================================================================  

$pega_id = 'SELECT id_grupo FROM vw_grupo_estrutura';

$stmt = $db->query($pega_id);

$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

$ids_grupos = [];

$lista_id = '';
foreach ($dados as $row) {
    $id_grupo = htmlspecialchars($row['id_grupo']);

    if (!in_array($id_grupo, $ids_grupos)) {
        $ids_grupos[] = $id_grupo;
        
        // Corrigido: Use aspas duplas e chaves para interpolar variáveis
        $lista_id .= "<a href='nova_subpasta.php?id_grupo={$id_grupo}'>ID: {$id_grupo}</a><br>";
    }
}





//===============  P E G A N D O - A R Q U I V O  ======================================================================================================================= =================================================================== ===================================================================  

$query_arq = 'SELECT * FROM arquivo';
$stmt5 = $db->query($query_arq);
$dados_arq = $stmt5->fetchAll(PDO::FETCH_ASSOC);

//===============  F I N A N C E I R O  ======================================================================================================================= 
$sql = 'SELECT * FROM vw_grupo_estrutura WHERE id_grupo = 1';
$stmt = $db->query($sql);
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

$lista_financeiro = ''; // Certifique-se de que essa variável esteja inicializada

// Primeiro, adiciona arquivos na raiz (id_grupo = 1, id_pasta = 0, id_subpasta = 0)
foreach ($dados_arq as $arq) {
    if ($arq['id_grupo'] == 1 && $arq['id_pasta'] == 0 && $arq['id_subpasta'] == 0) {
        if($arq['editavel'] == 1){
            $lista_financeiro .= '
            <li>
                <a href="arquivo2.php?id=' . htmlspecialchars($arq["id_arquivo"]) . '">
                    <i class="fas fa-file-alt"></i>
                    <button class="expand-btn">Abrir</button>
                    ' . htmlspecialchars($arq['nome']) . '
                </a>
            </li>';
        }
        else{
            $lista_financeiro .= '
            <li>
                <a href="arquivo.php?id=' . htmlspecialchars($arq["id_arquivo"]) . '">
                <i class="fas fa-file-alt"></i>
                <button class="expand-btn">Abrir</button>
                ' . htmlspecialchars($arq['nome']) . '
                </a>
                </li>';
        }
    }
}

// Agrupando dados por pasta e subpasta
$pastas = [];
foreach ($dados as $row) {
    $pastas[$row['id_pasta']]['nome'] = $row['nome_pasta'];
    $pastas[$row['id_pasta']]['subpastas'] = [];
}

// Adicionando subpastas
foreach ($dados as $row) {
    if ($row['id_subpasta'] != 0) {
        $pastas[$row['id_pasta']]['subpastas'][$row['id_subpasta']] = $row['nome_subpasta'];
    }
}

// Agora, itere sobre as pastas e subpastas
foreach ($pastas as $id_pasta => $pasta) {
    // Pasta principal
    $lista_financeiro .= '
        <li class="expandable">
            <button class="expand-btn">+</button>
            
            <i class="fas fa-folder"></i> ' . htmlspecialchars($pasta['nome']) . '
            <ul class="expandable-items">';

    // Adiciona arquivos da pasta principal
    foreach ($dados_arq as $arq) {
        if ($arq['id_grupo'] == 1 && $arq['id_pasta'] == $id_pasta && $arq['id_subpasta'] == 0) {
            if($arq['editavel'] == 1){
                $lista_financeiro .= '
                <li>
                    <a href="arquivo2.php?id=' . htmlspecialchars($arq["id_arquivo"]) . '">
                        <i class="fas fa-file-alt"></i>
                        <button class="expand-btn">Abrir</button>
                        ' . htmlspecialchars($arq['nome']) . '
                    </a>
                </li>';
            }
            else{
                $lista_financeiro .= '
                <li>
                    <a href="arquivo.php?id=' . htmlspecialchars($arq["id_arquivo"]) . '">
                    <i class="fas fa-file-alt"></i>
                    <button class="expand-btn">Abrir</button>
                    ' . htmlspecialchars($arq['nome']) . '
                    </a>
                    </li>';
            }
        }
    }

    // Adiciona subpastas e seus arquivos
    foreach ($pasta['subpastas'] as $id_subpasta => $nome_subpasta) {
        $lista_financeiro .= '
            <li class="expandable">
                <button class="expand-btn">+</button>
                
                <i class="fas fa-folder"></i> ' . htmlspecialchars($nome_subpasta) . '
                <ul class="expandable-items">';

        // Adiciona arquivos da subpasta
        foreach ($dados_arq as $arq) {
            if ($arq['id_grupo'] == 1 && $arq['id_pasta'] == $id_pasta && $arq['id_subpasta'] == $id_subpasta) {
                if($arq['editavel'] == 1){
                    $lista_financeiro .= '
                    <li>
                        <a href="arquivo2.php?id=' . htmlspecialchars($arq["id_arquivo"]) . '">
                            <i class="fas fa-file-alt"></i>
                            <button class="expand-btn">Abrir</button>
                            ' . htmlspecialchars($arq['nome']) . '
                        </a>
                    </li>';
                }
                else{
                    $lista_financeiro .= '
                    <li>
                        <a href="arquivo.php?id=' . htmlspecialchars($arq["id_arquivo"]) . '">
                        <i class="fas fa-file-alt"></i>
                        <button class="expand-btn">Abrir</button>
                        ' . htmlspecialchars($arq['nome']) . '
                        </a>
                        </li>';
                }
            }
        }

        $lista_financeiro .= '
                </ul>
            </li>'; // Fecha subpasta
    }

    $lista_financeiro .= '
            </ul>
        </li>'; // Fecha pasta principal
}




//===============  C O M E R C I A L  ======================================================================================================================= 

$sql2 = 'SELECT * FROM vw_grupo_estrutura WHERE id_grupo = 2';
$stmt2 = $db->query($sql2);
$dados2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

$lista_comercial = ''; 
foreach ($dados_arq as $arq) {
    if ($arq['id_grupo'] == 2 && $arq['id_pasta'] == 0 && $arq['id_subpasta'] == 0) {
        if($arq['editavel'] == 1){
            $lista_comercial .= '
            <li>
                <a href="arquivo2.php?id=' . htmlspecialchars($arq["id_arquivo"]) . '">
                    <i class="fas fa-file-alt"></i>
                    <button class="expand-btn">Abrir</button>
                    ' . htmlspecialchars($arq['nome']) . '
                </a>
            </li>';
        }
        else{
            $lista_comercial .= '
            <li>
                <a href="arquivo.php?id=' . htmlspecialchars($arq["id_arquivo"]) . '">
                <i class="fas fa-file-alt"></i>
                <button class="expand-btn">Abrir</button>
                ' . htmlspecialchars($arq['nome']) . '
                </a>
                </li>';
        }
    }
}

// Agrupando dados por pasta e subpasta
$pastas = [];
foreach ($dados2 as $row) {
    $pastas[$row['id_pasta']]['nome'] = $row['nome_pasta'];
    $pastas[$row['id_pasta']]['subpastas'] = [];
}

// Adicionando subpastas
foreach ($dados2 as $row) {
    if ($row['id_subpasta'] != 0) {
        $pastas[$row['id_pasta']]['subpastas'][$row['id_subpasta']] = $row['nome_subpasta'];
    }
}

// Agora, itere sobre as pastas e subpastas
foreach ($pastas as $id_pasta => $pasta) {
    // Pasta principal
    $lista_comercial .= '
        <li class="expandable">
            <button class="expand-btn">+</button>
            
            <i class="fas fa-folder"></i> ' . htmlspecialchars($pasta['nome']) . '
            <ul class="expandable-items">';

    // Adiciona arquivos da pasta principal
    foreach ($dados_arq as $arq) {
        if ($arq['id_grupo'] == 2 && $arq['id_pasta'] == $id_pasta && $arq['id_subpasta'] == 0) {
            if($arq['editavel'] == 1){
                $lista_comercial .= '
                <li>
                    <a href="arquivo2.php?id=' . htmlspecialchars($arq["id_arquivo"]) . '">
                        <i class="fas fa-file-alt"></i>
                        <button class="expand-btn">Abrir</button>
                        ' . htmlspecialchars($arq['nome']) . '
                    </a>
                </li>';
            }
            else{
                $lista_comercial .= '
                <li>
                    <a href="arquivo.php?id=' . htmlspecialchars($arq["id_arquivo"]) . '">
                    <i class="fas fa-file-alt"></i>
                    <button class="expand-btn">Abrir</button>
                    ' . htmlspecialchars($arq['nome']) . '
                    </a>
                    </li>';
            }
        }
    }

    // Adiciona subpastas e seus arquivos
    foreach ($pasta['subpastas'] as $id_subpasta => $nome_subpasta) {
        $lista_comercial .= '
            <li class="expandable">
                <button class="expand-btn">+</button>
                
                <i class="fas fa-folder"></i> ' . htmlspecialchars($nome_subpasta) . '
                <ul class="expandable-items">';

        // Adiciona arquivos da subpasta
        foreach ($dados_arq as $arq) {
            if ($arq['id_grupo'] == 2 && $arq['id_pasta'] == $id_pasta && $arq['id_subpasta'] == $id_subpasta) {
                if($arq['editavel'] == 1){
                    $lista_comercial .= '
                    <li>
                        <a href="arquivo2.php?id=' . htmlspecialchars($arq["id_arquivo"]) . '">
                            <i class="fas fa-file-alt"></i>
                            <button class="expand-btn">Abrir</button>
                            ' . htmlspecialchars($arq['nome']) . '
                        </a>
                    </li>';
                }
                else{
                    $lista_comercial .= '
                    <li>
                        <a href="arquivo.php?id=' . htmlspecialchars($arq["id_arquivo"]) . '">
                        <i class="fas fa-file-alt"></i>
                        <button class="expand-btn">Abrir</button>
                        ' . htmlspecialchars($arq['nome']) . '
                        </a>
                        </li>';
                }
            }
        }

        $lista_comercial .= '
                </ul>
            </li>'; // Fecha subpasta
    }

    $lista_comercial .= '
            </ul>
        </li>'; // Fecha pasta principal
}




//===============  A D M I N I S T R A T I V O  ======================================================================================================================= 

$sql3 = 'SELECT * FROM vw_grupo_estrutura WHERE id_grupo = 3';
$stmt3 = $db->query($sql3);
$dados3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

$lista_adm = ''; 
foreach ($dados_arq as $arq) {
    if ($arq['id_grupo'] == 3 && $arq['id_pasta'] == 0 && $arq['id_subpasta'] == 0) {
        if($arq['editavel'] == 1){
            $lista_adm .= '
            <li>
                <a href="arquivo2.php?id=' . htmlspecialchars($arq["id_arquivo"]) . '">
                    <i class="fas fa-file-alt"></i>
                    <button class="expand-btn">Abrir</button>
                    ' . htmlspecialchars($arq['nome']) . '
                </a>
            </li>';
        }
        else{
            $lista_adm .= '
            <li>
                <a href="arquivo.php?id=' . htmlspecialchars($arq["id_arquivo"]) . '">
                <i class="fas fa-file-alt"></i>
                <button class="expand-btn">Abrir</button>
                ' . htmlspecialchars($arq['nome']) . '
                </a>
                </li>';
        }
    }
}

// Agrupando dados por pasta e subpasta
$pastas = [];
foreach ($dados3 as $row) {
    $pastas[$row['id_pasta']]['nome'] = $row['nome_pasta'];
    $pastas[$row['id_pasta']]['subpastas'] = [];
}

// Adicionando subpastas
foreach ($dados3 as $row) {
    if ($row['id_subpasta'] != 0) {
        $pastas[$row['id_pasta']]['subpastas'][$row['id_subpasta']] = $row['nome_subpasta'];
    }
}

// Agora, itere sobre as pastas e subpastas
foreach ($pastas as $id_pasta => $pasta) {
    // Pasta principal
    $lista_adm .= '
        <li class="expandable">
            <button class="expand-btn">+</button>
            
            <i class="fas fa-folder"></i> ' . htmlspecialchars($pasta['nome']) . '
            <ul class="expandable-items">';

    // Adiciona arquivos da pasta principal
    foreach ($dados_arq as $arq) {
        if ($arq['id_grupo'] == 3 && $arq['id_pasta'] == $id_pasta && $arq['id_subpasta'] == 0) {
            if($arq['editavel'] == 1){
                $lista_adm .= '
                <li>
                    <a href="arquivo2.php?id=' . htmlspecialchars($arq["id_arquivo"]) . '">
                        <i class="fas fa-file-alt"></i>
                        <button class="expand-btn">Abrir</button>
                        ' . htmlspecialchars($arq['nome']) . '
                    </a>
                </li>';
            }
            else{
                $lista_adm .= '
                <li>
                    <a href="arquivo.php?id=' . htmlspecialchars($arq["id_arquivo"]) . '">
                    <i class="fas fa-file-alt"></i>
                    <button class="expand-btn">Abrir</button>
                    ' . htmlspecialchars($arq['nome']) . '
                    </a>
                    </li>';
            }
        }
    }

    // Adiciona subpastas e seus arquivos
    foreach ($pasta['subpastas'] as $id_subpasta => $nome_subpasta) {
        $lista_adm .= '
            <li class="expandable">
                <button class="expand-btn">+</button>
                
                <i class="fas fa-folder"></i> ' . htmlspecialchars($nome_subpasta) . '
                <ul class="expandable-items">';

        // Adiciona arquivos da subpasta
        foreach ($dados_arq as $arq) {
            if ($arq['id_grupo'] == 3 && $arq['id_pasta'] == $id_pasta && $arq['id_subpasta'] == $id_subpasta) {
                if($arq['editavel'] == 1){
                    $lista_adm .= '
                    <li>
                        <a href="arquivo2.php?id=' . htmlspecialchars($arq["id_arquivo"]) . '">
                            <i class="fas fa-file-alt"></i>
                            <button class="expand-btn">Abrir</button>
                            ' . htmlspecialchars($arq['nome']) . '
                        </a>
                    </li>';
                }
                else{
                    $lista_adm .= '
                    <li>
                        <a href="arquivo.php?id=' . htmlspecialchars($arq["id_arquivo"]) . '">
                        <i class="fas fa-file-alt"></i>
                        <button class="expand-btn">Abrir</button>
                        ' . htmlspecialchars($arq['nome']) . '
                        </a>
                        </li>';
                }
            }
        }

        $lista_adm .= '
                </ul>
            </li>'; // Fecha subpasta
    }

    $lista_adm .= '
            </ul>
        </li>'; // Fecha pasta principal
}




//===============  T . I  ======================================================================================================================= 

$sql4 = 'SELECT * FROM vw_grupo_estrutura WHERE id_grupo = 4';
$stmt4 = $db->query($sql4);
$dados4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);

$lista_ti = ''; 
foreach ($dados_arq as $arq) {
    if ($arq['id_grupo'] == 4 && $arq['id_pasta'] == 0 && $arq['id_subpasta'] == 0) {
        if($arq['editavel'] == 1){
            $lista_ti .= '
            <li>
                <a href="arquivo2.php?id=' . htmlspecialchars($arq["id_arquivo"]) . '">
                    <i class="fas fa-file-alt"></i>
                    <button class="expand-btn">Abrir</button>
                    ' . htmlspecialchars($arq['nome']) . '
                </a>
            </li>';
        }
        else{
            $lista_ti .= '
            <li>
                <a href="arquivo.php?id=' . htmlspecialchars($arq["id_arquivo"]) . '">
                <i class="fas fa-file-alt"></i>
                <button class="expand-btn">Abrir</button>
                ' . htmlspecialchars($arq['nome']) . '
                </a>
                </li>';
        }
    }
}

// Agrupando dados por pasta e subpasta
$pastas = [];
foreach ($dados4 as $row) {
    $pastas[$row['id_pasta']]['nome'] = $row['nome_pasta'];
    $pastas[$row['id_pasta']]['subpastas'] = [];
}

// Adicionando subpastas
foreach ($dados4 as $row) {
    if ($row['id_subpasta'] != 0) {
        $pastas[$row['id_pasta']]['subpastas'][$row['id_subpasta']] = $row['nome_subpasta'];
    }
}

// Agora, itere sobre as pastas e subpastas
foreach ($pastas as $id_pasta => $pasta) {
    // Pasta principal
    $lista_ti .= '
        <li class="expandable">
            <button class="expand-btn">+</button>
            
            <i class="fas fa-folder"></i> ' . htmlspecialchars($pasta['nome']) . '
            <ul class="expandable-items">';

    // Adiciona arquivos da pasta principal
    foreach ($dados_arq as $arq) {
        if ($arq['id_grupo'] == 4 && $arq['id_pasta'] == $id_pasta && $arq['id_subpasta'] == 0) {
            if($arq['editavel'] == 1){
                $lista_ti .= '
                <li>
                    <a href="arquivo2.php?id=' . htmlspecialchars($arq["id_arquivo"]) . '">
                        <i class="fas fa-file-alt"></i>
                        <button class="expand-btn">Abrir</button>
                        ' . htmlspecialchars($arq['nome']) . '
                    </a>
                </li>';
            }
            else{
                $lista_ti .= '
                <li>
                    <a href="arquivo.php?id=' . htmlspecialchars($arq["id_arquivo"]) . '">
                    <i class="fas fa-file-alt"></i>
                    <button class="expand-btn">Abrir</button>
                    ' . htmlspecialchars($arq['nome']) . '
                    </a>
                    </li>';
            }
        }
    }

    // Adiciona subpastas e seus arquivos
    foreach ($pasta['subpastas'] as $id_subpasta => $nome_subpasta) {
        $lista_ti .= '
            <li class="expandable">
                <button class="expand-btn">+</button>
                
                <i class="fas fa-folder"></i> ' . htmlspecialchars($nome_subpasta) . '
                <ul class="expandable-items">';

        // Adiciona arquivos da subpasta
        foreach ($dados_arq as $arq) {
            if ($arq['id_grupo'] == 4 && $arq['id_pasta'] == $id_pasta && $arq['id_subpasta'] == $id_subpasta) {
                if($arq['editavel'] == 1){
                    $lista_ti .= '
                    <li>
                        <a href="arquivo2.php?id=' . htmlspecialchars($arq["id_arquivo"]) . '">
                            <i class="fas fa-file-alt"></i>
                            <button class="expand-btn">Abrir</button>
                            ' . htmlspecialchars($arq['nome']) . '
                        </a>
                    </li>';
                }
                else{
                    $lista_ti .= '
                    <li>
                        <a href="arquivo.php?id=' . htmlspecialchars($arq["id_arquivo"]) . '">
                        <i class="fas fa-file-alt"></i>
                        <button class="expand-btn">Abrir</button>
                        ' . htmlspecialchars($arq['nome']) . '
                        </a>
                        </li>';
                }
            }
        }

        $lista_ti .= '
                </ul>
            </li>'; // Fecha subpasta
    }

    $lista_ti .= '
            </ul>
        </li>'; // Fecha pasta principal
}
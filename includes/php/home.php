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




//===============  F I N A N C E I R O  ======================================================================================================================= =================================================================== ===================================================================  

$sql = 'SELECT * FROM vw_grupo_estrutura WHERE id_grupo = 1';
$stmt = $db->query($sql);

$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pasta_estrutura = [];

foreach ($dados as $row) {
    $nome_pasta = htmlspecialchars($row['nome_pasta']);
    $nome_subpasta = htmlspecialchars($row['nome_subpasta']);
    $nome_arquivo = htmlspecialchars($row['nome_arquivo']);

    if (!isset($pasta_estrutura[$nome_pasta])) {
        $pasta_estrutura[$nome_pasta] = [];
    }

    if (!isset($pasta_estrutura[$nome_pasta][$nome_subpasta])) {
        $pasta_estrutura[$nome_pasta][$nome_subpasta] = [];
    }

    $pasta_estrutura[$nome_pasta][$nome_subpasta][] = $nome_arquivo;
}

$lista_financeiro = '';

foreach ($pasta_estrutura as $pasta => $subpastas) {

    $subpastas_validas = array_filter($subpastas, function($arquivos) {
        return !empty($arquivos); 
    });

    if (empty($subpastas_validas)) {
        continue;
    }

    $lista_financeiro .= '
        <li class="expandable">
            <button class="expand-btn">+</button>
            <i class="bi bi-gear-wide-connected gear-icon"></i>
            <i class="fas fa-folder"></i> ' . $pasta . '
            <ul class="expandable-items">';

    foreach ($subpastas_validas as $subpasta => $arquivos) {
        if (!$subpasta || empty($arquivos)) {
            continue;
        }

        $lista_financeiro .= '
            <li class="expandable">
                <button class="expand-btn">+</button>
                <i class="bi bi-gear-wide-connected"></i> 
                <i class="fas fa-file-alt"></i> ' . $subpasta . '
                <ul class="expandable-items">';

        foreach ($arquivos as $arquivo) {
            if (!$arquivo) {
                continue; 
            }

            $lista_financeiro .= '
                <li>
                    <i class="fas fa-file-alt"></i>
                    <button class="expand-btn">Abrir</button>
                    ' . $arquivo . '
                </li>';
        }

        $lista_financeiro .= '
                </ul>
            </li>';
    }

    $lista_financeiro .= '
            </ul>
        </li>';
}


//===============  C O M E R C I A L  ======================================================================================================================= =================================================================== ===================================================================  

$sql2 = 'SELECT * FROM vw_grupo_estrutura WHERE id_grupo = 2';
$stmt3 = $db->query($sql2);

$dados2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

$pasta_estrutura2 = [];

foreach ($dados2 as $row2) {
    $nome_pasta2 = htmlspecialchars($row2['nome_pasta']);
    $nome_subpasta2 = htmlspecialchars($row2['nome_subpasta']);
    $nome_arquivo2 = htmlspecialchars($row2['nome_arquivo']);

    if (!isset($pasta_estrutura2[$nome_pasta2])) {
        $pasta_estrutura2[$nome_pasta2] = [];
    }

    if (!isset($pasta_estrutura2[$nome_pasta2][$nome_subpasta2])) {
        $pasta_estrutura2[$nome_pasta2][$nome_subpasta2] = [];
    }

    $pasta_estrutura2[$nome_pasta2][$nome_subpasta2][] = $nome_arquivo2;
}

$lista_comercial = '';

foreach ($pasta_estrutura2 as $pasta => $subpastas) {
    $subpastas_validas = array_filter($subpastas, function($arquivos) {
        return !empty($arquivos); 
    });

    if (empty($subpastas_validas)) {
        continue;
    }

    $lista_comercial .= '
        <li class="expandable">
            <button class="expand-btn">+</button>
            <i class="bi bi-gear-wide-connected gear-icon"></i>
            <i class="fas fa-folder"></i> ' . $pasta . '
            <ul class="expandable-items">';

    foreach ($subpastas_validas as $subpasta => $arquivos) {
        if (!$subpasta || empty($arquivos)) {
            continue;
        }

        $lista_comercial .= '
            <li class="expandable">
                <button class="expand-btn">+</button>
                <i class="bi bi-gear-wide-connected"></i> 
                <i class="fas fa-file-alt"></i> ' . $subpasta . '
                <ul class="expandable-items">';

        foreach ($arquivos as $arquivo) {
            if (!$arquivo) {
                continue; 
            }

            $lista_comercial .= '
                <li>
                    <i class="fas fa-file-alt"></i>
                    <button class="expand-btn">Abrir</button>
                    ' . $arquivo . '
                </li>';
        }

        $lista_comercial .= '
                </ul>
            </li>';
    }

    $lista_comercial .= '
            </ul>
        </li>';
}


//===============  A D M I N I S T R A T I V O  ======================================================================================================================= =================================================================== ===================================================================  
$sql3 = 'SELECT * FROM vw_grupo_estrutura WHERE id_grupo = 3';
$stmt3 = $db->query($sql3);

$dados3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
$pasta_estrutura3 = [];

foreach ($dados3 as $row3) {
    $nome_pasta3 = htmlspecialchars($row3['nome_pasta']);
    $nome_subpasta3 = htmlspecialchars($row3['nome_subpasta']);
    $nome_arquivo3 = htmlspecialchars($row3['nome_arquivo']);

    if (!isset($pasta_estrutura3[$nome_pasta3])) {
        $pasta_estrutura3[$nome_pasta3] = [];
    }

    if (!isset($pasta_estrutura3[$nome_pasta3][$nome_subpasta3])) {
        $pasta_estrutura3[$nome_pasta3][$nome_subpasta3] = [];
    }

    $pasta_estrutura3[$nome_pasta3][$nome_subpasta3][] = $nome_arquivo3;
}

$lista_adm = '';

foreach ($pasta_estrutura3 as $pasta => $subpastas) {
    $subpastas_validas = array_filter($subpastas, function($arquivos) {
        return !empty($arquivos); 
    });

    if (empty($subpastas_validas)) {
        continue;
    }

    $lista_adm .= '
        <li class="expandable">
            <button class="expand-btn">+</button>
            <i class="bi bi-gear-wide-connected gear-icon"></i>
            <i class="fas fa-folder"></i> ' . $pasta . '
            <ul class="expandable-items">';

    foreach ($subpastas_validas as $subpasta => $arquivos) {
        if (!$subpasta || empty($arquivos)) {
            continue;
        }

        $lista_adm .= '
            <li class="expandable">
                <button class="expand-btn">+</button>
                <i class="bi bi-gear-wide-connected"></i> 
                <i class="fas fa-file-alt"></i> ' . $subpasta . '
                <ul class="expandable-items">';

        foreach ($arquivos as $arquivo) {
            if (!$arquivo) {
                continue;
            }

            $lista_adm .= '
                <li>
                    <i class="fas fa-file-alt"></i>
                    <button class="expand-btn">Abrir</button>
                    ' . $arquivo . '
                </li>';
        }

        $lista_adm .= '
                </ul>
            </li>';
    }

    $lista_adm .= '
            </ul>
        </li>';
}





//===============  T U D O - I N C L U S O  ======================================================================================================================= =================================================================== ===================================================================  
$sql4 = 'SELECT * FROM vw_grupo_estrutura WHERE id_grupo = 4';
$stmt4 = $db->query($sql4);

$dados4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
$pasta_estrutura4 = [];

foreach ($dados4 as $row4) {
    $nome_pasta4 = htmlspecialchars($row4['nome_pasta']);
    $nome_subpasta4 = htmlspecialchars($row4['nome_subpasta']);
    $nome_arquivo4 = htmlspecialchars($row4['nome_arquivo']);

    if (!isset($pasta_estrutura4[$nome_pasta4])) {
        $pasta_estrutura4[$nome_pasta4] = [];
    }

    if (!isset($pasta_estrutura4[$nome_pasta4][$nome_subpasta4])) {
        $pasta_estrutura4[$nome_pasta4][$nome_subpasta4] = [];
    }

    $pasta_estrutura4[$nome_pasta4][$nome_subpasta4][] = $nome_arquivo3;
}

$lista_ti = '';

foreach ($pasta_estrutura4 as $pasta => $subpastas) {
    $subpastas_validas = array_filter($subpastas, function($arquivos) {
        return !empty($arquivos); 
    });

    if (empty($subpastas_validas)) {
        continue;
    }

    $lista_ti .= '
        <li class="expandable">
            <button class="expand-btn">+</button>
            <i class="bi bi-gear-wide-connected gear-icon"></i>
            <i class="fas fa-folder"></i> ' . $pasta . '
            <ul class="expandable-items">';

    foreach ($subpastas_validas as $subpasta => $arquivos) {
        if (!$subpasta || empty($arquivos)) {
            continue;
        }

        $lista_ti .= '
            <li class="expandable">
                <button class="expand-btn">+</button>
                <i class="bi bi-gear-wide-connected"></i> 
                <i class="fas fa-file-alt"></i> ' . $subpasta . '
                <ul class="expandable-items">';

        foreach ($arquivos as $arquivo) {
            if (!$arquivo) {
                continue; 
            }

            $lista_ti .= '
                <li>
                    <i class="fas fa-file-alt"></i>
                    <button class="expand-btn">Abrir</button>
                    ' . $arquivo . '
                </li>';
        }

        $lista_ti .= '
                </ul>
            </li>';
    }

    $lista_ti .= '
            </ul>
        </li>';
}


?>

<?php

include '.././App/Db/connPoo.php';

// Cria uma nova instância PDO para a conexão com o banco de dados
$db = new PDO("mysql:host=localhost;dbname=intra_health", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);





//===============  F I N A N C E I R O  ======================================================================================================================= =================================================================== ===================================================================  

$sql = 'SELECT * FROM vw_grupo_estrutura WHERE id_grupo = 1';
$stmt = $db->query($sql);

// Busca todos os resultados
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Mostra os dados (para depuração)
// echo '<pre>'; print_r($dados); echo '</pre>';

// Organize os dados por nome da pasta
$pasta_estrutura = [];

foreach ($dados as $row) {
    $nome_pasta = htmlspecialchars($row['nome_pasta']);
    $nome_subpasta = htmlspecialchars($row['nome_subpasta']);
    $nome_arquivo = htmlspecialchars($row['nome_arquivo']);

    // Verifica se nome_pasta, nome_subpasta ou nome_arquivo são válidos
    if (!$nome_pasta || !$nome_subpasta || !$nome_arquivo) {
        continue; // Ignora se algum desses campos for null
    }

    if (!isset($pasta_estrutura[$nome_pasta])) {
        $pasta_estrutura[$nome_pasta] = [];
    }

    if (!isset($pasta_estrutura[$nome_pasta][$nome_subpasta])) {
        $pasta_estrutura[$nome_pasta][$nome_subpasta] = [];
    }

    $pasta_estrutura[$nome_pasta][$nome_subpasta][] = $nome_arquivo;
}

// Gera a lista HTML a partir da estrutura de dados
$lista_financeiro = '';

foreach ($pasta_estrutura as $pasta => $subpastas) {
    if (!$pasta) {
        continue; // Ignora se a pasta for null
    }

    $lista_financeiro .= '
        <li class="expandable">
            <button class="expand-btn">+</button>
            <i class="bi bi-gear-wide-connected gear-icon"></i>
            <i class="fas fa-folder"></i> ' . $pasta . '
            <ul class="expandable-items">';

    foreach ($subpastas as $subpasta => $arquivos) {
        if (!$subpasta) {
            continue; // Ignora se a subpasta for null
        }

        $lista_financeiro .= '
            <li class="expandable">
                <button class="expand-btn">+</button>
                <i class="bi bi-gear-wide-connected"></i> 
                <i class="fas fa-file-alt"></i> ' . $subpasta . '
                <ul class="expandable-items">';

        foreach ($arquivos as $arquivo) {
            if (!$arquivo) {
                continue; // Ignora se o arquivo for null
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
        </li>
    ';
}





//===============  C O M E R C I A L  ======================================================================================================================= =================================================================== ===================================================================  

$sql2 = 'SELECT * FROM vw_grupo_estrutura WHERE id_grupo = 2';
$stmt3 = $db->query($sql2);

// Busca todos os resultados
$dados2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

// Mostra os dados2 (para depuração)
// echo '<pre>'; print_r($dados2); echo '</pre>';

// Organize os dados2 por nome da pasta
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

// Gera a lista HTML a partir da estrutura de dados2
$lista_comercial = '';

foreach ($pasta_estrutura2 as $pasta => $subpastas) {
    $lista_comercial .= '
       
            <li class="expandable">
                <button class="expand-btn">+</button>
                <i class="bi bi-gear-wide-connected gear-icon"></i>
                <i class="fas fa-folder"></i> ' . $pasta . '
                <ul class="expandable-items">';

    foreach ($subpastas as $subpasta => $arquivos) {
        $lista_comercial .= '
            <li class="expandable">
                <button class="expand-btn">+</button>
                <i class="bi bi-gear-wide-connected"></i> 
                <i class="fas fa-file-alt"></i> ' . $subpasta . '
                <ul class="expandable-items">';

        foreach ($arquivos as $arquivo) {
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
        </li>
    ';
}





//===============  A D M I N I S T R A T I V O  ======================================================================================================================= =================================================================== ===================================================================  
$sql3 = 'SELECT * FROM vw_grupo_estrutura WHERE id_grupo = 3';
$stmt3 = $db->query($sql3);

// Busca todos os resultados
$dados3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

// Mostra os dados3 (para depuração)
// echo '<pre>'; print_r($dados3); echo '</pre>';

// Organize os dados3 por nome da pasta
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

// Gera a lista HTML a partir da estrutura de dados2
$lista_adm = '';

foreach ($pasta_estrutura3 as $pasta => $subpastas) {
    $lista_adm .= '
       
            <li class="expandable">
                <button class="expand-btn">+</button>
                <i class="bi bi-gear-wide-connected gear-icon"></i>
                <i class="fas fa-folder"></i> ' . $pasta . '
                <ul class="expandable-items">';

    foreach ($subpastas as $subpasta => $arquivos) {
        $lista_adm .= '
            <li class="expandable">
                <button class="expand-btn">+</button>
                <i class="bi bi-gear-wide-connected"></i> 
                <i class="fas fa-file-alt"></i> ' . $subpasta . '
                <ul class="expandable-items">';

        foreach ($arquivos as $arquivo) {
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
        </li>
    ';
}




//===============  T U D O - I N C L U S O  ======================================================================================================================= =================================================================== ===================================================================  
$sql4 = 'SELECT * FROM vw_grupo_estrutura WHERE id_grupo = 4';
$stmt4 = $db->query($sql4);

// Busca todos os resultados
$dados4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);

// Mostra os dados4 (para depuração)
// echo '<pre>'; print_r($dados4); echo '</pre>';

// Organize os dados4 por nome da pasta
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

// Gera a lista HTML a partir da estrutura de dados2
$lista_ti = '';

foreach ($pasta_estrutura4 as $pasta => $subpastas) {
    $lista_ti .= '
       
            <li class="expandable">
                <button class="expand-btn">+</button>
                <i class="bi bi-gear-wide-connected gear-icon"></i>
                <i class="fas fa-folder"></i> ' . $pasta . '
                <ul class="expandable-items">';

    foreach ($subpastas as $subpasta => $arquivos) {
        $lista_ti .= '
            <li class="expandable">
                <button class="expand-btn">+</button>
                <i class="bi bi-gear-wide-connected"></i> 
                <i class="fas fa-file-alt"></i> ' . $subpasta . '
                <ul class="expandable-items">';

        foreach ($arquivos as $arquivo) {
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
        </li>
    ';
}

?>

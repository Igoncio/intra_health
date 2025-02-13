<?php
include '.././App/Db/connPoo.php';

try {
    // Configuração do banco de dados
    $db = new PDO("mysql:host=192.168.1.15;dbname=intra_health", "teste", "H3@LTH_2024");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = isset($_GET['id']) ? $_GET['id'] : null;

    // Verificação se é uma requisição POST para upload de arquivo
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = '../uploads/';
            $uploadFile = $uploadDir . basename($_FILES['file']['name']);

            // Movendo o arquivo para o diretório de uploads
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
                $stmt = $db->prepare("UPDATE arquivo SET arq = :arq WHERE id_arquivo = :id");
                $stmt->execute([':arq' => $uploadFile, ':id' => $id]);
            }
        }
    }

    // Obtendo o nome do arquivo
    $stmt2 = $db->prepare("SELECT nome FROM arquivo WHERE id_arquivo = :id");
    $stmt2->execute([':id' => $id]);
    $dados2 = $stmt2->fetch(PDO::FETCH_ASSOC);
    $lista_nome = $dados2 ? $dados2['nome'] : '';

    // Obtendo o caminho do arquivo
    $stmt = $db->prepare("SELECT arq FROM arquivo WHERE id_arquivo = :id");
    $stmt->execute([':id' => $id]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificação se há um arquivo existente e configuração da visualização
    $lista = '';
    if ($dados && $dados['arq'] !== null) {
        $filePath = htmlspecialchars($dados['arq']);
        $extensao = pathinfo($filePath, PATHINFO_EXTENSION);

        // Determinando a pré-visualização com base na extensão do arquivo
        $preview = '';
        if (in_array($extensao, ['jpg', 'jpeg', 'png'])) {
            $preview = '<img src="' . $filePath . '" alt="Preview do arquivo" style="max-width: 100%; height: auto;">';
        } elseif ($extensao === 'pdf') {
            $preview = '<iframe src="' . $filePath . '" width="100%" height="400px"></iframe>';
        } elseif ($extensao === 'docx') {
            $preview .= '<p>A vizualização está disponivel apenas para arquivos em PDF, caso não seja pdf esta disponivel o dowload<br><a href="' . $filePath . '" download>Baixar o arquivo</a></p>';
        }

        $lista .= '
        <div class="preview-container" id="previewContainer">
            ' . $preview . '
        </div>';

        // Exibição do botão para carregar outro arquivo, se permitido
        if ($cad_arq == 1) {
            $lista .= '
            <div class="button-container" id="actionButtons">
                <button id="hidePreviewBtn" onclick="hidePreview(); return false;">
                    Carregar outro arquivo
                </button>
            </div>
            <form id="uploadForm" method="POST" enctype="multipart/form-data" style="display: none;">
                <input type="file" id="fileInput" name="file" accept=".pdf, .jpg, .jpeg, .png, .docx" required>
                <div class="button-container">
                    <button type="submit">Enviar</button>
                </div>
            </form>';
        }
    } else {
        // Formulário para upload de arquivo, caso não exista nenhum arquivo associado
        $lista .= '
        <form id="uploadForm" method="POST" enctype="multipart/form-data" style="display: block;">
            <input type="file" id="fileInput" name="file" accept=".pdf, .jpg, .jpeg, .png, .docx" required>
            <div class="button-container">
                <button type="submit">Enviar</button>
            </div>
        </form>';
    }

} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}
?>

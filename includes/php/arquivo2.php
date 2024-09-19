<?php
include '.././App/Db/connPoo.php';

$db = new PDO("mysql:host=localhost;dbname=intra_health", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];

        if ($file['error'] === UPLOAD_ERR_OK) {
            $uploadDir = '../uploads/'; 
            $uploadFile = $uploadDir . basename($file['name']);


            if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
                $stmt = $db->prepare("UPDATE arquivo SET arq = :arq WHERE id_arquivo = :id");
                $stmt->execute([':arq' => $uploadFile, ':id' => $id]);

                if ($stmt->rowCount() > 0) {
                    echo "boa";
                } 
            }}}}







$stmt = $db->prepare("SELECT arq FROM arquivo WHERE id_arquivo = :id");
$stmt->execute([':id' => $id]);

$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
$lista = '';

foreach ($dados as $row) {
    if ($row['arq'] == null) {
        $lista .= '
        <form id="uploadForm" method="POST" enctype="multipart/form-data" style="display: block;">
            <input type="hidden" id="fileId" name="fileId" value="' . htmlspecialchars($id) . '">
            <input type="file" id="fileInput" name="file" accept=".pdf, .jpg, .jpeg, .png" required>
            <div class="button-container">
                <button type="submit">Enviar</button>
            </div>
        </form>';
    } else {
        $extensao = pathinfo($row['arq'], PATHINFO_EXTENSION);
        
        $preview = '';
        if (in_array($extensao, ['jpg', 'jpeg', 'png'])) {
            $preview = '<img src="' . htmlspecialchars($row['arq']) . '" alt="Preview do arquivo" style="max-width: 100%; height: auto;">';
        } elseif ($extensao === 'pdf') {
            $preview = '<iframe src="' . htmlspecialchars($row['arq']) . '" width="100%" height="400px"></iframe>';
        }

        $lista .= '
        <div class="preview-container" id="previewContainer">
            ' . $preview . '
        </div>
        <div class="button-container" id="actionButtons">
            <button id="hidePreviewBtn" onclick="hidePreview(); return false;">
                Carregar outro arquivo
            </button>
        </div>
        <form id="uploadForm" method="POST" enctype="multipart/form-data" style="display: none;">
            <input type="hidden" id="fileId" name="fileId" value="' . htmlspecialchars($id) . '">
            <input type="file" id="fileInput" name="file" accept=".pdf, .jpg, .jpeg, .png" required>
            <div class="button-container">
                <button type="submit">Enviar</button>
            </div>
        </form>';
    }
}



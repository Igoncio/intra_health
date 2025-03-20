<?php
include '../App/Db/connPoo.php';

try {
    $db = new PDO("mysql:host=$dbHost;dbname=intra_health", "$dbUsername", "$dbPassword");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = isset($_GET['id']) ? $_GET['id'] : null;


    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = '../uploads/';
            $fileName = basename($_FILES['file']['name']);
            $uploadFile = $uploadDir . $fileName;
    
       
            $stmtOldFile = $db->prepare("SELECT arq FROM arquivo WHERE id_arquivo = :id");
            $stmtOldFile->execute([':id' => $id]);
            $oldFile = $stmtOldFile->fetch(PDO::FETCH_ASSOC);
    
     
            if ($oldFile && !empty($oldFile['arq']) && file_exists($oldFile['arq'])) {
                unlink($oldFile['arq']);
            }
    
         
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
                $stmt = $db->prepare("UPDATE arquivo SET arq = :arq WHERE id_arquivo = :id");
                if($stmt->execute([':arq' => $uploadFile, ':id' => $id])){
                    
                    $acao = "Realizou o upload de: '$fileName'";
                    $id_log = $_SESSION['id_user'];

                    $sql_log = "INSERT INTO log (id_user, acao)
                    VALUES (:id_user, :acao)";
    
                    $stmt_log = $db->prepare($sql_log);
                    $stmt_log->bindParam(':id_user', $id_log);
                    $stmt_log->bindParam(':acao', $acao);
                    $stmt_log->execute();


                }
            }
        }
    }


    $stmt2 = $db->prepare("SELECT nome FROM arquivo WHERE id_arquivo = :id");
    $stmt2->execute([':id' => $id]);
    $dados2 = $stmt2->fetch(PDO::FETCH_ASSOC);
    $lista_nome = $dados2 ? $dados2['nome'] : '';

    $stmt = $db->prepare("SELECT arq FROM arquivo WHERE id_arquivo = :id");
    $stmt->execute([':id' => $id]);
    $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    $lista = '';
    if ($dados && $dados['arq'] !== null) {
        $filePath = htmlspecialchars($dados['arq']);
        $extensao = pathinfo($filePath, PATHINFO_EXTENSION);

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

<?php

#SENHA GMAIL ACESSO A APP mbiz ysvt dhsb fiqo


include '.././App/Db/connPoo.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include '.././App/Db/connPoo.php';

$db = new PDO("mysql:host=localhost;dbname=intra_health", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Obtenha a lista de permissões
$select = "SELECT * FROM permissoes";
$stmt = $db->query($select);
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

$lista_perm = '';
foreach ($dados as $row) {
    $lista_perm .= '<option value="' . htmlspecialchars($row['id_permissao']) . '">' . htmlspecialchars($row['nome']) . '</option>';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_grupo = $_POST['id_grupo'];
    $id_permissao = $_POST['id_permissao'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha_hash = $_POST['senha_hash'];

    // Prepare o SQL
    $sql = "INSERT INTO usuario (id_grupo, id_permissao, nome, telefone, email, senha)
            VALUES (:id_grupo, :id_permissao, :nome, :telefone, :email, :senha_hash)";

    $stmt = $db->prepare($sql);

    // Bind os parâmetros
    $stmt->bindParam(':id_grupo', $id_grupo);
    $stmt->bindParam(':id_permissao', $id_permissao);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha_hash', $senha_hash);

    // Execute o statement
    if ($stmt->execute()) {
        // Envio de e-mail
        $mail = new PHPMailer(true); // Instancia PHPMailer

        try {
            // Configurações do servidor
            $mail->isSMTP();                                      // Define o envio por SMTP
            $mail->Host = 'smtp.gmail.com';               // Especifique o servidor SMTP
            $mail->SMTPAuth = true;                             // Ativa autenticação SMTP
            $mail->Username = 'intrahealthti@gmail.com';           // Seu e-mail
            $mail->Password = 'mbiz ysvt dhsb fiqo';                       // Sua senha
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Ativa criptografia TLS
            $mail->Port = 587;                                  // Porta TCP para TLS

            // Destinatários
            $mail->setFrom($email);
            $mail->addAddress($email);                  // Adiciona um destinatário

            // Conteúdo do e-mail
            $mail->isHTML(true);                                // Define o formato de e-mail como HTML
            $mail->Subject = 'Bem-vindo ao sistema!';
            $mail->Body    = "
            Olá $nome,<br><br>Você foi cadastrado em nosso sistema intra health, um sistema criado para o armazenamento de arquivos!<br>
            nome do usuario: $nome<br>
            senha: $senha_hash
            
            acesse sua conta em:  <br>http://192.168.1.78/intra_health/ <br>
            <br><br>Atenciosamente,<br>Equipe.";

            // Envio
            $mail->send();
            echo "<script>alert('Usuário cadastrado com sucesso! Um e-mail de confirmação foi enviado.')</script>";
            header('location: home.php');
        } catch (Exception $e) {
            echo "Usuário cadastrado com sucesso, mas não foi possível enviar o e-mail. Erro: {$mail->ErrorInfo}";
        }
    } else {
        echo "Erro ao cadastrar o usuário.";
    }
}
?>

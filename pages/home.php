<?php
require_once __DIR__ . '/../vendor/autoload.php';
include '../includes/menu.php';
include '../includes/php/home.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
    <main>
    <div class="content">
            <h2>Pastas</h2>

            <?php if ($cad_pasta): ?>
                <a href="nova_pasta.php"><button class="btn-primary">+ Nova pasta</button></a>
            <?php endif; ?>

            <?php if ($cad_pasta): ?>
                <a href="nova_subpasta.php"><button class="btn-primary">+ Nova subpasta</button></a>
            <?php endif; ?>

            <?php if ($cad_arq): ?>
                <a href="novo_arquivo.php"><button class="btn-primary">+ Novo arquivo</button></a>
            <?php endif; ?>

            <?php if ($edit_pasta || $excluir_pasta == 1): ?>
                <button class="btn-primary" id="openModal">Gerenciar pasta ou arquivo</button>
            <?php else: ?>
                <button style="display: none;" class="btn-primary" id="openModal">Gerenciar pasta ou arquivo</button>
            <?php endif; ?>

            <ul class="folder-list">
                <?php if ($acesso_financeiro): ?>
                    <li class="folder">
                        <div class="folder-title">Financeiro</div>
                        <ul class="folder-items"><?= $lista_financeiro ?></ul>
                    </li>
                <?php endif; ?>

                <?php if ($acesso_comercial): ?>
                    <li class="folder">
                        <div class="folder-title">Comercial <i class="fas fa-chevron-down"></i></div>
                        <ul class="folder-items"><?= $lista_comercial ?></ul>
                    </li>
                <?php endif; ?>

                <?php if ($acesso_adm): ?>
                    <li class="folder">
                        <div class="folder-title">Administrativo <i class="fas fa-chevron-down"></i></div>
                        <ul class="folder-items"><?= $lista_adm ?></ul>
                    </li>
                <?php endif; ?>

                <?php if ($acesso_ti): ?>
                    <li class="folder">
                        <div class="folder-title">T.I <i class="fas fa-chevron-down"></i></div>
                        <ul class="folder-items"><?= $lista_ti ?></ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeModal">&times;</span>
                <?php if ($edit_pasta): ?>
                    <h2>Gerenciar Pasta</h2>
                    <div>
                        <a href="editar_pasta.php"><button class="btn-primary">Editar</button></a>
                        <?php endif; ?>

                        <?php if ($excluir_pasta): ?>
                            <a href="excluir_pasta.php"><button class="btn-primary">Excluir</button></a>
                        <?php endif; ?>
                    </div>

                    <h2>Gerenciar Subpasta</h2>
                    <div class="juntar-btn">
                        <?php if ($edit_pasta): ?>
                        <a href="editar_subpasta.php"><button class="btn-primary">Editar</button></a>
                        <?php endif; ?>

                        <?php if ($excluir_pasta): ?>
                        <a href="excluir_subpasta.php"><button class="btn-primary">Excluir</button></a>           
                        <?php endif; ?>
                    </div>


                    <h2>Gerenciar Arquivo</h2>
                    <div class="juntar-btn">
                        <?php if ($edit_arq): ?>
                        <a href="editar_arquivo.php"><button class="btn-primary">Editar</button></a>
                        <?php endif; ?>

                        <?php if ($excluir_arq): ?>
                        <a href="excluir_arquivo.php"><button class="btn-primary">Excluir</button></a>           
                        <?php endif; ?>
                    </div>
            </div>
        </div>
    </main>

    <!-- FontAwesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- Script para abrir o modal ao clicar no ícone -->
    <script>
       
        const modal = document.getElementById("myModal");
        const btn = document.getElementById("openModal");
        const span = document.getElementById("closeModal");

        // Quando o usuário clica no botão, abre o modal 
        btn.onclick = function() {
        modal.style.display = "block";
        }

        // Quando o usuário clica na x (fechar), fecha o modal
        span.onclick = function() {
        modal.style.display = "none";
        }

        // Quando o usuário clica fora do modal, fecha-o
        window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
        }
        // JavaScript to handle folder toggle
        document.querySelectorAll('.folder').forEach(folder => {
            folder.addEventListener('click', () => {
                const items = folder.querySelector('.folder-items');
                const icon = folder.querySelector('.folder-title i');

                if (items.classList.contains('expanded')) {
                    items.classList.remove('expanded');
                    icon.style.transform = 'rotate(0deg)';
                } else {
                    items.classList.add('expanded');
                    icon.style.transform = 'rotate(180deg)';
                }
            });
        });

        // JavaScript to handle expandable items
        document.querySelectorAll('.expandable').forEach(item => {
            item.querySelector('.expand-btn').addEventListener('click', (event) => {
                event.stopPropagation(); // Prevents triggering the parent folder toggle
                const expandableItems = item.querySelector('.expandable-items');
                const button = item.querySelector('.expand-btn');

                if (expandableItems.classList.contains('expanded')) {
                    expandableItems.classList.remove('expanded');
                    button.textContent = '+';
                } else {
                    expandableItems.classList.add('expanded');
                    button.textContent = '−';
                }
            });
        });
    </script>
</body>
</html>

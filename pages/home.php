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
            <a href="nova_pasta.php"><button class="btn-primary">+ Nova pasta</button></a>
            <a href="novo_arquivo.php"><button class="btn-primary">+ Novo arquivo</button></a>
            <a href="novo_arquivo.php"><button class="btn-primary">+ Nova subpasta</button></a>
            <ul class="folder-list">
                <li class="folder">
                    <div class="folder-title">
                        Financeiro 
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <ul class="folder-items">
                        <?= $lista_financeiro ?>
                    </ul>


                    <li class="folder">
                    <div class="folder-title">
                        Comercial 
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <ul class="folder-items">
                        <?= $lista_comercial ?>
                    </ul>



                    <li class="folder">
                    <div class="folder-title">
                        Administrativo
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <ul class="folder-items">
                        <?= $lista_adm ?>
                    </ul>


                    <li class="folder">
                    <div class="folder-title">
                        T.I
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <ul class="folder-items">
                        
                        <?= $lista_ti ?>
                    </ul>


                   
                </li>
            </ul>
        </div>
    </main>

    <!-- FontAwesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- Script para abrir o modal ao clicar no ícone -->
    <script>
       

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

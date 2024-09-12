<?php
include '../includes/menu.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <main>
        <div class="content">
            <h2>Pastas</h2>
            <a href="nova_pasta.php"><button class="btn-primary">+ Nova pasta</button></a>
            <a href="novo_arquivo.php"><button class="btn-primary">+ Novo arquivo</button></a>
            <ul class="folder-list">
                <!-- Financeiro folder -->
                <li class="folder">
                    <div class="folder-title">
                        Financeiro 
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <ul class="folder-items">
                        <li class="expandable">
                            <button class="expand-btn">+</button>
                            <i class="bi bi-gear-wide-connected" id="gear-icon" ></i><i class="fas fa-folder"></i>Orçamentos
                            <ul class="expandable-items">
                                <!-- Add content here as needed -->
                               <li><i class="fas fa-file-alt"><button class="expand-btn">Abrir</button></i><a href="arquivo.php">Orçamento_1.pdf</a></li>
                               <li><i class="fas fa-file-alt"><button class="expand-btn">Abrir</button></i><a href="arquivo2.php">Orçamento_2.pdf</a></li>
                            </ul>
                        </li>
                        <li class="expandable">
                            <button class="expand-btn">+</button>
                            <i class="bi bi-gear-wide-connected"></i> 
                            <i class="fas fa-folder"></i>Cláusulas
                            <ul class="expandable-items">
                                <!-- Add content here as needed -->
                                <li><i class="fas fa-file-alt"><button class="expand-btn">Abrir</button></i>Cláusula_1.pdf</li>
                                <li><i class="fas fa-file-alt"><button class="expand-btn">Abrir</button></i>Cláusula_2.pdf</li>
                            </ul>
                        </li>
                    </ul>
                </li>       

                <div class="modal fade" id="gearModal" tabindex="-1" aria-labelledby="gearModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="gearModalLabel">Configurações</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                             
                                <a href="#"><button type="button" class="btn btn-primary">Excluir</button></a>
                                <a href="editar_pastas_sub.php"><button type="button" class="btn btn-primary">Editar</button></a>
                                <a href="nova_subpasta.php"><button type="button" class="btn btn-primary">Nova SubPasta</button></a>
        
                            </div>

                        </div>
                    </div>
                </div>



                <!-- Recursos Humanos folder -->
                <li class="folder">
                    <div class="folder-title">
                        Recursos Humanos
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <ul class="folder-items">
                        <li class="expandable">
                            <button class="expand-btn">+</button>
                            <i class="bi bi-gear-wide-connected" id="gear-icon" ></i><i class="fas fa-folder"></i>Orçamentos
                            <ul class="expandable-items">
                                <!-- Add content here as needed -->
                                <li class="expandable">
                                    <button class="expand-btn">+</button>
                                    <i class="bi bi-gear-wide-connected"></i> 
                                    <i class="fas fa-file-alt"></i>CLT
                                    <ul class="expandable-items">
                                        <li><i class="fas fa-file-alt"><button class="expand-btn">Abrir</button></i>Relatório_CLT_1.pdf</li>
                                        <li><i class="fas fa-file-alt"><button class="expand-btn">Abrir</button></i>Relatório_CLT_2.pdf</li>
                                    </ul>
                                </li>
                                <li class="expandable">
                                    <button class="expand-btn">+</button>
                                    <i class="bi bi-gear-wide-connected"></i> 
                                    <i class="fas fa-file-alt"></i>CNPJ
                                    <ul class="expandable-items">
                                        <li><i class="fas fa-file-alt"><button class="expand-btn">Abrir</button></i>Relatório_CNPJ_1.pdf</li>
                                        <li><i class="fas fa-file-alt"><button class="expand-btn">Abrir</button></i>Relatório_CNPJ_2.pdf</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="expandable">
                            <button class="expand-btn">+</button>
                            <i class="bi bi-gear-wide-connected"></i> 
                            <i class="fas fa-folder"></i>Outros
                            <ul class="expandable-items">
                                <!-- Add content here as needed -->
                                <li><i class="fas fa-file-alt"><button class="expand-btn">Abrir</button></i>Outro_1.pdf</li>
                                <li><i class="fas fa-file-alt"><button class="expand-btn">Abrir</button></i>Outro_2.pdf</li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- TI folder -->
                <li class="folder">
                    <div class="folder-title">
                        TI
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <ul class="folder-items">
                        <li class="expandable">
                            <button class="expand-btn">Abrir</button>
                            <i class="fas fa-folder"></i>Minicraft
                           
                        </li>
                        <li class="expandable">
                            <button class="expand-btn">+</button>
                            <i class="bi bi-gear-wide-connected"></i> 
                            <i class="fas fa-folder"></i>Cláusulas
                            <ul class="expandable-items">
                                <!-- Add content here as needed -->
                                <li><i class="fas fa-file-alt"><button class="expand-btn">Abrir</button></i>Cláusula_1.pdf</li> <button class="expand-btn">+</button>
                                <li><i class="fas fa-file-alt"><button class="expand-btn">Abrir</button></i>Cláusula_2.pdf</li> <button class="expand-btn">+</button>
                            </ul>
                           
                           
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

        
    </main>

    <!-- FontAwesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


<!-- Script para abrir o modal ao clicar no ícone -->
<script>
    document.getElementById('gear-icon').addEventListener('click', function () {
        var myModal = new bootstrap.Modal(document.getElementById('gearModal'));
        myModal.show();
    });
</script>

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

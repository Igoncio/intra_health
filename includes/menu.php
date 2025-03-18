<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id_user'])) {
    die("Você não está logado, por isso não pode acessar");
}

include_once 'php/consultar_permissoes.php';
$menu_query = "SELECT * FROM vw_grupo_usuario WHERE id_user = '$_SESSION[id_user]'";
$stmt_menu = $db->query($menu_query);
$dados_menu = $stmt_menu->fetchAll(PDO::FETCH_ASSOC);

foreach($dados_menu as $menu){
    $foto_user = $menu['foto'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/menu.css">
    <link rel="icon" href="../img/width_200.png" type="image/x-icon">
</head>
<body>
<nav class="navbar bg-body-tertiary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="../pages/home.php"><img id="logo-menu" src="../img/width_200.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a id="link-config" href="configuracao_usuario.php">
                    <img src="<?php echo $foto_user;?>" id="imagem-perfil" alt="">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><?php echo $_SESSION['nome']?></h5>
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul id="area-menu" class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                      
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
             
                      
                      <a class="nav-link active" aria-current="page" href="configuracao_usuario.php">Configurações</a>
                    </li>

                    <li class="nav-item dropdown ">
                        <?php if ($cad_user || $cad_arq || $cad_pasta || $cad_perm): ?>
                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Cadastros
                            </a>
                        <?php endif; ?>
                        <ul class="dropdown-menu">
                            <?php if ($cad_user): ?>
                                <li><a class="dropdown-item" href="cadastrar_usuario.php">Cadastrar Usuario</a></li>
                            <?php endif; ?>

                            <?php if ($cad_perm): ?>
                                <li><a class="dropdown-item" href="cadastrar_permissao.php">Cadastrar Permissão</a></li>
                            <?php endif; ?>

                            <?php if ($cad_pasta): ?>
                                <li><a class="dropdown-item" href="nova_pasta.php">Cadastrar Pasta</a></li>
                            <?php endif; ?>

                            <?php if ($cad_pasta): ?>
                                <li><a class="dropdown-item" href="nova_subpasta.php">Cadastrar Subpasta</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>

                    <?php if ($edit_user || $excluir_user): ?>
                        <li class="nav-item dropdown ">
                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gerenciar
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="gerenciar_usuario.php">Gerenciar Usuario</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>

              </div>
              <div id="juntar-menu">
                  <a id="a-menu" href="../"><i id="i-menu" class="fa-solid fa-arrow-right-from-bracket"></i></a>
                  <label for="">Sair</label>
              </div>
        </div>
    </div>
</nav>
</body>
</html>

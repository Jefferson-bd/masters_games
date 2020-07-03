<?php
// Incluir arquivo para fazer a conexão
include("Connections/conn_games.php");
// Consulta para trazer dados
$tabela         = "tbgeneros";
$ordenar_por    = "rotulo_genero";
$consulta_gen  = "SELECT * FROM ".$tabela." ORDER BY ".$ordenar_por."";
$lista_gen    = $conn_games->query($consulta_gen);
$row_gen       = $lista_gen->fetch_assoc();
$totalRows_gen = ($lista_gen)->num_rows;

// Consulta para trazer dados
$tabela         = "tbconsole";
$ordenar_por    = "nome_console";
$consulta_con  = "SELECT * FROM ".$tabela." ORDER BY ".$ordenar_por."";
$lista_con    = $conn_games->query($consulta_con);
$row_con       = $lista_con->fetch_assoc();
$totalRows_con = ($lista_con)->num_rows;
?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>Masters Games</title>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css -->
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="//code.jivosite.com/widget/ygGGJOQWdb" data-jv-id="Bv7L2yfy2r" async></script>
    <script src="https://kit.fontawesome.com/72e7ff902d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/meu_estilo_adm.css">
    <style>
        .dropdown-menu {
            width: 100%;
        }

        .scrollable-menu {
            width: auto;
            height: auto;
            max-height: 240px;
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <!-- ABRE A BARRA DE NAVEGAÇÃO -->
    <nav class="navbar navcolor navbar-expand-md nav-dark fixed-top" id="topNav">
        <a class="navbar-brand" href="index.php"><img src="imagens/mago1.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars colornav fa-lg"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="container">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">
                            <i class="fas fa-home fa-lg" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#lancamentos">LANÇAMENTOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#games">GAMES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#games_download">DOWNLOADS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#contato">CONTATO</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            GÊNEROS
                        </a>
                        <div class="dropdown-menu dropdown-menu scrollable-menu" aria-labelledby="navbarDropdownMenuLink">
                            <?php do { ?>
                            <a class="dropdown-item" href="games_por_genero.php?id_genero=<?php echo $row_gen['id_genero'];?>"><?php echo $row_gen['rotulo_genero']; ?></a>
                            <?php } while ($row_gen=$lista_gen->fetch_assoc())?>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            CONSOLES
                        </a>
                        <div class="dropdown-menu dropdown-menu scrollable-menu" style="" aria-labelledby="navbarDropdownMenuLink">
                            <?php do { ?>
                            <a class="dropdown-item" href="games_por_console.php?id_console=<?php echo $row_con['id_console'];?>"><?php echo $row_con['nome_console']; ?></a>
                            <?php } while ($row_con=$lista_con->fetch_assoc())?>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/login.php">
                            <i class="fas fa-user fa-lg" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-md-0" name="form_busca" id="form_busca" action="games_busca.php" method="get" role="search">
                    <input class="form-control mr-sm-2" type="search" placeholder="Busca Game" aria-label="Search" name="buscar" id="buscar" required size="20">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">
                        <i class="fas fa-search fa-lg" aria-hidden="true"></i>
                    </button>
                </form>

            </div>
        </div>

    </nav>
    <br>

    <!-- Link arquivos Bootstrap js -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script> -->
    <script src="bootstrap/js/scrool.js"></script>
</body>

</html>
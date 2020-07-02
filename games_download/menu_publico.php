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
    <!-- CODIGO DESABILITADO PARA NÃO HAVER CONFLITO -->
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="css/meu_estilo.css" type="text/css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body class="container-fluid">
    <!-- ABRE A BARRA DE NAVEGAÇÃO -->
    <nav class="navbar navbar-dark navbar-expand-md bg-dark fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse container" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="indexx.php">Fixed top<img src="..." alt=""></a>
            <ul class="navbar-nav mr-auto mt-2 mt-md-0">
                <li class="nav-item active">
                    <a class="nav-link" href="indexx.php"><i class="fas fa-home"></i><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="indexx.php#lancamentos">LANÇAMENTOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="indexx.php#games">GAMES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="indexx.php#games_download">DOWNLOADS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="indexx.php#contato">CONTATO</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      GÊNEROS
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                     <?php do { ?>
                      <a class="dropdown-item" href="games_por_genero.php?id_genero=<?php echo $row_gen['id_genero'];?>"><?php echo $row_gen['rotulo_genero']; ?></a>
                      <?php } while ($row_gen=$lista_gen->fetch_assoc())?>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      CONSOLES
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                     <?php do { ?>
                      <a class="dropdown-item" href="games_por_console.php?id_console=<?php echo $row_con['id_console'];?>"><?php echo $row_con['nome_console']; ?></a>
                      <?php } while ($row_con=$lista_con->fetch_assoc())?>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-md-0" name="form_busca" id="form_busca" action="games_busca.php" method="get" role="search">
                <input class="form-control mr-sm-2" type="search" placeholder="Busca Game" aria-label="Search" name="buscar" id="buscar" required size="20">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        
        <!-- <div class="container-fluid">
            Agrupamento para exibição MOBILE
            <div class="navbar-header">
                <a class="navbar-brand" href="">
                    <img src=".../ti09_php/imagens/logochurrascopequeno.png" alt="">
                </a>
            </div>
        
            nav direita
            <div class="collapse navbar-collapse" id="defaultNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="indexx.php">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li><a href="indexx.php#lancamentos">LANÇAMENTOS</a></li>
                    <li><a href="indexx.php#games">GAMES</a></li>
                    <li><a href="indexx.php#contato">CONTATO</a></li>
                    INICIO FORM DE BUSCA
                    <form action="games_busca.php" method="get" name="form_busca" id="form_busca" class="navbar-form navbar-left" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Busca Game" name="buscar" id="buscar" size="9" required>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    FIM FORM DE BUSCA
                    <li class="active">
                        <a href="admin/index.php">
                            <i class="fas fa-user"></i>
                        </a>
                    </li>
                </ul>
        
            </div>FIM NAV DIREITA
        </div> -->
    </nav><!-- FECHA A BARRA DE NAVEGAÇÃO -->

    <!-- CODIGO DESABILITADO PARA NÃO HAVER CONFLITO -->
    <!-- Link arquivos Bootstrap js -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script> -->
</body>

<?php 
    mysqli_free_result($lista_gen); 
    mysqli_free_result($lista_con);
?>
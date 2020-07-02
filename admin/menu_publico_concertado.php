<?php 
/*

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
*/
?>



<!doctype html>
<html lang="pt-br">

<head>
    <title>Masters Games</title>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/meu_estilo_adm.css" type="text/css">
    <script src="https://use.fontawesome.com/8e190217fe.js"></script>

</head>

<body>
    <!-- ABRE A BARRA DE NAVEGAÇÃO -->
    <nav class="sticky-top navbar navbar-dark navbar-expand-lg bg-dark">
        <a class="navbar-brand" href="index.php">LOGO<img src="" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="container">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">
                            <i class="fa fa-home fa-lg" aria-hidden="true"></i>
                        </a>
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

                    <li class="nav-item">
                        <a class="nav-link" href="../login.php">
                            <i class="fa fa-sign-out fa-lg" aria-hidden="true"></i>
                        </a>
                    </li>
                    </ul>
                    <form class="form-inline my-2 my-md-0" name="form_busca" id="form_busca" action="games_busca.php" method="get" role="search">
                        <input class="form-control mr-sm-2" type="search" placeholder="Busca Game" aria-label="Search" name="buscar" id="buscar" required size="20">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">
                        <i class="fa fa-search fa-lg" aria-hidden="true"></i>
                        </button>
                    </form>
                
            </div>
        </div>

    </nav>

    <!-- Link arquivos Bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<!doctype html>
<html lang="pt-br">

<head>
    <!-- <title>Área Administrativa</title>
    <meta charset="utf-8">
    Link arquivos Bootstrap css
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap3.css">
    Font awesome
    <script src="https://use.fontawesome.com/8e190217fe.js"></script>
    Meu estilo css
    <link rel="stylesheet" href="../css/meu_estilo_adm.css"> -->
</head>

<body class="bg-index">
    <h1 class="breadcrumb barratxtdownload hidden-xs hidden-sm"><b class="container">Área Administrativa</b></h1>
    <h1 class="breadcrumb barratxtdownload hidden-md hidden-lg"><b class="container">Área de ADM</b></h1>
    <main class="container">

        <div class="row">
            <!-- manter os elementos na linha -->
            <!-- ADM PRODUTOS -->
            <div class="col-sm-6 col-md-4" style="margin-top: 26px;">
                <div class="thumbnail">
                    <img src="../imagens/game_index.jpg" alt="" class="img-fluid">
                    <br>

                    <div class="blue">
                        <!-- Botão principal -->
                        <div>
                            <div>
                                <button class="btn btn-block" style="color:white;">
                                    JOGOS
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="blue">
                        <!-- Botão principal -->
                        <div>
                            <div>
                                <a href="lista_games.php">
                                    <button class="btn btn-outline-primary btn-block">
                                        LISTAR
                                        <i class="fa fa-book" aria-hidden="true"></i>
                                    </button>
                                </a>
                                <div style="padding: 3px;"></div>
                                <a href="insere_games.php">
                                    <button class="btn btn-outline-primary btn-block">
                                        INSERIR
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4" style="margin-top: 26px;">
                <div class="thumbnail">
                    <img src="../imagens/console_index.jpg" alt="" class="img-fluid">
                    <br>
                    <div class="corformconsole">
                        <!-- Botão principal -->
                        <div>
                            <div>
                                <button class="btn btn-block" style="color:white;">
                                    CONSOLE
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="corformconsole">
                        <!-- Botão principal -->
                        <div>
                            <div>
                                <a href="lista_console.php">
                                    <button class="btn btn-outline-success btn-block">
                                        LISTAR
                                        <i class="fa fa-book" aria-hidden="true"></i>
                                    </button>
                                </a>
                                <div style="padding: 3px;"></div>
                                <a href="insere_console.php">
                                    <button class="btn btn-outline-success btn-block">
                                        INSERIR
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4" style="margin-top: 26px;">
                <div class="thumbnail">
                    <img src="../imagens/genero_index.jpg" alt="" class="img-fluid">
                    <br>

                    <div class="barratxtgenero">
                        <!-- Botão principal -->
                        <div>
                            <div>
                                <button class="btn btn-block" style="color:white;">
                                    GÊNEROS
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="barratxtgenero">
                        <!-- Botão principal -->
                        <div>
                            <div>
                                <a href="lista_generos.php">
                                    <button class="btn btn-outline-light btn-block">
                                        LISTAR
                                        <i class="fa fa-book" aria-hidden="true"></i>
                                    </button>
                                </a>
                                <div style="padding: 3px;"></div>
                                <a href="insere_generos.php">
                                    <button class="btn btn-outline-light btn-block">
                                        INSERIR
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-md-4" style="margin-top: 26px;">
                <div class="thumbnail">
                    <img src="../imagens/download_index.jpg" alt="" class="img-fluid">
                    <br>

                    <div class="corformdownload">
                        <!-- Botão principal -->
                        <div>
                            <div>
                                <button class="btn btn-block" style="color:white;">
                                    DOWNLOADS
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="corformdownload">
                        <!-- Botão principal -->
                        <div>
                            <div>
                                <a href="lista_downloads.php">
                                    <button class="btn btn-outline-danger btn-block">
                                        LISTAR
                                        <i class="fa fa-book" aria-hidden="true"></i>
                                    </button>
                                </a>
                                <div style="padding: 3px;"></div>
                                <a href="insere_downloads.php">
                                    <button class="btn btn-outline-danger btn-block">
                                        INSERIR
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 offset-md-4" style="margin-top: 52px;">
                <div class="thumbnail">
                    <img src="../imagens/user_index.jpg" alt="" class="img-fluid">
                    <br>

                    <div class="corformuser">
                        <!-- Botão principal -->
                        <div>
                            <div>
                                <button class="btn btn-block" style="color:white;">
                                    USUÁRIOS
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="corformuser">
                        <!-- Botão principal -->
                        <div>
                            <div>
                                <a href="lista_usuarios.php">
                                    <button class="btn btn-outline-light btn-block">
                                        LISTAR
                                        <i class="fa fa-book" aria-hidden="true"></i>
                                    </button>
                                </a>
                                <div style="padding: 3px;"></div>
                                <a href="insere_usuarios.php">
                                    <button class="btn btn-outline-light btn-block">
                                        INSERIR
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- fecha elementos na linha -->
        br
    </main>
    <!-- Link arquivos Bootstrap js -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script> -->
</body>

</html>
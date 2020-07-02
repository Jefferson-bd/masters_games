<!doctype html>
<html lang="pt-br">

<head>
    <title>
        Masters Games
    </title>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/meu_estilo_adm.css">
</head>

<body class="container-fluid">
    <div class="d-none d-md-block">
        <br>
    </div>
    <br>
    <!-- Área do MENU -->
    <?php include('menu_publico.php'); ?>
    <a name="home">&nbsp;</a>
    <br>
    <div class="">
        <?php include('carroussel.php'); ?>
    </div>
    <main class="container">

        <!-- Área de LANÇAMENTOS -->
        <a name="lancamentos">&nbsp;</a>
        <div class="d-none d-md-block">
            <hr>
        </div>
        <?php include('games_lancamento.php'); ?>

        <!-- Área de GAMES EM GERAL -->
        <a name="games">&nbsp;</a>
        <hr>
        <?php include('games_geral.php'); ?>

        <!-- Área de GAMES DOWNLOAD -->
        <a name="games_download">&nbsp;</a>
        <hr>
        <?php include('games_download.php'); ?>
        <hr>
        <!-- RODAPÉ -->
        <footer>
            <?php include('rodape.php'); ?>
            <a name="contato">&nbsp;</a>
        </footer>



    </main>


    <!-- Link arquivos bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
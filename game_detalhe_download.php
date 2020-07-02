<?php
// Incluir Arquivo para Fazer a Conexão
include("Connections/conn_games.php");

// Consulta pra Trazer os Dados e se Necessário Filtrar
$tabela        = "tbdownload";
$campo_filtro  = "id_download";
$filtro_select = $_GET['id_download'];
$ordenar_por    = "nome_download ASC";
$consulta   =   "SELECT *
                FROM ".$tabela."
                WHERE ".$campo_filtro."='".$filtro_select."'
                ORDER BY ".$ordenar_por."";
$lista      =   $conn_games->query($consulta);
$row        =   $lista->fetch_assoc();
$totalRows  =   ($lista)->num_rows;
?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>Games</title>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="" style="background-color: #000;">
    <div class="d-none d-md-block">
        <br>
        <br>
        <br>
        <br>
    </div>
    <?php include('menu_publico.php'); ?>
    <div class="d-none d-md-block">
        <?php// include('carroussel.php'); ?>
    </div>
    <div class="d-block d-sm-none">
        <br>
        <br>
        <br>
    </div>
    <main class="container">
        <h2 class="breadcrumb alert-danger">
            <a href="javascript:window.history.go(-1)" class="btn btn-danger">
                Voltar
            </a>
            &nbsp;&nbsp;
            <strong><?php echo $row['nome_download']; ?></strong>
        </h2>
        <div class="row">
            <!-- Manter os Elementos na Linha -->
            <!-- Abre a Estrutura de Repetição -->
            <?php do{ ?>
            <!-- Abre thumbnail/card -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Dimensionamento -->
                <div class="thumbnail" align="center">
                    <img src="imagens/<?php echo $row['imagem_download']; ?>" alt="" class="img-responsive img-rounded" style="height: 20em; width: 40%;">
                    <br>
                    <h3 class="text-danger">
                        <strong><?php echo $row['nome_download']; ?></strong>
                    </h3>
                    <br>
                    <div align="center" style="background-color:rgba(255,255,255,0.8);">
                        <br>
                        <p class="text-left">
                            &nbsp;&nbsp;Plataforma: <?php echo $row['plataforma_download']; ?>
                        </p>
                        <p class="text-left">
                            &nbsp;&nbsp;Tipo do Arquivo: <?php echo $row['arquivo_download']; ?>
                        </p>

                        <br>
                        <p>
                            <div align="center">
                                <a href="games_download/<?php echo ($row['arquivo_download']); ?>">
                                    <button class="btn btn-primary" role="button" download>
                                        &nbsp;Baixar
                                    </button>
                                </a>
                            </div>
                        </p>
                        <br>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <!-- Fecha thumbnail/card -->
        <?php } while ($row=$lista->fetch_assoc()); ?>
        <!-- Fecha a Estrutura de Repetição -->
        </div>
        <!-- RODAPÉ -->
        <footer>
            <?php include('rodape.php'); ?>
        </footer>
    </main>
    <!-- Link arquivos bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<?php mysqli_free_result($lista); ?>
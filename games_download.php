<?php
// Incluir Arquivo para Fazer a Conexão
include("Connections/conn_games.php");

// Consulta pra Trazer os Dados e se Necessário Filtrar
$tabela        = "tbdownload";
$ordenar_por    = "nome_download ASC";
$consulta   =   "SELECT *
                FROM ".$tabela."
                ORDER BY ".$ordenar_por."";
$lista      =   $conn_games->query($consulta);
$row        =   $lista->fetch_assoc();
$totalRows  =   ($lista)->num_rows;
?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>Lista de Downloads</title>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css -->
    <!-- CODIGO DESABILITADO PARA NÃO HAVER CONFLITO -->
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
</head>

<body class="container">
    <h2 class="breadcrumb alert-danger">Games Download</h2>
    <div class="row">
        <!-- Manter os Elementos na Linha -->
        <!-- Abre a Estrutura de Repetição -->
        <?php do{ ?>
        <!-- Abre thumbnail/card -->
        <div class="col-sm-6 col-md-4">
            <!-- Dimensionamento -->
            <div class="thumbnail">
                <a href="game_detalhe.php?id_download=<?php echo $row['id_download']; ?>">
                    <img src="imagens/<?php echo $row['imagem_download']; ?>" alt="" class="img-thumbnail img-responsive img-rounded" style="height: 20em; width: 70%;">
                </a>
                <div class="caption text-right">
                    <h3 class="text-danger">
                        <strong><?php echo $row['nome_download']; ?></strong>
                    </h3>
                    <p class="text-warning">
                        <strong><?php echo $row['plataforma_download']; ?></strong>
                    </p>
                    <p>
                        <a href="game_detalhe_download.php?id_download=<?php echo $row['id_download']; ?>" class="btn btn-danger" role="button">
                            <span class="hidden-xs">
                                Mais Informações...
                            </span>
                        </a>
                        <br>
                    </p>
                </div>
            </div>
        </div>
        <!-- Fecha thumbnail/card -->
        <?php } while ($row=$lista->fetch_assoc()); ?>
        <!-- Fecha a Estrutura de Repetição -->
    </div>

    <!-- CODIGO DESABILITADO PARA NÃO HAVER CONFLITO -->
    <!-- Link arquivos Bootstrap js -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script> -->
</body>

</html>
<?php mysqli_free_result($lista); ?>
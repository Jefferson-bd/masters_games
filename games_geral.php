<?php
// Incluir Arquivo para Fazer a Conexão
include("Connections/conn_games.php");

// Consulta pra Trazer os Dados e se Necessário Filtrar
$tabela        = "vw_tbgames";
$campo_filtro  = "lancamento_game";
$filtro_select = "Não";
$ordenar_por    = "nome_game ASC";
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
    <!-- CODIGO DESABILITADO PARA NÃO HAVER CONFLITO -->
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
</head>

<body class="container">
    <h2 class="breadcrumb alert-danger">Games</h2>
    <div class="row">
        <!-- Manter os Elementos na Linha -->
        <!-- Abre a Estrutura de Repetição -->
        <?php do{ ?>
        <!-- Abre thumbnail/card -->
        <div class="col-sm-12 col-md-6 col-lg-4">
            <!-- Dimensionamento -->
            <div class="thumbnail">
                <a href="game_detalhe.php?id_game=<?php echo $row['id_game']; ?>">
                    <img src="imagens/<?php echo $row['imagem_game']; ?>" alt="" class="img-thumbnail img-responsive rounded mx-auto d-block" style="height: 19em; width: 70%;">
                </a>
                <div class="caption text-left">
                    <h3 class="text-danger">
                        <strong><?php echo $row['nome_game']; ?></strong>
                    </h3>
                    <p class="text-warning">
                        <strong><?php echo $row['rotulo_genero']; ?></strong>
                    </p>
                    <p class="text-left">
                        <?php echo mb_strimwidth($row['descri_game'],0,42,'...'); ?>
                    </p>
                    <p>
                        <button class="btn btn-default disabled" role="button">
                            <?php echo number_format($row['valor_game'],2,',','.'); ?>
                        </button>
                        <a href="game_detalhe.php?id_game=<?php echo $row['id_game']; ?>" class="btn btn-danger" role="button">
                            <span class="hidden-xs">
                                Saiba mais...
                            </span>
                        </a>
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
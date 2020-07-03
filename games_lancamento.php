<?php
// Incluir Arquivo para Fazer a Conexão
include("Connections/conn_games.php");

// Consulta pra Trazer os Dados e se Necessário Filtrar
$tabela_lancamento        = "vw_tbgames";
$campo_filtro_lancamento  = "lancamento_game";
$filtro_select_lancamento = "Sim";
$ordenar_por_lancamento   = "nome_game ASC";
$consulta_lancamento   =   "SELECT *
                        FROM ".$tabela_lancamento."
                        WHERE ".$campo_filtro_lancamento."='".$filtro_select_lancamento."'
                        ORDER BY ".$ordenar_por_lancamento."";
$lista_lancamento      =   $conn_games->query($consulta_lancamento);
$row_lancamento        =   $lista_lancamento->fetch_assoc();
$totalRows_lancamento  =   ($lista_lancamento)->num_rows;
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
    <h2 class="breadcrumb alert-danger"><strong>Lançamentos</strong></h2>
    <div class="row">
        <!-- Manter os Elementos na Linha -->
        <!-- Abre a Estrutura de Repetição -->
        <?php do{ ?>
        <!-- Abre thumbnail/card -->
        <div class="col-sm-12 col-md-6 col-lg-4">
            <!-- Dimensionamento -->
            <div class="thumbnail">
                <a href="game_detalhe.php?id_game=<?php echo $row_lancamento['id_game']; ?>">
                    <img src="imagens/<?php echo $row_lancamento['imagem_game']; ?>" alt="" class="img-thumbnail img-responsive rounded mx-auto d-block" style="height: 19em; width: 70%;">
                </a>
                <div class="caption text-left">
                    <h3 class="text-danger">
                        <strong><?php echo $row_lancamento['nome_game']; ?></strong>
                    </h3>
                    <p class="text-warning">
                        <strong><?php echo $row_lancamento['rotulo_genero']; ?></strong>
                    </p>
                    <p class="text-left">
                        <?php echo mb_strimwidth($row_lancamento['descri_game'],0,42,'...'); ?>
                    </p>
                    <p>
                        <button class="btn btn-default disabled" role="button">
                            <?php echo number_format($row_lancamento['valor_game'],2,',','.'); ?>
                        </button>
                        <a href="game_detalhe.php?id_game=<?php echo $row_lancamento['id_game']; ?>" class="btn btn-danger" role="button">
                            <span class="hidden-xs">
                                Saiba mais...
                            </span>
                            </span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <!-- Fecha thumbnail/card -->
        <?php } while ($row_lancamento=$lista_lancamento->fetch_assoc()); ?>
        <!-- Fecha a Estrutura de Repetição -->
    </div>

    <!-- CODIGO DESABILITADO PARA NÃO HAVER CONFLITO -->
    <!-- Link arquivos Bootstrap js -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script> -->
</body>

</html>
<?php mysqli_free_result($lista_lancamento); ?>
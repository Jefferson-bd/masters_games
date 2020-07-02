<?php
// Incluir Arquivo para Fazer a Conexão
include("Connections/conn_games.php");

// Consulta pra Trazer os Dados e se Necessário Filtrar
$tabela        = "vw_tbgames";
$campo_filtro  = "id_game";
$filtro_select = $_GET['id_game'];
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
            <strong><?php echo $row['nome_game']; ?></strong>
        </h2>
        <div class="row">
            <!-- Manter os Elementos na Linha -->
            <!-- Abre a Estrutura de Repetição -->
            <?php do{ ?>
            <!-- Abre thumbnail/card -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- Dimensionamento -->
                <div class="thumbnail" align="center">
                    <img src="imagens/<?php echo $row['imagem_game']; ?>" alt="" class="img-responsive img-rounded d-none d-lg-block" style="height: 22em; width: 36%;">
                    <img src="imagens/<?php echo $row['imagem_game']; ?>" alt="" class="img-responsive img-rounded d-block d-sm-none" style="height: 22em; width: 50%;">
                    <br>
                    <h3 class="text-danger">
                        <strong><?php echo $row['nome_game']; ?></strong>
                    </h3>
                    <br>
                    <p class="text-left">
                        <?php echo $row['descri_game']; ?>
                    </p>
                    <br>
                    <br>
                    <iframe class="d-none d-lg-block" src="<?php echo $row['trailer_game']; ?>" style="height: 25em; width: 75%;"></iframe>
                    <iframe class="d-block d-sm-none" src="<?php echo $row['trailer_game']; ?>" style="height: 18em; width: 90%;"></iframe>
                    <br>
                    <br>
                    <div class="caption text-left" style="background-color:rgba(255,255,255,0.8);" container>
                        <br>
                        <p class="text-warning">
                            &nbsp;&nbsp;<strong>Gênero: <?php echo $row['rotulo_genero']; ?></strong>
                        </p>
                        <p class="text-warning">
                            &nbsp;&nbsp;<strong>Console: <?php echo $row['nome_console']; ?></strong>
                        </p>
                        <p class="text-warning">
                            &nbsp;&nbsp;<strong>Lançamento: <?php echo $row['lancamento_game']; ?></strong>
                        </p>
                        <p class="text-warning">
                            &nbsp;&nbsp;<strong>Tamanho: <?php echo $row['tamanho_game']; ?></strong>
                        </p>
                        <p class="text-warning">
                            &nbsp;&nbsp;<strong>Data de Lançamento: <?php echo date('m-d-Y',strtotime($row['data_lancamento_game']));?></strong>
                        </p>

                        <p>
                            <button class="btn btn-default disabled" role="button">
                                &nbsp;Valor: <?php echo number_format($row['valor_game'],2,',','.'); ?>
                            </button>
                        </p>
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
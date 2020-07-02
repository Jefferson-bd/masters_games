<?php 
// Incluir arquivo e fazer a conexão com o banco
include("../Connections/conn_games.php");
// Selecionar os dados
$consulta   = "SELECT * FROM vw_tbgames ORDER BY lancamento_game ASC, nome_game ASC";
// Fazer a lista completa dos dados
$lista      =   $conn_games->query($consulta);
$row        =   $lista->fetch_assoc();
$totalRows  =   ($lista)->num_rows;
?>

<!-- INICIO DA ESTRUTURA HTML -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Lista de Jogos</title>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap3.css">
    <!-- Font awesome -->
    <script src="https://use.fontawesome.com/8e190217fe.js"></script>
    <!-- Meu estilo css -->
    <link rel="stylesheet" href="../css/meu_estilo_adm.css">
    <style>
        iframe {
            width: 200px;
            height: 200px;
        }
    </style>
</head>

<body class="bg-game">
<?php include "menu_adm.php"; ?>
    <h1 class="breadcrumb barratxt"><b class="container">Lista de Jogos</b></h1>
    
    <main class="container">
        <div class="table-responsive-sm">
            <table class="table corform">
                <thead class="thead-dark">
                    <tr>
                        <th hidden>ID</th>
                        <th>
                            JOGO
                        </th>
                        <th hidden>GENERO</th>
                        <th class="hidden-xs hidden-sm">PLATAFORMA</th>
                        <th class="hidden-md hidden-lg">
                            <i class="fa fa-gamepad fa-2x" aria-hidden="true"></i>
                        </th>
                        <th class="hidden-xs hidden-sm">DESCRIÇÃO</th>
                        <th class="hidden-xs hidden-sm hidden-md">LANÇAMENTO</th>
                        <th hidden>TAMANHO</th>
                        <th hidden>DATA DE LANÇAMENTO</th>
                        <th class="hidden-xs hidden-sm">VALOR</th>
                        <th>IMAGEM</th>
                        <th class="hidden-xs hidden-sm">TRAILER</th>
                        <th>
                            <a href="insere_games.php" target="_self" class="btn btn-outline-success" role="button">
                                <span class="hidden-xs hidden-sm hidden-md">ADICIONAR</span>
                                <i class="fa fa-plus-square" aria-hidden="true"></i>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php do { ?>
                    <tr>
                        <td hidden><?php echo $row['id_game']; ?></td>
                        <td>
                            <?php echo $row['nome_game']; ?>
                            <div class="hidden-lg hidden-md">
                            <?php 
                              if($row['lancamento_game']=='Sim'){
                                  echo ("<i class='fa fa-rocket fa-lg' aria-hidden='true'></i>");
                              }else if($row['lancamento_game']=='Não'){
                                  echo ("<i class='fa fa-clock-o fa-lg' aria-hidden='true''></i>");
                              };
                            ?>
                            </div>
                        </td>
                        <td hidden><?php echo $row['rotulo_genero']; ?></td>

                        <td class="hidden-xs hidden-sm">
                            <?php echo $row['nome_console']; ?>
                        </td>
                        <td class="hidden-md hidden-lg">
                            <?php echo $row['sigla_console']; ?>
                        </td>

                        <td class="hidden-xs hidden-sm"><?php echo mb_strimwidth ($row['descri_game'],0,65,'...'); ?></td>
                        <td class="hidden-sm hidden-xs hidden-md">
                            <?php 
                              if($row['lancamento_game']=='Sim'){
                                  echo ("<i class='fa fa-rocket fa-2x' aria-hidden='true'></i>");
                              }else if($row['lancamento_game']=='Não'){
                                  echo ("<i class='fa fa-clock-o fa-2x' aria-hidden='true''></i>");
                              };
                            ?>
                        </td>
                        <td hidden><?php echo $row['tamanho_game']; ?></td>
                        <td hidden><?php echo $row['data_lancamento_game']; ?></td>
                        <td class="hidden-sm hidden-xs">R$<?php echo number_format($row['valor_game'],2,',','.'); ?></td>
                        <td class="hidden-xs hidden-sm">
                            <img src="../imagens/<?php echo $row['imagem_game']; ?>" alt="<?php echo $row['nome_game']; ?>" width="100px">
                        </td>
                        <td class="hidden-md hidden-lg">
                            <img src="../imagens/<?php echo $row['imagem_game']; ?>" alt="<?php echo $row['nome_game']; ?>" width="80px">
                        </td>
                        <td class="hidden-xs hidden-sm">
                            <?//php echo $row['trailer_game']; ?>
                            <iframe src="<?php echo $row['trailer_game']; ?>"></iframe>
                        </td>


                        <td>
                            <a href="atualiza_games.php?id_game=<?php echo $row['id_game']; ?>" target="_self" class="btn btn-primary btn-block" role="button">
                                <span class="hidden-xs hidden-sm hidden-md">ALTERAR</span>
                                <i class="fa fa-refresh" aria-hidden="true"></i>
                            </a>
                            <br>
                            <button class="delete btn btn-danger btn-block" data-nome="<?php echo $row['nome_game']; ?>" data-id="<?php echo $row['id_game']; ?>">
                                <span class="hidden-xs hidden-sm hidden-md">EXCLUIR</span>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>

                        </td>
                    </tr>
                    <?php } while ($row = $lista->fetch_assoc()); ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger text-left">ATENÇÃO!</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Deseja mesmo EXCLUIR o item?
                    <h4><span class="nome text-danger"></span></h4>
                </div>
                <div class="modal-footer">
                    <a href="#" type="button" class="btn btn-danger delete-yes">
                        Confirmar
                    </a>
                    <button class="btn btn-outline-dark" data-dismiss="modal">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <!-- Script para o Modal -->
    <script type="text/javascript">
        $('.delete').on('click', function() {
            var nome = $(this).data('nome');
            // buscar o valor do atributo data-nome
            var id = $(this).data('id');
            // buscar o valor do atributo id
            $('span.nome').text(nome);
            // Inserir o nome do item na pergunta de confirmação
            $('a.delete-yes').attr('href', 'exclui_games.php?id_game=' + id);
            // mudar dinâmica o id do link no botão confirmar
            $('#myModal').modal('show'); // modal abre
        });
    </script>

</body>

</html>
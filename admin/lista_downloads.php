<?php
include("../Connections/conn_games.php");
mysqli_select_db($conn_games,$database_conn);
$consulta = "SELECT * FROM tbdownload ORDER BY nome_download ASC";
$lista = $conn_games->query($consulta);
$row = $lista->fetch_assoc();
$totalRows = ($lista)->num_rows;
?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>Lista de Downloads</title>
    <meta charset="utf-8">
    <!-- Bootstrap -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap3.css">
    <!-- Font awesome -->
    <script src="https://use.fontawesome.com/8e190217fe.js"></script>
    <!-- Meu estilo css -->
    <link rel="stylesheet" href="../css/meu_estilo_adm.css">
</head>

<body class="bg-download">
   <?php include "menu_adm.php"; ?>
    <h1 class="breadcrumb barratxtdownload"><b class="container">Lista de Downloads</b></h1>
    <main class="container">
           <div class="table-responsive-sm">
            <table class="table corformdownload">
                <thead class="thead-dark">
                    <tr>
                        <th hidden>ID</th><!-- cabeça da coluna -->
                        <th>NOME</th>
                        <th class="hidden-xs hidden-sm">PLATAFORMA</th>
                        <th class="hidden-md hidden-lg">
                            <i class="fa fa-gamepad fa-2x" aria-hidden="true"></i>
                        </th>
                        <th>IMAGEM</th>
                        <th class="hidden-xs hidden-sm">ARQUIVO</th>
                        <th>
                            <a href="insere_downloads.php" target="_self" class="btn btn-block btn-outline-success" role="button">
                                <span class="hidden-xs hidden-sm">ADICIONAR</span>
                                <i class="fa fa-plus-square" aria-hidden="true"></i>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php do { ?>
                    <tr>
                        <td hidden><?php echo $row['id_download']; ?></td>
                        <td><?php echo $row['nome_download']; ?></td>
                        <td><?php echo $row['plataforma_download']; ?></td>
                        <td>
                            <img src="../imagens/<?php echo $row['imagem_download']; ?>" alt="<?php echo $row['imagem_download']; ?>" width="100px">
                        </td>
                        <td class="hidden-xs hidden-sm">
                            <a href="../games_download/<?php echo $row['arquivo_download']; ?>" download>Baixar</a>
                        </td>
                        <td>
                            <a href="atualiza_downloads.php?id_download=<?php echo $row['id_download']; ?>" target="_self" class="btn btn-primary btn-block" role="button">
                                <span class="hidden-xs hidden-sm">ALTERAR</span>
                                <i class="fa fa-refresh" aria-hidden="true"></i>
                            </a>
                            <br>
                            
                            <button data-nome="<?php echo $row['nome_download']; ?>" data-id="<?php echo $row['id_download']; ?>" class="delete btn btn-danger btn-block">
                                 <span class="hidden-xs hidden-sm">EXCLUIR</span>
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
                    <h4 class="modal-title text-danger">ATENÇÃO!</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Deseja Mesmo EXCLUIR o Download?
                    <h4><span class="nome text-danger"></span></h4>
                </div>
                <div class="modal-footer">
                    <a href="#" type="button" class="btn btn-danger delete-yes">Confirmar</a>
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- Script para o Modal -->
    <script type="text/javascript">
        $('.delete').on('click', function() {
            var nome = $(this).data('nome');
            // Buscar o Valor do Atributo data-nome
            var id = $(this).data('id');
            // Buscar o Valor do Atributo data-id
            $('span.nome').text(nome);
            // Inserir o Nome do Item na Pergunta de Confirmação
            $('a.delete-yes').attr('href', 'exclui_downloads.php?id_download=' + id);
            // Mudar Dinâmicamente o id do Link no Botão Confirmar
            $('#myModal').modal('show'); // Modal Abre
        });
    </script>
</body>

</html>
<?php mysqli_free_result($lista); ?>
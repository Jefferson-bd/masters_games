<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_games.php");
// Selecionar o banco de dados
mysqli_select_db($conn_games,$database_conn);
// Selecionar os dados
$consulta = "SELECT * FROM tbconsole ORDER BY nome_console ASC";
// Fazer a lista completa dos dados
$lista = $conn_games->query($consulta);
// Separar os dados em linhas(row)
$row = $lista->fetch_assoc();
// Contar o total de linhas
$totalRows = ($lista)->num_rows;
?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>Listas de Consoles</title>
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
</head>

<body class="bg-console">
   <?php include "menu_adm.php"; ?>
    <h1 class="breadcrumb barratxtconsole"><b class="container col-lg-8 offset-lg-2 btn-block">Lista de Consoles</b></h1>
    <main class="container">
        <!-- Abertura da DIV de dimensionamento da tabela -->
        <div class="table-responsive-sm col-lg-10 offset-lg-1">
            <table class="table corformconsole">
                <thead class="thead-dark">
                    <tr>
                        <th hidden>ID</th><!-- cabeça da coluna -->
                        <th>SIGLA</th>
                        <th>Plataforma</th>
                        <th>
                            <a href="insere_console.php" target="_self" class="btn btn-outline-success btn-block" role="button">
                                <span class="hidden-xs hidden-sm">ADICIONAR</span>
                                <i class="fa fa-plus-square" aria-hidden="true"></i>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php do { ?>
                    <tr>
                        <!-- Linha da tabela -->
                        <!-- Insira os dados determinando a linha e o campo -->
                        <td hidden><?php echo $row['id_console']; ?></td>
                        <td><?php echo $row['sigla_console']; ?></td>
                        <td><?php echo $row['nome_console']; ?></td>
                        <td>
                            <a href="atualiza_console.php?id_console=<?php echo $row['id_console']; ?> " target="_self" class="btn btn-primary btn-block" role="button">
                                <span class="hidden-xs hidden-sm">ALTERAR</span>
                                <i class="fa fa-refresh" aria-hidden="true"></i>

                            </a>
                            <br>

                            <button class="delete btn btn-danger btn-block" data-nome="<?php echo $row['nome_console']; ?>" data-id="<?php echo $row['id_console']; ?>">
                                <span class="hidden-xs hidden-sm">EXCLUIR</span>
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                    <?php } while ($row = $lista->fetch_assoc()); ?>
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
            $('a.delete-yes').attr('href', 'exclui_console.php?id_console=' + id);
            // mudar dinâmica o id do link no botão confirmar
            $('#myModal').modal('show'); // modal abre
        });
    </script>
</body>

</html>
<?php mysqli_free_result($lista); ?>
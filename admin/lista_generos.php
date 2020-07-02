<?php
include("../Connections/conn_games.php");
mysqli_select_db($conn_games,$database_conn);
$consulta = "SELECT * FROM tbgeneros ORDER BY rotulo_genero ASC";
$lista = $conn_games->query($consulta);
$row = $lista->fetch_assoc();
$totalRows = ($lista)->num_rows;
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Lista de Gêneros</title>
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

<body class="bg-genero">
   <?php include "menu_adm.php"; ?>
    <h1 class="breadcrumb barratxtgenero"><b class="container col-lg-8 offset-lg-2 btn-block">Lista de Gêneros</b></h1>
    <main class="container">

        <div class="table-responsive-sm col-lg-10 offset-lg-1">
            <table class="table corformgenero">
                <thead class="thead-dark">
                    <tr>
                        <th hidden>ID</th><!-- Cabeça da Coluna -->
                        <th>SIGLA</th>
                        <th>RÓTULO</th>
                        <th>
                            <a href="insere_generos.php" target="_self" class="btn btn-block btn-outline-success" role="button">
                                <span class="hidden-xs hidden-sm">ADICIONAR</span>
                                <i class="fa fa-plus-square" aria-hidden="true"></i>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php do { ?>
                    <tr>
                        <td hidden><?php echo $row['id_genero']; ?></td>
                        <td><?php echo $row['sigla_genero']; ?></td>
                        <td><?php echo $row['rotulo_genero']; ?></td>
                        <td>
                            <a href="atualiza_generos.php?id_genero=<?php echo $row['id_genero']; ?>" target="_self" class="btn btn-primary btn-block" role="button">
                                <span class="hidden-xs hidden-sm">ALTERAR</span>
                                <i class="fa fa-refresh" aria-hidden="true"></i>
                            </a>
                            <br>
                            
                            <button data-nome="<?php echo $row['rotulo_genero']; ?>" data-id="<?php echo $row['id_genero']; ?>" class="delete btn btn-danger btn-block">
                                 <span class="hidden-xs hidden-s">EXCLUIR</span>
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
                    <h4 class="modal-title text-danger">ATENÇÃO!</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Deseja Mesmo EXCLUIR o Gênero?
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
            var id = $(this).data('id');
            $('span.nome').text(nome);
            $('a.delete-yes').attr('href', 'exclui_generos.php?id_genero=' + id);
            $('#myModal').modal('show');
        });
    </script>

</body>

</html>
<?php mysqli_free_result($lista); ?>
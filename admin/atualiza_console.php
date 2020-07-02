<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_games.php");

// Variáveis Globais
$tabela         = "tbconsole";
$campo_filtro   = "id_console";

if($_POST){
    // Definindo o USE do banco de dados
    mysqli_select_db($conn_games,$database_conn);
    
    // Receber os dados do formulário
    $sigla_console     = $_POST['sigla_console'];
    $nome_console      = $_POST['nome_console'];
    
    // Campo para filtrar o registro (WHERE)
    $filtro_update  = $_POST['id_console'];
    
    // Consulta SQL para atualização dos dados
    $updateSQL  = "UPDATE ".$tabela."
                    SET sigla_console   = '".$sigla_console."',
                        nome_console    = '".$nome_console."'
                    WHERE ".$campo_filtro."='".$filtro_update."'";
    $resultado  = $conn_games->query($updateSQL);
    
    // Após a ação a página será redirecionada
    $destino    = "lista_console.php";
    if(mysqli_insert_id($conn_games)){
        header("Location: $destino");
    }else{
        header("Location: $destino");
    };     
}

// Consulta para trazer e filtrar os dados
// Definindo o USE do banco de dado
mysqli_select_db($conn_games,$database_conn);
$filtro_select  = $_GET['id_console'];
$consulta       =   "SELECT *
                    FROM ".$tabela."
                    WHERE ".$campo_filtro."=".$filtro_select."";
$lista          = $conn_games->query($consulta);
$row            = $lista->fetch_assoc();
$totalRows      = ($lista)->num_rows;
?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>Atualizar Consoles</title>
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
    <h2 class="breadcrumb barratxtconsole">
        <div class="container">
            <a href="lista_console.php">
                <button class="btn btn-success" type="button">
                    <i class="fa fa-arrow-left fa-lg" aria-hidden="true"></i>
                    Voltar
                </button> &nbsp;&nbsp;
            </a>
            Atualizar Console
        </div>
    </h2>
    <br>
    <main class="container corformconsole">
        <div>
            <div class="thumbnail">
                <div>
                   <br>
                    <form action="atualiza_console.php" name="form_atualiza_console" id="form_atualiza_console" method="post" enctype="multipart/form-data">
                        <!-- atualizar o campo id_console oculto para uso em filtro -->
                        <input type="hidden" id="id_console" name="id_console" value="<?php echo $row['id_console']; ?>">
                        <!-- input nome_console -->
                        <label for="nome_console">Plataforma</label>
                        <div class="input-group">
                            <input type="text" name="nome_console" id="nome_console" autofocus maxlength="50" placeholder="Digite o nome dos consoles." class="form-control" required value="<?php echo $row['nome_console']; ?>">
                        </div>
                        <br>
                        <!-- input sigla_console -->
                        <label for="sigla_console">Sigla</label>
                        <div class="input-group">
                            <input type="text" name="sigla_console" id="sigla_console" autofocus maxlength="50" placeholder="Digite a sigla dos consoles." class="form-control" required value="<?php echo $row['sigla_console']; ?>">
                        </div>
                        <br>
                        <!-- btn enviar -->
                        <input type="submit" value="Atualizar" role="button" name="enviar" id="enviar" class="btn btn-block btn-primary">
                        <br>
                    </form>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </main>
    <!-- Link arquivos Bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
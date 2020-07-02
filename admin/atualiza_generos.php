<?php 
include("../Connections/conn_games.php");

// Variaveis Globais
$tabela         = "tbgeneros";
$campo_filtro   = "id_genero";

if ($_POST){
    // Definindo o USE do Banco de Dados
    mysqli_select_db($conn_games,$database_conn);
    
    // Receber os Dados do Formulário
    $sigla_genero    = $_POST["sigla_genero"];
    $rotulo_genero   = $_POST["rotulo_genero"];
    
    // Campo para filtrar o registro (WHERE)
    $filtro_update = $_POST['id_genero'];
    
    // Consulta SQL para Inserção dos Dados
    $updateSQL  =   "UPDATE ".$tabela." 
                    SET sigla_genero = '".$sigla_genero."',
                        rotulo_genero = '".$rotulo_genero."'
                    WHERE ".$campo_filtro."='".$filtro_update."'";
    $resultado  = $conn_games->query($updateSQL);
    
    // Após a Ação a Página será Redirecionada
    $destino    = "lista_generos.php";
    if (mysqli_insert_id($conn_games)){
        header("Location: $destino");
    }else{
        header("Location: $destino");
    };
}

// Consulta para Trazer e Filtrar os Dados
// Definindo o USE do Banco de Dados
mysqli_select_db($conn_games,$database_conn);
$filtro_select  = $_GET['id_genero'];
$consulta       = "SELECT *
                  FROM ".$tabela."
                  WHERE ".$campo_filtro."=".$filtro_select."";
$lista          = $conn_games->query($consulta);
$row            = $lista->fetch_assoc();
$totalRows      = ($lista)->num_rows;
?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>Atualizar Gêneros</title>
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

<body class="bg-genero">
  <?php include "menu_adm.php"; ?>
   <h2 class="breadcrumb barratxtgenero">
        <div class="container">
            <a href="lista_generos.php">
                <button class="btn btn-outline-light" type="button">
                    <i class="fa fa-arrow-left fa-lg" aria-hidden="true"></i>
                    Voltar
                </button> &nbsp;&nbsp;
            </a>
            Atualizar Console
        </div>
    </h2>
    <main class="container corformgenero">
        <div>
                <div class="thumbnail">
                    <div>
                       <br>
                        <form action="atualiza_generos.php" name="form_atualiza_genero" id="form_atualiza_genero" method="post" enctype="multipart/form-data">
                            <!-- Inserir o Campo id_genero Oculto pra Uso em Filtro -->
                            <input type="hidden" name="id_genero" id="id_genero" value="<?php echo $row['id_genero']; ?>">
                            <!-- input rotulo_genero -->
                            <label for="rotulo_genero">Rótulo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <!--<span class=""></span>-->
                                </span>
                                <input type="text" name="rotulo_genero" id="rotulo_genero" autofocus maxlength="15" placeholder="Digite o Gênero do Game." class="form-control" required value="<?php echo $row['rotulo_genero']; ?>">
                            </div>
                            <br>
                            <!-- input sigla_genero -->
                            <label for="sigla_genero">Sigla:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                <!--<span class=""></span>-->
                                </span>
                                <input type="text" name="sigla_genero" id="sigla_genero" maxlength="3" placeholder="Digite a Sigla do Game." class="form-control" required value="<?php echo $row['sigla_genero']; ?>">
                            </div>
                            <br>
                            <!-- btn enviar -->
                            <input type="submit" value="Atualizar" role="button" name="enviar" id="enviar" class="btn btn-block btn btn-outline-light">
                            <br>
                        </form>
                    </div>
                </div>
            
        </div>
    </main>

    <!-- Bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<?php mysqli_free_result($lista); ?>
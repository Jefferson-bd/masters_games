<?php 
include("../Connections/conn_games.php");

if ($_POST){
    // Definindo o USE do Banco de Dados
    mysqli_select_db($conn_games,$database_conn);
    
    // Variéveis para Acrescentar Dados ao Banco
    $tabela_insert  = "tbgeneros";
    $campos_insert  = "sigla_genero, rotulo_genero";
    
    // Receber os Dados do Formulário
    // Organize os ampos na mesma ordem
    $sigla_genero    = $_POST["sigla_genero"];
    $rotulo_genero   = $_POST["rotulo_genero"];
    
    // Reunir os Valores a Serem Inseridos
    $valores_insert = "'$sigla_genero','$rotulo_genero'";
    
    // Consulta SQL para Inserção dos Dados
    $insertSQL  =   "INSERT INTO ".$tabela_insert." 
                        (".$campos_insert.")
                    VALUES
                    (".$valores_insert.")";
    $resultado  = $conn_games->query($insertSQL);
    
    // Após a Ação a Página será Redirecionada
    $destino    = "lista_generos.php";
    if (mysqli_insert_id($conn_games)){
        header("Location: $destino");
    }else{
        header("Location: $destino");
    };
}
?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>Inserir Gêneros</title>
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
            Inserir Gêneros
        </div>
    </h2>
    <main class="container corformgenero">
        <div>
            <div class="thumbnail">
                <div>
                   <br>
                    <form action="insere_generos.php" name="form_insere_genero" id="form_insere_genero" method="post" enctype="multipart/form-data">
                        <!-- input rotulo_genero -->
                        <label for="rotulo_genero">Rótulo:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <!--<span class=""></span>-->
                            </span>
                            <input type="text" name="rotulo_genero" id="rotulo_genero" autofocus maxlength="15" placeholder="Digite o Gênero do Game." class="form-control" required>
                        </div>
                        <br>
                        <!-- input sigla_genero -->
                        <label for="sigla_genero">Sigla:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <!--<span class=""></span>-->
                            </span>
                            <input type="text" name="sigla_genero" id="sigla_genero" maxlength="3" placeholder="Digite a Sigla do Game." class="form-control" required>
                        </div>
                        <br>
                        <!-- btn enviar -->
                        <input type="submit" value="Cadastrar" role="button" name="enviar" id="enviar" class="btn btn-block btn-outline-light">
                        <br>
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
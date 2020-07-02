<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_games.php");

if($_POST){
    // Definindo o USE do banco de dados
    mysqli_select_db($conn_games,$database_conn);
    
    // Variáveis para acrescentar dados ao banco
    $tabela_insert  = "tbconsole";
    $campos_insert  = "sigla_console, nome_console";
    
    // Receber os dados do formulário
    // Organize os campos na mesma ordem
    $sigla_console = $_POST['sigla_console'];
    $nome_console = $_POST['nome_console'];
    
    // Reunir os valores a serem inseridos
    $valores_insert = "'$sigla_console','$nome_console'";
    
    // Consulta SQL para inserção dos dados
    $insertSQL  =   "INSERT INTO ".$tabela_insert."  
                        (".$campos_insert.")
                    VALUES 
                        (".$valores_insert.")";
    $resultado  = $conn_games->query($insertSQL);
    
    // Após a ação a página será redirecionada
    $destino    = "lista_console.php";
    if(mysqli_insert_id($conn_games)){
        header("Location: $destino");
    }else{
        header("Location: $destino");
    };     
}
?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>Inserindo Consoles</title>
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
            Inserir Consoles
        </div>
    </h2>
    <main class="container corformconsole">
        <div>
            <div class="thumbnail">
                <div>
                   <br>
                    <form action="insere_console.php" name="form_insere_console" id="form_insere_console" method="post" enctype="multipart/form-data">
                        <!-- input rotulo_tipo -->
                        <label for="nome_console">Plataforma</label>
                        <div class="input-group">
                            <input type="text" name="nome_console" id="nome_console" autofocus maxlength="50" placeholder="Digite o nome dos consoles." class="form-control" required>
                        </div>
                        <br>
                        <!-- input sigla_tipo -->
                        <label for="sigla_console">Sigla</label>
                        <div class="input-group">
                            <input type="text" name="sigla_console" id="sigla_console" maxlength="3" placeholder="Digite a sigla do Console" class="form-control" required>
                        </div>
                        <br>
                        <!-- btn enviar -->
                        <input type="submit" value="Cadastrar" role="button" name="enviar" id="enviar" class="btn btn-block btn-success">
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
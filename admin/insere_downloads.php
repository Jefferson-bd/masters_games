<?php 
include("../Connections/conn_games.php");

if ($_POST){
    // Definindo o USE do Banco de Dados
    mysqli_select_db($conn_games,$database_conn);
    
    // Variéveis para Acrescentar Dados ao Banco
    $tabela_insert  = "tbdownload";
    $campos_insert  = "nome_download, plataforma_download, imagem_download, arquivo_download";
    
    // Receber os Dados do Formulário
    // Organize os ampos na mesma ordem
    $nome_download         = $_POST["nome_download"];
    $plataforma_download   = $_POST["plataforma_download"];
    $imagem_download       = $_FILES["imagem_download"]['name'];
    $arquivo_download      = $_FILES["arquivo_download"]['name'];
    
    // Reunir os Valores a Serem Inseridos
    $valores_insert = "'$nome_download','$plataforma_download','$imagem_download','$arquivo_download'";
    
    // Consulta SQL para Inserção dos Dados
    $insertSQL  =   "INSERT INTO ".$tabela_insert." 
                        (".$campos_insert.")
                    VALUES
                    (".$valores_insert.")";
    $resultado  = $conn_games->query($insertSQL);
    
    // Após a Ação a Página será Redirecionada
    $destino    = "lista_downloads.php";
    if (mysqli_insert_id($conn_games)){
        header("Location: $destino");
    }else{
        header("Location: $destino");
    };
    
    // Para Guardar o nome da Imagem do Banco e o Arquivo no Diretorio
    if (isset($_POST['enviar'])){
        $nome_img   = $_FILES['imagem_download']['name'];
        $tmp_img    = $_FILES['imagem_download']['tmp_name'];
        $dir_img    = "../imagens/".$nome_img;
        move_uploaded_file($tmp_img,$dir_img);
        $nome_arq   = $_FILES['arquivo_download']['name'];
        $tmp_arq    = $_FILES['arquivo_download']['tmp_name'];
        $dir_arq    = "../games_download/".$nome_arq;
        move_uploaded_file($tmp_arq,$dir_arq);
    }
}
?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>Inserir Downloads</title>
    <meta charset="utf-8">
    <!-- Bootstrap css -->
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
    <h2 class="breadcrumb barratxtdownload">
        <div class="container">
            <a href="lista_downloads.php">
                <button class="btn btn-danger" type="button">
                    <i class="fa fa-arrow-left fa-lg" aria-hidden="true"></i>
                    Voltar
                </button> &nbsp;&nbsp;
            </a>
            Inserir Downloads
        </div>
    </h2>
    <main class="container corformdownload">
        <div>
            <div class="thumbnail">
                <div role="alert">
                   <br>
                    <form name="form_download_insere" id="form_insere_download" action="insere_downloads.php" method="post" enctype="multipart/form-data">
                        <!-- input nome_download -->
                        <label for="nome_download">Nome:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <!--<span class=""></span>-->
                            </span>
                            <input type="text" name="nome_download" id="nome_download" maxlength="50" placeholder="Digite o Nome do Jogo." class="form-control" required autofocus>
                        </div>
                        <br>
                        <!-- input plataforma_download -->
                        <label for="plataforma_download">Plataforma:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <!--<span class=""></span>-->
                            </span>
                            <input type="text" name="plataforma_download" id="plataforma_download" maxlength="30" placeholder="Digite a Plataforma do Jogo." class="form-control" required autocomplete="off">
                        </div>
                        <br>
                        <!-- file imagem_download -->
                        <label for="imagem_download">Imagem:</label>
                        <img width="300px;" src="" alt="" name="imagem" id="imagem" style="max-width:150px;">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <!--<span class=""></span>-->
                            </span>
                            <input class="form-control" type="file" name="imagem_download" id="imagem_download" onchange="vizualizarImagem.call(this)">
                        </div>
                        <br>
                        <!-- file arquivo_download -->
                        <label for="arquivo_download">Arquivo:</label>
                        <div class="input-group">
                            <input class="form-control" type="file" name="arquivo_download" id="arquivo_download">
                        </div>
                        <br>
                        <!-- btn enviar -->
                        <input class="btn btn-danger btn-block" role="button" type="submit" value="Cadastrar" name="enviar" id="enviar">
                        <br>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </main>
    <script>
        function vizualizarImagem() {
            if (this.files && this.files[0]) {
                var obj = new FileReader();
                obj.onload = function(data) {
                    var imagem =
                        document.getElementById("imagem");
                    imagem.src = data.target.result;
                    imagem.style.display = "block";
                }
                obj.readAsDataURL(this.files[0]);
            }
        }
    </script>

    <!-- Bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
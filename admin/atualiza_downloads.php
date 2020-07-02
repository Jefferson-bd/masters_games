<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_games.php");

// variáveis globais
$tabela         = "tbdownload";
$campo_filtro   = "id_download";

if($_POST){
    // definindo o USE do banco de dados
    mysqli_select_db($conn_games,$database_conn);
    
    // Para Guardar o nome da Imagem do Banco e o Arquivo no Diretorio
    if ($_FILES['imagem_download']['name']){
        $nome_img   = $_FILES['imagem_download']['name'];
        $tmp_img    = $_FILES['imagem_download']['tmp_name'];
        $dir_img    = "../imagens/".$nome_img;
        move_uploaded_file($tmp_img,$dir_img);
    }else{
        $nome_img=$_POST['imagem_download_atual'];
    }
    if ($_FILES['arquivo_download']['name']){
        $nome_arq   = $_FILES['arquivo_download']['name'];
        $tmp_arq    = $_FILES['arquivo_download']['tmp_name'];
        $dir_arq    = "../games_download/".$nome_arq;
        move_uploaded_file($tmp_arq,$dir_arq);
    }else{
        $nome_arq=$_POST['arquivo_download_atual'];
    }
    
    // Receber os Dados do Formulário
    // Organize os ampos na mesma ordem
    $nome_download    = $_POST['nome_download'];
    $plataforma_download   = $_POST['plataforma_download'];
    $imagem_download  = $nome_img;
    $arquivo_download = $nome_arq;
    
    // campo para filtrar o registro (WHERE)
    $filtro_update  = $_POST['id_download'];

    // Consulta SQL para atualização dos dados
     $updateSQL  = "UPDATE ".$tabela."
                    SET nome_download         =  '".$nome_download."',
                        plataforma_download   =  '".$plataforma_download."',
                        imagem_download        =  '".$imagem_download."',
                        arquivo_download      =  '".$arquivo_download."'
                    WHERE ".$campo_filtro."='".$filtro_update."'";
    $resultado  = $conn_games->query($updateSQL);

     // Após a ação a página será redirecionada
     $destino    = "lista_downloads.php";
     if(mysqli_insert_id($conn_games)){
         header("Location: $destino");
     }else{
        header("Location: $destino");
     };
}

// consulta para trazer e filtrar os dados
// definindo o USE do banco de dados
// mysqli_select_db($conn_games, $database_conn);
$filtro_select  = $_GET['id_download'];
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
    <title>Atualizar Downloads</title>
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
   <h2 class="breadcrumb barratxtdownload">
        <div class="container">
            <a href="lista_downloads.php">
                <button class="btn btn-danger" type="button">
                    <i class="fa fa-arrow-left fa-lg" aria-hidden="true"></i>
                    Voltar
                </button> &nbsp;&nbsp;
            </a>
            Atualizar Downloads
        </div>
    </h2>
    <main class="container corformdownload">
        <div>
                <div class="thumbnail">
                    <div>
                       <br>
                        <form name="form_atualiza_download" id="form_atualiza_download" action="atualiza_downloads.php" method="post" enctype="multipart/form-data">
                            <!-- Inserir o campo id_usuario oculto pra uso em filtro -->
                            <input type="hidden" id="id_download" name="id_download" value="<?php echo $row['id_download']?>">
                            <!-- input nome_download-->
                            <label for="nome_download">Nome:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <!--<span class=""></span>-->
                                </span>
                                <input type="text" name="nome_download" id="nome_download" autofocus maxlength="50" placeholder="Digite o nome do Jogo." class="form-control" required value="<?php echo $row['nome_download']; ?>">
                            </div>
                            <br>
                            <!-- input plataforma_download -->
                            <label for="plataforma_download">Plataforma:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <!--<span class=""></span>-->
                                </span>
                                <input type="text" name="plataforma_download" id="plataforma_download" autofocus maxlength="15" placeholder="Digite a Plataforma do Jogo." class="form-control" required value="<?php echo $row['plataforma_download']; ?>">
                            </div>
                            <br>
                            <!-- file imagem_download Atual -->
                            <label for="">Imagem Atual:</label>&nbsp;&nbsp;&nbsp; <br>
                            <img src="../imagens/<?php echo $row['imagem_download']; ?>" alt="" class="img-responsive" style="max-width:150px;">
                            <!-- type="hidden" campo oculto para guardar dados -->
                            <!-- Guardamos o nome da Imagem caso não seja alterada -->
                            <input type="hidden" name="imagem_download_atual" id="imagem_download_atual" value="<?php echo $row['imagem_download']; ?>">
                            <br>
                            <br>
                            <!-- file imagem_download Nova -->
                            <label for="imagem_download">Nova Imagem:</label>
                            <img class="img-responsive" src="" alt="" name="imagem" id="imagem" style="max-width:150px;">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <!--<span class=""></span>-->
                                </span>
                                <input class="form-control" type="file" name="imagem_download" id="imagem_download" onchange="vizualizarImagem.call(this)">
                            </div>
                            <br>
                            <!-- file arquivo_download Atual -->
                            <label for="">Arquivo Atual:</label>
                            <!-- type="hidden" campo oculto para guardar dados -->
                            <!-- Guardamos o nome da Imagem caso não seja alterada -->
                            <input class="form-control disabled" readonly name="arquivo_download_atual" id="arquivo_download_atual" value="<?php echo $row['arquivo_download']; ?>">
                            <br>
                            <!-- file arquivo_download Nova -->
                            <label for="arquivo_download">Novo Arquivo:</label>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <!--<span class=""></span>-->
                                </span>
                                <input class="form-control" type="file" name="arquivo_download" id="arquivo_download">
                            </div>
                            <br>
                            <!-- btn enviar -->
                            <input class="btn btn-danger btn-block" role="button" type="submit" value="Atualizar" name="enviar" id="enviar">
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
<?php mysqli_free_result($lista); ?>
<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_games.php");

// variáveis globais
$tabela         = "tbusuarios";
$campo_filtro   = "id_usuario";

if($_POST){
    // definindo o USE do banco de dados
    mysqli_select_db($conn_games,$database_conn);
    
    // Para Guardar o nome da Imagem do Banco e o Arquivo no Diretorio
    if ($_FILES['imagem_usuario']['name']){
        $nome_img   = $_FILES['imagem_usuario']['name'];
        $tmp_img    = $_FILES['imagem_usuario']['tmp_name'];
        $dir_img    = "../imagens/".$nome_img;
        move_uploaded_file($tmp_img,$dir_img);
    }else{
        $nome_img=$_POST['imagem_usuario_atual'];
    }
    
    // Receber os Dados do Formulário
    // Organize os ampos na mesma ordem
    $nome_usuario    = $_POST['nome_usuario'];
    $login_usuario   = $_POST['login_usuario'];
    $senha_usuario   = $_POST['senha_usuario'];
    $nivel_usuario   = $_POST['nivel_usuario'];
    $imagem_usuario  = $nome_img;
    
    // campo para filtrar o registro (WHERE)
    $filtro_update  = $_POST['id_usuario'];

    // Consulta SQL para atualização dos dados
     $updateSQL  = "UPDATE ".$tabela."
                    SET nome_usuario    =   '".$nome_usuario."',
                        login_usuario   =   '".$login_usuario."',
                        senha_usuario   =   '".$senha_usuario."',
                        nivel_usuario   =   '".$nivel_usuario."',
                        imagem_usuario  =   '".$imagem_usuario."'
                    WHERE ".$campo_filtro."='".$filtro_update."'";
    $resultado  = $conn_games->query($updateSQL);

     // Após a ação a página será redirecionada
     $destino    = "lista_usuarios.php";
     if(mysqli_insert_id($conn_games)){
         header("Location: $destino");
     }else{
        header("Location: $destino");
     };
}

// consulta para trazer e filtrar os dados
// definindo o USE do banco de dados
// mysqli_select_db($conn_games, $database_conn);
$filtro_select  = $_GET['id_usuario'];
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
    <title>Atualizar Usuários</title>
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

<body class="bg-usuario">
   <?php include "menu_adm.php"; ?>
    <h2 class="breadcrumb barratxtuser">
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
    <main class="container corformuser">
        <div>
            <div class="thumbnail">
                <div>
                   <br>
                    <form action="atualiza_usuarios.php" name="form_atualiza_usuario" id="form_atualiza_usuario" method="post" enctype="multipart/form-data">
                        <!-- Inserir o campo id_usuario oculto pra uso em filtro -->
                        <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $row['id_usuario']?>">
                        <!-- input nome_usuario-->
                        <label for="nome_usuario">Nome:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <!--<span class=""></span>-->
                            </span>
                            <input type="text" name="nome_usuario" id="nome_usuario" autofocus maxlength="50" placeholder="Digite o nome." class="form-control" required value="<?php echo $row['nome_usuario']; ?>">
                        </div>
                        <br>
                        <!-- input login_usuario-->
                        <label for="login_usuario">Login:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <!--<span class=""></span>-->
                            </span>
                            <input type="text" name="login_usuario" id="login_usuario" autofocus maxlength="15" placeholder="Digite o login." class="form-control" required value="<?php echo $row['login_usuario']; ?>">
                        </div>
                        <br>
                        <!-- input senha_usuario -->
                        <label for="senha_usuario">Senha:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <!--<span class=""></span>-->
                            </span>
                            <input type="password" name="senha_usuario" id="senha_usuario" maxlenght="15" placeholder="Digite a senha." class="form-control" required value="<?php echo $row['senha_usuario']; ?>">
                        </div>
                        <br>
                        <!-- Radio nivel_usuario -->
                        <label for="nivel_usuario">Nível:</label>
                        <div class="input-group">
                            <label class="radio-inline" for="nivel_usuario_c">
                                <input type="radio" name="nivel_usuario" id="nivel_usuario" value="com" <?php echo $row['nivel_usuario']=="com" ? "checked" : null; ?>>Comum
                            </label>
                            <label class="radio-inline" for="nivel_usuario_s">
                                <input type="radio" name="nivel_usuario" id="nivel_usuario" value="sup" <?php echo $row['nivel_usuario']=="sup" ? "checked" : null; ?>>Supervisor
                            </label>
                        </div>
                        <br>
                        <!-- file imagem_usuario Atual -->
                        <label for="">Imagem Atual:</label>&nbsp;&nbsp;&nbsp; <br>
                        <img src="../imagens/<?php echo $row['imagem_usuario']; ?>" alt="" class="img-responsive" style="max-width:150px;">
                        <!-- type="hidden" campo oculto para guardar dados -->
                        <!-- Guardamos o nome da Imagem caso não seja alterada -->
                        <input type="hidden" name="imagem_usuario_atual" id="imagem_usuario_atual" value="<?php echo $row['imagem_usuario']; ?>">
                        <br>
                        <!-- file imagem_usuario Nova -->
                        <label for="imagem_usuario">Nova Imagem:</label>
                        <br>
                        <img class="img-responsive" src="" alt="" name="imagem" id="imagem" style="max-width:150px;">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <!--<span class=""></span>-->
                            </span>
                            <input class="form-control" type="file" name="imagem_usuario" id="imagem_usuario" onchange="vizualizarImagem.call(this)">
                        </div>
                        <br>
                        <!-- btn enviar -->
                        <input type="submit" value="Atualizar" role="button" name="enviar" id="enviar" class="btn btn-block btn-outline-light">
                        <br>
                    </form>
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

<?php 
include("../Connections/conn_games.php");

if ($_POST){
    // Definindo o USE do Banco de Dados
    mysqli_select_db($conn_games,$database_conn);
    
    // Variéveis para Acrescentar Dados ao Banco
    $tabela_insert  = "tbusuarios";
    $campos_insert  = "nome_usuario, login_usuario, senha_usuario, nivel_usuario, imagem_usuario";
    
    // Receber os Dados do Formulário
    // Organize os ampos na mesma ordem
    $nome_usuario    = $_POST["nome_usuario"];
    $login_usuario   = $_POST["login_usuario"];
    $senha_usuario   = $_POST["senha_usuario"];
    $nivel_usuario   = $_POST["nivel_usuario"];
    $imagem_usuario  = $_FILES["imagem_usuario"]['name'];
    
    // Reunir os Valores a Serem Inseridos
    $valores_insert = "'$nome_usuario','$login_usuario','$senha_usuario','$nivel_usuario','$imagem_usuario'";
    
    // Consulta SQL para Inserção dos Dados
    $insertSQL  =   "INSERT INTO ".$tabela_insert." 
                        (".$campos_insert.")
                    VALUES
                    (".$valores_insert.")";
    $resultado  = $conn_games->query($insertSQL);
    
    // Após a Ação a Página será Redirecionada
    $destino    = "lista_usuarios.php";
    if (mysqli_insert_id($conn_games)){
        header("Location: $destino");
    }else{
        header("Location: $destino");
    };
    
    // Para Guardar o nome da Imagem do Banco e o Arquivo no Diretorio
    if (isset($_POST['enviar'])){
        $nome_img   = $_FILES['imagem_usuario']['name'];
        $tmp_img    = $_FILES['imagem_usuario']['tmp_name'];
        $dir_img    = "../imagens/".$nome_img;
        move_uploaded_file($tmp_img,$dir_img);
}
}
?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>Inserir Usuários</title>
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

<body class="bg-usuario">
  <?php include "menu_adm.php"; ?>
   <h2 class="breadcrumb barratxtuser">
        <div class="container">
            <a href="lista_usuarios.php">
                <button class="btn btn-outline-light" type="button">
                    <i class="fa fa-arrow-left fa-lg" aria-hidden="true"></i>
                    Voltar
                </button> &nbsp;&nbsp;
            </a>
            Inserir Usuarios
        </div>
    </h2>
    <main class="container corformuser">
        <div>
            <div>
                <div class="thumbnail">
                    <div>
                       <br>
                        <form name="form_insere_usuario" id="form_insere_usuario" action="insere_usuarios.php" method="post" enctype="multipart/form-data">
                            <!-- input nome_usuario -->
                            <label for="nome_usuario">Nome:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <!--<span class=""></span>-->
                                </span>
                                <input type="text" name="nome_usuario" id="nome_usuario" maxlength="50" placeholder="Digite o seu Nome." class="form-control" required autofocus>
                            </div>
                            <br>
                            <!-- input login_usuario -->
                            <label for="login_usuario">Usuário:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <!--<span class=""></span>-->
                                </span>
                                <input type="text" name="login_usuario" id="login_usuario" maxlength="30" placeholder="Digite o seu Login." class="form-control" required autocomplete="off">
                            </div>
                            <br>
                            <!-- password senha_usuario -->
                            <label for="senha_usuario">Senha:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <!--<span class=""></span>-->
                                </span>
                                <input class="form-control" type="password" name="senha_usuario" id="senha_usuario" placeholder="Digite a Senha Desejada." maxlength="8" required autocomplete="off">
                            </div>
                            <br>
                            <!-- Radio nivel_usuario -->
                            <label for="nivel_usuario">Nível do Usuário?</label>
                            <div class="input-group">
                                <label class="radio-inline" for="nivel_usuario_c">
                                    <input type="radio" name="nivel_usuario" id="nivel_usuario" value="com" checked>Comum &nbsp;
                                </label>
                                <label class="radio-inline" for="nivel_usuario_s">
                                    <input type="radio" name="nivel_usuario" id="nivel_usuario" value="sup">Supervisor
                                </label>
                            </div>
                            <br>
                            <!-- file imagem_usuario -->
                            <label for="imagem_usuario">Imagem:</label>
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
                            <input class="btn btn-outline-light btn-block" role="button" type="submit" value="Cadastrar" name="enviar" id="enviar">
                            <br>
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
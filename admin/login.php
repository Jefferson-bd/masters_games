<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_games.php");
// Inicia a verificação do login
if($_POST){
    // Definindo o USE do banco de dados
    mysqli_select_db($conn_games,$database_conn);
    // Verificar o Login e senha recebidos
    $login_usuario      =   $_POST['login_usuario'];
    $senha_usuario      =   $_POST['senha_usuario'];
    
    $vereficaSQL        =   "SELECT *
                            FROM tbusuarios
                            WHERE login_usuario   = '$login_usuario'
                            AND   senha_usuario   = '$senha_usuario'"; 
    // Carregar os dados e verificar as linhas
    $lista_session      =   mysqli_query($conn_games, $vereficaSQL);
    $row_session        =   $lista_session->fetch_assoc();
    $totalRows_session  =   mysqli_num_rows($lista_session);
    
    // se a sessão não existir, inicia uma
    if(!isset($_SESSION)) session_start();
    // Carregar informações em uma sessão
    if($totalRows_session>0){
        $_SESSION['login_usuario']=$login_usuario;
        $_SESSION['nivel_usuario']=$row_session['nivel_usuario'];
        echo "<script>window.open('index.php','_self')</script>";
    }else{
        echo "<script>window.open('invasor.php','_self')</script>";
    }
}
?>

<!doctype html>

<html lang="pt-br">

<head>
    
    <title>Login</title>

    <meta charset="utf-8">

    <!-- Link arquivos Bootstrap css -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/meu_estilo_adm.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/72e7ff902d.js" crossorigin="anonymous"></script>

</head>

<body class="bg-login">
    <main class="container">
        <section>
            <article>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 offset-md-3 col-lg-4 offset-lg-4 corformdownload">
                        <h1 class="breadcrumb barratxtdownload text-center">Faça seu login</h1>
                        <div class="thumbnail">
                            <p class="text-white text-center" role="alert">
                                <i class="fas fa-users fa-10x"></i>
                            </p>
                            <br>
                            <div class="alert barratxtdownload" role="alert">
                               <form action="login.php" name="form_login" id="form_login" method="post" enctype="multipart/form-data">
                                   <label for="login_usuario">Login:</label>
                                   <p class="input-group">
                                       <span class="input-group-addon">
                                           <span class="glyphicon glyphicon-user text-info" aria-hidden="true"></span>
                                       </span>
                                       <input type="text" name="login_usuario" id="login_usuario" class="form-control" autofocus required placeholder="Digite seu login">
                                   </p>
                                   
                                   <label for="senha_usuario">Senha:</label>
                                   <p class="input-group">
                                       <span class="input-group-addon">
                                           <span class="glyphicon glyphicon-qrcode text-info" aria-hidden="true"></span>
                                       </span>
                                       <input type="password" name="senha_usuario" id="senha_usuario" class="form-control" autofocus required placeholder="Digite sua senha">
                                   </p>
                                   <p class="text-right">
                                       <input type="submit" value="Entrar" class="btn btn-danger">
                                   </p>
                               </form>
                            </div>
                         </div>
                    </div>
            </article>
        </section>
    </main>
    <!-- Link arquivos Bootstrap js -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="../bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
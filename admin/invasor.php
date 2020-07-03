<!doctype html>

<html lang="pt-br">

<head>

    <meta http-equiv="refresh" content="15;URL=../index.php">

    <title>Sem Permissão</title>

    <meta charset="utf-8">

    <!-- Link arquivos Bootstrap css -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/meu_estilo_adm.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/72e7ff902d.js" crossorigin="anonymous"></script>

</head>

<body class="bg-inv">
    <main class="container">
        <section>
            <article>
                <div>
                    <div>
                        <h1 class="breadcrumb barratxtconsole text-center">Atenção!</h1>
                        <div class="thumbnail text-center corforminvasor">
                          <img src="../imagens/bg-invasor2.png" alt="" class="img-fluid" width="800px">
                            <div class="corforminvasor2" role="alert">
                               <br>
                                <h4>
                                    <i class="fas fa-spinner fa-pulse fa-lg"></i>
                                    Usuário e/ou Senha Inválido
                                </h4>
                                <p class="text-danger">
                                    <a href="login.php" class="btn btn-outline-danger">
                                        <i class="fas fa-external-link-alt fa-rotate-270 fa-3x"></i>
                                        <br>
                                        <br>
                                        Tentar <br> Novamente
                                    </a>
                                    <a href="../index.php" class="btn btn-outline-success">
                                        <i class="fas fa-home fa-3x"></i>
                                        <br>
                                        <br>
                                        Voltar <br> Área  Pública
                                    </a>
                                </p>
                                <p>
                                   <small>
                                    <br>
                                    Caso não faça uma escolha em 15 segundos, será redirecionado para a página inicial.</small>
                                </p>
                                <br>
                            </div>
                       </div>
                    </div>
            </article>
        </section>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="../bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
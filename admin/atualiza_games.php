<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_games.php");

// Variáveis Globais
$tabela         = "tbgames";
$campo_filtro   = "id_game";

if($_POST){ // ATUALIZANDO NO BANCO DE DADOS
    // Definindo o USE do banco de dados
    mysqli_select_db($conn_games,$database_conn);

    // Para guardo nome da imagem no banco e o arquivo no diretório
    if ($_FILES['imagem_game']['name']){
        $nome_img   = $_FILES['imagem_game']['name'];
        $tmp_img    = $_FILES['imagem_game_atual']['tmp_name'];
        $dir_img    = "../imagens/".$nome_img;
        move_uploaded_file($tmp_img,$dir_img);
    }else{
        $nome_img=$_POST['imagem_game_atual'];
    }
    
    // Receber os dados do formulário
    // Organize os campos na mesma ordem
    $nome_game              = $_POST['nome_game'];
    $id_genero_game         = $_POST['id_genero_game'];
    $id_console_game        = $_POST['id_console_game'];
    $descri_game            = $_POST['descri_game'];
    $lancamento_game        = $_POST['lancamento_game'];
    $tamanho_game           = $_POST['tamanho_game'];
    $data_lancamento_game   = $_POST['data_lancamento_game'];
    $valor_game             = $_POST['valor_game'];
    $imagem_game            = $nome_img;
    $trailer_game           = $_POST['trailer_game'];
    
    // Campo para filtrar o registro (WHERE)
    $filtro_update          = $_POST['id_game'];
        
    // Consulta SQL para atualização dos dados
    $updateSQL  = "UPDATE ".$tabela."
                    SET     nome_game              = '".$nome_game."', 
                            id_genero_game         = '".$id_genero_game."', 
                            id_console_game        = '".$id_console_game."', 
                            descri_game            = '".$descri_game."', 
                            lancamento_game        = '".$lancamento_game."', 
                            tamanho_game           = '".$tamanho_game."', 
                            data_lancamento_game   = '".$data_lancamento_game."', 
                            valor_game             = '".$valor_game."', 
                            imagem_game            = '".$imagem_game."', 
                            trailer_game           = '".$trailer_game."'
                    WHERE ".$campo_filtro."='".$filtro_update."'";
    $resultado  = $conn_games->query($updateSQL);
    
    // Após a ação a página será redirecionada
    $destino    = "lista_games.php";
    if(mysqli_insert_id($conn_games)){
        header("Location: $destino");
    }else{
        header("Location: $destino");
    };   
}

// Consulta pra trazer e filtrar os dados
// Definindo o USE do banco de dados
mysqli_select_db($conn_games,$database_conn);
$filtro_select  = $_GET['id_game'];
$consulta       =   "SELECT *
                    FROM ".$tabela."
                    WHERE ".$campo_filtro."=".$filtro_select."";
$lista          = $conn_games->query($consulta);
$row            = $lista->fetch_assoc();
$totalRows      = ($lista)->num_rows;   
    
// Definindo o USE do banco de dados
mysqli_select_db($conn_games,$database_conn);
// Selecionar os dados da chave estrangeira
$tabela_fk    = "tbgeneros";
$ordenar_por  = "rotulo_genero";
$consulta_fk  = "SELECT * 
                FROM ".$tabela_fk." 
                ORDER BY ".$ordenar_por." ASC";
$lista_fk     = $conn_games->query($consulta_fk);
$row_fk       = $lista_fk->fetch_assoc();
$totalRows_fk = ($lista_fk)->num_rows;

// Definindo o USE do banco de dados
mysqli_select_db($conn_games,$database_conn);
// Selecionar os dados da chave estrangeira
$tabela_fk_c    = "tbconsole";
$ordenar_por_c  = "nome_console";
$consulta_fk_c  = "SELECT * 
                FROM ".$tabela_fk_c." 
                ORDER BY ".$ordenar_por_c." ASC";
$lista_fk_c     = $conn_games->query($consulta_fk_c);
$row_fk_c       = $lista_fk_c->fetch_assoc();
$totalRows_fk_c = ($lista_fk_c)->num_rows;
?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>Atualizar Jogos</title>
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

<body class="bg-game">
  <?php include "menu_adm.php"; ?>
   <h2 class="breadcrumb barratxt">
               <div class="container">
                <a href="lista_games.php">
                    <button class="btn btn-primary" type="button">
                       <i class="fa fa-arrow-left fa-lg" aria-hidden="true"></i>
                        Voltar
                    </button> &nbsp;&nbsp;
                </a>
                Atualizar Jogos
                </div>
            </h2>
            <br>
    <main class="container corform">
           <div>
                <div class="thumbnail">
                    <div class="alert alert-default" role="alert">
                       <br>
                        <form name="form_games_atualiza" id="form_games_atualiza" action="atualiza_games.php" method="post" enctype="multipart/form-data">
                            <!-- Inserir o campo id_produto oculto pra uso em filtro -->
                            <input type="hidden" name="id_game" id="id_game" value="<?php echo $row['id_game']; ?>">
                            
                                                        <!-- text jogo -->
                            <label for="nome_game">Jogo</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="nome_game" id="nome_game" placeholder="Digite o nome do jogo." maxlength="100" required value="<?php echo $row['nome_game']; ?>">
                            </div>
                            <!-- fecha text jogo -->
                            
                            <br>
                            
                            <!-- Select id_genero_game -->
                            <label for="id_genero_game">Gênero</label>
                            <div class="input-group">
                                <!-- select>option*2 -->
                                <select class="form-control" name="id_genero_game" id="id_genero_game" required>
                                   
                                    <!-- Abre a estrutura de repetição -->
                                    <?php do { ?>
                                        <option value="<?php echo $row_fk['id_genero']; ?>" <?php if(!(strcmp($row_fk['id_genero'],$row['id_genero_game']))){echo "selected=\"selected\"";} ?>>
                                            <?php echo $row_fk['rotulo_genero']; ?>
                                        </option>
                                        <?php } while ($row_fk = $lista_fk->fetch_assoc()); 
                                           $row_fk = mysqli_num_rows($lista_fk);
                                           if(rows_fk > 0){
                                               mysqli_data_seek($lista_fk,0);
                                               $row_fk = $lista_fk->fetch_assoc();
                                        }
                                    ?>
                                    <!-- Fecha a estrutura de repetição -->
                                    
                                </select>
                            </div>
                            <br>
                            <label for="id_console_game">Console</label>
                            <div class="input-group">
                                <!-- select>option*2 -->
                                <select class="form-control" name="id_console_game" id="id_console_game" required>
                                   
                                    <!-- Abre a estrutura de repetição -->
                                    <?php do { ?>
                                        <option value="<?php echo $row_fk_c['id_console']; ?>" <?php if(!(strcmp($row_fk_c['id_console'],$row['id_console_game']))){echo "selected=\"selected\"";} ?>>
                                            <?php echo $row_fk_c['nome_console']; ?>
                                        </option>
                                        <?php } while ($row_fk_c = $lista_fk_c->fetch_assoc()); 
                                           $row_fk_c = mysqli_num_rows($lista_fk_c);
                                           if(rows_fk_c > 0){
                                               mysqli_data_seek($lista_fk_c,0);
                                               $row_fk_c = $lista_fk_c->fetch_assoc();
                                        }
                                    ?>
                                    <!-- Fecha a estrutura de repetição -->
                                    
                                </select>
                            </div>
                            
                            <br>
                           
                            <!-- textarea resumo_game-->
                            <label for="resumo_produto">Descrição do Jogo</label>
                            <div class="input-group">
                                <textarea class="form-control" name="descri_game" id="descri_game" cols="30" rows="8" placeholder="Digite os detalhes do jogo.">
                                    <?php echo $row['descri_game']; ?>             
                                </textarea>  
                            </div>
                            <!-- textarea resumo_game -->
                            
                            <br>
                            <!-- Radio lançamento Games  -->
                            <label for="lancamento_game">Lançamento?</label>
                            <div class="input-group">
                                <label class="radio-inline" for="lancamento_game_s">
                                    <input type="radio" name="lancamento_game" id="destaque_produto" value="Sim" <?php echo $row['lancamento_game']=="Sim" ? "checked" : null; ?>>Sim
                                </label>
                                &nbsp;&nbsp;&nbsp;
                                <label class="radio-inline" for="lancamento_game_n">
                                    <input type="radio" name="lancamento_game" id="lancamento_game" value="Não" <?php echo $row['lancamento_game']=="Não" ? "checked" : null; ?>>Não
                                </label>
                            </div>
                            <!-- Fecha Radio lançamento Games  -->
                            
                            <br>
                            
                            <label for="tamanho_game">Tamanho:</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="tamanho_game" id="tamanho_game" placeholder="Digite o tamanho do jogo." maxlength="10" required value="<?php echo $row['tamanho_game']; ?>">
                            </div>
                            
                            <label for="data_lancamento_game">Data de lançamento:</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="data_lancamento_game" id="data_lancamento_game" placeholder="Digite a data de lançamento do jogo." maxlength="50" required value="<?php echo $row['data_lancamento_game']; ?>">
                            </div>
                            
                            <!-- number valor_produto -->
                            <label for="valor_game">Valor:</label>
                            <div class="input-group">
                                <input class="form-control" type="number" name="valor_game" id="valor_game" min="0" step="0.01" value="<?php echo $row['valor_game']; ?>">
                            </div>
                            <!-- number valor_produto -->
                            
                            <br>
                            
                            <!-- file imagem_produto ATUAL-->
                            <label for="">Imagem Atual:</label>&nbsp;&nbsp;&nbsp; <br>
                            <img src="../imagens/<?php echo $row['imagem_game']; ?> " alt="" class="img-responsive" style="max-width:150px;">
                            <br>
                            <!-- type="hidden" campo oculto pra guardar dados -->
                            <!-- guardamos o nome da imagem caso não seja alterada -->
                            <input type="hidden" name="imagem_game_atual" id="imagem_game_atual" value="<?php echo $row['imagem_game']; ?>">
                            <br>
                            <!-- file imagem_produto ATUAL-->
                            
                            <!-- file imagem_produto NOVA-->
                            <label for="imagem_game">Nova Imagem:</label>
                            <br>
                            <img class="img-responsive" src="" alt="" name="imagem" id="imagem" style="max-width:150px;">
                            <div class="input-group">
                                <input class="form-control" type="file" name="imagem_game" id="imagem_game" onchange="visualizarImagem.call(this)">
                            </div>
                            <!-- file imagem_produto NOVA-->
                            
                            
                            
                            <br>
                            <!-- Trailer Game -->
                            <label for="trailer_game">Trailer</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="trailer_game" id="trailer_game" placeholder="Digite apenas o link http: do iframe do trailer." maxlength="1000" required value="<?php echo $row['trailer_game']; ?>">
                            </div>
                            <br>
                            
                            <!-- btn enviar -->
                            <input class="btn btn-primary btn-block" role="button" type="submit" value="Atualizar" name="enviar" id="enviar">
                            <br>
                        </form>
                    </div>
                </div>
            </div>
    </main>
    <script>
        function visualizarImagem() {
            if (this.files && this.files[0]) {
                var obj = new FileReader();
                obj.onload = function(data) {
                    var imagem = document.getElementById("imagem");
                    imagem.src = data.target.result;
                    imagem.style.display = "block";
                }
                obj.readAsDataURL(this.files[0]);
            }
        }
    </script>
    <!-- Link arquivos Bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<?php 
    mysqli_free_result($lista_fk); 
    mysqli_free_result($lista_fk_c); 
    mysqli_free_result($lista); 
?>
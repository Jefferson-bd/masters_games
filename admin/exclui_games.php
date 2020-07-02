<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_games.php");

// Definindo o USE do Banco de dados
mysqli_select_db($conn_games,$database_conn);

// Definindo e recebendo dados para consulta
$tabela_delete  = "tbgames";
$id_tabela_del  = "id_game";
$id_filtro_del = $_GET['id_game'];

// SQL para exclusão
$deleteSQL  =   "DELETE
                FROM ".$tabela_delete."
                WHERE ".$id_tabela_del."=".$id_filtro_del."";
$resultado  =   $conn_games->query($deleteSQL);

// Após a ação a página será redirecionada
$destino    =   "lista_games.php";
if(mysqli_insert_id($conn_games)){
    header("Location: $destino");
}else{
    header("Location: $destino");
};   
?>
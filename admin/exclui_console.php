<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_games.php");

// Definindo o USE do Banco de Dados
mysqli_select_db($conn_games,$database_conn);

// Definindo e recebendo os dados para consulta
$tabela_delete  = "tbconsole";
$id_tabela_del  = "id_console";
$id_filtro_del  =  $_GET['id_console'];

// SQL para exclusão
$deleteSQL  =   "DELETE
                FROM ".$tabela_delete."
                WHERE ".$id_tabela_del."=".$id_filtro_del."";
$resultado  =   $conn_games->query($deleteSQL);

// Redirecionamento da página após a ação
$destino    =   "lista_console.php";
if(mysqli_insert_id($conn_games)){
    header("Location: $destino");
}else{
    header("Location: $destino");
};
?>
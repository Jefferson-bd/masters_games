<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_games.php");

// Definindo o USE do Banco de Dados
mysqli_select_db($conn_games,$database_conn);

// Definindo e Recebendo Dados para Consulta
$tabela_delete  = "tbusuarios";
$id_tabela_del  = "id_usuario";
$id_filtro_del  = $_GET['id_usuario'];

// SQL para Exclusão
$deleteSQL  = "DELETE
              FROM ".$tabela_delete."
              WHERE ".$id_tabela_del."=".$id_filtro_del."";
$resultado  = $conn_games->query($deleteSQL);

// Após a Ação a Página será Redirecionada
$destino    = "lista_usuarios.php";
if (mysqli_insert_id($conn_games)){
    header("Location: $destino");
}else{
    header("Location: $destino");
};
?>
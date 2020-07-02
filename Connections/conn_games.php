<?php
$hostname_conn = "localhost";
$database_conn = "iwane047_masters_games";
$username_conn = "iwane047_ti09";
$password_conn = "Senacti09B&st";
$charset_conn = "utf-8";

$conn_games = new mysqli($hostname_conn, $username_conn, $password_conn, $database_conn);

mysqli_set_charset($conn_games,$charset_conn);

if($conn_games->connect_error){
    echo "Error: ".$conn_games->connect_error;
};
?>
<?php

//Criar Conexão
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "";

$Connection = new mysqli($servername, $username, $password, $dbName);
$Connection->set_charset('utf8mb4');

if ($Connection->connect_error)
    die("Erro de ligação: " . $Connection->connect_error);

//-------------------------------------------------------------------------------------------------//

//Create Database

if ($file = fopen("sql\\database.sql", "r")) {

    $sql = "";

    while(!feof($file)) {

        $sql = fgets($file);

        if(!mysqli_query($Connection, $sql)) {
            echo "<br><br>Warning: " . mysqli_error($Connection);
        }  

    }

    fclose($file);

}
<?php
    $db_servername = "localhost";
    $db_username = "root";
    $db_password = "root";
    $db_name= "hipermedial";

    //Crear connection
    $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
    $conn->set_charset("utf8");

    //Check connection
    if ($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
        echo "Error";
    }
    else{
        echo "<p> Conexión exitosa!! </p>";
    }
?>
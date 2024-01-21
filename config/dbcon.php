<?php

    define('DB_SERVER', "localhost");
    define('DB_USERNAME', "root");
    define('DB_PASSWORD', "");
    define('DB_DATABASE', "agil_ventas");

    $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    if(!$conn) {
        die("Conexion fallida.". mysqli_connect_error());
    }

?>
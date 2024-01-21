<?php

session_start();

require 'dbcon.php';

// Validacion del input
function validate($inputData) {

    global $conn;
    $validatedData = mysqli_real_escape_string($conn, $inputData);
    return trim($validatedData);

}

// Redireccionar de una pagina a otra pagina con el mensaje (status)
function redirect($url, $status) {

    $_SESSION['status'] = $status;
    header('Location: '.$url);
    exit(0);

}

// Mostrar mensajes o status despues de algun proceso
function alertMessage() {

    if(isset($_SESSION['status'])) {
        echo $_SESSION['status'];
        unset($_SESSION['status']);
    }

}



?>
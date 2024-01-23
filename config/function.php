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
        
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>'.$_SESSION['status'].'</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        unset($_SESSION['status']);
    }

}

// Vamos a insertar datos en la BD
function insert($tableName, $data) {
    global $conn;

    $table = validate($tableName);
    $columns = array_keys($data);
    $values = array_values($data);

    $finalColumn = implode(',', $columns);
    $finalValues = "'".implode("', '", $values)."'";

    $query = "INSERT INTO $table ($finalColumn) VALUES ($finalValues)";
    $result = mysqli_query($conn,$query);

    return $result;

}

// Vamos a actualizar la informacion de la BD
function update($tableName, $id, $data) {
    global $conn;

    $table = validate($tableName);
    $id = validate($id);

    $updateDataString = "";

    foreach($data as $column => $value) {

        $updateDataString .= $column.'='."'$value',";

    }
    $finalUpdateData = substr(trim($updateDataString),0,-1);
    $query = "UPDATE $table SET $finalUpdateData WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    return $result;

}

function getAll($tableName, $status = NULL) {

    global $conn;

    $table = validate($tableName);
    $status = validate($status);

    if($status == 'status') {
        $query = "SELECT + FROM $table WHERE status='0'";
    } else {
        $query = "SELECT + FROM $table";
    }

    return mysqli_query($conn, $query);

}

function getById($tableName, $id) {
    global $conn;

    $table = validate($tableName);
    $id = validate($id);

    $query = "SELECT * FROM $table WHERE id='$id' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if($result) {
        if(mysqli_num_rows($result) == 1) {

            // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $row = mysqli_fetch_assoc($result);
            $response = [
                'status' => 200,
                'data' => $row,
                'message' => 'Registro encontrado.'
            ];
            return $response;

        } else {

            $response = [
                'status' => 404,
                'message' => 'Informacion no encontrada.'
            ];
            return $response;    

        }
    } else {

        $response = [
            'status' => 500,
            'message' => 'Algo Salio Mal!'
        ];
        return $response;

    }

}

// Eliminar informacion de la BD usando el id.
function delete($tableName, $id) {

    global $conn;

    $table = validate($tableName);
    $id = validate($id);

    $query = "DELETE FROM $table WHERE id='$id' LIMIT 1";
    $result = mysqli_query($conn, $query);
    return $result;


}





?>
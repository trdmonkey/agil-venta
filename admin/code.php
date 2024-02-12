<?php

include('../config/function.php');

if(isset($_POST['saveAdmin'])) {

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $is_ban = isset($_POST['is_ban']) == true ? 1:0;

    if($name != '' && $email != '' && $password != ''){

        $viewMail = "SELECT * FROM admins WHERE email='$email'";
        $emailCheck = mysqli_query($conn, $viewMail);
        if($emailCheck) {
            if(mysqli_num_rows($emailCheck) > 0) {
                
            }
        }

    } else {
        redirect('admins-create.php','Por favor complete los campos requeridos.');
    }

}

?>
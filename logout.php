<?php
require 'config/function.php';

if(isset($_SESSION['loggedIn'])) {

    logoutSession();
    redirect('login.php','Cierre de sesión exitoso.');

}


?>
<?php

require '../config/function.php';

$paramResultId = checkParamId('id');
if(is_numeric($paramResultId)) {

    $adminId = validate($paramResultId);
    $admin = getById('admins', $adminId);
    // echo $adminId;
    if($admin['status'] == 200) {
        $adminDeleteRes = delete('admins', $adminId);
        if($adminDeleteRes) {
            redirect('admins.php', 'Admin eliminado exitosamente.');
        } else {
            redirect('admins.php', 'Algo salió mal, dirijase a su administrador del sistema.');
        }
    } else {
        redirect('admins.php', $admin['message']);
    }

} else {
    redirect('admins.php', 'Algo salió mal.');
}

?>
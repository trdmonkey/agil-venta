<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
        <div class="card-header">
            <h4 class="mb-0">EDITAR ADMIN
                <a href="admins.php" class="btn btn-danger float-end" title="Regresar a al pagina anterior"><i class="fa-solid fa-left-long"></i></a>
            </h4>
        </div>
        <div class="card-body">

            <?php alertMessage(); ?>

            <form action="code.php" method="POST">

            <?php
            
            if(isset($_GET['id'])) {

                if($_GET['id'] != '') {

                    $adminId = $_GET['id'];

                } else {
                    echo '<h5>Registro no encontrado.</h5>';
                    return false;
                }
            } else {
                echo '<h5>Identificacion no encontrada en los parametros.</h5>';
                return false;
            }

            $adminData = getById('admins', $adminId);
            if($adminData) {

                if($adminData['status'] == 200) {
                    ?>
                    <input type="hidden" name="adminId" value="<?= $adminData['data']['id']; ?>">
                    <div class="row">
                        <div class="col-md-12 mb-3">                        
                            <label for="">Nombre *</label>
                            <input type="text" name="name" value="<?= $adminData['data']['name']; ?>" required class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">                        
                            <label for="">Email *</label>
                            <input type="email" name="email" value="<?= $adminData['data']['email']; ?>" required class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">                        
                            <label for="">Password *</label>
                            <input type="password" name="password" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">                        
                            <label for="">Telefono *</label>
                            <input type="number" name="phone" value="<?= $adminData['data']['phone']; ?>" required class="form-control" />
                        </div>
                        <div class="col-md-3 mb-3">                        
                            <label for="">Privado</label>
                            <br/>
                            <input type="checkbox" name="is_ban" <?= $adminData['data']['is_ban'] == true ? 'checked' : ''; ?> style="width: 30px; height: 30px;" />
                        </div>
                        <div class="col-md-12 mb-3 text-end">                        
                            <button type="submit" name="updateAdmin" class="btn btn-primary" title="Actualizar registro"><i class="fa-regular fa-floppy-disk"></i> Actualizar</button>
                        </div>
                    </div>
                    <?php
                } else {
                    echo '<h5>'.$adminData['message'].'</h5>';
                }

            } else {
                echo 'Algo salió mal!';
                return false;
            }

            ?>

                

            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
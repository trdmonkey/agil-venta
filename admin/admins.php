<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
        <div class="card-header">
            <h4 class="mb-0">Admin / Personal
                <a href="admins-create.php" class="btn btn-primary float-end">Agregar Nuevo</a>
            </h4>
        </div>
        <div class="card-body">
            <?php alertMessage(); ?>

            <?php
            $admins = getAll('admins');
            if(!$admins) {
                echo '<h4>Algo salió mal!</h4>';
                return false;
            }
            if(mysqli_num_rows($admins) > 0) {

            
            ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">

                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>          
                        <?php foreach($admins as $adminItem) : ?>
                        <tr>
                            <td><?= $adminItem['id'] ?></td>
                            <td><?= $adminItem['name'] ?></td>
                            <td><?= $adminItem['email'] ?></td>
                            <td>
                                <a href="admins-edit.php" class="btn btn-success btn-sm">Editar</a>
                                <a href="admins-delete.php" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                        
                    </tbody>
                </table>
            </div>
            <?php
            } else {
                ?>
                    <h4 class="mb-0">Registro no encontrado.</h4>
                <?php
            }
            ?>
            
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
        <div class="card-header">
            <h4 class="mb-0">Categorias
                <a href="categories-create.php" class="btn btn-primary float-end">Agregar Categoria</a>
            </h4>
        </div>
        <div class="card-body">
            <?php alertMessage(); ?>

            <?php
            $categories = getAll('categories');
            if(!$categories) {
                echo '<h4>Algo salió mal!</h4>';
                return false;
            }
            if(mysqli_num_rows($categories) > 0) {

            
            ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">

                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>          
                        <?php foreach($categories as $item) : ?>
                        <tr>
                            <td><?= $item['id'] ?></td>
                            <td><?= $item['name'] ?></td>
                            <td>
                                <?php
                                    if($adminItem['status'] == 1) {
                                        echo '<span class="badge bg-danger">Privada</span>';
                                    } else {
                                        echo '<span class="badge bg-primary">Publica</span>';
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="categories-edit.php?id=<?= $item['id']; ?>" class="btn btn-success btn-sm" title="Editar registro"><i class="fa-solid fa-pen"></i></a>
                                <a href="categories-delete.php?id=<?= $item['id']; ?>" class="btn btn-danger btn-sm" title="Eliminar registro"><i class="fa-solid fa-trash"></i></a>
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
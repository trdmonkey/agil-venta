<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
        <div class="card-header">
            <h4 class="mb-0">AGREGAR CATEGORIA
                <a href="categories.php" class="btn btn-danger float-end">Regresar</a>
            </h4>
        </div>
        <div class="card-body">

            <?php alertMessage(); ?>

            <form action="code.php" method="POST">

                <div class="row">
                    <div class="col-md-12 mb-3">                        
                        <label for="">Nombre *</label>
                        <input type="text" name="name" required class="form-control" />
                    </div>
                    <div class="col-md-6 mb-3">                        
                        <label for="">Descripción</label>
                        <input type="text" name="descripcion" required class="form-control" />
                    </div>



                    <div class="col-md-12 mb-3 text-end">                        
                        <button type="submit" name="saveAdmin" class="btn btn-primary">Guardar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
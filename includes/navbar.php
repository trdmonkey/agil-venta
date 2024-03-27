<nav class="navbar navbar-expand-lg bg-white shadow">
  <div class="container">

    <a class="navbar-brand ms-auto" href="#">
        <img src="./img/LOGOAGIL1-removebg-preview.png" alt="Agil Ventas LOVO" class="img-fluid max-width-100 mw-100 logo-img" style="max-height: 30px;" />
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Inicio</a>
        </li>

        <?php if(isset($_SESSION['loggedIn'])) : ?>

        <li class="nav-item">
          <a class="nav-link" href="#"><?= $_SESSION['loggedInUser']['name']; ?></a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-danger" href="logout.php">Logout</a>
        </li>

        <?php else : ?>

        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>

        <?php endif; ?>

        <!-- BOTONES DEL MENU NAVBAR CON LISTA DE SELECCION -->
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li> -->

      </ul>
    </div>

  </div>
</nav>
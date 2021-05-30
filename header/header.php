<div class="wrapper">
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2c3e50;">
    <form action="../home/home.php">
      <button class="btn navbar-brand" href="#" style="margin-left: 5%; font-size: 45px; font-weight: 300; font-family: 'Brush Script MT', cursive;">
        Teste de API<i class="fab fa-accusoft"></i>
      </button>
    </form>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="margin: 2%;">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav" style="margin-right: 5%;">
      <ul class="navbar-nav ">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white">

            <img src=<?php
                      echo '"../assets/users/' . $_SESSION['img_url'] . '"';
                      ?> class="img" width="50" height="50" alt="Avatar" style="border-radius: 50%;">
            <?php
            echo $_SESSION['name'];
            ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <form action="../home/profile.php">
              <button class="dropdown-item" href="#">Profile</button>
            </form>
            <div class="dropdown-divider"></div>
            <form action="../login.template/logout.php">
              <button class="btn dropdown-item" href="#" type="submit">
                Log out
              </button>
            </form>
          </div>

        </li>
      </ul>
      <form class="form p-3" action="users.php">
        <div class="row">
          <div class="col-md-2"></div>
        </div>
        <button type="submit" class="btn btn-info">
          Ver todos usuários
        </button>
      </form>
    </div>
  </nav>
</div>
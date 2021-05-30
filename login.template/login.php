<?php

include ("../api/constants.php");

session_start();

if ((isset($_SESSION['email']))) {

  unset($_SESSION['login']);
  unset($_SESSION['password']);

  header('location: ../home/home.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="login.css">
</head>

<body>
  <div class="wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <p class="text">
            Teste de Api Usuário
          </p>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <form class="form" action="login.php" method="POST">
        <div class="form-row">
          <div class="col mb-3" style="text-align: center;">
            <i class="fas fa-user"></i>
          </div>
        </div>
        <div class="form-row">
          <div class="col mb-3">
            <label for="validationCustom01">Email</label>
            <input type="email" name="email" class="form-control" id="validationCustom01" required>
          </div>
          <div class="col mb-3">
            <label for="validationCustom02">Password</label>
            <input type="password" name="pwd" class="form-control" id="validationCustom02" required>
          </div>
        </div>
        <div class="form-row">
          <div class="col mb-3">
            <a class="btn btn-warning btn-block" href="http://localhost:3000/api/users/users.php" target="blank">Escolha a credencial</a>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-12" style="text-align: center;">
            <button class="btn btn-info btn-block" data-toggle="modal" data-target="#exampleModal" type="submit" name="logar">Login</button>
          </div>
        </div>
      </form>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: #34495e; color:white;">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Erro de login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Credenciais inválidas
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">
              Tente novamente
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/b12fc99d36.js" crossorigin="anonymous"></script>
</body>

</html>

<?php

$entrou = false;

if (isset($_POST["logar"])) {

  $email = filter_var(htmlspecialchars($_POST['email']), FILTER_SANITIZE_STRING);
  $password = filter_var(htmlspecialchars($_POST['pwd']), FILTER_SANITIZE_STRING);

  $u = file_get_contents(SITE_URL);

  $users = array();

  $users = json_decode($u, JSON_PRETTY_PRINT)["data"];

  try {

    $data = array();

    $exist = false;

    for ($i = 0; $i < count($users); $i++) {
      if ($users[$i]["email"] == $email && $users[$i]["password"] == $password) {
        $datum = array(
          "id" => $users[$i]["id"],
          "name" => $users[$i]["name"],
          "country" => $users[$i]["country"],
          "telephone" => $users[$i]["telephone"],
          "profission" => $users[$i]["profission"],
          "email" => $users[$i]["email"],
          "password" => $users[$i]["password"],
          "url" => $users[$i]["img_url"],
          "desc" => $users[$i]["description"],
          "acess" => $users[$i]["type_acess_id"],
          "sex" => $users[$i]["sex"],
        );

        array_push($data, $datum);

        $exist = true;

        break;
      }
    }

    if ($exist) {

      $id = $data[0]["id"];

      session_start();

      $_SESSION['id'] = $data[0]["id"];
      $_SESSION['email'] = $data[0]["email"];
      $_SESSION['name'] = $data[0]["name"];
      $_SESSION['img_url'] = $data[0]["url"];
      $_SESSION['acess'] = $data[0]["acess"];
      $_SESSION['password'] = $data[0]["password"];
      $_SESSION['desc'] = $data[0]["desc"];
      $_SESSION["country"] = $data[0]["country"];
      $_SESSION["telephone"] = $data[0]["telephone"];
      $_SESSION["profission"] = $data[0]["profission"];
      $_SESSION["sex"] = $data[0]["sex"];

      $entrou = true;
    } else {
      $entrou = false;
    }
  } catch (PDOException $ex) {

    $message = $ex->getMessage();

    echo "<script type='text/javascript'>alert('$message');</script>";
  }
  if ($entrou) {
    header("location: ../home/home.php?id=$id");
  } else {

    session_start();

    $_SESSION["erro"] = "true";

    header("location: ./login.php?err=true");
  }
}
if (isset($_GET["err"])) {
  echo '
    <script type="text/javascript">
      $("#myModal").modal("show");
    </script>
  ';
}
?>
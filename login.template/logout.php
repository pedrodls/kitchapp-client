<?php

include("../api/connection.php");

session_start();

if ((isset($_SESSION['email']))) {

    session_destroy();

    header('location: ../login.template/login.php');
} else
    header('location: ../home/home.php');


?>
<div>

</div>
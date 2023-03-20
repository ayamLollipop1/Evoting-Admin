<?php

require_once "../config/config.php";
require_once '../functions/redirect.php';

session_start();

if(isset($_SESSION['adminID'])) {
    header('location: ../index.php');
}

if (isset($_SESSION['adminID'])) {
    unset($_SESSION['adminID']);

    redirect("login_admins.php", "Logout successful");

}

?>
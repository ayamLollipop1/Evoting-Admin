<?php
session_start();
require_once '../config/config.php';
require_once '../functions/redirect.php';

if (isset($_GET['adminID'])) {
    $id = $_GET['adminID'];

    $delete = $crud->delete_Admin($id);
    if ($delete) {
        redirect("admins.php", "Admin deleted");
    } else {
        redirect("admins.php", "Failed to delete admin");
    }
}

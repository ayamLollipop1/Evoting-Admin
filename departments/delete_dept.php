<?php
session_start();
require_once '../config/config.php';
require_once '../functions/redirect.php';

if (isset($_GET['departmentID'])) {
    $id = $_GET['departmentID'];

    $delete = $crud->delete_dept($id);
    if ($delete) {
        redirect("show_dept.php", "Department deleted");
    }
}

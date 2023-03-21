<?php 
require_once "../config/config.php";
require_once "../includes/header.php";
require_once "../functions/redirect.php";

if(isset($_GET['studentID'])) {
    $id = $_GET['studentID'];

    $delete = $pdo->prepare("DELETE FROM students WHERE studentID = $id");

    if($delete->execute()) {
        redirect("../students/show_students.php","Student deleted");
    }
}

require_once "../includes/footer.php";
?>
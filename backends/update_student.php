<?php
require "../config/config.php";
require "../functions/redirect.php";
require "../functions/code.php";
session_start();

// if (isset($_GET['studentID'])) {
    // $id = $_GET['studentID'];

    // $details = $pdo->prepare("SELECT * FROM students s inner join department d on s.department_id = d.dept_id WHERE studentID=$id");
    // $details->execute();
    // $data = $details->fetch(PDO::FETCH_ASSOC);
// }

if (isset($_POST['submit'])) {
    if (
        empty($_POST['firstname']) || empty($_POST['surname']) || empty($_POST['house']) ||
        empty($_POST['department']) || empty($_POST['house']) || empty($_POST['class']) || empty($_POST['sex'])
    ) {
        redirects("../students/update_student.php?studentID=$id", "Please fill required fields");
    } else {
        $studentID = $_POST['studentID'];
        $firstname = sanitizeInput($_POST['firstname']);
        $othername = sanitizeInput($_POST['othername']);
        $surname = sanitizeInput($_POST['surname']);
        $house = sanitizeInput($_POST['house']);
        $department = sanitizeInput($_POST['department']);
        $class = sanitizeInput($_POST['class']);
        $sex = sanitizeInput($_POST['sex']);

        $update = $pdo->prepare("UPDATE students SET firstname=:firstname, othername=:othername, surname=:surname,
        house=:house,department_id=:department, class=:class, sex=:sex WHERE studentID=:studentID");
        $update->bindParam(':firstname', $firstname);
        $update->bindParam(':othername', $othername);
        $update->bindParam(':surname', $surname);
        $update->bindParam(':house', $house);
        $update->bindParam(':department', $department);
        $update->bindParam(':class', $class);
        $update->bindParam(':sex', $sex);
        $update->bindParam(':studentID', $studentID);

        if ($update->execute()) {
            redirect("../students/show_students.php", "Student record updated");
        }
    }
}

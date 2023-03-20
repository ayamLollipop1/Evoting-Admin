<?php
require_once '../includes/header.php';

if (isset($_GET['studentID'])) {
    $id = $_GET['studentID'];

    $details = $pdo->prepare("SELECT * FROM students s inner join departments d on s.department = d.departmentID WHERE studentID=$id");
    // $details = $conn->prepare("SELECT studentID,firstname,othername,surname,house,department_id,class,sex,uniqueCode,dept_id,name FROM students LEFT JOIN department ON department_id = dept_id WHERE studentID = '$id'");
    $details->execute();
    $data = $details->fetch(PDO::FETCH_ASSOC);
}

// if (isset($_POST['submit'])) {
//     if (
//         empty($_POST['firstname']) || empty($_POST['surname']) || empty($_POST['house']) || 
//         empty($_POST['department_id']) || empty($_POST['house']) || empty($_POST['class']) || empty($_POST['sex'])
//     ) {
//         redirects("update-student.php?studentID=$id", "Please fill required fields");
//     } else {

//         $firstname = sanitizeInput($_POST['firstname']);
//         $othername = sanitizeInput($_POST['othername']);
//         $surname = sanitizeInput($_POST['surname']);
//         $house = sanitizeInput($_POST['house']);
//         $department_id = sanitizeInput($_POST['department_id']);
//         $class = sanitizeInput($_POST['class']);
//         $sex = sanitizeInput($_POST['sex']);

//         $update = $conn->prepare("UPDATE students SET firstname=:firstname, othername=:othername, surname=:surname,
//         house=:house,department_id=:department_id, class=:class, sex=:sex WHERE studentID=:studentID");
//         $update->bindParam(':firstname', $firstname);
//         $update->bindParam(':othername', $othername);
//         $update->bindParam(':surname', $surname);
//         $update->bindParam(':house', $house);
//         $update->bindParam(':department_id', $department_id);
//         $update->bindParam(':class', $class);
//         $update->bindParam(':sex', $sex);
//         $update->bindParam(':studentID', $id);

//         if($update->execute()) {
//             redirect("show-students.php", "Student record updated");
//         }
//     }
// }

?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <h5 class="card-header">Update Student's record</h5>
                <div class="card-body">
                    <form method="POST" action="../backends/update-student.php?studentID=<?php echo $data['studentID']; ?>" autocapitalize="yes" autocomplete="no">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="studentID" value="<?php echo $data['studentID']; ?>">
                                <div class="form-group">
                                    <label for="firstname">First name</label>
                                    <input type="text" value="<?php echo $data['firstname']; ?>" name="firstname" id="firstname" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="othername">Other name</label>
                                    <input type="text" value="<?php echo $data['othername']; ?>" name=" othername" id="othername" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="surname">Surname</label>
                                    <input type="text" value="<?php echo $data['surname']; ?>" name="surname" id="surname" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>House</label>
                                    <select name="house" class="form-control" required>
                                        <option value="<?php echo $data['house']; ?>"><?php echo $data['house']; ?></option>
                                        <option value="1">house 1</option>
                                        <option value="2">house 2</option>
                                        <option value="3">house 3</option>
                                        <option value="4">house 4</option>
                                        <option value="5">house 5</option>
                                        <option value="6">house 6</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <select name="department_id" class="form-control" id="department" required>
                                        <option value="<?php echo $data['dept_id']; ?>"><?php echo $data['name']; ?></option>
                                        <?php if ($department->rowCount() > 0) {
                                            foreach ($department as $row) : ?>
                                                <option value="<?php echo $row['dept_id']; ?>"> <?php echo $row['name']; ?></option>
                                        <?php endforeach;
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="class">Class</label>
                                    <select name="class" id="classs" class="form-control" required>
                                        <option value="<?php echo $data['class']; ?>"><?php echo $data['class']; ?></option>
                                        <option value="form 1">Form 1</option>
                                        <option value="form 2">Form 2</option>
                                        <option value="form 3">Form 3</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="sex">Sex</label>
                                    <select name="sex" id="sex" class="form-control" required>
                                        <option value="<?php echo $data['sex']; ?>"><?php echo $data['sex']; ?></option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary text-center">Save </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php require "../includes/footer.php"; ?>
</body>

</html>
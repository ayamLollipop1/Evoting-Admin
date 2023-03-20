<?php
require_once '../includes/header.php';
require_once '../functions/code.php';
$results = $crud->department();

if (isset($_POST['submit'])) {
    if (
        empty($_POST['firstname']) || empty($_POST['surname'])
        || empty($_POST['class']) || empty($_POST['department']) || empty($_POST['sex']) ||
        empty($_POST['house'])
    ) {
        redirects("create_student.php", "Please fill required fields");
    } else {
        $firstname = sanitizeInput(ucwords($_POST['firstname']));
        $othername = sanitizeInput(ucwords($_POST['othername']));
        $surname = sanitizeInput(ucwords($_POST['surname']));
        $house = sanitizeInput(ucwords($_POST['house']));
        $department = sanitizeInput(ucwords($_POST['department']));
        $class = sanitizeInput(ucwords($_POST['class']));
        $sex = sanitizeInput(ucwords($_POST['sex']));
        $uniqueCode = $uniqueCode;

        $sucess = $crud->addStudent($firstname, $othername, $surname, $house, $department, $class, $uniqueCode, $sex);
        if ($sucess) {
            redirect("show_student.php", "Student added");
        } else {
            redirects("create_student.php", "Student exists");
        }
    }
}

?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <h5 class="card-header text-center">Add Student</h5>
                <div class="card-body">
                    <form method="POST" action="../backends/add_student.php" autocapitalize="yes" autocomplete="no">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">First name</label>
                                    <input type="text" name="firstname" id="firstname" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label for="othername">Other name</label>
                                    <input type="text" name="othername" id="othername" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="surname">Surname</label>
                                    <input type="text" name="surname" id="surname" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>House</label>
                                    <select name="house" class="form-control" required>
                                        <option value="">Select house</option>
                                        <option value="house 1">House 1</option>
                                        <option value="house 2">House 2</option>
                                        <option value="house 3">House 3</option>
                                        <option value="house 4">House 4</option>
                                        <option value="house 5">House 5</option>
                                        <option value="house 6">House 6</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <select name="department" class="form-control" id="department" required>
                                        <option value="">Select department</option>
                                        <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>

                                            <option value="<?php echo $r['departmentID']; ?>"><?php echo $r['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="class">Class</label>
                                    <select name="class" id="classs" class="form-control" required>
                                        <option value="">Select class</option>
                                        <option value="form 1">Form 1</option>
                                        <option value="form 2">Form 2</option>
                                        <option value="form 3">Form 3</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="male">Male</label>
                                    <input type="radio" value="M" name="sex" id="male">
                                    <label for="male">Female</label>
                                    <input type="radio" value="F" name="sex" id="male">
                                </div>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary text-center">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once '../includes/footer.php'; ?>
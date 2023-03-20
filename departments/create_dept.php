<?php
require_once '../includes/header.php';

if (isset($_POST['submit'])) {
  if (empty($_POST['name'])) {
    redirects("create_dept.php", "Please fill required fields");
  } else {
    $name = sanitizeInput(ucwords($_POST['name']));
    $sucess = $crud->addDepartment($name);
    if ($sucess) {
      redirect("show_dept.php", "Department added");
    } else {
      redirects("create_dept.php", "Department exists");
    }
  }
}
?>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Add Department</h5>
          <form method="POST" action="create_dept.php" autocomplete="off">
            <!-- Department input -->
            <div class="form-outline mb-4 mt-4">
              <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />

            </div>

            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once '../includes/footer.php'; ?>
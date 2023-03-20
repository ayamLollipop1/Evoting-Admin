<?php
require_once '../includes/header.php';

if (!isset($_GET['dept_id'])) {
  redirects("show_dept.php", "Failed to get details");
} else {
  $id = $_GET['dept_id'];
  $result = $crud->dept_details($id);
  $r = $result->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $name = sanitizeInput(ucwords($_POST['name']));
  if (empty($_POST['name'])) {
    redirects("update_dept.php?dept_id=$id", "Please fill required fields");
  } else {
    $sucess = $crud->update_dept($id, $name);
    if ($sucess) {
      redirect("show_dept.php", "Department updated");
    } else {
      redirects("update_dept.php?dept_id=$id", "Please make changes");
    }
  }
}

?>
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Update Department</h5>
          <form method="POST" action="update_dept.php?dept_id=<?php echo $r['dept_id']; ?>" autocomplete="no" autocapitalize="yes">
            <!-- Email input -->

            <div class="form-outline mb-4 mt-4">
              <input type="hidden" value="<?php echo $r['dept_id']; ?>" name="id">
              <input type="text" value="<?php echo $r['name']; ?>" name="name" id="form2Example1" class="form-control" placeholder="name" />
            </div>

            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once '../includes/footer.php'; ?>
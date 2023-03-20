<?php
require_once '../includes/header.php';
if (!isset($_GET['adminID'])) {
  redirects("show_dept.php", "Failed to get details");
} else {
  $id = $_GET['adminID'];
  $result = $crud->adminDetails($id);
  $r = $result->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $firstname = sanitizeInput(ucwords($_POST['firstname']));
  $surname = sanitizeInput(ucwords($_POST['surname']));
  $email = sanitizeInput($_POST['email']);

  if (empty($_POST['firstname']) || empty($_POST['surname']) || empty($_POST['email'])) {
    redirects("update_admin.php?adminID=$id", "Please fill required fields");
  } else {
    $sucess = $crud->update_Admin($id, $firstname, $surname, $email);
    if ($sucess) {
      redirect("admins.php", "Admin updated");
    }
  }
}
?>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Update Admin</h5>
          <form method="POST" action="" enctype="multipart/form-data">
            <!-- Email input -->
            <div class="form-outline mb-4 mt-4">
              <label for="email">Email</label>
              <input type="hidden" name="id" value="<?php echo $r['adminID']; ?>">
              <input type="email" value="<?php echo $r['email']; ?>" name="email" id="form2Example1" class="form-control" placeholder="email" />
            </div>

            <div class="form-outline mb-4">
              <label for="firstname">First Name</label>
              <input type="name" value="<?php echo $r['firstName']; ?>" name="firstname" id="form2Example1" class="form-control" placeholder="username" />
            </div>
            <div class="form-outline mb-4">
              <label for="surname">Surname</label>
              <input type="name" value="<?php echo $r['Surname']; ?>" name="surname" id="form2Example1" class="form-control" placeholder="password" />
            </div>

            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once '../includes/footer.php'; ?>
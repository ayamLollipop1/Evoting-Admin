<?php
require_once '../config/config.php';
require_once '../includes/header.php';
require_once '../functions/redirect.php';

if (isset($_POST['submit'])) {
  if (empty($_POST['email']) || empty($_POST['firstname']) || empty($_POST['surname'])) {
    redirects("create_admins.php", "Please fill required fields");
  } else {
    $email = $_POST['email'];
    $firstname = sanitizeInput(ucfirst($_POST['firstname']));
    $surname = sanitizeInput(ucfirst($_POST['surname']));
    $password = ucfirst("password");

    $success = $crud->create_admin($email, $firstname, $surname, $password);
    if ($success) {
      redirect("admins.php", "Admin added successfully");
    } else {
      redirects("create_admins.php", "Admin exists");
    }
  }
}
?>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Create Admins</h5>

          <form method="POST" action="create_admins.php" autocapitalize="yes" autocomplete="no">
            <!-- Email input -->
            <div class="form-outline mb-4 mt-4">
              <input type="email" name="email" id="form2Example1" class="form-control" placeholder="email" />

            </div>

            <div class="form-outline mb-4">
              <input type="name" name="firstname" id="form2Example1" class="form-control" placeholder="first name" />
            </div>

            <div class="form-outline mb-4">
              <input type="name" name="surname" id="form2Example1" class="form-control" placeholder="surname" />
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
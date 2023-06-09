<?php
session_start();
require_once 'config/config.php';
require_once 'functions/redirect.php';

if (!isset($_SESSION['adminID'])) {
  redirects("auth/login_admins.php", "Please Login");
}

$id = $_SESSION['adminID'];
$result = $crud->adminDetails($id);
$details = $result->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
  <title>Admin Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="styles/style.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <!-- font awsome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Alertify js -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
</head>

<body>
  <div id="wrapper">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">LOGO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav side-nav">
            <li class="nav-item">
              <a class="nav-link text-white" style="margin-left: 20px;" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admins/admins.php" style="margin-left: 20px;">Admins</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="students/show_students.php" style="margin-left: 20px;">Students</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="departments/show_dept.php" style="margin-left: 20px;">Department</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="positions/show_position.php" style="margin-left: 20px;">Positions</a>
            </li>

          </ul>
          <ul class="navbar-nav ml-md-auto d-md-flex">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <?php if (isset($_SESSION['adminID'])) : ?>

              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $details['firstName'] . " " . $details['Surname']; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="auth/logout_admin.php">Logout</a>

              </li>
            <?php else : ?>
              <li class="nav-item">
                <a class="nav-link" href="auth/login_admins.php">login
                  <span class="sr-only">(current)</span>
                </a>
              </li>
            <?php endif; ?>

          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Products</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of products: 8</p>

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Categories</h5>

              <p class="card-text">number of categories: 4</p>

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>

              <p class="card-text">number of admins: 3</p>

            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
  <footer>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
      <?php if (isset($_SESSION['message'])); ?>
      alertify.set('notifier', 'position', 'top-right');
      alertify.success('<?php echo $_SESSION['message']; ?>');
      <?php unset($_SESSION['message']); ?>
    </script>

    <script>
      <?php if (isset($_SESSION['warning'])); ?>
      alertify.set('notifier', 'position', 'top-right');
      alertify.warning('<?php echo $_SESSION['warning']; ?>');
      <?php unset($_SESSION['warning']); ?>
    </script>
  </footer>

</body>

</html>
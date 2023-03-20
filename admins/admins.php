<?php
require_once '../includes/header.php';
$results = $crud->admins();
$count = 0;
?>
<div class="container-fluid">

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Admins</h5>
          <a href="create_admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
          <table class="table">
            <thead>

              <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
              </tr>

            </thead>
            <tbody>
              <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) {
                $count++; ?>
                <tr>
                  <th scope="row"><?php echo $count; ?></th>
                  <td><?php echo ucwords($r['firstName']); ?></td>
                  <td><?php echo ucwords($r['Surname']); ?></td>
                  <td><?php echo $r['email']; ?></td>
                  <td>
                    <a href="update_admin.php?adminID=<?php echo $r['adminID']; ?>" class="btn btn-warning text-white text-center ">Update</a>
                    <a href="delete_admin.php?adminID=<?php echo $r['adminID']; ?>" class="btn btn-danger  text-center ">Delete</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once '../includes/footer.php'; ?>
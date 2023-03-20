<?php
require_once '../includes/header.php';
$results = $crud->show_Students();
$count = 0;
?>
<div class="container-fluid">

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Students</h5>
          <a href="create_student.php" class="btn btn-primary mb-4 text-center float-right">Add Student</a>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Other Name</th>
                <th scope="col">Surname</th>
                <th scope="col">House</th>
                <th scope="col">Department</th>
                <th scope="col">Class</th>
                <th scope="col">Sex</th>
                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody>
              <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) {
                $count++; ?>
                <tr>
                  <th scope="row"><?php echo $count; ?></th>
                  <td><?=  ucwords($r['firstname']); ?></td>
                  <td><?=  ucwords($r['othername']); ?></td>
                  <td><?= ucwords($r['surname']); ?></td>
                  <td><?= "House ".ucwords($r['house']); ?></td>
                  <td><?= ucwords($r['name']); ?></td>
                  <td><?= "Form ".ucwords($r['class']); ?></td>
                  <td><?= ucwords($r['sex']); ?></td>
                  <td>
                    <a href="update_student.php?studentID=<?php echo $r['studentID']; ?>" class="btn btn-success  text-center ">Update</a>
                    <a href="delete_student.php?studentID=<?php echo $r['studentID']; ?>" class="btn btn-danger  text-center ">Delete</a>
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
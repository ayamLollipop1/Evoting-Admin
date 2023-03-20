<?php
require_once '../includes/header.php';
$results = $crud->department();
$count = 0;

?>
<div class="container-fluid">

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Categories</h5>
          <a href="create_dept.php" class="btn btn-primary mb-4 text-center float-right">Add Department</a>
          <table class="table">

            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">update</th>
                <th scope="col">delete</th>
              </tr>
            </thead>

            <tbody>
              <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {
                $count++; ?>
              <tr>
                <th scope="row"><?php echo $count; ?></th>
                <td><?php echo $r['name']; ?></td>
                <td><a href="update_dept.php?dept_id=<?php echo $r['dept_id']; ?>" class="btn btn-warning text-white text-center ">Update </a></td>
                <td><a href="delete_dept.php?dept_id=<?php echo $r['dept_id']; ?>" class="btn btn-danger  text-center ">Delete </a></td>
              </tr>
              <?php } ?>
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>



</div>
<?php require_once '../includes/footer.php';

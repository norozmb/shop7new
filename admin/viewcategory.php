<?php
include './admin_header.php';
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">View Category</h1>

<div class="row">
        <div class="col-lg-8">
        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Delete</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "./config.php";
    $query = 'SELECT c2.cat_name Category_name, c1.cat_name Sub_Category FROM category c1, category c2 WHERE c1.parent_id = c2.id;';
    $result = mysqli_query($con, $query);
    foreach($result as $data){
    ?>
    <tr class="table-active">
      <td><?php echo $data['Category_name'] ?></td>
      <td><?php echo $data['Sub_Category'] ?></td>
      <td><a href="./deletebrand.php?id=<?php echo $data['id'] ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
      <td><a href="./editbrand.php?id=<?php echo $data['id'] ?>"><button type="button" class="btn btn-success">Edit</button></a></td>
    </tr>

    <?php } ?>
  </tbody>
</table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php
    include './admin_footer.php';
?>

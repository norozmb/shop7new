<?php
include './admin_header.php';
?>

<?php
  include "./config.php";
  if(isset($_POST['btnsub'])){

    $catname = mysqli_real_escape_string($con, trim($_POST['cname']));
    $selname = mysqli_real_escape_string($con, $_POST['selectname']);
    
    $query = "INSERT INTO category(cat_name, parent_id) VALUES ('$catname', '$selname')";
    $result = mysqli_query($con, $query);
    if ($result) {
        $msg = 'Category inserted successfully!';
    } else {
        $msg = 'Error inserting category: ' . mysqli_error($con);
    }
  }

  ?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Add Category</h1>
<div class="row">
<div class="col-lg-4">
<?php
if(isset($msg)){

  ?>
  <div class="alert alert-dismissible alert-success mt-2">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong><?php echo $msg ?></strong><a href="#" class="alert-link"></a>.
  </div>
  <?php } ?>

    <form action="" method="POST">

    <div class="form-group">
      <label class="form-label mt-4">Category_Name</label>
      <input type="text" class="form-control" placeholder="Cat Name" name="cname">
    </div>

    <div class="form-group">
      <label for="exampleSelect1" class="form-label mt-4">Select Category</label>
      <select class="form-select" id="exampleSelect1" name="selectname">
        <option value="0">None</option>
      <?php
          // include "./config.php";
          $query = 'SELECT * FROM category WHERE parent_id < 1';
          $result = mysqli_query($con, $query);
          foreach($result as $data){
      ?>
        <option value="<?php echo $data['id'] ?>"><?php echo $data['cat_name'] ?></option>

        <?php } ?>
      </select>
    </div>


    <div class="form-group">
      <input type="submit" value="Submit" class="btn btn-info w-100 mt-2" name="btnsub">
    </div>

</form>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php
    include './admin_footer.php';
?>

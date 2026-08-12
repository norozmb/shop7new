<?php
include './admin_header.php';
?>

<?php
  include "./config.php";
  if(isset($_POST['btnsub'])){

    $brandname = mysqli_real_escape_string($con, trim($_POST['bname']));
    
    $query = "INSERT INTO brand (brand_name) VALUES ('$brandname')";
    $result = mysqli_query($con, $query);
    if ($result) {
        $msg = 'Brand inserted successfully!';
    } else {
        $msg = 'Error inserting brand: ' . mysqli_error($con);
    }
  }

  ?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Add Brand</h1>
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

    <form action="" method="post">

    <div class="form-group">
      <label class="form-label mt-4">Name</label>
      <input type="text" class="form-control" placeholder="Brand Name" name="bname">
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

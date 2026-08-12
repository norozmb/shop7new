<?php
include './admin_header.php';
?>

<?php
  include "./config.php";
  if(isset($_POST['btnsub'])){
    $upid = mysqli_real_escape_string($con, $_POST['hid']);
    $brandname = mysqli_real_escape_string($con, trim($_POST['bname']));
    $query = "UPDATE brand SET brand_name='$brandname' WHERE id = '$upid'";
    $result = mysqli_query($con, $query);
    if ($result) {
        $msg = 'Brand updated successfully!';
    } else {
        $msg = 'Error updating brand: ' . mysqli_error($con);
    }
  }

  ?>

<?php
$gid = isset($_GET['id']) ? mysqli_real_escape_string($con, $_GET['id']) : 0;
$query = "SELECT * FROM brand WHERE id = '$gid'";
$result = mysqli_query($con, $query);
$ename = "";
if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    $ename = $data['brand_name'];
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Brand</h1>
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
      <label class="form-label mt-4">Name</label>
      <input type="text" class="form-control" placeholder="Brand Name" name="bname" value="<?php echo $ename ?>">
    </div>
    <input type="hidden" name="hid" value="<?php echo $gid ?>">


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

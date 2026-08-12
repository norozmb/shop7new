<?php
include './admin_header.php';
?>

<?php
  include "./config.php";
  $msg = "";
  $msg_type = "success";
  if(isset($_POST['btnsub'])){

    $order_id = mysqli_real_escape_string($con, $_POST['order_id']);
    $product_name = mysqli_real_escape_string($con, $_POST['product_name']);
    $product_des = mysqli_real_escape_string($con, $_POST['product_des']);
    $product_price = mysqli_real_escape_string($con, $_POST['product_price']);
    $product_qty = mysqli_real_escape_string($con, $_POST['product_qty']);

    $productimg = $_FILES['product_img']['name'];
    $productimgtmp = $_FILES['product_img']['tmp_name'];
    
    // Ensure upload directory exists
    if (!file_exists("upload")) {
        mkdir("upload", 0777, true);
    }
    
    $folder = "upload/" . $productimg;

    $status = mysqli_real_escape_string($con, $_POST['status']);
    $cat = mysqli_real_escape_string($con, $_POST['cat']);
    $brand = mysqli_real_escape_string($con, $_POST['brand']);
    
    $query = "INSERT INTO product (order_id, product_name, product_des, product_price, product_qty, product_img, product_status, cat_id, brand_id) 
              VALUES ('$order_id', '$product_name', '$product_des', '$product_price', '$product_qty', '$productimg', '$status', '$cat', '$brand')";
    $result = mysqli_query($con, $query);

    if ($result) {
      if (!empty($productimgtmp)) {
        move_uploaded_file($productimgtmp, $folder);
      }
      $msg = 'Product added successfully!';
      $msg_type = 'success';
    } else {
      $msg = 'Error adding product: ' . mysqli_error($con);
      $msg_type = 'danger';
    }
  }

  ?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Add Product</h1>
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

    <form action="" method="POST" enctype="multipart/form-data">

    <div class="form-group">
      <label class="form-label mt-4">order_id</label>
      <input type="text" class="form-control" placeholder="order_id" name="order_id">
    </div>
    <div class="form-group">
      <label class="form-label mt-4">product_name</label>
      <input type="text" class="form-control" placeholder="product_name" name="product_name">
    </div>
    <div class="form-group">
      <label class="form-label mt-4">product_des</label>
      <input type="text" class="form-control" placeholder="product_des" name="product_des">
    </div>
    <div class="form-group">
      <label class="form-label mt-4">product_price</label>
      <input type="text" class="form-control" placeholder="product_price" name="product_price">
    </div>
    <div class="form-group">
      <label class="form-label mt-4">product_qty</label>
      <input type="text" class="form-control" placeholder="product_qty" name="product_qty">
    </div>
    <div class="form-group">
      <label class="form-label mt-4">product_img</label>
      <input type="file" class="form-control" placeholder="product_img" name="product_img" accept="image/*">
    </div>
    <div class="form-group">
      <label for="exampleSelect1" class="form-label mt-4">Select Status</label>
      <select class="form-select" id="exampleSelect1" name="status">
        <option value="1">Active</option>
        <option value="0">inactive</option>

      </select>
    </div>




       <!-- Start Category -->
    <div class="form-group">
      <label for="exampleSelect1" class="form-label mt-4">Select Category</label>
      <select class="form-select" id="exampleSelect1" name="cat">
        <option value="0">None</option>
      <?php
          // include "./config.php";
          $query = 'SELECT * FROM category';
          $result = mysqli_query($con, $query);
          foreach($result as $data){
      ?>
        <option value="<?php echo $data['id'] ?>"><?php echo $data['cat_name'] ?></option>

        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleSelect1" class="form-label mt-4">Select Brand</label>
      <select class="form-select" id="exampleSelect1" name="brand">
        <option value="0">None</option>
      <?php
          // include "./config.php";
          $query = 'SELECT * FROM brand';
          $result = mysqli_query($con, $query);
          foreach($result as $data){
      ?>
        <option value="<?php echo $data['id'] ?>"><?php echo $data['brand_name'] ?></option>

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

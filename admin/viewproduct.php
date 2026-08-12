<?php
include './admin_header.php';
include './config.php';

$msg = "";
$msg_type = "success";

if (isset($_GET['del_id'])) {
    $del_id = mysqli_real_escape_string($con, $_GET['del_id']);
    $delete_query = "DELETE FROM product WHERE id = '$del_id'";
    if (mysqli_query($con, $delete_query)) {
        $msg = "Product deleted successfully.";
        $msg_type = "success";
    } else {
        $msg = "Error deleting product: " . mysqli_error($con);
        $msg_type = "danger";
    }
}

$query = "SELECT product.*, category.cat_name, brand.brand_name 
          FROM product 
          LEFT JOIN category ON product.cat_id = category.id 
          LEFT JOIN brand ON product.brand_id = brand.id 
          ORDER BY product.id DESC";
$result = mysqli_query($con, $query);
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Microphones & Products</h1>
        <a href="addproduct.php" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add Product
        </a>
    </div>

    <?php if (!empty($msg)) : ?>
        <div class="alert alert-<?php echo $msg_type; ?> alert-dismissible fade show" role="alert">
            <?php echo htmlspecialchars($msg); ?>
        </div>
    <?php endif; ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Registered Products</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-middle" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result && mysqli_num_rows($result) > 0) : ?>
                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td>
                                        <img src="./upload/<?php echo htmlspecialchars($row['product_img']); ?>" alt="" style="width: 50px; height: 50px; object-fit: cover;" class="rounded border">
                                    </td>
                                    <td><strong><?php echo htmlspecialchars($row['product_name']); ?></strong></td>
                                    <td>$<?php echo number_format($row['product_price'], 2); ?></td>
                                    <td><?php echo htmlspecialchars($row['cat_name'] ?? 'N/A'); ?></td>
                                    <td><?php echo htmlspecialchars($row['brand_name'] ?? 'N/A'); ?></td>
                                    <td><small><?php echo htmlspecialchars(substr($row['product_des'], 0, 80)) . '...'; ?></small></td>
                                    <td>
                                        <a href="viewproduct.php?del_id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="8" class="text-center py-4">No products found in database.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>
<!-- End of Main Content -->

<?php
include './admin_footer.php';
?>

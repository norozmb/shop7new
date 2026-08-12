<?php
include './admin_header.php';
include './config.php';

// Fetch key statistics
$product_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as total FROM product"))['total'] ?? 0;
$category_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as total FROM category"))['total'] ?? 0;
$brand_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as total FROM brand"))['total'] ?? 0;
$user_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as total FROM user1"))['total'] ?? 0;
$cart_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) as total FROM tblcart"))['total'] ?? 0;

$recent_products = mysqli_query($con, "SELECT product.*, category.cat_name, brand.brand_name 
                                        FROM product 
                                        LEFT JOIN category ON product.cat_id = category.id 
                                        LEFT JOIN brand ON product.brand_id = brand.id 
                                        ORDER BY product.id DESC LIMIT 5");
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Sound Museo Dashboard</h1>
        <a href="addproduct.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add New Product
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Total Products Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Products</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $product_count; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-microphone fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Categories Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Categories</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $category_count; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cubes fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Brands Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Brands</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $brand_count; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tag fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Registered Users Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Registered Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $user_count; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Content Row - Recent Products -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Recently Added Microphones</h6>
                    <a href="viewproduct.php" class="btn btn-sm btn-outline-primary">View All Products</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($recent_products && mysqli_num_rows($recent_products) > 0) : ?>
                                    <?php while ($row = mysqli_fetch_assoc($recent_products)) : ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td>
                                                <img src="./upload/<?php echo htmlspecialchars($row['product_img']); ?>" alt="" style="width: 40px; height: 40px; object-fit: cover;" class="rounded border">
                                            </td>
                                            <td><strong><?php echo htmlspecialchars($row['product_name']); ?></strong></td>
                                            <td>$<?php echo number_format($row['product_price'], 2); ?></td>
                                            <td><?php echo htmlspecialchars($row['cat_name'] ?? 'N/A'); ?></td>
                                            <td><?php echo htmlspecialchars($row['brand_name'] ?? 'N/A'); ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else : ?>
                                    <tr><td colspan="6" class="text-center">No products found.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include './admin_footer.php';
?>

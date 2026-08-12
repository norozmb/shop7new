<?php
include './header.php';

// Cart insert handling
if (isset($_GET['pid']) && isset($_GET['pprice'])) {
    $pid = mysqli_real_escape_string($con, $_GET['pid']);
    $pprice = mysqli_real_escape_string($con, $_GET['pprice']);
    $ipaddress = mysqli_real_escape_string($con, $_SERVER['REMOTE_ADDR']);
    $query = "INSERT INTO tblcart (pid, pprice, ipaddress) VALUES ('$pid', '$pprice', '$ipaddress')";
    $result = mysqli_query($con, $query);
    echo "<script> window.location.assign('./category.php?added=1'); </script>";
    exit;
}

$where_clause = "";
$search_title = "All Microphone Categories";

if (isset($_GET['cat_id']) && !empty($_GET['cat_id'])) {
    $cat_id = mysqli_real_escape_string($con, $_GET['cat_id']);
    $where_clause = " WHERE cat_id = '$cat_id'";
    // Fetch cat name
    $cat_res = mysqli_query($con, "SELECT cat_name FROM category WHERE id = '$cat_id'");
    if ($cat_res && $row = mysqli_fetch_assoc($cat_res)) {
        $search_title = htmlspecialchars($row['cat_name']);
    }
} elseif (isset($_GET['search']) && !empty($_GET['search'])) {
    $search_term = mysqli_real_escape_string($con, trim($_GET['search']));
    $where_clause = " WHERE product_name LIKE '%$search_term%' OR product_des LIKE '%$search_term%'";
    $search_title = "Search Results for '" . htmlspecialchars($_GET['search']) . "'";
}

// Fetch categories for sidebar filter
$all_cats = mysqli_query($con, "SELECT * FROM category");
?>

<div class="container martop my-4">
    <div class="row">
        <div class="col text-center">
            <h1 class="text-primary font-weight-bold"><?php echo $search_title; ?></h1>
            <p class="text-muted">Explore high-quality studio, dynamic, condenser, and wireless microphones.</p>
        </div>
    </div>
</div>

<div class="container pb-5">
    <?php if (isset($_GET['added'])) : ?>
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            Item successfully added to your cart! <a href="cart.php" class="alert-link">Go to Cart</a>
        </div>
    <?php endif; ?>

    <div class="row">
        <!-- Sidebar Filter -->
        <div class="col-lg-3 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white font-weight-bold">
                    Filter Categories
                </div>
                <ul class="list-group list-group-flush">
                    <a href="category.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center <?php echo !isset($_GET['cat_id']) ? 'active' : ''; ?>">
                        All Microphones
                    </a>
                    <?php 
                    if ($all_cats && mysqli_num_rows($all_cats) > 0) {
                        while ($cat = mysqli_fetch_assoc($all_cats)) {
                            $is_active = (isset($_GET['cat_id']) && $_GET['cat_id'] == $cat['id']) ? 'active' : '';
                            echo '<a href="category.php?cat_id=' . $cat['id'] . '" class="list-group-item list-group-item-action ' . $is_active . '">' . htmlspecialchars($cat['cat_name']) . '</a>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>

        <!-- Product Display Grid -->
        <div class="col-lg-9">
            <section class="lattest-product-area pb-40 category-list">
                <div class="row">
                    <?php
                    $prod_query = "SELECT * FROM product" . $where_clause;
                    $result = mysqli_query($con, $prod_query);
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($data = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="single-product card h-100 border-0 shadow-sm rounded overflow-hidden">
                                <div class="text-center p-3" style="background: #f9f9f9;">
                                    <img class="img-fluid" src="./admin/upload/<?php echo htmlspecialchars($data['product_img']); ?>" alt="<?php echo htmlspecialchars($data['product_name']); ?>" style="height: 180px; object-fit: contain;">
                                </div>
                                <div class="card-body d-flex flex-column justify-content-between p-3">
                                    <div>
                                        <h6 class="font-weight-bold mb-2"><?php echo htmlspecialchars($data['product_name']); ?></h6>
                                        <h5 class="text-success font-weight-bold mb-3">$<?php echo number_format($data['product_price'], 2); ?></h5>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <a href="./category.php?pid=<?php echo $data['id']; ?>&pprice=<?php echo $data['product_price']; ?>" class="btn btn-sm btn-primary">
                                            <i class="ti-bag"></i> Add to Cart
                                        </a>
                                        <a href="./singleProduct.php?pid=<?php echo $data['id']; ?>" class="btn btn-sm btn-outline-secondary">
                                            Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php 
                        } 
                    } else {
                    ?>
                        <div class="col-12 text-center py-5">
                            <h4 class="text-muted">No microphones found in this category.</h4>
                            <a href="category.php" class="btn btn-outline-primary mt-3">View All Products</a>
                        </div>
                    <?php } ?>
                </div>
            </section>
        </div>
    </div>
</div>

<?php
include './footer.php';
?>
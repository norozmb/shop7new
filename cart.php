<?php
    include './header.php';
    $ipaddress = mysqli_real_escape_string($con, $_SERVER['REMOTE_ADDR']);
?>

<?php
$msg = "";
$msg_type = "info";

if(isset($_GET['cid'])){
    $cid = mysqli_real_escape_string($con, $_GET['cid']);
    $query = mysqli_query($con, "DELETE FROM tblcart WHERE cid = '$cid' AND ipaddress = '$ipaddress'");
    if($query) {
        $msg = "Item removed from your cart.";
        $msg_type = "warning";
    }
}

if (isset($_POST['checkout'])) {
    $clear_query = mysqli_query($con, "DELETE FROM tblcart WHERE ipaddress = '$ipaddress'");
    if ($clear_query) {
        $msg = "Thank you for your purchase! Your order has been placed successfully.";
        $msg_type = "success";
    }
}

?>

<!-- Start Banner Area -->
<div class="container mar py-4" >
    <div class="row">
        <div class="col">
            <div class="shopping-cart text-center">
                <h1 class="mt-4 text-primary">Your Shopping Cart</h1>
                <p class="text-muted">Review your selected Sound Museo products below.</p>
            </div>
        </div>
    </div>
</div>
<!-- End Banner Area -->

<section class="cart_area pb-5">
    <div class="container">
        <?php if (!empty($msg)) : ?>
            <div class="alert alert-<?php echo $msg_type; ?> alert-dismissible fade show text-center" role="alert">
                <strong><?php echo htmlspecialchars($msg); ?></strong>
            </div>
        <?php endif; ?>

        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT tblcart.cid, product.product_name, product.product_price, product.product_img 
                                      FROM product JOIN tblcart ON product.id = tblcart.pid 
                                      WHERE tblcart.ipaddress = '$ipaddress'";
                            $result = mysqli_query($con, $query);
                            $cart_items = [];
                            $subtotal = 0;
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $cart_items[] = $row;
                                    $subtotal += floatval($row['product_price']);
                                }
                            }

                            if (!empty($cart_items)) {
                                foreach($cart_items as $data) {
                        ?>
                        <tr>
                            <td>
                                <div class="media align-items-center">
                                    <div class="d-flex mr-3">
                                        <img src="./admin/upload/<?php echo htmlspecialchars($data['product_img']); ?>" alt="<?php echo htmlspecialchars($data['product_name']); ?>" style="width: 60px; height: 60px; object-fit: cover;" class="rounded border">
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mb-0"><?php echo htmlspecialchars($data['product_name']); ?></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>$<?php echo number_format($data['product_price'], 2); ?></h5>
                            </td>
                            <td>
                                <a href="./cart.php?cid=<?php echo $data['cid']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Remove this item from your cart?');">
                                    <i class="fa fa-trash"></i> Remove
                                </a>
                            </td>
                        </tr>
                        <?php 
                                } 
                            } else {
                        ?>
                        <tr>
                            <td colspan="3" class="text-center py-4 text-muted">
                                <h5>Your shopping cart is currently empty.</h5>
                                <a href="category.php" class="btn btn-primary mt-2">Browse Microphones</a>
                            </td>
                        </tr>
                        <?php } ?>

                        <?php if (!empty($cart_items)) : ?>
                        <tr>
                            <td colspan="2" class="text-right">
                                <h4>Subtotal:</h4>
                            </td>
                            <td>
                                <h4 class="text-success">$<?php echo number_format($subtotal, 2); ?></h4>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <a class="btn btn-outline-secondary" href="category.php">Continue Shopping</a>
                                    <form action="cart.php" method="post" class="m-0">
                                        <button type="submit" name="checkout" class="btn btn-success btn-lg">Proceed to Checkout</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
    <!--================End Cart Area =================-->





<?php

include './footer.php';
?>
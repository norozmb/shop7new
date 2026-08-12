<?php
// include './header.php';
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="./img/bannerimg/logo.PNG">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Sign up page</title>
    <!--
		CSS
		============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php
    include "./admin/config.php";
    $msg = "";
    $msg_type = "success";
    if (isset($_POST['mybtn'])) {

        $name = mysqli_real_escape_string($con, trim($_POST['name']));
        $email = mysqli_real_escape_string($con, trim($_POST['email']));
        $raw_pwd = $_POST['pwd'];
        $pwd = md5($raw_pwd);
        $status = "active";

        if (empty($name) || empty($email) || empty($raw_pwd)) {
            $msg = "All fields are required.";
            $msg_type = "danger";
        } else {
            // Check if email already exists
            $check_query = "SELECT * FROM user1 WHERE email = '$email'";
            $check_res = mysqli_query($con, $check_query);
            if ($check_res && mysqli_num_rows($check_res) > 0) {
                $msg = "An account with this email already exists. Please login instead.";
                $msg_type = "warning";
            } else {
                $query = "INSERT INTO user1 (name, email, pwd, status) VALUES ('$name', '$email', '$pwd', '$status')";
                $result = mysqli_query($con, $query);
                if ($result) {
                    $msg = "Account created successfully! You can now <a href='login.php' class='alert-link'>Login here</a>.";
                    $msg_type = "success";
                } else {
                    $msg = "Error registering user: " . mysqli_error($con);
                    $msg_type = "danger";
                }
            }
        }
    }
    ?>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center my-2 text-white">Create an Account</h3>
                    </div>
                    <div class="card-body p-4">
                        <?php if (!empty($msg)) : ?>
                            <div class="alert alert-<?php echo $msg_type; ?> alert-dismissible fade show" role="alert">
                                <?php echo $msg; ?>
                            </div>
                        <?php endif; ?>
                        
                        <form action="signup.php" method="post">
                            <div class="form-group mb-3">
                                <label class="form-label font-weight-bold">Full Name</label>
                                <input type="text" class="form-control" placeholder="Enter your full name" name="name" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label font-weight-bold">Email Address</label>
                                <input type="email" class="form-control" placeholder="Enter your email" name="email" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label font-weight-bold">Password</label>
                                <input type="password" class="form-control" placeholder="Enter password" name="pwd" required>
                            </div>
                            <div class="form-group mt-4">
                                <input type="submit" value="Register Now" name="mybtn" class="btn btn-primary btn-block py-2">
                            </div>
                            <div class="text-center mt-3">
                                Already have an account? <a href="./login.php" class="text-primary font-weight-bold">Login Here</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
<?php
// include './footer.php';
?>
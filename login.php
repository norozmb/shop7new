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
	<title>Login</title>
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
    include './admin/config.php';
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Redirect if already logged in
    if (isset($_SESSION['name'])) {
        echo "<script>window.location.href='index.php';</script>";
        exit;
    }

    $login_error = "";
    if (isset($_POST['btnsub'])) {
      $email =  mysqli_real_escape_string($con, trim($_POST['Email']));
      $raw_pwd = $_POST['pwd'];
      $pwd = md5($raw_pwd);
      
      $query = "SELECT * FROM user1 WHERE Email = '$email' AND pwd = '$pwd'";
      $result = mysqli_query($con, $query);
      if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $_SESSION['name'] = $data['name'];
        $_SESSION['email'] = $data['email'];
        echo "<script>window.location.assign('index.php');</script>";
        exit;
      } else {
        $login_error = "Invalid Email or Password. Please try again.";
      }
    }
    ?>

   <div class="container contner my-5">
     <div class="row justify-content-center">
       <div class="col-lg-6 col-md-8 col-sm-10">
         <form action="login.php" method="post">
           <div class="card shadow-lg border-0 rounded-lg mt-5">
             <div class="card-header bg-primary text-white">
               <h3 class="text-center my-2 text-white">Sound Museo Login</h3>
             </div>
             <div class="card-body p-4">
                 <?php if (!empty($login_error)) : ?>
                   <div class="alert alert-danger alert-dismissible fade show" role="alert">
                     <?php echo htmlspecialchars($login_error); ?>
                   </div>
                 <?php endif; ?>

                 <div class="mb-3">
                   <label for="username" class="form-label font-weight-bold">Email Address</label>
                   <input type="email" class="form-control" id="username" placeholder="Enter Email" name="Email" required>
                 </div>
                 <div class="mb-3">
                   <label for="password" class="form-label font-weight-bold">Password</label>
                   <input type="password" class="form-control" id="password" placeholder="Enter your password" name="pwd" required>
                 </div>
                 <div class="mb-3 d-flex justify-content-between align-items-center">
                   <div>
                     Don't have an account? <a href="./signup.php" class="text-primary font-weight-bold">Sign Up Here</a>
                   </div>
                 </div>
                 <div class="text-center mt-4">
                   <button type="submit" name="btnsub" class="btn btn-primary btn-block py-2">Login</button>
                 </div>
             </div>
           </div>
         </form>
       </div>
     </div>
   </div>


   <?php
    // include './footer.php';
    ?>

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
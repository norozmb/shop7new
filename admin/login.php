<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Title</title>
</head>
<body>

<?php
    include './config.php';
    session_start();
    if (isset($_POST['btnsub'])) {
      $email =  mysqli_real_escape_string($con, $_POST['Email']);
      $pwd = mysqli_real_escape_string($con, md5($_POST['pwd']));
      $query = "SELECT * FROM user1 WHERE Email = '$email' and pwd = '$pwd'";
      $result = mysqli_query($con, $query);
      $data = mysqli_fetch_assoc($result);
      $row = mysqli_num_rows($result);
      if ($row > 0) {
        $_SESSION['name'] = $data['name'];
        //  ("location:index.php");
        echo "<script>window.location.assign('index.php');</script>";
      } else {
        echo "username and password not match";
      }  
    }
    ?>

   <div class="container contner">
     <div class="row justify-content-center">
       <div class="col-lg-6 col-md-8 col-sm-10">
         <form action="" method="post">
           <div class="card mt-5">
             <div class="card-header">
               <h3 class="text-center text-success">Login</h3>
             </div>
             <div class="card-body">
               <form>
                 <div class="mb-3">
                   <label for="username" class="form-label">Username</label>
                   <input type="text" class="form-control" id="username" placeholder="Enter Email" name="Email">
                 </div>
                 <div class="mb-3">
                   <label for="password" class="form-label">Password</label>
                   <input type="password" class="form-control" id="password" placeholder="Enter your password" name="pwd">
                 </div>
                 <div class="mb-3 form-check">
                   <input type="checkbox" class="form-check-input" id="rememberMe">
                   <label class="form-check-label" for="rememberMe">Remember me</label><br><br>
                   <!-- <button type="button" class="btn-outline-info "> -->
                   
                   <!-- SignUp here please <br> <a href="./signup.php">SignUp</a> -->
                   
                   <!-- </button> -->
                 </div>
                 <div class="text-center">
                   <button type="submit" name="btnsub" class="btn btn-success">Login</button>
                 </div>
             </div>
           </div>
         </form>
       </div>
     </div>
   </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>
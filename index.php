<?php
include './header.php';
?>
<?php
?>
<?php
if (isset($_GET['pid']) && isset($_GET['pprice'])) {
    $pid = mysqli_real_escape_string($con, $_GET['pid']);
    $pprice = mysqli_real_escape_string($con, $_GET['pprice']);
    $ipaddress = mysqli_real_escape_string($con, $_SERVER['REMOTE_ADDR']);
    $query = "INSERT INTO tblcart (pid, pprice, ipaddress) VALUES ('$pid', '$pprice', '$ipaddress')";
    $result = mysqli_query($con, $query);
    echo "<script> window.location.assign('./index.php?added=1') </script>";
    exit;
}
?>
<link rel="stylesheet" href="https://dukan24h.com/public/d24h/userend/assets/css/stylenew.css">
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section marog">
      <div class="slider_bg_box">
        <img src="./img/baner12.jpg" alt="" class="" >
      </div>
      <div id="customCarousel1" class="carousel slide markg" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container markg">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                  <h1 class="text-light">
                      Welcome 
                    </h1>
                    <p>
                      Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus quidem maiores perspiciatis, illo maxime voluptatem a itaque suscipit.
                    </p>
                    <div class="btn-box">
                      <a href="./contact.php" class="btn1">
                        Contact Us
                      </a>
                      <a href="./about_us.php" class="btn2">
                        About Us
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container markg">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <h1 class="text-light">
                      Our Website
                    </h1>
                    <p>
                      Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus quidem maiores perspiciatis, illo maxime voluptatem a itaque suscipit.
                    </p>
                    <div class="btn-box">
                      <a href="./contact.php" class="btn1">
                        Contact Us
                      </a>
                      <a href="./about_us.php" class="btn2">
                        About Us
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container markg">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <h1 class="text-light">
                      Visit Best Mics
                    </h1>
                    <p>
                      Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus quidem maiores perspiciatis, illo maxime voluptatem a itaque suscipit.
                    </p>
                    <div class="btn-box">
                      <a href="./contact.php" class="btn1">
                        Contact Us
                      </a>
                      <a href="./about_us.php" class="btn2">
                        About Us
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container markg">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <h1 class="text-light">
                      Best Quality Of Mics
                    </h1>
                    <p>
                      Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus quidem maiores perspiciatis, illo maxime voluptatem a itaque suscipit.
                    </p>
                    <div class="btn-box">
                      <a href="./contact.php" class="btn1">
                        Contact Us
                      </a>
                      <a href="./about_us.php" class="btn2">
                        About Us
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container markg">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <h1 class="text-light">
                      free shipping
                    </h1>
                    <p>
                      Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus quidem maiores perspiciatis, illo maxime voluptatem a itaque suscipit.
                    </p>
                    <div class="btn-box">
                      <a href="./contact.php" class="btn1">
                        Contact Us
                      </a>
                      <a href="./about_us.php" class="btn2">
                        About Us
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <ol class="carousel-indicators">
          <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
          <li data-target="#customCarousel1" data-slide-to="1"></li>
          <li data-target="#customCarousel1" data-slide-to="2"></li>
          <li data-target="#customCarousel1" data-slide-to="3"></li>
          <li data-target="#customCarousel1" data-slide-to="4"></li>
        </ol>
      </div>

    </section>
    <!-- end slider section -->
  
  <section class="service_section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="box ">
            <div class="img-box">
              <img src="images/feature-1.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Fast Delivery
              </h5>
              <p>
                variations of passages of Lorem Ipsum available
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="box ">
            <div class="img-box">
              <img src="images/feature-2.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Free Shiping
              </h5>
              <p>
                variations of passages of Lorem Ipsum available
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="box ">
            <div class="img-box">
              <img src="images/feature-3.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Best Quality
              </h5>
              <p>
                variations of passages of Lorem Ipsum available
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="box ">
            <div class="img-box">
              <img src="images/feature-4.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                24x7 Customer support
              </h5>
              <p>
                variations of passages of Lorem Ipsum available
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </div>

<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center mt-4 text-bold">These are our Mics</h2>
        </div>
    </div>
<!-- single Product code by me ********************** -->
<!-- Start Filter Bar -->
<div class="container">

    <!-- End Filter Bar -->
    <!-- Start Best Seller -->
    <section class="lattest-product-area pb-40 category-list">
        <div class="row">
            <?php
            // include './admin/config.php';
            $result = mysqli_query($con, 'SELECT * FROM product');
            foreach ($result as $data) {
            ?>
                <!-- single product -->
                <div class="col-lg-4 col-md-7">
                    <div class="single-product">
                        <img class="img-fluid" src="./admin/upload/<?php echo $data['product_img'] ?>" alt="">
                        <div class="product-details">
                            <h6><?php echo $data['product_name'] ?></h6>
                            <div class="price">
                                <h6>$<?php echo $data['product_price'] ?></h6>
                            </div>
                            <div class="prd-bottom">

                                <a href="./index.php?pid=<?php echo $data['id']; ?>&pprice=<?php echo $data['product_price']; ?>" class="social-info">
                                    <span class="ti-bag"></span>
                                    <p class="hover-text">add to bag</p>
                                </a>

                                <a href="./singleProduct.php?pid=<?php echo $data['id'] ?>" class="social-info">
                                    <span class="lnr lnr-move"></span>
                                    <p class="hover-text">view more</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
            <!-- single product -->
            <div class="container mt-5">
                <div class="row">
                    <div class="col">
                        <h2 class="text-center">MicMuseo: Amplify Your Voice Connect with the World</h2>
                        <h6 class="mb-3">
Welcome to Mic Museo, your premier online platform for amplifying your voice, connecting with a global audience, and sharing your passion for communication and expression. Our website is a haven for speakers, storytellers, and influencers of all kinds, providing a vibrant and supportive community where your voice can truly shine.

Empowering: micMuseo empowers individuals with a platform to showcase their talents, ideas, and expertise. Whether you're a public speaker, podcaster, or poet, micMuseo is your stage.

Inclusive: We believe in the power of diversity and inclusion. micMuseo embraces voices from all walks of life, celebrating the richness of human experiences and perspectives.

Engaging: Our intuitive interface ensures that you can effortlessly engage with your audience. From live broadcasts to interactive Q&A sessions, we offer a wide array of tools to keep your audience captivated.

Supportive: Join a community that values collaboration and growth. Receive constructive feedback, connect with mentors, and take advantage of resources to help you hone your skills.

Inspiring: Discover new voices and stories that will inspire you. micMuseo is a source of inspiration for anyone seeking fresh ideas, perspectives, and creative content.

Global: Break down geographical barriers and connect with people from around the world. Our platform enables you to reach an international audience, fostering global understanding and friendships.

Innovative: Stay ahead of the curve with cutting-edge features and technology. We continuously update our platform to provide you with the best tools for content creation and engagement.

Safe: Your privacy and security are paramount to us. We employ robust measures to ensure a safe and respectful online environment.

micMuseo is more than just a website; it's a community, a stage, and a catalyst for change. Join us today and discover the limitless possibilities of your voice.

Feel free to adapt and expand upon these words to fit your specific needs or to create a more detailed description of micMuseo.






</h6>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Best Seller -->
    <section class="mike-deal-area mt-5">
        <div class="container">
            <div class="row justify-content-left align-items-center">
                <div class="col-lg-6 no-padding mike-left">
                    <div class="row clock_sec clockdiv" id="clockdiv">
                        <div class="col-lg-12">
                            <h1>mike Hot Deal Ends Soon!</h1>
                            <p>Who are in extremely love with eco friendly system.</p>
                        </div>
                        <div class="col-lg-12">
                            <div class="row clock-wrap">
                                <div class="col clockinner1 clockinner">
                                    <h1 class="days">150</h1>
                                    <span class="smalltext">Days</span>
                                </div>
                                <div class="col clockinner clockinner1">
                                    <h1 class="hours">23</h1>
                                    <span class="smalltext">Hours</span>
                                </div>
                                <div class="col clockinner clockinner1">
                                    <h1 class="minutes">47</h1>
                                    <span class="smalltext">Mins</span>
                                </div>
                                <div class="col clockinner clockinner1">
                                    <h1 class="seconds">59</h1>
                                    <span class="smalltext">Secs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="./category.php" class="primary-btn">Shop Now</a>
                </div>








            </div>
        </div>
    </section>
    <div class="container mt-5">
    <div class="row">
        <div class="col">
            <h1 class="text-center ">Our Special Microphones Thess Product you will get soon!</h1>
        </div>
    </div>
</div>
    <!-- Start category Area -->

    <section class="category-area">
        <div class="container">
            <div class="row justify-content-center" style="margin-top: 10px; margin-left:10px;">
                <div class="col mt-5">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="img/baner21.jpg" alt="">
                                <a href="img/baner21.jpg" class="img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">
                                            
                                        </h6>
                                    </div>
                                </a>
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-6">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="img/baner181.jpg" alt="">
                                <a href="img/baner181.jpg" class="img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">MIc 1</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="img/baner20(1).jpg" alt="">
                                <a href="img/baneer20(1).jpg" class="img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">MIc 2</h6>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="img/baner16.jpg" alt="">
                                <a href="img/baner16.jpg" class="img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">MIc 2</h6>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="img/baner17.jpg" alt="">
                                <a href="img/baner17.jpg" class="img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">MIc 3</h6>
                                    </div>
                                </a>
                            </div>
                        </div>



                        <div class="col-lg-4 col-md-6">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="img/baner23.jpg" alt="">
                                <a href="img/baner23.jpg" class="img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">MIc 4</h6>
                                    </div>
                                </a>
                            </div>
                        </div>



                        <div class="col-lg-4 col-md-6">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="img/baner25.jpg" alt="">
                                <a href="img/baner25.jpg" class="img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">MIc 5</h6>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col mt-3">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="img/baner29.jpg" alt="">
                                <a href="img/baner29.jpg" class="img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">MIc 6</h6>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 mb-5">
                            <div class="single-deal">
                                <div class="overlay"></div>
                                <img class="img-fluid w-100" src="img/baner31.jpg" alt="">
                                <a href="img/baner31.jpg" class="img-pop-up" target="_blank">
                                    <div class="deal-details">
                                        <h6 class="deal-title">MIc 7</h6>
                                    </div>
                                </a>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php
include './footer.php';
?>
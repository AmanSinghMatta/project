<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: index.php");
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--aos-->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/homepage.css">

    <title>Project2</title>

</head>

<body>
    <div>
        <!--Navigation-->
        <nav class="navbar navbar-expand-lg sticky-top" style="background-color: black;">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active mx-2 my-2">
                        <?php echo '<a style="color: white;" href="homepage.php">Home</a>' ?><span class="sr-only">(current)</span>
                    </li>
                    <li class="nav-item mx-2 my-2">
                        <?php echo '<a style="color: white;" href="aboutus.php">About us</a>' ?>
                    </li>
                    <li class="nav-item mx-2 my-2">
                        <?php echo '<a style="color: white;" href="contact.php">Contact us</a>' ?>
                    </li>
                    <li class="nav-item mx-2 my-2">
                        <h5 style="color: white;"><?php echo "Welcome " . $_SESSION['username'] ?>!</h5>
                    </li>
                </ul>
                <li class="nav-item">
                    <?php echo '<a style="color: white;" class="btn btn-danger" href="logout.php">Logout</a>;' ?>
                </li>
            </div>
        </nav>

        <!--carousel-->
        <div class="carousel slide" data-aos="fade-down" data-aos-delay="50" data-aos-offset="0" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false" data-ride="carousel" id="carouselExampleIndicators">
            <ol class="carousel-indicators">
                <li class="active" data-slide-to="0" data-target="#carouselExampleIndicators"></li>
                <li data-slide-to="1" data-target="#carouselExampleIndicators"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img alt="First slide" class="d-block w-100" src="https://images.pexels.com/photos/5709665/pexels-photo-5709665.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
                    <div class="carousel-caption d-none d-md-block">
                        <div>
                            <h5>Explore your true style</h5>
                        </div>
                        <p>Quality never goes out of style.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img alt="Second slide" style="height: 600; background-position: center; background-size: cover; background-repeat: no-repeat;" class="d-block w-100" src="images/532651.jpg">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Find your power</h5>
                        <p>Styles that unleash the superhero in you .</p>
                    </div>
                </div>
            </div><a class="carousel-control-prev" data-slide="prev" href="#carouselExampleIndicators" role="button"><span aria-hidden="true" class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" data-slide="next" href="#carouselExampleIndicators" role="button"><span aria-hidden="true" class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
        </div>


        <div class="row my-3">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <div class="card card-scale shadow-0 border-0 text-white text-hover-gray-900 overlay-hover-light text-center" data-aos="fade-right" data-aos-delay="50" data-aos-offset="0" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false"><img class="card-img img-scale" src="https://d19m59y37dris4.cloudfront.net/varkala/1-2-1/img/product/category-women.jpg" alt="Card image">
                    <div class="d-flex align-items-center card-img-overlay">
                        <div class="w-100 py-3">
                            <h4 class="display-4 font-weight-bold mb-4">Women</h4>
                            <a class="btn btn-info" href="women.php">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-scale shadow-0 border-0 text-white text-hover-gray-900 overlay-hover-light text-center" data-aos="fade-left" data-aos-delay="50" data-aos-offset="0" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false"><img class="img-responsive" src="https://d19m59y37dris4.cloudfront.net/varkala/1-2-1/img/product/category-men.jpg" alt="Card image">
                    <div class="d-flex align-items-center card-img-overlay">
                        <div class="w-100 py-3">
                            <h4 class="display-4 font-weight-bold mb-4">Men</h4>
                            <a class="btn btn-info" href="men.php">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-md-9 text-center mx-auto" data-aos="fade-up" data-aos-delay="50" data-aos-offset="0" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false">
                <h2 class="display-3 mb-5">Color of the Month</h2>
                <p class="lead text-muted mb-6">When was the last time you played the colour game that we all loved in our childhood? Well,
                    we believe that we are always children at heart and for all the children within us,
                    we run colour of the month.
                    Color of the month is a vibe that we feel every month.
                    To communicate that to our consumers and creating the mood for it is our sole purpose.
                    Our palette refreshes every month and every color has a story to tell. Stay tuned....</p>
            </div>
        </div>


        <div class="mx-0 row my-3">
            <div class="mb-10px px-5px col-md-6">
                <div class="border-0 text-white text-center card" data-aos="fade-right" data-aos-delay="50" data-aos-offset="0" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false"><img src="https://images.pexels.com/photos/3360204/pexels-photo-3360204.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="New arrivals" class="card-img">
                    <div class="d-flex align-items-center card-img-overlay">
                        <div class="w-100 py-3">
                            <h4 class="display-4 mb-4">The must have Summer Collection</h4>
                            <a class="btn btn-info" href="wfh.php">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-10px px-5px col-md-6">
                <div class="border-0 text-white text-center card" data-aos="fade-down" data-aos-delay="50" data-aos-offset="0" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false"><img src="https://images.pexels.com/photos/826380/pexels-photo-826380.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Jackets" class="card-img">
                    <div class="d-flex align-items-center card-img-overlay">
                        <div class="w-100 py-3">
                            <h4 class="display-3 mb-4">Jackets</h4>
                            <a class="btn btn-info" href="jackets.php">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="mb-10px px-5px col-md-9 mx-5 my-3">
                <div class="border-0 text-black text-center card" data-aos="fade-up" data-aos-delay="50" data-aos-offset="0" data-aos-easing="ease-in-out" data-aos-mirror="true" data-aos-once="false"><img src="https://images.pexels.com/photos/6787007/pexels-photo-6787007.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Lookbook" class="card-img">
                    <div class="d-flex align-items-center card-img-overlay">
                        <div class="w-100 py-3">
                            <h4 class="display-3 mb-4">T-Shirts</h4>
                            <a class="btn btn-info" href="tshirt.php">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="background-color: dimgray;">
            <!-- Footer -->
            <footer class="bd-footer text-muted">
                <div class="container-fluid p-3 p-md-5">
                    <ul class="bd-footer-links">
                        <li><a style="color: white;" href="aboutus.php">About</a></li>
                        <li><a style="color: white;" href="TermsConditions.php">Terms & Conditions </li>
                        <p>Designed and built by Aman Singh
                        </p>
                    </ul>

                </div>
            </footer>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" 2 integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" 3 crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
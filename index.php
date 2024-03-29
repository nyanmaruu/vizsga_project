<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Poppins&family=Roboto&family=Special+Elite&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Ladmaczi Linda vizsga project</title>
</head>

<body>

<div class="alert alert-warning" role="alert" id="errorHandler"></div>


    <!-- navbar start -->
    <nav id="hideNavbar" class="navbar navbar-expand-lg navbar-light container-fluid ">

        <div class="row nav_row">
            <div class="col-8 pt-3">
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a id="hide_brand" class="navbar-brand" href="?page=index">
                        SKINCARE
                    </a>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="?page=productsPage&categoryId=all">products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="?page=contactPage">contact</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-4 nav-div pt-3 d-flex align-items-center justify-content-end">
    <!-- navbar icons start -->
    <?php
    if (isset($_SESSION["userid"]) && $_SESSION["usertypeid"] == 1) {
    ?>
        <li><a id="username_display" href="./Admin_Pages/admin.php">
            <?php echo $_SESSION["useruid"] ?> 
            admin</a>
        </li>
    <?php
    } else if(isset($_SESSION["userid"]) && $_SESSION["usertypeid"] == 0) {
    ?>
        <li class="d-flex align-items-center">
            <a id="username_display" href="http://localhost/vizsga_project/Profile_Pages/profile.php"><?php echo $_SESSION["useruid"] ?></a>
            
        </li>
    <?php
    } else {
    ?>
        <li class="nav-item nav-icons ">
            <a class="nav-link" href="?page=signupPage"><i class="bi bi-person-fill"></i></a>
        </li>
    <?php
    }
    ?>
    <li class="nav-item nav-icons">
        <a class="nav-link" href="#" id="modal" data-toggle="modal" data-target="#modal_aside_right"><i class="bi bi-basket3-fill"></i></a>
    </li>
    <!-- navbar icons end -->
</div>
        </div>
    </nav>
    <!-- navbar end -->

    <!-- carousal start -->
    <div id="hideCarousel">

        <div class="col-12">
            <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel">
                <div class="carousel-inner" id="hideCarousel">
                    <div class="carousel-item active">
                        <img src="pictures/landing_img.png" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
        </div>





        
       <!-- main category display start -->
       <div  id="main-category-landing" class="container">
        <h2 class="mt-5" id="best_sellers_text">shop by</h2>
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 row-cols-lg-8 row-cols-xl-5  w-100 justify-content-center mx-auto">

                <div class="col  mb-2 ">
                    <div class="card border-0 ">
                        <img id="main-category-img" src="pictures/tonymoly_cleanser.webp" class="card-img-top" alt="COSRX-snail">
                        <div class="card-body text-center mt-2">
                            <a id="main-category-img-link" href="?page=productsPage&categoryId=2">CLEANSER</a>
                        </div>
                    </div>
                </div>

                <div class="col  mb-2 ">
                    <div class="card border-0 ">
                        <img id="main-category-img" src="pictures/klairs_cream.webp" class="card-img-top" alt="COSRX-snail" >
                        <div class="card-body text-center mt-2">
                            <a id="main-category-img-link" href="?page=productsPage&categoryId=2">CREAM</a>
                        </div>
                    </div>
                </div>

                <div class="col  mb-2 ">
                    <div class="card border-0">
                        <img id="main-category-img" src="pictures/etude_toner.webp" class="card-img-top" alt="COSRX-snail">
                        <div class="card-body text-center mt-2">
                            <a id="main-category-img-link" href="?page=productsPage&categoryId=3">TONER</a>
                        </div>
                    </div>
                </div>

                <div class="col  mb-2 ">
                    <div class="card border-0">
                        <img id="main-category-img" src="pictures/gooddays_serum.webp" class="card-img-top" alt="COSRX-snail">
                        <div class="card-body text-center mt-2">
                            <a id="main-category-img-link" href="?page=productsPage&categoryId=4">SERUM</a>
                        </div>
                    </div>
                </div>

                <div class="col  mb-2 ">
                    <div class="card border-0">
                        <img id="main-category-img" src="pictures/missha_essence.webp" class="card-img-top" alt="COSRX-snail">
                        <div class="card-body text-center mt-2">
                            <a id="main-category-img-link" href="?page=productsPage&categoryId=5">ESSENCE</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- main category display end -->
        <!-- best sellers cards start -->
        
        <div class="container">
        <h2 class="mt-5" id="best_sellers_text">FEATURED PRODUCTS</h2>
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 row-cols-lg-8 row-cols-xl-5  w-100 justify-content-center mx-auto mt-5">
            

                <div class="col">
                    <div class="card border-0">
                        <img src="pictures/klairs_toner.webp" class="card-img-top" alt="COSRX-snail">
                        <div class="card-body">
                            <p class="card-text">KLAIRS</p>
                            <hr>
                            <p class="card-text">Supple Preparation Toner</p>
                           
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0 ">
                        <img src="pictures/banila_cleanser.webp" class="card-img-top" alt="COSRX-snail">
                        <div class="card-body">
                            <p class="card-text">BANILA CO</p>
                            <hr>
                            <p class="card-text">Clean It Zero Cleansing</p>
                            
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0">
                        <img src="pictures/gooddays_serum.webp" class="card-img-top" alt="COSRX-snail">
                        <div class="card-body">
                            <p class="card-text">GOOD DAYS FOR ALL</p>
                            <hr>
                            <p class="card-text">C’s The Day Serum</p>
                            
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card border-0">
                        <img src="pictures/neogen_serum.webp" class="card-img-top" alt="COSRX-snail">
                        <div class="card-body">
                            <p class="card-text">NEOGEN</p>
                            <hr>
                            <p class="card-text">Real Ferment Micro Serum</p>
                           
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- best sellers cards end -->
    </div>
    <!-- carousal end -->

    <div class="container" id="productsNav" style="display: none;">
        <div class="row">
            <ul class="nav navbar-dark bg-dark justify-content-center fixed-left">

                <li class="nav-item">
                    <a class="nav-link active" href="?page=productsPage&categoryId=all">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=productsPage&categoryId=1">CLEANSER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=productsPage&categoryId=2">CREAM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=productsPage&categoryId=3">TONER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=productsPage&categoryId=4">SERUM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=productsPage&categoryId=5">ESSENCE</a>
                </li>

            </ul>
        </div>
    </div>

    <!-- modal.// -->
    <div id="modal_aside_right" class="modal fixed-left fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-aside" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <i id="modal_close_button" class="bi bi-x-circle" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </i>
                </div>
                <div class="modal-body" id="showModalProducts">

                </div>
                <!--modal subtotal display start -->
                <h5 class="mx-auto">Subtotal: <span id="subtotal"></span> </h5>
                <!--modal subtotal display end -->
                <div class="modal-footer justify-content-center mb-5">

                    <br>
                    <a href="?page=checkoutPage" type="button" class="btn btn-dark btn-lg rounded-0">CHECKOUT</a>
                </div>

            </div>
        </div>
    </div>
    <!-- modal.// -->





    <?php
    if (isset($_GET["page"])) {
        switch ($_GET["page"]) {

            case 'productsPage':
                include './Products_Pages/Products.php';
                break;
            case 'contactPage':
                include 'Contact.php';
                break;
            case 'checkoutPage':
                include 'Checkout.php';
                break;
            case 'productPage':
                include 'ProductDisplay.php';
                break;
            case 'signupPage':
                include 'SignupPage.php';
                break;
        }
    }
    ?>

    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>
<?php
session_start();
?>

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

    
    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg navbar-light container-fluid ">

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

            <div class="col-4 nav-div pt-3">
                
                <!-- navbar icons start -->
                <li class="nav-item nav-icons ">
                    <a class="nav-link" href=""><i class="bi bi-person-fill"></i></a>
                </li>
                <li class="nav-item nav-icons ">
                    <a class="nav-link" href="#" id="modal" data-toggle="modal" data-target="#modal_aside_right "><i class="bi bi-basket3-fill"></i></a>
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
                        <img src="pictures/Untitled-3.png" class="d-block w-100" alt="...">
                    </div>
                </div>
            </div>
        </div>
        
       


        <p id="best_sellers_text">BEST SELLERS</p>
        <!-- best sellers cards start -->
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-sm-6 col-xs-6 mb-4">
                    <div class="card border-0">
                        <img src="pictures/klairs_toner.webp" class="card-img-top" alt="COSRX-snail">
                        <div class="card-body">
                            <p class="card-text">KLAIRS</p>
                            <hr>
                            <p class="card-text">Supple Preparation Toner</p>
                            <button class="btn btn-dark">Add to bag</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-xs-6 mb-4">
                    <div class="card border-0 ">
                        <img src="pictures/banila_cleanser.webp" class="card-img-top" alt="COSRX-snail">
                        <div class="card-body">
                            <p class="card-text">BANILA CO</p>
                            <hr>
                            <p class="card-text">Clean It Zero Cleansing</p>
                            <button class="btn btn-dark">Add to bag</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-xs-6 mb-4">
                    <div class="card border-0">
                        <img src="pictures/gooddays_serum.webp" class="card-img-top" alt="COSRX-snail">
                        <div class="card-body">
                            <p class="card-text">GOOD DAYS FOR ALL</p>
                            <hr>
                            <p class="card-text">C’s The Day Serum</p>
                            <button class="btn btn-dark">Add to bag</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mb-4 col-sm-6 col-xs-6">
                    <div class="card border-0">
                        <img src="pictures/neogen_serum.webp" class="card-img-top" alt="COSRX-snail">
                        <div class="card-body">
                            <p class="card-text">NEOGEN</p>
                            <hr>
                            <p class="card-text">Real Ferment Micro Serum</p>
                            <button class="btn btn-dark">Add to bag</button>
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
            <ul class="nav navbar-dark bg-dark justify-content-center">

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
                    <p>There are no items in your cart</p>
                </div>
                
                <p class="mx-auto">Subtotal: $</p>
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
            
        }
    }
    ?>

    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    

</body>

</html>

<?php
session_start();

require "Querys.php";
require "./Classes/Session_Cart.php";
$querys = new Querys();
$cartClass = new Session_Cart();



if (isset($_POST["action"]) && $_POST["action"] == "getAllProducts" && isset($_POST['categoryId'])) {
    $output = '';
    $data = $querys->getCategoryProducts($_POST['categoryId']);
    foreach ($data as $row) {
        $output .=
            '
            
            <div class="col-6 col-md-4 col-lg-3 mb-4">
            <div class="card border-0 mt-5">
            
                <div class="card-header border-0" >
                <a href="?page=productPage&productId=' . $row["id"] . '">
                 <img class="card-image  h-200 border-0 "src="' . $row["image"] . '" alt="' . $row["name"] . '" />
                 </a>
                </div>

                <div class="card-body">
                    <h6 class="border-0 mb-0"><strong>' . $row["brand"] . '</strong></h6>
                    <hr>
                    <p class="border-0">' . $row["name"] . '</p>
                    <div class="card-footer">
                    
                    <p class="">' . $row["price"] . ' $</p>
                    </div>
                </div>  
       
            </div>
            </div>
            ';
    }
    echo $output;
}

if (isset($_POST["action"]) && $_POST["action"] == "getSearchResult") {
    $output = '';
    $data = $querys->getSearchResult();
    foreach ($data as $row) {
        $output .=
        '
            
            <div class="col-6 col-md-4 col-lg-3 mb-4">
            <div class="card border-0 mt-5">
            
                <div class="card-header border-0" >
                <a href="?page=productPage&productId=' . $row["id"] . '">
                 <img class="card-image  h-200 border-0 "src="' . $row["image"] . '" alt="' . $row["name"] . '" />
                 </a>
                </div>

                <div class="card-body">
                    <h6 class="border-0 mb-0"><strong>' . $row["brand"] . '</strong></h6>
                    <hr>
                    <p class="border-0">' . $row["name"] . '</p>
                    <div class="card-footer">
                    
                    <p class="">' . $row["price"] . ' $</p>
                    </div>
                </div>  
       
            </div>
            </div>
            ';
    }
    echo $output;
}

if (isset($_POST["action"]) && $_POST["action"] == "getProduct") {

    $output = '';
    $data = $querys->getProduct($_POST["productId"]);
   


    foreach ($data as $row) {
        $output .=
            '
            <div id="pdp-banner" class="carousel slide carousel-fade" data-bs-ride="carousel">
                
                <div class="carousel-inner">
                    <div id="banner-text" class="carousel-item active text-center data-bs-interval="10000"">
                    <p class="mt-1">FREE SHIPPING!</p>
                    </div>
                    <div id="banner-text" class="carousel-item  text-center data-bs-interval="2000"">
                        <p class="mt-1">SIGN IN TO GET A 10% DISCOUNT!</p>
                    </div>
                    <div id="banner-text" class="carousel-item text-center data-bs-interval="2000"">
                    <p class="mt-1">FREE SAMPLE!</p>
                    </div>
                </div>
        
                </div>

                <div class="container">
                    <div class="row">   
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 justify-content-center d-flex">
                            <img class="pdimg shadow-lg " src="' . $row["image"] . '" alt="' . $row["name"] . '" "/>
                        </div>

                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 m-2">
                            <h6 class="pdp-brand"><strong>' . $row["brand"] . '</strong></h6>
                            <p>' . $row["name"] . '</p>
                            <p>' . $row["price"] . ' $</p>
                            
                            <div>
                                <div class="btn-group col-12 col-sm-8 col-md-8 col-lg-12 mb-5" role="group" aria-label="Basic example">
                                    <button type="button" class="btn rounded-0" 
                                    onclick="increaseValue()">+</button>
                                    <input id="inputQty" type="text" class="btn rounded-0" min="1" value="1"></input>
                                    <button type="button" class="btn rounded-0" 
                                    onclick="decreaseValue()">-</button>
                                    <button onclick="addToCart()" type="button" class="btn btn-dark rounded-0 col-10">Add to cart</button>
                                </div>
                            
                            </div>
                            <p>' . $row["description"] . '</p>
                    </div>
                </div>
            </div>
  
            ';
    }
    echo $output;
}

if (isset($_POST["action"]) && $_POST["action"] == "addToCartModal") {

    $output = '';
    $product = $querys->addToModal($_POST["productId"]);
    
    $cartClass->setCartSession($product, $_POST['qty']);
    $cart = $cartClass->getCartSession();
    


    foreach ($cart as $row) {

        $output .=
            '
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <img class="w-100" src="' . $row["image"] . ' " "/>
                </div>
                <div class="col-md-8">
                    <p><strong>' . $row["name"] . '</strong> </p>
                    <div>
                        <label>
                            <input type="text" name="quantity" value="' . $row["quantity"] . '" min="1" class="qty" readonly></input>
                            <span class="price"> $' . $row["price"] . ' </span>
                            <i class="bi bi-trash"  onclick="removeFromCart(' . $row["id"] . ')" type="button"></i>
                            
                        </label>
                    </div>
                    
                </div>
            </div>
        </div>
        <hr>
        ';
    }
    echo $output;
}

if (isset($_POST["action"]) && $_POST["action"] == "getCartData") {

    $output = '';

    $cart = $cartClass->getCartSession();


    foreach ($cart as $row) {
        $output .=
            '
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <img class="w-100" src="' . $row["image"] . ' " "/>
                </div>
                <div class="col-md-8">
                    <p><strong>' . $row["name"] . '</strong> </p>
                    <div>
                        <label>
                            <input type="text" name="quantity" value="' . $row["quantity"] . '" min="1" class="qty" readonly></input>
                            <span class="price"> $' . $row["price"] . ' </span>
                            <i class="bi bi-trash"  onclick="removeFromCart(' . $row["id"] . ')" type="button"></i>
                           
                        </label>
                    </div>
                   
                </div>
            </div>
        </div>
        <hr>
        ';
    }
    echo $output;
}

if (isset($_POST["action"]) && $_POST["action"] == "removeCartData") {
    $output = '';

    $cart = $cartClass->removeProductSession($_POST['productId']);


    foreach ($cart as $row) {
        $output .=
            '
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <img class="w-100" src="' . $row["image"] . ' " "/>
                </div>
                <div class="col-md-8">
                    <p><strong>' . $row["name"] . '</strong> </p>
                    <div>
                        <label>
                            <input type="text" name="quantity" value="' . $row["quantity"] . '" min="1" class="qty" readonly></input>
                            <span class="price"> $' . $row["price"] . ' </span>
                            <i class="bi bi-trash"  onclick="removeFromCart(' . $row["id"] . ')" type="button"></i>
                            
                        </label>
                    </div>
                   
                </div>
            </div>
        </div>
        <hr>
        ';
    }
    echo $output;
}



// if (isset($_POST["action"]) && $_POST["action"]  == "updateQuantity") {

//     $output = '';

//     $cart = $cartClass->updateProductQuantitySession();




//     foreach ($cart as $row) {

//         $output .=
//         '
//         <div class="container-fluid">
//             <div class="row">
//                 <div class="col-md-4">
//                     <img class="w-100" src="' . $row["image"] .' " "/>
//                 </div>
//                 <div class="col-md-8">
//                     <p><strong>' . $row["name"] . '</strong> </p>

//                     <div>
//                         <label>
//                             <input type="text" name="quantity" value="'.$row["quantity"].'" min="1" class="qty" readonly></input>
//                             <span class="price"> $' . $row["price"] . ' </span>
//                             <i class="bi bi-trash"  onclick="removeFromCart('.$row["id"].')" type="button"></i>

//                         </label>
//                     </div>

//                 </div>
//             </div>
//         </div>
//         <hr>
//         ';
//     } 
//     echo $output;
// }

if (isset($_POST["action"]) && $_POST["action"] == "addToCheckout" ) {

    $output = '';
    $cart = $cartClass->getCartSession();
    
    foreach ($cart as $row) {

        $output .=
            '
            <ul class="list-group mb-3 sticky-top rounded-0">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                
                    <div>
                        <img id="checkoutImg" src="' . $row["image"] . ' " ">
                            <span class=" position-absolute top-1 translate-middle rounded-circle badge bg-danger">
                            ' . $row['quantity'] . '</span>
                        </img>
                       
                        <span class="my-0 p-2">' . $row['name'] . '</span>
                     
                    </div>
                    <span class="text-muted">$' . $row['price'] . '</span>
                    <i class="bi bi-trash"  onclick="removeFromCheckout(' . $row["id"] . ')" type="button"></i>
                    
                 </li>
            </ul>
        ';
    }
    echo $output;
}

if (isset($_POST["action"]) && $_POST["action"] == "removeCheckoutData") {
    $output = '';

    $cart = $cartClass->removeProductSession($_POST['productId']);


}



if (isset($_POST["action"]) && $_POST["action"] == "getSubtotal") {
    $subtotal = $cartClass->getSubtotal();
    $output = '';
   
        $output .=
            '
         $'.$subtotal.'
        ';
    
    echo $output;
}




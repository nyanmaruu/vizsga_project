
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
                    <div id="banner-text" class="carousel-item active text-center data-bs-interval="500"">
                    <p class="mt-1">FREE SHIPPING!</p>
                    </div>
                    <div id="banner-text" class="carousel-item  text-center data-bs-interval="500"">
                        <p class="mt-1">SIGN IN TO GET A 10% DISCOUNT!</p>
                    </div>
                    <div id="banner-text" class="carousel-item text-center data-bs-interval="500"">
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


function test($email, $firstname, $lastName, $zip, $city, $adress, $phone, $ccName, $ccNumber, $ccExpiration, $ccCvv ){
    $querys = new Querys();
    $querys->contactInformationAddToDb($email, $firstname, $lastName, $zip, $city, $adress, $phone, $ccName, $ccNumber, $ccExpiration, $ccCvv );

       
}
if (isset($_POST["action"]) && $_POST["action"] == "completedOrder" 
 ) {
        test(
            $_POST['emailValue'],
            $_POST['firstNameValue'],
            $_POST['lastNameValue'],
            $_POST['zipValue'], 
            $_POST['cityValue'],  
            $_POST['adressValue'], 
            $_POST['phoneValue'],
            $_POST['ccNameValue'],
            $_POST['ccNumberValue'],
            $_POST['ccExpirationValue'],
            $_POST['ccCvvValue']);
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


if (isset($_POST["action"]) && $_POST["action"] == "profileUpdate" ) {

    $output = '';
    $querys = new Querys();
    $data = $querys->getAddresInfo(); 
    
    if(isset(($_SESSION["addressId"])) && !empty($data)) {
        foreach ($data as $row) {

            $output .=
                '
                
                <div class="row mt-2">
                <div class="col-md-6"><label class="labels">First name</label>
                    <input type="text" class="form-control" placeholder="first name" value="'.$row["firstName"].'" name="firstName">
                </div>
                <div class="col-md-6"><label class="labels">Last name</label>
                    <input type="text" class="form-control" value="'.$row["lastName"].'" placeholder="last name" name="lastName">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12"><label class="labels">Phone Number</label>
                    <input type="text" class="form-control" placeholder="enter phone number" value="'.$row["phone"].'" name="phone">
                </div>
                
                <div class="col-md-6"><label class="labels">Zip</label>
                    <input type="text" class="form-control" placeholder="enter zip" value="'.$row["zip"].'" name="zip"> 
                </div>
                <div class="col-md-6"><label class="labels">City</label>
                    <input type="text" class="form-control" placeholder="enter city" value="'.$row["city"].'" name="city">
                </div>
               
            </div>
            <div class="row mt-3">
                <div class="col-md-12"><label class="labels">Address</label>
                    <input type="text" class="form-control" placeholder="enter address" value="'.$row["adress"].'" name="address">
                </div>
                
            </div>
            <div class="mt-5 text-center">
            <a href="http://localhost/vizsga_project/?page=index" class="btn btn-dark profile-button">Back</a>
                <button class="btn btn-dark profile-button" name="profileAddressUpdate" type="submit">Update Profile</button>
            </div>
            ';
        }
    }else {
        $output .=
        '
       
        <div class="row mt-2">
        <div class="col-md-6"><label class="labels">First name</label>
            <input type="text" required class="form-control" placeholder="first name" value="" name="firstName">
        </div>
        <div class="col-md-6"><label class="labels">Last name</label>
            <input type="text" required class="form-control" value="" placeholder="last name" name="lastName">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12"><label class="labels">Phone Number</label>
            <input type="text" required class="form-control" placeholder="enter phone number" value="" name="phone">
        </div>
        
        <div class="col-md-6"><label class="labels">Zip</label>
            <input type="text" required class="form-control" placeholder="enter zip" value="" name="zip"> 
        </div>
        <div class="col-md-6"><label class="labels">City</label>
            <input type="text" required class="form-control" placeholder="enter city" value="" name="city">
        </div>
       
    </div>
    <div class="row mt-3">
        <div class="col-md-12"><label class="labels">Address</label>
            <input type="text" required class="form-control" placeholder="enter address" value="" name="address">
        </div>
        
    </div>
    <div class="mt-5 text-center">
    <a href="http://localhost/vizsga_project/?page=index" class="btn btn-dark profile-button">Back</a>
        <button class="btn btn-dark profile-button" name="profileAddress" type="submit">Save Profile</button>
    </div>
    ';
    }
    
    echo $output;
}

if (isset($_POST["action"]) && $_POST["action"] == "checkOutAddress" ) {

    $output = '';
    $querys = new Querys();
    $data = $querys->getAddresInfo(); 
    
    if(isset(($_SESSION["addressId"])) && !empty($data)) {
        foreach ($data as $row) {

            $output .=

            // if the user is logged in but has address
                '
                
                
                <div class="row">
                <div class="col-md-6 mb-3">
                  <input disabled type="text" class="form-control rounded-0" id="firstName" name="firstName" placeholder="First name" value="'.$row["firstName"].'" required="">
                  <div class="invalid-feedback"> Valid first name is required. </div>
                </div>
                <div class="col-md-6 mb-3">
                  <input disabled type="text" class="form-control rounded-0" id="lastName" name="lastName" placeholder="Last name" value="'.$row["lastName"].'" required="">
                  <div class="invalid-feedback"> Valid last name is required. </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3 mb-3">
                <input disabled type="number" class="form-control rounded-0" value="'.$row["zip"].'" rounded-0" id="zip" name="zip" placeholder="Zip code" required="">
                  <div class="invalid-feedback"> Zip code required. </div>
                </div>
                <div class="col-md-5 mb-3">
                  <input disabled type="text" value="'.$row["city"].'" class="form-control rounded-0" id="city" name="city" placeholder="City" required="">
                  <div class="invalid-feedback"> City required. </div>
                  </select>
                  <div class="invalid-feedback"> Please enter your city. </div>
                </div>
              </div>

              <div class="mb-3">
                <input disabled type="text" value="'.$row["adress"].'" class="form-control rounded-0" id="address" name="address" placeholder="1234 Main St" required="">
                <div class="invalid-feedback"> Please enter your shipping address. </div>
              </div>
              <div class="mb-3">
                <input disabled type="text" value="'.$row["phone"].'" class="form-control rounded-0" id="phone" name="phone" placeholder="Phone" required="">
                <div class="invalid-feedback"> Please enter your phone number. </div>
              </div>

              <hr class="mb-4">

              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input rounded-0" id="save-info">
                <label class="custom-control-label" for="save-info">Agree to Term & Conditions</label>
              </div>
              <hr class="mb-4">
              <h4 class="mb-3">Payment</h4>
              <div class="d-block my-3">
                <div class="custom-control custom-radio">
                  <input id="credit"  name="paymentMethod" type="radio" class="custom-control-input rounded-0" checked="" required="">
                  <label class="custom-control-label" for="credit">Credit card</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="debit" name="paymentMethod" type="radio" class="custom-control-input rounded-0" required="">
                  <label class="custom-control-label" for="debit">Debit card</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input rounded-0" required="">
                  <label class="custom-control-label" for="paypal">PayPal</label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="cc-name">Name on card</label>
                  <input  type="text" required class="form-control rounded-0" id="cc-name" name="cc-name" placeholder="Your full name as displayed in your card" >
                 
                  <div id="fullName-feedback" class="invalid-feedback"> Name on card is required </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="cc-number">Credit card number</label>
                  <input type="number" required class="form-control rounded-0" id="cc-number" name="cc-number" placeholder="" >
                  <div id="ccNumber-feedback" class="invalid-feedback"> Credit card number is required </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 mb-3">
                  <label for="cc-expiration">Expiration</label>
                  <input type="text" required class="form-control rounded-0" id="cc-expiration" name="cc-expiration" placeholder="00/00" maxlength="5">
                  <div id="ccExpiration-feedback" class="invalid-feedback"> Expiration date required </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="cc-cvv">CVV</label>
                  <input type="text" required class="form-control rounded-0" id="cc-cvv" name="cc-cvv" placeholder="" maxlength="3">
                  <div id="ccCvv-feedback" class="invalid-feedback"> Security code required </div>
                  <div id="ccCvv-feedback-justnumber" class="invalid-feedback">You can only use numbers! </div>
                </div>
              </div>
              <hr class="mb-4">
              <i class="bi bi-box-arrow-in-left"></i>
              <span><a href="javascript:history.back(1)">Continue shopping</a> </span>
              <button class="btn btn-dark btn-block rounded-0" type="submit" name="completedOrderBtn">Continue to checkout</button>
              <footer class="my-5 pt-5 text-muted text-center text-small">
                <p class="mb-1">©Skincare Co. 2023 </p>
                <ul class="list-inline">
                  <li class="list-inline-item"><a href="#">Privacy</a></li>
                  <li class="list-inline-item"><a href="#">Terms</a></li>
                  <li class="list-inline-item"><a href="#">Support</a></li>
                </ul>
              </footer>';
        }
    }else {
      // if the user is logged in but dont have address 
        $output .=
        ' 
        
        <span style="display: inline-block;">Please add your address to your account to finish the checkout!
              <a style="text-decoration: none; color: rgb(255, 0, 119);" href="http://localhost/vizsga_project/Profile_Pages/profile.php">Open profile page.</a>
            </span>';
    }
    echo $output;
}
?>


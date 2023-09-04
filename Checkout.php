<?php
require "./Classes/Session_Cart.php";
$cartClass = new Session_Cart();
?>


<div class="container-fluid ">
  <div class="row">

    <div id="checkoutCartSection" class="col-12 col-sm-12 col-md-4 order-md-2">
      <div id="checkout-feedback-display" class="alert mt-2" role="alert"></div>
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted mt-2">Your cart</span>

      </h4>
      <!-- checkout-display action start -->
      <div id="checkout-display"></div>
      <!-- checkout-display action end -->
      <div class="input-group rounded-0 mt-3 ">
        <input type="text" class="form-control rounded-0" placeholder="Promo code">
        <div class="input-group-append">
          <button type="submit" class="btn btn-secondary rounded-0">Redeem</button>
        </div>
      </div>

      <div class="mt-5">
        <table class="table">

          <tbody>
            <tr>
              <th scope="row">Subtotal</th>
              <td></td>
              <td></td>
              <!-- checkout subtotal display start -->
              <td class="checkoutSubtotal">$</td>
            </tr>
            <tr>
              <th scope="row">Shipping</th>
              <td></td>
              <td></td>
              <td>FREE</td>
            </tr>
            <tr>
              <th scope="row">Total</th>
              <td></td>
              <td></td>
              <td class="checkoutSubtotal">$</td>
              <!-- checkout subtotal display end-->
            </tr>
          </tbody>
        </table>
      </div>


    </div>



    <div class="col-12 col-sm-12 col-md-8 order-md-1 px-5 py-5 mx">

      <?php
      if (isset($_SESSION["userid"])) {
      ?>
        <div class="row">
          <div class="col-12 ">

            <h4 class="mb-3">Shipping address</h4>
            <form id="addressFormCheckout" class="needs-validation pt-1" novalidate="" action="CompletedOrder.php" method="POST">

            </form>
          </div>
        </div>
      <?php
      } else {
      ?>
        <div class="row">
          <div class="col-12">

            <span style="display: inline-block;">Please log in to your account to finish the checkout!
              <a style="text-decoration: none; color: rgb(255, 0, 119);" href="?page=signupPage">Log in.</a>
            </span>

          </div>
        </div>
        <div class="row">
          <div class="col-12 ">

            <h4 class="mb-3">Shipping address</h4>

            <form class="needs-validation pt-1" novalidate="" action="CompletedOrder.php" method="POST">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <input disabled type="text" required class="form-control rounded-0" id="firstName" name="firstName" placeholder="First name" value="" required="">
                  <div class="invalid-feedback"> Valid first name is required. </div>
                </div>
                <div class="col-md-6 mb-3">
                  <input disabled type="text" class="form-control rounded-0" id="lastName" name="lastName" placeholder="Last name" value="" required="">
                  <div class="invalid-feedback"> Valid last name is required. </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3 mb-3">
                  <input disabled type="number" class="form-control rounded-0" id="zip" name="zip" placeholder="Zip code" required="">
                  <div class="invalid-feedback"> Zip code required. </div>
                </div>
                <div class="col-md-5 mb-3">
                  <input disabled type="text" class="form-control rounded-0" id="city" name="city" placeholder="City" required="">
                  <div class="invalid-feedback"> City required. </div>
                  </select>
                  <div class="invalid-feedback"> Please enter your city. </div>
                </div>
              </div>

              <div class="mb-3">
                <input disabled type="text" class="form-control rounded-0" id="address" name="address" placeholder="1234 Main St" required="">
                <div class="invalid-feedback"> Please enter your shipping address. </div>
              </div>
              <div class="mb-3">
                <input disabled type="text" class="form-control rounded-0" id="phone" name="phone" placeholder="Phone" required="">
                <div class="invalid-feedback"> Please enter your phone number. </div>
              </div>

              <hr class="mb-4">

              <div class="custom-control custom-checkbox">
                <input disabled type="checkbox" class="custom-control-input rounded-0" id="save-info">
                <label class="custom-control-label" for="save-info">Agree to Term & Conditions</label>
              </div>
              <hr class="mb-4">
              <h4 class="mb-3">Payment</h4>
              <div class="d-block my-3">
                <div class="custom-control custom-radio">
                  <input id="credit" name="paymentMethod" type="radio" class="custom-control-input rounded-0" checked="" required="">
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
                  <input disabled type="text" class="form-control rounded-0" id="cc-name" name="cc-name" required="">

                  <div id="fullName-feedback"> Name on card is required </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="cc-number">Credit card number</label>
                  <input disabled type="text" class="form-control rounded-0" id="cc-number" name="cc-number" placeholder="" required>
                  <div class="invalid-feedback"> Credit card number is required </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 mb-3">
                  <label for="cc-expiration">Expiration</label>
                  <input disabled type="text" class="form-control rounded-0" id="cc-expiration" name="cc-expiration" placeholder="" required="">
                  <div class="invalid-feedback"> Expiration date required </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="cc-cvv">CVV</label>
                  <input disabled type="text" class="form-control rounded-0" id="cc-cvv" name="cc-cvv" placeholder="" required="">
                  <div class="invalid-feedback"> Security code required </div>
                </div>
              </div>
              <hr class="mb-4">
              <i class="bi bi-box-arrow-in-left"></i>
              <span><a href="javascript:history.back(1)">Continue shopping</a> </span>
              <a href="http://localhost/vizsga_project/?page=signupPage" class="btn btn-dark btn-block rounded-0">Please log in</a>
              <footer class="my-5 pt-5 text-muted text-center text-small">
                <p class="mb-1">©Skincare Co. 2023 </p>
                <ul class="list-inline">
                  <li class="list-inline-item"><a href="#">Privacy</a></li>
                  <li class="list-inline-item"><a href="#">Terms</a></li>
                  <li class="list-inline-item"><a href="#">Support</a></li>
                </ul>
              </footer>
            </form>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</div>



<script type="text/javascript">
  $(document).ready(function() {
    checkout();
    hideCarousel();
    addressDataForCheckout();

  })

  //checkout errors
  let url = window.location.href;
  let checkouterrors = document.getElementById("checkout-feedback-display");
  if (url.match("erroremptyCart")) {
    checkouterrors.style.display = "block";
    checkouterrors.classList.add("alert-danger");
    checkouterrors.innerHTML = "There are no items in your cart!";

  } else if (url.match("missingCreditInfos")) {
    checkouterrors.style.display = "block";
    checkouterrors.classList.add("alert-danger");
    checkouterrors.innerHTML = "Please fill the form to complete the order!";
  } else if (url.match("missingccName")) {
    checkouterrors.style.display = "block";
    checkouterrors.classList.add("alert-danger");
    checkouterrors.innerHTML = "Your name on card information is missing!";
  } else if (url.match("missingccNumber")) {
    checkouterrors.style.display = "block";
    checkouterrors.classList.add("alert-danger");
    checkouterrors.innerHTML = "Your credit card number is missing!";
  } else if (url.match("missingccExpiration")) {
    checkouterrors.style.display = "block";
    checkouterrors.classList.add("alert-danger");
    checkouterrors.innerHTML = "Your expiration date is missing!";
  } else if (url.match("missingccCvv")) {
    checkouterrors.style.display = "block";
    checkouterrors.classList.add("alert-danger");
    checkouterrors.innerHTML = "Your CVV is missing!";
  }





  function checkoutValidation() {
    $("#fullName-feedback").hide();
    let fullNameError = true;
    $("#cc-name").keyup(function() {
      validateFullName();
    });

    $("#ccNumber-feedback").hide();
    let ccNumberError = true;
    $("#cc-number").keyup(function() {
      validateCCNumber();
    });

    $("#ccExpiration-feedback").hide();
    let ccExpirationError = true;
    $("#cc-expiration").keyup(function() {
      validateCCExpiration();
    });

    $("#ccCvv-feedback").hide();
    let ccCvvError = true;
    $("#cc-cvv").keyup(function() {
      validateCcCvv();
    });

  }


  function validateFullName() {

    let fullNameValue = $("#cc-name").val();
    if (fullNameValue.length == "") {
      $("#fullName-feedback").show();
      fullNameError = false;
      return false;
    } else {
      $("#fullName-feedback").hide();
    }
  }

  function validateCCNumber() {
    let ccNumber = $("#cc-number").val();
    let ccNumberFeedback = $("#ccNumber-feedback");
    ccNumber = ccNumber.replace(/\D/g, '');

    if (ccNumber === "") {
      $("#ccNumber-feedback").show();
      ccNumberError = false;
      return false;
    } else {
      $("#ccNumber-feedback").hide();

    }

  }



  function validateCCExpiration() {
    let expirationValue = $("#cc-expiration").val();
    let ccExpirationFeedback = $("#ccExpiration-feedback");

    if (expirationValue === "") {
      ccExpirationFeedback.text("Please enter an expiration date");
      ccExpirationFeedback.show();
      return false;
    }


    const pattern = /^(0[1-9]|1[0-2])\/\d{2}$/;
    if (!pattern.test(expirationValue)) {
      ccExpirationFeedback.text("Invalid expiration date format (MM/YY)");
      ccExpirationFeedback.show();
      return false;
    }

    const today = new Date();
    const currentYear = today.getFullYear() % 100;
    const currentMonth = today.getMonth() + 1;

    const [inputMonth, inputYear] = expirationValue.split('/').map(Number);

    if (inputYear < currentYear || (inputYear === currentYear && inputMonth < currentMonth)) {
      ccExpirationFeedback.text("Card has expired");
      ccExpirationFeedback.show();
      return false;
    }

    ccExpirationFeedback.hide();
    return true;
  }


  function validateCcCvv() {

    let ccCvvError = true;
    let ccCvvValue = $("#cc-cvv").val();
    let numberRegex = /^\d{3,4}$/;
    let errorMessage = "";

    switch (true) {
      case ccCvvValue.length === 0:
        errorMessage = "CVV is required!";
        ccCvvError = false;
        break;
      case !numberRegex.test(ccCvvValue):
        errorMessage = "CVV must be number and 3 digit!";
        ccCvvError = false;
        break;
      default:
        ccCvvError = true;
    }

    $("#ccCvv-feedback").text(errorMessage).toggle(errorMessage !== "");
  }

  function get(name) {
    if (name = (new RegExp('[?&]' + encodeURIComponent(name) + '=([^&]*)')).exec(location.search))
      return decodeURIComponent(name[1]);
  }

  function hideCarousel() {

    document.getElementById("hideCarousel").style.display = "none";
  }

  function checkout() {

    $.ajax({
        url: "Action.php",
        type: "POST",
        data: {
          action: "addToCheckout",
          productId: get('productId'),

        },
        success: function(response) {
          $("#checkout-display").html(response);
          hideCarousel();

        }
      }),
      $.ajax({
        url: "Action.php",
        type: "POST",
        data: {
          action: "getSubtotal",
        },
        success: function(response) {
          $(".checkoutSubtotal").html(response);

        }
      })
  }

  function removeFromCheckout(productId) {

    $.ajax({
      url: "Action.php",
      type: "POST",
      data: {
        action: "removeCheckoutData",
        productId: productId
      },
      success: function(response) {
        $("#checkout-display").html(response);

      }
    })

    $.ajax({
      url: "Action.php",
      type: "POST",
      data: {
        action: "getSubtotal",
      },
      success: function(response) {
        $(".checkoutSubtotal").html(response);
      }
    })

    $.ajax({
      url: "Action.php",
      type: "POST",
      data: {
        action: "addToCheckout"
      },
      success: function(response) {
        $("#checkout-display").html(response);
      }
    })
  }

  function addressDataForCheckout() {

    $.ajax({
      url: "Action.php",
      type: "POST",
      data: {
        action: "checkOutAddress",
      },

      success: function(response) {
        $("#addressFormCheckout").html(response);
        checkoutValidation();

      }
    })
  }
</script>
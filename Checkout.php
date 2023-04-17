<div class="container-fluid">
  <div class="row">

    <div class="col-12 col-sm-12 col-md-4 order-md-2" style="background-color: #DCDCDC;">

      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill">3</span>
      </h4>
      <ul class="list-group mb-3 sticky-top rounded-0">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Product name</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$12</span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Second product</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$8</span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Third item</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$5</span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Second product</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$8</span>
        </li>
        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">Discount code</h6>
            <small>EXAMPLECODE</small>
          </div>
          <span class="text-success">-$5</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD)</span>
          <strong>$20</strong>
        </li>
        <div class="input-group rounded-0 mt-3 ">
          <input type="text" class="form-control rounded-0" placeholder="Promo code">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary rounded-0">Redeem</button>
          </div>
        </div>
      </ul>
    </div>


    <div class="col-12 col-sm-12 col-md-8 order-md-1 px-5 py-5 mx">
      <div class="row">
        <div class="col-12">
          <h4 style="display: inline-block;margin-right: 160px;">Contact information</h4>
          <span style="display: inline-block;">Already have an account?
            <a style="text-decoration: none; color: rgb(255, 0, 119);" href="">Log in.</a>
          </span>
          <div class="col-12 mb-3 mt-4">
            <input type="email" class="form-control rounded-0" id="email" placeholder="Email">
            <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
          </div>

        </div>
      </div>
      <div class="row">
        <div class="col-12 ">

          <h4 class="mb-3">Shipping address</h4>
          <form class="needs-validation pt-1" novalidate="">
            <div class="row">
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control rounded-0" id="firstName" placeholder="First name" value="" required="">
                <div class="invalid-feedback"> Valid first name is required. </div>
              </div>
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control rounded-0" id="lastName" placeholder="Last name" value="" required="">
                <div class="invalid-feedback"> Valid last name is required. </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3 mb-3">
                <input type="number" class="form-control rounded-0" id="zip" placeholder="Zip code" required="">
                <div class="invalid-feedback"> Zip code required. </div>
              </div>
              <div class="col-md-5 mb-3">
                <input type="text" class="form-control rounded-0" id="city" placeholder="City" required="">
                <div class="invalid-feedback"> City required. </div>
                </select>
                <div class="invalid-feedback"> Please enter your city. </div>
              </div>
            </div>

            <div class="mb-3">
              <input type="text" class="form-control rounded-0" id="address" placeholder="1234 Main St" required="">
              <div class="invalid-feedback"> Please enter your shipping address. </div>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control rounded-0" id="address" placeholder="Phone" required="">
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
                <input type="text" class="form-control rounded-0" id="cc-name" placeholder="" required="">
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback"> Name on card is required </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Credit card number</label>
                <input type="text" class="form-control rounded-0" id="cc-number" placeholder="" required="">
                <div class="invalid-feedback"> Credit card number is required </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control rounded-0" id="cc-expiration" placeholder="" required="">
                <div class="invalid-feedback"> Expiration date required </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-cvv">CVV</label>
                <input type="text" class="form-control rounded-0" id="cc-cvv" placeholder="" required="">
                <div class="invalid-feedback"> Security code required </div>
              </div>
            </div>
            <hr class="mb-4">
            <i class="bi bi-box-arrow-in-left"></i>
            <span><a href="">Return to cart.</a></span>
            <button class="btn btn-dark btn-block rounded-0" type="submit">Continue to checkout</button>
            <footer class="my-5 pt-5 text-muted text-center text-small">
              <p class="mb-1">© 2017-2019 Company Name</p>
              <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
              </ul>
            </footer>

          </form>

        </div>
      </div>
    </div>
  </div>


</div>



<script type="text/javascript">
  $(document).ready(function() {

    hideCarousel();

  })



  function hideCarousel() {

    document.getElementById("hideCarousel").style.display = "none";
  }
</script>
        
        
        $(function() {
            $("#modal").click(function() {
                $.ajax({
                    url: "Action.php",
                    type: "POST",
                    data: {
                        action: "getCartData"
                    },
                    success: function(response) {
                        $(".modal-body").html(response);
                        $('#modal_aside_right').modal('show');
                        
                    }

                })
                $.ajax({
                    url: "Action.php",
                    type: "POST",
                    data: {
                        action: "getSubtotal",
                    },
                    success: function(response) {
                        $("#subtotal").html(response);
                        $("#checkout-display").html(response);
                       
                    }
                })
              
            });
        });

        $(function() {
            $("#modal_close_button").click(function() {
                $('#modal_aside_right').modal('hide');
            });
        });

        function addToCart()
        {
            $(document).ready(function() {
                addToCartModal();
                addToCheckout();
              
            })
        }

        function addToCartModal() 
        {
            
            $.ajax({
                url: "Action.php",
                type: "POST",
                data: {
                    action: "addToCartModal",
                    productId:get('productId'),
                    qty:$( "#inputQty" ).val()
                   
                    
                },
                success: function(response) {
                    $(".modal-body").html(response);
                    $('#modal_aside_right').modal('show');
                   
                }
            })

            
            $.ajax({

                url: "Action.php",
                type: "POST",
                data: {
                    action: "getSubtotal",
                },
                success: function(response) {
                    $("#subtotal").html(response);
                   
                }
            })
          
        }

        function removeFromCart(productId)
        {
            
            $.ajax({
                url: "Action.php",
                type: "POST",
                data: {
                    action: "removeCartData",
                    productId:productId
                },
                success: function(response) {
                    $(".modal-body").html(response);
                  
                }
            })

            $.ajax({

                url: "Action.php",
                type: "POST",
                data: {
                    action: "getSubtotal",
                },
                success: function(response) {
                    $("#subtotal").html(response);
                   
                }
            })

            $.ajax({
                url: "Action.php",
                type: "POST",
                data: {
                    action: "getCartData"
                },
                success: function(response) {
                    $(".modal-body").html(response);
                    $('#modal_aside_right').modal('show');
                    
                }

            })
        }
        
        function updateProductQuantity()
        {
           
            $.ajax({
                url: "Action.php",
                type: "POST",
                data: {
                    action: "updateQuantity",
                },
                
                success: function(response){
                    $(".modal-body").html(response);
                   
                }
            })
        }       


        function increaseValue(value)
        {
            value = parseInt(document.getElementById('inputQty').value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            document.getElementById('inputQty').value = value;
        }

        function decreaseValue(value)
        {
            value = parseInt(document.getElementById('inputQty').value, 10);
            value = isNaN(value) ? 0 : value;
            if(value >! 0){
                value--;
            }
            document.getElementById('inputQty').value = value;
        }

        
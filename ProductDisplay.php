
<div class="row" id="showProduct">

</div>

<script type="text/javascript">
    $(document).ready(function() {
        hideCarousel();
        product();
        showProductsNav();
    
    })
    function get(name){
        if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
        return decodeURIComponent(name[1]); 
    }

    function product() {
       
        $.ajax({
            url: "Action.php",
            type: "POST",
            data: {
                action: "getProduct",
                productId:get('productId')
            },
            success: function(response) {
                $("#showProduct").html(response);
                hideCarousel();
            }
        })
    }

    function hideCarousel() {
        
            document.getElementById("hideCarousel").style.display = "none";
    }

    function showProductsNav() {
            document.getElementById("productsNav").style.display = "block";
    }

 
</script>
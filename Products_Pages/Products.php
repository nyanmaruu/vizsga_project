<div class="container col-4 col-lg-2 mt-5 ">
    <input type="text" class="form-control rounded-0 d-flex flex-row-reverse" id="search" placeholder="Search..." autocomplete="off">    
</div>
<div class="container" id="search_result"></div>

<div class="row" id="showAllProducts"></div>


<script type="text/javascript">
    $(document).ready(function() {
        products();
        hideCarousel();
        showProductsNav();
        getSearchResult();
        product();
        
    })

    function products() {
        $.ajax({
            url: "Action.php",
            type: "POST",
            data: {
                action: "getAllProducts", categoryId:get('categoryId')
            },
            success: function(response) {
                $("#showAllProducts").html(response);
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

    function getSearchResult(){
        $("#search").keyup(function(){

            var input = $(this).val(); 
             
            if(input != "")
            {
                $.ajax({
                    method: "POST",         
                    url: "Action.php",      
                    data: {input: input,action: "getSearchResult"},   
                    success: function(data){
                        $("#search_result").html(data);
                        $("#search_result").css("display", "block");
                        
                    }
                })
            }
            else 
            {
                $("#search_result").css("display", "none");
            }

            
        })
    }

    function get(name){
        if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
        return decodeURIComponent(name[1]); 
    }
    



</script>

<?php
require "Querys.php";
$querys = new Querys();



if (isset($_POST["action"]) && $_POST["action"] == "getAllProducts" && isset($_POST['categoryId'])) {
    $output = '';
    $data = $querys->getCategoryProducts($_POST['categoryId']);
    foreach ($data as $row) {
        $output .=
            '
            
            <div class="col-6 col-md-4 col-lg-3 mb-4">
            <div class="card border-0 mt-5">
            
                <div class="card-header border-0" >
                <a href="?page=productPage&productId='.$row["id"].'">
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
                <a>
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
                <div class="col-lg-3 mb-4 col-sm-6 col-xs-6">
                    <div class="card border-0 mt-5">
                        <div class="cardimgContainer">
                        <img class="card-image "src="' . $row["image"] . '" alt="' . $row["name"] . '" />
                        </div>
                        
                        <div class="card-body">
                            <h6 class="border-0 mb-0"><strong>' . $row["brand"] . '</strong></h6>
                            <hr>
                            <p class="card-title border-0">' . $row["name"] . '</p>
                            <p class="card-text ">' . $row["price"] . ' $</p>

                            <div class="card-footer">
                                <button class="btn btn-dark">Add to bag</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            ';
        }
        echo $output;
}


   



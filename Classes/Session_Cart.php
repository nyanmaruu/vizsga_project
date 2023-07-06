<?php


class  Session_Cart {
    
    
    public function __construct()
    {
      
    }

    public function getProductStructure($product, $qty, $price)
    {
        return[
            'id' => $product[0]['id'],
            'brand' => $product[0]['brand'],
            'name' => $product[0]['name'],
            'description' => $product[0]['description'],
            'price' => $price,
            'baseprice' => $product[0]['price'],
            'quantity' => $qty,
            'image' =>  $product[0]['image']
        ];
      
    }

   

    public function setCartSession($product, $qty)
    {
        $isExistProduct = false;
        
       
        foreach($_SESSION['cart'] as $product_value){
           
            if($product_value['id'] == $product[0]['id']) {
                $isExistProduct = true;
               
            }
       }
       if($isExistProduct == true )
       {
       
        $this->updateProductQuantitySession($product[0]['id'], $qty);
       
       } 
       else
       {
        $price = $product[0]['price'] * $qty;
        $_SESSION['cart'][] = $this->getProductStructure($product, $qty, $price );
        
       }  
     
    }


    public function getCartSession()
    {
      if( empty($_SESSION['cart']))
        {
            echo 'There are no items in your cart';
           
        } 
       
        if(!isset($_SESSION['cart']) && empty($_SESSION['cart']))
        {
            $_SESSION['cart'] = [];
           
        } 
        return $_SESSION['cart'];
       
    }

   

   

    public function getSubtotal()
    {
        $totalprice = 0;
        foreach($_SESSION['cart'] as $product_value){
           $totalprice += $product_value['price'];
        }
        return $totalprice;
    }

    

    

    
    public function updateProductQuantitySession($productId, $qty)
    {
        foreach($_SESSION['cart'] as $key => $product_value){
       
             if($product_value['id'] == $productId) {
                $_SESSION['cart'][$key]['quantity'] = (int)$product_value['quantity'] + (int)$qty;
                $_SESSION['cart'][$key]['price']= ((int)$product_value['quantity'] + (int)$qty )* $_SESSION['cart'][$key]['baseprice'];
                
             }
        }
    }

    


    public function removeProductSession($productId)
    {
        foreach($_SESSION['cart'] as $key => $product_value){
           
            if($product_value['id'] == $productId) {
                unset($_SESSION['cart'][$key]);
            } 
        }
        return $_SESSION['cart']; 
    }

    

    

}




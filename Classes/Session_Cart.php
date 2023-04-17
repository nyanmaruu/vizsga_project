<?php
 session_start();

class  Session_Cart {
    
    
    public function __construct()
    {
      
    }

    public function getProductStructure($product, $qty)
    {
        return[
            'id' => $product[0]['id'],
            'brand' => $product[0]['brand'],
            'name' => $product[0]['name'],
            'description' => $product[0]['description'],
            'price' => $product[0]['price'],
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
       if($isExistProduct == true ){
        $this->updateProductQuantitySession($product[0]['id'], $qty);
      
       } 
       else{
        $_SESSION['cart'][] = $this->getProductStructure($product, $qty);
       }    
    }


    public function getCartSession()
    {
        if(!isset($_SESSION['cart']) && empty($_SESSION['cart']))
        {
            $_SESSION['cart'] = [];
        } 
        return $_SESSION['cart'];
        
    }

    
    public function updateProductQuantitySession($productId, $qty)
    {
        foreach($_SESSION['cart'] as $key => $product_value){
        
             if($product_value['id'] == $productId) {
                $_SESSION['cart'][$key]['quantity'] = (int)$product_value['quantity'] + (int)$qty;
                
               
             }
        }
        $_SESSION['cart'][$key]['price'] = $_SESSION['cart'][$key]['price'] * (((int)$product_value['quantity'] + (int)$qty)/$qty);
        print_r((int)$product_value['quantity'] + (int)$qty);
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




<?php
    spl_autoload_register(function ($class_name) {
        include $class_name . '.php';
    });
    
    class products {
    	public $product_db;
    	public function __construct(){
    		$this->product_db = new dbFunction;
    	}

        public function get_product_data($get){
        	$productData = $this->product_db->getProductData($get);
        	echo $productData;
        }
    }

    $product_obj = new products;
    if($_GET)
    	$product_obj->get_product_data($_GET);

?>
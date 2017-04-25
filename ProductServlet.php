<?php
session_start();
include_once 'C:\xampp\htdocs\store\model\ProductModel.php';
include_once 'C:\xampp\htdocs\store\DAO\ProductDAO.php';
$method = $_POST["method"];

switch ($method){
    case "getAll":
        $product = new ProductDAO;
        $result = $product->getAllProduct();
        break;
    case "Add to Cart":
        $order_table = '';
        $message = '';
        if($_POST["action"] == "add"){
            if(isset($_SESSION["shopping_cart"])){
                $is_available = 0;
            }
        break;
    
}
}

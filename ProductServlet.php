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
        }
        break;
    case "search":
        $productName = $_POST["productName"];
        $product = new ProductDAO;
        $listProduct = $product->searchProductByName($productName);
        $c = count($listProduct);
        if($c != 0){
        $_SESSION['listP'] = serialize($listProduct);
        $_SESSION['check'] = 1;
        }else{
            $_SESSION['check']=0;
        }
        
        $url="Location:searchProduct.php";
        break;
    
    
}
header($url);

<?php
include_once 'C:\xampp\htdocs\store\model\ProductModel.php';
include_once 'C:\xampp\htdocs\store\model\CategoryModel.php';
class ProductDAO{
    function getAllProduct(){
        $connect = mysqli_connect("localhost","root","","data_web") or die ("Coundn't connect");
        mysqli_set_charset($connect,"utf8");
        $query = mysqli_query($connect,"SELECT * FROM product");

        $arr = array();
             while ($row = mysqli_fetch_array($query))
                {
                    $dbproduct_id = $row['Product_ID'];
                    $dbproduct_name = $row['Product_Name'];
                    $dbcategory_id = $row['Category_ID'];
                    $dbdetail = $row['Detail'];
                    $dbimage = $row['Image'];
                    $dbprice = $row['Price'];
                    
                    
                    $product = new ProductModel($dbproduct_id, $dbproduct_name, $dbcategory_id,
                            $dbdetail, $dbimage, $dbprice);
                     array_push($arr,$product);
                }
                return $arr;      
    }
    
    function getAllBrand(){
        $connect = mysqli_connect("localhost","root","","data_web") or die ("Coundn't connect");
        $query = mysqli_query($connect,"SELECT * FROM category");
        
        $arr = array();
        while($row = mysqli_fetch_array($query)){
           $dbCategoryID = $row['Category_ID'];
           $dbCategoryName = $row['Category_Name'];
           
           $category = new CategoryModel($dbCategoryID, $dbCategoryName);
           array_push($arr, $category);
        }
        return $arr;
    }
}


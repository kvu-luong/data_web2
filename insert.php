<?php  
 $connect = mysqli_connect("localhost", "root", "", "data_web"); 
$productname = mysqli_escape_string($connect, $_POST["productname"]) ;
$categoryid = mysqli_escape_string($connect, $_POST["categoryid"]) ;
//$image = mysqli_escape_string($connect, $_POST["image"]) ;
$detail = mysqli_escape_string($connect, $_POST["detail"]) ;
$price = mysqli_escape_string($connect, $_POST["price"]) ;
 $sql = "INSERT INTO product(Product_Name,Category_ID,Detail,Price) VALUES('$productname', '$categoryid','$detail','$price')";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?>
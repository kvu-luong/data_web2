<?php  
 $connect = mysqli_connect("localhost", "root", "", "data_web");  
$productname = mysqli_escape_string($connect, $_POST["productname"]) ;
$categoryid = mysqli_escape_string($connect, $_POST["categoryid"]) ;

$image = mysqli_escape_string($connect, $_POST["image"]) ;
echo $image;
$file = addslashes(file_get_contents($_FILES["$image"]["tmp_name"]));

$detail = mysqli_escape_string($connect, $_POST["detail"]) ;
$price = mysqli_escape_string($connect, $_POST["price"]) ;
 $sql = "INSERT INTO product(Product_Name,Category_ID,Detail,Image,Price) VALUES('$productname', '$categoryid','$detail','$file','$price')";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?>
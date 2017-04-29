<?php  
 $connect = mysqli_connect("localhost", "root", "", "data_web");  
 $sql = "DELETE FROM product WHERE Product_ID = '".$_POST["id"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>
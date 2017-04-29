<?php  
 $connect = mysqli_connect("localhost", "root", "", "data_web");  
    mysqli_set_charset($connect, "utf8");
 $sql = "DELETE FROM order_origin WHERE order_id = '".$_POST["id"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>
<?php  
 $connect = mysqli_connect("localhost", "root", "", "data_web");  
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE product SET ".$column_name."='".$text."' WHERE Product_ID='".$id."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>
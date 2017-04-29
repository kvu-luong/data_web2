<?php  
 $connect = mysqli_connect("localhost", "root", "", "data_web");  
    mysqli_set_charset($connect, "utf8");
 $id = mysqli_escape_string($connect,$_POST["id"]);  
 $text = mysqli_escape_string($connect,$_POST["text"]);  
 $column_name = mysqli_escape_string($connect,$_POST["column_name"]);  
 $sql = "UPDATE user SET ".$column_name."='".$text."' WHERE User_ID='".$id."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 }
 ?>
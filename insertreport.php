<?php  
 $connect = mysqli_connect("localhost", "root", "", "data_web"); 
    mysqli_set_charset($connect, "utf8");
$userid = mysqli_escape_string($connect, $_POST["userid"]) ;
$orderstatus = mysqli_escape_string($connect, $_POST["orderstatus"]) ;
 $sql = " INSERT INTO order_origin(User_ID, Creation_Date, Order_Status)  
                        VALUES('$userid', '".date('Y-m-d')."', '$orderstatus')  
                        ";    
 
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?>
<?php  
 $connect = mysqli_connect("localhost", "root", "", "data_web"); 
    mysqli_set_charset($connect, "utf8");
$username = mysqli_escape_string($connect, $_POST["username"]) ;
$content = mysqli_escape_string($connect, $_POST["content"]) ;

 $sql = "INSERT INTO comment(UserName,Content,Date)"
         . " VALUES('$username', '$content','".date('Y-m-d')."')";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?>
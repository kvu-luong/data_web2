<?php 
session_start();
 $connect = mysqli_connect("localhost", "root", "", "data_web"); 
    mysqli_set_charset($connect, "utf8");
$content = mysqli_escape_string($connect, $_POST["comment"]) ;
$username="Anonymous";
if(isset($_SESSION['username'])){
$username = $_SESSION['username'];
}
 $sql = "INSERT INTO comment(User_Name,Content,Date)"
         . " VALUES('$username', '$content','".date('Y-m-d')."')";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?>
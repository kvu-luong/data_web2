<?php  
 $connect = mysqli_connect("localhost", "root", "", "data_web"); 
    mysqli_set_charset($connect, "utf8");
$username = mysqli_escape_string($connect, $_POST["username"]) ;
$password = md5(mysqli_escape_string($connect, $_POST["password"])) ;
$usertype = mysqli_escape_string($connect, $_POST["usertype"]) ;
$email = mysqli_escape_string($connect, $_POST["email"]) ;
$phone = mysqli_escape_string($connect, $_POST["phone"]) ;
$address = mysqli_escape_string($connect, $_POST["address"]) ;
$bankid = mysqli_escape_string($connect, $_POST["bankid"]) ;
 $sql = "INSERT INTO user(UserName,Password,Usertype,Email,Phone,Address,Bank_ID)"
         . " VALUES('$username', '$password','$usertype','$email','$phone','$address','$bankid')";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?>
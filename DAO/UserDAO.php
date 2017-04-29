<?php

include_once 'C:\xampp\htdocs\store\model\UserModel.php';

class UserDAO {

function login($name,$password){
    $connect = mysqli_connect("localhost","root","","data_web") or die ("Coundn't connect");
    mysqli_set_charset($connect,"utf8");
    $query = mysqli_query($connect,"SELECT * FROM user WHERE UserName='$name'");
    $numrows = mysqli_num_rows($query);

            if ($numrows!=0){//check user exist or not
                while ($row = mysqli_fetch_assoc($query))
                {
                    $dbid = $row['User_ID'];
                    $dbname = $row['UserName'];
                    $dbpassword = $row['Password'];
                    $dbtype = $row['UserType'];
                    $dbemail = $row['Email'];
                    $dbphone = $row['Phone'];
                    $dbaddress = $row['Address'];
                    $dbbankID = $row['Bank_ID'];
                }
                if ($dbname== $name&&md5($password)==$dbpassword)
                {
                    $user = new UserModel($dbid, $dbname, $dbpassword, $dbtype, $dbtype,$dbemail ,$dbphone, $dbaddress, $dbbankID);
                    return $user;
                }
                else return NULL;
            }
            else return NULL;
}


function register($username,$password,$email,$phone,$address,$bankid){
    $connect = mysqli_connect("localhost","root","","data_web") or die ("Coundn't connect");
    mysqli_set_charset($connect,"utf8");
    $query = mysqli_query($connect,"SELECT * FROM user WHERE UserName='$username'");//exist --> can't use this username
    $numrows = mysqli_num_rows($query);

            if ($numrows==0){//check user exist or not
                $query2 = "insert into user(UserName,Password,UserType,Email,Phone,Address,Bank_ID) "
                        . "values('$username','$password','customer','$email','$phone','$address','$bankid')";
                echo $query2;
                if ($connect->query($query2) === TRUE) {
                    return true;
                } else {
                  return false;
                }
            }
            return false;
}

function getUserIDbyName($userName){
    $connect = mysqli_connect("localhost","root","","data_web") or die ("Coundn't connect");
    mysqli_set_charset($connect,"utf8");
    $query = mysqli_query($connect,"SELECT User_ID FROM user WHERE UserName='$userName'");
    $numrows = mysqli_num_rows($query);

            if ($numrows!=0){//check user exist or not
                while ($row = mysqli_fetch_assoc($query))
                {
                    $dbid = $row['User_ID'];
                }
                    return $dbid;
                }
                else return NULL;
            }

}
    function getAllUser(){
        $connect = mysqli_connect("localhost","root","","data_web") or die ("Coundn't connect");
        mysqli_set_charset($connect,"utf8");
        $query = mysqli_query($connect,"SELECT * FROM user");

        $arr = array();
             while ($row = mysqli_fetch_array($query))
                {
                    $dbusername = $row['UserName'];
                    $dbpassword = $row['Password'];
                    $dbemail = $row['Email'];
                    $dbphone = $row['Phone'];
                    $dbaddress = $row['Address'];
                    $dbbankid = $row['Bank_ID'];
                    
                    
                    $product = new ProductModel($dbproduct_id, $dbproduct_name, $dbcategory_id,
                            $dbdetail, $dbimage, $dbprice);
                     array_push($arr,$product);
                }
                return $arr;      
    }
    
?>


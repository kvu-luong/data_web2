<?php

    include_once 'C:\xampp\htdocs\store\model\UserModel.php';
    include_once 'C:\xampp\htdocs\store\DAO\UserDAO.php';
    
    session_start();
    
    $method = $_POST["method"];
    
    switch ($method){
        case "login":
            $name = $_POST["username"];
            $password = $_POST["password"];
            $login = new UserDAO;
            $user = $login->login($name, $password);
            $usertype= $user->userType;
            echo $usertype;
            if($user != NULL){
                $_SESSION['username'] = $name;
                $_SESSION['usertype'] = $usertype;
        echo $_SESSION['usertype'];
                if($usertype=='admin'){
                    $url ="Location:adminPage.php";
                }else{
                $url="Location:index.php";
                }
            } else {
                $_SESSION['error'] = "error";
                $url="Location: loginPage.php";
            }
            break;
        case "logout":
            session_destroy();
            $url = "Location: index.php";
            break;
        case "register":
            $username = $_POST["UserName"];
            $password = $_POST["Password"];
            $confim = $_POST["Confirm"];
            $email = $_POST["Email"];
            $phone = $_POST["Phone"];
            $address = $_POST["Address"];
            $bankid = $_POST["BankID"];
            echo $username;
            if($password != $confim){
                $_SESSION['errorconfirm'] = "Your confirm password was wrong!";
                $url="Location:registerPage.php";
            }else{
            $register = new UserDAO;
            $user = $register->register($username, md5($password),$email, $phone, $address, $bankid);
            if($user== true){
                 $_SESSION['username'] = $name;
                 $url="Location:index.php";
            }
            else{
                 $_SESSION['erroruser'] = "Your username already exist in data!";
                 $url="Location:registerPage.php";
            }
            }
            
            
    }
    
        
    header($url);
?>

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
            if($user != NULL){
                $_SESSION['username'] = $name;
                $url="Location:index.php";
            } else {
                $_SESSION['error'] = "error";
                $url="Location: loginPage.php";
            }
            break;
        case "logout":
            session_destroy();
            $url = "Location: index.php";
    }
    
        
    header($url);
?>

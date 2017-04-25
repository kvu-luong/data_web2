<?php
    class UserModel{
        var $user_ID;
        var $userName;
        var $password;
        var $userType;
        var $email;
        var $phone;
        var $address;
        var $bank_ID;

        
        function __construct($user_ID, $userName, $password, $userType, $email, $phone, $address, $bank_ID) {
            $this->user_ID = $user_ID;
            $this->userName = $userName;
            $this->password = $password;
            $this->userType = $userType;
            $this->email = $email;
            $this->phone = $phone;
            $this->address = $address;
            $this->bank_ID = $bank_ID;
        }

        function getUser_ID() {
            return $this->user_ID;
        }

        function getUserName() {
            return $this->userName;
        }

        function getPassword() {
            return $this->password;
        }

        function getUserType() {
            return $this->userType;
        }

        function getEmail() {
            return $this->email;
        }

        function getPhone() {
            return $this->phone;
        }

        function getAddress() {
            return $this->address;
        }

        function getBank_ID() {
            return $this->bank_ID;
        }

        function setUser_ID($user_ID) {
            $this->user_ID = $user_ID;
        }

        function setUserName($userName) {
            $this->userName = $userName;
        }

        function setPassword($password) {
            $this->password = $password;
        }

        function setUserType($userType) {
            $this->userType = $userType;
        }

        function setEmail($email) {
            $this->email = $email;
        }

        function setPhone($phone) {
            $this->phone = $phone;
        }

        function setAddress($address) {
            $this->address = $address;
        }

        function setBank_ID($bank_ID) {
            $this->bank_ID = $bank_ID;
        }


    }
?>

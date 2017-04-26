<?php
    class ProductModel{
        var $productID;
        var $productName;
        var $categoryID;
        var $detail;
        var $image;
        var $price;
        
   
        function __construct($productID, $productName, $categoryID, $detail, $image, $price) {
            $this->productID = $productID;
            $this->productName = $productName;
            $this->categoryID = $categoryID;
            $this->detail = $detail;
            $this->image = $image;
            $this->price = $price;
        }

        function getProductID() {
            return $this->productID;
        }

        function getProductName() {
            return $this->productName;
        }

        function getCategoryID() {
            return $this->categoryID;
        }

        function getDetail() {
            return $this->detail;
        }

        function getImage() {
            return $this->image;
        }

        function getPrice() {
            return $this->price;
        }

        function setProductID($productID) {
            $this->productID = $productID;
        }

        function setProductName($productName) {
            $this->productName = $productName;
        }

        function setCategoryID($categoryID) {
            $this->categoryID = $categoryID;
        }

        function setDetail($detail) {
            $this->detail = $detail;
        }

        function setImage($image) {
            $this->image = $image;
        }

        function setPrice($price) {
            $this->price = $price;
        }


    }

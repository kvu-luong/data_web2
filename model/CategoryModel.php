<?php

class CategoryModel{
    var $category_id ;
    var $categoryName;
    
    function __construct($category_id, $categoryName) {
        $this->category_id = $category_id;
        $this->categoryName = $categoryName;
    }

    function getCategory_id() {
        return $this->category_id;
    }

    function getCategoryName() {
        return $this->categoryName;
    }

    function setCategory_id($category_id) {
        $this->category_id = $category_id;
    }

    function setCategoryName($categoryName) {
        $this->categoryName = $categoryName;
    }


}

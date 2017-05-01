<?php

$connect = mysqli_connect("localhost", "root", "", "data_web");
mysqli_set_charset($connect, "utf8");

 if(isset($_POST["btn_add"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      $query = "INSERT INTO product(Image) VALUES ('$file')";  
      echo $$_FILES["image"]["tmp"];
      if(mysqli_query($connect, $query))  
      {  
           echo '<script>alert("Image Inserted into Database")</script>';  
      }  
 }  



$output = '';
$sql = "SELECT * FROM product ORDER BY Product_ID ASC";
$result = mysqli_query($connect, $sql);
$output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">Product ID</th>  
                     <th width="15%">Product Name</th>  
                     <th width="5%">Category ID</th>  
                     <th width="10%">Image</th>
                     <th width="30%">Detail</th>  
                     <th width="10%">Price</th>  
                     <th width="5%">Delete</th>
                </tr>';
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $output .= '  
                <tr>  
                     <td>' .$row["Product_ID"].'</td>  
                     <td class="productname" data-id1="' . $row["Product_ID"] . '" contenteditable>' . $row["Product_Name"] . '</td>  
                     <td class="category" data-id2="' . $row["Product_ID"] . '" contenteditable>' . $row["Category_ID"] . '</td> 
                     <td class="image" data-id3="' . $row["Product_ID"] . '" contenteditable>  <img src="data:image/jpeg;base64,'.base64_encode($row['Image'] ).'" height="200" width="200" class="img-thumnail" />  </td> 
                     <td class="detail" data-id4="' . $row["Product_ID"] . '" contenteditable>' . $row["Detail"] . '</td>  
                     <td class="price" data-id5="' . $row["Product_ID"] . '" contenteditable>' . $row["Price"] . '</td>  
                     <td><button type="button" name="delete_btn" data-id6="' . $row["Product_ID"] . '" class="btn btn-xs btn-danger btn_delete">x</button></td> 
                   
                </tr>  
           ';
    }
    $output .= '  
           <tr>  
             <td><a href="insertimage.php"  name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</a>
           </tr>  
      ';
} else {
    $output .= '<tr>  
                    <td colspan="7">Data not Found</td>  
                 </tr>';
}
$output .= '</table>  


      </div>';
echo $output;
?>
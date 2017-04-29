<?php
session_start();
unset($_SESSION["product"]);
unset($_SESSION["errorproduct"]);
        $connect = mysqli_connect("localhost", "root", "", "data_web");
        $record_per_page = 8;
        $page = '';
        $output = '';
        if (isset($_POST["page"])) {
            $page = $_POST["page"];
        } else {
            $page = 1;
        }
        $start_from = ($page - 1) * $record_per_page;
        $query = "SELECT * FROM product ORDER BY Product_ID DESC LIMIT $start_from, $record_per_page";
        $result = mysqli_query($connect, $query);
       
        while ($row = mysqli_fetch_array($result)) {
    $output .= '  
               
                 <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                                <div class="thumbnail picture">
                                                   <img src="data:image/jpeg;base64,' . base64_encode($row['Image']) . '" height="200" width="100" "/>
                                                    <div class="caption">
                                                        <h4>' . $row["Product_Name"] . '</h4>
                                                        <h4>
                                                            $' . $row["Price"] . '
                                                             </h4>
                       
                                                        <input type="text" name="quantity" id="quantity' . $row["Product_ID"] . '" class="form-control" value="1" />  
                                                        <input type="hidden" name="hidden_name" id="name' . $row["Product_ID"] . '" value="' . $row["Product_Name"] . '" />  
                                                        <input type="hidden" name="hidden_price" id="price' . $row["Product_ID"] . '" value="' . $row["Price"] . '" />  
                                                        <input type="button" name="add_to_cart" id="' . $row["Product_ID"] . '" style="margin-top:5px;" class="btn btn-warning form-control add_to_cart" value="Add to Cart" />  
                                                    </div>
                                                </div> 		       
                 </div>
                 
                                            
      ';
}
     
        $page_query = "SELECT * FROM product ORDER BY Product_ID DESC";
        $page_result = mysqli_query($connect, $page_query);
        $total_records = mysqli_num_rows($page_result);
        $total_pages = ceil($total_records / $record_per_page);
        $output .='<div class="row container linkPage">';
        for ($i = 1; $i <= $total_pages; $i++) {
            $output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
        }
        $output .='</div>';
        echo $output;
    
?>
<?php

$connect = mysqli_connect("localhost", "root", "", "data_web");
      mysqli_set_charset($connect, "utf8");
$output = '';
$sql = "SELECT * FROM order_origin ORDER BY order_id ASC";
$result = mysqli_query($connect, $sql);
$output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">Order ID</th>  
                     <th width="15%">User ID</th>  
                     <th width="20%">Create Date</th>  
                     <th width="10%">Order Status</th>  
                     <th width="15%">Delete</th>  
                </tr>';
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $output .= '  
                <tr>  
                     <td>' .$row["order_id"].'</td>  
                     <td class="userid" data-id1="' . $row["order_id"] . '" contenteditable>' . $row["User_ID"] . '</td>  
                     <td class="creationdate" data-id2="' . $row["order_id"] . '">' . $row["Creation_Date"] . '</td> 
                     <td class="orderstatus" data-id3="' . $row["order_id"] . '" contenteditable>' . $row["Order_Status"] . '</td>  
                     
                                
                     <td><button type="button" name="delete_btn" data-id4="' .$row["order_id"] . '" class="btn btn-xs btn-danger btn_delete_report">x</button></td>  
                </tr>  
           ';
    }
    $output .= '  
           <tr>  
                <td></td>  
                <td id="userid" contenteditable></td>  
                <td id="creationdate"></td> 
                <td id="orderstatus" contenteditable></td> 
                <td><button type="button" name="btn_add" id="btn_add_report" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';
} else {
    $output .= '<tr>  
                    <td colspan="5">Data not Found</td>  
                 </tr>';
}
$output .= '</table></div>';
echo $output;
?>



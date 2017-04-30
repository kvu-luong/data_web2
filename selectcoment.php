<?php

$connect = mysqli_connect("localhost", "root", "", "data_web");
   mysqli_set_charset($connect, "utf8");
$output = '';
$sql = "SELECT * FROM comment ORDER BY CommentID ASC";
$result = mysqli_query($connect, $sql);
 
     
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $output .= '  
                <div class="row">
                    <div class="col-md-12">
                     <h4 class="username" data-id1="' . $row["CommentID"] . '">UserName: '.$row["User_Name"].'</h4>
                     <input type="textarea" class="coment" data-id2="' . $row["CommentID"] . '" value='. $row["Content"] .' readonly/> 
                     <h6>Date Post:'.$row["Date"].'</h6>   
                     </div>
                </div> 
           ';
    }
    $output .= '  
        <div class="row">
                    <div class="col-md-12">
                     <input type="textarea" id="coment" data-id2="' . $row["CommentID"] . '" contenteditable/>
                     <button type="button" name="btn_add_coment" id="btn_adduser" class="btn btn-xs btn-success">+</button>
                     </div>
                </div> 
       
      ';
}


echo $output;
?>



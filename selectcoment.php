<?php
session_start();
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
                     <textarea class="coment" data-id2="' . $row["CommentID"] . '" readonly>'. $row["Content"] .'</textarea> 
                     <h6 style="color:purple;">Date Post:'.$row["Date"].'</h6>
                     </div>
                </div> 
           ';
    }
    $output .= '  
        <div class="row">
                    <div class="col-md-12">
                     <textarea id="coment" class="coment" data-id2="' . $row["CommentID"] . '" contenteditable></textarea>
                     <button type="button" name="btn_add_coment" id="btn_add_coment" class="btn btn-xs btn-success">+</button>
                     </div>
                </div> 
       
      ';
}


echo $output;
?>



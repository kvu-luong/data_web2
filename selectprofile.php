<?php
session_start();
if(isset($_SESSION['username'])){
$connect = mysqli_connect("localhost", "root", "", "data_web");
   mysqli_set_charset($connect, "utf8");
$output = '';
$sql = "SELECT * FROM user where UserName='".$_SESSION['username']."'";
$result = mysqli_query($connect, $sql);
$output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="15%">User Name</th>  
                     <th width="20%">Password</th>  
                     <th width="15%">Email</th>  
                     <th width="10%">Phone</th>
                     <th width="20%">Address</th>
                     <th width="5%">Bank ID</th>
                   
                </tr>';
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $output .= '  
                <tr>  
                     
                     <td class="username" data-id1="' . $row["User_ID"] . '" contenteditable>' . $row["UserName"] . '</td>  
                     <td class="password" data-id2="' .$row["User_ID"]. '" contenteditable>' . $row["Password"] . '</td> 
                    
                     <td class="email" data-id3="' . $row["User_ID"] . '" contenteditable>' . $row["Email"] . '</td>  
                     <td class="phone" data-id4="' .$row["User_ID"] . '" contenteditable>' . $row["Phone"] . '</td>  
                     <td class="address" data-id5="' . $row["User_ID"] . '" contenteditable>' . $row["Address"] . '</td>
                     <td class="bankid" data-id6="' . $row["User_ID"] . '" contenteditable>' . $row["Bank_ID"] . '</td>
                </tr>  
           ';
    }
} else {
    $output .= '<tr>  
                    <td colspan="7">Data not Found</td>  
                 </tr>';
}
$output .= '</table></div>';
echo $output;
}

?>



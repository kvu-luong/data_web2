<?php

$connect = mysqli_connect("localhost", "root", "", "data_web");
   mysqli_set_charset($connect, "utf8");
$output = '';
$sql = "SELECT * FROM user ORDER BY User_ID ASC";
$result = mysqli_query($connect, $sql);
$output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">User ID</th>  
                     <th width="15%">User Name</th>  
                     <th width="20%">Password</th>  
                     <th width="10%">User Type</th>  
                     <th width="15%">Email</th>  
                     <th width="10%">Phone</th>
                     <th width="20%">Address</th>
                     <th width="5%">Bank ID</th>
                     <th width="5%">Delete</th>
                </tr>';
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $output .= '  
                <tr>  
                     <td>' .$row["User_ID"].'</td>  
                     <td class="username" data-id1="' . $row["User_ID"] . '" contenteditable>' . $row["UserName"] . '</td>  
                     <td class="password" data-id2="' . $row["User_ID"] . '" contenteditable>' . $row["Password"] . '</td> 
                     <td class="usertype" data-id3="' . $row["User_ID"] . '" contenteditable>' . $row["UserType"] . '</td>  
                     <td class="email" data-id4="' . $row["User_ID"] . '" contenteditable>' . $row["Email"] . '</td>  
                     <td class="phone" data-id5="' .$row["User_ID"] . '" contenteditable>' . $row["Phone"] . '</td>  
                     <td class="address" data-id6="' . $row["User_ID"] . '" contenteditable>' . $row["Address"] . '</td>
                     <td class="bankid" data-id7="' . $row["User_ID"] . '" contenteditable>' . $row["Bank_ID"] . '</td>
                                
                     <td><button type="button" name="delete_btn" data-id8="' .$row["User_ID"] . '" class="btn btn-xs btn-danger btn_delete_user">x</button></td>  
                </tr>  
           ';
    }
    $output .= '  
           <tr>  
                <td></td>  
                <td id="username" contenteditable></td>  
                <td id="password" contenteditable></td> 
                <td id="usertype" contenteditable></td> 
                <td id="email" contenteditable></td>  
                <td id="phone" contenteditable></td>  
                <td id="address" contenteditable></td> 
                <td id="bankid" contenteditable></td> 
                <td><button type="button" name="btn_add" id="btn_adduser" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';
} else {
    $output .= '<tr>  
                    <td colspan="9">Data not Found</td>  
                 </tr>';
}
$output .= '</table></div>';
echo $output;
?>



<?php  
 //cart.php  
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "data_web");  
 mysqli_set_charset($connect,"utf8");
 include_once 'C:\xampp\htdocs\store\DAO\UserDAO.php';
 ?>  
 <!DOCTYPE html>  
 <html>  
     <head>  
         <title>Order</title>  
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">  
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
         <link href="https://fonts.googleapis.com/css?family=Lato:300i,400,400i,700,700i,900,900i" rel="stylesheet">

         <script src="bs/vendor/bootstrap.js" type="text/javascript"></script>
         <link href="bs/vendor/font-awesome.css" rel="stylesheet" type="text/css"/>
         <script src="bs/vendor/jquery.easing.min.js" type="text/javascript"></script>
         <link href="bs/1.css" rel="stylesheet" type="text/css"/>
         <script src="bs/1.js" type="text/javascript"></script>
         <link href="bs/jquery-ui.css" rel="stylesheet" type="text/css"/>
         <script src="bs/jquery-ui.js" type="text/javascript"></script>
     </head>  
      <body>  
           <br />  
           <div class="container" style="width:800px;">  
                <?php  
                $user = new UserDAO;
                
                if(isset($_POST["place_order"]))  
                {  
                     if(isset($_SESSION["username"])){
                           $userID = $user->getUserIDbyName($_SESSION["username"]);
                        $insert_order = "  
                        INSERT INTO order_origin(User_ID, Creation_Date, Order_Status)  
                        VALUES('".$userID."', '".date('Y-m-d')."', 'pending')  
                        ";  
                        $order_id = "";  
                        if(mysqli_query($connect, $insert_order))  
                        {  
                             $order_id = mysqli_insert_id($connect);  
                        }  
                        $_SESSION["order_id"] = $order_id;  
                        $order_details = "";  
                        foreach($_SESSION["shopping_cart"] as $keys => $values)  
                        {  
                             $order_details .= "  
                             INSERT INTO order_details(order_id, product_name, product_price, product_quantity)  
                             VALUES('".$order_id."', '".$values["product_name"]."', '".$values["product_price"]."', '".$values["product_quantity"]."');  
                             ";  
                        }  
                        if(mysqli_multi_query($connect, $order_details))  
                        {  
                             unset($_SESSION["shopping_cart"]);  
                             echo '<script>alert("You have successfully place an order...Thank you")</script>';  
                             echo '<script>window.location.href="order.php"</script>';  
                        }  
                     }else{
                         echo '<script>alert("You have to login!")</script>';  
                         echo '<script>window.location.href="index.php"</script>';
                     } 
                }
                if(isset($_SESSION["order_id"]))  
                {  
                     $customer_details = '';  
                     $order_details = '';  
                     $total = 0;  
                     $query = '  
                     SELECT * FROM order_origin  
                     INNER JOIN order_details  
                     ON order_details.order_id = order_origin.order_id  
                     INNER JOIN user  
                     ON user.User_ID = order_origin.User_ID 
                     WHERE order_origin.order_id = "'.$_SESSION["order_id"].'"  
                     ';  
                     $result = mysqli_query($connect, $query);  
                     while($row = mysqli_fetch_array($result))  
                     {  
                          $customer_details = '  
                          <label>Name: '.$row["UserName"].'</label>  
                          <p>Address: '.$row["Address"].'</p>  
                          <p>Phone: '.$row["Phone"].'</p>  
                          <p>Email: '.$row["Email"].'</p>  
                          ';  
                          $order_details .= "  
                               <tr>  
                                    <td>".$row["product_name"]."</td>  
                                    <td>".$row["product_quantity"]."</td>  
                                    <td>".$row["product_price"]."</td>  
                                    <td>".number_format($row["product_quantity"] * $row["product_price"], 2)."</td>  
                               </tr>  
                          ";  
                          $total = $total + ($row["product_quantity"] * $row["product_price"]);  
                     }  
                     echo '  
                     <h3 align="center">Order Summary for Order No.'.$_SESSION["order_id"].'</h3>  
                     <div class="table-responsive">  
                          <table class="table">  
                               <tr>  
                                    <td><label>Customer Details</label></td>  
                               </tr>  
                               <tr>  
                                    <td>'.$customer_details.'</td>  
                               </tr>  
                               <tr>  
                                    <td><label>Order Details</label></td>  
                               </tr>  
                               <tr>  
                                    <td>  
                                         <table class="table table-bordered">  
                                              <tr>  
                                                   <th width="50%">Product Name</th>  
                                                   <th width="15%">Quantity</th>  
                                                   <th width="15%">Price</th>  
                                                   <th width="20%">Total</th>  
                                              </tr>  
                                              '.$order_details.'  
                                              <tr>  
                                                   <td colspan="3" align="right"><label>Total</label></td>  
                                                   <td>'.number_format($total, 2).'</td>  
                                              </tr>  
                                         </table>  
                                    </td>  
                               </tr>  
                          </table>  
                     </div>  
                     ';  
                }  
                ?>  
               <a href="index.php">Back To Home Page</a>
           </div>  
           
      </body>  
 </html> 
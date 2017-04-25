<?php
 session_start();
?>

<html lang="en">
    <head>
	<title> Cart page </title>
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
        <div class="container text-center">
        <div class="table-responsive" id="order_table">  
            <table class="table table-bordered">  
                <tr>  
                    <th width="40%">Product Name</th>  
                    <th width="10%">Quantity</th>  
                    <th width="20%">Price</th>  
                    <th width="15%">Total</th>  
                    <th width="5%">Action</th>  
                </tr>  
                <?php  
                if(!empty($_SESSION["shopping_cart"]))  
                {  
                $total = 0;  
                foreach($_SESSION["shopping_cart"] as $keys => $values)  
                {                                               
                ?>  
                <tr>  
                     <td><?php echo $values["product_name"]; ?></td>  
                     <td><input type="text" name="quantity[]" id="quantity<?php echo $values["product_id"]; ?>" value="<?php echo $values["product_quantity"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="form-control quantity" /></td>  
                     <td align="right">$ <?php echo $values["product_price"]; ?></td>  
                     <td align="right">$ <?php echo number_format($values["product_quantity"] * $values["product_price"], 2); ?></td>  
                     <td><button name="delete" class="btn btn-danger btn-xs delete" id="<?php echo $values["product_id"]; ?>">Remove</button></td>  
                </tr>  
                <?php  
                $total = $total + ($values["product_quantity"] * $values["product_price"]);  
                }  
                ?>  
                <tr>  
                    <td colspan="3" align="right">Total</td>  
                    <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                    <td></td>  
                </tr>  
                <tr>  
                    <td colspan="5" align="center">  
                        <form method="post" action="cart.php">  
                            <input type="submit" name="place_order" class="btn btn-warning" value="Place Order" />  
                        </form>  
                    </td>  
                </tr>  
                <?php  
                }  
                ?>  
            </table>  
        </div>
        </div> <!-- end container -->
    </body>
</html>
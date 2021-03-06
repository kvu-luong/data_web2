<?php
session_start();
include_once 'C:\xampp\htdocs\store\DAO\ProductDAO.php';
include_once 'C:\xampp\htdocs\store\model\ProductModel.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Index page </title>
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
        <div class="menutop">
            <div class="container">
                <i class="fa fa-car">FREE DELIVERY FOR BILL OVER 500k</i>
                <i class="fa fa-heart">24x7 ONLINE SUPPORT</i>
                <b class="navbar-right"><a href="">TIẾNG VIỆT</a> | <a href="">ENGLISH</a></b>
            </div>
        </div>
        <div class="menu">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">SMARTPHONE</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <form method="POST" action="ProductServlet.php" class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" name="productName" class="form-control" placeholder="Search">
                            </div>
                            <input type="hidden" name="method" value="search"/>
                            <button type="submit" name="search" class="btn btn-default">SEARCH</button>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                            <?php
                            if (isset($_SESSION['username'])) {
                                if(isset($_SESSION['usertype']) and ($_SESSION['usertype'] != 'admin')){
                                ?>  
                                <li><a data-toggle="modal" href="#profile"><span class="fa fa-user"></span>WELCOME - <?php echo $_SESSION['username']; ?></a></li>
                                <?php }else{
                                    header("Location:adminPage.php");
                                } ?>
                                <li>
                                    <form method="post" action="UserServlet.php">
                                        <button class="btn btn-link bt" name="method" value="logout"><span class="fa fa-sign-out"></span>LOGOUT</button>
                                    </form>
                                </li>
                                <?php
                            } else {
                                ?>  
                                <li> <a href="loginPage.php"><span class="fa fa-sign-in"></span>LOGIN</a></li>
                                <li><a href='registerPage.php'><span class="fa fa-users"></span> REGISTER</a></li>
                                <?php
                            }
                            ?>  
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
        </div><!-- end menu -->
        <div class="slideTop">
            <div class="container">
                <div id="carousel-id" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-id" data-slide-to="0" class=""></li>
                        <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                        <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item">
                            <img alt="slide1" src="bs/img/slide1.png">
                            <div class="container">
                                <div class="carousel-caption">

                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img alt="slide2" src="bs/img/slide2.jpg">
                            <div class="container">
                                <div class="carousel-caption">

                                </div>
                            </div>
                        </div>
                        <div class="item active">
                            <img alt="slide3" src="bs/img/slide3.jpg">
                            <div class="container">
                                <div class="carousel-caption">

                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img  alt="slide4" src="bs/img/slide4.jpg">
                            <div class="container">
                                <div class="carousel-caption">

                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                    <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            </div><!-- end container -->
        </div><!-- end slidetop -->

        <div class="noidung">
            <div class="container">
                <div class="col-md-3"> <!-- Sidebar -->

                    <div class="row">
                        <?php
                        $product = new ProductDAO();
                        $categoryINFO = $product->getAllBrand();
                        ?>

                        <div class="sidebar2">
                            <h3>SEARCH BY BRANDS</h3>
                            <?php
                            foreach ($categoryINFO as $category) {
                                ?>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="apple"><?php echo $category->categoryName; ?></label>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div><!-- end row2 -->
                    <div class="row">
                        <div class="pricefilter">
                            <h3> PRICE FILTER</h3>
                            <form action="" id="price">
                                <table>
                                    <tr>
                                        <th>Price:</th>
                                        <td><span id="spanOutput"></span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><div id="slider"></div></td>
                                    </tr>	
                                    <tr>
                                        <th><label for="txtMinPrice">Min Price</label></th>
                                        <td><input type="text" id="txtMinPrice"></td>
                                    </tr>

                                    <tr>
                                        <th><label for="txtMaxPrice"> Max Price</label></th>
                                        <td><input type="text" id="txtMaxPrice"></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                    <div class="row comment">
                        <h3>COMMENT</h3>
                        <div id="data_coment"></div>
                    </div>
                </div>
                <div class="col-md-9"><!-- content -->
                    <div class="row">
                        <div class="popularProduct">
                            <div class="col-md-12">

                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#product">Product</a></li>
                                    <li><a data-toggle="tab" href="#cart">Cart <span class="badge"><?php
                                                if (isset($_SESSION["shopping_cart"])) {
                                                    echo count($_SESSION["shopping_cart"]);
                                                } else {
                                                    echo '0';
                                                }
                                                ?></span></a></li>

                                </ul>

                                <div class="tab-content">
                                    <div id="product" class="tab-pane fade in active">
                                        <!--start content of product --> 

                                            <div  id="pagination_data"> </div>
                                      
                                    </div> <!-- end product tab -->
                                    <div id="cart" class="tab-pane fade">
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
                                                if (!empty($_SESSION["shopping_cart"])) {
                                                    $total = 0;
                                                    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
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
                                                            <form action="order.php" method="post">  
                                                                <input type="submit" name="place_order" class="btn btn-warning" value="Place Order" />  
                                                            </form> 

                                                        </td>  
                                                    </tr>  
                                                    <?php
                                                }
                                                ?>  
                                            </table>  
                                        </div>  
                                    </div> <!-- end cart tab -->

                                </div><!-- end nav-tabs -->
                            </div> <!-- end 12 col -->
                        </div> <!-- end popular -->
                    </div>
                    <div class="topbutton">
                        <div class="fa fa-arrow-up"></div>
                    </div>
                </div><!-- end 9cot -->
            </div>
        </div><!-- end noidung -->
        <!--modal profile -->
        <div class="modal fade" id="profile">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Profile</h4>
                </div>
                <div class="modal-body">
                    <div id="profile_data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> <!-- end modal profile -->
        <div class="footer">
            <div class="container text-center">
                <h4>Create by BEAST TEAM &copy Freelancer at VietNam</h4>
            </div>
        </div><!-- end footer -->
    </body>
</html>
<script>
    $(document).ready(function () {
        load_data();
        function load_data(page)
        {
            $.ajax({
                url: "pagination.php",
                method: "POST",
                data: {page: page},
                success: function (data) {
                    $('#pagination_data').html(data);
                }
            });
        }
        $(document).on('click', '.pagination_link', function () {
            console.log("luong khanh vu");
            var page = $(this).attr("id");

            load_data(page);
        });
        
             $(document).on('click', '.add_to_cart', function () {//on (click when that attribute from return data not in this page
    
            var product_id = $(this).attr("id");
            var product_name = $('#name' + product_id).val();
            var product_price = $('#price' + product_id).val();
            var product_quantity = $('#quantity' + product_id).val();
            var action = "add";
            if (product_quantity > 0)
            {
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        product_id: product_id,
                        product_name: product_name,
                        product_price: product_price,
                        product_quantity: product_quantity,
                        action: action
                    },
                    success: function (data)
                    {
                        $('#order_table').html(data.order_table);
                        $('.badge').text(data.cart_item);
                        alert("Product has been Added into Cart");
                    }
                });
            } else
            {
                alert("Please Enter Number of Quantity");
            }
        });//end add cart
        $(document).on('click', '.delete', function () {
            var product_id = $(this).attr("id");
            var action = "remove";
            if (confirm("Are you sure you want to remove this product?"))
            {
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    dataType: "json",
                    data: {product_id: product_id, action: action},
                    success: function (data) {
                        $('#order_table').html(data.order_table);
                        $('.badge').text(data.cart_item);
                    }
                });
            } else
            {
                return false;
            }
        });
        $(document).on('keyup', '.quantity', function () {
            var product_id = $(this).data("product_id");
            var quantity = $(this).val();
            var action = "quantity_change";
            if (quantity !== '')
            {
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    dataType: "json",
                    data: {product_id: product_id, quantity: quantity, action: action},
                    success: function (data) {
                        $('#order_table').html(data.order_table);
                    }
                });
            }
        }); //end remove and quantity


    });//end document ready
</script>  
<script>
    //this jquery for user profile
    $(document).ready(function(){
      function fetch_data()  
      {  
           $.ajax({  
                url:"selectprofile.php",  
                method:"POST",  
                success:function(data){  
                     $('#profile_data').html(data);  
                }  
           });  
      } 
      fetch_data();
           function edit_data_user(id, text, column_name)  
      {  
           $.ajax({  
                url:"edituser.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      };
         $(document).on('blur', '.username', function(){  
           var id = $(this).data("id1");  
           var username = $(this).text();  
           edit_data_user(id, username, "User Name");  
      });
         $(document).on('blur', '.password', function(){  
           var id = $(this).data("id2");  
           var password = $(this).val();
           
          
           edit_data_user(id,password+"vudeptrai", "Password");  
      });
         $(document).on('blur', '.email', function(){  
           var id = $(this).data("id3");  
           var email = $(this).text();  
            edit_data_user(id,email, "Email");  
      });
         $(document).on('blur', '.phone', function(){  
           var id = $(this).data("id4");  
           var phone = $(this).text();  
            edit_data_user(id,phone, "Phone");  
      });
         $(document).on('blur', '.address', function(){  
           var id = $(this).data("id5");  
           var address = $(this).text();  
            edit_data_user(id,address, "Address");  
      }); 
         $(document).on('blur', '.bankid', function(){  
           var id = $(this).data("id6");  
           var bankid = $(this).text();  
            edit_data_user(id,bankid, "Bank ID");  
      }); 
    });
</script>
<script>
    //for comment
     $(document).ready(function(){
      function fetch_data()  
      {  
           $.ajax({  
                url:"selectcoment.php",  
                method:"POST",  
                success:function(data){  
                     $('#data_coment').html(data);  
                }  
           });  
      } 
      fetch_data();
        $(document).on('click', '#btn_add_coment', function () {
            var coment = $('#coment').val();  //text get from td in slect.php
           
            if (coment == '')
            {
                alert("You should type somthing!");
                return false;
            }
            $.ajax({
                url: "insertcoment.php",
                method: "POST",
                data:{comment:coment},  
                dataType: "text",
                success: function (data)
                {
                    alert(data);
                    fetch_data();
                }
            });
        });
    });
</script>

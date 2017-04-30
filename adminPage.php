<?php
include_once 'C:\xampp\htdocs\store\DAO\UserDAO.php';
session_start();
?>
<html lang="en"><head>
        <title> Admin </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <script src="bs/vendor/bootstrap.js" type="text/javascript"></script>
        <script src="bs/vendor/jquery.easing.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="bs/vendor/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="bs/addmin.css" rel="stylesheet" type="text/css"/>
        <script src="bs/addmin.js" type="text/javascript"></script>
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900,900i" rel="stylesheet">
    </head>
    <body >

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="" class="navbar-brand btn btn-default" id="menu-toggle"><span class="fa fa-bars"></span></a>
                    <a class="navbar-brand" href="#"><b>SMART</b>PHONE</a>
                </div><!-- /.navbar-collapse -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if(isset($_SESSION['username'])){
                        ?>
                        <li><a class="welcome"><span class="fa fa-user"></span>WELCOME - <?php echo $_SESSION['username']; ?></a></li>
                        <li>
                                    <form method="post" action="UserServlet.php">
                                        <button class="btn btn-link bt" name="method" value="logout"><span class="fa fa-sign-out"></span>LOGOUT</button>
                                    </form>
                        </li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </nav> <!-- end navbar - top -->

        <div id="wrapper">		

            <!-- Sider bar -->
            <div class="siderbar">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                    <li><a data-toggle="tab" href="#product">Product</a></li>
                    <li><a data-toggle="tab" href="#user">User</a></li>
                    <li><a data-toggle="tab" href="#report">Report</a></li>
                </ul>
            </div><!-- end siderbar -->
            <div class="content-wrapper">
                <div class="container-fluid down">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                    <p class="text-center wel">Welcome to Our WebSite</p>
                                </div> <!-- end product tab -->


                                <div id="product" class="tab-pane fade">
                                    <div id="live_data"></div>
                                </div> <!-- end product tab -->


                                <div id="user" class="tab-pane fade">
                                    <div id="live_data_user"></div>
                                </div> <!-- end cart tab -->


                                <div id="report" class="tab-pane fade">
                                    <div id="live_data_report"></div>
                                </div> <!-- end report tab -->


                            </div><!-- end nav-tabs -->
                        </div>
                    </div> <!-- end popular -->
                </div>
            </div><!-- end 12 cot -->
        </div><!--  end container-fluid -->
    </div> <!-- end content-wrapper -->
</div><!-- end wrapper -->

</body>
</html>
<script>
    $(document).ready(function () {
        function fetch_data()
        {
            $.ajax({
                url: "select.php",
                method: "POST",
                success: function (data) {
                    $('#live_data').html(data);
                }
            });
        }
        fetch_data();
        $(document).on('click', '#btn_add', function () {
            var productname = $('#productname').text();  //text get from td in slect.php
            var categoryid = $('#category').text();
            // var image = $('#image').text();  
            var detail = $('#detail').text();
            var price = $('#price').text();

            if (productname == '')
            {
                alert("Enter Product Name");
                return false;
            }
            if (categoryid == '')
            {
                alert("Enter Category Id");
                return false;
            }
//           if(image == '')  
//           {  
//                alert("Please choose image");  
//                return false;  
//           }  
            if (detail == '')
            {
                alert("Enter Detail for Product");
                return false;
            }
            if (price == '')
            {
                alert("Enter Price for Product");
                return false;
            }
            $.ajax({
                url: "insert.php",
                method: "POST",
                data: {productname: productname, categoryid: categoryid, detail: detail, price: price},
                dataType: "text",
                success: function (data)
                {
                    alert(data);
                    fetch_data();
                }
            });
        });
        function edit_data(id, text, column_name)
        {
            $.ajax({
                url: "edit.php",
                method: "POST",
                data: {id: id, text: text, column_name: column_name},
                dataType: "text",
                success: function (data) {
                    alert(data);
                }
            });
        }
        ;
        $(document).on('blur', '.productname', function () {
            var id = $(this).data("id1");
            var productname = $(this).text();
            edit_data(id, productname, "Product Name");
        });
        $(document).on('blur', '.category', function () {
            var id = $(this).data("id2");
            var category = $(this).text();
            edit_data(id, category, "Category ID");
        });
        $(document).on('blur', '.detail', function () {
            var id = $(this).data("id4");
            var detail = $(this).text();
            edit_data(id, detail, "Detail");
        });
        $(document).on('blur', '.price', function () {
            var id = $(this).data("id5");
            var price = $(this).text();
            edit_data(id, price, "Price");
        });
        /* $(document).on('blur', '.last_name', function(){  
         var id = $(this).data("id3");  
         var image = $(this).text();  
         edit_data(id,image, "Image");  
         }); */

        $(document).on('click', '.btn_delete', function () {
            var id = $(this).data("id6");
            if (confirm("Are you sure you want to delete this?"))
            {
                $.ajax({
                    url: "delete.php",
                    method: "POST",
                    data: {id: id},
                    dataType: "text",
                    success: function (data) {
                        alert(data);
                        fetch_data();
                    }
                });
            }
        });
    });
</script>

<script>
    //this jquery for user
    $(document).ready(function () {
        function fetch_data()
        {
            $.ajax({
                url: "selectuser.php",
                method: "POST",
                success: function (data) {
                    $('#live_data_user').html(data);
                }
            });
        }
        fetch_data();
        $(document).on('click', '#btn_adduser', function () {
            var username = $('#username').text();  //text get from td in slect.php
            var password = $('#password').text();
            var usertype = $('#usertype').text();
            var email = $('#email').text();
            var phone = $('#phone').text();
            var address = $('#address').text();
            var bankid = $('#bankid').text();

            if (username == '')
            {
                alert("Enter User Name");
                return false;
            }
            if (password == '')
            {
                alert("Enter Password");
                return false;
            }
            if (usertype == '')
            {
                alert("Enter Usertype");
                return false;
            }
            if (email == '')
            {
                alert("Enter email");
                return false;
            }
            if (phone == '')
            {
                alert("Enter Phone");
                return false;
            }
            if (address == '')
            {
                alert("Enter Address");
                return false;
            }
            $.ajax({
                url: "insertuser.php",
                method: "POST",
                data: {username: username, password: password, usertype: usertype, email: email, phone: phone, address: address, bankid: bankid},
                dataType: "text",
                success: function (data)
                {
                    alert(data);
                    fetch_data();
                }
            });
        });
        function edit_data_user(id, text, column_name)
        {
            $.ajax({
                url: "edituser.php",
                method: "POST",
                data: {id: id, text: text, column_name: column_name},
                dataType: "text",
                success: function (data) {
                    alert(data);
                }
            });
        }
        ;
        $(document).on('blur', '.username', function () {
            var id = $(this).data("id1");
            var username = $(this).text();
            edit_data_user(id, username, "User Name");
        });
        $(document).on('blur', '.password', function () {
            var id = $(this).data("id2");
            var password = $(this).text();
            edit_data_user(id, password, "Password");
        });
        $(document).on('blur', '.usertype', function () {
            var id = $(this).data("id3");
            var usertype = $(this).text();
            edit_data_user(id, usertype, "User Type");
        });
        $(document).on('blur', '.email', function () {
            var id = $(this).data("id4");
            var email = $(this).text();
            edit_data_user(id, email, "Email");
        });
        $(document).on('blur', '.phone', function () {
            var id = $(this).data("id5");
            var phone = $(this).text();
            edit_data_user(id, phone, "Phone");
        });
        $(document).on('blur', '.address', function () {
            var id = $(this).data("id6");
            var address = $(this).text();
            edit_data_user(id, address, "Address");
        });
        $(document).on('blur', '.bankid', function () {
            var id = $(this).data("id7");
            var bankid = $(this).text();
            edit_data_user(id, bankid, "Bank ID");
        });

        $(document).on('click', '.btn_delete_user', function () {
            var id = $(this).data("id8");
            if (confirm("Are you sure you want to delete this?"))
            {
                $.ajax({
                    url: "deleteuser.php",
                    method: "POST",
                    data: {id: id},
                    dataType: "text",
                    success: function (data) {
                        alert(data);
                        fetch_data();
                    }
                });
            }
        });
    });
</script>
<script>
    //this jquery for report
    $(document).ready(function () {
        function fetch_data()
        {
            $.ajax({
                url: "selectreport.php",
                method: "POST",
                success: function (data) {
                    $('#live_data_report').html(data);
                }
            });
        }
        fetch_data();
        $(document).on('click', '#btn_add_report', function () {
            var userid = $('#userid').text();  //text get from td in slect.php
            var orderstatus = $('#orderstatus').text();
            if (userid == '')
            {
                alert("Enter User ID");
                return false;
            }
            if (orderstatus == '')
            {
                alert("Enter Order Status");
                return false;
            }
            $.ajax({
                url: "insertreport.php",
                method: "POST",
                data: {userid: userid, orderstatus: orderstatus},
                dataType: "text",
                success: function (data)
                {
                    alert(data);
                    fetch_data();
                }
            });
        });
        function edit_data_report(id, text, column_name)
        {
            $.ajax({
                url: "editreport.php",
                method: "POST",
                data: {id: id, text: text, column_name: column_name},
                dataType: "text",
                success: function (data) {
                    alert(data);
                }
            });
        }
        ;
        $(document).on('blur', '.userid', function () {
            var id = $(this).data("id1");
            var userid = $(this).text();
            edit_data_report(id, userid, "User ID");
        });
        $(document).on('blur', '.orderstatus', function () {
            var id = $(this).data("id3");
            var orderstatus = $(this).text();
            edit_data_report(id, orderstatus, "Order Status");
        });
        $(document).on('click', '.btn_delete_report', function () {
            var id = $(this).data("id4");
            if (confirm("Are you sure you want to delete this?"))
            {
                $.ajax({
                    url: "deletereport.php",
                    method: "POST",
                    data: {id: id},
                    dataType: "text",
                    success: function (data) {
                        alert(data);
                        fetch_data();
                    }
                });
            }
        });
    });
</script>
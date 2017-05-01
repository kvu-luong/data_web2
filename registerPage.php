<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Register Page</title>
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
        <div class="cover">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 col-md-push-4 regis" >
                    <h4>Welcome to Our WebSite</h4>
                    <form action="UserServlet.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" id="" name="UserName" placeholder="UserName" required>
                            <?php if (isset($_SESSION["erroruser"])) { ?>
                               <p style="font-size: 120%;color: red;font-weight: bold"><?php echo $_SESSION["erroruser"] ?></p>
                                <?php
                            }
                               unset($_SESSION["erroruser"]);
                            ?>           
                        </div>

                        <div class="form-group">
                            <input type="Password" class="form-control" id="" name="Password" placeholder="Password" required>
         
                        </div>

                        <div class="form-group">
                            <input type="Password" class="form-control" id="" name="Confirm" placeholder="Confirm Password" required>
                            <?php if (isset($_SESSION["errorconfirm"])) { ?>
                                <p style="font-size: 120%;color: red;font-weight: bold"><?php echo $_SESSION["errorconfirm"] ?></p>
                                <?php
                            }
                               unset($_SESSION["errorconfirm"]);
                            ?>                          
                        </div>

                        <div class="form-group">
                            <input type="Email" class="form-control" id="" name="Email" placeholder="Email" required>
                          
                        </div>

                        <div class="form-group">
                            <input type="tel" class="form-control" id="" name="Phone" placeholder="Phone" required>
                   
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="" name="Address" placeholder="Address"required>
                           
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control" id="" name="BankID" placeholder="BankID" required>
                            <span class="bankid"></span>
                        </div>                   

                    <input type="hidden" name="method" value="register"/>
                   <button type="submit" class="btn btn-success">REGISTER</button>
                    </form>
                </div> <!-- end col-md-12 -->
            </div> <!-- end row -->
        </div> <!-- end container -->
        </div>
    </body>
</html>
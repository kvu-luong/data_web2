<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en"><head>
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
<body >
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
    			<form class="navbar-form navbar-left" role="search">
    				<div class="form-group">
    					<input type="text" class="form-control" placeholder="Search">
    				</div>
    				<button type="submit" name="search" class="btn btn-default">SEARCH</button>
    			</form>
    			<ul class="nav navbar-nav navbar-right">
                            <?php  
                                if(isset($_SESSION['username']))  
                                {  
                            ?>  
                                <li><a href="#"><span class="fa fa-user"></span>WELCOME - <?php echo $_SESSION['username']; ?></a></li>
                                <li>
                                <form method="post" action="UserServlet.php">
                                    <button class="btn btn-link bt" name="method" value="logout"><span class="fa fa-sign-out"></span>LOGOUT</button>
                                </form>
                                </li>
                            <?php  
                                 }  
                                else  
                                  {  
                            ?>  
                                <li> <a href="loginPage.php"><span class="fa fa-sign-in"></span>LOGIN</a></li>
                            <?php  
    				 }  
                            ?>  
    				
    				
    				<li><a href="#"><span class="fa fa-shopping-cart"></span>CART</a></li>
    			</ul>
    		</div><!-- /.navbar-collapse -->
    	</div>
    </nav>
</div><!-- end menu -->
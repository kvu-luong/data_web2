<?php
include_once 'C:\xampp\htdocs\store\DAO\UserDAO.php';
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
		</div>
	</nav> <!-- end navbar - top -->
     
	<div id="wrapper">		

		<!-- Sider bar -->
		<div class="siderbar">
			<ul class="nav">
								
				<li><a href="#">Home</a></li>
				<li><a href="#">Product</a></li>
				<li><a href="#">User</a></li>
				<li><a href="#">Report</a></li>
			</ul>
		</div><!-- end siderbar -->
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h1>PRODUCT</h1>
						<div class="row text-center">
							<div class="theodoi">
								<div class="visit col-md-3">
									<i class="fa fa-dribbble"></i>
									<p>1222222</p>
									<p>Total visitor</p>
								</div>
								<div class="user visit col-md-3">
									<i class="fa fa-users"></i>
									<p>1222222</p>
									<p>Total user</p>
								</div>
								<div class="view visit col-md-3">
									<i class="fa fa-signal"></i>
									<p>1222222</p>
									<p>View</p>
								</div>
								<div class="online visit col-md-3">
									<i class="fa fa-heart"></i>
									<p>1222222</p>
									<p>Current online</p>
								</div>
							</div>
						</div>
					</div><!-- end 12 cot -->
				</div>
                            <div clas="row">
                                <div class="col-md-12">
                                    <table class="table-responsive">
                                        <tr>
                                            <th>Brand</th>
                                            <th>Product Name</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                     
                                    </table>
                                </div>
                            </div>
			</div><!--  end container-fluid -->
		</div> <!-- end content-wrapper -->		
	</div><!-- end wrapper -->
    
</body>
</html>
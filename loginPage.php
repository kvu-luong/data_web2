<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en"><head>
	<title> Login Page </title>
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
    <div class="cover">
   <div class="container text-center">
       <div class="row">
            <div class="col-md-4 col-md-push-4">
                <div id="box">
                    <h3 class="to">Login Form</h3>
                 <br />
                 <form method="post" action="UserServlet.php">
                  <div class="form-group">
                   <label>Username</label>
                   <input type="text" name="username" id="username" class="form-control" required placeholder="Username" />
                  </div>
                  <div class="form-group">
                   <label>Password</label>
                   <input type="password" name="password" id="password" class="form-control" required placeholder="Password"/>
                  </div>
                  <div>
                      <?php
                      if(isset($_SESSION["error"])){ ?>
                      <p style="font-size: 120%;color: red;font-weight: bold">Invalid username or password</p>
                      <?php    
                      }
                      unset($_SESSION["error"]);//when we reset pape delete particular session.
                      ?>
                  </div>
                  <div class="form-group">
                   <input type="hidden" name="method" value="login"/>
                   <button type="submit" class="btn btn-success">Login</button>
                  </div>
                  <div id="error"></div>
                 </form>
                 <br />
                </div>
           </div>
        </div> 
   </div><!-- end loginForm-->
    </div>
</body>
</html>
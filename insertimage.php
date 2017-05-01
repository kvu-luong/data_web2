<?php  
 $connect = mysqli_connect("localhost", "root", "", "data_web");  
 if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
      $productname = $_POST["productname"];
      $categoryid = $_POST["categoryid"];
      $detail = $_POST["detail"];
      $price = $_POST["price"];
      $query = "INSERT INTO product(Product_Name,Category_ID,Detail,Image,Price) VALUES('$productname', '$categoryid','$detail','$file','$price')";  
      echo $$_FILES["image"]["tmp"];
      if(mysqli_query($connect, $query))  
      {  
           echo '<script>alert("Image Inserted into Database")</script>';  
           header("Location:adminPage.php");
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Insert Image Product Page</title>  
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
      <body>  
           <br /><br /> 
           <div class="coveraddproduct">
           <div class="container" >  
               <div class="row">
                   <div class="col-md-6 col-md-push-3">
                <h3 align="center">Add Product</h3>  
                <br />  
                
                <form method="post" enctype="multipart/form-data">  
                    <table>
                        <tr>
                            <th>Product Name</th>
                            <td><input type="text" name="productname" id="productname" required=""></td>
                        </tr>
                        <tr>
                            <th>Category ID</th>
                            <td><input type="text" name="categoryid" id="categoryid" required/></td>
                        </tr>
                        <tr>
                            <th>Detail</th>
                            <td><textarea name="detail" id="detail" ></textarea></td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td> <input type="file" name="image" id="image" /> </td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td> <input type="number" name="price"  required=""/></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><input type="submit" name="insert" id="insert" value="ADD" class="btn btn-info" /></td>   
                        </tr>
                    </table>
                </form>
                   </div> <!-- end col -->
               </div> <!-- end row -->
           </div>  
           </div>
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  
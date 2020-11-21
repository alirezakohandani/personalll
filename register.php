<?php
 if(isset($_COOKIE["type"]))
 {
  header("Location: http://localhost/meetme/ela-admin-rtl");
 }
    include 'connect.php';?>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>MeetMe Personal</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
    
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css?v=2">
        <link rel="stylesheet" href="css/responsive.css">
    </head>
    <body class="register">
<section class="contact_area p_120">

<h2 style="text-align: center; color: black">Register</h2>
            <div class="container">
               
                <div class="row">
                    
                    <div class="col-lg-12">
                    
                        <form action="process/process-register.php" method="POST" enctype="multipart/form-data"> 
                  
                            <div class="form-group">
                            <lable class="register-color">Username:</lable>
                            <input type="text" class="form-control register-border" placeholder="Enter username" name="username" required>
                            </div>

                            <div class="form-group">
                            <lable class="register-color">Email:</lable>
                            <input type="text" class="form-control register-border" placeholder="Enter email" name="email" required>
                            </div>

                            <div class="form-group">
                            <lable class="register-color">Password:</lable>
                            <input type="password" class="form-control register-border" placeholder="Enter password" name="password" required>
                            </div>

                  
                            <div class="form-group">
                            <lable class="register-color">image:<br></lable>
                            <input type="file" name="image">
                            </div>

                            <input style="width: 100%" type="submit" class="btn btn-primary register-border" name="ok"/> 
                    
                        </form>
                        <a style="text-align: center; font-size: 1.5em" class="nav-link" href="login.php">Login</a>
                    </div>
                </div>
            </div>
        </section>

    </body>
</html>
<?php
 if(isset($_COOKIE["type"]))
 {
  header("Location: http://localhost/meetme/panel.php");
 }


    include 'connect.php';

    if (isset($_POST["ok"])) {
        $folder = "registeruploads/";
        $image = $_FILES['image']['name'];
        $path = $folder . $image;
        $target_file = $folder.basename($_FILES['image']['name']);

        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        $allowed = array('jpeg', 'png' , 'jpg');
        $filename = $_FILES['image']['name'];

        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";
        }
        else {
            move_uploaded_file($_FILES['image'] ['tmp_name'], $path);
            $sth=$con->prepare("INSERT INTO register(image)VALUES(:image)");
            $sth->bindParam(':image', $image);
            $sth->execute();
        }
        $sql = "INSERT INTO register (username, password, email, image)
         VALUES ('".$_POST["username"]."','".md5($_POST["password"])."','".$_POST["email"]."', '$image')";
        if ($con->query($sql)) {
        //   echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
        header("Location: http://localhost/MEETME/panel.php");
          }
          else{
          echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
          }
          
          $pdo = null;
    }


?>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>MeetMe Personal</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/animate-css/animate.css">
        <link rel="stylesheet" href="vendors/popup/magnific-popup.css">
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
                    </div>
                </div>
            </div>
        </section>
           <!--================Contact Success and Error message Area =================-->
           <div id="success" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                        </button>
                        <h2>Thank you</h2>
                        <p>Your message is successfully sent...</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals error -->

        <div id="error" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                        </button>
                        <h2>Sorry!</h2>
                        <p> Something went wrong </p>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Contact Success and Error message Area =================-->
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/popup/jquery.magnific-popup.min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendors/counter-up/jquery.counterup.min.js"></script>
        <!-- contact js -->
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/contact.js"></script>
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="js/gmaps.min.js"></script>
        <script src="js/theme.js"></script>
    </body>
</html>
<?php
use PHPMailer\PHPMailer\PHPMailer;



    include 'connect.php';
    if(isset($_POST['ok'])) 

    { 
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //SMTP Setting
        $mail->isSMTP();
        $mail->Host= "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "alireza.ko73@gmail.com";
        $mail->Password = "@lirezakohandani0371054222";
        $mail->Port = 465; //587
        $mail->SMTPSecure = "ssl";//tls

        //Email Setting
        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress("alirezakohandani377@yahoo.com");
        $mail->Subject = $subject;
        $mail->Body = $message;

        if ($mail->send()) {
            $response = "Email is sent!";
        }
        else {
            $response = "Somthing is wrong: <br> <br>" . $mail->ErrorInfo;
            exit(json_encode(array("response"=>$response)));
        }


   
    $sql = "INSERT INTO ContactUs (name, email, subject, message)
             VALUES ('".$_POST["name"]."','".$_POST["email"]."','".$_POST["subject"]."', '".$_POST["message"]."')";
            if ($con->query($sql)) {
              echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
              }
              else{
              echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
              }
              
              $pdo = null;
    
    } 
    
    
    

?>
<!doctype html>
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
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        <?php include 'header.php' ?>
        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="box_1620">
				<div class="banner_inner d-flex align-items-center">
					<div class="container">
						<div class="banner_content text-center">
							<h2>Contact Us</h2>
							<div class="page_link">
								<a href="index.html">Home</a>
								<a href="contact.html">Contact Us</a>
							</div>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Contact Area =================-->
        <section class="contact_area p_120">
            <div class="container">
                <div id="mapBox" class="mapBox" 
                    data-lat="40.701083" 
                    data-lon="-74.1522848" 
                    data-zoom="13" 
                    data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia."
                    data-mlat="40.701083"
                    data-mlon="-74.1522848">
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="contact_info">
                            <div class="info_item">
                                <i class="lnr lnr-home"></i>
                                <h6>Tehran, Iran</h6>
                                <p>my city</p>
                            </div>
                            <div class="info_item">
                                <i class="lnr lnr-phone-handset"></i>
                                <h6><a href="#">0912-9750492</a></h6>
                                <p>Alirezas phone number</p>
                            </div>
                            <div class="info_item">
                                <i class="lnr lnr-envelope"></i>
                                <h6><a href="#">info@alirezakohandani.ir</a></h6>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <!-- <form class="row contact_form"  method="POST" id="contactForm">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="username111" placeholder="Enter your name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="submit" value="submit" class="btn submit_btn" name="ok">Send</button>
                            </div>
                        </form> -->
                        <form method="POST" enctype="multipart/form-data"> 

                            <div class="form-group">
                            <lable>Username:</lable>
                            <input type="text" class="form-control" placeholder="Enter name" name="name" required>
                            </div>

                            <div class="form-group">
                            <lable>Email:</lable>
                            <input type="text" class="form-control" placeholder="Enter email" name="email" required>
                            </div>

                            <div class="form-group">
                            <lable>Subject:</lable>
                            <input type="text" class="form-control" placeholder="Enter subject" name="subject" required>
                            </div>

                            <div class="form-group">
                            <lable>message:</lable>
                            <input type="text" class="form-control" placeholder="Enter message" name="message" required>
                            </div>

                            <input type="submit" class="btn btn-primary" name="ok"/> 

                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--================Contact Area =================-->
        
        <!--================Footer Area =================-->
        <?php include 'footer.php' ?>                   
        <!--================End Footer Area =================-->
       
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
                        <h2>Sorry !</h2>
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
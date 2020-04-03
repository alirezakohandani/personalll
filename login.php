<?php
 session_start();

 $username = $_SESSION['username'];
 $password = md5($_SESSION['password']);

 
//login.php
/**
 * Start the session.
 */
 

/**
 * Include our MySQL connection.
 */
include 'connect.php';


if(isset($_COOKIE["type"]))
{
 header("location:panel.php");
}

$message = '';

if(isset($_POST["login"]))
{
 if(empty($_POST["username"]))
 {
  $message = "<div class='alert alert-danger'>Both Fields are required</div>";
 }
 else
 {
  $query = "SELECT * FROM register WHERE username = :username";
  $statement = $con->prepare($query);
  $statement->execute(
   array(
    'username' => $_POST["username"]
    
   )
  );
 
  $count = $statement->rowCount();
  if($count > 0)
  {
   $result = $statement->fetchAll();
   foreach($result as $row)
   {

    if(md5($_POST["password"]) == $row["password"]) {

     setcookie("type", $_POST['username'], time()+3600, "/");
     header("location:panel.php");
    }
    else
    {
        echo "username or password wrong";
    }
   }
  }
  else
  {
    echo "username or password is wrong";
}
 }
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
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>
    <body>
    <section class="contact_area p_120">
        <h2 style="text-align: center; color: #766dff">Login</h2>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
        <form action="process/process-login.php" method="POST">
            
            <div class="form-group">
            <label>Username:</label>
            <input type="text" class="form-control" placeholder="please enter your username..." id="username" name="username"><br>
            </div>

            <div class="form-group">
            <label>Password:</label>
            <input type="password" class="form-control" placeholder="please enter your password..." id="password" name="password"><br>
            </div>
            
            <input style="width: 100%" type="submit" class="btn btn-primary" value="Login" name="login">
        </form>
</div>
</div>
</div>
</section>
    </body>
</html>
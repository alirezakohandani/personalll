<?php

session_start();

include 'connect.php';

if (isset($_POST['ok']))
 {
    $folder ="newsuploads/"; 

$image = $_FILES['image']['name']; 

$path = $folder . $image ; 

$target_file=$folder.basename($_FILES["image"]["name"]);


$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);


$allowed=array('jpeg','png' ,'jpg');
$filename=$_FILES['image']['name']; 

$ext=pathinfo($filename, PATHINFO_EXTENSION); 
if(!in_array($ext,$allowed)) 

{ 

 echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";

}

else{ 

move_uploaded_file( $_FILES['image']['tmp_name'], $path); 

$sth=$con->prepare("INSERT INTO news(image)values(:image) "); 

$sth->bindParam(':image',$image); 

$sth->execute(); 

} 
    $sql = "INSERT INTO news(subject,description,image)
    VALUES('".$_POST["subject"]."','".$_POST["desc"]."', '$image')";
    if ($con->query($sql)) {
        header("Location: http://localhost/meetme/blog.php");
    }
    else{
        echo "your post dont send!!" . "<br>" . "please check";
    }
    $pdo = null;
 }
   
//for cookie
if(!isset($_COOKIE["type"]))
{
 header("location:login.php");
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
        <link rel="stylesheet" href="vendors/flaticon/flaticon.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>
    <body>
    <section>
<div class="container">
<div class="row">
<div class="col-lg-9" style="background-color:#007bff">
<form method="POST" enctype="multipart/form-data">
<lable>Add your subject:</lable>
<input type="text" name="subject" placeholder="Enter your subject">
<br>

<lable>Add your description:</lable>
<input type="text" name="desc" placeholder="Enter your description">
<br>

<lable>Add your image</lable>
<input type="file" name="image">
<br>

<input type="submit" name = "ok" value="publish">

</form>

</div>
    <div class="col-lg-3" style="background-color: #6610f2">
        <img src="registeruploads/download.jpeg" style="border-radius: 50%; width: 100%; height: 210px">
        <?php
        if(isset($_COOKIE["type"]))
   {
    echo '<h2 align="center">HI ' . $_COOKIE['type'] . '</h2>';
   }
?>
<ul style="float:right">
<li><a href="" id="article">مقاله</a></li>
</ul>
    </div>
    </div>
</div>
</section>
    </body>

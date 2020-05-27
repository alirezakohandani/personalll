<?php

session_start();

include 'connect.php';
include 'vendor/autoload.php';
Hekmatinasser\Verta\VertaServiceProvider::class;   
Hekmatinasser\Verta\Verta::class;
use Hekmatinasser\Verta\Verta;
use Carbon\Carbon;

$v = new Verta();

if (isset($_POST['ok'])) {
    $folder = "newsuploads/";

    $image = $_FILES['image']['name'];

    $path = $folder . $image;

    $target_file = $folder . basename($_FILES["image"]["name"]);


    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


    $allowed = array('jpeg', 'png', 'jpg');
    $filename = $_FILES['image']['name'];

    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {

        echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";
    } else {

        move_uploaded_file($_FILES['image']['tmp_name'], $path);

        $sth = $con->prepare("INSERT INTO news(image)VALUES(:image) ");

        $sth->bindParam(':image', $image);

        $sth->execute();
    }
    $date = $_POST["date"];
    $sql = "INSERT INTO news(subject,description,category,image,createdat)
    VALUES('" . $_POST["subject"] . "','" . $_POST["desc"] . "','" . $_POST["category"] . "', '$image' , '$date')";
    if ($con->query($sql)) {
        header("Location: http://localhost/meetme/blog.php");
    } else {
        echo "your post dont send!!" . "<br>" . "please check";
    }
    $pdo = null;
}

//for cookie
if (!isset($_COOKIE["type"])) {
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
                <div class="col-lg-9">
                    <h2 style="text-align: center">مقاله</h2>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <lable>Add your subject:</lable>
                            <input class="form-control" type="text" name="subject" placeholder="Enter your subject">
                        </div>
                        <div class="form-group">
                            <lable>Add your category:</lable>
                            <select class="form-control" name="category">
                                <?php $select = $con->prepare("SELECT * FROM category");
                                $select->setFetchMode(PDO::FETCH_ASSOC);
                                $select->execute(); ?>
                                <?php
                                while ($data = $select->fetch()) {

                                ?>

                                    <option value="<?= $data["category"] ?>"><?= $data["category"] ?></option>

                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">

                            <lable>Add your description:</lable>
                            <textarea class="form-control" name="desc" rows="10" placeholder="Enter your description"></textarea>
                            <br>
                        </div>
                        <div class="form-group">
                            <lable>Add your image</lable>
                            <input class="form-control" type="file" name="image">

                            <input type="hidden" name="date" value="<?= Carbon::now(); ?>">

                        </div>
                        <input class="btn btn-success" style="width: 100%" type="submit" name="ok" value="publish" width="100%">

                    </form>

                </div>
                <div class="col-lg-3" style="border: 1px solid black">
                    <?php
                    $select = $con->prepare("SELECT image,username FROM users");
                    $select->setFetchMode(PDO::FETCH_ASSOC);
                    $select->execute();
                    while ($data = $select->fetch()) {
                        if ($data['username'] == $_COOKIE["type"]) {
                            $image = $data['image'];

                            echo "<img src='registeruploads/$image' style='border-radius: 50%; width: 100%; height: 210px; box-shadow: 3px 3px 3px gray; border: 1px solid black'>";
                        }
                    }
                    ?>

                    <?php

                    echo '<h2 align="center">HI ' . $_COOKIE['type'] . '</h2>';

                    ?>
                    <ul style="float:right">
                        <li><a href="" id="article">مقاله</a></li>
                        <li><a href="">مشاهده قیمت بیت کوین</a></li>
                        <li><a href="">مشاهده وضعیت مقالات ارسالی</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
    
</body>
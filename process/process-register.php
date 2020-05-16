<?php
 if(isset($_COOKIE["type"]))
 {
  header("Location: http://localhost/meetme/panel.php");
 }
    include '../connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
      if (isset($_POST["ok"])) {
        //upload image
        $folder = "../registeruploads/";
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
        //password validation
        if (!empty($_POST["password"])) {
            if (strlen($_POST["password"]) < 8 ) {
                echo "Your Password Must Contain At Least 8 Characters!";
                die();
            }
        }
       //username validation
        if (isset($_POST["username"])) {
            $sth = $con->prepare("SELECT username FROM register");
            $sth->execute();
            $result = $sth->fetchAll();
            foreach($result as $r => $u) {
             $user[] = $u["username"];
            }
            if(in_array($_POST["username"], $user)) {
                echo "username already registered";
            }
             else {
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
           
        }
       
    }
    } else {
        echo "please dont change request method";
    }

?>
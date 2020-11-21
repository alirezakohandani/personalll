<?php
 if(isset($_COOKIE["type"]))
 {
  header("Location: http://localhost/meetme/ela-admin-rtl");
 }
    include '../connect.php';
    include '../globals/functions.php';
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST["ok"])) {

        //password validation
        if (!empty($password)) {
            if (strlen($password) < 8 ) {
                echo "Your Password Must Contain At Least 8 Characters!";
                die();
            
            }
        }

        //email validation 
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "email check";
            die();
        }

       //username validation
        if (isset($username)) {
            $result_username = select_field("username", "register");
            foreach($result_username as $r => $u) {
             $user[] = $u["username"];
            }
            if(in_array($username, $user)) {
                echo "username already registered";
                die();
            }
          }

           if (!preg_match('/^\w{5,}$/', $username)) {
            echo "please, change username";
            die();
            }
         //email validation
        if (isset($email)) {
            $result_email = select_field("email", "register");
            foreach($result_email as $r => $e) {
             $emails[] = $e["email"];
            }
            if(in_array($email, $emails)) {
                echo "email already registered";
                die();
            }
          }

         

          //check if image name not repeat
          $result = select_field("image", "register");
          foreach($result as $key => $value) {
              $images[] = $value["image"];
          }
            if (!in_array($_FILES['image']['name'], $images)) {
      
        //upload image
         $folder = "../images/registeruploads/";
         $image = $_FILES['image']['name'];
         $path = $folder . $image;
         $target_file = $folder.basename($_FILES['image']['name']);
         $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
         $allowed = array('jpeg', 'png' , 'jpg');
         $filename = $_FILES['image']['name'];
         $ext = pathinfo($filename, PATHINFO_EXTENSION);
        // check file
    }
    else {
        $folder = "../images/registeruploads/";
         $image = md5(rand(1,100)) . "-" . $_FILES['image']['name'];
         $path = $folder . $image;
         $target_file = $folder.basename($_FILES['image']['name']);
         $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
         $allowed = array('jpeg', 'png' , 'jpg');
         $filename = $_FILES['image']['name'];
         $ext = pathinfo($filename, PATHINFO_EXTENSION);
    }

            if (!in_array($ext, $allowed)) {
                echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";
                die();
            }
            else {
                move_uploaded_file($_FILES['image'] ['tmp_name'], $path);
            }
          
              
        
                
                $sql = "INSERT INTO register (username, password, email, image)
                VALUES ('".$_POST["username"]."','".md5($_POST["password"])."','".$_POST["email"]."', '$image')";
               if ($con->query($sql)) {
               //   echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
               header("Location: http://localhost/MEETME/ela-admin-rtl");
                 }
        
                 else{
                 echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
                 }  
                 $pdo = null;
            
    }
    } 
    else {
        echo "please dont change request method";
    }

?>
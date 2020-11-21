<?php
session_start();
$username = $_POST["username"]; 
$password = $_POST["password"];
$pass_hash = md5($password);

include '../connect.php';
include '../globals/functions.php';

if(isset($_COOKIE["type"]))
{
 header("location:../ela-admin-rtl");
}

if(isset($_POST["login"]))
{
 if(empty($username) && empty($password))
 {
    echo "<div class='alert alert-danger'>Both Fields are required</div>";
    die();
 }
  
    $query = "SELECT * FROM register WHERE username = :username";
    $statement = $con->prepare($query);
    $statement->execute(
     array(
      'username' => $_POST["username"]
     )
    );
    
    $count = $statement->rowCount();
    $result = $statement->fetchAll();

    //check username exists
    if ($count == 0) {
     echo "username not found";
     die();
    }

     foreach($result as $row)
     {
      if($username == $row["username"] && $pass_hash == $row["password"]) {
      setcookie("type", $username, time()+3600, "/");
      header("location:../ela-admin-rtl");
      }
      else
      {
          echo "username or password wrong";
      }
     }
 }
?>
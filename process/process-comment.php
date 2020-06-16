<?php

use Illuminate\Support\Facades\Redirect;

include '../init.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["sendcomment"])) {
        $post_id = $_POST["hid"];
        $comment_contetnt = $_POST["comment1"];
        $sql = "INSERT INTO commen1 (commentt, id) 
        VALUES('$comment_contetnt', '$post_id')";
        if ($con->query($sql)) {
             
              echo "<script type= 'text/javascript'>alert('New Comment Inserted Successfully')</script>";
              header("Location: ../blog.php");
              }
              else{
              echo "comment not insert";
              }
              $pdo = null;
    }
}
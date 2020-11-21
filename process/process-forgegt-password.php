<?php

use Illuminate\Support\Facades\Redirect;

include '../connect.php';
include '../globals/functions.php';

$email = $_POST["email"];
$password = $_POST["password"];
$re_password = $_POST["repassword"];

if ($_POST["submit"]) {
    if ($password !== $re_password) {
        header( "refresh:3;url=../forget-password.php" );
        echo "you must be enter equal password and repassword";
    }
    else{
        $register_data = select_field_register("register", "email", $email);
        $email_register = $register_data[0]["email"];
        $id_register = $register_data[0]["id"];

        if ($email == $email_register) {
            update_password_register("register", $password, $id_register); 
        }
        else {
            header( "refresh:3;url=../forget-password.php" );
            echo "your email is not valid";
        }
    }
}

<?php

function get_url($uri = '') {
    return "$uri";
}

//
function select_field_register($table_name,$field, $email) {
   include 'connect.php';
   $query = "SELECT * FROM $table_name WHERE $field = :email";
   $statement = $con->prepare($query);
   $statement->execute(
       array(
           'email' => $_POST["email"]
          )
   );
   $result = $statement->fetchAll();
   return $result;

}

//update password (Forget password)
function update_password_register($table_name, $password,$id_register) {
    include 'connect.php';
    $password_hash = md5($password);
    $sql = "UPDATE $table_name SET password='$password_hash'  WHERE id='$id_register'";
    $stmt = $con->prepare($sql);
   if($stmt->execute()) {
       echo "change your password";
       header( "refresh:3;url=../register.php" );
     
   }
   else {
       echo "not change password";
   }
}
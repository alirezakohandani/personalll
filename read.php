
 
<?php include 'init.php';?>
<?php
$uri = $_SERVER["REQUEST_URI"];
//give last part URI -- $data_id(post id)
$end = end(explode('/', $uri));

    $select = $con->prepare("SELECT * FROM news where id = $end");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute(); 
    while($data = $select->fetch()) {
        $subject = $data["subject"];
        $desc = $data["description"];
    }
    //display full post
    echo "<h1>$subject</h1><br>";
    echo $desc;
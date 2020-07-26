
 
<?php include 'init.php';?>
<?php
error_reporting(0);
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
    ?>
    <h1 style= 'text-align: center'><?= $subject ?></h1><br>
    <h4><?= $desc ?></h4>
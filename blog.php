<!--================Header Menu Area =================-->

<?php include 'header.php'; ?>
<?php include 'connect.php'; ?>
<?php include 'connect.php';
include 'vendor/autoload.php';
Hekmatinasser\Verta\VertaServiceProvider::class;   
Hekmatinasser\Verta\Verta::class;
use Hekmatinasser\Verta\Verta;?>
<!--================Header Menu Area =================-->

<!--================Home Banner Area =================-->
<section class="home_banner_area blog_banner">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="blog_b_text text-center">
                <h2> Articles <br /> </h2>
                <p></p>
                <a class="white_bg_btn" href="#">View More</a>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->


<!--================Blog Categorie Area =================-->
<br>
<h1 style="text-align:center">مقالات</h1>
<hr>
<br>
<!-- Search form -->
<div class="col-md-4">
    <div class="md-form mt-0">
        <form action="blog.php" method="GET">
            <input class="form-control" name="s" type="text" placeholder="Search" aria-label="Search">
            <form>
    </div>
</div>
<br>
<?php
if (isset($_GET["s"])) {
    $select = $con->prepare("SELECT subject,description FROM news");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
    $search = $_GET["s"];
    $desc = array();
    while ($data = $select->fetch()) {
        $subject[] = $data['subject'];
        $desc[] = $data['description'];
    }

    $find_post = array();
    foreach ($desc as $post) {
        if (strpos($post, $search) !== false) {
            $find_post[] = $post;
        }
    }

?>
    <section class='blog_area'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-8'>
                    <div class='blog_left_sidebar'>
                        <article class='row blog_item'>
                            <?php for ($i = 0; $i < sizeof($find_post); $i++) : ?>
                                <div class='col-md-9'>
                                    <div class='blog_post'>
                                        <!-- <img src='newsuploads/' style='width:100%'> -->
                                        <div class='blog_details'>
                                            <h2>result serarch about <?= "<b>$search</b>" ?></h2>
                                            <p><?php echo $find_post[$i]; ?> </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </article>
                    </div>
                </div>
            </div>
    </section>
<?php
} else {
    //display posts
    $select = $con->prepare("SELECT * FROM news");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute(); 
    while ($data = $select->fetch()) :
        $image = $data['image'];
        $date = $data['createdat'];
        $date_verta = verta::createTimestamp($date);
        
    ?>
        <section class='blog_area'>
            <div class='container'>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='blog_left_sidebar'>
                            <article class='row blog_item'>
                                <div class='col-md-9'>
                                    <div class='blog_post'>
                                        <img src='newsuploads/<?php echo $image ?>' style='width:100%'>
                                        <div class='blog_details'>
                                            <a href='single-blog.html'>
                                                <h2 style="text-align: right"><?php echo $data['subject'] ?> </h2>
                                            </a>
                                            <p style="text-align: right"><?php echo $data['description'] ?></p>
                                            <hr>
                                        </div>
                                        <?php
                                        $post_id = $data["id"];
                                        $select1 = $con->prepare("SELECT * FROM commen1 where id IN ('$post_id')");
                                        $select1->setFetchMode(PDO::FETCH_ASSOC);
                                        $select1->execute();
                                        while ($data = $select1->fetch()) {
                                            echo  $data["commentt"] . "<br>";
                                        }

                                        ?>
                                        <form method="POST" action="blog.php">
                                            <input type="text" name="comment1" placeholder="enter your comment">
                                            <input type="submit" name="sendcomment" value="submit">

                                        </form>

                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='blog_info text-right'>
                                        <div class='post_tag'>
                                            <p>category is: <a class='active' href='#'><?= $data["category"]; ?></a></p>

                                        </div>

                                        <!-- <div class='post_tag'>
                                            <a href='#'>Food,</a>
                                            <a class='active' href='#'>Technology,</a>
                                            <a href='#'>Politics,</a>
                                            <a href='#'>Lifestyle</a>
                                        </div> -->
                                        <ul class='blog_meta list'>
                                            <li><a href='#'>Alireza Kohandani<i class='lnr lnr-user'></i></a></li>
                                            <li><a href='#'><?= $date_verta; ?><i class='lnr lnr-calendar-full'></i></a></li>
                                            <!-- <li><a href='#'>1.2M Views<i class='lnr lnr-eye'></i></a></li>
                                            <li><a href='#'>06 Comments<i class='lnr lnr-bubble'></i></a></li> -->
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
        </section>

        <!--                                            
                        
//    echo "<h2 style='text-align:center; color: gray'>" . $data['subject'] . "</h2>" . "<br>"; 
//    echo "<p style='text-align:center'>" . $data['description'] . "</p>" . "<br>";
//    $image = $data['image'];
//    echo "<img src='newsuploads/$image' style='display: block; margin-left: auto; margin-right:auto; width:50%'>";  -->

<?php
    endwhile;
}
// if (isset($_POST["sendcomment"])) {

//             $sql = "INSERT INTO commen1 (commentt, id)
//             VALUES ('".$_POST["comment1"]."', '$post_id')";
//            if ($con->query($sql)) {
//             echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";


//              }
//              else{
//              echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
//              }
//             } 
?>



<!--================End Blog Area =================-->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/stellar.js"></script>
<script src="vendors/lightbox/simpleLightbox.min.js"></script>
<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="vendors/isotope/isotope.pkgd.min.js"></script>
<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="vendors/popup/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="vendors/counter-up/jquery.waypoints.min.js"></script>
<script src="vendors/counter-up/jquery.counterup.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/theme.js"></script>
</body>

</html>
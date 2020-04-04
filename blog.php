<!--================Header Menu Area =================-->
<?php include 'header.php'; ?>
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
<h1 style="text-align:center">NEWS & ARTICLES</h1>
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
include 'connect.php';

if (isset($_GET["s"])) {
    $select = $con->prepare("SELECT description FROM news");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
    $search = $_GET["s"];
    $desc =array();
    while ($data = $select->fetch()) {
        $desc[] = $data['description'];

    }
        $find_post = array();
        foreach($desc as $post) {
            if (strpos($post, $search) !== false):
                $find_post[] = $post; ?>
            
             <section class='blog_area'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-8'>
                    <div class='blog_left_sidebar'>
                        <article class='row blog_item'>
                            <div class='col-md-3'>
                                <div class='blog_info text-right'>
                                    <div class='post_tag'>
                                        <a href='#'>Food,</a>
                                        <a class='active' href='#'>Technology,</a>
                                        <a href='#'>Politics,</a>
                                        <a href='#'>Lifestyle</a>
                                    </div>
                                    <ul class='blog_meta list'>
                                        <li><a href='#'>Mark wiens<i class='lnr lnr-user'></i></a></li>
                                        <li><a href='#'>12 Dec, 2017<i class='lnr lnr-calendar-full'></i></a></li>
                                        <li><a href='#'>1.2M Views<i class='lnr lnr-eye'></i></a></li>
                                        <li><a href='#'>06 Comments<i class='lnr lnr-bubble'></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class='col-md-9'>
                                <div class='blog_post'>
                                    <img src='newsuploads/' style='width:100%'>
                                    <div class='blog_details'>
                                        <a href='single-blog.html'>
                                            <h2><?php ?> </h2>
                                        </a>
                                        <p> <?php 
                                         ?></p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
    </section>
        
            <?php endif;} ?>
            <?php
for ($i=0; $i < sizeof($find_post) ; $i++) { 
    echo $find_post[$i] . "<br>";
}
            ?>
    
    
    <?php
}  

    else {
$select = $con->prepare("SELECT * FROM news");
$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute(); ?>
<?php while ($data = $select->fetch()) :
    $image = $data['image']; ?>
    <section class='blog_area'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-8'>
                    <div class='blog_left_sidebar'>
                        <article class='row blog_item'>
                            <div class='col-md-3'>
                                <div class='blog_info text-right'>
                                    <div class='post_tag'>
                                        <a href='#'>Food,</a>
                                        <a class='active' href='#'>Technology,</a>
                                        <a href='#'>Politics,</a>
                                        <a href='#'>Lifestyle</a>
                                    </div>
                                    <ul class='blog_meta list'>
                                        <li><a href='#'>Mark wiens<i class='lnr lnr-user'></i></a></li>
                                        <li><a href='#'>12 Dec, 2017<i class='lnr lnr-calendar-full'></i></a></li>
                                        <li><a href='#'>1.2M Views<i class='lnr lnr-eye'></i></a></li>
                                        <li><a href='#'>06 Comments<i class='lnr lnr-bubble'></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class='col-md-9'>
                                <div class='blog_post'>
                                    <img src='newsuploads/<?php echo $image ?>' style='width:100%'>
                                    <div class='blog_details'>
                                        <a href='single-blog.html'>
                                            <h2><?php echo $data['subject'] ?> </h2>
                                        </a>
                                        <p> <?php echo $data['description'] ?></p>
                                    </div>
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

<?php endwhile; }  ?>


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
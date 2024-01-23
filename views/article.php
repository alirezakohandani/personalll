<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>Alireza Kohn's personal website</title>
        <!-- Bootstrap CSS -->

        <link rel="stylesheet" href="<?= asset('css/bootstrap.css') ?>">
        <link rel="stylesheet" href="<?= asset('vendors/linericon/style.css') ?>">
        <link rel="stylesheet" href="<?= asset('css/font-awesome.min.css') ?>">
        <link rel="stylesheet" href="<?= asset('vendors/owl-carousel/owl.carousel.min.css') ?>">
        <link rel="stylesheet" href="<?= asset('vendors/lightbox/simpleLightbox.css') ?>">
        <link rel="stylesheet" href="<?= asset('vendors/nice-select/css/nice-select.css') ?>">
        <link rel="stylesheet" href="<?= asset('vendors/animate-css/animate.css') ?>">
        <link rel="stylesheet" href="<?= asset('vendors/popup/magnific-popup.css') ?>">
        <link rel="stylesheet" href="<?= asset('vendors/flaticon/flaticon.css') ?>">
        <!-- main css -->
        <link rel="stylesheet" href="<?= asset('css/style.css') ?>">
        <link rel="stylesheet" href="<?= asset('css/responsive.css') ?>">
    </head>
    <body>
    <div>
      <h2 class='text-center'>Articles</h2>
    </div>
    <div class="list-group">
  <?php
  foreach($articles as $k => $v):
    $v = explode('@', $v);
  ?>

    <a href="<?= $v[0]; ?>" class="list-group-item list-group-item-action text-right"><?= $v[1] ?></a>
    <?php endforeach; ?>
</div>
    </body>


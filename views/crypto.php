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
	<h2 class='text-center'>Crypto Price</h2>
</div>
<div class="list-group">
	<table class="table table-striped">
		<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">ارز دیجیتال</th>
			<th scope="col">قیمت دلاری</th>
			<th scope="col">قیمت ریالی</th>
		</tr>
		</thead>
		<tbody>
        <?php
		$count = 1;
        foreach ($data as $k => $crypto):
            if (is_array($crypto) || is_object($crypto)) {
                foreach ($crypto as $index => $value):
                    ?>
					<tr style="text-align: center">
						<th scope="row"><?php
							echo $count++;
							?></th>
						<td><?php echo $value->asset_id_quote ?></td>
						<td><?php echo $value->rate ?></td>
						<td><?php echo $value->rate * 540000 ?></td>
					</tr>


                <?php
                endforeach;
            }
        endforeach
        ?>
		</tbody>
	</table>

</div>
</body>


<link rel="stylesheet" href="css/bootstrap.css">
      
<?php

$url = "https://min-api.cryptocompare.com/data/pricemulti?fsyms=BTC,ETH,REP,DASH,XRP,EOS,NEO&tsyms=USD,EUR";
$result = file_get_contents($url);
$r = json_decode($result);
?>
<section>
    <div class="row">
        <div class="container">
            <div class="col-md-12">
                <h2 style="text-align: center">cryptocurrency price</h2>
            </div>
        </div>
    </div>
</section>
<section>
<div class="row">
<div class="container">
<div class="col-md-12">
<table style="width: 100%" class="table table-striped table-dark">
<thead style="text-align: center" class="thead-dark">
<tr>
<th style="color: gray" scope="col">row</th>
<!-- <th style="color: gray" scope="col">image</th> -->
<th style="color: gray" scope="col">name</th>
<th style="color: gray" scope="col">price USD</th>
<th style="color: gray" scope="col">price EUR</th>
</tr>
</thead>

<?php foreach($r as $key => $value):?>
<tbody>
<tr>
<td style="text-align: center" scope="row">
<?php $a[] = $key;
echo sizeof($a);
?></td>
<!-- <td ><img style="width: 30px; height: 30px;display: block; margin-left: auto; margin-right: auto; " src="img/bitcoin1.png"></td> -->
<td style="text-align: center"><?php echo $key; ?></td>
<td style="text-align: center; font-weight: bold; color: green"><?= $value->USD; ?></td>
<td style="text-align: center; font-weight: bold; color: green"><?= $value->EUR; ?></td>
    </tr>
</tbody>
<?php
endforeach;

?>
</table>
</div>
</div>
</div>
</section>






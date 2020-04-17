
<?php
$url = "https://api.coinbase.com/v2/prices/spot?currency=USD";
$result = file_get_contents($url);
$r = json_decode($result);
foreach($r as $key => $value):?>
<div class="row">
<div class="container">
    <div class="col-md-12">
<table style="width: 100%" class="table table-striped table-dark">
<thead class="thead-dark">
<tr>
<th scope="col">#</th>
<th scope="col">image</th>
<th scope="col">name</th>
<th scope="col">price</th>
</tr>
</thead>
<tbody>
    <tr>
<th style="text-align: center" scope="row">1</th>
<td ><img style="width: 30px; height: 30px;display: block; margin-left: auto; margin-right: auto; " src="img/bitcoin1.png"></td>
<td style="text-align: center">bitcoin</td>
<td style="text-align: center"><?= $value->amount; ?></td>
    </tr>
</tbody>
</table>
</div>
</div>
</div>
<?php
endforeach;

?>




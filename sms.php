<?php
require 'vendor/autoload.php';
$sender = "1000596446";
$receptor = "09129750492";
$message = ".وب سرویس پیام کوتاه کاوه نگار";
$api = new \Kavenegar \KavenegarApi("62685241424E6B6F4E396F70437741796B677175355A35746A6F484E5862723474765732312B67613956343D");
$api -> Send ( $sender,$receptor,$message);
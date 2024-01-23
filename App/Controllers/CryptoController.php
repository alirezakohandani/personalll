<?php

namespace App\Controllers;

use App\Services\View\View;

class CryptoController
{
    /**
     * List of cryptos
     *
     * @return void
     */
    public function index()
    {
        $cryptoKey = $_ENV['CRYPTO_KEY'];
        $cryptoPriceJson = file_get_contents("https://rest.coinapi.io/v1/exchangerate/USD?apikey=$cryptoKey&invert=true&output_format=json");
        $cryptoPriceObj = json_decode($cryptoPriceJson);
        View::load('crypto', (array)$cryptoPriceObj);
    }
}

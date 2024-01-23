<?php

include 'vendor/autoload.php';
include 'helpers/global.php';
include 'bootstrap/constants.php';
include 'bootstrap/init.php';

require_once realpath(__DIR__ . "/vendor/autoload.php");
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


App\Services\Router\Router::start();






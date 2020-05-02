<?php

use Kuria\Error\ErrorHandler;
use function Siler\Dotenv\env;
use function Siler\Route\get;
use function Siler\Twig\init;
use function Siler\Twig\render;

require dirname(__DIR__) . '/vendor/autoload.php';

$env = $_ENV['APP_ENV'] ?? 'production';
$handler = (new ErrorHandler());
$handler->setDebug(true);
$handler->register();

init(dirname(__DIR__) . '/views');

get('/', function () {
    $length = (int) $_GET['length'] ?? env('KEY_DEFAULT_LENGTH', 64);
    echo render('index.twig', [
        'key' => generateKey($length),
         'length'  => $length
    ]);
});

get('/text', function () {
    $length = $_GET['length'] ?? env('KEY_DEFAULT_LENGTH', 64);
    echo  generateKey((int)$length);
});
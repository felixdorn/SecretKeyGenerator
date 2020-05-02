<?php

use Kuria\Error\ErrorHandler;
use function Siler\Dotenv\env;
use function Siler\Route\get;
use function Siler\Twig\init;
use function Siler\Twig\render;

require dirname(__DIR__) . '/vendor/autoload.php';

$env = $_ENV['APP_ENV'] ?? 'production';
$handler = (new ErrorHandler());
$handler->setDebug($env === 'development');
$handler->register();

init(dirname(__DIR__) . '/views');

get('/', function () {
    $length = getKeyLength();
    echo render('index.twig', [
        'key' => generateKey($length),
         'length'  => $length
    ]);
});

get('/text', function () {
    echo  generateKey(
        getKeyLength()
    );
});
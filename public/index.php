<?php

use Kuria\Error\ErrorHandler;
use function Siler\array_get_int;
use function Siler\Env\{env_int, env_var};
use function Siler\Route\get;
use function Siler\Twig\{init, render};

require dirname(__DIR__) . '/vendor/autoload.php';

$env = env_var('APP_ENV', 'production');
$handler = (new ErrorHandler());
$handler->setDebug($env === 'development');
$handler->register();

init(dirname(__DIR__) . '/views');

get('/', function () {
    $length = getKeyLength();
    list($err, $key) = generateKey($length, getKeyMaxLength());

    if ($err !== null) {
        stop($err);
    }

    echo render('index.twig', [
        'key' => $key,
         'length'  => $length
    ]);
});

get('/text', function () {
    list($err, $key) = generateKey(
        getKeyLength(),
        getKeyMaxLength()
    );

    if ($err !== null) {
        stop($err);
    }

    echo $key;
});

function getKeyLength(): int{
    return array_get_int($_GET, 'length', env_int('KEY_DEFAULT_LENGTH', 64));
}

function getKeyMaxLength(): int {
    return env_int('KEY_MAX_LENGTH', 1024);
}

function stop(string $error, ...$context): void {
    echo sprintf($error, $context);

    if (function_exists('fastcgi_finish_request')) {
        fastcgi_finish_request();
    }
    exit();
}
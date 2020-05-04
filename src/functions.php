<?php

use function Siler\array_get_int;
use function Siler\Env\env_int;

function stop(string $error, ...$context): void {
    echo sprintf($error, $context);

    if (function_exists('fastcgi_finish_request')) {
        fastcgi_finish_request();
    }
    exit();
}

function generateKey(int $length) {
    $max = env_int('KEY_MAX_LENGTH', 1024);

    if ($length <= 0) {
        stop('Length should be greater than 0');
    }

    if ($length > $max) {
        stop('Length should not be greater than %s', $max);
    }

    return substr(base64_encode(
        random_bytes($length)
    ), 0,  $length);
}

function getKeyLength(): int{
    return array_get_int($_GET, 'length', env_int('KEY_DEFAULT_LENGTH', 64));
}
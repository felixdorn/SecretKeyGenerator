<?php

function generateKey(int $length, int $max = 1024): array {
    if ($length <= 0) {
        return ['Length should be greater than 0', null];
    }

    if ($length > $max) {
        return ["Length should not be greater than $max", null];
    }

    return [null, substr(base64_encode(
        random_bytes($length)
    ), 0,  $length)];
}
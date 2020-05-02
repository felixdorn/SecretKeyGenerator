<?php declare(strict_types=1);

function generateKey(int $length)
{
    return substr(base64_encode(
        random_bytes($length + 1)
    ), $length);
}
$length = $_GET['length'] ?? 64;
$key = generateKey((int)$length);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Secret Key Generator</title>
    <link rel="stylesheet" href="style.css" media="screen and (min-width: 640px)">
    <style>
        body {
            font-family: sans-serif;
            background: #ebf5ff;
            padding: 1em;
        }
    </style>
</head>
<body>
    <main>
        <div class="container">
            <h1>Random bytes generator</h1>
            <p>Sometimes, I struggle generating a new secret key for an app, i need to open an interactive PHP terminal, writing a bit code. Every. Single. Time. This is the solution.</p>
            <section class="container secret">
                <strong><?= $key ?></strong>
            </section>
            <small><code>?length=<?= $length ?></small>
        </div>
    </main>

</body>
</html>
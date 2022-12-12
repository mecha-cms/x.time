<?php

$path = trim($url->path ?? "", '/');
$path = trim("" !== $path ? $path : ($state->route ?? '/index'), '/');

$folder = LOT . D . 'page' . D . $path;
$file = exist([
    $folder . '.archive',
    $folder . '.page'
], 1);

if ($file && !is_file($folder . D . 'time.data')) {
    if (!is_dir($folder)) {
        mkdir($folder, 0775, true);
    }
    file_put_contents($folder . D . 'time.data', filectime($file));
}
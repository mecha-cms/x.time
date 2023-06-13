<?php

$path = trim($url->path ?? $state->route ?? 'index', '/');
$folder = LOT . D . 'page' . D . $path;
$file = exist([
    $folder . '.archive',
    $folder . '.page'
], 1);

if ($file && !is_file($data = $folder . D . 'time.data')) {
    if (!is_dir($folder)) {
        mkdir($folder, 0775, true);
    }
    file_put_contents($data, date('Y-m-d H:i:s', filectime($file)));
}